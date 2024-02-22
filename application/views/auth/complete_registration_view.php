<!-- Main content -->
<section class="login-box">

    <div class="login-box-inner">
        <div class="login-logo"><a href="#"><img src="assets/img/logo.png" alt=""></a></div>
        <!-- ============ login popup start here =============-->
        <article class="login-wraper" id="login-pop">
            <div class="login-box-body text-center">
                <div id="kc_success_error_msg">  </div>  
                <div id="complete_reg_id">
                <p>Set username and password for complete registration.</p>
                <form id="confirm_register" name="confirm_register" method="POST" action="<?php echo BASE_URL ?>auth/complete_registration/<?php echo $token_code; ?>" class="margBN" onsubmit="return false;">                    
                    <div class="login-center text-left">
                        <input type="hidden" id="confirm_register_iserror" value="0" />
                        <div class="form-group has-feedback">
                            <label class="sr-only" for="new_password">User Name<span class="f_req">*</span> </label>
                            <input class="form-control" type="text" name="user_name" id="user_name" value="<?php echo $email_id; ?>" placeholder="User Name" disabled="disabled" /> 
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            <div class="form-error" id="user_name_validate"></div>
                        </div>
                        <div class="form-group has-feedback">
                            <label class="sr-only" for="new_password">Password<span class="f_req">*</span> </label>
                            <input class="form-control validate[valueRequired[New&nbsp;Password],developerCustom[min1, Minimum length is 6 characters.]developerCustom[password, Password should contain at least one Number, one alphabet and one Special Character.]]" type="password" name="password" id="password" value="" placeholder="Password"> 
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            <div class="form-error" id="password_validate"></div>
                        </div>
                        <div class="form-group has-feedback">
                            <label class="sr-only" for="confirm_new_password">Confirm Password<span class="f_req">*</span></label>
                            <input class="form-control validate[valueRequiredCustom[Please&nbsp;enter&nbsp;Confirm&nbsp;Password], equals[password, Password]]" type="password" name="confirm_password" id="confirm_password" value="" placeholder="Confirm Password"> 
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            <div class="form-error" id="confirm_password_validate"></div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block btn-flat" name="confirm_register_submit" id="confirm_register_submit" value="" type="submit">Submit</button>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </form>
                </div>

            </div>

        </article>
        
    </div>

    <div class="gaussian-blur blur"></div>
    <div class="clearfix"></div>

</section>  


<div class="clearfix"></div>


<!--<article class="mobile-app">
    <div class="container">
        <h2>Get the free mobile app</h2>
        <p>Available for iPhone and Android!</p>
        <div class="appButton">
            <a href="#" class="androidApp"><img src="assets/images/google-play.png" alt=""></a> 
            <a href="#" class="iphoneApp"><img src="assets/images/native-button-iosappstore.gif" alt=""> </a> 
        </div>
    </div>
</article>-->
<div class="clearfix"></div>