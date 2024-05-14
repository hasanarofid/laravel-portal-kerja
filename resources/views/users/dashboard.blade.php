@extends('layoutuser.index')
@section('title')
    SIKEREN | Dashboard
@endsection
@section('header')
    Dashboard
@endsection
@section('content')
    <div class="row">
        <div style="text-align: center" class="box-header with-border">
            <b><p style="font-size: 25px">PROSES REKRUTMENT</p></b>
        </div>

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>150</h3>

                    <p>Total</p>
                </div>
                <div class="icon">
                    <i class="fa fa-folder-open-o"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>53</h3>

                    <p>Terbaca</p>
                </div>
                <div class="icon">
                    <i class="fa fa-envelope-o"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>44</h3>

                    <p>Diterima</p>
                </div>
                <div class="icon">
                    <i class="fa fa-check-square-o"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>65</h3>

                    <p>Ditolak</p>
                </div>
                <div class="icon">
                    <i class="fa fa-ban"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <br>
    <div class="box box-primary" style="height: 220px;">
        <div class="box-header with-border">
            <b><p style="font-size: 20px">INFORMASI</p></b>
        </div>
    </div>
    <!-- /.row -->
@endsection
