<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Resources\ProductResource;
use App\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductController extends Controller
{
    /**
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return ProductResource::collection(
            Product::paginate(15)
        );
    }

    /**
     * @param ProductStoreRequest $request
     * @return ProductResource
     */
    public function create(ProductStoreRequest $request)
    {
        /** @var Product $product */
        $product = new Product;
        $product->setAttribute('name', $request->input('name'));
        $product->setAttribute('price', $request->input('price'));
        $product->setAttribute('description', $request->input('description'));

        $product->save();
        return new ProductResource($product);
    }

    /**
     * @param $productId
     * @return ProductResource
     */
    public function show($productId)
    {
        return new ProductResource(
            Product::find($productId)
        );
    }

    /**
     * @param ProductStoreRequest $request
     * @param $productId
     * @return ProductResource
     */
    public function update(ProductStoreRequest $request, $productId)
    {
        /** @var Product $product */
        $product = Product::find($productId);
        $product->setAttribute('name', $request->input('name'));
        $product->setAttribute('price', $request->input('price'));
        $product->setAttribute('description', $request->input('description'));
        $product->save();
        return new ProductResource($product);
    }

    /**
     * @param $productId
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy($productId)
    {
        /** @var Product $product */
        $product = Product::find($productId);
        if ($product) {
            $product->delete();
            return $this->messageResponse(true, 'Product removed successfully!');
        }
        return $this->messageResponse(false, 'Product not founded!');
    }
}
