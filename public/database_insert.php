<?php 
    // Create Database Connection
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "widget_crop";
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    // Test if connection succeeded
    if(mysqli_connect_errno()) {
        die("Database connection failed: " .
            mysqli_connect_errno() . 
            " (" . mysqli_connect_errno() . ") "
        );
    }
?>

<?php 
    // Often these are form values in $_POST
    $menu_name = "Today's Widget Trivia";
    $position = (int) 4;
    $visible = (int) 1;

    // Escape all strings
    $menu_name = mysqli_real_escape_string($connection, $menu_name);

    // Perform Database Query
    $query = "INSERT INTO subjects (menu_name, position, visible)
                VALUES ('{$menu_name}', {$position}, {$visible})";
                
    $result = mysqli_query($connection, $query);
                
    if ($result) {
        // Success
        // redirect_to("somepage.php");
        echo "Success!";
    } else {
        // Faliure
        // $message = "Subject creation failed";
        die("Database query failed. " . mysqli_error($connection));
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


</body>
</html>


<?php 
    // Close database connection
    mysqli_close($connection);
?>
