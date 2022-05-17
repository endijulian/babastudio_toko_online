<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

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

    public function edit($id)
    {
        $category = Category::find($id);


        return view('category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {

        $category = Category::findOrFail($id);
        $input_category = $request->all();

        $validasi = Validator::make($input_category, [
            'category_name'           => 'required',
        ]);

        if ($validasi->fails()) {
            return redirect()->route('category.edit', [$id])->withErrors($validasi);
        }

        $category->update($input_category);

        return redirect()->route('category')->with('status', 'Category Berhasil di Update');
    }
}
