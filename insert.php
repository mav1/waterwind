<?php
$pattern = "/[0-9.]+/";
$pattern2 = "/^[^0-9]*/";
$text4 = preg_replace($pattern2, "", $text4);
  $result = strpos ($text4, '.');
   if ($result === FALSE && $text4 >= 10) 
    { 
   
     $a = 10;
    
     $textnew4 = (float) ($text4/$a);
   
  
     }
     elseif ($result === FALSE && $text4 < 10)
   {
   
   $textnew4 = $text4;
 }
   else
   {
   $textnew4 = $text4;
   
 }

$text2 = preg_replace($pattern, "", $text2);

echo 'ветер - '.$textnew4.'<br><br>';

echo $text3.'<br><br>';

echo 'дата и время с картинки - '.$text1.'<br>';
$pieces = explode(" ", $text1);

$data = date("Y.m.d", strtotime($pieces[0]));
echo $data.'<br><br>';
$time = $pieces[1];
echo $pieces[1].'<br><br>';
$text5 = substr($text, strpos($text, "воды:" ));
echo $text5.'<br><br>';

$content = file_get_contents("http://tidegauge.ru/tide-gauge/auth/login");
$content1 = substr($content, strpos($content, "<h1>Азов (Лоцпост)</h1>"));
$pattern3 = "/\d{4}\-\d{2}\-\d{2}/";
if (preg_match($pattern3, $content1, $matches)) {

   $content1 = substr($content1, strpos($content1, $matches[0]));
   $content1 = substr($content1, strpos($content1, "<td>"));
   $content1 = str_replace("<td>","",$content1);
   $content1 = substr($content1, 0, strpos($content1, "</td>"));
   $waterazov = $content1;
   echo $waterazov."<br>";
}

$content2 = substr($content, strpos($content, "<h1>Ростов-на-Дону</h1>"));
if (preg_match($pattern3, $content2, $matches2)) {

   $content2 = substr($content2, strpos($content2, $matches2[0]));
   $content2 = substr($content2, strpos($content2, "<td>"));
   $content2 = str_replace("<td>","",$content2);
   $content2 = substr($content2, 0, strpos($content2, "</td>"));
   $waterrostov = $content2;
   echo $waterrostov."<br>";
}

$watertagan2 = $text5 + 3.70;
$waterazov2 = $waterazov + 3.80;
$waterrostov2 = $waterrostov + 3.50;

$hostname = 'localhost';       
$dbname   = 'admin_weather'; 
$dbusername = 'user';          
$dbpassword = 'password';          

$connection = mysql_connect($hostname, $dbusername, $dbpassword);
if(!$connection) {
	die("database connection failed." . mysql_error());
}
$connection_q = mysql_query("SET names 'utf8'");
if(!$connection_q) {
	die("set names failed." . mysql_error());
}
$db_select = mysql_select_db($dbname, $connection);
if(!$db_select) {
	die("database selection failed." . mysql_error());
}
$sqlid = "select id from weather where id=(select max(id) from weather)";
mysql_query($sqlid);

$res = mysql_query($sqlid);
$items_count = mysql_affected_rows();

if ( $items_count ) {
while ( $row = mysql_fetch_assoc($res) )
    
    {

$id = $row[id];
}
}
else
{
}
$id++;

$sql = "INSERT INTO weather (id, data, time, wind, windforce, watertagan, watertagan2, waterazov, waterazov2, waterrostov, waterrostov2) VALUES ('{$id}','{$data}','{$time}','{$text3}','{$textnew4}','{$text5}','{$watertagan2}','{$waterazov}','{$waterazov2}','{$waterrostov}','{$waterrostov2}')";

$bad="1970-01-01";
if ($data != $bad) {
mysql_query($sql);
}
else
{
}
?>