@extends('layout.main')

@section('judul')
    <h1>Dashboard</h1>
@endsection

@section('isi')
@if($authuser->divisi == "admin")
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Selamat Datang, {{ $authuser->name }}</h3>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-12">            
              <div class="small-box bg-lightblue">
                <div class="inner">
                  <h3>{{ $userCount }}</h3>
                  <p>Users Registered</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <div class="small-box-footer"></div>
              </div>
            </div>
            
  

@elseif ($authuser->divisi == "qa_staff")
<div class="card">
  <div class="card-header">
    <h3 class="h1">Selamat Datang, {{ $authuser->name }}</h3>
    </div>
  </div>
  <div style="text-align: center; margin: auto; width: auto;">
    <h1>Start Testing The Products</h1>
   <!-- Main content -->
   <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>Barang Not Good</h3>

              <p>Products Reject</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{ url('barangproses') }}" class="small-box-footer">Show ALL<i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
  </div>

@elseif ($authuser->divisi == "qa_leader")
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Selamat Datang, {{ $authuser->name }}</h3>
    </div>
  </div>
<div class="card-body">
    Start creating your amazing spiderman
</div>
@endif
    
@endsection

