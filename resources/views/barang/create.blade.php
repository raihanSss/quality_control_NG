@extends('layout.main')

@section('isi')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap 
align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Tambah Data Barang</h1>
</div>


<div class="col-lg-8">

    <form method="POST" action="/barang" class="mb-5">
        @csrf
        <div class="col-md-6">
          <label for="nobarang" class="form-label">Kode Barang</label>
          <input type="text" class="form-control" id="nobarang" name="nobarang" required>
        </div>
        <div class="col-md-6">
            <label for="name" class="form-label">Nama Barang</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required>
            @error('name')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
        <div class="col-md-6">
          <label for="tanggal" class="form-label">Tanggal Produksi</label>
          <input type="date" class="form-control" id="tanggal" name="tanggal" required>
        </div>
        <div class="col-md-6">
          <label for="customer" class="form-label">Nama Customer</label>
          <select class="form-control" id="customer" name="customer" required>
            <option value="">== Pilih ==</option>
            @foreach($customers as $customer)
              <option value="{{ $customer->id }}">{{ $customer->nama_customer }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-md-6">
          <label for="kuantitas" class="form-label">Kuantitas</label>
          <input type="number" class="form-control" id="kuantitas" name="kuantitas" required>
        </div>
        <div class="col-md-6">
          <label for="keterangan" class="form-label">Keterangan</label><br>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="brudul" name="keterangan[]" value="brudul">
            <label class="form-check-label" for="brudul">Brudul</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="terawang" name="keterangan[]" value="terawang">
            <label class="form-check-label" for="terawang">Terawang</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="kaku" name="keterangan[]" value="kaku">
            <label class="form-check-label" for="kaku">Kaku</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="sobek" name="keterangan[]" value="sobek">
            <label class="form-check-label" for="sobek">Sobek</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="minus_dimensi" name="keterangan[]" value="minus_dimensi">
            <label class="form-check-label" for="minus_dimensi">Minus Dimensi</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="belah" name="keterangan[]" value="belah">
            <label class="form-check-label" for="belah">Belah</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="dobeltiplepas" name="keterangan[]" value="dobeltiplepas">
            <label class="form-check-label" for="dobeltiplepas">Doubletip Lepas</label>
          </div>
        </div>
        

</div>
      <div class="col-lg-12" style="margin-top: 10px;">
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
</form>


@endsection