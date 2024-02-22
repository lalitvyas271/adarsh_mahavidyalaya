<!-- Modal2 Public profile page-->
<div class="modal fade" id="mdl-add-experience" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Experience</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open("", ["class" => "form-horizontal", "id" => "frm-add-experience"]); ?>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="">Title</label>
                        <input type="text" class="form-control validate[required]" maxlength="31" placeholder="title" name="title">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="">Select Employment Type</label>
                        <select name="employement_type" class="form-control validate[required]">
                            <option value="">Employment Type</option>
                            <option value="1">Full Time</option>
                            <option value="0">Part Time</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="">Company</label>
                        <input type="text" class="form-control validate[required]" placeholder="Enter Company Name"
                            name="company">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="">Location</label>
                        <input type="address" class="form-control validate[required]" placeholder="Enter Location"
                            name="location">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="">Start Date</label>
                        <input type="text" class="form-control start_date validate[required]" placeholder="Select Start Date"
                            name="start_date">
                    </div>
                    <div class="col-sm-12">
                        <label for="">End Date</label>
                        <input type="text" class="form-control end_date" placeholder="Select End Date"
                            name="end_date">
                    </div>

                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="">Currently Working</label>
                        <select name="currently_working" class="form-control validate[required]">
                            <option value="">Currently working</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal"
                    id="btn-add-experience">Save</button>

            </div>
        </div>
    </div>
</div>
<script>
$(function() {
    $(document).on("click", ".close", function() {
        var frm = $("#frm-add-education");
        frm.find("input").each(function() {
            $(this).val("");
        })
        frm.find("select").each(function() {
            $(this).val("");
        })
        frm.find("textarea").each(function() {
            $(this).val("");
        })
    });

    $(".start_date").datepicker({ dateFormat: 'yy-mm-dd', maxDate: 0 });
    $(".end_date").datepicker({ dateFormat: 'yy-mm-dd',  maxDate: 0});

    $("#btn-add-experience").click(function() {


        var btn = $(this);
        var mdl = $("#mdl-add-experience");
        var frm = $("#frm-add-experience");

        if (!frm.validationEngine("validate")) {
            return false;
        }
        var frmData = new FormData(document.getElementById("frm-add-experience"));
        $.ajax({
            url: BASE_URL + "profile/add_experience",
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
                if (res.status) {
                    swal({
                        title: 'Added',
                        text: 'You have added experience successfully.',
                        type: 'success',
                        confirmButtonColor: '#4fa7f3'
                    });

                    frm.find("input").each(function() {
                        $(":input").val("");
                    })
                    
                    window.location.reload();
                } else {
                    swal({
                        title: 'Failed',
                        text: 'Failed to add experience.',
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