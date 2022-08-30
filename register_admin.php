<?php
// Include config file
require_once "config.php";

include('header.php');
 
// Define variables and initialize with empty values
$adminUname = $emel = $password = $confirm_password = "";
$adminUname_err = $emel_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

        // Validate username
        if(empty(trim($_POST["adminUname"]))){
        $adminUname_err = "Sila masukkan nama pengguna.";
        } else{
            // Prepare a select statement
            $sql = "SELECT adminUname FROM adminUser WHERE adminUname = ?";
        
            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_adminUname);
            
                // Set parameters
                $param_adminUname = trim($_POST["adminUname"]);
            
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    /* store result */
                    mysqli_stmt_store_result($stmt);
                
                    if(mysqli_stmt_num_rows($stmt) == 1){
                        $adminUname_err = "Nama pengguna yang dimasukkan telah berdaftar.";
                    } else{
                        $adminUname = trim($_POST["adminUname"]);
                    }
                } else{
                    echo "Sila cuba sebentar lagi.";
                }

                // Close statement
                mysqli_stmt_close($stmt);
            }
        }

        if(empty(trim($_POST["emel"]))){
            $emel_err = "Sila masukkan alamat emel.";
        } else{
            $emel = trim($_POST["emel"]);
        }
    
        // Validate password
        if(empty(trim($_POST["password"]))){
            $password_err = "Sila masukkan kata laluan.";     
        } elseif(strlen(trim($_POST["password"])) < 6){
            $password_err = "Kata laluan harus lebih dari 6 perkataan.";
        } else{
            $password = trim($_POST["password"]);
        }
    
        // Validate confirm password
        if(empty(trim($_POST["confirm_password"]))){
            $confirm_password_err = "Sila sahkan kata laluan.";     
        } else{
            $confirm_password = trim($_POST["confirm_password"]);
            if(empty($password_err) && ($password != $confirm_password)){
                $confirm_password_err = "Kata laluan tidak sama seperti diatas.";
            }
        }
    
        // Check input errors before inserting in database
        if(empty($adminUname_err) && empty($emel_err) && empty($password_err) && empty($confirm_password_err)){
        
            // Prepare an insert statement
            $sql = "INSERT INTO adminuser (adminUname, password, emel) VALUES (?, ?, ?)";
         
            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "sss", $param_adminUname, $param_password, $param_emel);
            
                // Set parameters
                $param_adminUname = $adminUname;
                $param_emel = $emel;
                $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    // Redirect to login page
                    header("location: login_admin.php");
                } else{
                    echo "Pendaftaran gagal. Sila cuba sebentar lagi.";
                }

                // Close statement
                mysqli_stmt_close($stmt);
            }
        }
    
        // Close connection
        mysqli_close($link);
}
?>

<head>
    <title>EJBI | Pendaftaran Admin</title>
</head>

<body>
    <section class="banner" id="banner">
        <div class="content">
        <div class="container-form">
            <h2 style="text-align: center; margin-bottom: 30px; font-size:30px; color:black;""><b>Pendaftaran Admin</b></h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                    <div class="form-group <?php echo (!empty($adminUname_err)) ? 'has-error' : ''; ?>">
                        <label>Nama Pengguna</label>
                        <!-- <label id="labelspace" style="width: 10px;">:</label> -->
                            <input id="inputReg" type="text" name="adminUname" class="form-control" value="<?php echo $adminUname; ?>"
                            autocomplete="off" style="width:100%;">
                            <span id="help-block"><?php echo $adminUname_err; ?></span>
                    </div>

                    <div class="form-group <?php echo (!empty($emel_err)) ? 'has-error' : ''; ?>">
                        <label>Emel</label>
                        <!-- <label id="labelspace" style="width: 10px;">:</label> -->
                            <input id="inputReg" type="text" name="emel" class="form-control" value="<?php echo $emel; ?>"
                            autocomplete="off" style="width:100%;">
                            <span id="help-block"><?php echo $emel_err; ?></span>
                    </div>

                    <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                        <label>Kata Laluan</label>
                        <!-- <label id="labelspace" style="width: 10px;">:</label> -->
                            <input id="inputReg" type="password" name="password" class="form-control" value="<?php echo $password; ?>" style="width:100%;">
                            <span id="help-block"><?php echo $password_err; ?></span>
                    </div>

                    <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                        <label>Sahkan Kata Laluan</label>
                        <!-- <label id="labelspace" style="width: 10px;">:</label> -->
                            <input id="inputReg" type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>" style="width:100%;">
                            <span id="help-block"><?php echo $confirm_password_err; ?></span>
                    </div>

                    <div style="text-align:center" class="form-group">
                        <input type="submit" style="border: 0; width: 100%;" class="btn btn-lulus" value="Daftar">
                    </div>
                    <p style="text-align: center; margin-top:20px;">Pengguna berdaftar? <a href="login_admin.php"><b>Log masuk disini</b></a>.</p>
                </form>
        </div>
        </div>
    </section>
</header>
