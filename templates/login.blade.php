@extends('layout')

@section('navbar')
@endsection

@section('sidebar')
@endsection

@section('content.wrapper')
<!-- FIXME: Ali, belum bisa ke tengah kalo si sidebar dan navbar-nya gua ilangin -->
<div class="span-12 main">
@endsection

@section('title')
Login
@endsection

@section('content')
<div class="container">
    <div id="login">
        <div class="title">
            @section('login.header')
            <a href="{{ URL::site() }}">
                <img src="{{ URL::base('vendor/sleek-theme/img/xinix-logo.png') }}" alt="">
            </a>
            <h3>Bono Sleek Themes</h3>
            <h2>Login Page</h2>
            @show
        </div>
        <form method="POST">
            <div class="row">
                <div class="span-12">
                    <input type="email" name="email" value="" placeholder="Email Pengguna" class="">
                </div>
                <div class="span-12">
                    <input type="password" name="password" placeholder="Kata Sandi" class="password">
                </div>
                <div class="span-12">
                    <div class="row nav-login">
                        @section('login.footer')
                        <label class="placeholder">
                            Lupa password Anda? <a href="#" >Klik di sini</a>.
                        </label>
                        <label class="placeholder">
                            Belum memiliki akun? <a href="#" >Daftar di sini</a>.
                        </label>
                        @show
                    </div>
                </div>
                <div class="span-12">
                    @section('login.button')
                    <input type="submit" value="Sign In"></input>
                    @show
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
