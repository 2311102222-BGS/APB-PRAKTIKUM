import 'package:flutter/material.dart';
import '../widgets/stat_card.dart';

class ProfilePage extends StatelessWidget {
  const ProfilePage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text(
          "Profile",
          style: TextStyle(fontWeight: FontWeight.bold),
        ),
        centerTitle: true,
        backgroundColor: const Color(0xFFFF69B4),
        foregroundColor: Colors.white,
      ),
      body: SingleChildScrollView(
        padding: const EdgeInsets.all(20),
        child: Column(
          children: [
            const SizedBox(height: 20),

            // Profile Picture
            const CircleAvatar(
              radius: 70,
              backgroundColor: Color(0xFFFFB7C5),
              child: Icon(
                Icons.local_florist,
                size: 80,
                color: Colors.white,
              ),
            ),

            const SizedBox(height: 20),

            // Identity Information
            Container(
              width: double.infinity,
              padding: const EdgeInsets.all(20),
              decoration: BoxDecoration(
                color: const Color(0xFFFFF0F5),
                borderRadius: BorderRadius.circular(20),
                border: Border.all(
                  color: const Color(0xFFFFB7C5),
                  width: 2,
                ),
              ),
              child: const Column(
                children: [
                  Text(
                    "Muhammad Daffa Bagus Jumantoro",
                    style: TextStyle(
                      fontSize: 22,
                      fontWeight: FontWeight.bold,
                      color: Color(0xFFFF69B4),
                    ),
                  ),
                  SizedBox(height: 8),
                  Text(
                    "2311102222",
                    style: TextStyle(
                      fontSize: 18,
                      color: Color(0xFFFF69B4),
                    ),
                  ),
                  SizedBox(height: 8),
                  Text(
                    "S1 IF-11-04",
                    style: TextStyle(
                      fontSize: 16,
                      color: Color(0xFFFF69B4),
                    ),
                  ),
                ],
              ),
            ),

            const SizedBox(height: 30),

            // Stat Cards
            Row(
              mainAxisAlignment: MainAxisAlignment.spaceEvenly,
              children: [
                StatCard(
                  value: "6",
                  label: "Semester",
                ),
                StatCard(
                  value: "10",
                  label: "Praktikum",
                ),
                StatCard(
                  value: "7",
                  label: "Project",
                ),
              ],
            ),
          ],
        ),
      ),
    );
  }
}