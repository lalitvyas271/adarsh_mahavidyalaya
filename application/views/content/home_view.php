
<div class="slider1-area overlay-default index1">
            <div class="bend niceties preview-1">
               
                <div id="ensign-nivoslider-3" class="slides">
                    <?php foreach($banners as  $key => $b): ?>
                        <img src="<?= $b->url?>" alt="slider" title="#slider-direction-<?php echo $key+1?>" />
                    <?php endforeach;?>
                </div>
                <?php foreach($banners as  $key => $b): ?>
                <div id="slider-direction-<?php echo $key+1?>" class="t-cn slider-direction">
                    <div class="slider-content s-tb slide-1">
                        <div class="title-container s-tb-c">
                            <div class="title1"><?php echo $b->title?></div>
                            <p><?php echo $b->title2?></p>
                            <div class="slider-btn-area">
                                <a href="#" class="default-big-btn">Start a Course</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
        <!-- Slider 1 Area End Here -->
        <!-- Service 1 Area Start Here -->
        <div class="service1-area">
            <div class="service1-inner-area">
                <div class="container">
                    <div class="row service1-wrapper">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 service-box1">
                            <div class="service-box-content">
                                <h3><a href="#">Scholarship Facility</a></h3>
                                <p>Eimply dummy text printing ypese tting industry.</p>
                            </div>
                            <div class="service-box-icon">
                                <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 service-box1">
                            <div class="service-box-content">
                                <h3><a href="#">Skilled Lecturers</a></h3>
                                <p>Eimply dummy text printing ypese tting industry.</p>
                            </div>
                            <div class="service-box-icon">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 service-box1">
                            <div class="service-box-content">
                                <h3><a href="#">Book Library & Store</a></h3>
                                <p>Eimply dummy text printing ypese tting industry.</p>
                            </div>
                            <div class="service-box-icon">
                                <i class="fa fa-book" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div><marquee direction="left" class="text-danger">Geeta Olympiyaad Geeta Olympiyaad Geeta Olympiyaad</marquee></div>
        <!-- Service 1 Area End Here -->
        <!-- About 1 Area Start Here -->
        <div class="about1-area">
            <div class="container">
                <h1 class="about-title wow fadeIn" data-wow-duration="1s" data-wow-delay=".2s">Welcome To Academics</h1>
                <p class="about-sub-title wow fadeIn" data-wow-duration="1s" data-wow-delay=".2s">Tmply dummy text of the printing and typesetting industry. Lorem Ipsum has been theindustry's standard dummy text ever since the 1500s, when an unknown printer took.</p>
                <div class="about-img-holder wow fadeIn" data-wow-duration="2s" data-wow-delay=".2s">
                    <img src="assets/img/about/1.jpg" alt="about" class="img-responsive" />
                </div>
            </div>
        </div>
        <!-- About 1 Area End Here -->
        <!-- Courses 1 Area Start Here -->
        <div class="courses1-area">
            <div class="container">
                <h2 class="title-default-left">Featured Courses</h2>
            </div>
            <div id="shadow-carousel" class="container">
                <div class="rc-carousel" data-loop="true" data-items="4" data-margin="20" data-autoplay="false" data-autoplay-timeout="10000" data-smart-speed="2000" data-dots="false" data-nav="true" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="true"
                    data-r-x-small-dots="false" data-r-x-medium="2" data-r-x-medium-nav="true" data-r-x-medium-dots="false" data-r-small="2" data-r-small-nav="true" data-r-small-dots="false" data-r-medium="3" data-r-medium-nav="true" data-r-medium-dots="false"
                    data-r-large="4" data-r-large-nav="true" data-r-large-dots="false">
                    <?php foreach($course as $c):?>
                    <div class="courses-box1">
                        <div class="single-item-wrapper">
                            <div class="courses-img-wrapper hvr-bounce-to-bottom">
                                <img class="img-responsive" src="<?php echo $c->image?>" alt="courses" style="width:270px; height:270px">
                                <a href="<?php echo BASE_URL .'course/detail/'. base64_encode($c->id)?>"><i class="fa fa-link" aria-hidden="true"></i></a>
                            </div>
                            <div class="courses-content-wrapper">
                                <h3 class="item-title"><a href="<?php echo BASE_URL .'course/detail/'. base64_encode($c->id)?>"><?php echo $c->title?></a></h3>
                                <p class="item-content"><?php echo $c->description?></p>
                                <ul class="courses-info">
                                    <li>1 Year
                                        <br><span> Course</span></li>
                                    <li>40
                                        <br><span> Classes</span></li>
                                    <li>10 am - 11 am
                                        <br><span> Classes</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
        <!-- Courses 1 Area End Here -->
        <!-- Video Area Start Here -->
        
        <div class="video-area overlay-video bg-common-style" style="background-image: url('assets/img/banner/1.jpg');">
            <div class="container">
                <div class="video-content">
                    <h2 class="video-title">Watch Campus Life Video Tour</h2>
                    <p class="video-sub-title">Vmply dummy text of the printing and typesetting industryorem
                        <br>Ipsum industry's standard dum an unknowramble.</p>
                    <a class="play-btn popup-youtube wow bounceInUp" data-wow-duration="2s" data-wow-delay=".1s" href="http://www.youtube.com/watch?v=1iIZeIy7TqM"><i class="fa fa-play" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
       
        <!-- Video Area End Here -->
        <!-- Lecturers Area Start Here -->
        <div class="lecturers-area">
            <div class="container">
                <h2 class="title-default-left">Our Skilled Lecturers</h2>
            </div>
            <div class="container">
                <div class="rc-carousel" data-loop="true" data-items="4" data-margin="30" data-autoplay="false" data-autoplay-timeout="10000" data-smart-speed="2000" data-dots="false" data-nav="true" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="true"
                    data-r-x-small-dots="false" data-r-x-medium="2" data-r-x-medium-nav="true" data-r-x-medium-dots="false" data-r-small="3" data-r-small-nav="true" data-r-small-dots="false" data-r-medium="4" data-r-medium-nav="true" data-r-medium-dots="false"
                    data-r-large="4" data-r-large-nav="true" data-r-large-dots="false">
                    <?php foreach($teacher as $t) :?>
                    <div class="single-item">
                        <div class="lecturers1-item-wrapper">
                            <div class="lecturers-img-wrapper">
                                <a href="#"><img style="height:343px" src="<?php echo $t->image?>" alt="team"></a>
                            </div>
                            <div class="lecturers-content-wrapper">
                                <h3 class="item-title"><a href="#"><?php echo $t->name?></a></h3>
                                <span class="item-designation"><?php echo $t->post?></span>
                                <ul class="lecturers-social">
                                    <li><a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                     
                </div>
            </div>
        </div>
        <!-- Lecturers Area End Here -->
        <!-- News and Event Area Start Here -->
        <div class="news-event-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 news-inner-area">
                        <h2 class="title-default-left">Latest News</h2>
                        <ul class="news-wrapper">
                            <li>
                                <div class="news-img-holder">
                                    <a href="#"><img src="assets/img/news/1.jpg" class="img-responsive" alt="news"></a>
                                </div>
                                <div class="news-content-holder">
                                    <h3><a href="single-news.html">Summer Course Start From 1st June</a></h3>
                                    <div class="post-date">June 15, 2017</div>
                                    <p>Pellentese turpis dignissim amet area ducation process facilitating Knowledge.</p>
                                </div>
                            </li>
                            <li>
                                <div class="news-img-holder">
                                    <a href="#"><img src="assets/img/news/2.jpg" class="img-responsive" alt="news"></a>
                                </div>
                                <div class="news-content-holder">
                                    <h3><a href="single-news.html">Guest Interview will Occur Soon</a></h3>
                                    <div class="post-date">June 15, 2017</div>
                                    <p>Pellentese turpis dignissim amet area ducation process facilitating Knowledge.</p>
                                </div>
                            </li>
                            <li>
                                <div class="news-img-holder">
                                    <a href="#"><img src="assets/img/news/3.jpg" class="img-responsive" alt="news"></a>
                                </div>
                                <div class="news-content-holder">
                                    <h3><a href="single-news.html">Easy English Learning Way</a></h3>
                                    <div class="post-date">June 15, 2017</div>
                                    <p>Pellentese turpis dignissim amet area ducation process facilitating Knowledge.</p>
                                </div>
                            </li>
                        </ul>
                        <div class="news-btn-holder">
                            <a href="#" class="view-all-accent-btn">View All</a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 event-inner-area">
                        <h2 class="title-default-left">Upcoming Events</h2>
                        <ul class="event-wrapper">
                            <li class="wow bounceInUp" data-wow-duration="2s" data-wow-delay=".1s">
                                <div class="event-calender-wrapper">
                                    <div class="event-calender-holder">
                                        <h3>26</h3>
                                        <p>Jan</p>
                                        <span>2017</span>
                                    </div>
                                </div>
                                <div class="event-content-holder">
                                    <h3><a href="single-event.html">Html MeetUp Conference 2017</a></h3>
                                    <p>Pellentese turpis dignissim amet area ducation process facilitating Knowledge. Pellentese turpis dignissim amet area ducation process facilitating Knowledge. Pellentese turpis dignissim amet area ducation.</p>
                                    <ul>
                                        <li>04:00 PM - 06:00 PM</li>
                                        <li>Australia , Melborn</li>
                                    </ul>
                                </div>
                            </li>
                            <li class="wow bounceInUp" data-wow-duration="2s" data-wow-delay=".3s">
                                <div class="event-calender-wrapper">
                                    <div class="event-calender-holder">
                                        <h3>26</h3>
                                        <p>Jan</p>
                                        <span>2017</span>
                                    </div>
                                </div>
                                <div class="event-content-holder">
                                    <h3><a href="single-event.html">Workshop On UI Design</a></h3>
                                    <p>Pellentese turpis dignissim amet area ducation process facilitating Knowledge. Pellentese turpis dignissim amet area ducation process facilitating Knowledge. Pellentese turpis dignissim amet area ducation.</p>
                                    <ul>
                                        <li>03:00 PM - 05:00 PM</li>
                                        <li>Australia , Melborn</li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                        <div class="event-btn-holder">
                            <a href="#" class="view-all-primary-btn">View All</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- News and Event Area End Here -->
        <!-- Counter Area Start Here -->
        <div class="counter-area bg-primary-deep" style="background-image: url('assets/img/banner/4.jpg');">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 counter1-box wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".20s">
                        <h2 class="about-counter title-bar-counter" data-num="80">80</h2>
                        <p>PROFESSIONAL TEACHER</p>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 counter1-box wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".40s">
                        <h2 class="about-counter title-bar-counter" data-num="20">20</h2>
                        <p>NEWS COURSES EVERY YEARS</p>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 counter1-box wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".60s">
                        <h2 class="about-counter title-bar-counter" data-num="56">56</h2>
                        <p>NEWS COURSES EVERY YEARS</p>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 counter1-box wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".80s">
                        <h2 class="about-counter title-bar-counter" data-num="77">77</h2>
                        <p>REGISTERED STUDENTS</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Counter Area End Here -->
        <!-- Students Say Area Start Here -->
        <div class="students-say-area">
            <h2 class="title-default-center">What Our Students Say</h2>
            <div class="container">
                <div class="rc-carousel" data-loop="true" data-items="2" data-margin="30" data-autoplay="false" data-autoplay-timeout="10000" data-smart-speed="2000" data-dots="true" data-nav="false" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="false"
                    data-r-x-small-dots="true" data-r-x-medium="2" data-r-x-medium-nav="false" data-r-x-medium-dots="true" data-r-small="2" data-r-small-nav="false" data-r-small-dots="true" data-r-medium="2" data-r-medium-nav="false" data-r-medium-dots="true"
                    data-r-large="2" data-r-large-nav="false" data-r-large-dots="true">
                    <?php foreach($students as $s):?>
                    <div class="single-item">
                        <div class="single-item-wrapper">
                            <div class="profile-img-wrapper">
                                <a href="#" class="profile-img"><img class="profile-img-responsive img-circle" src="<?php echo $s->image?>" style="width:70px" alt="Testimonial"></a>
                            </div>
                            <div class="tlp-tm-content-wrapper">
                                <h3 class="item-title"><a href="#"><?php echo $s->name?></a></h3>
                                <span class="item-designation"><?php echo $s->class?></span>
                                <ul class="rating-wrapper">
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                </ul>
                                <div class="item-content"><?php echo $s->description?></div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
        <!-- Students Say Area End Here -->
        <!-- Students Join 1 Area Start Here -->
        <div class="students-join1-area">
            <div class="container">
                <div class="students-join1-wrapper">
                    <div class="students-join1-left">
                        <div id="ri-grid" class="author-banner-bg ri-grid header text-center">
                            <ul class="ri-grid-list">
                                <li>
                                    <a href="#"><img src="assets/img/students/priyanshu.png" style="width:70px" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="assets/img/students/durgesh.jpg" style="width:70px" alt=""></a>
                                </li>
                               
                            </ul>
                        </div>
                    </div>
                    <div class="students-join1-right">
                        <div>
                            <h2>Join<span> 29,12,093</span> Students.</h2>
                            <a href="#" class="join-now-btn">Join Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Students Join 1 Area End Here -->
        <!-- Brand Area Start Here -->
        <div class="brand-area">
            <div class="container">
                <div class="rc-carousel" data-loop="true" data-items="4" data-margin="30" data-autoplay="true" data-autoplay-timeout="5000" data-smart-speed="2000" data-dots="false" data-nav="false" data-nav-speed="false" data-r-x-small="2" data-r-x-small-nav="false"
                    data-r-x-small-dots="false" data-r-x-medium="3" data-r-x-medium-nav="false" data-r-x-medium-dots="false" data-r-small="4" data-r-small-nav="false" data-r-small-dots="false" data-r-medium="4" data-r-medium-nav="false" data-r-medium-dots="false"
                    data-r-large="4" data-r-large-nav="false" data-r-large-dots="false">
                    <div class="brand-area-box">
                        <a href="#"><img src="assets/img/brand/1.jpg" alt="brand"></a>
                    </div>
                    <div class="brand-area-box">
                    </div>
                    <div class="brand-area-box">
                        <a href="#"><img src="assets/img/brand/3.jpg" alt="brand"></a>
                    </div>
                    <div class="brand-area-box">
                        <a href="#"><img src="assets/img/brand/4.jpg" alt="brand"></a>
                    </div>
                    <div class="brand-area-box">
                        <a href="#"><img src="assets/img/brand/1.jpg" alt="brand"></a>
                    </div>
                    <div class="brand-area-box">
                        <a href="#"><img src="assets/img/brand/2.jpg" alt="brand"></a>
                    </div>
                    <div class="brand-area-box">
                        <a href="#"><img src="assets/img/brand/3.jpg" alt="brand"></a>
                    </div>
                    <div class="brand-area-box">
                        <a href="#"><img src="assets/img/brand/4.jpg" alt="brand"></a>
                    </div>
                </div>
            </div>
        </div>