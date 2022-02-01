<!doctype html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap-select.css">
    <link href='http://fonts.googleapis.com/css?family=Montserrat:200,300,400,600,700' rel='stylesheet'
        type='text/css' />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:200,300,400,600,700' rel='stylesheet'
        type='text/css' />
    <link href='css/font-awesome.min.css' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" type="text/css" href="../../css/camera.css">
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <style>
    img {
        width: 200px;
        height: 200px;

    }
    </style>
</head>
<?php 
                        $uid = session()->get('loggedUser');
                        ?>

<body>
    <div class="page-container">
        <div class="header">
            <nav class="navbar container">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="index.html" class="navbar-brand">
                        Projekt
                    </a>
                </div>


                <div class="navbar-collapse collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="<?= base_url('dashboard/index') ?>">Strona główna</a></li>



                        <li><a href="about.php" class="ajax_right">O nas</a></li>


                        <?php
 if($uid ){ ?>


                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle"
                                href="#"><?php echo session()->get('username');  ?> <b class="caret"></b></a>
                            <ul class="dropdown-menu multi-2-columns">
                                <li> <a href="<?= site_url('offer'); ?>">Utwórz ogłoszenie</a></li>
                                <li><a href="<?= base_url('dashboard/myoffers/'.$uid) ?>" class="ajax_right">Moje
                                        ogłoszenia</a></li>
                                <li><a href="<?= site_url('auth/changepassword'); ?>" class="ajax_right">Edytuj
                                        profil</a></li>
                                <li><a href="<?= site_url('dashboard/mypurchases/'.$uid); ?>"
                                        class="ajax_right">Historia zakupów</a></li>
                                <li><a href="<?= site_url('auth/logout'); ?>" class="ajax_right">Wyloguj</a></li>
                            </ul>
                        </li>





                        <?php } else { ?>


                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">Konto <b class="caret"></b></a>
                            <ul class="dropdown-menu multi-2-columns">
                                <li><a href="<?= site_url('auth/index'); ?>">Zaloguj</a></li>
                                <li><a href="<?= site_url('auth/register'); ?>">Zarejestruj</a></li>
                            </ul>
                        </li>


                        <?php } ?>


                    </ul>


                </div><!-- /.navbar-collapse -->
            </nav>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12 slideshow">
                    <div id="slideshow0">
                        <div class="camera_wrap camera_emboss camera_white_skin">
                            <img src="image/sub.jpg" alt="Banner 1" />
                            <div data-thumb="image/sub.jpg" data-src="image/sub.jpg" data-link="product.html">
                            </div>
                            <div data-thumb="image/sub1.jpg" data-src="image/sub.jpg">
                            </div>
                            <div data-thumb="image/sub2.jpg" data-src="image/sub2.jpg">
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-md-3 left-menu">

                <div class="options">
                        <div class="list-group">
                            <li class="list-group-item list-group-item-action"><a
                                    href="<?= base_url('dashboard/viewcategory/1') ?>">Elektronika</a></li>
                            <li class="list-group-item list-group-item-action"><a
                                    href="<?= base_url('dashboard/viewcategory/2') ?>">Motoryzacja</a></li>
                            <li class="list-group-item list-group-item-action"><a
                                    href="<?= base_url('dashboard/viewcategory/3') ?>">Dom</a></li>
                            <li class="list-group-item list-group-item-action"><a
                                    href="<?= base_url('dashboard/viewcategory/4') ?>">Ogród</a></li>
                            <li class="list-group-item list-group-item-action"><a
                                    href="<?= base_url('dashboard/viewcategory/5') ?>">Zdrowie</a></li>
                            <li class="list-group-item list-group-item-action"><a
                                    href="<?= base_url('dashboard/viewcategory/6') ?>">Sport</a></li>
                            <li class="list-group-item list-group-item-action"><a
                                    href="<?= base_url('dashboard/viewcategory/7') ?>">Rozrywka</a></li>
                            <li class="list-group-item list-group-item-action"><a
                                    href="<?= base_url('dashboard/viewcategory/8') ?>">Moda</a></li>
                            <li class="list-group-item list-group-item-action"><a
                                    href="<?= base_url('dashboard/viewcategory/9') ?>">Sztuka</a></li>
                            <li class="list-group-item list-group-item-action"><a
                                    href="<?= base_url('dashboard/viewcategory/10') ?>">Usługi</a></li>
                        </div>
                    </div>
                    </div>


                    <div class="col-md-9">

                        <?php foreach($offer as $row) : ?>

                        <div class="col-md-4">
                            <div class="product">
                                <img src="<?php echo base_url('uploads/'.$row['file_name']); ?>" />
                                <div class="name">
                                    <a href="#"><?= $row['title'] ?></a>
                                </div>
                                <div class="price">
                                    <p><?= $row['price'] ?> zł</p>
                                </div>

                            </div>
                        </div>

                        <?php endforeach; ?>

                    </div>



                </div>

            </div>
        </div>
    </div>



    <div class="footer black">
        <div class="container">
            <!-- div class="arrow"><b class="caret"></b></div -->
            <div class="row">
                <div class="col-md-3">
                    <div>
                        <h3>Informacje</h3>
                        <ul>
                            <li><a href="about.html">O nas</a></li>
                            <li><a href="#">Regulamin</a></li>
                            <li><a href="#">Dostawy</a></li>
                        </ul>
                    </div>
                </div>



                <div class="col-md-3 social">
                    <div class="copy"></div>
                    <div class="copy"></div>
                    <ul class="social-network">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    </div>

    <!-- script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>window.jQuery || document.write("<script src='js/jquery-1.10.2.min.js'><\/script>")</script -->
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="js/camera.js"></script>
    <script type="text/javascript" src="js/sapphire.js"></script>
    <script>
    $(document).ready(function() {
        jQuery('#slideshow0 > div').camera({
            alignment: "center",
            autoAdvance: true,
            mobileAutoAdvance: true,
            barDirection: "leftToRight",
            barPosition: "bottom",
            cols: 6,
            easing: "easeInOutExpo",
            mobileEasing: "easeInOutExpo",
            fx: "random",
            mobileFx: "random",
            gridDifference: 250,
            height: "auto",
            hover: true,
            loader: "pie",
            loaderColor: "#eeeeee",
            loaderBgColor: "#222222",
            loaderOpacity: 0.3,
            loaderPadding: 2,
            loaderStroke: 7,
            minHeight: "200px",
            navigation: true,
            navigationHover: true,
            mobileNavHover: true,
            opacityOnGrid: false,
            overlayer: true,
            pagination: true,
            pauseOnClick: true,
            playPause: true,
            pieDiameter: 38,
            piePosition: "rightTop",
            portrait: false,
            rows: 4,
            slicedCols: 12,
            slicedRows: 8,
            slideOn: "random",
            thumbnails: false,
            time: 7000,
            transPeriod: 1500,
            imagePath: '../image/'
        });
    });
    </script>
</body>

</html>