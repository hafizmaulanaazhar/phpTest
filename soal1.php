<?php

//fungsi statis
function generateA000124($n)
{
    if (!is_numeric($n) || $n <= 0) {
        return "Input harus bilangan bulat positif";
    }

    $n = (int)$n;
    $result = [];

    // Deret menggunakan rumus a(i) = i(i-1)/2 + 1
    for ($i = 1; $i <= $n; $i++) {
        $value = ($i * ($i - 1)) / 2 + 1;
        $result[] = $value;
    }

    return $result;
}

function formatOutput($array)
{
    return implode('-', $array);
}

echo "Input: 7\n";
echo "Output: " . formatOutput(generateA000124(7)) . "\n\n";

$testInputs = [1, 5, 10, 3];

foreach ($testInputs as $input) {
    echo "Input: " . $input . "\n";
    echo "Output: " . formatOutput(generateA000124($input)) . "\n\n";
}

// fungsi input user dinamis
function getUserInput()
{
    echo "Masukkan jumlah elemen yang diinginkan (0 untuk keluar): ";
    $input = trim(fgets(STDIN));

    if ($input == 0) {
        return false;
    }

    $result = generateA000124($input);
    echo "Hasil: " . formatOutput($result) . "\n\n";
    return true;
}

echo "=== Program A000124 of Sloanes OEIS  ===\n";
while (getUserInput()) {
}
