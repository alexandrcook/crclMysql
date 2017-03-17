<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap Core CSS -->
    <link href="/views/template/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/views/template/css/shop-homepage.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="/views/template/js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="/views/template/js/bootstrap.min.js"></script>
    <title>Crcl MySQL</title>
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
<div class="container">
    <div class="row">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Tog navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
<!--                    <a class="navbar-brand page-scroll" href="/">GuestBook</a>-->
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav" style="width: 100%; margin-left: -15px">
                        <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                        <li class="hidden">
                            <a class="page-scroll" href="#page-top"></a>
                        </li>
                        <li>
                            <a class="page-scroll" href=" https://github.com/alexandrcook/crclMysql"><b>GitHub</b></a>
                        </li>
                        <li>
                            <a class="page-scroll" href="/">Головна</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="/categories">Категории товаров</a>
                        </li>
                        <?php

                        global $pdo;

                        if(isset($_SESSION['user_name'])){
                            echo ('<li style="float: right">');
                            echo ('<span style="display: inline-block; margin-top: 15px">Залогинен пользователь <b>"'.$_SESSION['user_name'].'"</b></span></span>
                            <a style="display: inline-block; padding: 5px" class="btn btn-default" href="/login/logout">Выйти</a>');
                            echo ('</li>');
                        }else{
                            echo('<li style="float: right"><a class="page-scroll" href="/login">Login/Register</a></li>');
                        }

                        if(isset($_SESSION['user_name'])){
                        ?>
                            <li style="float: right">
                            <a class="page-scroll" href="/orders/basket">Корзина - <?= productInBasketCount($pdo); ?> товар(ов)</a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
        <div class="col-xs-12 messages-pole">
            <div class="toload"></div>
                <?php
                echo ('Flash info:<br>');
                echo ('<h3 class="flash-msg">');
                if(isset($_SESSION['flash_msg'])){
                    echo($_SESSION['flash_msg']);
                    unset($_SESSION['flash_msg']);
                }
                echo ('</h3>');
                ?>
            <hr>
        </div>
    </div>



