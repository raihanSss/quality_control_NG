@extends('layout.main')

@section('isi')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap 
align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Tambah Data User</h1>
</div>


<div class="col-lg-8">

    <form method="POST" action="/user" class="mb-5">
        @csrf
        <div class="col-md-6">
          <label for="name" class="form-label">Nama</label>
          <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control"  id="email" name="email" required>
          </div>
        <div class="col-md-6">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="col-md-6">
          <label for="divisi" class="form-label">divisi</label>
          <select class="form-control" id="divisi" name="divisi" required>
            <option value="">--Pilih--</option>
            <option value="admin">Admin</option>
            <option value="qa_staff">QC_staff</option>
            <option value="qa_leader">QC_leader</option>
          </select>
        </div>
        <div class="col-md-6">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>
        
        <div class="col-lg-12 mt-3">
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
</div>


@endsection