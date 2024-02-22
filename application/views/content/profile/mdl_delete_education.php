<!-- modal content -->
<div id="mdl-delete-education" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel"
    aria-hidden="true" data-backdrop="static" data-keyboard="false" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h3 class=" text-center m-b-30"> Are you sure you want to delete?</h3>
                <?php echo form_open("", ["class" => "form-horizontal", "id" => "frm-delete-education"]); ?>
                <div class="form-group account-btn text-center m-t-10">
                    <div class="col-xs-12">
                        <button type="button" class="btn btn-danger waves-effect"
                            id="btn-delete-education">DELETE</button>
                        <button type="button" class="btn btn-secondary waves-effect"
                            data-dismiss="modal">CANCEL</button>
                    </div>
                </div>
                <input type="hidden" name="education-id" id="inpt-dlt-education-id" value="">
                <?php echo form_close(); ?>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
$(function() {

    $(document).on("click", ".btn-delete-education", function() {
        var id = $(this).attr("data-id");
        $("#inpt-dlt-education-id").val(id);
        $("#mdl-delete-education").modal("show");
    });
    $("#btn-delete-education").click(function() {
        var btn = $(this);
        var mdl = $("#mdl-delete-education");
        var frm = $("#frm-delete-education");
        $.ajax({
            url: BASE_URL + "profile/delete_education",
            type: "POST",
            data: frm.serialize(),
            beforeSend: function() {
                btn.html("...").addClass("disabled");
            },
            success: function(res) {
                mdl.modal("hide");
                if (res.status) {
                    window.location.reload();
                    swal({
                        title: 'Deleted',
                        text: 'education deleted successfully.',
                        type: 'success',
                        confirmButtonColor: '#4fa7f3'
                    });
                } else {
                    swal({
                        title: 'Failed',
                        text: 'Failed to delete education.',
                        type: 'error',
                        confirmButtonColor: '#4fa7f3'
                    })
                }
            },
            complete: function() {
                btn.html("Delete").removeClass("disabled");
            }
        });
    });
})
</script>