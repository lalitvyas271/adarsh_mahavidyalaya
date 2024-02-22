<div class="inner-page-banner-area" style="background-image: url('assets/img/banner/5.jpg');">
            <div class="container">
                <div class="pagination-area">
                    <h1>News_02</h1>
                    <ul>
                        <li><a href="#">Home</a> -</li>
                        <li>News</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Inner Page Banner Area End Here -->
        <!-- News Page Area Start Here -->
        <div class="news-page-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 col-lg-9 col-md-8 col-sm-12">
                        <div class="row">
                        <?php foreach($news as $n):?>
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                <div class="news-box">
                                    <div class="news-img-holder">
                                        <img src="<?php echo $n->img_url?>" class="img-responsive" alt="research">
                                        <ul class="news-date2">
                                            <li><?php echo date( 'D, j', strtotime($n->event_date))?></li>
                                            <li><?php echo date('Y', strtotime($n->event_date))?></li>
                                        </ul>
                                    </div>
                                    <h3 class="title-news-left-bold"><a href="#"><?php echo $n->title?></a></h3>
                                    <!-- <ul class="title-bar-high news-comments">
                                        <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i><span>By</span> Admin</a></li>
                                        <li><a href="#"><i class="fa fa-tags" aria-hidden="true"></i>Business</a></li>
                                        <li><a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i><span>(03)</span> Comments</a></li>
                                    </ul> -->
                                    <p><?php echo $n->description?></p>
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
                                    <h3 class="sidebar-title">Latest Posts</h3>
                                    <div class="sidebar-latest-research-area">
                                        <ul>
                                            <li>
                                                <div class="latest-research-img">
                                                    <a href="#"><img src="assets/img/sidebar/8.jpg" class="img-responsive" alt="skilled"></a>
                                                </div>
                                                <div class="latest-research-content">
                                                    <h4>30 Nov, 2016</h4>
                                                    <p>when an unknown printer took.</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="latest-research-img">
                                                    <a href="#"><img src="assets/img/sidebar/4.jpg" class="img-responsive" alt="skilled"></a>
                                                </div>
                                                <div class="latest-research-content">
                                                    <h4>10 Aug, 2016</h4>
                                                    <p>when an unknown printer took.</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="latest-research-img">
                                                    <a href="#"><img src="assets/img/sidebar/9.jpg" class="img-responsive" alt="skilled"></a>
                                                </div>
                                                <div class="latest-research-content">
                                                    <h4>05 Jul, 2016</h4>
                                                    <p>when an unknown printer took.</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="latest-research-img">
                                                    <a href="#"><img src="assets/img/sidebar/10.jpg" class="img-responsive" alt="skilled"></a>
                                                </div>
                                                <div class="latest-research-content">
                                                    <h4>30 Feb, 2016</h4>
                                                    <p>when an unknown printer took.</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
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