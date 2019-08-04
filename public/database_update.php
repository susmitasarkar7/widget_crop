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
    $id = 5;
    $menu_name = "Delete me";
    $position = 4;
    $visible = 1;

    // Perform Database Query
    $query = "UPDATE subjects SET menu_name = '{$menu_name}', 
                position = {$position}, visible = {$visible} WHERE id = {$id}";
                
    $result = mysqli_query($connection, $query);
                
    if ($result && mysqli_affected_rows($connection) == 1) {
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
