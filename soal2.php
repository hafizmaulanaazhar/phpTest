<?php

function denseRanking(array $scores, array $gits): array
{
    $uniqueScores = [];
    foreach ($scores as $score) {
        if (!in_array($score, $uniqueScores)) {
            $uniqueScores[] = $score;
        }
    }

    $results = [];
    foreach ($gits as $gitsScore) {
        $rank = 1;
        $i = count($uniqueScores) - 1;

        // perulangan mencari posisi rank
        while ($i >= 0 && $gitsScore >= $uniqueScores[$i]) {
            $i--;
        }

        $rank = $i + 2;
        $results[] = $rank;
    }

    return $results;
}

//format input dinamis disesuaikan dengan inputan soal
echo "Masukkan jumlah pemain: ";
$n = intval(trim(fgets(STDIN)));

echo "Masukkan skor pemain (dipisah spasi): ";
$scores = array_map('intval', explode(" ", trim(fgets(STDIN))));

echo "Masukkan jumlah permainan GITS: ";
$m = intval(trim(fgets(STDIN)));

echo "Masukkan skor GITS (dipisah spasi): ";
$gitsScores = array_map('intval', explode(" ", trim(fgets(STDIN))));

$result = denseRanking($scores, $gitsScores);

echo "Output: " . implode(" ", $result) . PHP_EOL;
