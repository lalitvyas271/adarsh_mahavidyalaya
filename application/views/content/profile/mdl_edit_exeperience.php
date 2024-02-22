<!-- Modal2 Public profile page-->
<div class="modal fade" id="mdl-edit-experience" tabindex="-1" role="dialog" aria-labelledby="edit-experience"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Experience</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open("", ["class" => "form-horizontal", "id" => "frm-edit-experience"]); ?>
                <input type="hidden" name="experience_id" id="experience_id" />
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="">Title</label>
                        <input type="text" class="form-control validate[required]" maxlength="31" placeholder="Enter title"
                            name="exp_title" id="exp_title">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="">Select Employment Type</label>
                        <select class="form-control validate[required]" name="emp_type" id="emp_type">
                            <option value="">Employment type</option>
                            <option value="1">Full Time</option>
                            <option value="0">Part Time</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="">Company</label>
                        <input type="text" class="form-control validate[required]" placeholder="name" name="company"
                            id="company">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="">Location</label>
                        <input type="address" class="form-control validate[required]" placeholder="address"
                            name="address" id="address">
                    </div>
                </div>
                <div class="form-group row">

                    <div class="col-sm-12">
                        <label for="">Start Date</label>
                        <input type="text" class="form-control start_date validate[required]" placeholder="Start Date"
                            name="start_date">
                    </div>
                    <div class="col-sm-12">
                        <label for="">End Date</label>
                        <input type="text" class="form-control end_date" placeholder="End Date" name="end_date"
                            >
                    </div>
                    <span style="text-align:center;color:red;display:none;" id="sexperience">Check Start and End
                        Dates</span>

                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="">Currently Working</label>
                        <select class="form-control validate[required]" name="currently_working" id="currently_working">
                            <option value="">Currently Working</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal"
                        id="btn-update-experience">Save</button>

                </div>
                <?php echo form_close(); ?>
            </div>

        </div>
    </div>
</div>
<script src="assets/student/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js">
</script>
<script>
$(function() {
    $(".start_date").datepicker({ dateFormat: 'yy-mm-dd', maxDate: 0 });
    $(".end_date").datepicker({ dateFormat: 'yy-mm-dd',  maxDate: 0});
    $(document).on("click", ".btn-edit-experience", function() {
        var data = JSON.parse($(this).attr("data-data"));
        $("#experience_id").val(data.id);
        $("#exp_title").val(data.title);
        $("#emp_type").val(data.employement_type);
        $("#company").val(data.company);
        $(".start_date").val(data.start_date);
        $(".end_date").val(data.end_date);
        $("#address").val(data.location);
        $("#currently_working").val(data.currently_working);

        $("#mdl-edit-experience").modal("show");
    });

    $("#btn-update-experience").click(function() {
        var btn = $(this);
        var mdl = $("#mdl-edit-experience");
        var frm = $("#frm-edit-experience");
        var startDate = $('.start_date').val();
        var endDate = $('.end_date').val();
        //   console.log(Date.parse(startDate) + '   ' + Date.parse(endDate));
        if (Date.parse(startDate) > Date.parse(endDate)) {
            $("#sexperience").show("slow").delay(5000).hide("slow");
            $('.start_date').val('');
            return false;
        }
        if (!frm.validationEngine("validate")) {
            return false;
        }
        var frmData = new FormData(document.getElementById("frm-edit-experience"));
        $.ajax({
            url: BASE_URL + "profile/update_experience",
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
                        text: 'Experience updated successfully.',
                        type: 'success',
                        confirmButtonColor: '#4fa7f3'
                    })
                    window.location.reload();
                    frm.find("input").each(function() {
                        $(this).val("");
                    })
                } else {
                    swal({
                        title: 'failed',
                        text: 'failed update experience.',
                        type: 'failed',
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