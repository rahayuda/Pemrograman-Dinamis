<?php
// Bobot dan nilai dari setiap item
$weights = [2, 2, 3, 3]; // Bobot untuk Item 1, 2, 3, dan 4
$values = [6, 10, 12, 8]; // Nilai untuk Item 1, 2, 3, dan 4
$capacity = 8; // Kapasitas maksimum knapsack

// Jumlah item
$itemCount = count($weights);

// Inisialisasi tabel untuk pemrograman dinamis
$dp = array_fill(0, $capacity + 1, 0);

// Pemrograman dinamis untuk knapsack
for ($i = 0; $i < $itemCount; $i++) {
    for ($w = $capacity; $w >= $weights[$i]; $w--) {
        $dp[$w] = max($dp[$w], $dp[$w - $weights[$i]] + $values[$i]);
    }
}

// Hasil akhir
$optimalValue = $dp[$capacity];
echo "Nilai Optimal: " . $optimalValue . "<br>";
?>
