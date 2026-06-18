{{-- resources/views/dashboard.blade.php --}}
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="card-sakura">
    <div class="card-header-sakura">
        <h5><i class="fas fa-chart-pie" style="color: #ff69b4;"></i> Dashboard</h5>
    </div>
    <div style="text-align: center; padding: 2rem;">
        <i class="fas fa-boxes" style="font-size: 4rem; color: #ffb7c5; display: block; margin-bottom: 1rem;"></i>
        <h3 style="color: #ff69b4; font-weight: 700; margin-bottom: 0.5rem;">Selamat Datang di InventarisKu</h3>
        <p style="color: #999;">Anda berhasil login ke sistem manajemen inventaris</p>
    </div>
</div>
@endsection