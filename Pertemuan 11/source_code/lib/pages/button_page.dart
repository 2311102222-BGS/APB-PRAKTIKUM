import 'package:flutter/material.dart';
import '../components/custom_dropdown.dart';

class ButtonPage extends StatefulWidget {
  const ButtonPage({super.key});

  @override
  State<ButtonPage> createState() => _ButtonPageState();
}

class _ButtonPageState extends State<ButtonPage> {
  bool isLiked = false;
  String selectedValue = "Sakura Tea";
  TextEditingController namaController = TextEditingController();

  void showPopup({required String title, required String message}) {
    showDialog(
      context: context,
      builder: (context) {
        return AlertDialog(
          shape: RoundedRectangleBorder(
            borderRadius: BorderRadius.circular(20),
          ),
          title: Text(title, style: const TextStyle(color: Color(0xFFFF69B4))),
          content: Text(message),
          actions: [
            TextButton(
              onPressed: () {
                Navigator.pop(context);
              },
              child: const Text("OK", style: TextStyle(color: Color(0xFFFF69B4))),
            ),
          ],
        );
      },
    );
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text(
          "Button Page",
          style: TextStyle(fontWeight: FontWeight.bold),
        ),
        centerTitle: true,
        backgroundColor: const Color(0xFFFF69B4),
        foregroundColor: Colors.white,
      ),
      body: SingleChildScrollView(
        padding: const EdgeInsets.all(20),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            // TextField Nama
            const Text(
              "Nama Pelanggan",
              style: TextStyle(
                fontSize: 16,
                fontWeight: FontWeight.bold,
                color: Color(0xFFFF69B4),
              ),
            ),
            const SizedBox(height: 8),
            TextField(
              controller: namaController,
              decoration: InputDecoration(
                hintText: "Masukkan nama",
                prefixIcon: const Icon(Icons.person, color: Color(0xFFFF69B4)),
                filled: true,
                fillColor: const Color(0xFFFFF0F5),
                border: OutlineInputBorder(
                  borderRadius: BorderRadius.circular(18),
                  borderSide: BorderSide.none,
                ),
                focusedBorder: OutlineInputBorder(
                  borderRadius: BorderRadius.circular(18),
                  borderSide: const BorderSide(color: Color(0xFFFF69B4)),
                ),
              ),
            ),

            const SizedBox(height: 24),

            // Dropdown Menu
            const Text(
              "Pilih Menu",
              style: TextStyle(
                fontSize: 16,
                fontWeight: FontWeight.bold,
                color: Color(0xFFFF69B4),
              ),
            ),
            const SizedBox(height: 8),
            CustomDropdown(
              value: selectedValue,
              onChanged: (value) {
                setState(() {
                  selectedValue = value!;
                });
              },
            ),

            const SizedBox(height: 24),

            // Like Button
            const Text(
              "Suka Menu Ini?",
              style: TextStyle(
                fontSize: 16,
                fontWeight: FontWeight.bold,
                color: Color(0xFFFF69B4),
              ),
            ),
            const SizedBox(height: 8),
            OutlinedButton.icon(
              onPressed: () {
                setState(() {
                  isLiked = !isLiked;
                });
                if (isLiked) {
                  showPopup(
                    title: "Berhasil",
                    message: "Anda menyukai menu ini!",
                  );
                } else {
                  showPopup(
                    title: "Berhasil",
                    message: "Anda membatalkan like!",
                  );
                }
              },
              icon: Icon(
                isLiked ? Icons.favorite : Icons.favorite_border,
                color: const Color(0xFFFF69B4),
              ),
              label: Text(
                isLiked ? "Disukai" : "Suka",
                style: const TextStyle(color: Color(0xFFFF69B4)),
              ),
              style: OutlinedButton.styleFrom(
                side: const BorderSide(color: Color(0xFFFFB7C5)),
                shape: RoundedRectangleBorder(
                  borderRadius: BorderRadius.circular(18),
                ),
              ),
            ),

            const SizedBox(height: 24),

            // Submit Button
            Center(
              child: SizedBox(
                width: double.infinity,
                height: 50,
                child: ElevatedButton(
                  style: ElevatedButton.styleFrom(
                    backgroundColor: const Color(0xFFFF69B4),
                    foregroundColor: Colors.white,
                    shape: RoundedRectangleBorder(
                      borderRadius: BorderRadius.circular(18),
                    ),
                    elevation: 4,
                    shadowColor: const Color(0xFFFF69B4).withValues(alpha: 0.3),
                  ),
                  onPressed: () {
                    String nama = namaController.text.isNotEmpty
                        ? namaController.text
                        : "Tamu";
                    showPopup(
                      title: "Berhasil",
                      message:
                          "Pesanan $nama - $selectedValue berhasil disimpan!",
                    );
                  },
                  child: const Text(
                    "Submit",
                    style: TextStyle(fontSize: 16),
                  ),
                ),
              ),
            ),
          ],
        ),
      ),
    );
  }
}