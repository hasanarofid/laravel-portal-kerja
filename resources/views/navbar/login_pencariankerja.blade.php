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
        <form action="" method="post">
            @csrf
            <div>
                <h3>Login</h3>
            </div>
            <div>
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" class="form-control" required>
            </div>
            <div>
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-primary form-control"
                    style="border-radius: 10px; background-color: darkblue; margin-top: 10px;">Login</button>
            </div>
            <div class="password-options text-center">
                <label class="input-group-text">
                    <input type="checkbox" onclick="showPassword()"> Show Password
                </label>
                <a href="forgot">Lupa Password</a>

            </div>
            <div class="text-center">
                Belum punya akun? <a href="{{ url('/register') }}">Daftar</a>
            </div>
        </form>
    </div>
@endsection
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
