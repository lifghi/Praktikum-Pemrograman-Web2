<?php

$celcius = 37.841;

$fahrenheit = ($celcius * 9/5) + 32;
$fahrenheit_formatted = number_format($fahrenheit, 4, '.', '');

$reamur = $celcius * 4 / 5;
$reamur_formatted = number_format($reamur, 4, '.', '');

$kelvin = $celcius + 273.15;
$kelvin_formatted = number_format($kelvin, 3, '.', '');

echo "Celcius = $celcius<br>";
echo "Fahrenheit (F) = $fahrenheit_formatted <br>";
echo "Reamur (R) = $reamur_formatted <br>";
echo "Kelvin (K) = $kelvin_formatted <br>";

?>