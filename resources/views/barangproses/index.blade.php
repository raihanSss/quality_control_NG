@extends('layout.main')

@section('judul')
    Halaman Barang 
@endsection

@section('isi')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap 
    align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Daftar Barang Not GOOD</h1>
    </div>

    @if(session()->has('success'))
    <div class="alert alert-success col-lg-8" role="alert">
    <button type="button" class="close" data-dismiss="alert">X</button>
        {{ session('success') }}
    </div>
    @endif
    @if(session()->has('error'))
    <div class="alert alert-danger col-lg-8" role="alert">
        <button type="button" class="close" data-dismiss="alert">X</button>
        {{ session('error') }}
    </div>
@endif


    <table class="table table-striped" style="width: 75%">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Kode Barang</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Tanggal Produksi</th>
                <th scope="col">Nama Customer</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barang as $barang)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $barang->nobarang}}</td>
                    <td>{{ $barang->name}}</td>
                    <td>{{ date("d-m-Y", strtotime($barang->tanggal)) }}</td>
                    <td>{{ $customers[$barang->customer_id] }}</td>
                    <td>{{ $barang->keterangan }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            @if(!$barang->status)
                                <form id="repair-form" action="{{ route('barang.update', ['id' => $barang->id, 'status' => 'repair']) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-primary repair-button"><i class="fa fa-check"></i> Repair</button>
                                    <input type="hidden" name="status" value="selesai">
                                </form>
                                <form id="scrap-form" action="{{ route('barang.update', ['id' => $barang->id, 'status' => 'scrap']) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-warning scrap-button"><i class="fa fa-times"></i> Scrap</button>
                                    <input type="hidden" name="status" value="selesai">
                                </form>
                            @else
                                <form id="repair-form" action="{{ route('barang.update', ['id' => $barang->id, 'status' => 'repair']) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-primary repair-button" {{ $barang->status != 'repair' ? 'style=display:none' : '' }} {{ $barang->status == 'repair' ? 'disabled' : '' }}><i class="fa fa-check"></i> Repair</button>
                                    <input type="hidden" name="status" value="selesai">
                                </form>
                                <form id="scrap-form" action="{{ route('barang.update', ['id' => $barang->id, 'status' => 'scrap']) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-warning scrap-button" {{ $barang->status != 'scrap' ? 'style=display:none' : '' }} {{ $barang->status == 'scrap' ? 'disabled' : '' }}><i class="fa fa-times"></i> Scrap</button>
                                    <input type="hidden" name="status" value="selesai">
                                </form>
                            @endif
                        </div>
                    </td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

@push('script_barang')
<script>
    const repairButton = document.querySelector('.repair-button');
    const scrapButton = document.querySelector('.scrap-button');
    const repairForm = document.getElementById('repair-form');
    const scrapForm = document.getElementById('scrap-form');

    repairForm.addEventListener('submit', function(event) {
        event.preventDefault();
        repairButton.disabled = true;
        scrapButton.style.display = 'none';
        repairForm.submit();
    });

    scrapForm.addEventListener('submit', function(event) {
        event.preventDefault();
        scrapButton.disabled = true;
        repairButton.style.display = 'none';
        scrapForm.submit();
    });
</script>
@endpush