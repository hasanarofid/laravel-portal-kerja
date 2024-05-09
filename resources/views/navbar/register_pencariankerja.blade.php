@extends('layouts.frontsub')
@section('content')
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .container {
            /* max-width: 600px; */
            margin: 0 auto;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); */
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
            border-radius: 8px;
        }

        button[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            width: 100%;
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
            border-radius: 8px;
        }

        .row {
            display: flex;
            justify-content: space-between;
        }

        .column {
            width: 33%;
            padding: 10px;
        }

        .section {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            border-spacing: 15px;
            border-radius: 8px;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            outline: none;
            box-sizing: border-box;
            border-spacing: 15px;
            border-radius: 8px;
        }

        /* Tambahkan kelas CSS untuk label pada pilihan default */
        .select-label {
            color: #555;
        }
    </style>
    <div class="container">
        <div class="form-container">
            <img src="{{ asset('img/icon.png') }}" alt="Disnaker Logo" class="logo" style="max-height: 300px;">
            <form action="{{ route('register-proses') }}" method="post">
                @csrf
                <input type="text" name="name" placeholder="Nama" required>
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" autocomplete="off" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="text" name="nik" placeholder="NIK" pattern="[0-9]*" maxlength="16" title="Masukkan hanya angka dan maksimal 16 karakter" required>
                <input type="text" name="no_tlp" pattern="[0-9]*" placeholder="No Hp" required>
                <textarea id="alamat" name="alamat" placeholder="Alamat" required></textarea>
                <button type="submit">Register</button>
            </form>
        </div>
    </div>
@endsection
