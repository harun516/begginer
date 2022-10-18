<?php

namespace App\Http\Controllers;

use App\Models\area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all posts from Models
        $areas = area::latest()->get();

        //return view with data
        return view('area.index', compact('areas'));
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
                'area_id' => 'required',
                'name' => 'required',
                'address' => 'required',
                'link_address' => 'required',
            ]);

            //check if validation fails
            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }

            //create post
            $post = area::create([
                'area_id' => $request->area_id,
                'name' => $request->name,
                'address' => $request->address,
                'link_address' => $request->link_address,
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
     * @param  int  $area_id
     * @return \Illuminate\Http\Response
     */
    
    public function show(area $area)
    {
        //return response
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Post',
            'data' => $area,    
        ]);
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
    public function update(Request $request, area $area)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required',
            'link_address' => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create post
        $area->update([
            'name' => $request->name,
            'address' => $request->address,
            'link_address' => $request->link_address,
        ]);

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Diudapte!',
            'data' => $area,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete post by ID
        area::where('area_id', $id)->delete();

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Post Berhasil Dihapus!.',
        ]); 
    }
}
