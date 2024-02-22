<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>JK Masale</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/vendors/line-awesome/css/line-awesome.min.css" rel="stylesheet" />
    <link href="assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    
    <!-- PLUGINS STYLES-->
    <link href="assets/css/validationEngine.jquery.css" rel="stylesheet" type="text/css" />
    <!-- THEME STYLES-->
    <link href="assets/css/main.min.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
    <script src="assets/vendors/jquery/dist/jquery.min.js"></script>
    <link href="assets/css/sweetalert2.min.css" rel="stylesheet" type="text/css">

    <script>
        var BASE_URL = '<?php echo BASE_URL; ?>';
    </script>
           <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<body class="logo-bcolor">
    <!-- <div class="cover"></div> -->
    <div class="ibox login-content">
        <div class="text-center logo-login">
            <!-- <span class="auth-head-icon"><i class="la la-user"></i></span> -->
            <img src="assets/img/logo.png" alt="image">
        </div>
        <div class="login-headc">SHUDH KHAO, SWASTH RAHO!</div>
        <?php echo form_open("", ["id" => "frm-login", "class" => "ibox-body form-horizontal"]); ?>
        <!-- <form class="ibox-body" id="login-form" action="javascript:;" method="POST"> -->
            <h4 class="font-strong text-center mb-5">Admin Login</h4>
            <div id="msg-success" class="alert alert-success" style="display:none;"></div>
            <div id="msg-error" class="alert alert-danger" style="display:none;"></div>
                                        
            <div class="form-group mb-4">
                <input class="form-control form-control-line mobile validate[required]" type="text" name="mobile" placeholder="Mobile">
            </div>
            <div class="form-group mb-4 ipassword-input">
                <input class="form-control form-control-line password validate[required]" type="password" name="password" placeholder="Password">
                <span class="fa fa-eye ipassowrd-toggle password_showPass"></span>
            </div>
            <div class="flexbox mb-5">
                <!-- <span>
                    <label class="ui-switch switch-icon mr-2 mb-0">
                        <input type="checkbox" checked="">
                        <span></span>
                    </label>Remember</span> -->
                <a class="text-primary forgot_password">Forgot password?</a>
            </div>
            <div class="text-center mb-4">
                <button class="btn btn-primary btn-rounded btn-block" id="btn-login">LOGIN</button>
            </div>
            <div class="text-center mb-0">
                Already have Account ?
                <a class="text-primary" href="<?php echo BASE_URL?>register-retailer"> Register Here</a>
            </div>
            <?php echo form_close(); ?>
            </div>
    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    <?php $this->load->view('auth/forgot_modal_view');?>
    <?php $this->load->view('auth/otp_modal_view');?>
    <script>
            $(function(){ 
                $('.mobile').mask('0000000000');
                $('.password_showPass').on('click', function(){
                    var passInput=$(".password");
                    if(passInput.attr('type')==='password')
                        {
                        passInput.attr('type','text');
                    }else{
                        passInput.attr('type','password');
                    }
                })
                $(".forgot_password").click(function() { 
                     $("#mdl-forgot-password").modal('show');
                });

                $("#btn-send").click(function() {
                    var frm = $("#frm-forgot-password");
                    if(!frm.validationEngine("validate")){
                        return;
                    }
                    $.post(
                        BASE_URL + "auth/sendOtp",
                        frm.serialize(),
                        function(res) {
                            console.log(res);
                            if (res.status == 1) {
                                // $("#mdl-verify-otp").modal("hide");
                                swal({
                                    title: 'Success',
                                    text: 'OTP Sent Successfully...',
                                    type: 'success',
                                    confirmButtonColor: '#4fa7f3'
                                });
                                $(".mobile").val("");
                                $("#mobile").val(res.data.mobile);
                                $("#request_id").val(res.data.request_id);
                                setTimeout(function() {
                                    $("#mdl-otp-verify").modal('show');
                                }, 3000);
                            } else {
                                swal({
                                    title: 'Failed',
                                    text: res.msg,
                                    type: 'error',
                                    confirmButtonColor: '#4fa7f3'
                                });
                            }
                        },
                        "json"
                    );
                });

                $("#btn-login").click(function(e){
                    e.preventDefault();
                    var frm = $("#frm-login");
                    var btn = $(this);
                    if(!frm.validationEngine("validate")){
                        return;
                    }
                    $.ajax({
                        url: BASE_URL+"auth/login",
                        type : 'POST',
                        data: frm.serialize(),
                        beforeSend : function (){
                            $(".alert").hide();
                            btn.addClass("disabled");
                            // $("#btn-login").replaceWith(`<button class="btn btn-primary btn-rounded btn-block" id="btn-login">Processing...</button>`);
                        },
                        success: function(res){
                           
                            if(res.status == 1){
                                var user_role = res.data.user.role_id;
                                var user_role_id ={
                                    "1":'asm/list_asm_target_view',
                                    "2":'distributor-target',
                                    "3":'salesman-bill',
                                    "4":'retailer-bill',
                                    "5":'dashboard',
                                }
                                // storage.set_userdata("user_auth", res.data);
                                $("#msg-success").html(res.msg).show();
                                // $("#btn-login").replaceWith(`<button class="btn btn-primary btn-rounded btn-block" id="btn-login"">Sign In</button>`);
                                window.location = BASE_URL+user_role_id[user_role];
                                // 
                            }else{
                                $("#msg-error").html(res.msg).show();
                                
                            }
                        },
                        complete: function(){
                            //$("#btn-login").replaceWith(`<button class="btn btn-primary btn-rounded btn-block" id="btn-login"">Sign In</button>`);
                            btn.removeClass("disabled");
                        }
                    });
                });
            });
            // var resizefunc = [];
        </script>
    <!-- CORE PLUGINS-->
    
    
    
    <script src="assets/js/popper.min.js"></script>
     <script src="assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.validationEngine-en.js"></script>
        <script src="assets/js/jquery.validationEngine.min.js"></script>
        <script src="assets/js/sweetalert2.min.js"></script>
        <script src='assets/js/jquery.mask.js?1578926528'></script>
    <!-- PAGE LEVEL PLUGINS-->
    <!-- CORE SCRIPTS-->
    <script src="assets/js/app.min.js"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    
</body>

</html>