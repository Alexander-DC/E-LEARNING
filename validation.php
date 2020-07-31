<?php
require_once("include/initialize.php");  

$studentid = $_SESSION['StudentID'];
$lessonid=$_POST['LessonID']; //tenemos
//arrays
$exersiceid=$_POST['ExerciseID'];
$value=$_POST['Value'];


$exercise_array=array();
$values_array=array();
 foreach($_POST['ExerciseID'] as $option_num => $option_val){ //Obtener los exercID enviado
	array_push($exercise_array,$option_num);
 }
	//echo $exercise_sep=implode(",",$exercise_array);

 //echo " otro";
 foreach($_POST['Value'] as $option_num => $option_val){ //Obtener las respuestas
	array_push($values_array,$option_val);
 }
 //echo $values_sep=implode(",",$values_array);
////////////////////////////



for ($i=0; $i <count($exercise_array) ; $i++) {
	$sql = "SELECT * FROM `tblexercise` WHERE  `ExerciseID`='{$exercise_array[$i]}'";
	$mydb->setQuery($sql);
	$quiz = $mydb->loadSingleResult();

	$answer = $quiz->Answer;
	$lessonid = $quiz->LessonID;

	if ($answer == $values_array[$i]) {
		$score= 1; //Correcta 1
	}else{
		$score = 0; // Incorrecta 0
	}
	
	$sql2 = "INSERT INTO tblscore (`LessonID`,`ExerciseID`, `StudentID`, `Score`) VALUES ('$lessonid','$exercise_array[$i]','$studentid','$score')";
	$mydb->setQuery($sql2);
	$mydb->executeQuery(); 
}

require_once("processscore.php");