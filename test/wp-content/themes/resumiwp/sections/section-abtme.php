<?php
global $themebucket_resumi;
?>
<?php if ($themebucket_resumi['section_abtme_display']) { ?>
    <!-- about me section start -->
    <div class="section-about" id="about-me">
        <div class="details">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="about-img wow fadeInUpBig">
                            <img src="<?php echo $themebucket_resumi['section_abtme_mainimg']['url']; ?>" alt="">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="content">
                            <h1 class="section-heading " data-wow-duration="1s"
                                data-wow-delay="0s"><?php echo $themebucket_resumi['section_abtme_title']; ?></h1>

                            <h2 class="section-subheading about" data-wow-duration="1s"
                                data-wow-delay=".2s"><?php echo $themebucket_resumi['section_abtme_subtitle']; ?></h2>

                            <div class="text about" data-wow-duration="1s" data-wow-delay=".4s">
                                <?php echo do_shortcode(wpautop($themebucket_resumi['section_abtme_text'])); ?>
                            </div>
                            <div class="wow bounceIn" data-wow-duration="1s" data-wow-delay="0s">
                                <img class="sign"
                                     src="<?php echo $themebucket_resumi['section_abtme_signature']['url']; ?>" alt="">
                            </div>
                            <?php if (isset($themebucket_resumi['section_abtme_resume']) && trim($themebucket_resumi['section_abtme_resume']) != "") { ?>
                                <div class="custombtn wow bounceIn" data-wow-duration="1s" data-wow-delay=".2s">
                                    <div class="icons">
                                        <i class="fa fa-download"></i>
                                    </div>

                                    <div class="text">
                                        <a href='<?php echo $themebucket_resumi['section_abtme_resume']; ?>'><?php _e("Download Resume", "resumi"); ?></a>
                                    </div>

                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clear">
    </div>
    <!-- about me section end-->
<?php } ?>