<?php
global $themebucket_resumi;
?>
<?php if ($themebucket_resumi['section_skill_display']) { ?>
    <!--skill section start -->
    <div class="section-skill appear" id="skill-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h1 class="section-heading"
                            data-scrollreveal="enter left"><?php echo $themebucket_resumi['section_skill_title']; ?></h1>

                        <h2 class="section-subheading-nobg"
                            data-scrollreveal="enter left"><?php echo $themebucket_resumi['section_skill_subtitle']; ?></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php if (isset($themebucket_resumi['section_skill_skills']) && count($themebucket_resumi['section_skill_skills']) > 0) {
                    $i = 0;
                    foreach ($themebucket_resumi['section_skill_skills'] as $skill) {
                        $skillparts = explode(",", $skill);
                        $sclasses = array(1 => "fadeInLeftBig", 2 => "", 0 => "fadeInRightBig");
                        if (count($skillparts) > 1) {
                            $i++;
                            $j = $i%3;
                            ?>
                            <div class="col-md-4">
                                <div class="skill wow <?php echo $sclasses[$j]; ?> animated">
                                    <div class="name">
                                        <div class="arrow">
                                        </div>
                                        <div class="label">
                                            <?php echo $skillparts[0]; ?>
                                        </div>
                                    </div>
                                    <div class="knob">
						<span class="chart" data-percent="<?php echo trim($skillparts[1]); ?>">
						<span class="percent"><?php echo $skillparts[1]; ?></span>
						</span>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                    }
                }
                ?>
            </div>

            <?php if (isset($themebucket_resumi['section_skill_banner_title']) && ""!=trim($themebucket_resumi['section_skill_banner_title'])) { ?>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="skillnews">
                            <h2><?php echo $themebucket_resumi['section_skill_banner_title']; ?></h2>

                            <h3><?php if (isset($themebucket_resumi['section_skill_banner_subtitle'])) echo $themebucket_resumi['section_skill_banner_subtitle']; ?></h3>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <!--skill section end -->
<?php } ?>