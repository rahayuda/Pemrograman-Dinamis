<?php
function factorial($n) {
    if ($n <= 1) {
        return 1;
    } else {
        return $n * factorial($n - 1);
    }
}

function binomialCoefficient($n, $k) {
    return factorial($n) / (factorial($k) * factorial($n - $k));
}

$n = 7; // Jumlah total siswa
$k = 3; // Jumlah siswa yang ingin dipilih untuk tim

$coefficient = binomialCoefficient($n, $k);

echo "Jumlah cara memilih tim $k siswa dari $n siswa adalah $coefficient.";
?>
