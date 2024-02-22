<!-- Modal Public profile page-->
<div class="modal fade" id="mdl-edit-profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open("", ["class" => "form-horizontal", "id" => "frm-edit-profile"]); ?>
                <input type="hidden" name="pid" id="pid" />
                <input type="hidden" name="usid" id="usid" />
                <input type="hidden" name="bgimg" id="bgimg" />
                <input type="hidden" name="pfimg" id="pfimg" />
                <div class="form-group row">
                    <div class="col-md-12 text-center">
                        <img src="" id="pf-img" width="50" height="50" style="margin: 0 auto;">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="">First Name</label>
                        <input type="text" class="form-control validate[required]" maxlength="15" placeholder="first name" name="fname"
                            id="fname">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="">Last Name</label>
                        <input type="text" class="form-control validate[required]" maxlength="15" placeholder="last name" name="lname"
                            id="lname">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="">Short Description</label>
                        <input type="text" maxlength="100" class="form-control" value="" placeholder="Short Description"
                            name="specialist" id="specialist">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="">Edit Profile Image</label>
                        <input type="file" class="form-control" name="pf_image" id="pf_image">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="">Edit Banner Image</label>
                        <input type="file" class="form-control" name="bg_image" id="bg_image">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary " data-dismiss="modal" data-toggle="modal"
                        id="btn-update-dp">Save</button>
                </div>
                <?php echo form_close(); ?>
            </div>

        </div>
    </div>
</div>

<script>
$(function() {

    $(document).on("click", ".btn-edit-profile", function() {
        var id = $(this).attr("data-id");
        var user_id = $(this).attr("data-user_id");
        var fname = $(this).attr("data-fname");
        var lname = $(this).attr("data-lname");
        var profession = $(this).attr("data-profession");
        var background_img_url = $(this).attr("data-background_img_url");
        var profile_image_url = $(this).attr("data-profile_image_url");

        $("#pid").val(id);
        $("#usid").val(user_id);
        $("#fname").val(fname);
        $("#lname").val(lname);
        $("#specialist").val(profession);
        $("#bgimg").val(background_img_url);
        $("#pfimg").val(profile_image_url);
        if(background_img_url == ''){
            background_img = "https://friendly-uploads.s3.ap-south-1.amazonaws.com/80c33aa9ac927d8dd81958010f2365da.jpg";
        }else{
            background_img = background_img_url;
        }

        if(profile_image_url == ''){
            profile_image = "https://friendly-uploads.s3.ap-south-1.amazonaws.com/e9cec5239ecba35826234dbdeb3e74f0.jpg";
        }else{
            profile_image = profile_image_url;
        }
        $("#bg-img").attr("src", background_img);
        $("#pf-img").attr("src", profile_image);
        $("#mdl-edit-profile").modal("show");
    });

    $("#btn-update-dp").click(function() {
        var btn = $(this);
        var mdl = $("#mdl-edit-profile");
        var frm = $("#frm-edit-profile");
        if (!frm.validationEngine("validate")) {
            return false;
        }
        var frmData = new FormData(document.getElementById("frm-edit-profile"));
        $.ajax({
            url: BASE_URL + "profile/edit_profile",
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
                        text: 'Profile updated successfully',
                        type: 'success',
                        confirmButtonColor: '#4fa7f3'
                    });
                    setTimeout(() => {
                        window.location.reload();
                    }, 2000);
                    
                    frm.find("input").each(function() {
                        $(this).val("");
                    })
                } else {
                    swal({
                        title: 'Failed',
                        text: 'Failed to update profile.',
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