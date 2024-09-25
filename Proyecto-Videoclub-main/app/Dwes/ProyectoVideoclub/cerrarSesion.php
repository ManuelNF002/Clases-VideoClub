<?php
//Destruir/cerrar la sesión creada
session_start();
session_unset();
session_destroy();
header("Location:index.php");
exit();