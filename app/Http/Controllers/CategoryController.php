<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Category\CreateOrUpdateCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Create or Update a category
     * 
     * @param CreateOrUpdateCategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function createOrUpdate(CreateOrUpdateCategoryRequest $request)
    {
        $data = $request->all();
        $lastSortOrder = Category::max('sort_order') ?? 0;
        if (isset($data['id'])) {
            $category = Category::find($data['id']);
            $updated = $category->update([
                'name' => $data['name'],
                'parent_id' => $data['parent_id'] ?? 0,
                'slug' => $data['slug'] ?? $data['name'],
                'sort_order' => $lastSortOrder
            ]);
            if ($updated) {
                $result['category'] = $category;
                return $this->sendSuccess($result);
            } else {
                return $this->sendError('Unable to update a category.');
            }
        } else {
            $category = Category::create([
                'name' => $data['name'],
                'parent_id' => $data['parent_id'] ?? 0,
                'slug' => $data['slug'] ?? $data['name'],
                'sort_order' => $lastSortOrder + 1
            ]);
            if ($category) {
                $result['category'] = $category;
                return $this->sendSuccess($result);
            } else {
                return $this->sendError('Unable to create a category.');
            }
        }
    }

    /**
     * Get all categories
     * 
     * @return \Illuminate\Http\Response
     */
    public function getAll()
    {
        $categories = Category::orderBy('sort_order')->toArray();
        $result['categories'] = $categories;

        return $this->sendSuccess($result, 'Get all categories Succeeded.');
    }
}
