<?php
include 'connectdb.php';
session_start();

if(isset($_POST['submit'])){

   $username = mysqli_real_escape_string($conn, $_POST['username']); 
   $password = mysqli_real_escape_string($conn,($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM tbl_user WHERE username = '$username' AND password = '$password'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['id'] = $row['id'];
      header('location: dashboard.php');
   }else{
      $message[] = 'incorrect username or password!';
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Welcome to CoVHDec!</title>
   <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
   <link rel="stylesheet" href="assets\css\style.css">
</head>
<body>
   
   <div class="form-container">
      <form action="" method="post" enctype="multipart/form-data">
         <div class="logo-container">
         
         
         <h3 class="logo"><i class='bx bxs-virus bx-tada'></i></i><span>  CoV</span>HDec</h3>
         
         </div>
      
         <?php
         if(isset($message)){
            foreach($message as $message){
               echo '<div class="message">'.$message.'</div>';
            }
         }
         ?>
         <input type="username" name="username" placeholder="Username" class="box" required> 
         <input type="password" name="password" placeholder="Password" class="box" required>
         <input type="submit" name="submit" value="Login" class="btn">
      </form>

   </div>

</body>
</html>
