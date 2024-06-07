<?php include "../includes/db.php"?>


<!-- <form class="form-group" action="" method="post">
<label>Update category</label>

<?php 
  // if(isset($_GET['id'])){
  // $category_id = $_GET['id'];

  // $query = "SELECT * FROM categories WHERE category_id = {$category_id} ";
  // $select_category_id = mysqli_query($connection,$query);

  // while($row = mysqli_fetch_assoc($select_category_id)){
  // print_r($row);
  // $category_title = $row['category_title']; 
?>

<!-- <input value="<?php //if(isset($category_title)){echo $category_title;}?>" class ="form-control" type="text" name="category_title"> -->

<?php
//}}
?>

<?php  
// UPDATE CATEGORY QUERY
  // if(isset($_POST['Update_Category'])){
  // $the_category_title= $_POST['category_title'];
  // $query = "UPDATE categories SET category_title = '{$the_category_title}' WHERE category_id = {$category_id} ";
  // $update_query = mysqli_query($connection,$query);
  // if(!$update_query){
  //   die("Query Failed" . mysqli_error($connection));
  // }
  // header("Location: categories.php");
  // }
?>

<br>
<!-- <input  class ="btn btn-primary" type="submit" name="Update_Category" value="Update Category"> -->
</form>

<?php 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $category_id = $_POST['category_id'];
  $category_title = $_POST['category_title'];
  $parent_id = $_POST['parent_id'];
  $Category_type = $_POST['Category_type'];

  $query = "UPDATE categories SET category_title = ?, parent_id = ?, Category_type = ? WHERE category_id = ?";
  $stmt = $connection->prepare($query);
  $stmt->bind_param("sisi", $category_title, $parent_id, $Category_type, $category_id);

  if ($stmt->execute()) {
    echo '<script>alert("Category updated successfully!"); window.location.href="categories.php";</script>';
  } else {
    echo '<script>alert("Failed to update category");</script>';
  }

  $stmt->close();
  $connection->close();
}

?>