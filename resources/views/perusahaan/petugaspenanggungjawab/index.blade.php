@extends('layoutuser.index')
@section('title')
    SIKEREN | Petugas Penanggung Jawab
@endsection
@section('header')
    Petugas Penanggung Jawab
@endsection
@section('content')
    @include('perusahaan.petugaspenanggungjawab.petugaspenanggungjawab')
    <br>
    @include('perusahaan.petugaspenanggungjawab.tabelberitaacara')
@endsection
@section('js')
    @include('perusahaan.petugaspenanggungjawab.jsFunction')
@endsection