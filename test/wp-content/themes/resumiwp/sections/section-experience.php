<?php
global $themebucket_resumi;
?>
<?php if ($themebucket_resumi['section_experience_display']) { ?>
    <!--experience section start -->
    <div class="section-experience" id="experiences">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h1 class="section-heading"><?php echo $themebucket_resumi['section_experience_title']; ?></h1>

                        <h2 class="section-subheading-nobg"><?php echo $themebucket_resumi['section_experience_subtitle']; ?></h2>
                    </div>
                </div>
            </div>
            <?php
            $exp_limit = 10;
            if (isset($themebucket_resumi['section_experience_number']))
                $exp_limit = $themebucket_resumi['section_experience_number'];

            if ($themebucket_resumi['section_experience_order'] == 1)
                $exp_posts = resumi_get_custom_posts("experience", $exp_limit, "DESC", true,"_resume_exp_duration");
            else
                $exp_posts = resumi_get_custom_posts("experience", $exp_limit, "ASC", true,"_resume_exp_duration");
            if ($exp_posts) {
                $i = 0;
                ?>
                <div class="experience-timeline">
                    <?php
                    foreach ($exp_posts as $ep) {
                        $i++;
                        $exp_meta = get_post_meta($ep->ID);
                        ?>
                        <div class="row <?php if ($i == 1) echo "first"; ?>">
                            <?php if ($i % 2 == 1) { ?>
                                <div class="col-md-6 col-xs-6 mobile-view">
                                    <div class="timeline-divider wow bounceIn">
                                        <i class="fa <?php if(isset($exp_meta['_resume_exp_working'])) echo "fa-check"; else echo "fa-times";?>"></i>
                                    </div>
                                    <div class="timeline-details left wow slideInLeft">
                                        <div class="skill">
                                            <h2 class="skill-heading tar">
                                                <?php if (isset($exp_meta['_resume_exp_url'][0])) echo "<a target='_blank' href='" . $exp_meta['_resume_exp_url'][0] . "'>"; ?>
                                                <?php if (isset($exp_meta['_resume_exp_name'][0])) echo $exp_meta['_resume_exp_name'][0]; ?>
                                                <?php if (isset($exp_meta['_resume_exp_url'][0])) echo "</a>"; ?>
                                            </h2>

                                            <h3 class="skill-subheading tar"><?php if (isset($exp_meta['_resume_exp_position'][0])) echo $exp_meta['_resume_exp_position'][0]; ?></h3>

                                            <div class="tar">
                                                <?php if (isset($exp_meta['_resume_exp_description'][0])) echo do_shortcode(wpautop($exp_meta['_resume_exp_description'][0])); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-6 mobile-view">
                                    <div class="timeline-marker right fl wow slideInRight">
                                        <div class="timeline-date">
                                            <?php if (isset($exp_meta['_resume_exp_duration'][0])) echo $exp_meta['_resume_exp_duration'][0]; ?>
                                        </div>
                                        <div class="arrow-left">
                                        </div>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="col-md-6 col-xs-6 mobile-view">
                                    <div class="timeline-divider wow bounceIn">
                                        <i class="fa <?php if(isset($exp_meta['_resume_exp_working'])) echo "fa-check"; else echo "fa-times";?>"></i>
                                    </div>
                                    <div class="timeline-marker left fr wow slideInLeft">
                                        <div class="timeline-date">
                                            <?php if (isset($exp_meta['_resume_exp_duration'][0])) echo $exp_meta['_resume_exp_duration'][0]; ?>
                                        </div>
                                        <div class="arrow-right">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-6 mobile-view">
                                    <div class="timeline-details right wow slideInRight">
                                        <div class="skill">
                                            <h2 class="skill-heading">
                                                <?php if (isset($exp_meta['_resume_exp_url'][0])) echo "<a target='_blank' href='" . $exp_meta['_resume_exp_url'][0] . "'>"; ?>
                                                <?php if (isset($exp_meta['_resume_exp_name'][0])) echo $exp_meta['_resume_exp_name'][0]; ?>
                                                <?php if (isset($exp_meta['_resume_exp_url'][0])) echo "</a>"; ?>
                                            </h2>

                                            <h3 class="skill-subheading"><?php if (isset($exp_meta['_resume_exp_position'][0])) echo $exp_meta['_resume_exp_position'][0]; ?></h3>

                                            <?php if (isset($exp_meta['_resume_exp_description'][0])) echo wpautop($exp_meta['_resume_exp_description'][0]); ?>

                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <!--experience section end -->
    <div class="clear">
    </div>


    <?php if ($themebucket_resumi['section_experience_counter_display']) { ?>
        <!--counter section start -->
        <div class="section-counter">
            <div class="container">
                <div class="row vc">
                    <?php if (isset($themebucket_resumi['section_experience_counters']) && count($themebucket_resumi['section_experience_counters']) > 0) {
                        $i = 0;
                        foreach ($themebucket_resumi['section_experience_counters'] as $counter) {
                            $cparts = explode(",", $counter);
                            if (count($cparts) > 1) {
                                $i++;
                                $cclasses = array(1 => "fr", 2 => "fc", 3 => "fl");
                                ?>
                                <div class="col-md-4 col-sm-4">
                                    <div class="counter <?php echo $cclasses[$i]; ?>">
                                        <div class="text-title">
                        <span class="numeric-count number-animate" data-value="<?php echo trim($cparts[0]); ?>"
                              data-animation-duration="1500">0</span>
                                        </div>
                                        <div class="text-subtitle">
                                            <?php echo trim($cparts[1]); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <!--counter section end-->
    <?php } ?>
<?php } ?>