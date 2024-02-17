<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pencatat Hutang Teman</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>
        th {
            text-align: center;
        }
    </style>
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Pencatat Hutang Teman</h3>   
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('hutangtemans.create') }}" class="btn btn-md btn-success mb-3">TAMBAH DATA</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">NAMA TEMAN</th>
                                    <th scope="col">TANGGAL PEMINJAMAN</th>
                                    <th scope="col">BUKTI TRANSAKSI</th>
                                    <th scope="col">KETERANGAN</th>
                                    <th scope="col">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($hutangTemans as $hutangTeman)
                                    <tr>
                                        <td>{{ $hutangTeman->nama_teman }}</td>
                                        <td>{{ date('d-m-Y', strtotime($hutangTeman->tanggal_peminjaman)) }}</td>
                                        <td>
                                            @if ($hutangTeman->bukti_transaksi)
                                                <img src="{{ asset('storage/hutangtemans/'.$hutangTeman->bukti_transaksi) }}" class="rounded" style="width: 150px">
                                            @else
                                                Tidak ada bukti transaksi.
                                            @endif
                                        </td>
                                        <td>{{ $hutangTeman->keterangan }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('hutangtemans.destroy', $hutangTeman->id) }}" method="POST">
                                                <a href="{{ route('hutangtemans.show', $hutangTeman->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                                <a href="{{ route('hutangtemans.edit', $hutangTeman->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            <div class="alert alert-danger">
                                                Data Hutang Teman belum Tersedia.
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>  
                        {{ $hutangTemans->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script>

</body>
</html>
