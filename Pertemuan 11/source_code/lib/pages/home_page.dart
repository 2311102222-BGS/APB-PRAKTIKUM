import 'package:flutter/material.dart';
import '../widgets/feature_card.dart';
import 'button_page.dart';
import 'profile_page.dart';

class HomePage extends StatelessWidget {
  const HomePage({super.key});

  @override
  Widget build(BuildContext context) {
    return SingleChildScrollView(
      padding: const EdgeInsets.all(20),
      child: Column(
        crossAxisAlignment: CrossAxisAlignment.start,
        children: [
          // Header Container with Identity - Sakura Theme
          Container(
            height: 180,
            width: double.infinity,
            decoration: BoxDecoration(
              borderRadius: BorderRadius.circular(25),
              gradient: const LinearGradient(
                colors: [
                  Color(0xFFFF69B4),
                  Color(0xFFFFB7C5),
                ],
              ),
            ),
            child: const Column(
              mainAxisAlignment: MainAxisAlignment.center,
              children: [
                Icon(
                  Icons.local_florist,
                  color: Colors.white,
                  size: 50,
                ),
                SizedBox(height: 10),
                Text(
                  "Muhammad Daffa Bagus Jumantoro",
                  style: TextStyle(
                    color: Colors.white,
                    fontSize: 22,
                    fontWeight: FontWeight.bold,
                  ),
                ),
                SizedBox(height: 4),
                Text(
                  "2311102222",
                  style: TextStyle(
                    color: Colors.white70,
                    fontSize: 16,
                  ),
                ),
              ],
            ),
          ),

          const SizedBox(height: 30),

          const Text(
            "Menu Sakura",
            style: TextStyle(
              fontSize: 24,
              fontWeight: FontWeight.bold,
              color: Color(0xFFFF69B4),
            ),
          ),

          const SizedBox(height: 16),

          // Navigation Cards
          Row(
            children: [
              Expanded(
                child: FeatureCard(
                  icon: Icons.smart_button,
                  title: "Button",
                  subtitle: "Implementasi interaktif",
                  onTap: () {
                    Navigator.push(
                      context,
                      MaterialPageRoute(
                        builder: (_) => const ButtonPage(),
                      ),
                    );
                    ScaffoldMessenger.of(context).showSnackBar(
                      const SnackBar(
                        content: Text("Membuka halaman Button"),
                      ),
                    );
                  },
                ),
              ),
              const SizedBox(width: 16),
              Expanded(
                child: FeatureCard(
                  icon: Icons.person,
                  title: "Profile",
                  subtitle: "Lihat profil pengguna",
                  onTap: () {
                    Navigator.push(
                      context,
                      MaterialPageRoute(
                        builder: (_) => const ProfilePage(),
                      ),
                    );
                    ScaffoldMessenger.of(context).showSnackBar(
                      const SnackBar(
                        content: Text("Membuka halaman Profile"),
                      ),
                    );
                  },
                ),
              ),
            ],
          ),
        ],
      ),
    );
  }
}