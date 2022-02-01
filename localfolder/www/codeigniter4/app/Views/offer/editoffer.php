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
    <title>Projekt</title>
</head>
<?php 

$uid = session()->get('loggedUser');

if($uid != $offer['seller_id']){

    echo '<script> window.location.href = "/dashboard";</script>';

}


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
                                <li><a href="<?= site_url('dashboard/myoffers/'.$uid) ?>" class="ajax_right">Moje
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

                    <form action="http://nicolette.ro/" class="navbar-form navbar-search navbar-right" role="search">
                        <div class="input-group">
                            <input type="text" name="search" placeholder="Search" class="search-query col-md-2"><button
                                type="submit" class="btn btn-default icon-search"></button>
                        </div>
                    </form>

                </div><!-- /.navbar-collapse -->
            </nav>
        </div>

        <div class="container">
            <div class="row">


                <div class="col-md-9">

                    <div class="container">
                        <div class="row centered-form">

                            <form action="<?= base_url('offer/update/'.$offer['offer_id']) ?>" method="post" class="form-horizontal">
                                <input type="hidden" name="_method" value="PUT" />  
                            <?= csrf_field(); ?>
                                <?php if(!empty(session()->getFlashdata('fail'))) : ?>
                                <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
                                <?php endif ?>

                                <?php if(!empty(session()->getFlashdata('succes'))) : ?>
                                <div class="alert alert-success"> <?= session()->getFlashdata('success'); ?></div>
                                <?php endif ?>


                                <fieldset>

                                    <!-- Form Name -->
                                    <legend>Edytuj ogłoszenie</legend>


                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="title">Tytuł ogłoszenia</label>
                                        <div class="col-md-4">
                                            <input id="title" name="title" class="form-control input-md" type="text" value="<?= $offer['title'];?>">
                                            <span class="text-danger">
                                                <?= isset($validation) ? display_error($validation,'title') : '' ?>
                                            </span>

                                        </div>
                                    </div>


                                    <!-- Select Basic -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="category">Kategoria</label>
                                        <div class="col-md-4">
                                            <select id="category" name="category" class="form-control">
                                                <option value="1" selected>Elektronika</option>
                                                <option value="2">Motoryzacja</option>
                                                <option value="3">Dom</option>
                                                <option value="4">Ogród</option>
                                                <option value="5">Zdrowie</option>
                                                <option value="6">Sport</option>
                                                <option value="7">Rozrywka</option>
                                                <option value="8">Moda</option>
                                                <option value="9">Sztuka</option>
                                                <option value="10">Usługi</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Textarea -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="desc">Opis</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control input-md" id="desc" name="desc" value="<?= $offer['desc'];?>">
                                            <span class="text-danger">
                                                <?= isset($validation) ? display_error($validation,'desc') : '' ?>
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="localization">Lokalizacja</label>
                                        <div class="col-md-4">
                                            <input id="localization" name="localization" class="form-control input-md"
                                                type="text" value="<?= $offer['loc'];?>">
                                            <span class="text-danger">
                                                <?= isset($validation) ? display_error($validation,'localization') : '' ?>
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="enddate">Data zakończenia</label>
                                        <div class="col-md-4">
                                            <input id="enddate" name="enddate" class="form-control input-md"
											type="datetime-local">
                                        </div> 
                                    </div>

                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="price">Cena</label>
                                        <div class="col-md-4">
                                            <input id="price" name="price" class="form-control input-md"
                                                type="number" value="<?= $offer['price'];?>">
                                            <span class="text-danger">
                                                <?= isset($validation) ? display_error($validation,'price') : '' ?>
                                            </span>
                                        </div>
                                    </div>

                                    <!-- File Button -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="images">Zdjęcia</label>
                                        <div class="col-md-4">
                                            <input id="images" name="images" class="input-file" type="file">
                                        </div>
                                    </div>


                                    <!-- Button -->
                                    <div class="form-group">
                                        <div class="col-md-4">
                                            <input type="submit" name="submit" value="Edytuj"
                                                class="btn btn-info btn-block">
                                        </div>
                                    </div>

                                </fieldset>
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

                <!-- div class="col-md-3 twitter">
					<div class="row">
						<h3>Follow us</h3>
						<script type="text/javascript" src="js/twitterFetcher_v9_min.js"></script>
						<ul id="twitter_update_list"><li class="col-md-2">Twitter feed loading</li></ul>			
						<script>twitterFetcher.fetch('256524641194098690', 'twitter_update_list', 2, true, true, false);</script> 
					</div>				
				</div-->
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