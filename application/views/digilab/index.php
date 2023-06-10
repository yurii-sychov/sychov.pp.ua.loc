<?php

/**
 * Developer: Yurii Sychov
 * Site: http://sychov.pp.ua
 * Email: yurii@sychov.pp.ua
 */

defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $title; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo '/assets/themes/'.$this->config->item('theme').'/'; ?>css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo '/assets/themes/'.$this->config->item('theme').'/'; ?>css/animate.css">
    
    <link rel="stylesheet" href="<?php echo '/assets/themes/'.$this->config->item('theme').'/'; ?>css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo '/assets/themes/'.$this->config->item('theme').'/'; ?>css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo '/assets/themes/'.$this->config->item('theme').'/'; ?>css/magnific-popup.css">

    <link rel="stylesheet" href="<?php echo '/assets/themes/'.$this->config->item('theme').'/'; ?>css/aos.css">

    <link rel="stylesheet" href="<?php echo '/assets/themes/'.$this->config->item('theme').'/'; ?>css/ionicons.min.css">
    
    <link rel="stylesheet" href="<?php echo '/assets/themes/'.$this->config->item('theme').'/'; ?>css/flaticon.css">
    <link rel="stylesheet" href="<?php echo '/assets/themes/'.$this->config->item('theme').'/'; ?>css/icomoon.css">
    <link rel="stylesheet" href="<?php echo '/assets/themes/'.$this->config->item('theme').'/'; ?>css/style.css">
</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="/">SYCHOV<span>LAB</span></a>
            <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav nav ml-auto">
                    <li class="nav-item">
                        <a href="<?php echo ($page == 'landing') ? "#home-section" : "/landing/index/#home-section"; ?>" class="nav-link" data-target="#home-section">
                            <span>Головна</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo ($page == 'landing') ? "#services-section" : "/landing/index/#services-section"; ?>" class="nav-link" data-target="#services-section">
                            <span>Послуги</span>
                        </a></li>
                    <li class="nav-item">
                        <a href="<?php echo ($page == 'landing') ? "#projects-section" : "/landing/index/#projects-section"; ?>" class="nav-link" data-target="#projects-section">
                            <span>Проекти</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo ($page == 'landing') ? "#about-section" : "/landing/index/#about-section"; ?>" class="nav-link" data-target="#about-section">
                            <span>Про нас</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo ($page == 'landing') ? "#testimony-section" : "/landing/index/#testimony-section"; ?>" class="nav-link" data-target="#testimony-section"><span>Наші клієнти</span></a></li>
                    <li class="nav-item">
                        <a href="<?php echo ($page == 'landing') ? "#blog-section" : "/landing/index/#blog-section"; ?>" class="nav-link" data-target="#blog-section">
                            <span>Блог</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo ($page == 'landing') ? "#contact-section" : "/landing/index/#contact-section"; ?>" class="nav-link" data-target="#contact-section">
                            <span>Контакти</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <?php $this->load->view($this->config->item('theme').'/'.$content); ?>

    <footer class="ftco-footer ftco-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Про SyshovLab</h2>
                        <p>Веб студія SyshovLab заснована в 2020 році двома фанатами веб технологій. Сьогодні в штаті компанії понад 10 осіб, які працюють в офісах Україні, США та ОАЕ.</p>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                            <li class="ftco-animate">
                                <a href="https://twitter.com/yurii_sychov" target="_blank">
                                    <span class="icon-twitter"></span>
                                </a>
                            </li>
                            <li class="ftco-animate">
                                <a href="https://www.facebook.com/yurii.sychov" target="_blank">
                                    <span class="icon-facebook"></span>
                                </a>
                            </li>
                            <li class="ftco-animate">
                                <a href="https://www.instagram.com/yurii.sychov" target="_blank">
                                    <span class="icon-instagram"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4 ml-md-4">
                        <h2 class="ftco-heading-2">Посилання</h2>
                        <ul class="list-unstyled">
                            <li>
                                <a href="<?php echo ($page === 'landing') ? "#home-section" : "/landing/index/#home-section"; ?>">
                                    <span class="icon-long-arrow-right mr-2"></span>Головна
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo ($page === 'landing') ? "#about-section" : "/landing/index/#about-sectio"; ?>">
                                    <span class="icon-long-arrow-right mr-2"></span>Про нас
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo ($page === 'landing') ? "#services-section" : "/landing/index/#services-section"; ?>">
                                    <span class="icon-long-arrow-right mr-2"></span>Послуги
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo ($page === 'landing') ? "#projects-section" : "/landing/index/#projects-section"; ?>">
                                    <span class="icon-long-arrow-right mr-2"></span>Проекти
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo ($page === 'landing') ? "#contact-section" : "/landing/index/#contact-section"; ?>">
                                    <span class="icon-long-arrow-right mr-2"></span>Контакти
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Послуги</h2>
                        <ul class="list-unstyled">
                            <li>
                                <a href="/admin/clients" target="_blank">
                                    <span class="icon-long-arrow-right mr-2"></span>Веб дизайн
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <span class="icon-long-arrow-right mr-2"></span>Веб розробка
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <span class="icon-long-arrow-right mr-2"></span>Бізнес стратегія
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <span class="icon-long-arrow-right mr-2"></span>Аналіз даних
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <span class="icon-long-arrow-right mr-2"></span>Графічний дізайн
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Є питання?</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li>
                                    <span class="icon icon-map-marker"></span>
                                    <span class="text">25009, вул. Київська 52, Київ, Україна</span>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <span class="icon icon-phone"></span>
                                        <span class="text">+380 66 666-66-66</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <span class="icon icon-envelope"></span>
                                        <span class="text">yurii@sychov.pp.ua</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">

                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                    </div>
                </div>
            </div>
        </footer>

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen">
        <svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/>
        </svg>
    </div>

    <script src="<?php echo '/assets/themes/'.$this->config->item('theme').'/'; ?>js/jquery.min.js"></script>
    <script src="<?php echo '/assets/themes/'.$this->config->item('theme').'/'; ?>js/jquery-migrate-3.0.1.min.js"></script>
    <script src="<?php echo '/assets/themes/'.$this->config->item('theme').'/'; ?>js/popper.min.js"></script>
    <script src="<?php echo '/assets/themes/'.$this->config->item('theme').'/'; ?>js/bootstrap.min.js"></script>
    <script src="<?php echo '/assets/themes/'.$this->config->item('theme').'/'; ?>js/jquery.easing.1.3.js"></script>
    <script src="<?php echo '/assets/themes/'.$this->config->item('theme').'/'; ?>js/jquery.waypoints.min.js"></script>
    <script src="<?php echo '/assets/themes/'.$this->config->item('theme').'/'; ?>js/jquery.stellar.min.js"></script>
    <script src="<?php echo '/assets/themes/'.$this->config->item('theme').'/'; ?>js/owl.carousel.min.js"></script>
    <script src="<?php echo '/assets/themes/'.$this->config->item('theme').'/'; ?>js/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo '/assets/themes/'.$this->config->item('theme').'/'; ?>js/aos.js"></script>
    <script src="<?php echo '/assets/themes/'.$this->config->item('theme').'/'; ?>js/jquery.animateNumber.min.js"></script>
    <script src="<?php echo '/assets/themes/'.$this->config->item('theme').'/'; ?>js/scrollax.min.js"></script>

    <?php if ($page === 'landing'): ?>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVa49qcbXdZ3ngoYXGYEFdjYWoUOTTPdU&sensor=false"></script>
    <script src="<?php echo '/assets/themes/'.$this->config->item('theme').'/'; ?>js/google-map.js"></script>

    <?php endif; ?>

    <script src="<?php echo '/assets/themes/'.$this->config->item('theme').'/'; ?>js/main.js"></script>

    <script src="/assets/js/custom.js?<?php echo time(); ?>"></script>

</body>
</html>