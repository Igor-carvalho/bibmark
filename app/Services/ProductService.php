<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth; 
use App\Models\{ Product, Category, Size };

class ProductService
{
    /**
     * Get all products
     * 
     * @return array
     */
    public function getAllProducts()
    {
        return Product::all();
    }

    /**
     * Create or Update a product
     * 
     * @param array $data
     * @return App\Models\Product
     */
    public function createOrUpdateProduct($data)
    {
        $user = Auth::user();
        if ($user->isSuperAdmin()) {
            if (isset($data['id'])) {
                $product = Product::find($data['id']);
                $values = [];
                if (isset($data['name'])) {
                    $values['name'] = $data['name'];
                }
                if (isset($data['description'])) {
                    $values['description'] = $data['description'];
                }
                if (isset($data['image'])) {
                    $values['image'] = $data['image'];
                }
                if (isset($data['price'])) {
                    $values['price'] = floatval($data['price']);
                }
                if (isset($data['slug'])) {
                    $values['slug'] = $data['slug'];
                }
                if (isset($data['is_available'])) {
                    $values['is_available'] = $data['is_available'];
                }
                if ($product->update($values)) {
                    return $product;
                }
            } else {
                $product = Product::create([
                    'name' => $data['name'],
                    'description' => $data['description'],
                    'image' => $data['image'],
                    'price' => floatval($data['price']),
                    'slug' => isset($data['slug']) ? $data['slug'] : $data['name'],
                    'is_available' => isset($data['is_available']) ? $data['is_available'] : false,
                ]);
                return $product;
            }
        }

        return null;
    }

    /**
     * Delete a product
     * 
     * @param integer $productId
     * @return boolean
     */
    public function deleteProduct($productId)
    {
        $user = Auth::user();
        if ($user->isSuperAdmin()) {
            $product = Product::find($productId);
            $product->categories()->detach();
            $product->sizes()->detach();
            $product->delete();
        }

        return false;
    }

    /**
     * Add a product to a category
     * 
     * @param integer $productId
     * @param integer $categoryId
     * @return boolean
     */
    public function addProductToCategory($productId, $categoryId)
    {
        $category = Category::find($categoryId);
        $product = Product::find($productId);
        if ($category && $product) {
            $category->products()->save($product);
            return true;
        }

        return false;
    }

    /**
     * Delete a product from a category
     * 
     * @param integer $productId
     * @param integer $categoryId
     * @return boolean
     */
    public function deleteProductFromCategory($productId, $categoryId)
    {
        $category = Category::find($categoryId);
        $product = Product::find($productId);
        if ($category && $product) {
            $category->products()->detach($productId);
            return true;
        }

        return false;
    }

    /**
     * Add a product to a size
     * 
     * @param integer $productId
     * @param integer $sizeId
     * @param integer $quantity
     * @return boolean
     */
    public function addProductToSize($productId, $sizeId, $quantity)
    {
        $size = Size::find($sizeId);
        $product = Product::find($productId);
        if ($size && $product) {
            $size->products()->syncWithoutDetaching([$productId => ['quantity' => $quantity]]);
            return true;
        }

        return false;
    }

    /**
     * Delete a product from a size
     * 
     * @param integer $productId
     * @param integer $sizeId
     * @return boolean
     */
    public function deleteProductFromSize($productId, $sizeId)
    {
        $size = Size::find($sizeId);
        $product = Product::find($productId);
        if ($size && $product) {
            $size->products()->detach($productId);
            return true;
        }

        return false;
    }
}
