{{-- resources/views/auth/register.blade.php --}}
@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
        <div class="card-sakura">
            <div class="card-header-sakura">
                <h5><i class="fas fa-user-plus" style="color: #ff69b4;"></i> Register</h5>
            </div>

            @if ($errors->any())
                <div class="alert-sakura alert-sakura-danger">
                    <i class="fas fa-exclamation-triangle"></i> 
                    <ul style="margin-top: 0.5rem; padding-left: 1.5rem;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div style="margin-bottom: 1.2rem;">
                    <label for="name" style="display: block; font-weight: 600; font-size: 0.8rem; color: #ff69b4; margin-bottom: 0.3rem;">
                        <i class="fas fa-user"></i> Nama Lengkap
                    </label>
                    <input type="text" class="form-sakura" id="name" name="name" 
                           value="{{ old('name') }}" placeholder="Masukkan nama" required autofocus>
                </div>

                <div style="margin-bottom: 1.2rem;">
                    <label for="email" style="display: block; font-weight: 600; font-size: 0.8rem; color: #ff69b4; margin-bottom: 0.3rem;">
                        <i class="fas fa-envelope"></i> Email
                    </label>
                    <input type="email" class="form-sakura" id="email" name="email" 
                           value="{{ old('email') }}" placeholder="email@domain.com" required>
                </div>

                <div style="margin-bottom: 1.2rem;">
                    <label for="password" style="display: block; font-weight: 600; font-size: 0.8rem; color: #ff69b4; margin-bottom: 0.3rem;">
                        <i class="fas fa-lock"></i> Password
                    </label>
                    <input type="password" class="form-sakura" id="password" name="password" 
                           placeholder="Minimal 8 karakter" required>
                </div>

                <div style="margin-bottom: 1.5rem;">
                    <label for="password_confirmation" style="display: block; font-weight: 600; font-size: 0.8rem; color: #ff69b4; margin-bottom: 0.3rem;">
                        <i class="fas fa-check-circle"></i> Konfirmasi Password
                    </label>
                    <input type="password" class="form-sakura" id="password_confirmation" 
                           name="password_confirmation" placeholder="Ulangi password" required>
                </div>

                <div style="display: flex; gap: 1rem; justify-content: space-between; flex-wrap: wrap;">
                    <button type="submit" class="btn-sakura">
                        <i class="fas fa-user-plus"></i> Daftar
                    </button>
                    <a href="{{ route('login') }}" class="btn-sakura btn-sakura-secondary">
                        <i class="fas fa-sign-in-alt"></i> Sudah punya akun?
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection