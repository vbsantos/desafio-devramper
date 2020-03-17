<?php

if (isset($_GET['key'])) {
  drawDiamont($_GET['key'][0]);
}
//  else {
//   echo "no key pressed";
//}

// function drawRecDiamont($letter, $nextLetter, $leftSpace, $innerSpace) {
// }

function drawDiamont ($letter) {
  // echo "now i draw a diamont with the letter $letter";
  $currentLetter = 'A';
  $innerSpace = -1;
  $diamont = "\n";

  for ($leftSpace = (ord(strtoupper($letter))-ord($currentLetter)); $leftSpace >= 0; $leftSpace--) { 
    $diamont = $diamont . str_repeat(" ", $leftSpace) . $currentLetter;
    if ($innerSpace > 0) {
      $diamont = $diamont . str_repeat(" ", $innerSpace) . $currentLetter;
    }
    $diamont = $diamont . "\n";
    $currentLetter = chr(ord($currentLetter)+1);
    $innerSpace = $innerSpace + 2;
  }

  $currentLetter = chr(ord($currentLetter)-2);
  $innerSpace = $innerSpace -4;

  for ($leftSpace = 1; $innerSpace >= -1; $leftSpace++) { 
    $diamont = $diamont . str_repeat(" ", $leftSpace) . $currentLetter;
    if ($innerSpace > 0) {
      $diamont = $diamont . str_repeat(" ", $innerSpace) . $currentLetter;
    }
    $diamont = $diamont . "\n";
    $currentLetter = chr(ord($currentLetter)-1);
    $innerSpace = $innerSpace - 2;
  }

  echo $diamont;

}

?>