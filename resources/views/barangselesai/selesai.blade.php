@extends('layout.main')

@section('judul')
    Barang Masuk Area Repair
@endsection

@section('isi')
<style>
    .custom-table {
      width: 70%;
      border-collapse: collapse;
    }
  
    .custom-table th,
    .custom-table td {
      padding: 10px;
      border: 1px solid #ddd;
      text-align: left;
    }
  
    .custom-table th {
      background-color: lightseagreen;
    }
  
    .custom-table tr:nth-child(even) {
      background-color: #f9f9f9;
    }
  
    .custom-table tr:hover {
      background-color: #e5e5e5;
    }
</style>

@if(session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
<button type="button" class="close" data-dismiss="alert">X</button>
    {{ session('success') }}
</div>
@endif

<div style="margin-bottom: 10px;">
    <a href="{{ route('barang.print') }}" class="btn btn-primary{{ $barang->where('status_val', '!=', 'validated')->isEmpty() ? ' disabled' : '' }}" style="margin-right: 10px;"><i class="fa fa-print"></i> Print</a>
</div>


<table class="custom-table">
    <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Kode Barang</th>
          <th scope="col">Nama Barang</th>
          <th scope="col">Tanggal Produksi</th>
          <th scope="col">Nama Customer</th>
          <th scope="col">Status Barang</th>
          @if ($authuser->divisi == "qa_staff" && $authuser->divisi == "qa_leader")
          <th scope="col">Status Validasi</th>
          @endif
          <th scope="col">Validasi</th>
        </tr>
    </thead>
    <tbody>
        <form action="{{ route('barangselesai/staff') }}" method="GET">
            <div class="row mb-3">
                <div class="col-auto">
                    <label for="filter_month" class="col-form-label">Filter Bulan:</label>
                </div>
                <div class="col-auto">
                    <select class="form-select" name="filter_month" id="filter_month" onchange="this.form.submit()">
                        <option value="">Semua Bulan</option>
                        @for ($i = 1; $i <= 12; $i++)
                            <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}" {{ $filterMonth == str_pad($i, 2, '0', STR_PAD_LEFT) ? 'selected' : '' }}>
                                {{ DateTime::createFromFormat('!m', $i)->format('F') }}
                            </option>
                        @endfor
                    </select>
                </div>
        </form>
        @if ($barang->isEmpty())
            <tr>
                <td colspan="8">Tidak ada data barang</td>
            </tr>
        @else
            @foreach ($barang as $barangItem)
                @if ($barangItem->status == 'repair')
                    <!-- Tampilkan data barang berdasarkan filter bulan -->
                    @if ($filterMonth == '' || date('m', strtotime($barangItem->tanggal)) == $filterMonth)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $barangItem->nobarang }}</td>
                            <td>{{ $barangItem->name }}</td>
                            <td>{{ date("d-m-Y", strtotime($barangItem->tanggal)) }}</td>
                            <td>{{ $customers[$barangItem->customer_id] }}</td>
                            <td>{{ $barangItem->status }}</td>
                            @if ($authuser->divisi == "qa_staff")
                                <td>
                                    @if ($barangItem->status_val == 'validated')
                                        Validated
                                    @else
                                        Not Validated
                                    @endif
                                </td>
                            @endif
                            <td>
                                @if ($authuser->divisi == "qa_leader" && $barangItem->status_val != 'validated')
                                    <form action="{{ route('barang.validateBarang', $barangItem) }}" method="POST"
                                        id="validateForm{{ $barangItem->id }}">
                                        @csrf
                                        <button type="submit" class="btn btn-primary" id="validateButton{{ $barangItem->id }}">Validate</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                        @push('script_validasi')
                        <script>
                            document.getElementById('validateForm{{ $barangItem->id }}').addEventListener('submit',
                                function(event) {
                                    event.preventDefault(); // Prevent form submission
    
                                    // Disable the button
                                    document.getElementById('validateButton{{ $barangItem->id }}').disabled = true;
    
                                    // Change the button text to "Validated"
                                    document.getElementById('validateButton{{ $barangItem->id }}').innerText = 'Validated';
    
                                    // Submit the form after a short delay (optional)
                                    setTimeout(function() {
                                        event.target.submit();
                                    }, 500); // Delay in milliseconds (e.g., 500ms = 0.5 seconds)
                                });
                        </script>
                        @endpush
                    @endif
                @endif
            @endforeach
        @endif
    </tbody>
    
</table>
@endsection

