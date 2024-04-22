<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan | Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
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
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <img src="images/icon.png" alt="Disnaker Logo" class="logo" style="max-height: 300px;">
            <form method="POST" action="{{ route('form.submit') }}">
                @csrf
                <input type="text" name="name" placeholder="Name">
                <input type="text" name="username" placeholder="Username">
                <input type="email" name="email" placeholder="Email Address">
                <input type="password" name="password" placeholder="Password">
                <input type="password" name="confirm_password" placeholder="Confirm Password">
                
                <!-- Panggil radiobutton -->
                @include('radiobutton', [
                    'id' => 'example1',
                    'name' => 'example',
                    'value' => '1',
                    'label' => 'Disnaker',
                    'checked' => false,
                ])

                <!-- Panggil radiobutton -->
                @include('radiobutton', [
                    'id' => 'example2',
                    'name' => 'example',
                    'value' => '2',
                    'label' => 'Perusahaan',
                    'checked' => false,
                ])

                <!-- Panggil radiobutton -->
                @include('radiobutton', [
                    'id' => 'example3',
                    'name' => 'example',
                    'value' => '3',
                    'label' => 'Sekolah',
                    'checked' => false,
                ])

                <!-- Panggil radiobutton -->
                @include('radiobutton', [
                    'id' => 'example4',
                    'name' => 'example',
                    'value' => '4',
                    'label' => 'Siswa',
                    'checked' => false,
                ])

                <button type="submit">Register</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>      
</body>
</html>
