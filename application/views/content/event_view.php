<div class="inner-page-banner-area" style="background-image: url('assets/img/banner/5.jpg');">
            <div class="container">
                <div class="pagination-area">
                    <h1>Our Upcoming Events</h1>
                    <ul>
                        <li><a href="#">Home</a> -</li>
                        <li>Events</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Inner Page Banner Area End Here -->
        <!-- Event Page Area Start Here -->
        <div class="event-page-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 col-lg-9 col-md-8 col-sm-12">
                        <div class="row event-inner-wrapper">
                        <?php foreach($events as $e):?>
                            <div class="col-xl-12 col-lg-6 col-md-12 col-sm-6">
                                <div class="single-item">
                                    <div class="item-img">
                                        <a href="#"><img src="<?php echo $e->img_url?>" alt="event" class="img-responsive"></a>
                                    </div>
                                    <div class="item-content">
                                        <h3 class="sidebar-title"><a href="#"><?php echo $e->title?></a></h3>
                                        <p><?php echo $e->description?></p>
                                        <ul class="event-info-block">
                                            <li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo date('j F, Y', strtotime($e->event_date))?></li>
                                            <li><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo $e->place?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach;?>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <ul class="pagination-center">
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                        <div class="sidebar">
                            <div class="sidebar-box">
                                <div class="sidebar-box-inner">
                                    <h3 class="sidebar-title">Search</h3>
                                    <div class="sidebar-find-course">
                                        <form id="checkout-form">
                                            <div class="form-group course-name">
                                                <input id="first-name" placeholder="Type Here . . .." class="form-control" type="text" />
                                            </div>
                                            <div class="form-group">
                                                <button class="sidebar-search-btn-full disabled" type="submit" value="Login">Search</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="sidebar-box">
                                <div class="sidebar-box-inner">
                                    <h3 class="sidebar-title">Categories</h3>
                                    <ul class="sidebar-categories">
                                        <li><a href="#">GMAT</a></li>
                                        <li><a href="#">IELTS</a></li>
                                        <li><a href="#">Regular MBA</a></li>
                                        <li><a href="#">BBA</a></li>
                                        <li><a href="#">CSE</a></li>
                                        <li><a href="#">Diploma</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sidebar-box">
                                <div class="sidebar-box-inner">
                                    <h3 class="sidebar-title">Popular Tags</h3>
                                    <ul class="product-tags">
                                        <li><a href="#">Education</a></li>
                                        <li><a href="#">Study</a></li>
                                        <li><a href="#">Class</a></li>
                                        <li><a href="#">Lecturers</a></li>
                                        <li><a href="#">Events</a></li>
                                        <li><a href="#">University</a></li>
                                        <li><a href="#">Date</a></li>
                                        <li><a href="#">Campus</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>