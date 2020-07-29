<?php
require_once("include/initialize.php");  

$studentid = $_SESSION['StudentID'];
$lessonid=$_POST['LessonID'];
//arrays
$exersiceid=$_POST['ExerciseID'];
$value=$_POST['Value'];


$exercise_array=array();

 foreach($_POST['ExerciseID'] as $option_num => $option_val){
	array_push($exercise_array,$option_num);
 }
	echo $exercise_sep=implode(",",$exercise_array);

 echo " otro";
 foreach($_POST['Value'] as $option_num => $option_val){
	echo $option_val."<br>";
	
 }





$sql = "SELECT * FROM `tblexercise` WHERE  `ExerciseID`='{$exersiceid}'";
$mydb->setQuery($sql);
$quiz = $mydb->loadSingleResult();

$answer = $quiz->Answer;
$lessonid = $quiz->LessonID;

if ($answer == $value) {
	# code... 
	$score= 1;
	// echo 'Correct';
}else{
	$score = 0;
	// echo 'Wrong';
}

$sql = "SELECT * From tblscore WHERE ExerciseID = '{$exersiceid}' AND StudentID='{$studentid}'";
$mydb->setQuery($sql);
$row = $mydb->executeQuery();
$maxrow = $mydb->num_rows($row);

if ($maxrow>0) { 
	$sql = "UPDATE tblscore SET Score='{$score}' WHERE ExerciseID = '{$exersiceid}' AND StudentID='{$studentid}'";  
	$mydb->setQuery($sql);
	$mydb->executeQuery();

}else{ 
	$sql = "INSERT INTO tblscore (`LessonID`,`ExerciseID`, `StudentID`, `Score`) VALUES ('{$lessonid}','{$exersiceid}','{$studentid}','{$score}')";
	$mydb->setQuery($sql);
	$mydb->executeQuery(); 
}
