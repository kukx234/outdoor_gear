@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="login-box">
            <form class="login-form" action="" method="POST">
                <h3>Login</h3>

                <div class="email">
                    <input type="email" name="email" id="email" placeholder="Email" required>
                </div>

                <div class="password">
                    <input type="password" name="password" id="password" placeholder="Password">
                </div>

                <a class="btn" type="submit">Login</a>

                <div class="login-links">
                    <a href="#">Forgot your password?</a>
                    <a href="#">Don't have account?</a>
                </div>

            </form>
        </div>
    </div>
@endsection
