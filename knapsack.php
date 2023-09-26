<?php
// Fungsi untuk menghitung nilai total dari himpunan item
function knapsackBruteforce($weights, $values, $capacity) {
    $numItems = count($weights);
    $maxValue = 0;
    $maxSubset = [];

    // Menggunakan representasi biner untuk semua himpunan item
    for ($i = 0; $i < pow(2, $numItems); $i++) {
        $subsetWeight = 0;
        $subsetValue = 0;
        $currentSubset = [];

        // Mengkonversi indeks menjadi representasi biner
        $binary = str_pad(decbin($i), $numItems, '0', STR_PAD_LEFT);

        // Memeriksa setiap item
        for ($j = 0; $j < $numItems; $j++) {
            if ($binary[$j] == '1') {
                $subsetWeight += $weights[$j];
                $subsetValue += $values[$j];
                $currentSubset[] = $j;
            }
        }

        // Memeriksa apakah himpunan item masih muat dalam kapasitas ransel
        if ($subsetWeight <= $capacity && $subsetValue > $maxValue) {
            $maxValue = $subsetValue;
            $maxSubset = $currentSubset;
        }
    }

    return ['maxValue' => $maxValue, 'maxSubset' => $maxSubset];
}

// Item-item yang tersedia
$weights = [2, 2, 3];
$values = [6, 10, 12];
$capacity = 5;

$result = knapsackBruteforce($weights, $values, $capacity);
$maxValue = $result['maxValue'];
$maxSubset = $result['maxSubset'];

echo "Nilai maksimal yang dapat dimasukkan dalam ransel adalah: $maxValue\n";
echo "Item yang dipilih: ";
foreach ($maxSubset as $itemIndex) {
    echo "Item $itemIndex ";
}
echo "\n";
?>
