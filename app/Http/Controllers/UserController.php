<?php

namespace App\Http\Controllers;

use App\Models\area;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all posts from Models
        $users = User::latest()->get();
        //return view with data
        return view('user.index', compact('users'));

        // $areas = area::all();
        // return view('user.create', compact('areas'));

        // $data = DB::table('users')
        //     ->join('areas', 'areas.area_id', '=', 'users.area_id')
        //     ->get();

        // return view('user.index')->with('users', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = area::all();
        return view('user.create', compact('areas'));
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
                'user_id' => 'required',
                'area_id' => 'required',
                'name' => 'required',
                'password' => 'required',
                'phone' => 'required',
                'email' => 'required',
                'address' => 'required',
            ]);

            //check if validation fails
            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }

            //create post
            $post = User::create([
                'user_id' => $request->user_id,
                'area_id' => $request->area_id,
                'name' => $request->name,
                'password' => $request->password,
                'phone' => $request->phone,
                'email' => $request->email,
                'address' => $request->address,

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
