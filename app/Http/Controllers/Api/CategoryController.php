<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\CategoryResources;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categorys = Category::all();

        return response()->api(new CategoryResources($categorys));

    }//end of index

}//end of controller
