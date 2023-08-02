<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Data Barang Repair</title>
</head>
<body style="display: flex; flex-direction: column; align-items: center; justify-content: center; height: 100vh; margin: 0;">
  <h1 style="text-align: center;">Data Barang Repair</h1>
  <p style="text-align: center;">PT REKADAYA MULTI ADIPRIMA</p>
  <p style="text-align: center;">Jl. Nusa Indah No.55, RT.1/RW.4, Nagrak, Kec. Gn. Putri, Kabupaten Bogor, Jawa Barat 16967</p>
    <table style="border-collapse: collapse;">
      <thead style="background-color: lightseagreen;">
        <tr>
            <th style="border: 1px solid lightseagreen; padding: 5px;">Kode Barang</th>
            <th style="border: 1px solid lightseagreen; padding: 5px;">Nama Barang</th>
            <th style="border: 1px solid lightseagreen; padding: 5px;">Tanggal</th>
            <th style="border: 1px solid lightseagreen; padding: 5px;">Nama Customer</th>
            <th style="border: 1px solid lightseagreen; padding: 5px;">Kuantitas</th>
            <th style="border: 1px solid lightseagreen; padding: 5px;">Keterangan</th>
            <th style="border: 1px solid lightseagreen; padding: 5px;">Status</th>
        </tr>
    </thead>
    
        <tbody>
          @foreach($barang as $item)
          <tr>
            <td style="border: 1px solid black; padding: 5px;">{{ $item->nobarang}}</td>
            <td style="border: 1px solid black; padding: 5px;">{{ $item->name }}</td>
            <td style="border: 1px solid black; padding: 5px;">{{ $item->tanggal }}</td>
            <td style="border: 1px solid black; padding: 5px;">{{ $customers[$item->customer_id] }}</td>
            <td style="border: 1px solid black; padding: 5px;">{{ $item->kuantitas }}</td>
            <td style="border: 1px solid black; padding: 5px;">{{ $item->keterangan }}</td>
            <td style="border: 1px solid black; padding: 5px;">{{ $item->status }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>

      <div class="footer">
        Printed by: {{ $name }}
    </div>
      
</body>
</html>
