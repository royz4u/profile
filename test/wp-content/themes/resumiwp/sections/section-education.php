<?php
global $themebucket_resumi;
?>
<?php if ($themebucket_resumi['section_education_display']) { ?>
    <!--section education start-->
    <div class="section-education" id="education">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h1 class="section-heading"><?php echo $themebucket_resumi['section_education_title']; ?></h1>

                        <h2 class="section-subheading-nobg"><?php echo $themebucket_resumi['section_education_subtitle']; ?></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php
                    $exp_limit = 10;
                    if (isset($themebucket_resumi['section_education_number']))
                        $exp_limit = $themebucket_resumi['section_education_number'];

                    if ($themebucket_resumi['section_education_order'] == 1)
                        $exp_posts = resumi_get_custom_posts("education", $exp_limit, "DESC",true,"_resume_edu_time");
                    else
                        $exp_posts = resumi_get_custom_posts("education", $exp_limit, "ASC",true,"_resume_edu_time");
                    if ($exp_posts) {
                        $i = 0;
                        foreach ($exp_posts as $ep) {
                            $i++;
                            $exp_meta = get_post_meta($ep->ID);
                            ?>
                            <div class="education">
                                <div class="details wow slideInLeft">
                                    <div class="content ">
                                        <h2 class="section-subtitle"><?php if (isset($exp_meta['_resume_edu_degree'][0])) echo $exp_meta['_resume_edu_degree'][0]; ?></h2>

                                        <p>
                                            <?php if (isset($exp_meta['_resume_edu_college'][0])) echo $exp_meta['_resume_edu_college'][0]; ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="year">
                                    <div class="reddot left-dot wow bounceIn">
                                    </div>
                                    <div>
                                        <h2 class="section-subtitle"><?php if (isset($exp_meta['_resume_edu_time'][0])) echo $exp_meta['_resume_edu_time'][0]; ?></h2>
                                    </div>
                                    <div class="reddot right-dot wow bounceIn">
                                    </div>
                                </div>
                                <div class="details higherz wow slideInRight">
                                    <div class="content">
                                        <h2 class="section-subtitle"><?php if (isset($exp_meta['_resume_edu_result'][0])) echo $exp_meta['_resume_edu_result'][0]; ?></h2>

                                        <?php if (isset($exp_meta['_resume_edu_description'][0])) echo do_shortcode(wpautop($exp_meta['_resume_edu_description'][0])); ?>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!--section education end-->
<?php } ?>