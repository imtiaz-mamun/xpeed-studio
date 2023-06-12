<?php
error_reporting(0);
$obj_this_buy = $_POST['obj_this_buy'];
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
function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
$hashing_key = hash("sha512", $salt . $obj_this_buy['receipt_id']);
$client_ip = get_client_ip();
$currentDate = date('Y-m-d'); 
$item_list = implode(', ', $obj_this_buy['items']);
$buyer_email_string = strval($obj_this_buy['buyer_email']);
$this_amount = $obj_this_buy['amount'];
$this_buyer = $obj_this_buy['buyer'];
$this_receipt_id = $obj_this_buy['receipt_id'];
$this_note = $obj_this_buy['note'];
$this_city = $obj_this_buy['city'];
$this_phone = $obj_this_buy['phone'];
$this_entry_by = $obj_this_buy['entry_by'];
$query_get = "INSERT INTO `data_house` (amount, buyer, receipt_id, items, buyer_email, buyer_ip, note, city, phone, hash_key, entry_at, entry_by) VALUES ('$this_amount', '$this_buyer', '$this_receipt_id', '$item_list',  '$buyer_email_string', '$client_ip', '$this_note', '$this_city','$this_phone', '$hashing_key', '$currentDate', '$this_entry_by')";


if ($conn->query($query_get) === TRUE) {
  echo "1";
} else {
  echo "Error: " . $query_get . "<br>" . $conn->error;
}

$conn->close();

?>