<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <ol class="breadcrumb float-left">
                        <li class="breadcrumb-item"><a href="<?php BASE_URL; ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php base_url("manage_cms"); ?>">Manage CMS</a></li>
                        <li class="breadcrumb-item"><a>Manage Terms Condition</a></li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <?php echo form_open("", ["id" => "frm-edit-page"]); ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">
                        <div class="form-group m-b-10 row">
                            <textarea id="inpt-page-content" name="content"><?php echo $page->content; ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">
                        <!-- <h4 class="header-title m-t-0 m-b-20">Bootstrap MaxLength</h4> -->
                        <a class="btn btn-success waves-effect waves-light" id="btn-update-page">Update</a>
                        <a href="<?php echo base_url('manage_cms'); ?>" class="btn btn-danger waves-effect waves-light">Cancel</a>
                    </div> <!-- end card-box -->
                </div> <!-- end col -->
            </div>
            <input type="hidden" id="inpt-page-id" name="id" value="<?php echo $page->id; ?>">
        <?php echo form_close(); ?>
    </div>
</div>
<script>
    $(function(){
        CKEDITOR.replace( 'content' );
        var btn = $("#btn-update-page"),
        frm = $("#frm-edit-page");
        btn.click(function(){
            if(!frm.validationEngine("validate")){
                return;
            }
            var content = CKEDITOR.instances['inpt-page-content'].getData();
            var id = $("#inpt-page-id").val();
            $.ajax({
                type: "POST",
                url: BASE_URL+"manage_cms/update_page",
                data: {id:id, content:content},
                dataType: 'json',
                beforeSend: function(){
                    btn.html("Updating...").addClass("disabled");
                },
                success: function(res){
                    if(res.status == 1){
                        swal({
                            title: 'Updated',
                            text: res.msg,
                            type: 'success',
                            confirmButtonColor: '#4fa7f3'
                        }).then((value) => {
                            window.location = BASE_URL+"manage_cms";
                        });
                    }else{                        
                        swal({
                            title: 'Failed',
                            text: res.msg,
                            type: 'error',
                            confirmButtonColor: '#4fa7f3'
                        })
                    }
                },
                complete: function(){
                    btn.html("Update").removeClass("disabled");
                },
                error: function(res){
                    swal({
                        title: 'Failed',
                        text: res.message,
                        type: 'error',
                        confirmButtonColor: '#4fa7f3'
                    })
                }
            });
        })
    });
</script>
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>