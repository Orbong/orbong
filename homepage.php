<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylep.css">
    <title>Welcome to Our Website</title>
</head>
<body>

    <main>
                    <?php
                    session_start();
                    if (isset($_SESSION['Fullname'])) {
                        // Display the Fullname
                        echo "<h1>Welcome  " . $_SESSION['Fullname'] . "!</h1>";
                       
                    }
                    
                    ?>
    </main>
</body>
</html>


