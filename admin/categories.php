
<?php
ob_start(); // Start output buffering
include "../includes/db.php";
session_start();
?> 

<?php include "admin_includes/admin_header.php";?>

<div id="wrapper">

<?php include "admin_includes/admin_navigation.php";?>

  <div id="page-wrapper">
    <div class="container-fluid">

      <div class="row">
      <?php include "../admin/fetch_categories.php"; ?>
        <div class="col-lg-12">
          <h1 class="page-header">Categories</h1>
        </div>
      </div>

      <body>

      <div class="table-container">
    <div class="controls">
        <div>
            Show
            <select id="entries-select" onchange="changeEntries()">
                <option value="5">5</option>
                <option value="10" selected>10</option>
                <option value="25">25</option>
            </select>
            entries
        </div>
        <div >
            Search: <input type="text" id="search-input" class="cat_Search" onkeyup="searchTable()">
        </div>
    </div>
    <table id="category-table">
        <thead>
            <tr>
                <th>Category ID <button onclick="sortTable('id')"><i class="fa-solid fa-sort"></i></button></th>
                <th>Category Name <button onclick="sortTable('name')"><i class="fa-solid fa-sort"></i></button></th>
                <th>Parent ID <button onclick="sortTable('parentId')"><i class="fa-solid fa-sort"></i></button></th>
                <th>Parent Name <button onclick="sortTable('parentName')"><i class="fa-solid fa-sort"></i></button></th>
                <th>Category Type <button onclick="sortTable('type')"><i class="fa-solid fa-sort"></i></button></th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody id="table-body">
        <?php 
            $query = "SELECT c1.category_id, c1.category_title, c1.parent_id, c1.Category_type, c2.category_title AS parent_category_title
                      FROM categories c1
                      LEFT JOIN categories c2 ON c1.parent_id = c2.category_id";
            $display_category_to_table_query = mysqli_query($connection,$query);
            $php_data = [];
            while($row = mysqli_fetch_assoc($display_category_to_table_query)){
                $category_id = $row['category_id'];
                $category_title = $row['category_title'];
                $parent_id = $row['parent_id'];
                $Category_type = $row['Category_type'];
                $parent_category_title = $row['parent_category_title'];
                $php_data[] = [
                    'id' => $category_id,
                    'name' => $category_title,
                    'parentId' => $parent_id,
                    'parentName' => $parent_category_title,
                    'type' => $Category_type,
                    'edit' => "<a href='#' data-id='{$category_id}'>Edit</a>",
                    'delete' => "<a href='categories.php?id={$category_id}'>Delete</a>"
                ];
            }
            echo '<script>';
            echo 'const php_data = ' . json_encode($php_data) . ';';
            echo '</script>';
        ?>
        </tbody>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination" id="pagination">
            <!-- Pagination buttons will be inserted here by JavaScript -->
        </ul>
    </nav>
</div>

<!-- Edit Modal -->
<div id="editModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <h2>Edit Category</h2>
    <form id="editForm" method="POST" action="categories.php">
      <input type="hidden" id="editCategoryId" name="category_id">
      <label for="editCategoryName">Category Name:</label>
      <input type="text" id="editCategoryName" name="category_title">
      <label for="editParentId">Parent ID:</label>
      <input type="text" id="editParentId" name="parent_id">
      <label for="editCategoryType">Category Type:</label>
      <input type="text" id="editCategoryType" name="Category_type">
      <button type="submit">Save Changes</button>
    </form>
  </div>
</div>
    
<div class="artisan-cat">
<h2>Artist Categories</h2>

<form  action="add_category.php" method="POST">
    <input type="hidden" name="category_type" value="artist">
    <label for="category_title">Category Name:</label>
    <input type="text" class="cat_Search" name="category_title" required>
    <input type="submit" class="page-link add_cat_btn" value="Add Category">
</form>
<h2>Craftsmen Categories</h2>

<form  action="add_category.php" method="POST">
    <input type="hidden" name="category_type" value="craftsmen">
    <label for="parent_id">Parent Category (optional):</label>
    <select class="cat_Search" name="parent_id">
        <option value="">None</option>
        <?php foreach ($categories['craftsmen']['main'] as $mainCategory): ?>
            <option value="<?php echo $mainCategory['category_id']; ?>"><?php echo $mainCategory['category_title']; ?></option>
        <?php endforeach; ?>
    </select>
    <label for="category_title">Category Name:</label>
    <input type="text" class="cat_Search" name="category_title" required>
    <input type="submit" class="page-link add_cat_btn"  value="Add Category">
</form>
</div>
</div>
</div>



<?php if(isset($_GET['id'])){
$the_category_id = $_GET['id'];
$query = "DELETE FROM categories WHERE category_id = {$the_category_id}";
$Delete_query = mysqli_query($connection,$query);
header("location: categories.php");
}
?>
        </div>
      </div>

      <!-- JS Functionality -->
      <div class="row">
        <div class="col-lg-12">
            <div id="morris-area-chart" style="display:none"></div>
            <div id="morris-bar-chart" style="display:none"></div>
            <div id="morris-donut-chart" style="display:none"></div>
        </div>
      </div>


    </div>

</div>

</div>

<script src="js/custom.js"></script>
<script src="js/edit_modal.js"></script>
<!-- jQuery -->
<script src="js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="js/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="js/dataTables/jquery.dataTables.min.js"></script>
<script src="js/dataTables/dataTables.bootstrap.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js/startmin.js"></script>

    
<?php include "admin_includes/admin_footer.php";?>
<?php ob_end_flush(); // End output buffering and flush the output ?>