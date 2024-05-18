@extends('layoutuser.index')
@section('title')
    SIKEREN | Pelamar
@endsection
@section('header')
    Pelamar
@endsection
@section('content')
    @include('perusahaan.pelamar.tambahpelamar')
    <br>
    @include('perusahaan.pelamar.datapelamar')
@endsection
