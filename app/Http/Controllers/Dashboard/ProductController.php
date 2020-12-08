<?php

namespace App\Http\Controllers\Dashboard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Author;
// use App\Models\Publisher;
// use App\Models\Category;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $products = Product::all();
        $products = Product::with('authors')
                        ->join('authors', function($join){
                                $join->on('products.author_id', '=', 'authors.id');
                        })
                        ->orderBy('products.name', 'ASC')
                        ->get();
        // return view('dashboards.products.list_product', compact('products'));
                        dd($products);
    }
    // public function publisher() {
    //     $producs = Product::with('publisher')
    //                     ->join('publishers', function($join){
    //                             $join->on('products.publisher_id', '=', 'publishers.id');
    //                     })
    //                     orderBy('products.name', 'ASC')
    //                     ->get();
    //     return view('dashboards.products.list_product', compact('products'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
        // $publishers = Publisher::all();
        // $categories = Category::all();
        return view('dashboards.products.create_product', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Product::create($data);
        return redirect()->route('dashboards.products.list_product'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($name)
    {
        $authors = Author::all();
        // $publishers = Publisher::all();
        // $categories = Category::all();
        $products = Product::where('name', '=', $name)
                    ->first();
        return view('dashboards.products.edit_product', compact('products', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $name)
    {
        $data = $request->all();
        Product::where('name', '=', $name)->update($data);
        return redirect()->route('dashboards.products.list_product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($name)
    {
        $products = Product::find($id);
        $products->reviews()->delete();
        $products->orderDetails()->delete();
        return redirect()->route('dashboards.products.list_product');
    }
}
