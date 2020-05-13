<?php
	$font_size = '15px';
	$background_color = '#4e79a0';
	
	if ($_POST) {
		$background_color = $_POST['background_color'];
		$font_size = $_POST['font_size'];
	} else {
		if (isset($_COOKIE['background_color'])){
			$_POST['background_color'] = $background_color = $_COOKIE['background_color'];
		}
		if (isset($_COOKIE['font-size'])){
			$_POST['font-size'] = $font_size = $_COOKIE['font-size'];
		}
		//Delete cookies
		$msg = false;
		if (isset($_POST['hapus_cookie'])){
			setcookie('background_color', '', 0, '/');
			setcookie('font-size', '', 0, '/');
			$msg = 'Data Sampun Disapu Gaes!!!';
		}
		
		//Set Cookie 7 hari
		if (isset($_POST['remember'])){
			setcookie('background_color', $_POST['background_color'], strtotime('+7 days'), '/');
			setcookie('font-size', $_POST['font-size'], strtotime('+7 days'), '/');
			$msg = 'Data Cookie Sampun Disimpen Dab!!';
		}
	}
	
?>

<html>
	<head>
		<title>Contoh Implementasi Cookie</title>
		<style type="text/css">
		body{
			font: <?=
		}
	</head>
</html>
