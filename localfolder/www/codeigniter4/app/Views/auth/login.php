<!doctype html>

<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-select.css">
    <link href='http://fonts.googleapis.com/css?family=Montserrat:200,300,400,600,700' rel='stylesheet'
        type='text/css' />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:200,300,400,600,700' rel='stylesheet'
        type='text/css' />
    <link href='css/font-awesome.min.css' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" type="text/css" href="../css/camera.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>Projekt</title>
</head>

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
                    <a href="index.php" class="navbar-brand">
                        Projekt
                    </a>
                </div>


                <div class="navbar-collapse collapse navbar-right">
                    <ul class="nav navbar-nav">
                    <li class="active"><a href="<?= base_url('dashboard/index') ?>">Strona główna</a></li>                 

                        <li><a href="about.html" class="ajax_right">O nas</a></li>
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">Konto <b class="caret"></b></a>
                            <ul class="dropdown-menu multi-2-columns">
                                <li><a href="login.php">Zaloguj</a></li>
                                <li><a href="register.php">Zarejestruj</a></li>
                            </ul>
                        </li>
                    </ul>



                </div>
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


                <div class="col-md-9">

                    <div class="container">
                        <div class="row centered-form">
                            <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Logowanie</h3>
                                    </div>


                                    <div class="panel-body">
                                        <form action="<?= base_url('auth/check') ?>" method="post">
                                              <?= csrf_field(); ?> 
                                            <div class="row">
                                                <div class="col-xs-6 col-sm-6 col-md-12">
                                                    <div class="form-group">
                                                        <input type="text" name="username" id="username"
                                                            class="form-control input-sm" placeholder="Username" value="<?= set_value('username') ?> ">
                                                            <span class="text-danger">
                                                            <?= isset($validation) ? display_error($validation,'username') : '' ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-xs-6 col-sm-6 col-md-12">
                                                    <div class="form-group">
                                                        <input type="password" name="password" id="password"
                                                            class="form-control input-sm" placeholder="Hasło">
                                                            <span class="text-danger">
                                                            <?= isset($validation) ? display_error($validation,'password') : '' ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" name="submit" value="Zaloguj"
                                                    class="btn btn-info btn-block">
                                            </div>
                                            <br>
                                            <a href="<?= site_url('auth/register'); ?>"> Nie mam konta. Zarejestruj się </a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>







                </div>
            </div>
        </div>



        <div class="footer black">
            <div class="container">
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

                    <div class="col-md-3">
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