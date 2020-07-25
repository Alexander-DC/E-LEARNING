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
<style type="text/css">
  .row iframe {
    width: 100%;
    height: 70%;
  }
</style>
 <h1><?php echo $title;?></h1> 
 <div class="container" >
   <?php 
    if($cur){
    foreach ($cur as $result) {
    ?>
    <a href="index.php?q=question&id=<?php echo $result->LessonID;?>" type="button" class="btn btn-success btn-block text-light">Ejercicios propuestos</a>
    <?php
    }}else{
      ?>
<a href="#" type="button" class="btn btn-warning btn-block text-info">Aun no hay ejercicios que ver</a>
      <?php
    }
    ?>  
 	<video width="50%"  controls>
		  <source src="<?php echo web_root.'admin/modules/lesson/'.$res->FileLocation; ?>" type="video/mp4">
		  <source src="<?php echo web_root.'admin/modules/lesson/'.$res->FileLocation; ?>" type="video/ogg"> 
		</video>
      
        <div class="col-lg-12">Description</div>
         <div class="col-lg-12">
           <label class="col-md-2" class="control-label">Chapter :</label>
           <label class="col-md-10" class="control-label"><?php echo $res->LessonChapter; ?></label>
         </div>
         <div class="col-lg-12">
           <label class="col-md-2" class="control-label">Title : </label>
           <label class="col-md-10" class="control-label"><?php echo $res->LessonTitle; ?></label>
         </div> 
 </div> 
		