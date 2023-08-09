
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="assets/css/style.css">

    <title>Corona Virus Health Declaration</title>
</head>
<body>
        <!-- Sidebar -->
        <div class="sidebar">
            <a href="#" class="logo">
            <i class='bx bxs-virus bx-tada' ></i>
                <div class="logo-name"><span>CoV</span>HDec</div>
            </a>
            <ul class="side-menu">
                <li class="active" ><a href="#"><i class='bx bxs-dashboard'></i>Dashboard</a></li>
                <li><a href="insertPage.php#entryform"><i class='bx bxs-pen'></i>Entry Form</a></li>
            </ul>

            <ul class="side-menu">
                <li> 
                <a id="downloadLink" class="logout" href="docs\CovHDec_User_Guide.pdf" download="">
                    <i class='bx bxs-cloud-download'></i>
                    User Manual
                </a>
                </li>
                <li>
                    <a href="index.php" class="logout">
                        <i class='bx bx-log-out'></i>
                        Logout
                    </a>
                </li>
            </ul>
        </div>
        <!-- End of Sidebar -->

        <!-- Main Content -->
        <div class="content" id="main">
            <!-- Navbar -->
            <nav>
            <i class='bx bx-menu' ></i>
                <form action="#">
                    <div class="form-input">
                        
                    </div>
                </form>
                <input type="checkbox" id="theme-toggle" hidden>
                <label for="theme-toggle" class="theme-toggle">
                <i class='bx bx-moon'></i> 
                <i class='bx bx-sun'></i> 
                </label>
                <i class='bx bxs-user' ></i>
            </nav>

            <!-- End of Navbar -->

            <main>
                <div class="header">
                    <div class="left">
                        <h1>Dashboard</h1>
                        <ul class="breadcrumb">
                            <li><a href="#">
                                    Summary
                                </a></li>
                            /
                            <li><a href="#" class="active">Covid-19 Related</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Insights -->

                
            
                <ul class="insights">

                    <!-- Encounter -->

                    <?php
                    include 'connectdb.php';
                    $query = "SELECT COUNT(*) AS cov_enc FROM tbl_patient_info WHERE cov_enc = 'YES'";
                    $result = mysqli_query($conn, $query);

                    if ($result) {
                    $row = mysqli_fetch_assoc($result);
                    $cov_enc = $row['cov_enc'];
                    } else {
                    $cov_enc = 0; // Default value if query fails
                    }
                    ?>

                    <li><i class='bx bxs-group' ></i>
                        <span class="info">
                            <h3>
                            <?php echo $cov_enc; ?>
                            </h3>
                            <p>Encounter</p>
                        </span>
                    </li>
                    
                    <!-- Vaccinated -->

                    <?php
                    $query = "SELECT COUNT(*) AS vax FROM tbl_patient_info WHERE vax = 'YES'";
                    $result = mysqli_query($conn, $query);

                    if ($result) {
                        $row = mysqli_fetch_assoc($result);
                        $vax = $row['vax'];
                    } else {
                        $vax = 0; 
                    }
                    ?>

                    <li><i class='bx bxs-injection' ></i>
                        <span class="info">
                            <h3>
                            <?php echo $vax; ?>
                            </h3>
                            <p>Vaccinated</p>
                        </span>
                    </li>

                    <!-- has Fever -->

                    <?php
                    $query = "SELECT COUNT(*) AS body_temp FROM tbl_patient_info WHERE body_temp >= 37";
                    $result = mysqli_query($conn, $query);

                    if ($result) {
                        $row = mysqli_fetch_assoc($result);
                        $body_temp = $row['body_temp'];
                    } else {
                        $body_temp = 0;
                    }
                    ?>

                    <li><i class='bx bx-health'></i></i>
                        <span class="info">
                            <h3>
                            <?php echo $body_temp; ?>
                            </h3>
                            <p>Has Fever</p>
                        </span>
                    </li>

                    <!-- Adult -->
                    <?php
                    // Query to count patients who are adults (age >= 18)
                    $query = "SELECT COUNT(*) AS age FROM tbl_patient_info WHERE age >= 18";
                    $result = mysqli_query($conn, $query);

                    if ($result) {
                        $row = mysqli_fetch_assoc($result);
                        $age = $row['age'];
                    } else {
                        $age = 0;
                    }
                    ?>

                    <li><i class='bx bxs-face' ></i>
                        <span class="info">
                            <h3>
                            <?php echo $age; ?>
                            </h3>
                            <p>Adult</p>
                        </span>
                    </li>

                    <!-- Minor -->
                    <?php
                    $query = "SELECT COUNT(*) AS age FROM tbl_patient_info WHERE age <= 17";
                    $result = mysqli_query($conn, $query);

                    if ($result) {
                        $row = mysqli_fetch_assoc($result);
                        $age = $row['age'];
                    } else {
                        $age = 0;
                    }
                    ?>
                    <li><i class='bx bx-child'></i>
                        <span class="info">
                            <h3>
                            <?php echo $age; ?>
                            </h3>
                            <p>Minor</p>
                        </span>
                    </li>

                    <?php
                    // Query to count non-Filipino nationalities
                    $query = "SELECT COUNT(*) AS nationality FROM tbl_patient_info WHERE nationality != 'FILIPINO'";

                    $result = $conn->query($query);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $nationality = $row["nationality"];
                    } else {
                        $nationality = 0;
                    }
                    ?>

                    <li><i class='bx bxs-plane-take-off' ></i>
                        <span class="info">
                            <h3>
                            <?php echo $nationality; ?>
                            </h3>
                            <p>Foreigner</p>
                        </span>
                    </li>
                </ul>
                <!-- End of Insights -->

                <div class="bottom-data">
                    <div class="records">
                        <div class="header">
                            <i class='bx bx-receipt'></i>
                            <h3>Patient Records</h3>
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th class="im"></th>
                                    <th class="na">Fullname</th>
                                    <th class="nat">Nationality</th>
                                    <th class="gen">Gender</th>
                                    <th class="ag">Age</th>
                                    <th class="mn">Mobile No.</th>
                                    <th class="ea">Email Address</th>
                                    <th class="bt">Body Temperature</th>
                                    <th class="vx">Vaccinated</th>
                                    <th class="ce">Encountered <br> Covid Patients</th>
                                    <th class="cd">Diagnosed <br> with Covid</th>
                                    <th class="ac">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php
                            include 'connectdb.php';
                            $sql = "SELECT * FROM tbl_patient_info";
                            $result = $conn->query($sql);

                            if (!$result) {
                                $errorMessage = "Query error: " . $conn->error; 
                                die($errorMessage);
                            }

                            while ($row = $result->fetch_assoc()) {?>
                                
                                <td class='im'><i class='bx bxs-user-pin'></i></td>
                                <td class='id' style='display: none;'><?php echo $row['id']; ?></td>
                                <td class='na'><?php echo $row["fullname"]; ?></td>
                                <td class='nat'><?php echo $row['nationality']; ?></td>
                                <td class='gen'><?php echo $row['gender']; ?></td>
                                <td class='ag'><?php echo $row['age']; ?></td>
                                <td class='mn'><?php echo $row['mobileNo']; ?></td>
                                <td class='ea'><?php echo $row['email_add']; ?></td>
                                <td class='bt'><?php echo $row['body_temp']; ?> °C</td>
                                <td class='vx'><?php echo $row['vax']; ?></td>
                                <td class='ce'><?php echo $row['cov_enc']; ?></td>
                                <td class='cd'><?php echo $row['cov_diag']; ?></td>
                                <td class='ac'>
                                    <a class='mo' href="dashboard.php?id=<?php echo $row['id']; ?>#entryform"><button type='button' class='expand-button'><i class='bx bx-message-square-edit'></i></button></a>
                                    <a class='del' href="deletePage.php?id=<?php echo $row['id']; ?>"><button type='button' class='delete-button'><i class='bx bx-message-square-x'></i></button></a>
                                </td>
                                    </tr>
                            <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
        
        <?php
        include 'connectdb.php';

        $id = &$_GET['id'];
        $sql = "SELECT * FROM tbl_patient_info WHERE id=$id ";
        $result = $conn->query($sql);
        if($result->num_rows>0){
            while($row=$result->fetch_assoc())
            { ?>

        <div class="edit-data" id="editform" >
            <div class="editinsert">
                <div class="editinsertheader">
                    <i class='bx bx-message-square-edit'></i>
                    <h3>Update Patient Record</h3>
                    <a href="dashboard.php#main"><i class='bx bx-x'></i></a>          
                </div>
                    <form action="ops_update.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <h3><label for="fullname">Patient Fullname</label></h3>
                    <input type="text" name="fullname" id="fullname"  value="<?php echo $row['fullname']; ?>" class="box" required>   
                    <h3><label for="nationality">Patient Nationality</label></h3>
                    <input type="text" name="nationality" id="nationality" value="<?php echo $row['nationality']; ?>" class="box" required>
                    
                    <h3><label for="gender">Patient Gender</label></h3>
                    <select name="gender" id="gender" class="box" required>
                        <option value="" disabled>Select Gender</option>
                        <option value="Male" <?php if ($row['gender'] === 'Male') echo 'selected'; ?>>Male</option>
                        <option value="Female" <?php if ($row['gender'] === 'Female') echo 'selected'; ?>>Female</option>
                        <option value="Other" <?php if ($row['gender'] === 'Other') echo 'selected'; ?>>Other</option>
                    </select>

                    <h3><label for="age">Patient Age</label></h3>
                    <select name="age" id="age" class="box" required>
                        <option value="" disabled>Select Age</option>
                        <?php
                        for ($i = 1; $i <= 100; $i++) {
                            $selected = ($i == $row['age']) ? 'selected' : '';
                            echo "<option value=\"$i\" $selected>$i</option>";
                        }
                        ?>
                    </select>

                    <h3><label for="mobile_no">Patient Mobile No.</label></h3>
                    <input type="text" name="mobileNo" id="mobileNo" value="<?php echo $row['mobileNo']; ?>" class="box" required>

                    <h3><label for="email_add">Patient eMail Address</label></h3>
                    <input type="text" name="email_add" id="email_add" value="<?php echo $row['email_add']; ?>" class="box" required>

                    <h3><label for="body_temp">Patient Body Temperature (°C)</label></h3>
                    <input type="text" name="body_temp" id="body_temp" value="<?php echo $row['body_temp']; ?>" class="box" required>

                    <h3><label for="vaccinated">Is the Patient Vaccinated?</label></h3>
                    <select name="vax" id="vax" class="box" required>
                        <option value="" disabled>Select YES/NO</option>
                        <option value="YES" <?php if ($row['vax'] === 'YES') echo 'selected'; ?>>YES</option>
                        <option value="NO" <?php if ($row['vax'] === 'NO') echo 'selected'; ?>>NO</option>
                    </select>

                    <h3><label for="encountered">Does the Patient Encountered other Covid Patients?</label></h3>
                    <select name="cov_enc" id="cov_enc" class="box" required>
                        <option value="" disabled>Select YES/NO</option>
                        <option value="YES" <?php if ($row['cov_enc'] === 'YES') echo 'selected'; ?>>YES</option>
                        <option value="NO" <?php if ($row['cov_enc'] === 'NO') echo 'selected'; ?>>NO</option>
                    </select>

                    
                    <h3><label for="diagnosed">Does the Patient Diagnosed with Covid?</label></h3>
                    <select name="cov_diag" id="cov_diag" class="box" required>
                        <option value="" disabled>Select YES/NO</option>
                        <option value="YES" <?php if ($row['cov_diag'] === 'YES') echo 'selected'; ?>>YES</option>
                        <option value="NO" <?php if ($row['cov_diag'] === 'NO') echo 'selected'; ?>>NO</option>
                    </select>

                    <input type="submit" name="update" value="Update" class="btn" onclick="return confirmUpdate();">
                </form>
            </div>
        </div>

        <?php 
            } 
        } 
        ?>
       
    <script src="assets/js/script.js" ></script>
</body>
</html>