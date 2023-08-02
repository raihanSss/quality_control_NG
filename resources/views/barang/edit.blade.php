@extends('layout.main')

@section('isi')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap 
align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Ubah Data Barang</h1>
</div>

<div class="col-lg-12">
    <form method="POST" action="/barang/{{ $barang->id }}" class="mb-5">
        @method('PUT')
        @csrf
        <div class="col-md-6">
          <label for="nobarang" class="form-label">Kode Barang</label>
          <input type="text" class="form-control" id="nobarang" name="nobarang"
           value="{{ $barang->nobarang }}">
        </div>
        <div class="col-md-6">
            <label for="name" class="form-label">Nama Barang</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
             value="{{ $barang->name }}">
            @error('name')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
        <div class="col-md-6">
          <label for="tanggal" class="form-label">Tanggal Produksi</label>
          <input type="date" class="form-control" id="tanggal" name="tanggal"
           value="{{ $barang->tanggal }}">
        </div>
        <div class="col-md-6">
          <label for="customer" class="form-label">Nama Customer</label>
          <select class="form-control" id="customer" name="customer" required>
            <option value="">== Pilih ==</option>
            @foreach($customers as $customer)
              <option value="{{ $customer->id }}" @if($customer->id == $barang->customer_id) selected @endif>{{ $customer->nama_customer }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-md-6">
          <label for="kuantitas" class="form-label">Kuantitas</label>
          <input type="number" class="form-control" id="kuantitas" name="kuantitas"
           value="{{ $barang->kuantitas }}">
        </div>
        
        <div class="col-lg-12 mt-2">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
</div>


@endsection