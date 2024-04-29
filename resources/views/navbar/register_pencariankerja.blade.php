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
            <form method="POST" action="#">
                @csrf
                <input type="text" name="name" placeholder="Nama">
                <input type="text" name="nik" placeholder="NIK">
                <input type="password" name="password" placeholder="Password" autocomplete="off">
                <input type="email" name="email" placeholder="Email">
                <input type="text" name="No Hp" placeholder="No Hp">
                <input type="text" name="Tempat Tanggal Lahir" placeholder="Tempat Tanggal Lahir">
                <textarea id="alamat" name="alamat" placeholder="Alamat"></textarea>
                <input type="text" name="akun media sosial" placeholder="Akun Media Sosial">

                <label for="category">Jenis Kelamin:</label>
                <select id="category" name="category">
                    <option value="">--Please choose an option--</option>
                    <option value="Cowo">Laki-Laki</option>
                    <option value="Cewe">Perempuan</option>
                </select>
                <!-- Tambahkan kelas CSS pada label untuk pilihan default -->
                <label for="category" class="select-label">Pendidikan Terakhir:</label>
                <select id="category" name="category">
                    <option value="" class="select-label">--Please choose an option--</option>
                    <option value="SD">SD</option>
                    <option value="SMP">SMP</option>
                    <option value="SMK/SMA">SMK/SMA</option>
                    <option value="KULIAH">S1, D3</option>
                </select>

                <textarea id="visi misi" name="visi misi" placeholder="Visi Misi"></textarea>

                <button type="submit">Register</button>
            </form>
        </div>
    </div>
@endsection
