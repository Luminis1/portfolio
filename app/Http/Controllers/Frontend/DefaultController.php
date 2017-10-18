<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Category;

class DefaultController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        $categories = Category::all();

        return view('default.index', [
            'projectlist' => $projects,
            'categories' => $categories
        ]);
    }

    public function category($category)
    {
        $categories = Category::where('category', $category)-> first();
        $projects = Project::where('category_id', $categories->id)->get();
        $categories1 = Category::all();


        return view('default.index', [
            'projectlist' => $projects,
            'categories' => $categories1
        ]);
    }
}
