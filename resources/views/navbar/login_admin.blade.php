<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    {{-- <link href="/css/login.css"> --}}
</head>

<style>
    .main {
        height: 100vh;
        box-sizing: border-box;
    }

    .login-box {
        width: 500px;
        border: solid 1px;
        padding: 30px;
    }

    form div {
        margin-bottom: 15px;
    }

    .text-right {
        text-align: right;
    }

    .text-center {
        text-align: center;
    }

    /* Tambahkan gaya untuk memposisikan opsi Show Password dan Lupa Password sejajar */
    .password-options {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
</style>

<body>
    <div class="main d-flex flex-column justify-content-center align-items-center">
        <div></div>
        <div class="login-box">
            <form action="{{ route('login-proses-admin') }}" method="post">
                @csrf
                <div>
                    <h3>Login</h3>
                </div>
                <div>
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                    @error('name')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
                <div>
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    @error('password')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="btn btn-primary form-control">Login</button>
                </div>
                <div class="password-options text-center">
                    <label class="input-group-text">
                        <input type="checkbox" onclick="showPassword()"> Show Password
                    </label>
                    {{-- <a href="forgot">Lupa Password</a> --}}

                </div>
                <div class="text-center">
                    {{-- Belum punya akun? <a href="register">Daftar</a> --}}
                </div>
            </form>
        </div>
    </div>
    @if ($errors->any())
        <script stype="text/javascript">
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    text: 'Maaf, sepertinya ada beberapa kesalahan yang terdeteksi, harap coba lagi.',
                    icon: 'error',
                    buttonsStyling: !1,
                    confirmButtonText: "Lanjutkan",
                    customClass: {
                        confirmButton: "btn btn-danger"
                    },
                    allowOutsideClick: false,
                });
            });
        </script>
    @endif
    @if (Session::has('success'))
        <script stype="text/javascript">
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: "SELAMAT!",
                    text: "Anda Berhasil Keluar",
                    icon: "success"
                });
            });
        </script>
    @endif
    @if (Session::has('error'))
        <script stype="text/javascript">
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    text: '{{ session('error') }}',
                    icon: 'error',
                    buttonsStyling: !1,
                    confirmButtonText: "Lanjutkan",
                    customClass: {
                        confirmButton: "btn btn-danger"
                    },
                    allowOutsideClick: false,
                });
            });
        </script>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-9pXtpu1T/SHfrb9J1wXZTRXb8Q7xI6s7G4MehjSq4CZM9/yf7pGmPhTpfXWsh0Q6" crossorigin="anonymous">
    </script>

    <script>
        function showPassword() {
            var passwordInput = document.getElementById("password");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
