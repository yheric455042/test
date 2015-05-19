<!DOCTYPE html>
<html>
    <head>
        <?php
            $json = json_decode(file_get_contents('admin/href1.json'),true);
            $type = isset($_GET['type']) ? $_GET['type']-1 : 0;
            $index = isset($_GET['index']) ? $_GET['index']-1 : 0;
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
        <script src="include/js/jquery-1.11.0.min.js"></script>
        <script src="include/js/bootstrap.min.js"></script>
        <style>
            body {
                padding-top: 53px;
            }
            .carousel-inner > .item > img { margin: 0 auto; }
        </style>
    </head>
    <body>
        <!-- navbar -->
        <nav class="navbar navbar-default navbar-fixed-top" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <img src="image/logo.png" height="43" style="padding-top: 8px">
                </div>
            </div>
        </nav> <!-- navbar end-->
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="btn-group btn-group-justified hidden-xs" style="padding-bottom: 6px">
                        <a type="button" class="btn btn-primary <?php if($type+1==$json[0]['index']) echo 'active'; ?>" href="?type=1"><span class="glyphicon glyphicon-send"><?php echo ' '.$json[0]['tittle']?></span></a></li>
                        <a type="button" class="btn btn-primary <?php if($type+1==$json[1]['index']) echo 'active'; ?>" href="?type=2"><span class="glyphicon glyphicon-screenshot"><?php echo ' '.$json[1]['tittle']?></span></a></li>
                        <a type="button" class="btn btn-primary <?php if($type+1==$json[2]['index']) echo 'active'; ?>" href="?type=3"><span class="glyphicon glyphicon-book"><?php echo ' '.$json[2]['tittle']?></span></a></li>
                        <a type="button" class="btn btn-primary <?php if($type+1==$json[3]['index']) echo 'active'; ?>" href="?type=4"><span class="glyphicon glyphicon-random"><?php echo ' '.$json[3]['tittle']?></span></a></li>
                        <a type="button" class="btn btn-primary <?php if($type+1==$json[4]['index']) echo 'active'; ?>" href="?type=5"><span class="glyphicon glyphicon-user "><?php echo ' '.$json[4]['tittle']?></span></a></li>
                        <a type="button" class="btn btn-primary <?php if($type+1==$json[5]['index']) echo 'active'; ?>" href="?type=6"><span class="glyphicon glyphicon-road "><?php echo ' '.$json[5]['tittle']?></span></a></li>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-2">
                    <div class="panel panel-primary">
                        <div class="panel-heading">切換身分</div>
                        <div class="nav bs-sidenav">              
                            <li class="nav"><a href="<?php echo '?type='.$json[$type]['index'].'&index='.$json[$type]['data'][0]['index']; ?>"><?php echo $json[$type]['data'][0]['name']; ?></a></li>
                            <li class="nav"><a href="<?php echo '?type='.$json[$type]['index'].'&index='.$json[$type]['data'][1]['index']; ?>"><?php echo $json[$type]['data'][1]['name']; ?></a></li>
                            <li class="nav"><a href="<?php echo '?type='.$json[$type]['index'].'&index='.$json[$type]['data'][2]['index']; ?>"><?php echo $json[$type]['data'][2]['name']; ?></a></li>
                        </div>
                    </div> <!-- pane end -->
                </div>
                <div class="col-xs-12 col-sm-10">
                    <p class="h3 text-center">
                        請點擊圖片左右兩側<span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="glyphicon glyphicon-chevron-right"></span>換頁
                    </p>
                    <!-- Slidwshow -->
                    <div id="myCarousel" class="carousel slide" data-ride="carousel" >
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                            <li data-target="#myCarousel" data-slide-to="3"></li>
                            <li data-target="#myCarousel" data-slide-to="4"></li>
                            <li data-target="#myCarousel" data-slide-to="5"></li>
                            <li data-target="#myCarousel" data-slide-to="6"></li>
                        </ol>
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <img src="/image/aboutttu/about00.jpg" class="img-responsive">
                            </div>
                            <div class="item">
                                <img src="/image/aboutttu/about01.jpg" class="img-responsive">
                            </div>
                            <div class="item">
                                <img src="/image/aboutttu/about02.jpg" class="img-responsive">
                            </div>
                            <div class="item">
                                <img src="/image/aboutttu/about03.jpg" class="img-responsive">
                            </div>
                            <div class="item">
                                <img src="/image/aboutttu/about04.jpg" class="img-responsive">
                            </div>
                            <div class="item">
                                <img src="/image/aboutttu/about05.jpg" class="img-responsive">
                            </div>
                            <div class="item">
                                <img src="/image/aboutttu/about06.jpg" class="img-responsive">
                            </div>
                            <div class="item">
                                <img src="/image/aboutttu/about07.jpg" class="img-responsive">
                            </div>
                        </div>
                        <!-- Controls -->
                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                    </div> <!-- Slidwshow End -->
                </div>
            </div> <!-- row End -->
        </div> <!-- container End -->
    </body>
</html>

