<div class="modal fade" id="mdl-edit-description" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Description</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open("", ["class" => "form-horizontal", "id" => "frm-edit-description"]); ?>
                <input type="hidden" name="did" id="did" class="validate[required]" />

                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="">Long Description</label>
                        <textarea rows="4" class="form-control validate[required]" id="full_data" name="full_data" maxlength="1000"
                            placeholder="Full Description"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary"
                        id="btn-save-desc">Save</button>
                </div>
                <?php echo form_close(); ?>
            </div>

        </div>
    </div>
</div>
<script>
$(function() {
    $(document).on("click", ".btn-disc", function() {
        $("#mdl-edit-description").modal("show"); 
        var user_id = $(this).attr('data-user_id');
        var full_description = $(this).attr('data-full_description');
        $("#did").val(user_id);
        $("#full_data").val(full_description);
        
    });

    $("#btn-save-desc").click(function() {
        var btn = $(this);
        var mdl = $("#mdl-edit-description");
        var frm = $("#frm-edit-description");
        if (!frm.validationEngine("validate")) {
            return false;
        }
        var frmData = new FormData(document.getElementById("frm-edit-description"));
        $.ajax({
            url: BASE_URL + "profile/update_profile_description",
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
                        title: 'Success',
                        text: 'Description updated successfully',
                        type: 'success',
                        confirmButtonColor: '#4fa7f3'
                    })
                    setTimeout(() => {
                        window.location.reload();
                    }, 2000);
                    
                    frm.find("input").each(function() {
                        $(this).val("");
                    })
                } else {
                    swal({
                        title: 'Failed',
                        text: 'Failed to update description.',
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
});
</script>