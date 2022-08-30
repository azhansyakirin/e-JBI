<?php
// Initialize the session
session_start();

include('header.php');
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: logout.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$adminUname = $password = "";
$adminUname_err = $password_err = "";

 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

        // Check if username is empty
        if(empty(trim($_POST["adminUname"]))){
            $adminUname_err = "Sila masukkan nama pengguna.";
        } else{
            $adminUname = trim($_POST["adminUname"]);
        }
    
        // Check if password is empty
        if(empty(trim($_POST["password"]))){
            $password_err = "Sila masukkan kata laluan.";
        } else{
            $password = trim($_POST["password"]);
        }
    
        // Validate credentials
        if(empty($adminUname_err) && empty($password_err)){

            // Prepare a select statement
            $sql = "SELECT adminUname, password FROM adminuser WHERE adminUname = ?";
        
            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_adminUname);
            
                // Set parameters
                $param_adminUname = $adminUname;
            
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    // Store result
                    mysqli_stmt_store_result($stmt);
                
                    // Check if username exists, if yes then verify password
                    if(mysqli_stmt_num_rows($stmt) == 1){                    
                        // Bind result variables
                        mysqli_stmt_bind_result($stmt, $adminUname, $hashed_password);
                        if(mysqli_stmt_fetch($stmt)){

                            if(password_verify($password, $hashed_password)){
                                // Password is correct, so start a new session
                                session_start();
                            
                                // Store data in session variables
                                $_SESSION["loggedin"] = true;
                                $_SESSION["adminUname"] = $adminUname;       
                            
                                // Redirect user to welcome page
                                header("location: adminsemakPermohonan.php");

                            } else{
                                // Display an error message if password is not valid
                                $password_err = "Kata laluan yang dimasukkan tidak sah.";
                            }
                        }
                    } else{
                        // Display an error message if username doesn't exist
                        $adminUname_err = "Tiada nama pengguna berdaftar.";
                    }
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
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
    <title>EJBI | Log Masuk Admin</title>
</head>

<body>
    <section class="banner" id="banner">
        <div class="content">
        <div class="container-form">
            <h2 style="text-align:center; margin-bottom:30px; font-size:30px; color:black;"><b>LOG MASUK ADMIN</b></h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                <div class="form-group <?php echo (!empty($adminUname_err)) ? 'has-error' : ''; ?>">
                    <input type="text" name="adminUname" class="form-control" value="<?php echo $adminUname; ?>" 
                    placeholder="Name Pengguna" maxlength="12" style="width:100%;">
                    <span id="help-block"><?php echo $adminUname_err; ?></span>
                </div>

                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <input type="password" name="password" class="form-control" 
                    placeholder="Kata Laluan" style="width:100%;"> 
                    <span id="help-block"><?php echo $password_err; ?></span>
                </div>


                <div style = "text-align:center" class = "form-group">
                    <input style="width:100%; border: 0;" type="submit" class="btn btn-home" value="Log Masuk">
                </div>

                <!-- <p style="text-align: center; margin-top:20px;">Tiada akaun pengguna? <a href="register_admin.php"><b>Daftar disini</b></a>.</p> -->

            </form>
        </div>
        </div>
    </section>
</body>
