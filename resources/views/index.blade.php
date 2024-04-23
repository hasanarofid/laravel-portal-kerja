@extends('layouts.frontend')
@section('content')
<div class="row align-items-center">
    <div class="col">
        {{-- <h1>SISTEM KETENAGAKERJAAN ONLINE</h1> --}}
    </div>
    <div class="col">
        {{-- <img src="{{ asset('img/disnaker.png') }}" alt="disnaker" style="max-height: 300px;"> --}}
    </div>
</div>
<div class="container fluid">
    <div class="bg-success p-3">       
    <img src="{{ asset('img/disnaker.png') }}" class="fullscreen-image rounded mx-auto d-block" alt="disnaker" >
    <div class="card-body">
      <h5 class="card-title">Dinas Tenaga Kerja Kabupaten Bandung Barat</h5>
      <p class="card-text">Menurut Undang-Undang Nomor. 13 Tahun 2003 tentang Ketenagakerjaan Bab I pasal 1 ayat 2 disebutkan bahwa tenaga kerja adalah setiap orang yang mampu melakukan pekerjaan guna menghasilkan barang dan atau jasa baik untuk memenuhi kebutuhan sendiri maupun untuk masyarakat.</p>
    </div>
  </div>
  
  <div class="card" aria-hidden="true">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title placeholder-glow">
        <span class="placeholder col-6"></span>
      </h5>
      <p class="card-text placeholder-glow">
        <span class="placeholder col-7"></span>
        <span class="placeholder col-4"></span>
        <span class="placeholder col-4"></span>
        <span class="placeholder col-6"></span>
        <span class="placeholder col-8"></span>
      </p>
      <a class="btn btn-primary disabled placeholder col-6" aria-disabled="true"></a>
    </div>
  </div>
@endsection