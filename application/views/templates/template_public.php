<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Ved</title>
        <!--============================ header top view====================================== -->
        <?php $this->load->view('headers/header_top_view'); ?>
        <!--========================== header top view end==================================== -->
    </head>
    <body>
    <div id="preloader"></div>
    <div id="wrapper">
        <!-- <div id="mask" style="display: none">
            <img src="<?php echo BASE_URL?>assets/images/loading-golden.gif">
        </div> -->
        <!-- Begin page -->
            <!--============================ header bottom view=================================== -->
            <?php $this->load->view('headers/header_bottom_view'); ?>
            <!--================================ header bottom view end=========================== -->

            <!--============================ Side bar view=================================== -->
            <?php //$this->load->view('sidebar/sidebar_view'); ?>
            <!--================================ Side bar view end=========================== -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <!--=========================== main content view ==================================== -->
                <?php if (isset($content))
                    $this->load->view($content['view'], isset($content['data']) ? $content['data']:array()); ?>
                <!-- ========================== main content view end ================================ -->

                <!-- ========================== footer view ========================================== -->
                <?php $this->load->view('footers/footer_view'); ?>
            </div>
                
        <?php 
        // if($this->session->userdata("change_password")){
        //     $this->load->view("content/user_management/mdl_change_pwd_view");
        // }
        ?>
        <?php $this->assetload->queue(false, 'asset_manifest/' . $asset_manifest); ?>
        <script>
            $(function(){
                $('body').tooltip({
                    selector: '[data-toggle="tooltip"]'
                });
            });
        </script>
        </div>
    </body>
</html>
