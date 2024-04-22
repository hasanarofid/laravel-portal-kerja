<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <title>Dashboard Pencari Kerja</title>
    <style>
        .navbar {
            border-bottom: 0.5px solid #808080; 
            padding-bottom: 20px;
            padding-top: 20px;
        }

        .navbar-custom {
            background-color: #333 !important;
            color: white;
            padding: 10px;
            text-align: center;
            border-bottom: 0.5px solid #808080; 
            padding-bottom: 20px;
            padding-top: 20px;
        }

        .text {
            padding-top: 30px;
            padding-left: 10px;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .navbar-nav .nav-item:hover .dropdown-content {
            display: block;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
        }

        #sidebar {
            background-color: #333;
            color: white;
            width: 200px;
            height: 100vh;
            padding-top: 20px;
            text-align: center;
        }

        #main-content {
            flex: 1;
            padding: 20px;
        }

        #sidebar a {
            display: block;
            padding: 10px;
            color: white;
            text-decoration: none;
            border-bottom: 1px solid #555;
        }

        #sidebar a:hover {
            background-color: #555;
        }
    </style>
</head>

<body>
    <div id="navbar" class="navbar navbar-expand-lg navbar-custom">
        <a class="navbar-brand" href="home">
            <img src="{{ asset('images/icon2.png') }}" alt="DISNAKER BLOG Logo" style="max-height: 30px;">
        </a>
    </div>

    <div id="sidebar">
        <a href="#">Dashboard Perusahaan</a>
        <a href="#">Users</a>
        <a href="#">Pekerjaan</a>
        <a href="#">Setting</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
