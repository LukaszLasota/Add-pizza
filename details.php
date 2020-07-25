<?php 

include('config/db_conect.php');

if(isset($_POST['delete'])){
    $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);
    
    $sql = "DELETE FROM pizzas WHERE id = $id_to_delete";
if(mysqli_query($conn, $sql)){
    //success
    header('Location: index.php');
}else{
    //failure
    echo 'qury error: ' . mysqli_error($conn);
}

} 


//Check GET request id parm

if(isset($_GET['id'])){

$id = mysqli_real_escape_string($conn, $_GET['id']);

//make sql

$sql = "SELECT * FROM pizzas WHERE id = $id";

//get the query result

$result = mysqli_query($conn, $sql);

//fetch result in array format

$pizza = mysqli_fetch_assoc($result);

mysqli_free_result($result);
mysqli_close($conn);


}


?>

<!DOCTYPE html>
<html>

<?php include('templates/header.php'); ?>
    
<div class="container center grey-text">
    <?php if($pizza): ?>
        <h4><?php echo ($pizza['title']); ?>  </h4>
        <p>Stworzona przez: <?php echo ($pizza['email']); ?>  </p>
        <p><?php echo date($pizza['created_at']) ?>  </p>
        <h5>Składniki:</h5>
			<p><?php echo $pizza['ingredients']; ?></p>

        <!-- DELETE FORM -->
			<form action="details.php" method="POST">
				<input type="hidden" name="id_to_delete" value="<?php echo $pizza['id']; ?>">
				<input type="submit" name="delete" value="Usuń" class="btn brand z-depth-0">
			</form>

		<?php else: ?>
			<h5>Nie ma takiej pizzy.</h5>
	<?php endif ?>

</div>


<?php include('templates/footer.php'); ?>
</html>