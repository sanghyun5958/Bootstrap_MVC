<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/head.php');
    return;
}

include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
?>
<html><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>WiFI Main</title>
    <!-- Bootstrap Core CSS -->
    <link href="../../bootstrap.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css">
    <!-- Custom CSS -->
    <!-- Custom Fonts -->
    <link href="../../clean-blog.css" rel="stylesheet" type="text/css">
    <link href="head.php" rel="stylesheet" type="text/css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media
    queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file://
    -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head><body>
    <!-- Navigation -->
    <div class="row">
      <nav class="navbar navbar-default navbar-custom navbar-fixed-top navbar-left  ">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a href="index.html"><img src="img\logo.jpg"></a>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right ">
              <li>
                <a href="index.html">HOME</a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">ABOUT<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li>
                    <a href="aboutus.html">What is WIFI? </a>
                  </li>
                  <li class="divider"></li>
                  <li>
                    <a href="aboutus_2.html">What is WIFI InfoBank?</a>
                  </li>
                  <li class="divider"></li>
                  <li>
                    <a href="aboutus_3.html">WIFI Approach</a>
                  </li>
                  <li class="divider"></li>
                  <li>
                    <a href="aboutus_4.html">WIFI Partners</a>
                  </li>
                  <li class="divider"></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">WHAT WE OFFER<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li>
                    <a href="WIFI_T_M.html">WIFI Training Modules </a>
                  </li>
                  <li class="divider"></li>
                  <li>
                    <a href="CASE_S.html">Case Studies</a>
                  </li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">RESOURCES<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li>
                    <a href="G_ICT.html">Online Training for Digital Literacy Enhancement </a>
                  </li>
                  <li class="divider"></li>
                  <li>
                    <a href="B_ICT.html">Online Training for Business Skills Enhancement</a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="contact.html">CONTACT</a>
              </li>
              <li>
                <form class="navbar-form" role="search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
                    <div class="input-group-btn">
                      <button class="btn btn-default" type="submit">
                        <i class="glyphicon glyphicon-search"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </li>
            </ul>
            <!-- /.navbar-collapse -->
          </div>
        </div>
        <!-- /.container -->
      </nav>
    </div>
    <!-- Page Header -->
   <!-- jQuery -->
    <script src="../../js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../../js/bootstrap.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="../../js/clean-blog.min.js"></script>
    <script src="../mobile/player_compiled.js" type="text/javascript"></script>
<hr>

<!-- 콘텐츠 시작 { -->
<div id="wrapper"> 
    <div id="aside">
        <?php echo outlogin('theme/basic'); // 외부 로그인, 테마의 스킨을 사용하려면 스킨을 theme/basic 과 같이 지정 ?>
        <?php echo poll('theme/basic'); // 설문조사, 테마의 스킨을 사용하려면 스킨을 theme/basic 과 같이 지정 ?>
    </div>
    <div id="container">
        <?php if ((!$bo_table || $w == 's' ) && !defined("_INDEX_")) { ?><div id="container_title"><?php echo $g5['title'] ?></div><?php } ?>