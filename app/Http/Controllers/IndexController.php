<?php

namespace App\Http\Controllers;

use App\Category;
use App\Forum;
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
        $categories = Category::all();

        return view('index', compact('categories'));
    }
}
