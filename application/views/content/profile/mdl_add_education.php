<!-- Modal Public profile page-->
<div class="modal fade" id="mdl-add-education" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add/Edit Education</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open("", ["class" => "form-horizontal", "id" => "frm-add-education"]); ?>
                <div class="form-group row">
                    <!-- <div class="col-sm-12">
                        <label for="">Title</label>
                        <input type="text" class="form-control validate[required]" placeholder="title" name="title">
                    </div> -->
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="">Degree / Course</label>
                        <select name="degree" id="degree" class="form-control validate[required]">
                            <option value="">Select Degree/Course</option>
                            <?php
foreach ($degree as $t) {
    echo '<option value="' . $t->id . '">' . $t->title . '</option>';
}
?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="">College / Institute</label>
                        <input type="text" class="form-control validate[required]" placeholder="name" name="college">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="">Specialization</label>
                        <select name="specialization" id="specialization" class="form-control validate[required]">
                            <option value="">Select Specialization</option>
                            <?php
foreach ($specialization as $t) {
    echo '<option value="' . $t->id . '">' . $t->title . '</option>';
}
?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="">Start Year</label>
                        <select name="start_year" id="start_yeara" class="form-control mt-1 validate[required]">
                            <option value="">Year</option>
                            <?php
                                    $years = range(2000, date("Y", time()));
                                    foreach ($years as $y) {
                                        echo '<option value="' . $y . '">' . $y . '</option>';
                                    }
                                    ?>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label for="">End Year</label>
                        <select name="end_year" id="end_yeara" class="form-control mt-1 validate[required]">
                            <option value="">Year</option>
                            <?php
                                    $years = range(2000, date("Y", time()));
                                    foreach ($years as $y) {
                                        echo '<option value="' . $y . '">' . $y . '</option>';
                                    }
                                    ?>
                        </select>
                    </div>
                    <span style="text-align:center;color:red;display:none;margin-left:15px;" id="seyear">Check Start and
                        End year</span>
                    <!-- <div class="col-sm-6">
                    <label for="">To</label>
                    <input type="date" class="form-control">
                </div> -->
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="">Description</label>
                        <textarea rows="3" cols="3" maxlength="250" class="form-control"
                            placeholder="details about you" name="description"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal"
                        id="btn-add-education">Save</button>
                </div>
                <?php echo form_close(); ?>
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

    $("#btn-add-education").click(function() {
        var btn = $(this);
        var mdl = $("#mdl-add-education");
        var frm = $("#frm-add-education");
        if (!frm.validationEngine("validate")) {
            return false;
        }
        var from = $("#start_yeara").val();
        var to = $("#end_yeara").val();
        if (from > to) {
            $("#seyear").show("slow").delay(5000).hide("slow");
            return false;
        }
        var frmData = new FormData(document.getElementById("frm-add-education"));
        $.ajax({
            url: BASE_URL + "profile/add",
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
                        text: 'You have added education successfully.',
                        type: 'success',
                        confirmButtonColor: '#4fa7f3'
                    })
                    window.location.reload();
                    frm.find("input").each(function() {
                        $(":input").val("");
                    })
                } else {
                    swal({
                        title: 'Failed',
                        text: 'Failed to add education.',
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