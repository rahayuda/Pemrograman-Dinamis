<?php
function factorial($n, &$memo) {
    if ($n <= 1) {
        return 1;
    }
    if (isset($memo[$n])) {
        return $memo[$n];
    }
    $memo[$n] = $n * factorial($n - 1, $memo);
    return $memo[$n];
}

function binomialCoefficient($n, $k) {
    $memo = [];
    return factorial($n, $memo) / (factorial($k, $memo) * factorial($n - $k, $memo));
}

$n = 7; // Jumlah total siswa
$k = 3; // Jumlah siswa yang ingin dipilih untuk tim

$coefficient = binomialCoefficient($n, $k);

echo "Jumlah cara memilih tim $k siswa dari $n siswa adalah $coefficient.";
?>
