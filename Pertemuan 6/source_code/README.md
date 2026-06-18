<h3 align="center">LAPORAN PRAKTIKUM</h3>
<h3 align="center">APLIKASI BERBASIS PLATFORM</h3>
<h3 align="center">Modul 10 - 11</h3>
<h3 align="center">MANAJEMEN DATA MAHASISWA - LARAVEL CRUD</h3>

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
4. [Struktur Database (JSON)](#struktur-database-json)
5. [Struktur Folder](#struktur-folder)
6. [Endpoint API](#endpoint-api)
7. [Kode Program](#kode-program)
8. [Cara Penggunaan](#cara-penggunaan)
9. [Troubleshooting](#troubleshooting)
10. [Referensi](#referensi)

---

## Deskripsi Program

Program ini merupakan aplikasi web manajemen data mahasiswa dengan fitur **CRUD (Create, Read, Update, Delete)** yang dibangun menggunakan framework **Laravel**. Data disimpan dalam file **JSON lokal** sehingga tidak memerlukan database MySQL/PostgreSQL. Aplikasi ini menggunakan desain **Glassmorphism** dengan tampilan yang modern, elegan, dan transparan.

Aplikasi ini menampilkan:

- **Kartu identitas** mahasiswa dengan nama dan NIM
- **Tabel data mahasiswa** dengan operasi CRUD
- **Modal form** untuk tambah dan edit data
- **Toast notification** untuk feedback operasi
- **Validasi input** di sisi server

Program dirancang dengan tema warna **Glassmorphism** (biru-ungu gradient) yang memberikan kesan modern dan elegan.

---

## Fitur Utama

1. **Manajemen Data Mahasiswa**
   - Menampilkan daftar mahasiswa dalam tabel
   - Menambah data mahasiswa baru
   - Mengedit data mahasiswa yang sudah ada
   - Menghapus data mahasiswa

2. **Form Input Data**
   - Nama lengkap
   - NIM (10 digit numerik)
   - Email
   - Jenis kelamin (Pria/Wanita)
   - Hobi (checkbox multi-pilihan: Coding, Gaming, Membaca, Menulis, Musik, Traveling, Olahraga, Fotografi, Memasak)
   - Pendidikan (D3, S1, S2, S3)

3. **Tampilan Glassmorphism**
   - Background gradient biru-ungu (#1a1a2e - #0f3460)
   - Card dengan efek transparan dan backdrop-filter blur
   - Tombol dengan gradient dan efek hover
   - Modal dengan desain glass effect
   - Tag hobi dengan gaya modern

4. **Fitur CRUD**
   - Create: Tambah data mahasiswa via modal form
   - Read: Tampilkan data dalam tabel dinamis
   - Update: Edit data melalui modal yang sama
   - Delete: Hapus data dengan konfirmasi

5. **Teknis**
   - Penyimpanan data menggunakan file JSON (`storage/app/mahasiswa.json`)
   - Validasi input di sisi server
   - AJAX request untuk operasi CRUD tanpa reload
   - Toast notification feedback
   - Responsive design

---

## Teknologi

**Backend:**
- Laravel 11
- PHP 8.2+
- File JSON sebagai database

**Frontend:**
- Blade Templating Engine
- jQuery 3.7
- CSS3 Glassmorphism Design
- Font Awesome 6
- Google Fonts (Poppins)

---

## Struktur Database (JSON)

Data disimpan dalam file `storage/app/mahasiswa.json` dengan struktur sebagai berikut:

```json
[
    {
        "id": 1,
        "nama": "Muhammad Daffa Bagus Jumantoro",
        "nim": 2311102222,
        "email": "daffa@example.com",
        "jenis_kelamin": "Pria",
        "hobi": ["Coding", "Gaming"],
        "pendidikan": "S1"
    }
]
```

### Field Description

| Field          | Tipe Data   | Keterangan                        |
|----------------|-------------|-----------------------------------|
| id             | integer     | Auto increment, primary key       |
| nama           | string      | Nama lengkap mahasiswa            |
| nim            | integer     | NIM 10 digit                      |
| email          | string      | Alamat email                      |
| jenis_kelamin  | string      | Pria / Wanita                     |
| hobi           | array       | Array of strings (min 1)          |
| pendidikan     | string      | D3 / S1 / S2 / S3                 |

---

## Struktur Folder

```
source_code/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       └── MahasiswaController.php
│   └── Models/
│
├── bootstrap/
├── config/
├── database/
├── public/
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php         # Layout utama dengan Glassmorphism
│       ├── mahasiswa.blade.php       # Halaman utama CRUD
│       └── welcome.blade.php
│
├── routes/
│   └── web.php                        # Route definitions
│
├── storage/
│   └── app/
│       └── mahasiswa.json             # File data JSON
│
├── composer.json
├── package.json
├── artisan
└── vite.config.js
```

---

## Endpoint API

| Method   | Endpoint            | Deskripsi                              |
|----------|---------------------|----------------------------------------|
| GET      | /                   | Halaman utama daftar mahasiswa         |
| GET      | /mahasiswa          | Halaman utama daftar mahasiswa         |
| GET      | /mahasiswa/data     | Ambil semua data mahasiswa (JSON)      |
| POST     | /mahasiswa          | Tambah data mahasiswa baru             |
| PUT      | /mahasiswa/{id}     | Update data mahasiswa berdasarkan ID   |
| DELETE   | /mahasiswa/{id}     | Hapus data mahasiswa berdasarkan ID    |

---

## Kode Program

### Controller MahasiswaController.php

```php
<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class MahasiswaController extends Controller
{
    private function getJsonPath()
    {
        return storage_path('app/mahasiswa.json');
    }

    private function readData()
    {
        $path = $this->getJsonPath();
        if (!File::exists($path)) {
            $default = [
                [
                    'id' => 1,
                    'nama' => 'Muhammad Daffa Bagus Jumantoro',
                    'nim' => 2311102222,
                    'email' => 'daffa@example.com',
                    'jenis_kelamin' => 'Pria',
                    'hobi' => ['Coding', 'Gaming'],
                    'pendidikan' => 'S1'
                ]
            ];
            File::put($path, json_encode($default, JSON_PRETTY_PRINT));
            return $default;
        }
        return json_decode(File::get($path), true) ?? [];
    }

    private function writeData($data)
    {
        File::put($this->getJsonPath(), json_encode($data, JSON_PRETTY_PRINT));
    }

    public function index()
    {
        return view('mahasiswa');
    }

    public function getData()
    {
        return response()->json($this->readData());
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:100',
            'nim' => 'required|numeric|digits:10',
            'email' => 'required|email|max:100',
            'jenis_kelamin' => 'required|in:Pria,Wanita',
            'hobi' => 'required|array|min:1',
            'hobi.*' => 'string|max:50',
            'pendidikan' => 'required|in:S1,S2,S3,D3'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $this->readData();
        $newId = count($data) > 0 ? max(array_column($data, 'id')) + 1 : 1;

        $newData = [
            'id' => $newId,
            'nama' => $request->nama,
            'nim' => (int)$request->nim,
            'email' => $request->email,
            'jenis_kelamin' => $request->jenis_kelamin,
            'hobi' => $request->hobi,
            'pendidikan' => $request->pendidikan
        ];

        $data[] = $newData;
        $this->writeData($data);

        return response()->json(['message' => 'Data berhasil ditambahkan', 'data' => $newData], 201);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:100',
            'nim' => 'required|numeric|digits:10',
            'email' => 'required|email|max:100',
            'jenis_kelamin' => 'required|in:Pria,Wanita',
            'hobi' => 'required|array|min:1',
            'hobi.*' => 'string|max:50',
            'pendidikan' => 'required|in:S1,S2,S3,D3'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $this->readData();
        $index = array_search((int)$id, array_column($data, 'id'));

        if ($index === false) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $data[$index] = [
            'id' => (int)$id,
            'nama' => $request->nama,
            'nim' => (int)$request->nim,
            'email' => $request->email,
            'jenis_kelamin' => $request->jenis_kelamin,
            'hobi' => $request->hobi,
            'pendidikan' => $request->pendidikan
        ];

        $this->writeData($data);

        return response()->json(['message' => 'Data berhasil diupdate', 'data' => $data[$index]]);
    }

    public function destroy($id)
    {
        $data = $this->readData();
        $index = array_search((int)$id, array_column($data, 'id'));

        if ($index === false) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        array_splice($data, $index, 1);
        $this->writeData($data);

        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}
```

### Routes (web.php)

```php
<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

Route::get('/', [MahasiswaController::class, 'index']);
Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
Route::get('/mahasiswa/data', [MahasiswaController::class, 'getData']);
Route::post('/mahasiswa', [MahasiswaController::class, 'store']);
Route::put('/mahasiswa/{id}', [MahasiswaController::class, 'update']);
Route::delete('/mahasiswa/{id}', [MahasiswaController::class, 'destroy']);
```

---

## Cara Penggunaan

1. **Melihat Data Mahasiswa**
   - Halaman utama akan menampilkan daftar mahasiswa dalam tabel
   - Data default sudah tersedia saat pertama kali diakses

2. **Menambah Mahasiswa**
   - Klik tombol "Tambah Data"
   - Isi form pada modal yang muncul
   - Pilih minimal 1 hobi
   - Klik "Simpan"

3. **Mengedit Mahasiswa**
   - Klik tombol edit (ikon pensil) pada baris mahasiswa
   - Ubah data yang diperlukan pada form
   - Klik "Update"

4. **Menghapus Mahasiswa**
   - Klik tombol hapus (ikon tempat sampah) pada baris mahasiswa
   - Konfirmasi penghapusan pada dialog
   - Data akan terhapus secara permanen

---

## Troubleshooting

**Error 500 saat akses halaman**
- Pastikan sudah menjalankan `php artisan key:generate`
- Cek permission folder: `chmod -R 775 storage bootstrap/cache`

**File JSON tidak terbaca**
- Pastikan folder `storage/app` memiliki permission write
- File akan dibuat otomatis dengan data default

**Error 419 Page Expired**
- Pastikan CSRF token sudah di-set di meta tag
- Refresh halaman

**Error Class not found**
- Jalankan `composer dump-autoload`

---

## Referensi

- [Laravel 11 Documentation](https://laravel.com/docs/11.x)
- [jQuery Documentation](https://api.jquery.com/)
- [Font Awesome Icons](https://fontawesome.com/icons)
- [Google Fonts - Poppins](https://fonts.google.com/specimen/Poppins)
- [PHP Documentation](https://www.php.net/docs.php)
- [Glassmorphism Design](https://uxdesign.cc/glassmorphism-in-user-interfaces-1f39bb1308c9)
- Telkom University - Program Studi S1 Informatika