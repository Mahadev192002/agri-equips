<?php
require_once('connection.php');
$equipid = $_GET['id']; // Correct variable name from GET parameter

$sql = "DELETE FROM Equipmentdetails WHERE EQUIP_ID=$equipid";
$result = mysqli_query($con, $sql);

if($result) {
    echo '<script>alert("EQUIPMENT DELETED SUCCESSFULLY")</script>';
} else {
    echo '<script>alert("ERROR: Failed to delete equipment")</script>';
}

echo '<script>window.location.href = "adminequip.php";</script>';
?>
