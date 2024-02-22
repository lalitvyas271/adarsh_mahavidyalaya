<!-- Modal Public profile page-->
<div class="modal fade" id="mdl-edit-education" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <?php echo form_open("", ["class" => "form-horizontal", "id" => "frm-edit-education"]); ?>
                <input type="hidden" name="exp_id" id="exp_id">
                <input type="hidden" name="thumb_img_url" id="thumb_img_url">
                <div class="form-group row">
                    <!-- <div class="col-sm-12">
                        <label for="">Title</label>
                        <input type="text" class="form-control validate[required]" placeholder="title" id="title"
                            name="title">
                    </div> -->
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="">Degree / Course</label>
                        <select class="form-control validate[required]" name="degree" id="sdegree">
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
                        <input type="text" class="form-control validate[required]" placeholder="name" id="college"
                            name="college">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="">Specialization</label>
                        <select class="form-control validate[required]" name="spec" id="spec">
                            <option value="1">B.tech</option>
                            <option value="2">B.C.A</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="">Start Year</label>
                        <select name="start_year" id="start_year" class="form-control mt-1 validate[required]">
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
                        <select name="end_year" id="end_year" class="form-control mt-1 validate[required]">
                            <option value="">Year</option>
                            <?php
$years = range(2000, date("Y", time()));
foreach ($years as $y) {
    echo '<option value="' . $y . '">' . $y . '</option>';
}
?>
                        </select>
                    </div>
                    <span style="text-align:center;color:red;display:none;margin-left:15px;" id="updateyear">Check Start
                        and
                        End year</span>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="">Description</label>
                        <textarea rows="3" cols="3" maxlength="150" class="form-control" id="description"
                            name="description" placeholder="details about you"></textarea>
                    </div>
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal"
                    id="btn-update-education">Save</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<script>
$(function() {
    $(document).on("click", ".btn-edit-education", function() {
        $("#mdl-edit-education").modal("show");
        var id = $(this).attr('data-id');
        var title = $(this).attr('data-title');
        var degree_id = $(this).attr('data-degree_id');
        var start_year = $(this).attr('data-start_year');
        var end_year = $(this).attr('data-end_year');
        var college = $(this).attr('data-college');
        var specialization_id = $(this).attr('data-specialization_id');
        var full_description = $(this).attr('data-full_description');
        
        $("#exp_id").val(id);
        $("#title").val(title);
        $(`#sdegree option[value='${degree_id}']`).attr('selected','selected');
        $(`#start_year option[value='${start_year}']`).attr('selected','selected');
        $(`#end_year option[value='${end_year}']`).attr('selected','selected');
        $(`#spec option[value='${specialization_id}']`).attr('selected','selected');
        $("#college").val(college);
        $("#description").val(full_description);
    });
});
$("#btn-update-education").click(function() {
    var btn = $(this);
    var mdl = $("#mdl-edit-education");
    var frm = $("#frm-edit-education");
    if (!frm.validationEngine("validate")) {
        return false;
    }
    var from = $("#start_year").val();
    var to = $("#end_year").val();

    if (from > to) {
        $("#updateyear").show("slow").delay(5000).hide("slow");
        return false;
    }
    var frmData = new FormData(document.getElementById("frm-edit-education"));
    $.ajax({
        url: BASE_URL + "profile/update_education",
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
                    text: 'You have updated education successfully.',
                    type: 'success',
                    confirmButtonColor: '#4fa7f3'
                })
                setTimeout(() => {
                    window.location.reload();
                }, 2000);
                
                frm.find("input").each(function() {
                    $(":input").val("");
                })
            } else {
                swal({
                    title: 'Failed',
                    text: 'Failed to update education.',
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