
<?php
ob_start(); // Start output buffering
include "../includes/db.php";
session_start();
?> 

<?php include "includes/admin_head.php"; ?>
  <!-- =============================== -->
  <!-- Navigation bar -->
  <!-- =============================== -->
  <?php include "includes/admin_navigation.php"; ?>

<?php

include "../admin/fetch_categories.php";

?>

<div id="page-wrapper">
    <div class="container-fluid">
        <h1>Manage Categories</h1>

        <h2>Artist Categories</h2>
        <ul>
            <?php foreach ($categories['artist']['main'] as $mainCategory): ?>
                <li>
                    <?php echo $mainCategory['category_title']; ?>
                    <a href="edit_category.php?id=<?php echo $mainCategory['category_id']; ?>">Edit</a>
                    <a href="categories.php?id=<?php echo $mainCategory['category_id']; ?>">Delete</a>
                </li>
            <?php endforeach; ?>
        </ul>
        <form action="add_category.php" method="POST">
            <input type="hidden" name="category_type" value="artist">
            <label for="category_title">Category Name:</label>
            <input type="text" name="category_title" required>
            <input type="submit" value="Add Category">
        </form>

        <h2>Craftsman Categories</h2>
        <ul>
            <?php foreach ($categories['craftsman']['main'] as $mainCategory): ?>
                <li>
                    <?php echo $mainCategory['category_title']; ?>
                    <a href="edit_category.php?id=<?php echo $mainCategory['category_id']; ?>">Edit</a>
                    <a href="categories.php?id=<?php echo $mainCategory['category_id']; ?>">Delete</a>
                    <ul>
                        <?php if (isset($categories['craftsman']['sub'][$mainCategory['category_id']])): ?>
                            <?php foreach ($categories['craftsman']['sub'][$mainCategory['category_id']] as $subCategory): ?>
                                <li>
                                    <?php echo $subCategory['category_title']; ?>
                                    <a href="edit_category.php?id=<?php echo $subCategory['category_id']; ?>">Edit</a>
                                    <a href="categories.php?id=<?php echo $subCategory['category_id']; ?>">Delete</a>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endforeach; ?>
        </ul>
        <form action="add_category.php" method="POST">
            <input type="hidden" name="category_type" value="craftsman">
            <label for="parent_id">Parent Category (optional):</label>
            <select name="parent_id">
                <option value="">None</option>
                <?php foreach ($categories['craftsman']['main'] as $mainCategory): ?>
                    <option value="<?php echo $mainCategory['category_id']; ?>"><?php echo $mainCategory['category_title']; ?></option>
                <?php endforeach; ?>
            </select>
            <label for="category_title">Category Name:</label>
            <input type="text" name="category_title" required>
            <input type="submit" value="Add Category">
        </form>
    </div>
</div>

<?php if(isset($_GET['id'])){
  $the_category_id = $_GET['id'];
  $query = "DELETE FROM categories WHERE category_id = {$the_category_id}";
  $Delete_query = mysqli_query($connection,$query);
  header("location: categories.php");
  }
?>

<?php include "includes/admin_footer.php" ?>
<?php ob_end_flush(); // End output buffering and flush the output ?>