<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Image;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $product    = Product::all();
        return view('product.index', compact('product'));
    }

    public function create()
    {
        $category = Category::all();

        return view('product.create', compact('category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|max:255',
            'code'          => 'required|unique:products|max:255',
            'category_id'   => 'required',
            'price'         => 'required',
            'image'         => 'required',
            'quantity'      => 'required',
        ]);

        if ($request->file('image')->isValid()) {
            $foto = $request->file('image');
            $extention = $foto->getClientOriginalExtension();

            $namaFoto = "product/" . date('YmdHis') . "." . $extention;
            $upload_path = 'image/product';
            $request->file('image')->move($upload_path, $namaFoto);

            $productImg['image'] = $namaFoto;
        }

        Product::create($productImg);


        return redirect()->route('product')->with('status', 'Success Created');
    }
}
