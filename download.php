                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <?php
// Connection 

$conn=mysql_connect('localhost','user','pass');
$db=mysql_select_db('admin_weather',$conn);

$filename = "weather.csv"; // File Name
// Download file
//header('Content-Encoding: UTF-8');
header("Content-Disposition: attachment; filename=\"$filename\"");
//header("Content-Type: application/vnd.ms-excel; charset=utf-8");
////////header("Content-type:   application/x-msexcel; charset=utf-8");
header("Content-Type: text/csv; charset=cp1251");
//echo "\xEF\xBB\xBF";
mysql_query("SET NAMES 'cp1251'"); 
mysql_query("SET CHARACTER SET 'cp1251'");
$user_query = mysql_query('select * from weather');
// Write data to file
$flag = false;
while ($row = mysql_fetch_assoc($user_query)) {
    if (!$flag) {
        // display field/column names as first row
        echo implode(";", array_keys($row)) . "\r\n";
        $flag = true;
    }
    echo implode(";", array_values($row)) . "\r\n";
}
?>