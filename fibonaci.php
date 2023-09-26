<?php
function fibonacci($n) {
    $fib = array();
    $fib[0] = 0;
    $fib[1] = 1;

    for ($i = 2; $i <= $n; $i++) {
        $fib[$i] = $fib[$i - 1] + $fib[$i - 2];
    }

    return $fib;
}

$n = 10; // Anda dapat mengganti nilai n sesuai dengan yang Anda inginkan
$fibonacci_sequence = fibonacci($n);

for ($i = 2; $i <= $n; $i++) {
    echo "F($i) = " . $fibonacci_sequence[$i] . "\n";
}
?>
