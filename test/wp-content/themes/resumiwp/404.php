<html>
<head>
    <title></title>
    <style>

        /*404 page*/

        /* Import fonts */
        /*@import url(http://fonts.googleapis.com/css?family=Lato:100,300,400);*/
        body{
            font-family: 'Lato', sans-serif;
        }

        .error-wrap {
            width: 60%;
            margin: 5% auto 0;
            text-align: center;

        }

        .error-wrap h1 {
            font-size: 60px;
            color: #f07663;
            font-family: 'Lato', sans-serif;

        }

        .error-wrap h2 {
            font-size: 40px;
            color: #a1a2a3;
            text-transform: uppercase;
            font-family: 'Lato', sans-serif;
            margin: 0;
        }

        .error-wrap p {
            font-size: 30px;
            font-weight: 300;
            margin: 0;
            color: #a1a2a3;
        }

        .back-btn {
            background:#F07663;
            border-radius: 6px;
            -webkit-border-radius: 6px;
            color: #FFFFFF;
            font-weight: 300;
            margin: 50px 0;
            padding: 15px 40px;
            transition: all 0.3s ease 0s;
            -webkit-transition: all 0.3s ease 0s;
            margin-top: 30px;
            display: inline-block;
            text-decoration: none;
        }

        .back-btn:hover {
            background: #595959;
            transition: all 0.3s ease 0s;
            -webkit-transition: all 0.3s ease 0s;
            color: #fff;
        }

        @media (max-width: 768px) {
            .error-wrap img {
                width: 100%;
            }
        }
    </style>
</head>
<body>
<?php
global $themebucket_resumi;

?>
<div class="error-wrap">
    <h1><?php if(isset($themebucket_resumi['settings_404_heading'])) echo $themebucket_resumi['settings_404_heading'];?></h1>
    <img src="<?php echo get_template_directory_uri();?>/img/404-error.png" alt="">

    <h2><?php if(isset($themebucket_resumi['settings_404_subheading']))  echo $themebucket_resumi['settings_404_subheading'];?></h2>

    <p><?php if(isset($themebucket_resumi['settings_404_subheading'])) echo  $themebucket_resumi['settings_404_text'];?></p>
    <a href="<?php echo site_url();?>" class="back-btn"><?php echo __('Back to Homepge','resumi');?></a>
</div>
</body>
</html>