<?php
include 'connection.php';
$postlimite = 5;
$posts = $db->prepare("SELECT * FROM `post` LIMIT 5");
$posts->execute();


// $nbcom = $db->prepare("SELECT COUNT(*) FROM `comment` WHERE `id` = :id;")
// $nbcom->execute();

?>

<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->

<head>

    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <title>Ask me – Responsive Questions and Answers Template</title>
    <meta name="description" content="Ask me Responsive Questions and Answers Template">
    <meta name="author" content="vbegy">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Main Style -->
    <link rel="stylesheet" href="style.css">

    <!-- Skins -->
    <link rel="stylesheet" href="css/skins/skins.css">

    <!-- Responsive Style -->
    <link rel="stylesheet" href="css/responsive.css">

    <!-- Dark Style -->
    <link rel="stylesheet" href="css/dark.css">

    <!-- Favicons -->
    <link rel="shortcut icon" href="images/favicon.png">

</head>

<body>


    <div class="loader">
        <div class="loader_html"></div>
    </div>

    <div id="wrap" class="grid_1200">






        <header id="header">
            <section class="container clearfix">
                <div class="logo">
                    <a href="index.html"><img alt="" src="images/logo.png"></a>
                </div>

            </section>
            <!-- End container -->
        </header>
        <!-- End header -->

        <div class="breadcrumbs">
            <section class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Blog 1</h1>
                    </div>
                    <div class="col-md-12">
                        <div class="crumbs">
                            <a href="#">Home</a>
                            <span class="crumbs-span">/</span>
                            <span class="current">Blog 1 full width</span>
                        </div>
                    </div>
                </div>
                <!-- End row -->
            </section>
            <!-- End container -->
        </div>
        <!-- End breadcrumbs -->

        <section class="container main-content page-full-width">
            <div class="row">
                <div class="col-md-12">
                <?php 
                	while($post = $posts->fetch(PDO::FETCH_ASSOC)){
                		$comcount = $db->prepare("SELECT count(*) AS nb_comment FROM `comment` WHERE `id_post` = ".$post['id']);
                		$comcount->execute();
                		$postcount = $db->prepare("SELECT count(*) AS post_count FROM `post`");
                		$postcount->execute();
                		$nbpost= $postcount->fetch();
                		$nbcom= $comcount->fetch();
                		$txtstring = $post['texte'];
                		$maxword = 200;
                		$articlelink = 'single_post_full_width.php?id='.$post['id'];
                		if(strlen($txtstring) > $maxword){
                			$txtstring = substr($txtstring, 0,$maxword).' ...';
                		}
                		
                		echo'
							<article class="post clearfix">
                        <div class="post-inner">
                            <h2 class="post-title"><span class="post-type"><i class="icon-file-alt"></i></span><a href="'.$articlelink.'">'.$post['titre'].'</a></h2>
                            <div class="post-meta">
                                <span class="meta-author"><i class="icon-user"></i><a href="#">'.$post['auteur'].'</a></span>
                                <span class="meta-date"><i class="icon-time"></i>'.$post['date'].'</span>
                                <span class="meta-categories"><i class="icon-suitcase"></i><a href="#">Wordpress</a></span>
                                <span class="meta-comment"><i class="icon-comments-alt"></i><a href="#">'.$nbcom['nb_comment'].' comments</a></span>
                            </div>
                            <div class="post-content">
                                <p>'.$txtstring.' </p>
                                <a href="'.$articlelink.'" class="post-read-more button color small">Continue reading</a>
                            </div>
                            <!-- End post-content -->
                        </div>
                        <!-- End post-inner -->
                    </article>
                    <!-- End article.post -->
		'
                	;}
                ?>


                    <div class="pagination">
                        <a href="#" class="prev-button"><i class="icon-angle-left"></i></a>
                        <span class="current">1</span>
                        
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#">4</a>
                        <a href="#">5</a>
                        <span>...</span>
                        <a href="#">11</a>
                        <a href="#">12</a>
                        <a href="#">13</a>
                        <a href="#" class="next-button"><i class="icon-angle-right"></i></a>
                    </div>
                    <!-- End pagination -->
                </div>
                <!-- End main -->
            </div>
            <!-- End row -->
        </section>
        <!-- End container -->

        <footer id="footer">
            <section class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="widget widget_contact">
                            <h3 class="widget_title">Where We Are ?</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi adipiscing gravida odio, sit amet suscipit risus ultrices eu.</p>
                            <ul>
                                <li>
                                    <span>Address :</span> Ask Me Network, 33 Street, syada Zeinab, Cairo, Egypt.
                                </li>
                                <li>
                                    <span>Support :</span>Support Telephone No : (+2)01111011110
                                </li>
                                <li>Support Email Account : info@example.com</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="widget">
                            <h3 class="widget_title">Quick Links</h3>
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li><a href="ask_question.html">Ask Question</a></li>
                                <li><a href="#">About</a></li>
                                <li><a href="cat_question.html">Questions</a></li>
                                <li><a href="user_profile.html">Users</a></li>
                                <li><a href="blog_1.html">Blog</a></li>
                                <li><a href="right_sidebar.html">Pages</a></li>
                                <li><a href="shortcodes.html">Shortcodes</a></li>
                                <li><a href="contact_us.html">Contact Us</a></li>
                                <li><a href="#">FAQs</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="widget">
                            <h3 class="widget_title">Popular Questions</h3>
                            <ul class="related-posts">
                                <li class="related-item">
                                    <h3><a href="#">This is my first Question</a></h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer lorem quam.</p>
                                    <div class="clear"></div><span>Feb 22, 2014</span>
                                </li>
                                <li class="related-item">
                                    <h3><a href="#">This Is My Second Poll Question</a></h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer lorem quam.</p>
                                    <div class="clear"></div><span>Feb 22, 2014</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="widget widget_twitter">
                            <h3 class="widget_title">Latest Tweets</h3>
                            <div class="tweet_1"></div>
                        </div>
                    </div>
                </div>
                <!-- End row -->
            </section>
            <!-- End container -->
        </footer>
        <!-- End footer -->
        <footer id="footer-bottom">
            <section class="container">
                <div class="copyrights f_left">Copyright 2014 Ask me | <a href="#">By 2code</a></div>
                <div class="social_icons f_right">
                    <ul>
                        <li class="twitter"><a original-title="Twitter" class="tooltip-n" href="#"><i class="social_icon-twitter font17"></i></a></li>
                        <li class="facebook"><a original-title="Facebook" class="tooltip-n" href="#"><i class="social_icon-facebook font17"></i></a></li>
                        <li class="gplus"><a original-title="Google plus" class="tooltip-n" href="#"><i class="social_icon-gplus font17"></i></a></li>
                        <li class="youtube"><a original-title="Youtube" class="tooltip-n" href="#"><i class="social_icon-youtube font17"></i></a></li>
                        <li class="skype"><a original-title="Skype" class="tooltip-n" href="skype:#?call"><i class="social_icon-skype font17"></i></a></li>
                        <li class="flickr"><a original-title="Flickr" class="tooltip-n" href="#"><i class="social_icon-flickr font17"></i></a></li>
                        <li class="rss"><a original-title="Rss" class="tooltip-n" href="#"><i class="social_icon-rss font17"></i></a></li>
                    </ul>
                </div>
                <!-- End social_icons -->
            </section>
            <!-- End container -->
        </footer>
        <!-- End footer-bottom -->
    </div>
    <!-- End wrap -->

    <div class="go-up"><i class="icon-chevron-up"></i></div>

    <!-- js -->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-ui-1.10.3.custom.min.js"></script>
    <script src="js/jquery.easing.1.3.min.js"></script>
    <script src="js/html5.js"></script>
    <script src="js/jflickrfeed.min.js"></script>
    <script src="js/jquery.inview.min.js"></script>
    <script src="js/jquery.tipsy.js"></script>
    <script src="js/tabs.js"></script>
    <script src="js/jquery.flexslider.js"></script>
    <script src="js/jquery.carouFredSel-6.2.1-packed.js"></script>
    <script src="js/jquery.scrollTo.js"></script>
    <script src="js/jquery.nav.js"></script>
    <script src="js/tags.js"></script>
    <script src="js/jquery.bxslider.min.js"></script>
    <script src="js/custom.js"></script>
    <!-- End js -->

</body>

</html>