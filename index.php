<!DOCTYPE html>
<html>
<head>
<?php
$slideshow_num=2;
$json = json_decode(file_get_contents('admin/href1.json'),true);
?>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>大同大學招生資訊網</title>
<link rel="stylesheet" href="include/css/bootstrap.css">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<script src="include/js/jquery1.11.0.min.js"></script>
<script src="include/js/bootstrap.min.js"></script>
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
        <img src="image/logo.png" height="43" style="padding-top: 8px">
      </a>
    </div>
  </div>
</nav>
<div class="container">
  <!-- First Row -->
  <div class="row" style="padding: 3px">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
<?php
for($i=0; $i<$slideshow_num; $i++)
{
  echo "<li data-target='#carousel-example-generic' data-slide-to='".$i."'";
  if($i==0) echo " class='active'";
  echo "></li>\n";
}
?>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
<?php
for($i=0; $i<$slideshow_num; $i++)
{
  echo "<div class='item ";
  if($i==0) echo "active";
  echo "'>";
  echo "<img src='slideshow/slideshow";
  echo sprintf('%d', $i+1);
  echo ".jpg' alt='...'>\n";
  echo "<div class='carousel-caption'></div>";
  echo "</div>";
}
?>
      </div>
    </div>
  </div>
  <!-- Second Row -->
<?php
foreach($json as $item)
{
  echo "<div class='col-xs-6 col-sm-4' style='padding: 3px'>";
  echo "<div class='col-xs-8' style='padding: 3px'>";
  echo "<img src='image/index/".$item['image']."' class='img-responsive' />";
  echo "</div>";
  echo "<div class='col-xs-4' style='padding: 3px'>";
  echo "<ul class='list-unstyled'>";
  foreach($item['data'] as $item1)
  {
    echo "<li><a href='content.php?type=".$item['index']."&index=".$item1['index']."'>".$item1['name']."</a></li>";
  }
  echo "</ul>";
  echo "</div>";
  echo "</div>";
}
?>
<!--
<nav class="navbar" id="myfooter">
  <div class="navbar-inner">
    <div class="container">&copy;2014 Tatung University
      <br />
     o "</div>";<address>台北市中山區中山北路三段40號, (02)2182-2928
        <br />No.40, Sec. 3, Zhongshan N. Rd., Taipei City 104, Taiwan(R.O.C), +886-2-21822928
        <br /></address></div>
  </div>
</nav>
-->
</body>
</html>

