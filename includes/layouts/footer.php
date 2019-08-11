<div id="footer">Copyright <?php echo date("Y"); ?>, Widget Crop</div>    
</body>
</html>

<?php 
    // Close database connection
    if(isset($coonection)){
        mysqli_close($connection);
    }
?>