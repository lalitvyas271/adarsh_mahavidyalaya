<div id="mdl-otp-verify" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background-color:#4064d7;">
                <h5 class="text-white">VERIFY OTP</h5>
                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>  
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" id="email_err_msg" style="display:none;">
                    <h5>Invalid Otp</h5>
                </div>
                <?php echo form_open("#", [
                    "style" => "padding: 30px 30px 0px 30px",
                    "id" => "frm-otp-verify"
                ]); ?>
                <div class="row">
                    <div class="form-group col-md-12 col-xs-12" id="otp-msg">
                    </div>
                    <div class="form-group col-md-12 col-xs-12">
                        <input type="hidden" name="request_id" id="request_id" class="form-control validate[required]">
                        <input type="hidden" name="mobile" id="mobile" class="form-control validate[required]">
                        <input type="text" name="otp" id="otp" class="form-control validate[required]" placeholder="Enter OTP">
                    </div>
                </div>
                <div class="clearfix"></div>
                <?php echo form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-otp-verify">Verify</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(function(){ 
        $('#otp').mask('000000');
    $("#btn-otp-verify").click(function() {
        var mobile = $("#mobile").val();
        var data = $("#frm-otp-verify").serialize();
        $.post(
            BASE_URL + "auth/verifyOtp",
            data,
            function(res) {
                if (res.status == 1) {
                    // $("#mdl-verify-otp").modal("hide");
                    swal({
                        title: 'Success',
                        text: 'Verified Successfully...',
                        type: 'success',
                        confirmButtonColor: '#4fa7f3'
                    });
                    setTimeout(function() {
                        window.location.href = BASE_URL+"reset-password/"+mobile;
                    }, 3000);
                    $('#otp').val("");
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
});
</script>