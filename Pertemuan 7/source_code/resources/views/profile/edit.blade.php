{{-- resources/views/profile/edit.blade.php --}}
@extends('layouts.app')

@section('title', 'Edit Profil')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8 col-md-10">
        <div class="card-sakura">
            <div class="card-header-sakura">
                <h5><i class="fas fa-user-edit" style="color: #ff69b4;"></i> Edit Profil</h5>
            </div>

            @if (session('success'))
                <div class="alert-sakura">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PUT')

                <div style="margin-bottom: 1.2rem;">
                    <label for="name" style="display: block; font-weight: 600; font-size: 0.8rem; color: #ff69b4; margin-bottom: 0.3rem;">
                        <i class="fas fa-user"></i> Nama Lengkap
                    </label>
                    <input type="text" class="form-sakura" id="name" name="name" 
                           value="{{ old('name', $user->name) }}" required>
                </div>

                <div style="margin-bottom: 1.2rem;">
                    <label for="email" style="display: block; font-weight: 600; font-size: 0.8rem; color: #ff69b4; margin-bottom: 0.3rem;">
                        <i class="fas fa-envelope"></i> Email
                    </label>
                    <input type="email" class="form-sakura" id="email" name="email" 
                           value="{{ old('email', $user->email) }}" required>
                </div>

                <div style="display: flex; gap: 1rem; justify-content: flex-end; margin-top: 1.5rem; flex-wrap: wrap;">
                    <a href="{{ route('profile.edit') }}" class="btn-sakura btn-sakura-secondary">
                        <i class="fas fa-times"></i> Batal
                    </a>
                    <button type="submit" class="btn-sakura">
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection