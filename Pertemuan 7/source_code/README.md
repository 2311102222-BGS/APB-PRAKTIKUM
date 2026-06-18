<h3 align="center">LAPORAN PRAKTIKUM</h3>
<h3 align="center">APLIKASI BERBASIS PLATFORM</h3>
<h3 align="center">Modul 4 - 5</h3>
<h3 align="center">INVENTARISKU - MANAJEMEN PRODUK LARAVEL</h3>

<br>
<p align="center">
  <img src="https://raw.githubusercontent.com/Aplikasi-Berbasis-Platform-S1IF-11-04/Pertemuan-9-Mobile/refs/heads/main/Muhammad%20Rafiful%20Hana%20-%202311102227/source_code/output/logo%20telkom%20university.png" width="150"/>
</p>
<br>

<p align="center">
Disusun oleh:
<br><br>
Muhammad Daffa Bagus Jumantoro
<br>
2311102222
<br>
S1 IF-11-04
</p>

<br>

<p align="center">
Dosen Pengampu:
<br>
Cahyo Prihantoro, S.Kom., M.Eng
</p>

<br><br>

<p align="center">
PROGRAM STUDI S1 INFORMATIKA
<br>
FAKULTAS INFORMATIKA
<br>
TELKOM UNIVERSITY PURWOKERTO
<br>
2026
</p>

---

## Daftar Isi

1. [Deskripsi Program](#deskripsi-program)
2. [Fitur Utama](#fitur-utama)
3. [Teknologi](#teknologi)
4. [Struktur Database](#struktur-database)
5. [Struktur Folder](#struktur-folder)
6. [Endpoint API / Routes](#endpoint-api--routes)
7. [Kode Program](#kode-program)
8. [Cara Penggunaan](#cara-penggunaan)
9. [Troubleshooting](#troubleshooting)
10. [Referensi](#referensi)

---

## Deskripsi Program

Program ini merupakan sistem web manajemen inventaris produk bernama **InventarisKu** yang dibangun menggunakan framework **Laravel**. Aplikasi ini memiliki sistem autentikasi (registrasi dan login) serta fitur CRUD (Create, Read, Update, Delete) untuk mengelola data produk. Setiap pengguna hanya dapat mengelola produk miliknya sendiri (data terisolasi per pengguna). Desain menggunakan gaya **Sakura Theme** dengan tampilan yang modern, elegan, dan menggunakan warna pink yang lembut.

Aplikasi ini menampilkan:

- **Sistem autentikasi** lengkap dengan registrasi, login, dan logout
- **Manajemen produk** dengan operasi CRUD
- **Edit profil** pengguna
- **Tampilan Sakura** dengan gradient pink dan efek modern

Program dirancang dengan tema warna **Sakura** (pink #ff69b4, #ffb7c5) yang memberikan kesan elegan dan modern.

---

## Fitur Utama

1. **Sistem Autentikasi**
   - Registrasi pengguna baru dengan validasi
   - Login dengan email dan password
   - Logout (hanya muncul saat login)
   - Edit profil pengguna

2. **Manajemen Produk (CRUD)**
   - Menampilkan daftar produk dalam tabel
   - Menambah produk baru (nama, deskripsi, harga, stok)
   - Mengedit data produk
   - Menghapus produk dengan konfirmasi
   - Data produk terisolasi per pengguna (hanya pemilik yang bisa mengelola)

3. **Tampilan Sakura Theme**
   - Navbar dengan gradient pink (#ff69b4 - #ffb7c5)
   - Card dengan border pink dan shadow lembut
   - Tombol dengan gradient pink dan efek hover
   - Tabel dengan header gradient pink
   - Form input dengan border pink
   - Alert dengan aksen pink

4. **Keamanan**
   - Autentikasi Laravel Breeze
   - Middleware auth untuk proteksi route
   - Policy untuk kepemilikan data produk
   - CSRF protection

---

## Teknologi

**Backend:**
- Laravel 11
- PHP 8.2+
- MySQL / MariaDB

**Frontend:**
- Blade Templating Engine
- CSS3 Sakura Theme (tanpa framework CSS eksternal)
- Font Awesome 6
- Google Fonts (Quicksand)

---

## Struktur Database

### Tabel users

| Kolom             | Tipe           | Keterangan                         |
|-------------------|----------------|------------------------------------|
| id                | bigint(20)     | Primary key, auto increment        |
| name              | varchar(255)   | Nama lengkap pengguna              |
| email             | varchar(255)   | Unique, untuk login                |
| email_verified_at | timestamp      | Verifikasi email (nullable)        |
| password          | varchar(255)   | Hash password                      |
| remember_token    | varchar(100)   | Token remember me (nullable)       |
| created_at        | timestamp      | Waktu registrasi                   |
| updated_at        | timestamp      | Waktu update terakhir              |

### Tabel products

| Kolom        | Tipe           | Keterangan                         |
|--------------|----------------|------------------------------------|
| id           | bigint(20)     | Primary key, auto increment        |
| nama_produk  | varchar(255)   | Nama produk                        |
| deskripsi    | text           | Deskripsi produk (nullable)        |
| harga        | integer        | Harga produk                       |
| stok         | integer        | Jumlah stok (default 0)            |
| user_id      | bigint(20)     | Foreign key ke users.id            |
| created_at   | timestamp      | Waktu input produk                 |
| updated_at   | timestamp      | Waktu update terakhir              |

---

## Struktur Folder

```
source_code/
├── output/                            # Screenshot hasil aplikasi
│   ├── 1.register.png
│   ├── 2.login.png
│   ├── 3.dashboard-product.png
│   ├── 4.add-product.png
│   └── ...
│
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── ProductController.php    # Controller CRUD produk
│   │       └── ProfileController.php    # Controller profil pengguna
│   ├── Models/
│   │   ├── Product.php                  # Model produk
│   │   └── User.php                     # Model pengguna
│   └── Providers/
│
├── bootstrap/
├── config/
├── database/
│   └── migrations/
│       └── xxxx_create_products_table.php
│
├── public/
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php           # Layout utama Sakura Theme
│       ├── auth/
│       │   ├── login.blade.php
│       │   └── register.blade.php
│       ├── products/
│       │   ├── index.blade.php         # Daftar produk
│       │   ├── create.blade.php        # Tambah produk
│       │   └── edit.blade.php          # Edit produk
│       ├── dashboard.blade.php
│       └── profile/
│           └── edit.blade.php
│
├── routes/
│   └── web.php                         # Route definitions
│
├── storage/
├── composer.json
├── package.json
├── artisan
└── vite.config.js
```

---

## Endpoint API / Routes

| Method   | Endpoint            | Deskripsi                              | Middleware |
|----------|---------------------|----------------------------------------|------------|
| GET      | /                   | Halaman welcome                        | -          |
| GET      | /dashboard          | Dashboard (redirect ke produk)         | auth       |
| GET      | /login              | Halaman login                          | guest      |
| POST     | /login              | Proses login                           | guest      |
| GET      | /register           | Halaman register                       | guest      |
| POST     | /register           | Proses registrasi                      | guest      |
| POST     | /logout             | Proses logout                          | auth       |
| GET      | /products           | Daftar produk                          | auth       |
| GET      | /products/create    | Form tambah produk                     | auth       |
| POST     | /products           | Simpan produk baru                     | auth       |
| GET      | /products/{id}/edit | Form edit produk                       | auth       |
| PUT/PATCH| /products/{id}      | Update produk                          | auth       |
| DELETE   | /products/{id}      | Hapus produk                           | auth       |
| GET      | /profile            | Edit profil                            | auth       |
| PATCH    | /profile            | Update profil                          | auth       |

---

## Kode Program

### Controller ProductController.php

```php
<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('user_id', Auth::id())->latest()->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
        ]);

        Product::create([
            'nama_produk' => $request->nama_produk,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'user_id' => Auth::id()
        ]);

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit(Product $product)
    {
        if ($product->user_id !== Auth::id()) {
            abort(403, 'Anda tidak berwenang mengedit produk ini');
        }
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        if ($product->user_id !== Auth::id()) {
            abort(403, 'Anda tidak berwenang mengupdate produk ini');
        }

        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
        ]);

        $product->update($request->all());
        return redirect()->route('products.index')->with('success', 'Produk berhasil diupdate!');
    }

    public function destroy(Product $product)
    {
        if ($product->user_id !== Auth::id()) {
            abort(403, 'Anda tidak berwenang menghapus produk ini');
        }
        
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus!');
    }
}
```

### Model Product.php

```php
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable = [
        'nama_produk',
        'deskripsi',
        'harga',
        'stok',
        'user_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
```

### Routes (web.php)

```php
<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('products', ProductController::class);
});

require __DIR__.'/auth.php';
```

---

## Cara Penggunaan

1. **Registrasi Akun**
   - Buka halaman `/register`
   - Isi form nama, email, password, dan konfirmasi password
   - Klik tombol Register

2. **Login**
   - Buka halaman `/login`
   - Masukkan email dan password
   - Klik tombol Login

3. **Melihat Daftar Produk**
   - Setelah login, halaman utama menampilkan daftar produk
   - Setiap pengguna hanya melihat produk miliknya sendiri

4. **Menambah Produk**
   - Klik tombol "Tambah Produk" atau navigasi "Tambah"
   - Isi form nama produk, deskripsi, harga, dan stok
   - Klik "Simpan"

5. **Mengedit Produk**
   - Klik tombol "Edit" pada baris produk yang ingin diubah
   - Ubah data yang diperlukan
   - Klik "Update"

6. **Menghapus Produk**
   - Klik tombol "Hapus" pada baris produk
   - Data akan terhapus secara permanen

7. **Edit Profil**
   - Klik navigasi "Profile"
   - Ubah nama atau email
   - Klik "Update"

8. **Logout**
   - Klik tombol "Logout" di navbar (hanya muncul saat login)

---

## Troubleshooting

**Error 500 saat akses halaman**
- Pastikan sudah menjalankan `php artisan key:generate`
- Cek permission folder: `chmod -R 775 storage bootstrap/cache`

**Error Database**
- Pastikan MySQL server berjalan
- Cek kredensial database di file `.env`
- Pastikan database sudah dibuat: `CREATE DATABASE inventarisku;`
- Jalankan `php artisan migrate`

**Error 419 Page Expired**
- Pastikan CSRF token sudah disertakan dalam form
- Refresh halaman

**Error Class not found**
- Jalankan `composer dump-autoload`

---

## Referensi

- [Laravel 11 Documentation](https://laravel.com/docs/11.x)
- [Laravel Breeze](https://laravel.com/docs/11.x/starter-kits#laravel-breeze)
- [Font Awesome Icons](https://fontawesome.com/icons)
- [Google Fonts - Quicksand](https://fonts.google.com/specimen/Quicksand)
- [PHP Documentation](https://www.php.net/docs.php)
- [MySQL Documentation](https://dev.mysql.com/doc/)
- [Sakura Theme Design](https://www.color-hex.com/color-palette/1039499)
- Telkom University - Program Studi S1 Informatika