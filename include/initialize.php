<?php

// define las rutas principales
// Defínalos como puntos absolutos para asegurarte de que require_once funcione como se espera

// DIRECTORY_SEPARATOR es una constante predefinida de PHP:
// (\ para windows, / para Unix)


//CONSTANTES DEFINIDAS
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);  // ... : valor_booleano
//Devuelve TRUE si la constante(DS) con nombre dada por name(DS) ha sido definida, si no devuelve FALSE.
defined('SITE_ROOT') ? null : define ('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'].DS.'E-LearningSystem');

defined('LIB_PATH') ? null : define ('LIB_PATH',SITE_ROOT.DS.'include');

// cargar la configuración de la base de datos primero.

require_once(LIB_PATH.DS."config.php");
require_once(LIB_PATH.DS."function.php");
require_once(LIB_PATH.DS."session.php");
require_once(LIB_PATH.DS."accounts.php"); 
require_once(LIB_PATH.DS."lessons.php");
require_once(LIB_PATH.DS."exercises.php"); 
require_once(LIB_PATH.DS."autonumbers.php"); 
require_once(LIB_PATH.DS."students.php"); 
//load the database connection
require_once(LIB_PATH.DS."database.php");
?>
