<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Role::factory(5)->create();
        \App\Models\Account::factory(4)->create();
        \App\Models\Permission::factory(4)->create();
        \App\Models\RolePermission::factory(5)->create();
        \App\Models\Catalogue::factory(5)->create();
        \App\Models\Brand::factory(5)->create();
        $sliders = \App\Models\Slider::factory(5)->create();
        
        \App\Models\Media::factory()->count(5)->create([
            'mediable_id' => $sliders->random()->id,
            'mediable_type' => \App\Models\Slider::class,
        ]);

        $products = \App\Models\Product::factory(10)->create()->each(function ($product) {
            \App\Models\Status::factory()->create([
                'statusable_id' => $product->id,
                'statusable_type' => \App\Models\Product::class,
            ]);
        });

        \App\Models\Media::factory()->count(5)->create([
            'mediable_id' => $products->random()->id,
            'mediable_type' => \App\Models\Product::class,
        ]);

        \App\Models\Review::factory(5)->create();
        $variants = \App\Models\Variant::factory(10)->create();

        $warehouses = \App\Models\Warehouse::factory(5)->create()->each(function ($warehouse)  {
            \App\Models\Status::factory()->create([
                'statusable_id' => $warehouse->id,
                'statusable_type' => \App\Models\Warehouse::class,
            ]);
        });

        $productOnSales = \App\Models\ProductsOnSale::factory(5)->create()->each(function ($productOnSale)  {
            \App\Models\Status::factory()->create([
                'statusable_id' => $productOnSale->id,
                'statusable_type' => \App\Models\ProductsOnSale::class,
            ]);
        });

        \App\Models\Attribute::factory(5)->create();
        \App\Models\AttributeValue::factory(5)->create();
        \App\Models\VariantsAttributeValue::factory(5)->create();
        \App\Models\Cart::factory(5)->create();
        \App\Models\CartItem::factory(5)->create();
        \App\Models\Payment::factory(5)->create();

        $orders = \App\Models\Order::factory(5)->create()->each(function ($order) {
            \App\Models\Status::factory()->create([
                'statusable_id' => $order->id,
                'statusable_type' => \App\Models\Order::class,
            ]);
        });

        \App\Models\OrderDetail::factory(5)->create();
        \App\Models\Blog::factory(5)->create();
        \App\Models\Tag::factory(5)->create();
        \App\Models\ProductTag::factory(5)->create();
        \App\Models\BlogTag::factory(5)->create();  
        \App\Models\Voucher::factory(5)->create();
        \App\Models\CheckVoucher::factory(5)->create();  
        \App\Models\WishList::factory(5)->create();  
    }
}
