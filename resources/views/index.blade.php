<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <a href="{{ url('/submit-data') }}" class="btn btn-success">Tambah Data</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Tanggal Lahir</th>
                    <th>Gaji</th>
                    <th>Status Karyawan</th>
                </tr>
            </thead> 
            <tbody>
                @forelse( $karyawan as $key => $karyawan )
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $karyawan->nama }}</td>
                        <td>{{ $karyawan->tanggal_lahir }}</td>
                        <td>{{ $karyawan->gaji }}</td>
                        <td>{{ $karyawan->status_karyawan }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4"> Data not found! </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <script>
        
    </script>
</body>
</html>
