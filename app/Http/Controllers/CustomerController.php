<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return view('customer.index')->with([
            'authuser' => Auth::user(),
            'customers' => Customer::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        return view('customer/create')->with([
            'authuser' => Auth::user(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = DB::table('customer')->insert([
            'nama_customer' => $request->input('nama_customer'),
            'alamat_customer' => $request->input('alamat_customer'),
            'no_telp_customer' => $request->input('no_telp_customer')
        ]);
    
        return redirect('customer')->with('success', 'Data customer baru berhasil ditambah!!! Selamat ya!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   
        $customer = Customer::find($id);
        return view('customer/edit', compact('customer'))->with([
            'authuser' => Auth::user(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param \App\Models\Customer
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $rules = [
            'nama_customer' => 'required',
            'alamat_customer' => 'required',
            'no_telp_customer' => 'required'
            
         ];
    
        $validatedData = $request->validate($rules);
    
        Customer::where('id', $customer->id)
                ->update($validatedData);
    
        return redirect('customer')->with('success', 'Data Customer berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     * * @param  int  $id
     */
    public function destroy(string $id)
    {
        Customer::destroy($id);
        return redirect('customer')->with('success', 'Data Customer berhasil di hapus');
    }
}
