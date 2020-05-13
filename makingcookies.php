<?php
/* CARA 1 ##
setcookie("kuliah", 'webservice', time() + (3600*24*2*2)); */

/* CARA2 ###
setcookie('background-color','#75b14a', strtotime('+7 days'), '/');// Expire 7 hari kedepan 
setcookie('background-color','#75b14a', strtotime('+3 months'), '/');// Expire 3 bln kedepan 
setcookie('background-color','#75b14a', strtotime('+1 year'), '/');// Expire 1 tahun kedepan 
 */
 
/* CARA3 ###
setcookie('background-color[background-color]','#4e79a0', time() + (60*60), '/');// membuat background abu-abu biru
setcookie('background-color[font-size]','15px', time() + (60*60), '/');// dengan font 15px
*/

/*Memanggil Nilai Pada Cookie --> $_COOKIE['settings']['background-color'] ###
echo '<pre>'; print_r($_COOKIE);
*/

/*Menghapus Cookies*/
setcookie("kuliah",'');

?>
