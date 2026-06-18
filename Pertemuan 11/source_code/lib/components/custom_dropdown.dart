import 'package:flutter/material.dart';

class CustomDropdown extends StatelessWidget {
  final String value;
  final ValueChanged<String?> onChanged;

  const CustomDropdown({
    super.key,
    required this.value,
    required this.onChanged,
  });

  @override
  Widget build(BuildContext context) {
    return Container(
      padding: const EdgeInsets.symmetric(horizontal: 16),
      decoration: BoxDecoration(
        color: const Color(0xFFFFF0F5),
        borderRadius: BorderRadius.circular(18),
        border: Border.all(color: const Color(0xFFFFB7C5)),
      ),
      child: DropdownButtonHideUnderline(
        child: DropdownButton<String>(
          value: value,
          icon: const Icon(Icons.arrow_drop_down, color: Color(0xFFFF69B4)),
          isExpanded: true,
          items: ["Sakura Tea", "Matcha Latte", "Rose Milk", "Honey Lemon"]
              .map((item) => DropdownMenuItem(
                    value: item,
                    child: Text(
                      item,
                      style: const TextStyle(
                        fontSize: 16,
                        color: Color(0xFFFF69B4),
                      ),
                    ),
                  ))
              .toList(),
          onChanged: onChanged,
        ),
      ),
    );
  }
}