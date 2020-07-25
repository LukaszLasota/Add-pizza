<?php 

//conect to database

$conn = mysqli_connect('localhost', 'Łukasz', 'test1234', 'pizza');

//check connection

if(!$conn){
	echo 'Błąd połaczenia: ' . mysqli_connect_error();
}

?>