
<div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-heading">
                <h1 class="page-title">Terms and Conditions</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?php echo BASE_URL?>"><i class="la la-home font-20"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="<?php echo BASE_URL?>terms-condition">Terms and Conditions</a></li>
                    <li class="breadcrumb-item">Edit</li>
                </ol>
                <div class="top-add-btn">
                    <button class="btn btn-primary mr-2" id="btn-update-page">Submit</button>
                    <a href="<?php echo BASE_URL?>terms-condition"><button class="btn btn-secondary bg-secondary-200">Back</button></a>
                </div>
            </div>
            <div class="page-content fade-in-up">
                <div class="ibox ibox-fullheight">
                    <?php echo form_open("", ["class"=>"form-horizontal", "id" => "frm-edit-page"]); ?>
                        <div class="ibox-body">
                            <div class="form-group mb-4 row">
                                <div class="col-sm-12">
                                    <textarea class="form-control" id="inpt-page-content" name="content"><?php echo $page->content; ?></textarea>
                                </div>
                                <input type="hidden" id="inpt-page-id" name="id" value="<?php echo $page->id; ?>">
                            </div>
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
            <!-- END PAGE CONTENT-->


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
                url: BASE_URL+"page/update_page",
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
                            window.location = BASE_URL+"terms-condition";
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