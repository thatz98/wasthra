<?php require 'views/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/contact_us.css">


<div class="contact-us">
    <div class="row-top" style="justify-content: center;">
        <div class="col-2">
            <div class="form-container" style="width:100%;">
                <div class="row">
                    <h2 class="title title-min">Get in Touch</h2>
                </div>
                <form action="post" id="editFrom" method="post">
                    <div class="row">
                        <div class="col-3">
                            <div class="helper-text">
                                <label>First Name</label><br>
                                <input type="text" name="first_name" data-helper="First Name"
                                    onfocusout="validateFirstName()" id="first_name_contact">
                                <span class="popuptext"></span>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="helper-text">
                                <label>Last Name</label><br>
                                <input type="text" name="last_name" data-helper="Last Name"
                                    onfocusout="validateLastName()" id="last_name_contact">
                                <span class="popuptext"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="helper-text">
                                <label>Mobile Number</label><br>
                                <input type="text" name="contact_no" data-helper="Mobile No." placeholder="07XXXXXXXX"
                                    onfocusout="validateContactNoM()" id="contact_no_contact">
                                <span class="popuptext"></span>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="helper-text">
                                <label>Email</label><br>
                                <input type="email" name="email" data-helper="Email" onfocusout="validateEmailM()"
                                    id="email _contact">
                                <span class="popuptext"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="helper-text">
                                <label>Message</label><br>
                                <textarea rows="3" cols="30" id="message_contact" name="message"   data-helper="Message" onfocusout="validateMessage()"></textarea>
                                <span class="popuptext"></span>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <button type="submit" class="btn">Send Message</button>
                    </div>

                </form>


            </div>

        </div>
        <div class="col-3" style="margin-bottom: 0;">
            <div class="form-container" style="width:100%; padding-top: 45px;">
                <div class="row">
                    <h2 class="min"><i class="fa fa-phone" aria-hidden="true"></i></h2>
                </div>

                <div class="row">
                    <h3 class="x-min">0777 373 88 77</h3>

                </div>
                <div class="row">
                    <h2 class="min"><i class="fa fa-envelope" aria-hidden="true"></i></h2>
                </div>
                <div class="row">
                    <h3 class="x-min">wasthraofz@gmail.com</h3>

                </div>
                <div class="row">
                    <h2 class="min"><i class="fa fa-map-marker" aria-hidden="true"></i></h2>
                </div>
                <div class="row">
                    <h3 class="x-min">3D, 3rd Lane, Wewala, Horana</h3>
                </div>
                <div class="row">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.4321638056863!2d80.06114251398914!3d6.716999922749031!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae24b2a184e0ac7%3A0x10a5ca84af51cc59!2sHORANA%20BUS%20STAND!5e0!3m2!1sen!2slk!4v1605302096473!5m2!1sen!2slk"
                        width="80%" height="150" frameborder="0" style="border:0;" allowfullscreen=""
                        aria-hidden="false" tabindex="0"></iframe>
                </div>

            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo URL ?>public/js/form_validation.js"></script>
<script type="text/javascript" src="<?php echo URL ?>util/form/contact_us_form_validation.js"></script>
<?php require 'views/footer.php'; ?>