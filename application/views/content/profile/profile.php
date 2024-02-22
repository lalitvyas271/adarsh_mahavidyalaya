<div class="pcoded-content">
    <div class="pcoded-inner-content">

        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cover-profile">
                                <div class="profile-bg-img">
                                    <!-- <img class="profile-bg-img img-fluid" style="width: 100%;
    height: 188px;" src="<?=$profile['0']->background_img_url;?>" alt="bg-img"> -->
                                    <?php
                                            if (!empty($profile['0']->background_img_url)) {
                                                ?><img src="<?php echo $profile['0']->background_img_url ?>" class="profile-bg-img img-fluid" style="width: 100%;
                                                height: 188px;" alt='User-Profile-Image'>
                                                                                <?php } else {
                                                echo "<img src='https://friendly-uploads.s3.ap-south-1.amazonaws.com/80c33aa9ac927d8dd81958010f2365da.jpg' class='user-img img-radius' alt='User-Profile-Image' style='width: 100%; height: 188px;'>";
                                            }
                                            ?>
                                    <a href="" class="profile-edit-btn" data-toggle="modal"
                                        data-target="#mdl-edit-profile"><i
                                            class="icofont icofont-ui-edit font-14 text-white"></i></a>
                                    <div class="card-block user-info">
                                        <div class="col-md-12" style="margin-bottom: 22px;">
                                            <div class="media-left">
                                                <a href="#" class="profile-image">
                                                    <?php
                                                        if (!empty($profile['0']->profile_image_url)) { ?>
                                                            <img src="<?php echo $profile['0']->profile_image_url ?>" class="user-img img-radius"
                                                                                                                style="width: 108px; height: 108px;" alt='User-Profile-Image'>
                                                                                                            <?php } else {
                                                            echo "<img src='https://friendly-uploads.s3.ap-south-1.amazonaws.com/e9cec5239ecba35826234dbdeb3e74f0.jpg' class='user-img img-radius' alt='User-Profile-Image' style='width: 108px; height: 108px;'>";
                                                        }
                                                        ?>
                                                </a>
                                            </div>

                                            <div class="media-body row">
                                                <div class="col-lg-12">
                                                    <div class="user-title" style="bottom: 13px!important;">
                                                        <h2><?=$profile['0']->screen_name;?>
                                                            <a href="" data-toggle="modal"
                                                                data-target="#mdl-edit-profile"
                                                                data-id='<?php echo $profile[0]->id ?>' data-user_id='<?php echo $profile[0]->user_id ?>' data-fname='<?php echo $profile[0]->fname ?>' data-lname='<?php echo $profile[0]->lname ?>' data-profession='<?php echo $profile[0]->profession ?>' data-profile_image_url='<?php echo $profile[0]->profile_image_url ?>' data-background_img_url='<?php echo $profile[0]->background_img_url ?>'
                                                                class="btn-edit-profile">

                                                                <i class="icofont icofont-ui-edit font-14 text-white"></i>
                                                            </a>
                                                        </h2>
                                                        <span class="text-white"><?=$profile['0']->profession ?></span>
                                                        <p><span class="text-white"><?=$profile['0']->email ?></span>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div>

                                                    <!-- <div class="pull-right cover-btn">
                                                        <button type="button"
                                                            class="btn btn-primary m-r-10 edit-social-media"
                                                            data-toggle="modal" data-target="#mdl-edit-social_media"
                                                            data-socia='<?php echo json_encode($social_media['0']) ?>'>
                                                            <i class="icofont icofont-plus"></i>
                                                            Connect with Linkedin profile
                                                        </button>
                                                    </div> -->

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">

                                <div class="card-header pt-2 pb-2">
                                    <!-- <h5 class="card-header-text">Full Description</h5> -->
                                    <h4 class="card-header-text font-22">Full Description</h4>
                                    <button type="button" class="btn btn-sm btn-info f-right mr-2 btn-disc"
                                        data-full_description='<?php echo $profile['0']->full_description; ?>' data-user_id='<?php echo $profile['0']->user_id; ?>'>
                                        <i class="icofont icofont-ui-edit mr-0"></i>
                                    </button>
                                </div>
                                <div class="card-block user-desc">
                                    <div class="view-desc">
                                        <p>
                                            <?=$profile['0']->full_description ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 mb-4">
                            <div class="card mb-2">
                                <div class="card-header py-3">
                                    <h4 class="card-header-text mt-2 font-22">Education</h4>
                                    <button id="edit-btn" type="button" class="btn btn-sm btn-primary f-right"
                                        data-toggle="modal" data-target="#mdl-add-education">
                                        <i class="icofont icofont-ui-add mr-0"></i>
                                    </button>
                                </div>
                            </div>

                            <?php foreach ($education as $value) { ?>
                            <div class="card mb-2">
                                <div class="card-block">
                                    <table class="table table-responsive invoice-table table-borderless pl-0">
                                        <tbody>
                                            <tr>
                                                <td class="mb-1 font-17">
                                                    <strong><?=$value->title;?></strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong><?=$value->degree_name;?>
                                                        (<?=$value->start_year;?> -
                                                        <?=$value->end_year;?>)</strong></td>
                                            </tr>
                                            <tr>
                                                <td><?=$value->college;?></td>
                                            </tr>
                                            <tr>
                                                <td><?=$value->full_description;?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div style="position: absolute;right: 12px;top: 23px;">
                                        <button id="edit-btn" type="button"
                                            class="btn btn-sm btn-info mr-2 btn-edit-education"
                                            data-id='<?php echo $value->id ?>' data-title='<?php echo $value->title ?>' data-degree_id='<?php echo $value->degree_id ?>' data-college='<?php echo $value->college ?>' data-specialization_id='<?php echo $value->specialization_id ?>' data-start_year='<?php echo $value->start_year ?>' data-end_year='<?php echo $value->end_year ?>' data-full_description='<?php echo $value->full_description ?>'>
                                            <i class="icofont icofont-ui-edit mr-0"></i>
                                        </button>
                                        <button id="delete-btn" type="button"
                                            class="btn btn-sm btn-danger mr-2 btn-delete-education" data-toggle="modal"
                                            data-id="<?php echo $value->id; ?>" data-target=" #mdl-delete-education">
                                            <i class="icofont icofont-ui-delete mr-0"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>

                        <div class=" col-lg-12">
                            <div class="card mb-2">
                                <div class="card-header py-3">
                                    <h4 class="card-header-text mt-2 font-22">Experience</h4>
                                    <button id="edit-btn" type="button" class="btn btn-sm btn-primary f-right"
                                        data-toggle="modal" data-target="#mdl-add-experience">
                                        <i class="icofont icofont-ui-add mr-0"></i>
                                    </button>
                                </div>
                            </div>
                            <?php foreach ($experience as $key => $value) {?>
                            <div class="card mb-2">
                                <div class="card-block">
                                    <table class="table table-responsive invoice-table table-borderless pl-0">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <h6 class="mb-1 font-17"><strong><?=$value->title;?>
                                                        </strong></h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong><?=$value->company;?>
                                                        .<?php if ($value->employement_type) {echo "full time";} else {echo "part time";}?></strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><?=$value->start_date . ' to ' . $value->end_date;?></td>
                                                <!-- <td>Mar 2018 - Present . 2 Year 5 month</td> -->
                                            </tr>
                                            <tr>
                                                <td><?=$value->location;?> </td>
                                            </tr>
                                            <tr>
                                                <td>Currently working -
                                                    <span><strong><?php if ($value->currently_working) {echo "Yes";} else {echo "No";}?></strong></span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button id="edit-btn" type="button"
                                        class="btn btn-sm btn-info btn-abslute mr-2 btn-edit-experience" value=""
                                        data-data=' <?php echo json_encode($value) ?> '
                                        data-target="#mdl-edit-experience">
                                        <i class="icofont icofont-ui-edit mr-0"></i>
                                    </button>
                                    <button id="delete-btn" type="button"
                                        class="btn btn-sm btn-danger mr-2 btn-delete-experience"
                                        data-id="<?php echo $value->id; ?>" data-target="#mdl-delete-experience">
                                        <i class="icofont icofont-ui-delete mr-0"></i>
                                    </button>
                                </div>
                            </div>
                            <?php }?>

                        </div>
                    </div>
                </div>


                <div id="styleSelector">
                </div>
            </div>
        </div>

        <?php $this->load->view('content/profile/mdl_edit_education.php');?>
        <?php $this->load->view('content/profile/mdl_add_education.php', ["specialization", $specialization]);?>
        <?php $this->load->view('content/profile/mdl_edit_exeperience.php', ["degree", $degree]);?>
        <?php $this->load->view('content/profile/mdl_add_experience.php');?>
        <?php $this->load->view('content/profile/edit_desc.php');?>
        <?php $this->load->view('content/profile/edit_profile.php');?>
        <?php $this->load->view('content/profile/mdl_delete_experience.php');?>
        <?php $this->load->view('content/profile/mdl_delete_education.php');?>
        <?php $this->load->view('content/profile/mdl_linkedin.php');?>