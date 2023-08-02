<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Customer;
use TCPDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class BarangprosesController extends Controller
{
    public function index()
    {
        $customers = Customer::pluck('nama_customer', 'id');
        $authuser = Auth::user();
        return view('barangproses/index')->with([
            'authuser' => Auth::user(),
            'barang' => Barang::all(),
            'customers' => $customers
        ]);
    }

    public function halamanselesai(Request $request)
{
    $customers = Customer::pluck('nama_customer', 'id');
    $authuser = Auth::user();
    $filterMonth = $request->query('filter_month');

    $barang = Barang::where('status', 'repair')
        ->when($filterMonth, function ($query) use ($filterMonth) {
            return $query->whereMonth('tanggal', $filterMonth);
        })
        ->get();

    return view('barangselesai.selesai', compact('barang', 'filterMonth'))->with([
        'authuser' => $authuser,
        'customers' => $customers,
    ]);
}


    public function halamanselesaiStaff(Request $request)
    {
        $customers = Customer::pluck('nama_customer', 'id');
        $authuser = Auth::user();
        $filterMonth = $request->query('filter_month');
    
        $barang = Barang::where('status', 'repair')
            ->when($filterMonth, function ($query) use ($filterMonth) {
                return $query->whereMonth('tanggal', $filterMonth);
            })
            ->get();
    
        return view('barangselesai.selesai', compact('barang', 'filterMonth'))->with([
            'authuser' => $authuser,
            'customers' => $customers,
        ]);
    }

public function update(Request $request, $id, $status)
{
    $barang = Barang::findOrFail($id);

    if ($status == 'repair') {
        if ($barang->status == 'repair') {
            return redirect()->back()->with('error', 'Barang sudah dicek');
        } else {
            $barang->status_lama = $barang->status;
            $barang->status = $status;
            $barang->save();

            return redirect()->route('barangselesai/selesai')->withSuccess('Barang berhasil diperbaiki');
        }
    } elseif ($status == 'scrap') {
        if ($barang->status == 'scrap') {
            return redirect()->back()->with('error', 'Barang sudah dikirim ke SCRAP');
        } else {
            $barang->status_lama = $barang->status;
            $barang->status = $status;
            $barang->save();

            return redirect()->route('barangselesai/selesai')->withSuccess('Barang berhasil dikirim ke SCRAP');
        }
    }
}

    

    public function halamanperbaikan(Request $request)
    {
        $customers = Customer::pluck('nama_customer', 'id');
        $authuser = Auth::user();
        $filterMonth = $request->query('filter_month');

        $barang = Barang::where('status', 'scrap')
            ->when($filterMonth, function ($query) use ($filterMonth) {
                return $query->whereMonth('tanggal', $filterMonth);
            })
            ->get();
        return view('barangperbaikan.perbaikan', compact('barang'))->with([
            'authuser' => Auth::user(),
            'customers' => $customers
        ]);
    }

    public function halamanperbaikanStaff(Request $request)
    {
        $customers = Customer::pluck('nama_customer', 'id');
        $authuser = Auth::user();
        $filterMonth = $request->query('filter_month');

        $barang = Barang::where('status', 'scrap')
            ->when($filterMonth, function ($query) use ($filterMonth) {
                return $query->whereMonth('tanggal', $filterMonth);
            })
            ->get();
        return view('barangperbaikan.perbaikan', compact('barang'))->with([
            'authuser' => Auth::user(),
            'customers' => $customers
        ]);
    }

public function printPDF(Request $request)
{
    $barang = Barang::where('status', 'repair')
        ->where('status_val', 'validated')
        ->get();
    $customers = Customer::pluck('nama_customer', 'id');

    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor($request->user()->name);
    $pdf->SetTitle('Print PDF');
    $pdf->SetSubject('Printing PDF using TCPDF');
    $pdf->SetKeywords('PDF, Laravel, TCPDF, example');

    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);

    $pdf->AddPage('L', 'A4');
    
    $html = view('print', [
        'barang' => $barang,
        'customers' => $customers,
        'name' => $request->user()->name
    ])->render();

    $pdf->writeHTML($html, true, false, true, false, '');

    $pdf->Output('print.pdf', 'I');
}

}
