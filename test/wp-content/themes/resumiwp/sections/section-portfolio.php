<?php
global $themebucket_resumi;
if (isset($themebucket_resumi['section_portfolio_display_standard']) && $themebucket_resumi['section_portfolio_display_standard'] == '1') {
    get_template_part("sections/section-portfolio2");
} else {

    if ($themebucket_resumi['section_portfolio_display'] && isset($themebucket_resumi['section_portfolio_shortcode'])) {
        $portfolio_post = $themebucket_resumi['section_portfolio_gallery'];
        $tags = array();
        $attachments = new Attachments('resume_portfolio', $portfolio_post);
        if ($attachments->exist()) {
            while ($attachment = $attachments->get()) {
                $_tag = str_replace(", ", ",", $attachments->field("tags"));
                $atags = explode(",", $_tag);
                $tags = array_unique(array_merge($tags, $atags));
            }
        }
        ?>

        <!--section portfolio start-->
        <div class="section-portfolio" id="portfolio">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h1 class="section-heading"><?php echo $themebucket_resumi['section_portfolio_title']; ?></h1>

                            <h2 class="section-subheading-nobg"><?php echo $themebucket_resumi['section_portfolio_subtitle']; ?></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        if (isset($themebucket_resumi['section_portfolio_shortcode']))
                            echo do_shortcode($themebucket_resumi['section_portfolio_shortcode']);
                        ?>
                    </div>
                </div>
            </div>
            <!--section portfolio end-->
        </div>
    <?php
    }
}
?>