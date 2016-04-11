<?php
	include ('header.php');
?>
<!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="assets/fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="assets/fancybox/source/jquery.fancybox.css?v=2.1.5" media="screen"/>

<script type="text/javascript">
    $(document).ready(function() {
        $('#menu-item-investments').addClass('active');
        $(".fancybox").fancybox({

            padding: 0,

            openEffect : 'none',
            closeEffect : 'none',
            nextEffect : 'none',
            prevEffect : 'none',

            closeClick : true,

            helpers : {
                title : {
                    type : 'inside'
                },
                overlay : {
                    css : {
                        'background' : 'rgba(238,238,238,0.85)'
                    }
                }
            }
        });
    });
</script>

<link rel="stylesheet" type="text/css" href="assets/custom/css/investments.css" media="screen"/>

<div class="container">
	
    <div class="subpage-quote-div">
    	<h2 class="subpage-quote-text">A picture is worth...</h2>
    </div>
    
    <div class="container">
        <div class="investments-price-div">
            <img class="investments-price-img" src="images/investments/investments_image.jpg" alt="">
        </div>
    </div>

    <hr>

    <h3 style="text-align: center;"><em>KIND WORDS</em></h3>
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

    <div class="subpage-quote-div">
    	<h2 class="subpage-quote-text">... a memory for a lifetime</h2>
    </div>

    <br><br>

</div>

<?php
	include ('footer.php');
?>