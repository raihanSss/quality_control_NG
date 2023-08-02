<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Customer;
use App\Models\KeteranganNg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::pluck('nama_customer', 'id');
        $authuser = Auth::user();
        return view('barang/index')->with([
            'authuser' => Auth::user(),
            'barang' => Barang::all(),
            'customers' => $customers
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
{
    $authuser = Auth::user();
    $customers = Customer::all();

    return view('barang/create')->with([
        'authuser' => Auth::user(),
        'barang' => Barang::all(),
        'customers' => Customer::all()
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
    $validatedData = $request->validate([
        'nobarang' => 'required',
        'name' => 'required',
        'tanggal' => 'required',
        'customer' => 'required',
        'kuantitas' => 'required',
        'keterangan' => 'required|array',
        'status' => 'nullable',
    ]);

    $barang = new Barang;
    $barang->nobarang = $request->input('nobarang');
    $barang->name = $request->input('name');
    $barang->tanggal = $request->input('tanggal');
    $barang->customer_id = $request->input('customer');
    $barang->kuantitas = $request->input('kuantitas');
    $barang->status = $request->input('status');

    $keterangan = $request->input('keterangan');
    $barang->keterangan = implode(',', $keterangan);
    $barang->save();

    return redirect('barang')->with('success', 'Data baru berhasil ditambah!');
}

     

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
{
    $barang = Barang::findOrFail($id);

    return view('barang.show', compact('barang'))->with([
        'authuser' => Auth::user(),
    ]);
}

    /**
     * Show the form for editing the specified resource.
     * @param \App\Models\Barang
     * @param \App\Models\Customer
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {   

        $authuser = Auth::user();
        return view('barang/edit')->with([
            'barang' => $barang,
            'authuser' => Auth::user(),
            'customers' => Customer::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param \App\Models\Barang
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
{
    $rules = [
        'nobarang' => 'required',
        'name' => 'required',
        'tanggal' => 'required',
        'customer_id' => 'nullable',
        'kuantitas' => 'required',
        'status' => 'nullable'
    ];

    $validatedData = $request->validate($rules);

    $barang->update($validatedData);

    return redirect('barang')->with('success', 'Data berhasil diubah');
}


 /**
 * Validate the specified resource.
 *
 * @param  \App\Models\Barang  $barang
 * @return \Illuminate\Http\Response
 */
public function validateBarang(Barang $barang)
{
    // Check if the authenticated user has the role 'leader'
    if (Auth::user()->divisi == 'qa_leader') {
        $barang->status_val = 'validated';
        $barang->save();
        return redirect()->back()->with('success', 'Barang has been validated successfully.');
    } else {
        return redirect()->back()->with('error', 'Only QA leaders can validate the barang.');
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Barang::destroy($id);
        return redirect('barang')->with('success', 'Data berhasil di hapus');
        
    }
}
