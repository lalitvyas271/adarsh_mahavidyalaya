<div id="mdl-forgot-password" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background-color:#4064d7;">
                <h5 class="text-white">FORGOT PASSWORD</h5>
                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>  
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" id="email_err_msg" style="display:none;">
                    <h5>Invalid Email</h5>
                </div>
                <?php echo form_open("#", [
                    "style" => "padding: 30px 30px 0px 30px",
                    "id" => "frm-forgot-password"
                ]); ?>
                <div class="row">
                    <div class="form-group col-md-12 col-xs-12" id="otp-msg">
                    </div>
                    <div class="form-group col-md-12 col-xs-12">
                        <input type="text" name="mobile" class="form-control mobile validate[required]" placeholder="Enter Mobile">
                    </div>
                </div>
                <div class="clearfix"></div>
                <?php echo form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-send">Send</button>
            </div>
        </div>
    </div>
</div>

