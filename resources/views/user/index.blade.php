@extends('layout.main')

@section('judul')
    Halaman User
@endsection

@section('isi')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap 
    align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Daftar User</h1>
    </div>

    @if(session()->has('success'))
    <div class="alert alert-success col-lg-8" role="alert">
    <button type="button" class="close" data-dismiss="alert">X</button>
        {{ session('success') }}
    </div>
    @endif

<div class="table-responsive col-lg-12">
    <a href="user/create" class="btn btn-primary mb-3"><i class="bi bi-plus-square"></i> Tambah Data User</a>
    <table class="table table-striped" style="width: 50%">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Divisi</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->name}}</td>
                <td>{{ $user->divisi}}</td>
                <td>{{ $user->username}}</td>
                <td>{{ $user->email}}</td>
                <td>
                    <a href="/user/{{ $user->id }}/edit" class="btn btn-info "><i class="fas fa-pen"></i></a>
                     <form action="/user/{{ $user->id }}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger border-0" onclick="return confirm('Sure?')">
                            <i class="fas fa-trash"></i>
                        </button>
                     </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection