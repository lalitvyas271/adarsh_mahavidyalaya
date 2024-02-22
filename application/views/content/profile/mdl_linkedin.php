<!-- Modal7 Linkdin profile page-->
<div class="modal fade" id="mdl-edit-social_media" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Linkedin profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open("", ["class" => "form-horizontal", "id" => "frm-edit-social_media"]); ?>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="">Social Type</label>
                        <select name="type" id="type" class="form form-control validate[required]">
                            <option value="1">Linkedin Profile</option>
                            <option value="2">Facebook Profile</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="">Id</label>
                        <input type="text" class="form-control validate[required]" id="ss_id" name="ss_id"
                            placeholder="">
                    </div>
                </div>
                <input type="hidden" name="social_id" id="social_id" />
                <?php echo form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary alert-success-msg" id="btn-update-social"
                    data-dismiss="modal" data-toggle="modal">Update</button>
            </div>
        </div>
    </div>
</div>
<script>
$(function() {
    $(document).on("click", ".edit-social-media", function() {
        var data = JSON.parse($(this).attr('data-socia'));
        console.log(data);
        $("#social_id").val(data.id);
        $("#type").val(data.social_media_id);
        $("#ss_id").val(data.social_media);
    });
});
$("#btn-update-social").click(function() {
    var btn = $(this);
    var mdl = $("#mdl-edit-social_media");
    var frm = $("#frm-edit-social_media");
    if (!frm.validationEngine("validate")) {
        return false;
    }
    var frmData = new FormData(document.getElementById("frm-edit-social_media"));
    $.ajax({
        url: BASE_URL + "profile/update_social_media",
        type: "POST",
        data: frmData,
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        beforeSend: function() {
            btn.html("...").addClass("disabled");
        },
        success: function(res) {
            mdl.modal("hide");
            if (res.status == 1) {
                swal({
                    title: 'Updated',
                    text: 'Successfully Updated.',
                    type: 'success',
                    confirmButtonColor: '#4fa7f3'
                })
                window.location.reload();
                frm.find("input").each(function() {
                    $(this).val("");
                })
            } else {
                swal({
                    title: 'Failed',
                    text: 'Failed Updation.',
                    type: 'error',
                    confirmButtonColor: '#4fa7f3'
                })
            }
        },
        complete: function() {
            btn.html("Save").removeClass("disabled");
        }
    });
});
</script>