<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Users::all();
        return view('user/index', compact('users'))->with([
            'authuser' => Auth::user(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return view('user/create')->with([
            'authuser' => Auth::user(),
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $validatedData = DB::table('users')->insert([
        'name' => $request->input('name'),
        'divisi' => $request->input('divisi'),
        'username' => $request->input('username'),
        'email' => $request->input('email'),
        'password' => Hash::make($request->input('password')) // Enkripsi password menggunakan bcrypt()
    ]);

    return redirect('user')->with('success', 'Data user baru berhasil ditambah!!!');
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
     * @param \App\Models\Users
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
{   
    $user = Users::find($id);
    return view('user/edit', compact('user'))->with([
        'authuser' => Auth::user(),
    ]);
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \App\Models\Users
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Users $user)
{
    $rules = [
        'name' => 'required',
        'email' => 'required',
        'username' => 'required',
        'divisi' => 'required'
     ];

    // Tambahkan validasi untuk memeriksa apakah password diisi atau tidak
    if ($request->filled('password')) {
        $rules['password'] = 'required';
    }

    $validatedData = $request->validate($rules);

    Users::where('id', $user->id)
            ->update($validatedData);

    return redirect('user')->with('success', 'Data berhasil diubah');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Users::destroy($id);
        return redirect('user')->with('success', 'Data User berhasil di hapus');
    }
}
