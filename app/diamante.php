<?php

// Get data from URL
if (isset($_GET['key'])) {
  drawDiamont($_GET['key'][0]);
}

// Draws diamont recursively
function drawRecDiamont($diamont, $letter, $currentLetter, $leftSpace, $innerSpace, $topSide) {
  if($innerSpace > 0) {
    $diamont .= str_repeat(" ", $leftSpace) . $currentLetter . str_repeat(" ", $innerSpace) . $currentLetter . "\n";
  } else {
    $diamont .= str_repeat(" ", $leftSpace) . $currentLetter . "\n";
  }
  if ($topSide) {
    if ($letter != $currentLetter) {
      return drawRecDiamont($diamont, $letter, chr(ord($currentLetter)+1), $leftSpace - 1, $innerSpace + 2, true);
    } else {
      return drawRecDiamont($diamont, $letter, chr(ord($currentLetter)-1), $leftSpace + 1, $innerSpace - 2, false);
    }
  } else {
    if ($currentLetter != 'A') {
      return drawRecDiamont($diamont, $letter, chr(ord($currentLetter)-1), $leftSpace + 1, $innerSpace - 2, false);
    } else {
      return $diamont;
    }
  }
}

// function that set variables to optimize recursive function
function drawDiamont ($letter) {
  echo strtoupper($letter) == 'A'
    ? 'A' 
    : drawRecDiamont("\n", strtoupper($letter), 'A', ord(strtoupper($letter))-ord('A'), -1, true);
}
