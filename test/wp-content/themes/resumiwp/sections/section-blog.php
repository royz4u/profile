<?php
global $themebucket_resumi;
?>
<?php if ($themebucket_resumi['section_blog_display']) { ?>
    <!--section works start-->
    <div class="section-works" id="blog">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h1 class="section-heading"><?php echo $themebucket_resumi['section_blog_title']; ?></h1>

                        <h2 class="section-subheading-nobg"><?php echo $themebucket_resumi['section_blog_subtitle']; ?></h2>
                    </div>
                </div>
            </div>
            <div class="blog-container">
                <?php
                if(isset($themebucket_resumi['section_blog_number']))
                    $count = $themebucket_resumi['section_blog_number'];
                else
                    $count=10;
                $posts = resumi_get_custom_posts("post",$count);
                if($posts){
                    foreach($posts as $post){
                        setup_postdata($post);
                        if(get_post_format()=="quote"){
                            ?>
                            <div class="item">
                                <div class="post-content">
                                    <div class="quote-post">
                                        <blockquote>
                                            <i class="fa fa-quote-left q-icon"></i>
                                            <?php the_content();?>
                                        </blockquote>
                                        <a href="#" class="q-poster"><?php the_title();?></a>
                                    </div>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="item">
                                <div class="post-content">
                                    <div class="post-img">
                                        <a href="<?php the_permalink();?>">
                                            <?php the_post_thumbnail("home-blog-thumb");?>
                                        </a>
                                    </div>
                                    <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>

                                    <div class="post-meta">
                                        <?php the_author();?>, <?php echo get_the_date("d M, y");?>
                                    </div>
                                    <?php the_excerpt();?>

                                    <div class="post-action">
                                        <a href="#"><?php echo get_comments_number();?> Comments</a>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                    }
                }
                ?>

            </div>
            <div class="row">
                <div class="col-md-12 btn-load">
                    <a href="<?php echo resumi_get_blog_link();?>" class="btn btn-view-all">View All Posts</a>
                </div>
            </div>
        </div>
    </div>
    <!--section works end-->
<?php } ?>