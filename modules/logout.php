<?php
if(isset($_COOKIE['user'])){
	// очищаем cookie
	setcookie("user", '', '', "/");
	header('Location: http://business-assistant.local/');
}else{
	echo "user non set";
	header('Location: http://business-assistant.local/');
}
?>