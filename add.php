<?php 

include('config/db_conect.php'); 

$email = $title = $ingredients = '';
	$errors = array(
		'email' => '', 
		'title' => '', 
		'ingredients' => ''
	);

	if(isset($_POST['submit'])){
		
		// check email
		if(empty($_POST['email'])){
			$errors['email'] = 'Email jest wymagany';
		} else{
			$email = $_POST['email'];
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$errors['email'] = 'Email musi być wpisany';
			}
		}

		// check title
		if(empty($_POST['title'])){
			$errors['title'] = 'Nazwa jest wymagana';
		} else{
			$title = $_POST['title'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
				$errors['title'] = 'Tytuł to wyłącznie litery i przerwy';
			}
		}

		// check ingredients
		if(empty($_POST['ingredients'])){
			$errors['ingredients'] = 'Przynajmniej jeden składnik jest wymagany';
		} else{
			$ingredients = $_POST['ingredients'];
			if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)){
				$errors['ingredients'] = 'Składniki musza być oodzielone przecinkiem';
			}
		}

		if(array_filter($errors)){
			//echo 'errors in form';
		} else {
			// escape sql chars
			$email = mysqli_real_escape_string($conn, $_POST['email']);
			$title = mysqli_real_escape_string($conn, $_POST['title']);
			$ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);

			// create sql
			$sql = "INSERT INTO pizzas(title,email,ingredients) VALUES('$title','$email','$ingredients')";

			// save to db and check
			if(mysqli_query($conn, $sql)){
				// success
				header('Location: index.php');
			} else {
				echo 'query error: '. mysqli_error($conn);
			}
		}
	} // end POST check

?>

<!DOCTYPE html>
<html>

<?php include('templates/header.php'); ?>


<section class="container grey-text">
		<h4 class="center">Dodaj Pizzę</h4>
		<form class="white" action="add.php" method="POST">
			<label>Twój Email</label>
			<input type="text" name="email" value="<?php echo htmlspecialchars($email) ?> ">
            <div class="red-text"><?php echo $errors['email'] ?></div>
			<label>Nazwa Pizzy</label>
			<input type="text" name="title" value="<?php echo htmlspecialchars($title) ?>">
            <div class="red-text"><?php echo $errors['title'] ?></div>
			<label>Składniki (rozdzielone przecinkiem)</label>
			<input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients) ?>">
            <div class="red-text"><?php echo $errors['ingredients'] ?></div>
			<div class="center">
				<input type="submit" name="submit" value="Dodaj" class="btn brand z-depth-0">
			</div>
		</form>
	</section>


<?php include('templates/footer.php'); ?>
</html>