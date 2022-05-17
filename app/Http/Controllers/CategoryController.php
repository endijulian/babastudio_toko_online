<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $category   = Category::all();


        return view('category.index', compact('category'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required'
        ]);

        $category                   = new Category;
        $category->category_name    = $request->category_name;
        $category->save();

        return redirect()->route('category')->with('status', 'Berhasil disimpan');
    }
}
