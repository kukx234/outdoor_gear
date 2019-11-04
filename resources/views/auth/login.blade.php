@extends('layouts.adminnav')

@section('content')
@include('Admin.validation_error')

    <div class="container">
        <div class="login-box">
            <form class="login-form" action="{{ route('login') }}" method="POST">
                @csrf
                <h3>Login</h3>

                <div class="email">
                    <input type="email" name="email" id="email" placeholder="Email" required>
                </div>

                <div class="password">
                    <input type="password" name="password" id="password" placeholder="Password" required>
                </div>

                <button class="btn" type="submit">Login</button>

                <div class="login-links">
                    <a href={{ route('password.request') }}>Forgot your password?</a>
                    <a href="{{ route('register') }}">Don't have account?</a>
                </div>

            </form>
        </div>
    </div>
@endsection
