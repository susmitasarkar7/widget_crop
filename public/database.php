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
    // Perform Database Query
    $query = "SELECT * ";
    $query .= "FROM subjects ";
    $query .= "WHERE visible = 1 ";
    $query .= "ORDER BY position ASC";
    $result = mysqli_query($connection, $query);
    // Test if there was a query error
    if (!$result) {
        die("Database query failed.");
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

<ul>
<?php 
    // Use return date(if any)
    while($subject = mysqli_fetch_assoc($result)) {
        // output data from each row
?>
        <li>
        <?php echo $subject["menu_name"] . "(" . $subject['id'] . ")"; ?>
        </li>
    <?php   } ?>
</ul>

<?php
    // Relese return data
    mysqli_free_result($result);
?>

</body>
</html>

<?php 
    // Close database connection
    mysqli_close($connection);
?>
