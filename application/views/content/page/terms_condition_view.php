<!-- <?php //$role_id=$this->session->userdata("auth")["user"]["role_id"];?> -->
<div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-heading">
                <h1 class="page-title">Terms and Conditions</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?php echo BASE_URL?>dashboard"><i class="la la-home font-20"></i></a>
                    </li>
                    <li class="breadcrumb-item">Terms and Conditions</li>
                </ol>
                
                <div class="top-add-btn">
                    <a href="<?php echo BASE_URL?>edit-terms-condition"><button class="btn btn-theme ">Edit</button></a>
                </div>
                
            </div>
            <div class="page-content fade-in-up">
                <div class="ibox">
                    <!-- <div class="ibox-head">
                        <div class="ibox-title">Summernote Air-Mode</div>
                    </div> -->
                    <div class="ibox-body">
                        <div id="summernote_air" data-plugin="summernote" data-air-mode="true">
                            <div>
                                <h3 class="font-strong mb-3">Terms and Conditions:-</h3>
                                <div><?php echo empty($page)? "" : $page->content;?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PAGE CONTENT-->


