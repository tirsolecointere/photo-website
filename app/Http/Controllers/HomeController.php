<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Category;

class HomeController extends Controller
{
    public function index() {
        $categoryFilter = request('category');

        if (request('category')) {
            $images = File::whereHas('categories', function($query) {
                $categoryFilter = request('category');
                $query->where('name', $categoryFilter);
            })->get()->sortDesc();
        } else {
            $images = File::all()->sortDesc();
        }

        $categories = Category::all();

        return view('index', compact(
            'images',
            'categories',
            'categoryFilter'
        ));
    }
}
