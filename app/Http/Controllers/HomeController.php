<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Category;

class HomeController extends Controller
{
    public function index() {
        $images = File::all();
        $categories = Category::all();

        return view('index', compact('images', 'categories'));
    }
}
