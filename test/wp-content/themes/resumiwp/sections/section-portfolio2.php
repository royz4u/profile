<?php
global $themebucket_resumi;
?>
<?php
if ($themebucket_resumi['section_portfolio_display'] && isset($themebucket_resumi['section_portfolio_gallery'])) {
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
                    <section>
                        <!-- THE FILTER STYLED FOR MEGAFOLIO -->
                        <div class="tags filter-nav">
                            <ul>
                                <li class="filter selected" data-category="cat-all"><?php _e("ALL", "resumi"); ?></li>
                                <?php
                                foreach ($tags as $tag) {
                                    if(trim($tag)!="")
                                    echo "<li class='filter' data-category='{$tag}'>{$tag}</li>";
                                }
                                ?>

                            </ul>
                        </div>

                        <div class="clear">
                        </div>
                        <?php
                        $attachments = new Attachments('resume_portfolio', $portfolio_post);
                        if ($attachments->exist()) {
                            ?>
                            <div class="container_folio">
                                <!-- The GRID System -->
                                <div class="megafolio-container light-bg-entries">
                                    <?php
                                    while ($attachment = $attachments->get()) {
                                        $atags = explode(",", $attachments->field("tags"));
                                        $tags = array_unique(array_merge($tags, $atags));
                                        $_tag = str_replace(", ", " ", $attachments->field("tags"));
                                        $_tag = str_replace(",", " ", $attachments->field("tags"));
                                        //get_template_part("section-templates/portfolio", "item");
                                        {
                                            ?>
                                            <!-- A GALLERY ENTRY -->

                                            <div class="mega-entry <?php echo $_tag;?> cat-all" data-src="<?php echo $attachments->src('portfolio-thumb'); ?>" data-width="577" data-height="500">
                                                <div class="mega-hover alone">
                                                    <div class="mega-hovertitle"><?php echo $attachments->field("title");?></div>

                                                    <a href="<?php echo $attachments->src('portfolio-items'); ?>" class="image-link">
                                                        <div class="mega-hoverview"></div>
                                                        <div class="img-desc">
                                                            <?php echo $attachments->field("description");?>
                                                        </div>
                                                        <div class="img-title">
                                                            <?php echo $attachments->field("title");?>
                                                        </div>
                                                        <div class="img-url">
                                                            <?php echo $attachments->field("url");?>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                    }
                                    ?>

                                </div>
                            </div>
                        <?php } ?>
                    </section>
                </div>
            </div>
        </div>
        <!--section portfolio end-->
    </div>
<?php } ?>