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
$userIC = $password = $tableuser = "";
$userIC_err = $password_err = $select_err = "";

 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

        if(empty($_POST["typeofuser"])){
            $select_err = "Sila pilih jenis akaun.";
        } else {
            $tableuser = $_POST["typeofuser"];
        }
 
        // Check if username is empty
        if(empty(trim($_POST["userIC"]))){
            $userIC_err = "Sila masukkan nombor kad pengenalan.";
        } else{
            $userIC = trim($_POST["userIC"]);
        }
    
        // Check if password is empty
        if(empty(trim($_POST["password"]))){
            $password_err = "Sila masukkan kata laluan.";
        } else{
            $password = trim($_POST["password"]);
        }
    
        // Validate credentials
        if(empty($userIC_err) && empty($password_err) && empty($select_err)){

            // Prepare a select statement
            $sql = "SELECT userIC, username, password, emel FROM $tableuser WHERE userIC = ?";
        
            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_userIC);
            
                // Set parameters
                $param_userIC = $userIC;
            
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    // Store result
                    mysqli_stmt_store_result($stmt);
                
                    // Check if username exists, if yes then verify password
                    if(mysqli_stmt_num_rows($stmt) == 1){                    
                        // Bind result variables
                        mysqli_stmt_bind_result($stmt, $userIC, $username, $hashed_password, $emel);
                        if(mysqli_stmt_fetch($stmt)){

                            if(password_verify($password, $hashed_password)){
                                // Password is correct, so start a new session
                                session_start();
                            
                                // Store data in session variables
                                $_SESSION["loggedin"] = true;
                                $_SESSION["userIC"] = $userIC;  
                                $_SESSION["username"] = $username;   
                                $_SESSION["emel"] = $emel;             
                            
                                // Redirect user to welcome page
                                if($tableuser == 'users'){
                                    header("location: utamaPemohon.php");
                                } else {
                                    header("location: utamaJBI.php");
                                }

                            } else{
                                // Display an error message if password is not valid
                                $password_err = "Kata laluan yang dimasukkan tidak sah.";
                            }
                        }
                    } else{
                        // Display an error message if username doesn't exist
                        $userIC_err = "Tiada nombor kad pengenalan berdaftar.";
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
    <title>EJBI | Log Masuk Pengguna</title>
</head>

<body>
    <section class ="banner" id="banner">
        <div class="content">
        <div class="container-form">
            <h2 style="text-align:center; margin-bottom:30px; font-size:30px; color:black;"><b>LOG MASUK PENGGUNA</b></h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                <div class="form-group <?php echo (!empty($userIC_err)) ? 'has-error' : ''; ?>">
                    <input type="text" name="userIC" class="form-control" value="<?php echo $userIC; ?>" autocomplete="off" 
                    placeholder="No. Kad Pengenalan" maxlength="12" 
                    oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');" style="width:100%;">
                    <span id="help-block"><?php echo $userIC_err; ?></span>
                </div>

                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <input type="password" name="password" class="form-control" 
                    placeholder="Kata Laluan" style="width:100%;">
                    <span id="help-block"><?php echo $password_err; ?></span>
                </div>

                <div class="form-group" style="text-align: center;">
                    <select name="typeofuser" style="height: 34px; border-radius:4px; text-align-last:center; margin-top:20px;">
                    <option value="" hidden disabled selected>Jenis Pengguna</option>
                    <optgroup label= "Jenis Pengguna">
                        <option value="users">Pemohon JBI</option>
                        <option value="JBI">JBI</option>
                        <span id="help-block"><?php echo $select_err; ?></span>
                    </optgroup>
                    </select>
                </div>

                <div style = "text-align:center" class = "form-group">
                    <input style= "width:100%; border: 0;" type="submit" class="btn btn-home" value="Log Masuk">
                </div>

                <p style="text-align: center; margin-top:20px;">Tiada akaun pengguna? <a href="register.php"><b>Daftar disini</b></a>.</p>

            </form>
        </div>
        </div>
    </section>
<body>
