<?php
	include ('header.php');
?>

<!-- Add notification assets -->
<script type="text/javascript" src="assets/noty/js/noty/packaged/jquery.noty.packaged.min.js"></script>
<link rel="stylesheet" type="text/css" href="assets/noty/demo/animate.css" media="screen"/>
<script type="text/javascript" src="assets/noty/js/noty/themes/gold.js"></script>

<!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="assets/fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="assets/fancybox/source/jquery.fancybox.css?v=2.1.5" media="screen"/>

<script type="text/javascript" src="assets/custom/js/investments.js"></script>
<script type="text/javascript" src="assets/custom/js/contact.js"></script>


<link rel="stylesheet" type="text/css" href="assets/custom/css/investments.css" media="screen"/>

<div class="container">

    <div class="container">
        <div class="investments-price-div">
            <img class="investments-price-img" src="images/investments/investments_image.jpg" alt="">
        </div>
    </div>

    <hr>

    <div class="jumbotron">
      <div class="container">
        <h2 class="contact_title">Hello, gorgeous!</h2>
        <h4 class="contact_text">For a detailed price quote please contact me at <a href="mailto:melindahumphries82@gmail.com">melindahumphries82@gmail.com</a> or click on the button below to fill out the contact form. I can't wait to hear from you!</h4>
        <p><a class="btn btn-primary btn-lg contact_button" href="#myModal" data-toggle="modal" role="button">Contact Me &raquo;</a></p>
      </div>
    </div>
    <!-- <a class="btn btn-primary btn-lg contact_button" href="javascript:void(0)" onclick="successMail();" role="button">Contact Me &raquo;</a>-->

    <div id="myModal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <!--<a title="Close" class="close fancybox-item fancybox-close" href="javascript:;" data-dismiss="modal" aria-hidden="true"></a>-->
            <button type="button" class="close close_button" title="Close" data-dismiss="modal">
                <span aria-hidden="true"><a title="Close" class="close close_button" href="javascript:;"></a></span>
                <span class="hide">Close</span>
            </button>
            <h2 id="myModalLabel">Let's chat!</h2>
          </div>
          <div class="modal-body">

            <form class="form-horizontal col-sm-12" id="contactForm">
                <div class="form-group">
                    <label for="contact-name">Your Name: <span style="color: #CAA363">*</span></label>
                    <input type="text" class="form-control contact_input" id="contact-name" name="name" placeholder="Your Name" type="text" onblur='validateName()'>
                    <span class='error-message' id='name-error'></span>
                </div>
                <div class="form-group">
                    <label for="contact-phone">Your Phone Number:</label>
                    <input type="tel" class="form-control contact_input" id="contact-phone" name="phone" placeholder="(123) 456-7890" type="text" onblur='validatePhone()'>
                    <span class='error-message' id='phone-error'></span>
                </div>
                <div class="form-group">
                    <label for="contact-email">Your Email address: <span style="color: #CAA363">*</span></label>
                    <input type="email" class="form-control contact_input" id="contact-email" name="email" placeholder="you@mail.com" type="text" onblur='validateEmail()'>
                    <span class='error-message' id='email-error'></span>
                </div>
                <div class="form-group">
                    <div>
                        <label>Reason for Inquiry:</label>
                    </div>
                    <div>
                        <input id="contact-category" class="form-control contact_input" type="text" name="category" list="categoryList" placeholder="Wedding">
                        <datalist id="categoryList">
                            <option value="Wedding">
                            <option value="Engagement">
                            <option value="Prices">
                            <option value="Event">
                            <option value="Fashion">
                            <option value="Family">
                            <option value="General">
                            <option value="Lifestyle">
                            <option value="Pictures">
                            <option value="Photoshoot">
                            <option value="Quote">
                            <option value="Other">
                        </datalist>
                    </div>
                </div>
                <div class="form-group">
                    <label for='contactMessage'>Your Message: <span style="color: #CAA363">*</span></label>
                    <textarea class="form-control contact_input" rows="5" id='contact-message'  name='message' style="resize: none;" placeholder="What's on your mind??" type="text" onblur='validateMessage()'></textarea>
                    <span class='error-message' id='message-error'></span>
                </div>
                <button onclick='return validateForm()' id="submit-button" class="btn btn-default pull-right contact_button">Send</button>
                <button onclick="clearContactForm()" class="btn pull-right" data-dismiss="modal" aria-hidden="true">Cancel</button>
                <span class='error-message pull-left' id='submit-error'></span>
            </form>
          </div>
          <div class="modal-footer" style="border-top:none;">
          </div>
        </div>
      </div>
    </div>

    <hr>

    <h2 style="text-align: center;">Kind Words</h2>
    <div class="testimonial-div">
        <p><a class="fancybox testimonial-image pull-right" rel="gallery" href="images/investments/tori_adam_testimonial.jpg"><img src="images/investments/tori_adam_testimonial_small.png" align="right"></a>
        <p class="testimonial-text">&#8220;You put a lot of faith and trust into your photographer to capture this once in a lifetime day. You depend on them to capture your memories so you can revisit them throughout your life. Melinda photographed every little detail and every special moment, our final wedding is a complete and beautifully documented story of the day from start to finish. My husband and I are beyond grateful to her for being a part of our wedding day. We cannot sing her praises or recommended her enough!&#8221;</p></p>
        <p class="testimonial-signature">-Tori</p>
    </div>

    <br style="clear:both">

    <div class="testimonial-div">
        <p><a class="fancybox testimonial-image pull-left" rel="gallery" href="images/investments/jonna_chip_testimonial.jpg"><img src="images/investments/jonna_chip_testimonial_small.png"></a>
        <p class="testimonial-text">&#8220;My fiancé and I had the privilege of working with Melinda and we were blown away by our engagement pictures! She knew all the great photo spots at the venues and made the experience amazing and we were both so comfortable with her! Sometimes we forgot we were even taking pictures! We love her and we are so thankful for her beautiful work!&#8221;</p></p>
        <p class="testimonial-signature">-Jonna</p>
    </div>

    <br style="clear:both">

    <div class="testimonial-div">
        <p><a class="fancybox testimonial-image pull-right" rel="gallery" href="images/investments/katie_bill_testimonial.jpg"><img src="images/investments/katie_bill_testimonial_small.png"></a>
        <p class="testimonial-text">&#8220;I never could have dreamed that our wedding pictures would turn out so incredible. Melinda was so easy to work with (which made the wedding day much less stressful) and took gorgeous photos. Her turn around time was super fast and the product was outstanding. Almost six months later I'm still showing them off, and one photo in particular is often called &#8220;the coolest picture&#8221; my friends have ever seen.&#8221;</p></p>
        <p class="testimonial-signature">-Katie</p>
    </div>
    
    <br style="clear:both">

    <div class="testimonial-div">
        <p><a class="fancybox testimonial-image pull-left" rel="gallery" href="images/investments/hillary_andy_testimonial.jpg"><img src="images/investments/hillary_andy_testimonial_small.png"></a>
        <p class="testimonial-text">&#8220;We hired Melinda as our wedding photographer and I am so glad that we did! Throughout the day, Melinda was calm, humorous, and had great attention to detail. Because she kept us moving calmly through the day, we never felt rushed. She knew exactly which moments to capture and how, so we never worried about what was being photographed and what wasn't. The bottom line is her photos are fabulous. We couldn't have been happier with our choice and would highly recommend her.&#8221;</p></p>
        <p class="testimonial-signature">-Hillary</p>
    </div>

    <br style="clear:both">

    <hr>

    <br><br>

</div>

<?php
	include ('footer.php');
?>