<h3 align="center">LAPORAN PRAKTIKUM</h3>
<h3 align="center">APLIKASI BERBASIS PLATFORM</h3>
<h3 align="center">Modul 6</h3>
<h3 align="center">POSTER & PAGE SKOR - FLUTTER</h3>

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
4. [Struktur Folder](#struktur-folder)
5. [Kode Program](#kode-program)
6. [Cara Penggunaan](#cara-penggunaan)
7. [Referensi](#referensi)

---

## Deskripsi Program

Program ini merupakan aplikasi Flutter sederhana yang menampilkan **Poster & Page Skor** untuk menghitung jumlah praktikan yang hadir dalam praktikum Aplikasi Berbasis Platform. Aplikasi ini menggunakan StatefulWidget untuk mengelola state counter yang dapat bertambah setiap kali tombol ditekan.

Aplikasi ini menampilkan:

- **Header** dengan judul "Poster & Page Skor"
- **Teks informasi** jumlah praktikan yang hadir
- **Counter** yang dapat bertambah dengan tombol
- **Tampilan sederhana** dan mudah digunakan

---

## Fitur Utama

1. **Counter Interaktif**
   - Menampilkan jumlah praktikan yang hadir
   - Tombol untuk menambah jumlah hadir
   - Update UI secara real-time menggunakan setState

2. **Tampilan Poster**
   - Judul aplikasi di AppBar
   - Teks informasi dengan font Poppins
   - Counter dengan ukuran font besar (60)

3. **Responsif**
   - Layout centered di tengah layar
   - Menggunakan Column untuk vertical arrangement

---

## Teknologi

- Flutter SDK
- Dart
- Google Fonts (Poppins)
- Material Design

---

## Struktur Folder

```
source_code/
├── lib/
│   └── main.dart           # Main application code
├── android/                # Android platform files
├── ios/                    # iOS platform files
├── pubspec.yaml            # Dependencies configuration
├── analysis_options.yaml   # Linter configuration
└── README.md
```

---

## Kode Program

### main.dart

```dart
import 'package:flutter/material.dart';
import 'package:google_fonts/google_fonts.dart';

void main() {
  runApp(const AplikasiPraktikum());
}

class AplikasiPraktikum extends StatelessWidget {
  const AplikasiPraktikum({super.key});

  @override
  Widget build(BuildContext context){
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      home: Scaffold(
        appBar: AppBar(
          title: const Text('Poster & Page Skor'),
          backgroundColor: Colors.blue,
        ),
        body: const PenghitungMahasiswa()
      )
    );
  } 
}

class PenghitungMahasiswa extends StatefulWidget {
  const PenghitungMahasiswa({super.key});

  @override
  State<PenghitungMahasiswa> createState() => _PenghitungMahasiswaState();
}

class _PenghitungMahasiswaState extends State<PenghitungMahasiswa> {
  int jumlahHadir = 0;

  @override
  Widget build(BuildContext context) {
    return Center(
      child: Column(
        mainAxisAlignment: MainAxisAlignment.center,
        children: [
          Text(
            'Jumlah Praktikan ABP yang Hadir:',
            style: GoogleFonts.poppins(
              fontSize: 24,
              fontWeight: FontWeight.bold
            )
          ),
          Text(
            '$jumlahHadir',
            style: const TextStyle(fontSize: 60, fontWeight: FontWeight.bold)
          ),
          const SizedBox(height: 20),
          ElevatedButton(
            onPressed: () {
              setState(() {
                jumlahHadir++;
              });
            },
            child: const Text('Tambah Mahasiswa')
          )
        ]
      )
    );
  }
}
```

---

## Cara Penggunaan

1. **Menjalankan Aplikasi**
   - Buka terminal di folder source_code
   - Jalankan `flutter pub get` untuk install dependencies
   - Jalankan `flutter run` untuk menjalankan aplikasi

2. **Menggunakan Counter**
   - Lihat jumlah praktikan yang hadir di layar
   - Klik tombol "Tambah Mahasiswa" untuk menambah counter
   - Counter akan bertambah secara real-time

---

## Referensi

- [Flutter Documentation](https://docs.flutter.dev/)
- [Google Fonts](https://fonts.google.com/)
- [Flutter StatefulWidget](https://docs.flutter.dev/ui/interactivity)
- Telkom University - Program Studi S1 Informatika