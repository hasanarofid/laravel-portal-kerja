@extends('layouts.frontsub')
@section('content')
    <style>
        .main {
            height: 100vh;
            box-sizing: border-box;
        }

        .login-box {
            width: 500px;
            border: solid 1px;
            padding: 30px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
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
    <div class="login-box">
        <form action="{{ route('lupapassword') }}" method="post">
            @csrf
            <div>
                <h3>Lupas Password</h3>
            </div>
            <div>
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div>
                <label for="password" class="form-label">Password Baru</label>
                <div class="input-group">
                    <input type="password" name="password" id="new_password" class="form-control" required>
                    <span class="input-group-text" onclick="togglePasswordVisibility()">
                        <i class="fa fa-eye" id="eyeIcon"></i>
                    </span>
                </div>

            </div>
            <div>
                <label for="password" class="form-label">Konfirmasi Password</label>
                <div class="input-group">
                    <input type="password" name="password" id="confirm_password" class="form-control" required>
                    <span class="input-group-text" onclick="togglePasswordVisibility2()">
                        <i class="fa fa-eye" id="eyeIcon"></i>
                    </span>
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-primary form-control" id="submit_button"
                    style="border-radius: 10px; background-color: darkblue; margin-top: 10px;">Reset Password</button>
            </div>
            <div class="password-options text-center">
            </div>
            <div class="text-center">
                Belum punya akun? <a href="{{ url('/register') }}">Daftar</a>
            </div>
        </form>
    </div>
    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("new_password");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        }

        function togglePasswordVisibility2() {
            var passwordInput = document.getElementById("confirm_password");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        }
        document.getElementById('submit_button').addEventListener('click', function(event) {
            var newPassword = document.getElementById('new_password').value;
            var confirmPassword = document.getElementById('confirm_password').value;

            if (newPassword !== confirmPassword) {
                event.preventDefault(); // Mencegah form submit
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Password dan Konfirmasi Password tidak sama!'
                });

            }
        });
    </script>
@endsection
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
                text: '{{ session('success') }}',
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
