@extends('layout.main')

@section('isi')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap 
    align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Data User</h1>
    </div>

    <div class="col-lg-8">
        <form method="POST" action="/user/{{ $user->id }}" class="mb-5">
            @method('put')
            @csrf
            <div class="col-md-6">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control"  id="email" name="email" value="{{ $user->email }}" required>
            </div>
            <div class="col-md-6">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}" required>
            </div>
            <div class="col-md-6">
                <label for="divisi" class="form-label">Divisi</label>
                <select class="form-control" id="divisi" name="divisi" required>
                    <option value="">--Pilih--</option>
                    <option value="admin" {{ $user->divisi == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="qa_staff" {{ $user->divisi == 'qa_Staff' ? 'selected' : '' }}>QC Staff</option>
                    <option value="qa_leader" {{ $user->divisi == 'qa_leader' ? 'selected' : '' }}>QC Leader</option>
                </select>
            </div>
            @if (!isset($user)) <!-- Mode tambah user -->
            <div class="col-md-6">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Kosongkan jika tidak ingin mengubah password">
            </div>
            @else <!-- Mode edit user -->
            <div class="col-md-6">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password tidak bisa diubah" readonly>
            </div>
            @endif
            <div class="col-lg-12 mt-3">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
@endsection
