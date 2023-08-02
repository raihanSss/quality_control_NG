@extends('layout.main')

@section('judul')
    Barang Masuk Area Scarp
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
      background-color: lightcoral;
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
      @foreach ($barang as $barang)
      @if ($barang->status == 'scrap')
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $barang->nobarang }}</td>
        <td>{{ $barang->name }}</td>
        <td>{{ date("d-m-Y", strtotime($barang->tanggal)) }}</td>
        <td>{{ $customers[$barang->customer_id] }}</td>
        <td>{{ $barang->status }}</td>
        @if ($authuser->divisi == "qa_staff")
            <td>
                @if ($barang->status_val == 'validated')
                    Validated
                @else
                    Not Validated
                @endif
            </td>
        @endif
        <td>
            @if ($authuser->divisi == "qa_leader" && $barang->status_val != 'validated')
                <form action="{{ route('barang.validateBarang', $barang) }}" method="POST"
                    id="validateForm{{ $barang->id }}">
                    @csrf
                    <button type="submit" class="btn btn-primary" id="validateButton{{ $barang->id }}">Validate</button>
                </form>

                <script>
                    document.getElementById('validateForm{{ $barang->id }}').addEventListener('submit',
                        function(event) {
                            event.preventDefault(); // Prevent form submission

                            // Disable the button
                            document.getElementById('validateButton{{ $barang->id }}').disabled = true;

                            // Change the button text to "Validated"
                            document.getElementById('validateButton{{ $barang->id }}').innerText = 'Validated';

                            // Submit the form after a short delay (optional)
                            setTimeout(function() {
                                event.target.submit();
                            }, 500); // Delay in milliseconds (e.g., 500ms = 0.5 seconds)
                        });
                </script>
            @endif
        </td>
    </tr>
@endif
@endforeach
</tbody>
</table>
@endsection
