<div class="pcoded-content">
    <div class="pcoded-inner-content">

        <div class="main-body">
            <div class="page-wrapper">

                <div class="page-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card mb-2">
                                <div class="card-header">
                                    <h4 class="card-header-text ml-4 mt-2 font-20">Update Personal Detail</h4>
                                    <a href="" class="btn btn-sm btn-success f-right mr-2" data-toggle="modal"
                                        data-target="#change-password">Change Password</a>
                                </div>
                            </div>
                            <div class="card mb-2">
                                <div class="card-header p-2 py-3">
                                    <h4 class="card-header-text ml-4 mt-2 font-16">Username:
                                        <?=$mail_phone[0]->username;?>
                                    </h4>
                                    <button type="button" class="btn btn-sm btn-info f-right mr-2 edit-name"
                                        data-toggle="modal" data-target="#mdl-edit-name"
                                        data-data='<?php echo json_encode($mail_phone[0]); ?>'>
                                        <i class="icofont icofont-ui-edit mr-0"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card mb-2">
                                <div class="card-header p-2 py-3">
                                    <h4 class="card-header-text ml-4 mt-2 font-16">Email: <?=$mail_phone[0]->email;?>
                                        <?php if (!$mail_phone[0]->email_verified) {?>
                                        <a href="" class="ml-2 text-danger verify-mail" data-toggle="modal"
                                            data-target="#mdl-verify-email"
                                            data-mail='<?php echo json_encode($mail_phone[0]->email); ?>'>verify
                                            <i class="fa fa-exclamation" aria-hidden="true"></i></a>
                                        <?php }?>
                                    </h4>
                                    <button type="button" class="btn btn-sm btn-info f-right mr-2 edit-mail"
                                        data-toggle="modal" data-target="#mdl-edit-mail"
                                        data-data='<?php echo json_encode($mail_phone[0]); ?>'>
                                        <i class="icofont icofont-ui-edit mr-0"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card mb-2">
                                <div class="card-header p-2 py-3">
                                    <h4 class="card-header-text ml-4 mt-2 font-16">Contact No:
                                        <?=$mail_phone[0]->phone;?>
                                        <!-- <?php if ($mail_phone[0]->phone_verified) {?> <i
                                            class="fa fa-check-circle text-success"
                                            aria-hidden="true"></i><?php } else {?>
                                        <a href="" class="ml-2 text-danger verify-phone" data-toggle="modal"
                                            data-target="#verify-mobile"
                                            data-phone='<?php echo json_encode($mail_phone[0]->phone); ?>'>verify <i
                                                class="fa fa-exclamation" aria-hidden="true"></i> </a><?php }?> -->
                                    </h4>
                                    <button type="button" class="btn btn-sm btn-info f-right mr-2 edit-contact"
                                        data-toggle="modal" data-target="#mdl-edit-contact"
                                        data-data='<?php echo json_encode($mail_phone[0]); ?>'>
                                        <i class="icofont icofont-ui-edit mr-0"></i>
                                    </button>
                                </div>
                            </div>
                        </div>




                    </div>
                </div>

            </div>
        </div>

        <div id="styleSelector">
        </div>
    </div>
</div>
<?php $this->load->view('content/setting/mdl_edit_mail.php');?>
<?php $this->load->view('content/setting/mdl_edit_name.php');?>
<?php $this->load->view('content/setting/mdl_edit_contact.php');?>
<?php // $this->load->view('content/setting/mdl_verify_mail.php');?>
<?php // $this->load->view('content/setting/mdl_verify_mobile.php');?>
<?php $this->load->view('content/setting/mdl_change_password.php');?>