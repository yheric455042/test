<!DOCTYPE html>
<?php 
if($_POST['submit'])
{
  $counter= '';
  $final_file = $_POST['final_file'];
  $Arr = str_split($final_file);
  $slideshownum = $Arr[count($Arr)-1];
  $i=1;
  foreach($Arr as $char)
  {
    if(is_numeric($char) && $i<count($Arr))
      $counter.=$char;
    $i++;
  }
  echo $counter;
  $i=0;
  foreach ($_FILES["slideshow"]["error"] as $key=>$error)
  {
    if ($error == UPLOAD_ERR_OK)
    {
      $tmp_name = $_FILES["slideshow"]["tmp_name"][$key];
      if($i < $slideshownum)
        $name = 'slideshow'.($i+1).'.jpg';

      else  $name = 'slideshow'.++$counter.'.jpg';
      $dir = '/var/www/html/school/slideshow/'.basename($name);
      move_uploaded_file($tmp_name,$dir);

    }
    $i++;
  }

  $i=1;
  foreach($_FILES["index"]["error"] as $key=>$error)
  {
    if($error == UPLOAD_ERR_OK)
    {
      $tmp_name = $_FILES["index"]["tmp_name"][$key];
      $name = "index0".$i.".jpg";
      $dir = '/var/www/html/school/image/index/'.basename($name);
      move_uploaded_file($tmp_name,$dir);
    }
    $i++;
  }

  $json_e=array();
  for($i=0;$i<6;$i++)
  {
    $data = array(array('href'=>$_POST['href'][$i][0],'name'=>$_POST['name'][$i][0]),array('href'=>$_POST['href'][$i][1],'name'=>$_POST['name'][$i][1]),array('href'=>$_POST['href'][$i][2],'name'=>$_POST['name'][$i][2]));
    array_push($json_e,$data);
  }




  $fh = fopen("/var/www/html/school/admin/href.json", 'w') or die("can't open file");
  fwrite($fh, json_encode($json_e));
  fclose($fh);
}
?>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>大同大學招生資訊網</title>
<link rel="stylesheet" href="../include/css/bootstrap.css"/>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<script src="../include/js/jquery1.11.0.min.js"></script>
<script src="../include/js/bootstrap.min.js"></script>
<style>
body {
  padding-top: 53px;
}
.carousel-inner > .item > img { margin: 0 auto; }
</style>  
</head>
<script>
$('.carousel').carousel({
  interval: 20
});
</script>
<body>
<!-- navbar -->
<nav class="navbar navbar-default navbar-fixed-top" role="banner">
  <div class="container">
    <div class="navbar-header">
      <a href="index.php">
        <img src="../image/logo.png" height="43" style="padding-top: 8px">
      </a>
    </div>
  </div>
</nav>
<form action="" method="post" enctype="multipart/form-data">
<div class="container">
  <!-- First Row -->
  <div class="row" style="padding: 3px">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
<?php
$files = scandir("../slideshow/");

for($i=2;$i<count($files);$i++)
{
  echo $files[$i];
  echo '<div>';
  echo '<img src="../slideshow/'.$files[$i].'"class="img-responsive"/>';
  echo '</div><input type="file" name="slideshow[]">';

}

$json = json_decode(file_get_contents('href1.json'),true);
$files_index = glob('../image/index/index*.jpg');

?>
  <input type="hidden" name="final_file" value="<?php echo $files[count($files)-1].' '.(count($files)-2); ?>">
  <p><button type="button" onClick="add()">add slideshow</button></p>

   <div id="test"></div>

   </div>
  </div>
  <?php for($i=0;$i<6;$i++){?>
  <div class="col-xs-6 col-sm-4" style="padding: 3px">
    <div class="col-xs-8" style="padding: 3px">
      <img src="<?php echo $files_index[$i];?>" class="img-responsive" />
      <input type="file" name="index[]" value="1"/>
    </div>
    <div class="col-xs-4" style="padding: 3px">
      <ul class="list-unstyled">
<?php foreach($json[$i]['data'] as $item) { ?>
        <li><a href='content.php?<?php echo "type=".$json[$i]['index']."&index=".$item['index']; ?>'><?php echo $item['name']; ?></a></li> 
        <?php } ?>
      </ul>
    </div>
    </div>
    <?php }?>
<!--
  <div class="col-xs-6 col-sm-4" style="padding: 3px">
    <div class="col-xs-8" style="padding: 3px">
        <img src="../image/index/aboutttu.png" class="img-responsive" />
      </a>
    </div>
    <div class="col-xs-4" style="padding: 3px">
      <ul class="list-unstyled">
        <li>name:<input type="text" name="name[1][]" size="6"/></li>
        <li>href:&nbsp;&nbsp;&nbsp;<input type="text" name="href[1][]" size="6"/></li>
        <li>name:<input type="text" name="name[1][]" size="6"/></li>
        <li>href:&nbsp;&nbsp;&nbsp;<input type="text" name="href[1][]" size="6"/></li>
        <li>name:<input type="text" name="name[1][]" size="6"/></li>
        <li>href:&nbsp;&nbsp;&nbsp;<input type="text" name="href[1][]" size="6"/></li>
      </ul>
    </div>
   </div>
   <div class="col-xs-6 col-sm-4" style="padding: 3px">
    <div class="col-xs-8" style="padding: 3px">
        <img src="../image/index/aboutttu.png" class="img-responsive" />
      </a>
    </div>
    <div class="col-xs-4" style="padding: 3px">
      <ul class="list-unstyled">
        <li>name:<input type="text" name="name[2][]" size="6"/></li>
        <li>href:&nbsp;&nbsp;&nbsp;<input type="text" name="href[2][]" size="6"/></li>
        <li>name:<input type="text" name="name[2][]" size="6"/></li>
        <li>href:&nbsp;&nbsp;&nbsp;<input type="text" name="href[2][]" size="6"/></li>
        <li>name:<input type="text" name="name[2][]" size="6"/></li>
        <li>href:&nbsp;&nbsp;&nbsp;<input type="text" name="href[2][]" size="6"/></li>
      </ul>
    </div>
  </div>

 Third Row 
  <div class="col-xs-6 col-sm-4" style="padding: 3px">
    <div class="col-xs-8" style="padding: 3px">
        <img src="../image/index/aboutttu.png" class="img-responsive" />
      </a>
    </div>
    <div class="col-xs-4" style="padding: 3px">
      <ul class="list-unstyled">
        <li>name:<input type="text" name="name[3][]" size="6"/></li>
        <li>href:&nbsp;&nbsp;&nbsp;<input type="text" name="href[3][]" size="6"/></li>
        <li>name:<input type="text" name="name[3][]" size="6"/></li>
        <li>href:&nbsp;&nbsp;&nbsp;<input type="text" name="href[3][]" size="6"/></li>
        <li>name:<input type="text" name="name[3][]" size="6"/></li>
        <li>href:&nbsp;&nbsp;&nbsp;<input type="text" name="href[3][]" size="6"/></li>
      </ul>
    </div>
  </div>
  <div class="col-xs-6 col-sm-4" style="padding: 3px">
    <div class="col-xs-8" style="padding: 3px">
        <img src="../image/index/aboutttu.png" class="img-responsive" />
      </a>
    </div>
    <div class="col-xs-4" style="padding: 3px">
      <ul class="list-unstyled">
        <li>name:<input type="text" name="name[4][]" size="6"/></li>
        <li>href:&nbsp;&nbsp;&nbsp;<input type="text" name="href[4][]" size="6"/></li>
        <li>name:<input type="text" name="name[4][]" size="6"/></li>
        <li>href:&nbsp;&nbsp;&nbsp;<input type="text" name="href[4][]" size="6"/></li>
        <li>name:<input type="text" name="name[4][]" size="6"/></li>
        <li>href:&nbsp;&nbsp;&nbsp;<input type="text" name="href[4][]" size="6"/></li>
      </ul>
    </div>
   </div>
   <div class="col-xs-6 col-sm-4" style="padding: 3px">
    <div class="col-xs-8" style="padding: 3px">
        <img src="../image/index/aboutttu.png" class="img-responsive" />
      </a>
    </div>
    <div class="col-xs-4" style="padding: 3px">
      <ul class="list-unstyled">
        <li>name:<input type="text" name="name[5][]" size="6"/></li>
        <li>href:&nbsp;&nbsp;&nbsp;<input type="text" name="href[5][]" size="6"/></li>
        <li>name:<input type="text" name="name[5][]" size="6"/></li>
        <li>href:&nbsp;&nbsp;&nbsp;<input type="text" name="href[5][]" size="6"/></li>
        <li>name:<input type="text" name="name[5][]" size="6"/></li>
        <li>href:&nbsp;&nbsp;&nbsp;<input type="text" name="href[5][]" size="6"/></li>
      </ul>
    </div>
  </div>
-->
</div>

    <input type="submit" name="submit" value="send"/>

</form>
﻿    <nav class="navbar" id="myfooter">
</nav>
</body>
</html>
<script>
function add()
{
  document.getElementById("test").innerHTML+='<div class="carousel-inner" role="listbox"><input type="file" name="slideshow[]" value="1"></div>';

}


</script>


