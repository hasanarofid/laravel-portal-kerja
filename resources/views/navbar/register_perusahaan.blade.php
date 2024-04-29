@extends('layouts.frontsub')
@section('content')
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .container {
            margin: 0 auto;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .form-container {
            max-width: 600px;
            padding: 20px;
            background-color: #fff;
            width: 500px;
        }

        .logo {
            max-width: 100px;
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            outline: none;
            box-sizing: border-box;
            border-spacing: 15px;
            border-radius: 4px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            background-color: #fff;
            color: #555;
            /* Set warna teks sama dengan warna teks input */
        }

        button[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            width: 100%;
            border-radius: 4px;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            outline: none;
            box-sizing: border-box;
            border-spacing: 15px;
            border-radius: 4px;
        }
    </style>
    <div class="container ">
        <div class="form-container ">
            <img src="{{ asset('img/icon.png') }}" alt="Disnaker Logo" class="logo" style="max-height: 300px;">
            <form method="POST" action="#">
                @csrf
                <input type="text" id="name" name="name" placeholder="Nama Perusahaan">

                <input type="text" id="UsernameAdmin" name="username admin" placeholder="Username Admin">

                <input type="password" id="password" name="password" placeholder="Password">

                <input type="email" id="email" name="email" placeholder="Email perusahaan">

                <input type="text" id="NoHPAdmin" name="No Hp Admin" placeholder="No HP Admin">

                <input type="text" id="NoHPPerusahaan" name="No Hp Perusahaan" placeholder="No HP Perusahaan">

                <textarea id="Alamat" name="alamat" placeholder="Alamat"></textarea>

                <input type="text" id="BidangUsaha" name="Bidang Usaha" placeholder="Bidang Usaha">

                <input type="text" id="UrlPerusahaan" name="Url Perusahaan" placeholder="Url Perusahaan">

                <textarea id="Keterangan" name="Keterangan" placeholder="Keterangan"></textarea>

                <input type="text" name="Kode Perusahaan" placeholder="Kode Perusahaan">

                <button type="submit">Register</button>
            </form>
        </div>
    </div>
@endsection
