@extends('layouts.app')

@section('content')
<div class="container">
    <div class="login-box">
        <form class="login-form" action="" method="POST">
            <h3>Register</h3>

            <div class="name">
                <input type="name" name="name" id="name" placeholder="Name">
            </div>

            <div class="email">
                <input type="email" name="email" id="email" placeholder="Email"required>
            </div>

            <div class="password">
                <input type="password" name="password" id="password" placeholder="Password">
            </div>

            <div class="confirm-password">
                <input type="password" name="confirm-password" id="confirm-password" placeholder="Confirm password">
            </div>

            <a class="btn" type="submit">Register</a>

        </form>
    </div>
</div>
@endsection
