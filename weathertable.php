<html>
<head>
<title>Погода - таблица и графики</title>
</head>
<body>
<center><h1>Таблица (последние 100 значений)</h1>
<table border=1>
<tr>
    <th>Дата</th><th>Время</th><th>Направление ветра</th><th>Сила ветра</th><th>Уровень (АДМК)</th><th>Проходная (АДМК)</th><th>Уровень (Азов)</th><th>Проходная (Азов)</th><th>Уровень (Ростов)</th><th>Проходная (Ростов)</th>
   </tr>
   <tr>
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

            // SQL-запрос
$sql = "select * from weather ORDER BY id DESC LIMIT 100";
//$sql = "SELECT * FROM (SELECT * FROM weather ORDER BY id DESC LIMIT 5) t ORDER BY id ASC";

            // Выполнить запрос 
$res = mysql_query($sql);

            // 
            
while($row = mysql_fetch_array($res)) {

               // Записать значение столбца FirstName (который является теперь массивом $row)

        echo"<tr>";
               echo "<td>".$row['data']."</td><td>".$row['time']."</td><td>".$row['wind']."</td><td>".$row['windforce']."</td><td>".$row['watertagan']."</td><td>".$row['watertagan2']."</td><td>".$row['waterazov']."</td><td>".$row['waterazov2']."</td><td>".$row['waterrostov']."</td><td>".$row['waterrostov2']."</td>";
              
        echo"</tr>";



             

            
        }    
        ?> 
        </table><br>
       </body>
       </html>