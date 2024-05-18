@extends('layoutuser.index')
@section('title')
    SIKEREN | Lowongan Perusahaan
@endsection
@section('header')
    Lowongan Perusahaan
@endsection
@section('content')
    <style>
        .table-responsive {
            overflow-x: auto;
            white-space: nowrap;
        }

        .table {
            width: 100%;
            min-width: 1900px;
            /* Adjust this value based on the content */
        }

        .table th,
        .table td {
            min-width: 10px;
            /* Adjust this value based on the content */
        }

        .table select,
        .table input,
        .table textarea {
            width: 100%;
        }
    </style>
    @include('users.carilowongan.searchdata')
    <br>
    @include('users.carilowongan.tabeldata')
@endsection
