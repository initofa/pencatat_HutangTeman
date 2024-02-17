<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Data Hutang Teman</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        @if ($hutangTeman->bukti_transaksi)
                            <img src="{{ asset('storage/hutangtemans/'.$hutangTeman->bukti_transaksi) }}" class="w-100 rounded">
                        @else
                            <p>Tidak ada bukti transaksi.</p>
                        @endif
                        <hr>
                        <h4>Nama Teman: {{ $hutangTeman->nama_teman }}</h4>
                        <p class="mt-3">
                            Tanggal Peminjaman: {{ $hutangTeman->tanggal_peminjaman }}
                        </p>
                        <p class="mt-3">
                            Keterangan: {{ $hutangTeman->keterangan }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
