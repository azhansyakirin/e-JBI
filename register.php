<?php
// Include config file
require_once "config.php";

include('header.php');
 
// Define variables and initialize with empty values
$username = $userIC = $emel = $password = $confirm_password = $tableuser = "";
$username_err = $userIC_err = $emel_err = $password_err = $select_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

        if(empty($_POST["typeofuser"])){
            $select_err = "Sila pilih jenis akaun.";
        } else {
            $tableuser = $_POST["typeofuser"];
        }

        if(empty(trim($_POST["userIC"]))){
            $userIC_err = "Sila masukkan nombor kad pengenalan.";
        } else{

            $sql = "SELECT userIC FROM $tableuser WHERE userIC = ?";
        
            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_userIC);
            
                // Set parameters
                $param_userIC = trim($_POST["userIC"]);
            
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    /* store result */
                    mysqli_stmt_store_result($stmt);
                
                    if(mysqli_stmt_num_rows($stmt) == 1){
                        $userIC_err = "Nombor kad pengenalan tidak sah.";
                    } else{
                        $userIC = trim($_POST["userIC"]);
                    }
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }

                // Close statement
                mysqli_stmt_close($stmt);
            }
        }
 
        // Validate username
        if(empty(trim($_POST["username"]))){
        $username_err = "Sila masukkan nama penuh.";
        } else{
            // Prepare a select statement
            $sql = "SELECT username FROM $tableuser WHERE username = ?";
        
            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_username);
            
                // Set parameters
                $param_username = trim($_POST["username"]);
            
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    /* store result */
                    mysqli_stmt_store_result($stmt);
                
                    if(mysqli_stmt_num_rows($stmt) == 1){
                        $username_err = "Nama dimasukkan tidak sah.";
                    } else{
                        $username = trim($_POST["username"]);
                    }
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
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
            $password_err = "Kata laluan haruslah lebih dari 6 patah perkataan.";
        } else{
            $password = trim($_POST["password"]);
        }
    
        // Validate confirm password
        if(empty(trim($_POST["confirm_password"]))){
            $confirm_password_err = "Sila sahkan kata laluan.";     
        } else{
            $confirm_password = trim($_POST["confirm_password"]);
            if(empty($password_err) && ($password != $confirm_password)){
                $confirm_password_err = "Kata laluan yang dimasukkan tidak sama.";
            }
        }
    
        // Check input errors before inserting in database
        if(empty($username_err) && empty($userIC_err) && empty($emel_err) && empty($password_err) && empty($confirm_password_err)){
        
            // Prepare an insert statement
            $sql = "INSERT INTO $tableuser (userIC, username, password, emel) VALUES (?, ?, ?, ?)";
         
            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "isss", $param_userIC, $param_username, $param_password, $param_emel);
            
                // Set parameters
                $param_userIC = $userIC;
                $param_username = $username;
                $param_emel = $emel;
                $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    // Redirect to login page
                    header("location: login.php");
                } else{
                    echo "Something went wrong. Please try again later.";
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
    <title>EJBI | Pendaftaran Pengguna</title>
</head>

<body>
    <section style="padding-top:120px;" class="banner" id="banner">
        <div class="content">
        <div class="container-form">
            <h2 style="text-align: center; margin-bottom: 30px; font-size:30px; color:black;"><b>Pendaftaran Pengguna</b></h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                    <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                        <label>Nama</label>
                        <!-- <label id="labelspace" style="width: 10px;">:</label> -->
                            <input id="inputReg" type="text" name="username" class="form-control" value="<?php echo $username; ?>"
                            autocomplete="off" style="width:100%;">
                            <span id="help-block"><?php echo $username_err; ?></span>
                    </div>

                    <div class="form-group <?php echo (!empty($userIC_err)) ? 'has-error' : ''; ?>">
                        <label>Nombor Kad Pengenalan</label>
                        <!-- <label id="labelspace" style="width: 10px;">:</label> -->
                            <input id="inputReg" type="text" name="userIC" class="form-control" value="<?php echo $userIC; ?>"
                            autocomplete="off" maxlength="12" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');"
                            style="width:100%;">
                            <span id="help-block"><?php echo $userIC_err; ?></span>
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

                    <div class="form-group">
                        <label>Pilih Jenis Akaun</label>
                        <select name="typeofuser" style="height: 34px; border-radius:4px; text-align-last:center; margin-top:20px;">
                        <option value="" hidden disabled selected>Jenis Akaun</option>
                            <optgroup label="Jenis Akaun">
                                <option value="users">Pemohon JBI</option>
                                <option value="JBI">JBI</option>
                            </optgroup>
                        </select>
                    </div>

                    <div style="text-align:center" class="form-group">
                        <input type="submit" style="width: 100%; border:0;" class="btn btn-lulus" value="Daftar">
                    </div>
                    <p style="text-align: center; margin-top:20px;">Pengguna berdaftar? <a href="login.php"><b>Log masuk disini</b></a>.</p>
                </form>
        </div>
        </div>
    </section>
<body>
