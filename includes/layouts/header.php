<?php if(!isset($layout_context)) { $layout_context = "public"; } ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Widget Crop <?php if ($layout_context == "admin") {echo "Admin";}?></title>
    <link rel="stylesheet" href="css/public.css">
</head>
<body>
    <div id="header">
        <h1>Widget Crop <?php if ($layout_context == "admin") {echo "Admin";}?></h1>
    </div>