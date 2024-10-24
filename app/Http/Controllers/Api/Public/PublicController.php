<?php

namespace App\Http\Controllers\Api\Public;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Http\Traits\HttpResponses;
use App\Models\Blog;
use App\Models\Product;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    use HttpResponses;
    public function index()
    {
        return response()->json([
            'message' => 'Welcome to the public API'
        ]);
    }

    public function getAllProducts(Request $request)
    {
        $query = Product::query()->with(['brand', 'catalogue', 'updatedBy', 'createdBy', 'media', 'variants', 'reviews']);
        //kiểm tra không có biển thể thì không lấy
        $query->whereHas('variants');
        //kiểm tra biến thể nào không được bán thì không lấy
        $query->whereHas('variants.productsOnSales');
        // Lọc theo tag
        $query->when($request->filled('filter.tags'), function ($tags) use ($request) {
            return $tags->whereHas('productTags.tag', function ($q) use ($request) {
                $q->whereIn('tag_slug', $request->input('filter.tags'));
            });
        });

        // Lọc theo catalogue
        $query->when($request->filled('filter.catalogue'), function ($catalogue) use ($request) {
            return $catalogue->whereHas('catalogue', function ($q) use ($request) {
                $q->whereIn('slug', $request->input('filter.catalogue'));
            });
        });

        // Lọc theo khoảng giá
        $query->when($request->filled('filter.priceStart'), function ($q) use ($request) {
            return $q->whereHas('variants.productsOnSales', function ($q) use ($request) {
                $q->where('selling_price', '>=', $request->input('filter.priceStart'));
            });
        })
            ->when($request->filled('filter.priceEnd'), function ($q) use ($request) {
                return $q->whereHas('variants.productsOnSales', function ($q) use ($request) {
                    $q->where('selling_price', '<=', $request->input('filter.priceEnd'));
                });
            });
        // Sắp xếp theo order_by hoặc sort_by
        $query->when($request->has('order_by'), function ($q) use ($request) {
            return $q->orderBy($request->order_by, $request->order_type ?? 'desc');
        })
            ->when($request->has('sort_by'), function ($q) use ($request) {
                return $q->orderBy($request->sort_by, $request->sort_type ?? 'desc');
            });

        // Tìm kiếm theo tên sản phẩm
        $query->when($request->has('search'), function ($q) use ($request) {
            return $q->where('name', 'like', '%' . $request->search . '%');
        });

        // Phân trang
        if ($request->filled('page')) {
            $page = $request->page;
            $totalPage = $query->paginate($request->per_page ?? 12)->lastPage();
            if ($page > $totalPage) {
                return $this->error('Số trang không hợp lệ', 400);
            }
        }
        
        $products = $query->paginate($request->per_page ?? 12);

        // Giới hạn số lượng kết quả nếu có truyền limit
        $query->when($request->filled('limit'), function ($q) use ($request) {
            return $q->limit($request->limit);
        });
        
        //sản phẩm không có trả về thông báo không có
        if ($products->isEmpty()) {
            return $this->error([], 'Không tìm kiếm được sản phẩm nào', 404);
        }

        return $this->success(ProductResource::collection($products), 'Sản phẩm được lấy thành công');
    }

    public function getProductBySlug($slug)
    {
        $product = Product::where('slug', $slug)->with(['brand', 'catalogue', 'updatedBy', 'createdBy', 'media', 'variants', 'reviews'])->first();
        if (!$product) {
            return $this->error([], 'Không tìm thấy sản phẩm', 404);
        }
        return $this->success(new ProductResource($product), 'Sản phẩm được lấy thành công');
    }

    public function getAllCatalogues(Request $request)
    {
        $catalogues = Product::select('catalogue_id')->distinct()->with('catalogue')->get();
        return $this->success($catalogues, 'Danh mục được lấy thành công');
    }

    public function getAllTags(Request $request)
    {
        $tags = Product::select('tag_id')->distinct()->with('tags')->get();
        return $this->success($tags, 'Tag được lấy thành công');
    }
    public function getAllBlogs(Request $request)
    {
        $blogs = Blog::all();   
        return $this->success($blogs, 'Blog được lấy thành công');
    }

    public function getBlogBySlug(Request $request, $slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        if (!$blog) {
            return $this->error([], 'Không tìm thấy blog', 404);
        }
        return $this->success($blog, 'Blog được lấy thành công');
    }
    
}
