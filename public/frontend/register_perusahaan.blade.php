<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perusahaan | Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 120vh;
            max-width: 100vh;
            margin: 0 auto;
            margin: auto;
            border-spacing: 15px;
            border-radius: 8px;
            padding: 10px;
            box-sizing: border-box;
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
            color: #555; /* Set warna teks sama dengan warna teks input */
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
</head>
<body>
    <div class="container ">
        <div class="form-container ">
            <img src="images/icon.png" alt="Disnaker Logo" class="logo" style="max-height: 300px;">
            <form method="POST" action="{{ route('form.submit') }}">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>      
</body>
</html>
