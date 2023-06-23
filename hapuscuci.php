<?php
include 'koneksi.php';

if (isset($_GET['No_Identitas'])) {
    $No_Identitas = $_GET['No_Identitas'];

    // Perform the delete operation based on the provided id
    $query = "DELETE FROM detail WHERE No_Identitas = '$No_Identitas'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Data has been deleted successfully.";
        // Redirect to the table page after deleting the data
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Error deleting data: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}
?>