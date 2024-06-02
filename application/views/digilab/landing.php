<?php

/**
 * Developer: Yurii Sychov
 * Site: http://sychov.pp.ua
 * Email: yurii@sychov.pp.ua
 */

defined('BASEPATH') OR exit('No direct script access allowed');
?>

<section id="home-section" class="hero">
    <h3 class="vr">Welcome to SychovLab</h3>
    <div class="home-slider js-fullheight owl-carousel">
        <div class="slider-item js-fullheight">
            <div class="overlay"></div>
            <div class="container-fluid p-0">
                <div class="row d-md-flex no-gutters slider-text js-fullheight align-items-center justify-content-end" data-scrollax-parent="true">
                    <div class="one-third order-md-last img js-fullheight" style="background-image:url('<?php echo '/assets/themes/'.$this->config->item('theme').'/'; ?>images/bg_1.jpg');">
                        <div class="overlay"></div>
                    </div>
                    <div class="one-forth d-flex js-fullheight align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                        <div class="text">
                            <span class="subheading">Welcome to the sychovlab($params)</span>
                            <h1 class="mb-4 mt-3">Small Details Make A Big <span>Impression</span></h1>
                            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country.</p>

                            <p><a href="javascript:void(0);" class="btn btn-primary px-5 py-3 mt-3">Get in touch</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="slider-item js-fullheight">
            <div class="overlay"></div>
            <div class="container-fluid p-0">
                <div class="row d-flex no-gutters slider-text js-fullheight align-items-center justify-content-end" data-scrollax-parent="true">
                    <div class="one-third order-md-last img js-fullheight" style="background-image:url('<?php echo '/assets/themes/'.$this->config->item('theme').'/'; ?>images/bg_2.jpg');">
                        <div class="overlay"></div>
                    </div>
                    <div class="one-forth d-flex js-fullheight align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                        <div class="text">
                            <span class="subheading">Welcome to the sychovlab($params)</span>
                            <h1 class="mb-4 mt-3"><span>Strategic</span> Design And <span>Technology</span> Agency</h1>
                            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country.</p>

                            <p><a href="javascript:void(0);" class="btn btn-primary px-5 py-3 mt-3">Get in touch</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-no-pb ftco-no-pt ftco-services bg-light" id="services-section">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-4 ftco-animate py-5 nav-link-wrap">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <?php foreach($services as $service): ?>
                        <a class="nav-link px-4 <?php echo $service->active ? 'active' : null; ?>" id="v-pills-<?php echo $service->id; ?>-tab" data-toggle="pill" href="#v-pills-<?php echo $service->id; ?>" role="tab" aria-controls="v-pills-<?php echo $service->id; ?>" aria-selected="true"><span class="mr-3 <?php echo $service->icon; ?>"></span> <?php echo $service->name; ?></a>
                    <?php endforeach; ?>
                    <!-- <a class="nav-link px-4 active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true"><span class="mr-3 flaticon-ideas"></span> Business Strategy</a> -->

                    <!-- <a class="nav-link px-4" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false"><span class="mr-3 flaticon-flasks"></span> Research</a> -->

                    <!-- <a class="nav-link px-4" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false"><span class="mr-3 flaticon-analysis"></span> Data Analysis</a> -->

                    <!-- <a class="nav-link px-4" id="v-pills-4-tab" data-toggle="pill" href="#v-pills-4" role="tab" aria-controls="v-pills-4" aria-selected="false"><span class="mr-3 flaticon-web-design"></span> UI Design</a> -->

                    <!-- <a class="nav-link px-4" id="v-pills-4-tab" data-toggle="pill" href="#v-pills-4" role="tab" aria-controls="v-pills-4" aria-selected="false"><span class="mr-3 flaticon-ux-design"></span> Ux Design</a> -->

                    <!-- <a class="nav-link px-4" id="v-pills-5-tab" data-toggle="pill" href="#v-pills-5" role="tab" aria-controls="v-pills-5" aria-selected="false"><span class="mr-3 flaticon-innovation"></span> Technology</a> -->

                    <!-- <a class="nav-link px-4" id="v-pills-6-tab" data-toggle="pill" href="#v-pills-6" role="tab" aria-controls="v-pills-6" aria-selected="false"><span class="mr-3 flaticon-idea"></span> Creative</a> -->
                </div>
            </div>
            <div class="col-md-8 ftco-animate p-4 p-md-5 d-flex align-items-center">

                <div class="tab-content pl-md-5" id="v-pills-tabContent">
                    <?php foreach($services as $service): ?>
                        <div class="tab-pane fade show <?php echo $service->active ? 'active' : null; ?> py-5" id="v-pills-<?php echo $service->id; ?>" role="tabpanel" aria-labelledby="v-pills-<?php echo $service->id; ?>-tab">
                            <span class="icon mb-3 d-block <?php echo $service->icon; ?>"></span>
                            <h2 class="mb-4"><?php echo $service->name; ?></h2>
                            <p><?php echo $service->description; ?></p>
                            <p><a href="javascript:void(0);" class="btn btn-primary px-4 py-3">Learn More</a></p>
                        </div>
                    <?php endforeach; ?>

                    <!-- <div class="tab-pane fade show active py-5" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab">
                        <span class="icon mb-3 d-block flaticon-ideas"></span>
                        <h2 class="mb-4">Business Strategy</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt voluptate, quibusdam sunt iste dolores consequatur</p>
                        <p>Inventore fugit error iure nisi reiciendis fugiat illo pariatur quam sequi quod iusto facilis officiis nobis sit quis molestias asperiores rem, blanditiis! Commodi exercitationem vitae deserunt qui nihil ea, tempore et quam natus quaerat doloremque.</p>
                        <p><a href="javascript:void(0);" class="btn btn-primary px-4 py-3">Learn More</a></p>
                    </div> -->

                    <!-- <div class="tab-pane fade py-5" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab">
                        <span class="icon mb-3 d-block flaticon-flasks"></span>
                        <h2 class="mb-4">Research</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt voluptate, quibusdam sunt iste dolores consequatur</p>
                        <p>Inventore fugit error iure nisi reiciendis fugiat illo pariatur quam sequi quod iusto facilis officiis nobis sit quis molestias asperiores rem, blanditiis! Commodi exercitationem vitae deserunt qui nihil ea, tempore et quam natus quaerat doloremque.</p>
                        <p><a href="javascript:void(0);" class="btn btn-primary px-4 py-3">Learn More</a></p>
                    </div> -->

                    <!-- <div class="tab-pane fade py-5" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-3-tab">
                        <span class="icon mb-3 d-block flaticon-analysis"></span>
                        <h2 class="mb-4">Data Analysis</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt voluptate, quibusdam sunt iste dolores consequatur</p>
                        <p>Inventore fugit error iure nisi reiciendis fugiat illo pariatur quam sequi quod iusto facilis officiis nobis sit quis molestias asperiores rem, blanditiis! Commodi exercitationem vitae deserunt qui nihil ea, tempore et quam natus quaerat doloremque.</p>
                        <p><a href="javascript:void(0);" class="btn btn-primary px-4 py-3">Learn More</a></p>
                    </div> -->

                    <!-- <div class="tab-pane fade py-5" id="v-pills-4" role="tabpanel" aria-labelledby="v-pills-4-tab">
                        <span class="icon mb-3 d-block flaticon-web-design"></span>
                        <h2 class="mb-4">UI Design</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt voluptate, quibusdam sunt iste dolores consequatur</p>
                        <p>Inventore fugit error iure nisi reiciendis fugiat illo pariatur quam sequi quod iusto facilis officiis nobis sit quis molestias asperiores rem, blanditiis! Commodi exercitationem vitae deserunt qui nihil ea, tempore et quam natus quaerat doloremque.</p>
                        <p><a href="javascript:void(0);" class="btn btn-primary px-4 py-3">Learn More</a></p>
                    </div> -->

                    <!-- <div class="tab-pane fade py-5" id="v-pills-4" role="tabpanel" aria-labelledby="v-pills-4-tab">
                        <span class="icon mb-3 d-block flaticon-ux-design"></span>
                        <h2 class="mb-4">Ux Design</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt voluptate, quibusdam sunt iste dolores consequatur</p>
                        <p>Inventore fugit error iure nisi reiciendis fugiat illo pariatur quam sequi quod iusto facilis officiis nobis sit quis molestias asperiores rem, blanditiis! Commodi exercitationem vitae deserunt qui nihil ea, tempore et quam natus quaerat doloremque.</p>
                        <p><a href="javascript:void(0);" class="btn btn-primary px-4 py-3">Learn More</a></p>
                    </div> -->

                    <!-- <div class="tab-pane fade py-5" id="v-pills-5" role="tabpanel" aria-labelledby="v-pills-5-tab">
                        <span class="icon mb-3 d-block flaticon-innovation"></span>
                        <h2 class="mb-4">Technology</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt voluptate, quibusdam sunt iste dolores consequatur</p>
                        <p>Inventore fugit error iure nisi reiciendis fugiat illo pariatur quam sequi quod iusto facilis officiis nobis sit quis molestias asperiores rem, blanditiis! Commodi exercitationem vitae deserunt qui nihil ea, tempore et quam natus quaerat doloremque.</p>
                        <p><a href="javascript:void(0);" class="btn btn-primary px-4 py-3">Learn More</a></p>
                    </div> -->

                    <!-- <div class="tab-pane fade py-5" id="v-pills-6" role="tabpanel" aria-labelledby="v-pills-6-tab">
                        <span class="icon mb-3 d-block flaticon-idea"></span>
                        <h2 class="mb-4">Creative Solution</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt voluptate, quibusdam sunt iste dolores consequatur</p>
                        <p>Inventore fugit error iure nisi reiciendis fugiat illo pariatur quam sequi quod iusto facilis officiis nobis sit quis molestias asperiores rem, blanditiis! Commodi exercitationem vitae deserunt qui nihil ea, tempore et quam natus quaerat doloremque.</p>
                        <p><a href="javascript:void(0);" class="btn btn-primary px-4 py-3">Learn More</a></p>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section-2 img" style="background-image: url('<?php echo '/assets/themes/'.$this->config->item('theme').'/'; ?>images/bg_3.jpg');">
    <div class="container">
        <div class="row d-md-flex justify-content-end">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <a href="javascript:void(0);" class="services-wrap ftco-animate">
                            <div class="icon d-flex justify-content-center align-items-center">
                                <span class="ion-ios-arrow-back"></span>
                                <span class="ion-ios-arrow-forward"></span>
                            </div>
                            <h2>Market Research</h2>
                            <p>Even the all-powerful Pointing has no control about the blind.</p>
                        </a>
                        <a href="javascript:void(0);" class="services-wrap ftco-animate">
                            <div class="icon d-flex justify-content-center align-items-center">
                                <span class="ion-ios-arrow-back"></span>
                                <span class="ion-ios-arrow-forward"></span>
                            </div>
                            <h2>Financial Services</h2>
                            <p>Even the all-powerful Pointing has no control about the blind.</p>
                        </a>
                        <a href="javascript:void(0);" class="services-wrap ftco-animate">
                            <div class="icon d-flex justify-content-center align-items-center">
                                <span class="ion-ios-arrow-back"></span>
                                <span class="ion-ios-arrow-forward"></span>
                            </div>
                            <h2>Online Marketing</h2>
                            <p>Even the all-powerful Pointing has no control about the blind.</p>
                        </a>
                        <a href="javascript:void(0);" class="services-wrap ftco-animate">
                            <div class="icon d-flex justify-content-center align-items-center">
                                <span class="ion-ios-arrow-back"></span>
                                <span class="ion-ios-arrow-forward"></span>
                            </div>
                            <h2>24/7 Help &amp; Support</h2>
                            <p>Even the all-powerful Pointing has no control about the blind.</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-project bg-light" id="projects-section">
    <div class="container px-md-5">
        <div class="row justify-content-center pb-5">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">Accomplishments</span>
                <h2 class="mb-4">Completed Projects</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 testimonial">
                <div class="carousel-project owl-carousel">
                    <div class="item">
                        <div class="project">
                            <div class="img">
                                <img src="<?php echo '/assets/themes/'.$this->config->item('theme').'/'; ?>images/project-1.jpg" class="img-fluid" alt="Colorlib Template">
                                <div class="text px-4">
                                    <h3><a href="javascript:void(0);">Work Name</a></h3>
                                    <span>Web Design</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="project">
                            <div class="img">
                                <img src="<?php echo '/assets/themes/'.$this->config->item('theme').'/'; ?>images/project-2.jpg" class="img-fluid" alt="Colorlib Template">
                                <div class="text px-4">
                                    <h3><a href="javascript:void(0);">Work Name</a></h3>
                                    <span>Web Design</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="project">
                            <div class="img">
                                <img src="<?php echo '/assets/themes/'.$this->config->item('theme').'/'; ?>images/project-3.jpg" class="img-fluid" alt="Colorlib Template">
                                <div class="text px-4">
                                    <h3><a href="javascript:void(0);">Work Name</a></h3>
                                    <span>Web Design</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="project">
                            <div class="img">
                                <img src="<?php echo '/assets/themes/'.$this->config->item('theme').'/'; ?>images/project-4.jpg" class="img-fluid" alt="Colorlib Template">
                                <div class="text px-4">
                                    <h3><a href="javascript:void(0);">Work Name</a></h3>
                                    <span>Web Design</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="project">
                            <div class="img">
                                <img src="<?php echo '/assets/themes/'.$this->config->item('theme').'/'; ?>images/project-5.jpg" class="img-fluid" alt="Colorlib Template">
                                <div class="text px-4">
                                    <h3><a href="javascript:void(0);">Work Name</a></h3>
                                    <span>Web Design</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="project">
                            <div class="img">
                                <img src="<?php echo '/assets/themes/'.$this->config->item('theme').'/'; ?>images/project-6.jpg" class="img-fluid" alt="Colorlib Template">
                                <div class="text px-4">
                                    <h3><a href="javascript:void(0);">Work Name</a></h3>
                                    <span>Web Design</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-counter img ftco-section ftco-no-pt ftco-no-pb" id="about-section">
    <div class="container">
        <div class="row d-flex">
            <div class="col-md-6 col-lg-5 d-flex">
                <div class="img d-flex align-self-stretch align-items-center" style="background-image:url('<?php echo '/assets/themes/'.$this->config->item('theme').'/'; ?>images/about.jpg');">
                </div>
            </div>
            <div class="col-md-6 col-lg-7 pl-lg-5 py-5">
                <div class="py-md-5">
                    <div class="row justify-content-start pb-3">
                        <div class="col-md-12 heading-section ftco-animate">
                            <span class="subheading">Welcome to sychovlab</span>
                            <h2 class="mb-4" style="font-size: 34px; text-transform: capitalize;">We Are Digital Agency</h2>
                            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
                            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                        </div>
                    </div>
                    <div class="counter-wrap ftco-animate d-flex mt-md-3">
                        <div class="text p-4 bg-primary">
                            <p class="mb-0">
                                <span class="number" data-number="10">0</span>
                                <span>Years of experience</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center pb-5">
            <div class="col-md-6 heading-section text-center ftco-animate">
                <span class="subheading">About Us</span>
                <h2 class="mb-4">Our Staff</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
            </div>
        </div>
        <div class="row">
            <?php foreach($employees as $row): ?>
            <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="staff">
                    <div class="img-wrap d-flex align-items-stretch">
                        <div class="img align-self-stretch" style="background-image: url('<?php echo $row->image ? '/assets/admin/uploads/employees/'.$row->image : '/assets/themes/'.$this->config->item('theme').'/images/staff-1.jpg'; ?>');"></div>
                    </div>
                    <div class="text d-flex align-items-center pt-3 text-center">
                        <div>
                            <h3 class="mb-2"><?php echo $row->name. " " .$row->surname; ?></h3>
                            <span class="position mb-4"><?php echo $row->profession ? $row->profession : "Profession not defined"; ?></span>
                            <div class="faded">
                                <ul class="ftco-social text-center">
                                    <li class="ftco-animate"><a href="<?php echo $row->twitter ? $row->twitter : 'javascript:void(0);' ?>" target="_blank"><span class="icon-twitter"></span></a></li>
                                    <li class="ftco-animate"><a href="<?php echo $row->facebook ? $row->facebook : 'javascript:void(0);' ?>" target="_blank"><span class="icon-facebook"></span></a></li>
                                    <li class="ftco-animate"><a href="<?php echo $row->google ? $row->google : 'javascript:void(0);' ?>" target="_blank"><span class="icon-google-plus"></span></a></li>
                                    <li class="ftco-animate"><a href="<?php echo $row->instagram ? $row->instagram : 'javascript:void(0);' ?>" target="_blank"><span class="icon-instagram"></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="ftco-section testimony-section" id="testimony-section">
    <div class="container">
        <div class="row justify-content-center pb-3">
            <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
                <h2 class="mb-4">Happy Clients</h2>
            </div>
        </div>
        <div class="row ftco-animate justify-content-center">
            <div class="col-md-12">
                <div class="carousel-testimony owl-carousel ftco-owl">
                    <?php foreach($clients as $row): ?>
                    <div class="item">
                        <div class="testimony-wrap text-center py-4 pb-5">
                            <div class="user-img" style="background-image: url('<?php echo $row->image ? '/assets/admin/uploads/clients/'.$row->image : '/assets/themes/'.$this->config->item('theme').'/images/person_1.jpg'; ?>');">
                                <span class="quote d-flex align-items-center justify-content-center">
                                    <i class="icon-quote-left"></i>
                                </span>
                            </div>
                            <div class="text px-4 pb-5">
                                <p class="mb-4"><?php echo $row->feedback ? $row->feedback : "Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts."; ?></p>
                                <p class="name"><?php echo $row->name. " " .$row->surname; ?></p>
                                <span class="position"><?php echo $row->profession ? $row->profession : "Profession not defined"; ?></span>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light" id="blog-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-5">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Blog</span>
                <h2 class="mb-4">Our Blog</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
            </div>
        </div>
        <div class="row d-flex">
            <div class="col-md-4 d-flex ftco-animate">
                <div class="blog-entry justify-content-end">
                    <a href="/blog/1" class="block-20" style="background-image: url('<?php echo '/assets/themes/'.$this->config->item('theme').'/'; ?>images/image_1.jpg');">
                    </a>
                    <div class="text mt-3 float-right d-block">
                        <div class="d-flex align-items-center pt-2 mb-4 topp">
                            <div class="one mr-2">
                                <span class="day">12</span>
                            </div>
                            <div class="two">
                                <span class="yr">2019</span>
                                <span class="mos">March</span>
                            </div>
                        </div>
                        <h3 class="heading"><a href="/blog/1">Why Lead Generation is Key for Business Growth</a></h3>
                        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                        <div class="d-flex align-items-center mt-4 meta">
                            <p class="mb-0"><a href="/blog/1" class="btn btn-primary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>
                            <p class="ml-auto mb-0">
                                <a href="javascript:void(0);" class="mr-2">Admin</a>
                                <a href="javascript:void(0);" class="meta-chat"><span class="icon-chat"></span> 3</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex ftco-animate">
                <div class="blog-entry justify-content-end">
                    <a href="/blog/1" class="block-20" style="background-image: url('<?php echo '/assets/themes/'.$this->config->item('theme').'/'; ?>images/image_2.jpg');">
                    </a>
                    <div class="text mt-3 float-right d-block">
                        <div class="d-flex align-items-center pt-2 mb-4 topp">
                            <div class="one mr-2">
                                <span class="day">10</span>
                            </div>
                            <div class="two">
                                <span class="yr">2019</span>
                                <span class="mos">March</span>
                            </div>
                        </div>
                        <h3 class="heading"><a href="/blog/1">Why Lead Generation is Key for Business Growth</a></h3>
                        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                        <div class="d-flex align-items-center mt-4 meta">
                            <p class="mb-0"><a href="/blog/1" class="btn btn-primary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>
                            <p class="ml-auto mb-0">
                                <a href="javascript:void(0);" class="mr-2">Admin</a>
                                <a href="javascript:void(0);" class="meta-chat"><span class="icon-chat"></span> 3</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex ftco-animate">
                <div class="blog-entry">
                    <a href="/blog/1" class="block-20" style="background-image: url('<?php echo '/assets/themes/'.$this->config->item('theme').'/'; ?>images/image_3.jpg');">
                    </a>
                    <div class="text mt-3 float-right d-block">
                        <div class="d-flex align-items-center pt-2 mb-4 topp">
                            <div class="one mr-2">
                                <span class="day">05</span>
                            </div>
                            <div class="two">
                                <span class="yr">2019</span>
                                <span class="mos">March</span>
                            </div>
                        </div>
                        <h3 class="heading"><a href="/blog/1">Why Lead Generation is Key for Business Growth</a></h3>
                        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                        <div class="d-flex align-items-center mt-4 meta">
                            <p class="mb-0"><a href="/blog/1" class="btn btn-primary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>
                            <p class="ml-auto mb-0">
                                <a href="javascript:void(0);" class="mr-2">Admin</a>
                                <a href="javascript:void(0);" class="meta-chat"><span class="icon-chat"></span> 3</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section contact-section ftco-no-pb" id="contact-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Contact</span>
                <h2 class="mb-4">Contact Us</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
            </div>
        </div>
        <div class="row d-flex contact-info mb-5">
            <div class="col-md-6 col-lg-3 d-flex ftco-animate">
                <div class="align-self-stretch box p-4 text-center">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="icon-map-signs"></span>
                    </div>
                    <h3 class="mb-4">Address</h3>
                    <p>25009, Kyivska street 5, Kyiv, Ukraine</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 d-flex ftco-animate">
                <div class="align-self-stretch box p-4 text-center">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="icon-phone2"></span>
                    </div>
                    <h3 class="mb-4">Contact Number</h3>
                    <p><a href="tel://380666666666">+ 380 66 666-66-66</a></p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 d-flex ftco-animate">
                <div class="align-self-stretch box p-4 text-center">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="icon-paper-plane"></span>
                    </div>
                    <h3 class="mb-4">Email Address</h3>
                    <p><a href="mailto:yurii@sychov.pp.ua">yurii@sychov.pp.ua</a></p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 d-flex ftco-animate">
                <div class="align-self-stretch box p-4 text-center">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="icon-globe"></span>
                    </div>
                    <h3 class="mb-4">Website</h3>
                    <p><a href="http://sychov.pp.ua">sychov.pp.ua</a></p>
                </div>
            </div>
        </div>
        <div class="row no-gutters block-9">
            <div class="col-md-6 order-md-last d-flex">
                <form action="/landing/send_message" method="POST" class="bg-light p-5 contact-form" id="FormSendMessage">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Your Name" name="name" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Your Email" name="email" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Subject" name="subject" required>
                    </div>
                    <div class="form-group">
                        <textarea cols="30" rows="7" class="form-control" placeholder="Message" name="message" required></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5" onClick="sendMessage(event)">
                    </div>
                </form>

            </div>

            <div class="col-md-6 d-flex">
                <div id="map" class="bg-white"></div>
            </div>
        </div>
    </div>
</section>