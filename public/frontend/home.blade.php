<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        .navbar {
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

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .navbar-search {
            margin-left: auto;
        }
        
        .navbar-search input {
            border-radius: 15px;
        }
        .fullscreen-image {
            object-fit: cover;
            object-position: center;
            max-width: 300px;
            max-height: 300px;
        }
    </style>

    <title>Home Page</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="home">
                <img src="{{ asset('images/icon.png') }}" alt="DISNAKER BLOG Logo" style="max-height: 30px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="home">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ak1">AK1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="lowongan">LOWONGAN KERJA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pencari">PENCARI KERJA TERDAFTAR</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="dashboard_pencarikerja" role="button" id="pencariKerjaDropdown">
                            PENCARI KERJA
                        </a>
                        <div class="dropdown-content">
                            <a class="dropdown-item" href="register_pencarikerja">Daftar Akun</a>
                            <a class="dropdown-item" href="login">Login</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="dashboard_perusahaan
                        " role="button" id="perusahaanDropdown">
                            PERUSAHAAN
                        </a>
                        <div class="dropdown-content">
                            <a class="dropdown-item" href="register_perusahaan">Daftar Akun</a>
                            <a class="dropdown-item" href="login">Login</a>
                        </div>
                    </li>
                </ul>
                <div class="navbar-search">
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Cari Pekerjaan yang Kamu Inginkan" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="container text-center">
        <div class="row align-items-center">
            <div class="col">
                {{-- <h1>SISTEM KETENAGAKERJAAN ONLINE</h1> --}}
            </div>
            <div class="col">
                {{-- <img src="{{ asset('images/disnaker.png') }}" alt="disnaker" style="max-height: 300px;"> --}}
            </div>
        </div>
        <div class="container fluid">
            <div class="bg-success p-3">       
            <img src="{{ asset('images/disnaker.png') }}" class="fullscreen-image rounded mx-auto d-block" alt="disnaker" >
            <div class="card-body">
              <h5 class="card-title">Dinas Tenaga Kerja Kabupaten Bandung Barat</h5>
              <p class="card-text">Menurut Undang-Undang Nomor. 13 Tahun 2003 tentang Ketenagakerjaan Bab I pasal 1 ayat 2 disebutkan bahwa tenaga kerja adalah setiap orang yang mampu melakukan pekerjaan guna menghasilkan barang dan atau jasa baik untuk memenuhi kebutuhan sendiri maupun untuk masyarakat.</p>
            </div>
          </div>
          
          <div class="card" aria-hidden="true">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title placeholder-glow">
                <span class="placeholder col-6"></span>
              </h5>
              <p class="card-text placeholder-glow">
                <span class="placeholder col-7"></span>
                <span class="placeholder col-4"></span>
                <span class="placeholder col-4"></span>
                <span class="placeholder col-6"></span>
                <span class="placeholder col-8"></span>
              </p>
              <a class="btn btn-primary disabled placeholder col-6" aria-disabled="true"></a>
            </div>
          </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
