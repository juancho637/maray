<?php

namespace App\Http\Controllers\Api;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            if ($request->area){
                $products = Product::name($request->search)->areaName($request->area)->get();
            } elseif ($request->category){
                $products = Product::name($request->search)->categoryName($request->category)->get();
            }else{
                $products = Product::name($request->search)->get();
            }

            $formatted_products = [];

            foreach ($products as $product) {
                $formatted_products[] = [
                    'id' => $product->id,
                    'text' => $product->name,
                ];
            }

            return response()->json($formatted_products, 200);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  Request $request
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Product $product)
    {
        if ($request->ajax()) {
            $formatted_product = [
                'id' => $product->id,
                'name' => $product->name,
                'value' => $product->value,
                'tax_percentage' => $product->tax_percentage,
                'unit_value' => $product->unit_value,
            ];

            return response()->json($formatted_product, 200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
