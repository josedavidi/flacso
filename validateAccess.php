<?php

if(empty($_SESSION['userActive'])){
	header('location:index.php');
}