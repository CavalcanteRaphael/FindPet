<?php
session_start();
if(isset($_SESSION['id'])){
} else {
	header('Location: cadastro.php?pedirLogin=1');
}
?>