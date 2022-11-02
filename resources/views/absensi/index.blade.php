@extends('layouts.main')
@section('container')
        <!-- BEGIN: Content -->
        <div class="content">
            <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                <h2 class="text-lg font-medium mr-auto">
                    Absensi
                </h2>
        </div>
        
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ url('absensi-create') }}" class="btn btn-md btn-success mb-3">TAMBAH ABSENSI</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr class="text-center">
                                <th scope="col">NO</th>
                                <th scope="col">QR</th>
                                <th scope="col">NAMA</th>
                                <th scope="col">WAKTU</th>
                                <th scope="col">JABATAN</th>
                                <th class="text-center">AKSI</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($absensi as $absensi)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="text-center">
                                        <img src="{{ asset('public/absensi/').$absensi->qr }}" class="rounded" style="width: 150px">
                                    </td>
                                    <td>{{ $absensi->name }}</td>
                                    <td>{{ $absensi->waktu }}</td>
                                    <td>{{ $absensi->jabatan }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ url('absensi-destroy', $absensi->id) }}" method="POST">
                                            <a href="{{ url('absensi-edit', $absensi->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus Data?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data Absensi belum Tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
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

@endsection