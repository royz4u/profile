<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Resumi
 */
?>
<?php
global $themebucket_resumi;
?>
<div class="modal fade" id="portfolioModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="container-fluid portfolio-modal">
        <a class="close modal-exit" data-dismiss="modal" aria-hidden="true">&times;</a>
        <div class="row">
            <div class="col-md-12">
                <div class="modal-img" id="modal-img-container">
                    <img id="modal-img" src= <?php echo get_template_directory_uri()."/img/sticky-logo.png";?> alt="img">
                </div>
            </div>
            <div class="col-md-12">
                <div class="portfolio-modal-content">
                    <h3 id="modal-title">This is title</h3>
                    <p id="modal-desc">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem
                    </p>
                    <a id="modal-url" href="#" target="_blank" class="btn btn-view-all">Live Demo</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php wp_footer(); ?>

</body>
</html>