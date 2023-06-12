<?php
error_reporting(0);
$table_row="";
$from = $_POST['from'];
$to = $_POST['to'];
//////////////////////////////////////////////
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "xpeed_task";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
//////////////////////////////////////////////
$query_get = "SELECT * FROM `data_house` WHERE entry_at between '$from' AND '$to' ORDER BY entry_at DESC";
$sth = $conn->prepare($query_get);
$sth->execute();
$data = $sth->get_result();
$result = $data->fetch_all(MYSQLI_ASSOC);
if(count($result)>0){
    for($i=0;$i<count($result);$i++)
    {
        $table_row .= "<tr>";
        $table_row .= "<td>".$result[$i]['id']."</td>";
        $table_row .= "<td>".$result[$i]['amount']."</td>";
        $table_row .= "<td>".$result[$i]['buyer']."</td>";
        $table_row .= "<td>".$result[$i]['receipt_id']."</td>";
        $table_row .= "<td>".$result[$i]['items']."</td>";
        $table_row .= "<td>".$result[$i]['buyer_email']."</td>";
        $table_row .= "<td>".$result[$i]['buyer_ip']."</td>";
        $table_row .= "<td>".$result[$i]['note']."</td>";
        $table_row .= "<td>".$result[$i]['city']."</td>";
        $table_row .= "<td>".$result[$i]['phone']."</td>";
        $table_row .= "<td>".$result[$i]['hash_key']."</td>";
        $table_row .= "<td>".$result[$i]['entry_at']."</td>";
        $table_row .= "<td>".$result[$i]['entry_by']."</td>";
        $table_row .= "</tr>";
    }
}
echo $table_row ;
$conn->close();

?>