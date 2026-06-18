import 'package:flutter/material.dart';
import 'pages/home_page.dart';

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      title: 'Sakura App',
      theme: ThemeData(
        colorScheme: ColorScheme.fromSeed(
          seedColor: const Color(0xFFFF69B4),
          primary: const Color(0xFFFF69B4),
          secondary: const Color(0xFFFFB7C5),
        ),
        useMaterial3: true,
      ),
      home: const Scaffold(
        body: HomePage(),
      ),
    );
  }
}