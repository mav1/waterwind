<?php
$hostname = 'localhost';        // Your MySQL hostname. Usualy named as 'localhost'
$dbname   = 'admin_weather'; // Your database name.
$dbusername = 'user';             // Your database username.
$dbpassword = 'password';                 // Your database password. If your database has no password, leave it empty.

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
$sql = "SELECT * FROM (SELECT * FROM weather ORDER BY id DESC LIMIT 96) t ORDER BY id ASC";

            // Выполнить запрос 
$res = mysql_query($sql);

            // 
 $array = array();
 $array2 = array();
while($row = mysql_fetch_array ($res))
 {
array_push($array, $row['watertagan']);
array_push($array2, $row['time']);
}

include("pchart/class/pDraw.class.php"); 
 include("pchart/class/pImage.class.php"); 
 include("pchart/class/pData.class.php");

 /* Create your dataset object */ 
 $myData = new pData(); 
 
 /* Add data in your dataset */ 

 $myData->addPoints($array);
 $myData->addPoints($array2,"Labels");
 $myData->setAbscissa("Labels");
  //$myData->addPoints($array2);
 /* Create a pChart object and associate your dataset */ 
 $myPicture = new pImage(1000,230,$myData);

 /* Choose a nice font */
 $myPicture->setFontProperties(array("FontName"=>"pchart/fonts/Forgotte.ttf","FontSize"=>11));

 /* Define the boundaries of the graph area */
 $myPicture->setGraphArea(60,40,970,190);

$maxXLabels = 10; // How many labels on-screen?
$labelSkip = floor( count( $array2 ) / $maxXLabels ); // how many should we skip?
$myPicture->drawScale(array("LabelSkip"=>$labelSkip));

 /* Draw the scale, keep everything automatic */ 
// $myPicture->drawScale();

 /* Draw the scale, keep everything automatic */ 
 $myPicture->drawSplineChart();

 /* Render the picture (choose the best way) */
 //$myPicture->autoOutput("/force.png");
 $myPicture->Stroke();



?>