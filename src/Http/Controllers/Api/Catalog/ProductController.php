<?php

namespace Shopper\Framework\Http\Controllers\Api\Catalog;

use Shopper\Framework\Http\Controllers\ShopperBaseController;
use Shopper\Framework\Models\Shop\Product\Product;
use Shopper\Framework\Http\Resources\Product as ProductResource;

/**
 * Product Controller Class
 */
class ProductController extends ShopperBaseController
{
    /**
     * Return Countries API lists.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function lists()
    {
        return ProductResource::collection(Product::query()->orderBy('updated_at')->get());
    }
}
