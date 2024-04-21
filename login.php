<?php
include("config.php");

if(isset($_POST['Submit'])){
    $Username = mysqli_real_escape_string($conn, $_POST['Username']);
    $Password = mysqli_real_escape_string($conn, $_POST['Password']);

    $result = mysqli_query($conn, "SELECT * FROM cureg WHERE Username='$Username' AND Password='$Password'") or die("Error Occurred: " . mysqli_error($conn));
    $row = mysqli_fetch_assoc($result);

    if(is_array($row) && !empty($row)){
        // Start output buffering
        ob_start();

        $_SESSION['Username'] = $row['Username'];
        $_SESSION['Password'] = $row['Password'];

        // Redirect to homepage
        echo "Redirecting to homepage..."; // Debugging output
        header("Location: homepage.php");
        exit;

        // Flush output buffer and send it to the browser
        ob_end_flush();
    } else {
        $_SESSION['login_error'] = true;
        header("Location: login.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylep.css">
</head>
<body>
<div class="container">
    <div class="box form-box">
        <header>Login</header>
        <form action="" method="post">
            <div class="field input">
                <label for="Username">Username</label>
                <input type="text" name="Username" id="Username" autocomplete="off" required>
            </div>

            <div class="field input">
                <label for="Password">Password</label>
                <input type="password" name="Password" id="Password" autocomplete="off" required>
            </div>

            <div class="field">
                <input type="submit" name="Submit" value="Login" required>
            </div>
        </form>
    </div>
</div>
</body>
</html>

