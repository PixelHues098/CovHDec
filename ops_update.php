<?php
include 'connectdb.php';

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $fullname = $_POST['fullname'];
    $nationality = $_POST['nationality'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $mobileNo = $_POST['mobileNo'];
    $email_add = $_POST['email_add'];
    $body_temp = $_POST['body_temp'];
    $vax = $_POST['vax'];
    $cov_enc = $_POST['cov_enc'];
    $cov_diag = $_POST['cov_diag'];

    
    $updateSql = "UPDATE tbl_patient_info SET fullname='$fullname', nationality='$nationality', gender='$gender', age='$age', mobileNo='$mobileNo', email_add='$email_add', body_temp='$body_temp', vax='$vax', cov_enc='$cov_enc', cov_diag='$cov_diag' WHERE id=$id";

    if ($conn->query($updateSql) === TRUE) {
        header("Location: dashboard.php#main");
        exit();
    } else {
        $errorMessage = "Update error: " . $conn->error; 
        die($errorMessage);
    }
}
?>
