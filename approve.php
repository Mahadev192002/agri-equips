<?php
require_once('connection.php');

// Sanitize input
$bookid = mysqli_real_escape_string($con, $_GET['id']);

// Fetch booking details
$sql = "SELECT * FROM booking WHERE BOOK_Id='$bookid'";
$result = mysqli_query($con, $sql);
$res = mysqli_fetch_assoc($result);

if (!$res) {
    echo '<script>alert("Invalid booking ID")</script>';
    echo '<script>window.location.href = "adminbook.php";</script>';
    exit();
}

$equip_id = $res['EQUIP_ID'];

// Fetch equipment details
$sql2 = "SELECT * FROM Equipmentdetails WHERE EQUIP_ID='$equip_id'";
$equipres = mysqli_query($con, $sql2);

// Check if query was successful
if ($equipres) {
    // Fetch the first row from the result set
    $equipresult = mysqli_fetch_assoc($equipres);

    // Access specific columns from the fetched row
    $equipName = $equipresult['EQUIP_NAME'];
    $equipDescription = $equipresult['DESCRIPTION'];
    // Add more variables as needed for other columns
} else {
    // Handle query failure
    echo "Error: " . mysqli_error($con);
}

if (!$equipresult) {
    echo '<script>alert("Invalid equipment ID")</script>';
    echo '<script>window.location.href = "adminbook.php";</script>';
    exit();
}

$email = $res['EMAIL'];
$equipname = $equipresult['EQUIP_NAME'];

if ($equipresult['AVAILABLE'] == 'Y') {
    if ($res['BOOK_STATUS'] == 'APPROVED' || $res['BOOK_STATUS'] == 'RETURNED') {
        echo '<script>alert("Booking is already approved")</script>';
    } else {
        // Update booking status to 'APPROVED' and equipment availability to 'N'
        $query = "UPDATE booking SET BOOK_STATUS='APPROVED' WHERE BOOK_ID='$bookid'";
        $query2 = "UPDATE Equipments SET AVAILABLE='N' WHERE EQUIP_ID='$equip_id'";
        
        if (mysqli_query($con, $query) && mysqli_query($con, $query2)) {
            echo '<script>alert("Booking approved successfully")</script>';
            // Send email notification
            // (Uncomment and configure this section if you want to send email)
        } else {
            echo '<script>alert("Failed to approve booking")</script>';
        }
    }
} else {
    echo '<script>alert("Equipment is not available")</script>';
}

// Redirect back to adminbook.php
echo '<script>window.location.href = "adminbook.php";</script>';
?>
