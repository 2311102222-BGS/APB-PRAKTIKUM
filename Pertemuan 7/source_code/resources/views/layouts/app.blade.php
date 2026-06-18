{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>InventarisKu - @yield('title', 'Manajemen Produk')</title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #fff0f5 0%, #ffe4ec 50%, #ffd6e0 100%);
            font-family: 'Quicksand', sans-serif;
            min-height: 100vh;
        }

        .navbar-sakura {
            background: linear-gradient(135deg, #ff69b4 0%, #ffb7c5 100%);
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 20px rgba(255, 105, 180, 0.3);
        }

        .navbar-sakura .brand {
            color: white;
            font-size: 1.4rem;
            font-weight: 700;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.6rem;
        }

        .navbar-sakura .brand i {
            font-size: 1.6rem;
        }

        .navbar-sakura .nav-links {
            display: flex;
            gap: 1.5rem;
            align-items: center;
        }

        .navbar-sakura .nav-links a {
            color: rgba(255,255,255,0.9);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            padding: 0.5rem 1rem;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .navbar-sakura .nav-links a:hover {
            background: rgba(255,255,255,0.2);
            color: white;
            transform: translateY(-1px);
        }

        .card-sakura {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 10px 40px rgba(255, 105, 180, 0.1);
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 183, 197, 0.3);
        }

        .card-sakura:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 50px rgba(255, 105, 180, 0.15);
        }

        .card-header-sakura {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #ffb7c5;
        }

        .card-header-sakura h5 {
            font-size: 1.1rem;
            font-weight: 700;
            color: #ff69b4;
        }

        .btn-sakura {
            background: linear-gradient(135deg, #ff69b4, #ffb7c5);
            color: white;
            border: none;
            padding: 0.6rem 1.5rem;
            border-radius: 12px;
            font-family: 'Quicksand', sans-serif;
            font-weight: 600;
            font-size: 0.85rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            box-shadow: 0 4px 15px rgba(255, 105, 180, 0.3);
            text-decoration: none;
        }

        .btn-sakura:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255, 105, 180, 0.4);
        }

        .btn-sakura-secondary {
            background: rgba(255, 105, 180, 0.1);
            border: 1px solid #ffb7c5;
            color: #ff69b4;
            box-shadow: none;
        }

        .btn-sakura-secondary:hover {
            background: rgba(255, 105, 180, 0.15);
            box-shadow: 0 4px 15px rgba(255, 105, 180, 0.1);
        }

        .btn-sakura-danger {
            background: linear-gradient(135deg, #e74c3c, #c0392b);
            box-shadow: 0 4px 15px rgba(231, 76, 60, 0.3);
        }

        .btn-sakura-sm {
            padding: 0.4rem 0.9rem;
            font-size: 0.75rem;
        }

        .form-sakura {
            background: rgba(255, 255, 255, 0.9);
            border: 2px solid #ffb7c5;
            border-radius: 12px;
            padding: 0.7rem 1rem;
            font-family: 'Quicksand', sans-serif;
            font-size: 0.9rem;
            width: 100%;
            transition: all 0.3s ease;
            outline: none;
            color: #333;
        }

        .form-sakura:focus {
            border-color: #ff69b4;
            box-shadow: 0 0 0 3px rgba(255, 105, 180, 0.15);
        }

        .form-sakura::placeholder {
            color: #ccc;
        }

        .table-sakura {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.85rem;
        }

        .table-sakura thead {
            background: linear-gradient(135deg, #ff69b4, #ffb7c5);
            color: white;
        }

        .table-sakura th {
            padding: 1rem 0.8rem;
            text-align: left;
            font-weight: 600;
            font-size: 0.8rem;
            letter-spacing: 0.5px;
        }

        .table-sakura td {
            padding: 0.8rem;
            border-bottom: 1px solid #ffe4ec;
            vertical-align: middle;
        }

        .table-sakura tbody tr:hover {
            background: rgba(255, 105, 180, 0.05);
        }

        .badge-sakura {
            display: inline-block;
            background: rgba(255, 105, 180, 0.1);
            color: #ff69b4;
            padding: 0.15rem 0.6rem;
            font-size: 0.7rem;
            margin: 0.1rem 0.2rem;
            border-radius: 6px;
            font-weight: 600;
        }

        .alert-sakura {
            background: rgba(255, 105, 180, 0.1);
            border-left: 4px solid #ff69b4;
            color: #ff69b4;
            padding: 0.8rem 1.5rem;
            border-radius: 12px;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .alert-sakura-danger {
            background: rgba(231, 76, 60, 0.1);
            border-left-color: #e74c3c;
            color: #e74c3c;
        }

        .container-main {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .page-title {
            color: #ff69b4;
            font-size: 1.6rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        .page-title i {
            margin-right: 0.5rem;
        }

        .empty-state {
            text-align: center;
            padding: 3rem;
        }

        .empty-state i {
            font-size: 3rem;
            color: #ffb7c5;
            display: block;
            margin-bottom: 1rem;
        }

        .empty-state h5 {
            color: #ff69b4;
            font-weight: 600;
        }

        .empty-state p {
            color: #ccc;
            font-size: 0.85rem;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -0.5rem;
        }

        .row > * {
            padding: 0 0.5rem;
        }

        .justify-content-center {
            justify-content: center;
        }

        .col-md-6 { flex: 0 0 50%; max-width: 50%; }
        .col-lg-5 { flex: 0 0 41.666%; max-width: 41.666%; }
        .col-lg-8 { flex: 0 0 66.666%; max-width: 66.666%; }
        .col-md-10 { flex: 0 0 83.333%; max-width: 83.333%; }

        @media (max-width: 768px) {
            .navbar-sakura {
                flex-direction: column;
                gap: 1rem;
                padding: 1rem;
            }
            .navbar-sakura .nav-links {
                flex-wrap: wrap;
                justify-content: center;
            }
            .container-main {
                margin: 1rem auto;
            }
            .col-md-6, .col-lg-5, .col-lg-8, .col-md-10 {
                flex: 0 0 100%;
                max-width: 100%;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar-sakura">
        <a href="{{ route('dashboard') }}" class="brand">
            <i class="fas fa-boxes"></i> InventarisKu
        </a>
        <div class="nav-links">
            <a href="{{ route('dashboard') }}"><i class="fas fa-chart-pie"></i> Dashboard</a>
            <a href="{{ route('products.index') }}"><i class="fas fa-cube"></i> Produk</a>
            <a href="{{ route('profile.edit') }}"><i class="fas fa-user"></i> Profil</a>
            @auth
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="btn-sakura btn-sakura-secondary" style="padding: 0.5rem 1rem; font-size: 0.85rem;">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
            @endauth
        </div>
    </nav>

    <div class="container-main">
        @if (session('success'))
            <div class="alert-sakura">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert-sakura alert-sakura-danger">{{ session('error') }}</div>
        @endif

        @yield('content')
    </div>
</body>
</html>