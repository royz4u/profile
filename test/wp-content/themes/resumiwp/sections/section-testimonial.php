<?php
global $themebucket_resumi;
?>
<?php if ($themebucket_resumi['section_testimonial_display']) { ?>
    <!--section testimonial start-->
    <div class="section-testimonial" id="testimonial">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h1 class="section-heading"><?php echo $themebucket_resumi['section_testimonial_title']; ?></h1>

                        <h2 class="section-subheading-nobg"><?php echo $themebucket_resumi['section_testimonial_subtitle']; ?></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div id="testimonial-carousel">
                        <?php
                        $tst_limit = 10;
                        if (isset($themebucket_resumi['section_testimonial_number']))
                            $tst_limit = $themebucket_resumi['section_testimonial_number'];

                        if ($themebucket_resumi['section_testimonial_order'] == 1)
                            $tst_posts = resumi_get_custom_posts("testimonial", $tst_limit, "DESC");
                        else
                            $tst_posts = resumi_get_custom_posts("testimonial", $tst_limit, "ASC");
                        if ($tst_posts) {
                            $i = 0;
                            foreach ($tst_posts as $tp) {
                                $i++;
                                $tst_meta = get_post_meta($tp->ID);
                                ?>
                                <div>
                                    <div class="testimonial-thumb">
                                        <div class="img-frame wow bounceInDown">
                                            <img
                                                src="<?php echo get_template_directory_uri(); ?>/img/quote_photoframe.png"
                                                alt=""/>
                                            <img class="icon"
                                                 src="<?php echo get_template_directory_uri(); ?>/img/quote_circle.png"
                                                 alt=""/>
                                            <img class="person"
                                                 src="<?php echo $tst_meta['_resume_test_image'][0]; ?>"
                                                 alt=""/>
                                        </div>
                                        <div class="details">
                                            <h2><?php if (isset($tst_meta['_resume_test_name'][0])) echo $tst_meta['_resume_test_name'][0]; ?></h2>

                                            <h3><?php if (isset($tst_meta['_resume_test_designation'][0])) echo $tst_meta['_resume_test_designation'][0]; ?></h3>
                                        </div>
                                    </div>
                                    <div class="quote">
                                        <?php if (isset($tst_meta['_resume_test_description'][0])) echo wpautop($tst_meta['_resume_test_description'][0]); ?>
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
    </div>
    <!--section testimonial end-->
    <?php if ($themebucket_resumi['section_testimonial_clients_display']) { ?>
        <div class="client-section">
            <div class="container">
                <div class="clients-logo">
                    <?php
                    if (isset($themebucket_resumi['section_testimonial_clients']) && trim($themebucket_resumi['section_testimonial_clients']) != "") {
                        $cimages = explode(",", trim($themebucket_resumi['section_testimonial_clients']));
                        if (count($cimages) > 0) {
                            ?>
                            <ul>
                                <?php
                                foreach ($cimages as $aid) {
                                    $logo = wp_get_attachment_image_src($aid, "client-logo");
                                    ?>
                                    <li>
                                        <img src="<?php echo $logo[0]; ?> "
                                             alt="client">
                                    </li>
                                <?php } ?>
                            </ul>
                        <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    <?php } ?>
<?php } ?>