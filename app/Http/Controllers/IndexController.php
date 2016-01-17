<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests;

class IndexController extends Controller
{
    /**
     * Show the forum index.
     *
     * @return Response
     */
    public function index()
    {
        $categories = Category::with('forums.threadsCount')->get();

        return view('index', compact('categories'));
    }
}
