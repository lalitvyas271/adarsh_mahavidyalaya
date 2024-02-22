<div class="inner-page-banner-area" style="background-image: url('assets/img/banner/5.jpg');">
            <div class="container">
                <div class="pagination-area">
                    <h1>Contact Us 02</h1>
                    <ul>
                        <li><a href="#">Home</a> -</li>
                        <li>Contact</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Inner Page Banner Area End Here -->
        <!-- Contact Us Page 2 Area Start Here -->
        <div class="contact-us-page2-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                        <h2 class="title-default-left title-bar-high">Information</h2>
                        <div class="contact-us-info2">
                            <ul>
                                <li><i class="fa fa-map-marker" aria-hidden="true"></i>PO Box 16122 Collins Street West Victoria 8007 Australia</li>
                                <li><i class="fa fa-phone" aria-hidden="true"></i>+61 3 8376 6284</li>
                                <li><i class="fa fa-envelope-o" aria-hidden="true"></i>academics@gmail.co</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <h2 class="title-default-left title-bar-high">Contact With Us</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="contact-form2">
                            <?php echo form_open("contact_us", ["role" => "form", "id" => "frm-contact-us", "data-toggle" => "validator", "onsubmit" => "return false"]); ?>
                                    <fieldset>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" placeholder="Name*" class="form-control validate[required]" name="name">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="email" placeholder="Email*" class="form-control validate[required,custom[email]]" name="email">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="number" placeholder="Mobile*" class="form-control validate[required]" name="mobile">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea placeholder="Message*" class="textarea form-control validate[required]" name="message"></textarea>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-md-12">
                                            <div class="form-group margin-bottom-none">
                                                <button type="button" id="btn-submit" class="default-big-btn">Send Message</button>
                                            </div>
                                        </div>
                                        <div class="col-xl-8 col-lg-8 col-md-6 col-md-12">
                                            <div class='form-response'></div>
                                        </div>
                                    </fieldset>
                                    <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="google-map-area">
                        <div id="googleMap" style="width:100%; height:395px;"></div>
                    </div>
                </div>
            </div>
        </div>

        <script>
$(function() {
    $("#btn-submit").click(function() {
        var frm = $("#frm-contact-us");
        if (!frm.validationEngine("validate")) {
            return false;
        }
        var data = frm.serialize();
        $.ajax(BASE_URL + 'contact_us/save', {
            type: "POST",
            data: data,
            success: function(res) {
                if (res.status) {
                    swal({
                        title: 'Sent',
                        text: 'Enquiry Submitted ! we will contact you soon.',
                        type: 'success',
                        confirmButtonColor: '#4fa7f3'
                    }).then((value) => {
                        frm.find("input").each(function(){
                            $(this).val("");
                        })
                    });
                   
                     
                } else {
                    alert(res.msg);
                }
            },
            error: function(jqXhr, textStatus, errorMessage) { // error callback
                console.log(errorMessage);
            }
        });
    })
})
</script>