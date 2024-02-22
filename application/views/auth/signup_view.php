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
    <div class="ibox login-content">
        <div class="text-center logo-login">
            <img src="assets/img/logo.png" alt="image">
        </div>
        <div class="login-headc">SHUDH KHAO, SWASTH RAHO!</div>
        <?php echo form_open("", ["id" => "frm-register", "class" => "ibox-body form-horizontal"]); ?>
            <h4 class="font-strong text-center mb-5">Retailer Register</h4>
            <div id="msg-success" class="alert alert-success" style="display:none;"></div>
            <div id="msg-error" class="alert alert-danger" style="display:none;"></div>

            <div class="form-group mb-3">
                <input class="form-control form-control-line validate[required]" type="text" name="name" placeholder="Retailer Full Name ">
            </div>
            <div class="form-group mb-3">       
                <select name="distributor_id" class="form-control form-control-line validate[required]">
                    <option value="">Choose Distributor</option>
                    <?php
                    foreach ($distributor_list as $a) :
                        echo '<option value="' . $a->id . '">' . $a->screen_name . '</option>';
                    endforeach;
                    ?>
                </select>
            </div>
            <div class="form-group mb-3">
                <select name="salesman_id" class="form-control form-control-line validate[required]">
                    <option value="">Choose Salesman</option>
                    <?php
                    foreach ($salesman_list as $a) :
                        echo '<option value="' . $a->id . '">' . $a->screen_name . '</option>';
                    endforeach;
                    ?>
                </select>
            </div>
            <div class="form-group mb-4">
                <input class="form-control form-control-line mobile validate[required]" type="text" name="mobile" placeholder="Mobile">
            </div>
            <div class="form-group mb-3">
                <input class="form-control form-control-line validate[required]" type="text" name="address" placeholder="Address">
            </div>
            
            <div class="form-group mb-3">
                <input class="form-control form-control-line" type="text" name="gstn" placeholder="GST No.">
            </div>                           
            
            <div class="form-group mb-3 ipassword-input">
                <input type="password" name="password" class="form-control form-control-line password validate[required, minSize[8],maxSize[16]]" id="password" placeholder="Enter Password">
                <span class="fa fa-eye ipassowrd-toggle password_showPass"></span>
            </div>
            <div class="form-group mb-3 ipassword-input">
                <input type="password" name="confirm_password" class="form-control form-control-line c_password validate[required,equals[password]]" placeholder="Confirm Password">
                <span class="fa fa-eye ipassowrd-toggle cpassword_showPass"></span>
            </div>
            <div class="text-center mb-3">
                <button class="btn btn-danger btn-rounded btn-block" id="btn-register">Register</button>
            </div>
            <div class="text-center mb-0">
                Already have Account ?
                <a class="text-primary" href="<?php echo BASE_URL?>"> Login Here</a>
            </div>
            <?php echo form_close(); ?>
            </div>
    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
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

                $('.cpassword_showPass').on('click', function(){
                    var cpassInput=$(".c_password");
                    if(cpassInput.attr('type')==='password')
                        {
                        cpassInput.attr('type','text');
                    }else{
                        cpassInput.attr('type','password');
                    }
                })

                $("#btn-register").click(function(e){
                    e.preventDefault();
                    var frm = $("#frm-register");
                    var btn = $(this);
                    if(!frm.validationEngine("validate")){
                        return;
                    }
                    $.ajax({
                        url: BASE_URL+"auth/register_retailer",
                        type : 'POST',
                        data: frm.serialize(),
                        beforeSend : function (){
                            $(".alert").hide();
                            btn.addClass("disabled");
                            // $("#btn-login").replaceWith(`<button class="btn btn-primary btn-rounded btn-block" id="btn-login">Processing...</button>`);
                        },
                        success: function(res){
                           
                            if(res.status == 1){
                                swal({
                                    title: 'Success',
                                    text: 'Retailer Registered successfully...',
                                    type: 'success',
                                    confirmButtonColor: '#4fa7f3'
                                });
                                setTimeout(function() {
                                    window.location.href = BASE_URL;
                                }, 3000);
                                // $("#msg-success").html(res.msg).show();
                                // $("#btn-login").replaceWith(`<button class="btn btn-primary btn-rounded btn-block" id="btn-login"">Sign In</button>`);
                                // window.location = BASE_URL+user_role_id[user_role];
                                // 
                            }else{
                                swal({
                                    title: 'Failed',
                                    text: res.msg,
                                    type: 'error',
                                    confirmButtonColor: '#4fa7f3'
                                });
                                // $("#msg-error").html(res.msg).show();
                                
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