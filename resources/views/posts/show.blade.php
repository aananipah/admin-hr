@extends('layouts.main')
@section('container')
        <!-- BEGIN: Content -->
        <div class="content">
            <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                <h2 class="text-lg font-medium mr-auto">
                   Detail Data Karyawan
                </h2>
        </div>
  
<div class="card" style="margin:20px;">
  <div class="card-header">Detail Data Karyawan</div>
  <div class="card-body">
        <div class="card-body">
        <p class="card-text">Name : {{ $post->name }}</p>
        <p class="card-text">Email : {{ $post->email }}</p>
        <p class="card-text">No Telpon : {{ $post->phone }}</p>
        <p class="card-text">Slip Gaji : {{ $post->slip_gaji }}</p>
  </div>
    </hr>

    <a class="btn btn-primary" href="{{ route('posts.index') }}"> Kembali </a>
  </div>
</div>
@endsection
   
  
