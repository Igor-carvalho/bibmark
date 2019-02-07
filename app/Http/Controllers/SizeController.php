<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Size;

class SizeController extends Controller
{
    /**
     * Get all sizes
     * 
     * @return \Illuminate\Http\Response
     */
    public function getAll()
    {
        $categories = Size::orderBy('sort_order')->get()->toArray();
        $result['sizes'] = $categories;

        return $this->sendSuccess($result, 'Get all sizes Succeeded.');
    }
}
