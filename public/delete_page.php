<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php 
    $current_page = find_page_by_id($_GET["page"]);
    if(!$current_page) {
        // page ID was missing or invalid or
        // page couldn't be found in database
        redirect_to("manage_content.php");
    }

    $pages_set = find_pages_for_subjects($current_page["id"]);
    if(mysqli_num_rows($pages_set) > 0) {
        $_SESSION["message"] = "Can't delete a page with pages.";
        redirect_to("manage_content.php?page={$current_page["id"]}");        
    }

    $id = $current_page["id"];
    $query = "DELETE FROM pages WHERE id = {$id} LIMIT 1";
    
    $result = mysqli_query($connection, $query);
                    
    if ($result && mysqli_affected_rows($connection) == 1) {
        // Success
        $_SESSION["message"] = "Page deleted.";
        redirect_to("manage_content.php");
    } else {
        // Faliure
        $_SESSION["message"] = "Page deletion failed.";
        redirect_to("manage_content.php?page={$id}");
    }
?>