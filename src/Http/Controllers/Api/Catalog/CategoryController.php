<?php

namespace Shopper\Framework\Http\Controllers\Api\Catalog;

use Shopper\Framework\Http\Controllers\ShopperBaseController;
use Shopper\Framework\Models\Shop\Product\Category;
use Shopper\Framework\Http\Resources\Category as CategoryResource;

/**
 * Category Controller Class
 */
class CategoryController extends ShopperBaseController
{
    /**
     * Return Countries API lists.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function lists()
    {
        return CategoryResource::collection(Category::query()->orderBy('updated_at')->get());
    }
}
