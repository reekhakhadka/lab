<?php
function lastCharFrontBackV2($str) {
    $length = strlen($str);
    if ($length >= 1) {
        $lastChar = $str[$length - 1]; // Access last character directly
        return $lastChar . $str . $lastChar;
    }
    return $str;
}

// Test
echo lastCharFrontBackV2("Red") . "\n";   // dRedd
echo lastCharFrontBackV2("Green") . "\n"; // nGreenn
echo lastCharFrontBackV2("1") . "\n";     // 111
?>