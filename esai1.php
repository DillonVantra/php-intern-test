<?php
// buat sebuah simbol X
// X O O O O O X
// O X O O O X O
// O O X O X O O
// O O O X O O O
// O O X O X O O
// O X O O O X O
// X O O O O O X

// pakai for loop
// ada 7 baris dan 7 kolom
for ($i = 0; $i < 7; $i++) {
  for ($j = 0; $j < 7; $j++) {
    if ($j == $i) {
      echo 'X ';
    } elseif ($j == 6 - $i) {
      echo 'X ';
    } else {
      echo 'O ';
    }
  }
  echo "\n";
}
