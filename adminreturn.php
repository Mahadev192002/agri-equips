<?php
require_once('connection.php');

$equipid = $_GET['id'];
$book_id = $_GET['bookid'];

// Fetch booking details
$sql2 = "SELECT * FROM booking WHERE BOOK_Id=$book_id";
$result2 = mysqli_query($con, $sql2);
$res2 = mysqli_fetch_assoc($result2);

// Fetch equipment details
$sql = "SELECT * FROM Equipmentdetails WHERE EQUIP_ID=$equipid";
$result = mysqli_query($con, $sql);
$res = mysqli_fetch_assoc($result);

if (!$res || !$res2) {
    echo '<script>alert("Invalid booking or equipment ID")</script>';
    echo '<script>window.location.href = "adminbook.php";</script>';
    exit();
}

if ($res['AVAILABLE'] == 'Y') {
    echo '<script>alert("Apparatus is already returned")</script>';
    echo '<script>window.location.href = "adminbook.php";</script>';
} else {
    // Update equipment availability to 'Y' (available) and booking status to 'RETURNED'
    $sql4 = "UPDATE Equipmentdetails SET AVAILABLE='Y' WHERE EQUIP_ID=$equipid";
    $sql5 = "UPDATE booking SET BOOK_STATUS='RETURNED' WHERE BOOK_ID=$book_id";
    
    if (mysqli_query($con, $sql4) && mysqli_query($con, $sql5)) {
        echo '<script>alert("Apparatus returned successfully")</script>';
    } else {
        echo '<script>alert("Failed to return apparatus")</script>';
    }
    
    // Redirect back to adminbook.php
    echo '<script>window.location.href = "adminbook.php";</script>';
}
?>
