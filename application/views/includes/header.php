<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> 
<html lang="en"> <!--<![endif]-->

    <!-- BEGIN HEAD-->
    <head>

        <meta charset="UTF-8" />
        <title>ASTAS App</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!--[if IE]>
           <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
           <![endif]-->
        <!-- GLOBAL STYLES -->
        <!-- GLOBAL STYLES -->
        <link rel="stylesheet" href="<?=base_url(); ?>/assets/plugins/bootstrap/css/bootstrap.css" />
        <link rel="stylesheet" href="<?=base_url(); ?>/assets/css/main.css" />
        <link rel="stylesheet" href="<?=base_url(); ?>/assets/css/theme.css" />
        <link rel="stylesheet" href="<?=base_url(); ?>/assets/css/MoneAdmin.css" />
        <link rel="stylesheet" href="<?=base_url(); ?>/assets/plugins/Font-Awesome/css/font-awesome.css" />
        <!--END GLOBAL STYLES -->

        <!-- PAGE LEVEL STYLES -->
        <link href="<?=base_url(); ?>/assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

        <!-- PAGE LEVEL STYLES -->
        <!-- END PAGE LEVEL  STYLES -->
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        
    </head>
    <!-- END  HEAD-->
    <!-- BEGIN BODY-->
    <body class="padTop53 " >

        <!-- MAIN WRAPPER -->
        <div id="wrap">


            <!-- HEADER SECTION -->
            <div id="top">

                <nav class="navbar navbar-inverse navbar-fixed-top " style="padding-top: 10px;">
                    <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
                        <i class="icon-align-justify"></i>
                    </a>
                    <!-- LOGO SECTION -->
                    <header class="navbar-header" style = "margin-left: 10px;  margin-bottom: 5px; " >
                        <a href="<?= base_url(); ?>" class="navbar-brand">
                            ASTAS <i>App.</i>&nbsp;<i class="icon-user "></i>&nbsp;<i class="icon-comments "></i>&nbsp;<i class="icon-cogs "></i>&nbsp;<i class="icon-signal "></i>&nbsp;<i class="icon-thumbs-up "></i>
                        </a>
                    </header>
                    <!-- END LOGO SECTION -->
                    <ul class="nav navbar-top-links navbar-right">                        

                        <!--ADMIN SETTINGS SECTIONS -->

                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="icon-user "></i>&nbsp; <i class="icon-chevron-down "></i>
                            </a>

                            <ul class="dropdown-menu dropdown-user">                                
                                <li><a href="<?=base_url(); ?>login/logout"><i class="icon-signout"></i> Logout </a>
                                </li>
                            </ul>

                        </li>
                        <!--END ADMIN SETTINGS -->
                    </ul>

                </nav>

            </div>
            <!-- END HEADER SECTION -->



            <!-- MENU SECTION -->
            <div id="left"  >


                <ul id="menu" class="collapse">
                    <li class="panel ">
                        <a href="<?=base_url(); ?>main/index" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#component-nav">
                            <i class="icon-dashboard"> </i> Dashboard
                        </a>                    
                    </li>
                    
                    <li class="panel ">
                        <a href="<?=base_url(); ?>main/sa" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#component-nav">
                            <i class="icon-cogs"> </i> Sentiment Analysis
                        </a>                    
                    </li>    

                    <li class="panel">
                        <a href="<?=base_url(); ?>main/view/chumontreal" >
                            <i class="icon-bar-chart"></i> CHU Montreal                         
                        </a>                   
                    </li>
                    
                    <li class="panel">
                        <a href="<?=base_url(); ?>main/view/ChuSteJustine" >
                            <i class="icon-bar-chart"></i> CHU Ste Justine                        
                        </a>                   
                    </li>
                    
                    <li class="panel">
                        <a href="<?=base_url(); ?>main/view/HopitalChildren" >
                            <i class="icon-bar-chart"></i> Hopital MTL Children                         
                        </a>                   
                    </li>                   
                    
                    <li class="panel ">
                        <a href="<?=base_url(); ?>login/logout" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#component-nav">
                            <i class="icon-signout"> </i> Logout 
                        </a>                    
                    </li>
                </ul>

            </div>
            <!--END MENU SECTION -->


            <!--PAGE CONTENT -->
            <div id="content">