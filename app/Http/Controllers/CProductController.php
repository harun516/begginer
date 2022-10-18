<?php

namespace App\Http\Controllers;

use App\Models\c_product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $c_products = c_product::latest()->get();

        return view('c_product.index', compact('c_products'));
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
        {
            //define validation rules
            $validator = Validator::make($request->all(), [
                'product_id' => 'required',
                'product_name' => 'required',
                'purchase_price' => 'required',
                'selling_price' => 'required',
                'area_id' => 'required',
            ]);

            //check if validation fails
            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }

            //create post
            $post = c_product::create([
                'product_id' => $request->product_id,
                'product_name' => $request->product_name,
                'purchase_price' => $request->purchase_price,
                'selling_price' => $request->selling_price,
                'area_id' => $request->area_id,
            ]);

            //return response
            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil Disimpan!',
                'data' => $post,
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
