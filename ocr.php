<?php


$title = shell_exec('wget http://80.68.8.91/weather/Graph/weather.png -O weather.png');
$title2 = shell_exec('sleep(5)');
// convert - ��� ������� ImageMagick
$title3 = shell_exec('convert -resize 150% -quality 100 -density 300 -units PixelsPerInch weather.png weatherbig.png');
$title4 = shell_exec('sleep(5)');
$title5 = shell_exec('convert weatherbig.png -bordercolor White -border 10x10 -flatten -quality 100  weatherbig.jpg');
$title10 = shell_exec('sleep(5)');
$title11 = shell_exec('convert weather.png -flatten -quality 100  weather.jpg');
$title8 = shell_exec('sleep(5)');
$title9 = shell_exec('convert weather.jpg weatherjpg.svg');
$title12 = shell_exec('sleep(5)');
$title13 = shell_exec('convert weather.png -flatten -background none weatherpng.svg');
$title14 = shell_exec('sleep(5)');
$title15 = shell_exec('convert weather.png weather.pnm');
$title16 = shell_exec('sleep(5)');
$title17 = shell_exec('potrace weather.pnm -s -o weatherpnm.svg');

$title18 = shell_exec('sleep(5)');
$title19 = shell_exec('autotrace -output-file weatherautotrace.svg -output-format svg weather.png');

$title6 = shell_exec('sleep(5)');
// tesseract - ��� ������� tesseract
$title7 = shell_exec('tesseract weatherbig.jpg weather.txt -l rus');
$title22 = shell_exec('sleep(5)');
echo count(scandir('weatherarchive/'));
if (count(scandir('weatherarchive/')) > 97)
{
$title21 = shell_exec('find weatherarchive/ -type f | xargs stat -c "%Y %n" | sort -n | head -1 | cut -d\' \' -f2 | xargs rm -f');
}
else
{
}
$title20 = shell_exec('cp weather.png weatherarchive/weather-$(date +%Y%m%d-%H:%M:%S).png');
?>