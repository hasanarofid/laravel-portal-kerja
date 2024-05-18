@extends('layoutuser.index')
@section('title')
    SIKEREN | Undangan
@endsection
@section('header')
    Undangan
@endsection
@section('content')
    @include('perusahaan.undangan.tambahundangan')
    <br>
    @include('perusahaan.undangan.tabeldata')
@endsection
