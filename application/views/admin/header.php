<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>中南大学辅导员考试学习园地管理系统</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url(); ?>css/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url(); ?>css/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url(); ?>css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>favicon.ico">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
  <div id="wrapper">

      <!-- Navigation -->
      <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
          <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="<?php echo site_url();?>Admin">中南大学辅导员考试学习园地管理系统</a>
          </div>
          <!-- /.navbar-header -->

          <ul class="nav navbar-top-links navbar-right">
              <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                      <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-user">
                      <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                      </li>
                      <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                      </li>
                      <li class="divider"></li>
                      <li><a href="#"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                      </li>
                  </ul>
                  <!-- /.dropdown-user -->
              </li>
              <!-- /.dropdown -->
          </ul>
          <!-- /.navbar-top-links -->

          <div class="navbar-default sidebar" role="navigation">
              <div class="sidebar-nav navbar-collapse">
                  <ul class="nav" id="side-menu">
                      <li class="sidebar-search">
                          <div class="input-group custom-search-form">
                              <input type="text" class="form-control" placeholder="Search...">
                              <span class="input-group-btn">
                              <button class="btn btn-default" type="button">
                                  <i class="fa fa-search"></i>
                              </button>
                          </span>
                          </div>
                          <!-- /input-group -->
                      </li>
                      <li>
                          <a href="<?php echo site_url();?>Admin"><i class="fa fa-dashboard fa-fw"></i> 控制面板</a>
                      </li>
                      <li>
                          <a href="#"><i class="fa fa-upload"></i>题库导入<span class="fa arrow"></span></a>
                          <ul class="nav nav-second-level">
                              <li>
                                  <a href="<?php echo site_url();?>Admin/ImportRadio">单选题导入</a>
                              </li>
                              <li>
                                  <a href="<?php echo site_url();?>Admin/ImportMulti">多选题导入</a>
                              </li>
                              <li>
                                  <a href="<?php echo site_url();?>Admin/ImportTorF">填空题导入</a>
                              </li>
                              <li>
                                  <a href="<?php echo site_url();?>Admin/ImportShort_answer">简答题导入</a>
                              </li>
                              <li>
                                  <a href="<?php echo site_url();?>Admin/ImportDiscussion">论述题导入</a>
                              </li>
                              <li>
                                  <a href="<?php echo site_url();?>Admin/ImportWriting">写作题导入</a>
                              </li>
                          </ul>
                          <!-- /.nav-second-level -->
                      </li>
                      <li>
                          <a href="<?php echo site_url();?>Admin/Export"><i class="fa fa-download"></i> 数据导出</a>
                      </li>
                      <li>
                          <a href="#"><i class="fa fa-list-alt"></i> 数据统计<span class="fa arrow"></span></a>
                          <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo site_url();?>Admin/AnalyseCollege">学院情况</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url();?>Admin/AnalyseWrong">错误率</a>
                            </li>
                          </ul>
                      </li>
                      <li>
                          <a href="#"><i class="fa fa-wrench fa-fw"></i>题库管理<span class="fa arrow"></span></a>
                          <ul class="nav nav-second-level">
                              <li>
                                  <a href="<?php echo site_url();?>Admin/EditDelete/radio">单选管理</a>
                              </li>
                              <li>
                                  <a href="<?php echo site_url();?>Admin/EditDelete/Multiple">多选管理</a>
                              </li>
                              <li>
                                  <a href="<?php echo site_url();?>Admin/EditDelete/TorF">填空管理</a>
                              </li>
                              <li>
                                  <a href="<?php echo site_url();?>Admin/EditDelete/Short_answer">简答管理</a>
                              </li>
                              <li>
                                  <a href="<?php echo site_url();?>Admin/EditDelete/Discussion"> 论述管理</a>
                              </li>
                              <li>
                                  <a href="<?php echo site_url();?>Admin/EditDelete/writing">写作管理</a>
                              </li>
                          </ul>
                          <!-- /.nav-second-level -->
                      </li>
                  </ul>
              </div>
              <!-- /.sidebar-collapse -->
          </div>
          <!-- /.navbar-static-side -->
          </nav>
          <div id="page-wrapper">
          <div class="row">
              <div class="col-lg-12">
                  <h1 class="page-header">控制面板</h1>
              </div>
              <!-- /.col-lg-12 -->
          </div>
