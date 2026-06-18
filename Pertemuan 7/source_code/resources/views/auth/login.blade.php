{{-- resources/views/auth/login.blade.php --}}
@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
        <div class="card-sakura">
            <div class="card-header-sakura">
                <h5><i class="fas fa-sign-in-alt" style="color: #ff69b4;"></i> Login</h5>
            </div>

            @if ($errors->any())
                <div class="alert-sakura alert-sakura-danger">
                    <i class="fas fa-exclamation-triangle"></i> 
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div style="margin-bottom: 1.2rem;">
                    <label for="email" style="display: block; font-weight: 600; font-size: 0.8rem; color: #ff69b4; margin-bottom: 0.3rem;">
                        <i class="fas fa-envelope"></i> Email
                    </label>
                    <input type="email" class="form-sakura" id="email" name="email" 
                           value="{{ old('email') }}" placeholder="email@domain.com" required autofocus>
                </div>

                <div style="margin-bottom: 1.2rem;">
                    <label for="password" style="display: block; font-weight: 600; font-size: 0.8rem; color: #ff69b4; margin-bottom: 0.3rem;">
                        <i class="fas fa-lock"></i> Password
                    </label>
                    <input type="password" class="form-sakura" id="password" name="password" 
                           placeholder="Masukkan password" required>
                </div>

                <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.5rem;">
                    <label style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.85rem; cursor: pointer; color: #ff69b4;">
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> 
                        Ingat saya
                    </label>
                </div>

                <div style="display: flex; gap: 1rem; justify-content: space-between; flex-wrap: wrap;">
                    <button type="submit" class="btn-sakura">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </button>
                    <a href="{{ route('register') }}" class="btn-sakura btn-sakura-secondary">
                        <i class="fas fa-user-plus"></i> Belum punya akun?
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection