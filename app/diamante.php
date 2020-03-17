<?php

// Get data from URL
if (isset($_GET['key'])) {
  drawDiamont($_GET['key'][0]);
}

// Draws diamont recursively
function drawRecDiamont($diamont, $letter, $currentLetter, $leftSpace, $innerSpace, $topSide) {
  if ($topSide) {
    $diamont = $diamont . str_repeat(" ", $leftSpace) . $currentLetter;
    if($innerSpace>0) {
      $diamont = $diamont . str_repeat(" ", $innerSpace) . $currentLetter . "\n";
    } else {
      $diamont = $diamont . "\n";
    }
    if ($letter == $currentLetter) {
      $currentLetter = chr(ord($currentLetter)-1);
      $leftSpace = $leftSpace + 1;
      $innerSpace = $innerSpace - 2;
      $topSide = false;
    } else {
      $currentLetter = chr(ord($currentLetter)+1);
      $leftSpace = $leftSpace - 1;
      $innerSpace = $innerSpace + 2;
      $topSide = true;
    }
    return drawRecDiamont($diamont, $letter, $currentLetter, $leftSpace, $innerSpace, $topSide);
  } else {
    $diamont = $diamont . str_repeat(" ", $leftSpace) . $currentLetter;
    if($innerSpace>0) {
      $diamont = $diamont . str_repeat(" ", $innerSpace) . $currentLetter . "\n";
    } else {
      $diamont = $diamont . "\n";
    }
    if ($currentLetter == 'A') {
      return $diamont;
    } else {
      $currentLetter = chr(ord($currentLetter)-1);
      $leftSpace = $leftSpace + 1;
      $innerSpace = $innerSpace - 2;
      $topSide = false;
    }
    return drawRecDiamont($diamont, $letter, $currentLetter, $leftSpace, $innerSpace, $topSide);
  }
}

// function that set variables to optimize recursive function
function drawDiamont ($letter) {
  $currentLetter = 'A';
  $innerSpace = -1;
  $diamont = "\n";
  if (strtoupper($letter) == 'A') {
    echo "A";
  } else {
    echo drawRecDiamont($diamont, strtoupper($letter), $currentLetter, ord(strtoupper($letter))-ord($currentLetter), $innerSpace, true);
  }
}
