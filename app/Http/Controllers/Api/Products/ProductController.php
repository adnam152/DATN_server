<?php

namespace App\Http\Controllers\Api\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Http\Traits\HttpResponses;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use HttpResponses;

    protected $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function index(Request $request)
    {

        $query = $this->model->query()->with(['brand', 'catalogue', 'media', 'createdBy', 'updatedBy', 'statuses']);

        // Kiểm tra nếu có filter theo brand slug
        if ($request->has('brand_slug')) {
            $query->whereHas('brand', function ($q) use ($request) {
                $q->where('slug', $request->brand_slug);
            });
        }

        // Kiểm tra nếu có filter theo catalogue slug
        if ($request->has('catalogue_slug')) {
            $query->whereHas('catalogue', function ($q) use ($request) {
                $q->where('slug', $request->catalogue_slug);
            });
        }

        // Kiểm tra nếu có từ khóa tìm kiếm
        if ($request->has('search_keyword')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'LIKE', '%' . $request->search_keyword . '%');
            });
        }

        // Kiểm tra nếu có sắp xếp theo giá
        if ($request->has('sort_price')) {
            $query->orderBy('price', $request->sort_price);
        }

        // Paginate dựa trên tham số per_page, mặc định là 12
        $products = $query->paginate($request->per_page ?? 12);

        // Kiểm tra nếu không có sản phẩm nào
        if ($products->isEmpty()) {
            return $this->error(null, 'No products found', 404);
        }

        // Trả về kết quả thông qua Resource
        return $this->success(ProductResource::collection($products));
    }

    public function show(Request $request, $id)
    {
        $product = Product::with(['brand', 'catalogue', 'media', 'createdBy', 'updatedBy'])->find($id);
        if (!$product) {
            return $this->error(null, 'Product not found', 404);
        }
        return $this->success(new ProductResource($product));
    }

    public function store(ProductRequest $request)
    {
        $product = $this->model->create($request->all());

        if ($product->isEmpty()) {
            return $this->error(null, 'Product not created', 500);
        }

        return $this->success(new ProductResource($product), 'Product created successfully', 201);
    }

    public function update(ProductRequest $request, $id)
    {
        $product = $this->model->find($id);
        if (!$product) {
            return $this->error(null, 'Product not found', 404);
        }

        $product->update($request->all());

        return $this->success(new ProductResource($product), 'Product updated successfully');
    }

    public function destroy($id)
    {
        $product = $this->model->find($id);
        if (!$product) {
            return $this->error(null, 'Product not found', 404);
        }

        $product->delete();

        return $this->success(null, 'Product deleted successfully');
    }
}
