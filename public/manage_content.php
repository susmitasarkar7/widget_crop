<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php $layout_context = "admin"; ?>

<?php include("../includes/layouts/header.php"); ?>

<?php find_selected_page(); ?>

<div id="main">
    <div id="navigation">
        <br />
        <a href="admin.php">&laquo; Main Menu</a><br />
        <?php echo navigation($current_subject, $current_page); ?>
        <br />
        <a href="new_subject.php">+ Add a Subject</a>
    </div>
    <div id="page">
    <?php echo message(); ?>
        <?php if($current_subject) {?>
            <h2>Manage Subject</h2>

            Menu Name: <?php echo htmlentities($current_subject["menu_name"]); ?><br />
            Position: <?php echo $current_subject["position"]; ?><br />
            Visible: <?php echo $current_subject["visible"] == 1 ? 'yes': 'no' ; ?><br />
            <br />
            <a href="edit_subject.php?subject=<?php echo urlencode($current_subject["id"]); ?>">
            Edit Subject</a>

            <div style="margin-top: 2em; border-top: 1px solid #000;">
                <h3>Page in this subject:</h3>
                <ul>
                    <?php 
                        $subject_pages = find_pages_for_subjects($current_subject["id"]);
                        while ($page = mysqli_fetch_assoc($subject_pages)) {
                            echo "<li>";
                            $safe_page_id = urlencode($page['id']);
                            echo "<a href=\"manage_content.php?page={$safe_page_id}\">";
                            echo htmlentities($page["menu_name"]);
                            echo "</a></li>";
                        }
                    ?>
                </ul>
                <br />
                + <a href="new_page.php?subject=<?php echo urlencode($current_subject["id"]);?>">
                Add a new page to this subject</a>
            </div>

        <?php } elseif($current_page) {?>
            <h2>Manage Page</h2>

            Menu Name: <?php echo htmlentities($current_page["menu_name"]); ?><br />
            Position: <?php echo $current_page["position"]; ?><br />
            Visible: <?php echo $current_page["visible"] == 1 ? 'yes': 'no' ; ?><br />
            Content:<br />
            <div class="view-content">
                <?php echo htmlentities($current_page["content"]); ?>
            </div>
            <br /><br />
            <a href="edit_page.php?page=<?php echo urlencode($current_page["id"]); ?>">Edit page</a>

        <?php } else {?>
            Please select a subject or a page.
        <?php }?>
    </div>
</div>

<?php include("../includes/layouts/footer.php"); ?>    
