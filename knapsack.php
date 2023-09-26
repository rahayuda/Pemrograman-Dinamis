<?php

// Daftar nilai A, B, C, dan D
$nilai = [0, 1];
$nilai_akhir = 0;
$bobot_akhir = 0;
$a_op;
$b_op;
$c_op;
$d_op;

// Inisialisasi tabel
echo "-------------------------------------------------------<br>";
echo "|   A   |   B   |   C   |   D   |  Bobot  |   Nilai   |<br>";
echo "-------------------------------------------------------<br>";

// Perulangan untuk semua kemungkinan kombinasi
foreach ($nilai as $a) {
    foreach ($nilai as $b) {
        foreach ($nilai as $c) {
            foreach ($nilai as $d) {
                // Menghitung bobot
                $bobot = ($a * 2) + ($b * 2) + ($c * 3) + ($d * 0);

                // Menghitung nilai
                $nilai_total = ($a * 6) + ($b * 10) + ($c * 12) + ($d * 0);

                if ($bobot<=5)
                {
                    if ($nilai_total>$nilai_akhir)
                    {
                        $nilai_akhir = $nilai_total;
                        $bobot_akhir = $bobot;
                        $a_op = $a;
                        $b_op = $b;
                        $c_op = $c;
                        $d_op = $d;
                    }
                }
                
                // Menampilkan hasil dalam tabel
                echo "|   $a   |   $b   |   $c   |   $d   |    $bobot    |     $nilai_total     |<br>";
            }
        }
    }
}

echo "-------------------------------------------------------<br><br>";

                echo "Nilai Optimal: ". $nilai_akhir . "<br>";
                echo "Nilai Bobot: ". $bobot_akhir . "<br>";

?>
