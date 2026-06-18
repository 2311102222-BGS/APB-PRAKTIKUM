import 'dart:io';
import 'package:flutter/material.dart';
import 'package:image_picker/image_picker.dart';
import 'package:flutter_local_notifications/flutter_local_notifications.dart';

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      title: 'Sunset Gallery',
      theme: ThemeData(
        useMaterial3: true,
        colorScheme: ColorScheme.fromSeed(
          seedColor: const Color(0xFFFF6B35),
          primary: const Color(0xFFFF6B35),
          secondary: const Color(0xFFFFD700),
        ),
      ),
      home: const HomePage(),
    );
  }
}

class HomePage extends StatefulWidget {
  const HomePage({super.key});

  @override
  State<HomePage> createState() => _HomePageState();
}

class _HomePageState extends State<HomePage> {
  final ImagePicker picker = ImagePicker();
  final FlutterLocalNotificationsPlugin notifications =
      FlutterLocalNotificationsPlugin();

  File? imageFile;
  String fileName = "";
  String lastAction = "";

  @override
  void initState() {
    super.initState();
    initializeNotification();
  }

  Future<void> initializeNotification() async {
    const AndroidInitializationSettings androidSettings =
        AndroidInitializationSettings('@mipmap/ic_launcher');

    const InitializationSettings settings =
        InitializationSettings(android: androidSettings);

    await notifications.initialize(settings);

    final androidPlugin =
        notifications.resolvePlatformSpecificImplementation<
            AndroidFlutterLocalNotificationsPlugin>();

    await androidPlugin?.requestNotificationsPermission();
  }

  Future<void> showNotification(String message) async {
    const AndroidNotificationDetails androidDetails =
        AndroidNotificationDetails(
      'sunset_channel',
      'Sunset Notification',
      channelDescription: 'Notifikasi Sunset Gallery',
      importance: Importance.max,
      priority: Priority.high,
    );

    const NotificationDetails details =
        NotificationDetails(android: androidDetails);

    await notifications.show(
      0,
      'Sunset Gallery',
      message,
      details,
    );
  }

  void showSnack(String text) {
    ScaffoldMessenger.of(context).showSnackBar(
      SnackBar(
        content: Text(text),
        behavior: SnackBarBehavior.floating,
        backgroundColor: const Color(0xFFFF6B35),
      ),
    );
  }

  Future<void> openCamera() async {
    final XFile? photo = await picker.pickImage(
      source: ImageSource.camera,
      imageQuality: 80,
    );

    if (photo != null) {
      setState(() {
        imageFile = File(photo.path);
        fileName = photo.name;
        lastAction = "Diambil dari Kamera";
      });

      await showNotification("Foto berhasil diambil");
      showSnack("Foto berhasil diambil");
    }
  }

  Future<void> openGallery() async {
    final XFile? photo = await picker.pickImage(
      source: ImageSource.gallery,
      imageQuality: 80,
    );

    if (photo != null) {
      setState(() {
        imageFile = File(photo.path);
        fileName = photo.name;
        lastAction = "Dipilih dari Galeri";
      });

      await showNotification("Foto berhasil dipilih");
      showSnack("Foto berhasil dipilih");
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: const Color(0xFFFFF8F0),
      body: SafeArea(
        child: SingleChildScrollView(
          padding: const EdgeInsets.all(20),
          child: Column(
            children: [
              // Header - Sunset Theme
              Container(
                width: double.infinity,
                padding: const EdgeInsets.all(24),
                decoration: BoxDecoration(
                  borderRadius: BorderRadius.circular(30),
                  gradient: const LinearGradient(
                    colors: [
                      Color(0xFFFF4500),
                      Color(0xFFFF6B35),
                      Color(0xFFFFD700),
                    ],
                  ),
                ),
                child: Column(
                  children: [
                    const Icon(
                      Icons.wb_sunny,
                      color: Colors.white,
                      size: 50,
                    ),
                    const SizedBox(height: 10),
                    const Text(
                      "Sunset Gallery",
                      style: TextStyle(
                        fontSize: 22,
                        fontWeight: FontWeight.bold,
                        color: Colors.white,
                      ),
                    ),
                    const SizedBox(height: 6),
                    const Text(
                      "Muhammad Daffa Bagus Jumantoro",
                      style: TextStyle(
                        fontSize: 16,
                        color: Colors.white70,
                      ),
                    ),
                    const SizedBox(height: 2),
                    const Text(
                      "2311102222",
                      style: TextStyle(
                        fontSize: 14,
                        color: Colors.white60,
                      ),
                    ),
                  ],
                ),
              ),

              const SizedBox(height: 24),

              // Menu Buttons
              _menuButton(
                title: "Ambil Foto",
                subtitle: "Gunakan kamera perangkat",
                icon: Icons.camera_alt,
                gradientColors: const [Color(0xFFFF4500), Color(0xFFFF6B35)],
                onTap: openCamera,
              ),

              const SizedBox(height: 12),

              _menuButton(
                title: "Pilih dari Galeri",
                subtitle: "Pilih foto dari galeri",
                icon: Icons.photo_library,
                gradientColors: const [Color(0xFFFF6B35), Color(0xFFFFD700)],
                onTap: openGallery,
              ),

              const SizedBox(height: 24),

              // Photo Preview
              if (imageFile != null) ...[
                Container(
                  width: double.infinity,
                  padding: const EdgeInsets.all(12),
                  decoration: BoxDecoration(
                    color: Colors.white,
                    borderRadius: BorderRadius.circular(20),
                    boxShadow: [
                      BoxShadow(
                        color: const Color(0xFFFF6B35).withValues(alpha: 0.1),
                        blurRadius: 12,
                        offset: const Offset(0, 4),
                      ),
                    ],
                  ),
                  child: Column(
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: [
                      Row(
                        children: [
                          Icon(Icons.image, color: const Color(0xFFFF6B35), size: 20),
                          const SizedBox(width: 8),
                          Expanded(
                            child: Text(
                              fileName,
                              style: TextStyle(
                                fontSize: 14,
                                fontWeight: FontWeight.w500,
                                color: const Color(0xFFFF6B35).withValues(alpha: 0.8),
                              ),
                              overflow: TextOverflow.ellipsis,
                            ),
                          ),
                        ],
                      ),
                      const SizedBox(height: 4),
                      Text(
                        lastAction,
                        style: TextStyle(
                          fontSize: 12,
                          color: const Color(0xFFFF6B35).withValues(alpha: 0.6),
                        ),
                      ),
                      const SizedBox(height: 12),
                      ClipRRect(
                        borderRadius: BorderRadius.circular(16),
                        child: InteractiveViewer(
                          child: Image.file(
                            imageFile!,
                            width: double.infinity,
                            height: 300,
                            fit: BoxFit.contain,
                          ),
                        ),
                      ),
                    ],
                  ),
                ),
              ] else ...[
                Container(
                  width: double.infinity,
                  height: 200,
                  decoration: BoxDecoration(
                    color: Colors.white,
                    borderRadius: BorderRadius.circular(20),
                    border: Border.all(
                      color: const Color(0xFFFF6B35).withValues(alpha: 0.3),
                      style: BorderStyle.solid,
                    ),
                  ),
                  child: Center(
                    child: Column(
                      mainAxisAlignment: MainAxisAlignment.center,
                      children: [
                        Icon(
                          Icons.wb_sunny,
                          size: 60,
                          color: const Color(0xFFFF6B35).withValues(alpha: 0.4),
                        ),
                        const SizedBox(height: 12),
                        const Text(
                          "Belum ada foto",
                          style: TextStyle(
                            fontSize: 16,
                            color: Color(0xFFFF6B35),
                          ),
                        ),
                        Text(
                          "Ambil atau pilih foto di atas",
                          style: TextStyle(
                            fontSize: 12,
                            color: const Color(0xFFFF6B35).withValues(alpha: 0.5),
                          ),
                        ),
                      ],
                    ),
                  ),
                ),
              ],
            ],
          ),
        ),
      ),
    );
  }

  Widget _menuButton({
    required String title,
    required String subtitle,
    required IconData icon,
    required List<Color> gradientColors,
    required VoidCallback onTap,
  }) {
    return InkWell(
      onTap: onTap,
      borderRadius: BorderRadius.circular(20),
      child: Container(
        width: double.infinity,
        padding: const EdgeInsets.symmetric(horizontal: 20, vertical: 18),
        decoration: BoxDecoration(
          gradient: LinearGradient(
            colors: gradientColors.map((c) => c.withValues(alpha: 0.1)).toList(),
          ),
          borderRadius: BorderRadius.circular(20),
          border: Border.all(
            color: gradientColors[0].withValues(alpha: 0.2),
          ),
        ),
        child: Row(
          children: [
            Container(
              padding: const EdgeInsets.all(12),
              decoration: BoxDecoration(
                gradient: LinearGradient(colors: gradientColors),
                borderRadius: BorderRadius.circular(16),
              ),
              child: Icon(icon, color: Colors.white, size: 28),
            ),
            const SizedBox(width: 16),
            Expanded(
              child: Column(
                crossAxisAlignment: CrossAxisAlignment.start,
                children: [
                  Text(
                    title,
                    style: TextStyle(
                      fontSize: 16,
                      fontWeight: FontWeight.w600,
                      color: gradientColors[0],
                    ),
                  ),
                  const SizedBox(height: 2),
                  Text(
                    subtitle,
                    style: TextStyle(
                      fontSize: 12,
                      color: gradientColors[0].withValues(alpha: 0.6),
                    ),
                  ),
                ],
              ),
            ),
            Icon(Icons.arrow_forward_ios, size: 16, color: gradientColors[0].withValues(alpha: 0.5)),
          ],
        ),
      ),
    );
  }
}