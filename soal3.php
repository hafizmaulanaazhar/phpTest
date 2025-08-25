<?php

//membuat palindrome
function makePalindrome($s, $l, $r, $k, &$changed)
{
    if ($l >= $r) {
        return [$s, $k];
    }

    if ($s[$l] === $s[$r]) {
        return makePalindrome($s, $l + 1, $r - 1, $k, $changed);
    }

    if ($k <= 0) {
        return [null, -1];
    }

    if ($s[$l] > $s[$r]) {
        $s[$r] = $s[$l];
    } else {
        $s[$l] = $s[$r];
    }

    $changed[$l] = true;
    $changed[$r] = true;

    return makePalindrome($s, $l + 1, $r - 1, $k - 1, $changed);
}

//Maksimal palindrome (ubah jadi 9).
function maximizePalindrome($s, $l, $r, $k, $changed)
{
    if ($l > $r) {
        return $s;
    }

    if ($l == $r) {
        if ($k > 0 && $s[$l] !== '9') {
            $s[$l] = '9';
        }
        return $s;
    }

    if ($s[$l] !== '9') {
        $changedL = isset($changed[$l]) ? $changed[$l] : false;
        $changedR = isset($changed[$r]) ? $changed[$r] : false;

        if (($changedL || $changedR) && $k >= 1) {
            $s[$l] = $s[$r] = '9';
            $k -= 1;
        } elseif ($k >= 2) {
            $s[$l] = $s[$r] = '9';
            $k -= 2;
        }
    }

    return maximizePalindrome($s, $l + 1, $r - 1, $k, $changed);
}

//Fungsi mencari Highest Palindrome
function highestPalindrome($s, $k)
{
    $s = str_split($s);
    $changed = [];

    list($s, $k) = makePalindrome($s, 0, count($s) - 1, $k, $changed);

    if ($s === null) {
        return -1;
    }

    $s = maximizePalindrome($s, 0, count($s) - 1, $k, $changed);

    return implode('', $s);
}

//input dinamis
//contoh string seperti pada soal
echo "Masukkan angka: ";
$inputString = trim(fgets(STDIN));

echo "Masukkan k: ";
$inputK = intval(trim(fgets(STDIN)));

$result = highestPalindrome($inputString, $inputK);

echo "Output: " . $result . PHP_EOL;
