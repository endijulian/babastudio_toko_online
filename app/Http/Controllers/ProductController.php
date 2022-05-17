<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


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
        $products  = $request->all();

        $validasi = Validator::make($products, [
            'code'           => 'required|unique:products',
            'name'           => 'required',
            'image'          => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'category_id'       => 'required',
            'quantity'       => 'required',
            'price'       => 'required'
        ]);

        if ($validasi->fails()) {
            return redirect()->route('product.create')->withErrors($validasi)->withInput();
        }

        if ($request->file('image')->isValid()) {
            $foto = $request->file('image');
            $extention = $foto->getClientOriginalExtension();

            $namaFoto = "product/" . date('YmdHis') . "." . $extention;
            $upload_path = 'uploads/product';
            $request->file('image')->move($upload_path, $namaFoto);

            $products['image'] = $namaFoto;
        }

        Product::create($products);

        return redirect()->route('product')->with('status', 'Create Data Berhasil');
    }
}
