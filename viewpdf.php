<?php  
  @$id = $_GET['id'];
    if($id==''){
  redirect("index.php");
}
  $lesson = New Lesson();
  $res = $lesson->single_lesson($id);

  $sql = "SELECT DISTINCT l.LessonID , LessonChapter, LessonTitle FROM tbllesson as l  inner join tblexercise as e on l.LessonID=e.LessonID where l.LessonID='$id'"; //Mostrar tabla donde solo alla ejercicios
  $mydb->setQuery($sql);
  $cur = $mydb->loadResultList();


?> 
<h2>Vista del documento</h2>

<div class="container">
  <div class="row">
    <div class="col-7">
    CLASE : <?php echo $res->LessonChapter;?> | TITULO : <?php echo $res->LessonTitle;?>
    </div>
    <div class="col-5 float-left">
    <?php  //Comienza
    if($cur){
    foreach ($cur as $result) {
    ?>
    <a href="index.php?q=question&id=<?php echo $result->LessonID;?>" type="button" class="btn btn-success btn-block text-light">Ejercicios propuestos</a>
    <?php
    }}else{
      ?>
<a href="#" type="button" class="btn btn-warning btn-block text-info">Aun no hay ejercicios que ver</a>
      <?php
    }//Termina
    ?>
    </div>
    
  </div>
  <embed src="<?php echo web_root.'admin/modules/lesson/'.$res->FileLocation; ?>" type="application/pdf" width="100%" height="600px" />
</div>







<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>