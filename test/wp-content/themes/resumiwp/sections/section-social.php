<?php
global $themebucket_resumi;
?>
<?php if ($themebucket_resumi['section_social_display']) { ?>
    <div class="connect-section" id="connect">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h1 class="section-heading"><?php echo $themebucket_resumi['section_social_title']; ?></h1>
                        <h2 class="section-subheading-nobg"><?php echo $themebucket_resumi['section_social_subtitle']; ?></h2>

                        <div class="socail-link">
                            <?php
                            $social_icons = array("facebook","dribbble","email","envato","flickr","freelancer","github","linkedin","instagram","twitter","youtube","odesk","googleplus","pinterest");
                            foreach($social_icons as $social) {
                                if (isset($themebucket_resumi["section_social_{$social}"]) && trim($themebucket_resumi["section_social_{$social}"]) != "") {
                                    ?>
                                    <a href="<?php echo $themebucket_resumi["section_social_{$social}"]; ?>"><img
                                            src="<?php echo get_template_directory_uri();?>/img/social-icons/<?php echo $social;?>.png" alt=""/></a>
                                <?php
                                }
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>