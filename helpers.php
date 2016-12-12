<?php
namespace TinyHelpers;

/**
 * Translate a $value between $leftMin and $leftMax to the corresponding right value between $rightMin and $rightMax.
 *
 * For example, convert 50% red to 8 bit (for RGB):
 * math_translate(50, 0, 100, 0, 255) => 127.5
 *
 * @param float $val
 * @param float $leftMin
 * @param float $leftMax
 * @param float $rightMin
 * @param float $rightMax
 * @return float
 */
function math_translate(float $val, float $leftMin, float $leftMax, float $rightMin, float $rightMax): float
{
    $leftSpan = $leftMax - $leftMin;
    $rightSpan = $rightMax - $rightMin;
    $scaled = ($val - $leftMin) / $leftSpan;

    return $rightMin + ($scaled * $rightSpan);
}

/**
 * Invert the given $val in the span of $min and $max.
 *
 * For example:
 * - math_invert(50, 50, 100) => 100
 * - math_invert(100, 50, 100) => 50
 * - math_invert(75, 50, 100) => 75
 *
 * @param float $val
 * @param float $min
 * @param float $max
 * @return float
 */
function math_invert(float $val, float $min, float $max)
{
    return $val * -1 + $min + $max;
}

/**
 * check if haystack string begins with needle
 *
 * @param string $haystack the string to check
 * @param string $needle string it should begin with
 * @return bool true if begins with
 * @assert ('hello world', 'hello') === true
 * @assert ('hello world', 'world') === false
 * @assert ('ello world', 'hello') === false
 * @assert ('hello', 'hello') === true
 * @assert ('hell', 'hello') === false
 * @assert ('hell', '') === true
 */
function beginsWith($haystack, $needle) {
    if (''===$needle) {
        return true;
    }
    return 0===strpos($haystack, $needle);
}

/**
 * check if haystack string ends with needle
 *
 * @param string $haystack the string to check
 * @param string $needle string it should end with
 * @return bool true if ends with
 * @assert ('hello world', 'world') === true
 * @assert ('hello world', 'hello') === false
 * @assert ('hello orld', 'world') === false
 * @assert ('hello', 'hello') === true
 * @assert ('hell', 'ello') === false
 * @assert ('hell', '') === true
 */
function endsWith($haystack, $needle) {
    $len=strlen($needle);
    if (0==$len) {
        return true;
    }
    return substr($haystack, -1*$len)===$needle;
}