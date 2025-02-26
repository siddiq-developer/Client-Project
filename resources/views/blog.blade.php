@include('theme.head')
<body class="home page-template-default page page-id-7 woocommerce-js wpb-js-composer js-comp-ver-5.6 vc_responsive">

<div id="page">
        <header id="masthead" class="site-header">
            <div class="wrap-header2">
                <div id="cshero-header-top" class="header-top-wrap header-2">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="header-top-left col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <aside id="text-1" class="widget widget_text">
                                    <div class="textwidget">
                                        <ul>
                                            <li><i class="fa fa-envelope-o"></i> <a href="#">bc160201030@vu.edu.pk</a></li>
                                            <li><i class="fa fa-phone"></i> (+92)3249911001</li>
                                        </ul>
                                    </div>
                                </aside>
                            </div>
                            <div class="header-top-right col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <aside id="cs_social_widget-1" class="widget widget_cs_social_widget">
                                    <ul class="cs-social">
                                        <li>
                                            <a data-original-title="Twitter" href="https://twitter.com/ISOCibdpk"><i class="fa fa-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a data-original-title="Google" href="#"><i class="fa fa-google-plus"></i></a>
                                        </li>
                                        <li>
                                            <a data-original-title="Facebook" href="https://www.facebook.com/ISOCIBD.PK/"><i class="fa fa-facebook"></i></a>
                                        </li>
                                    </ul>
                                </aside>
                                
                            </div>
                        </div>
                    </div>
                </div>
                		<!-- #site-navigation -->
                        @include('theme.header')
			</div>
		</header>
		<div id="page-title" class="page-title" >
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div id="page-title-text" class="page-title-text col-xs-12 col-sm-12 col-md-12 col-lg-12"><h1>Blog</h1></div>
					<div id="breadcrumb-text" class="breadcrumb-text col-xs-12 col-sm-12 col-md-12 col-lg-12"><ul class="breadcrumbs"><li><a href="https://isoc.pk">Home</a></li><li>Blog</li></ul></div>
					
				</div>
			</div>
		</div>
		<!-- #masthead -->
		<div id="main">
			<div id="page-default" class="container">
	<div id="primary">
		<div id="content" role="main">

							<article id="post-938" class="post-938 page type-page status-publish hentry">
	
                            <!-- ----------------------------------- -->
    
        <!-- #masthead -->                                
        <div class="vc_row wpb_row vc_row-fluid vc_custom_1456304728322">
                                    <div class="wpb_column vc_column_container vc_col-sm-12">
                                        <div class="vc_column-inner">
                                            <div class="wpb_wrapper">
                                                <div class="cms-carousel-news">
                                                    <div class="header-wrap row">
                                                        <div class="col-xs-12">
                                                            <div class="header-title">
                                                                <h2>LATEST NEWS</h2>
                                                                <div class="owl-nav-wrap">
                                                                    <span class="owl-prev-fake"><i class="fa fa-angle-left"></i></span>
                                                                    <span class="owl-next-fake"><i class="fa fa-angle-right"></i></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row cms-grid">
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="cms-grid-item">
                                                                     <div class="row cms-grid">   
                                                                     @foreach($blogs as $e)
                                                                   
                                                                     <div class="col-xs-12 col-sm-12 col-md-6" style="margin-top: 1rem;">
                                                                        <div class="content-news">
                                                                            <div class="entry-date" style="height:70px;">
                                                                                <div class="arow-date">
                                                                                    <div class="day time">{{date('d',strtotime($e->published_at))}}</div>
                                                                                    <div class="time month">{{date('M Y',strtotime($e->published_at))}}</div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="cms-grid-media has-thumbnail">
                                                                                <img
                                                                                width="470"
                                                                                height="330"
                                                                                src="{{\Storage::disk('public')->url('app/public/blogs/'.$e->image)}}"
                                                                                class="attachment-pray-img-grid-blog size-pray-img-grid-blog wp-post-image"
                                                                                alt=""
                                                                                srcset="{{\Storage::disk('public')->url('app/public/blogs/'.$e->image)}}"
                                                                                sizes="(max-width: 470px) 100vw, 470px"
                                                                                />
                                                                            </div>
                                                                            <div class="content-archive">
                                                                                <h2 class="entry-title">
                                                                                <a href="{{route('blog_single',['slug'=>$e->slug])}}"> {{$e->description}} </a>
                                                                                </h2>
                                                                                <div class="entry-content">
                                                                                    {{$e->content}}
                                                                                </div>
                                                                                <!-- .entry-content -->
                                                                                <footer class="entry-footer">
                                                                                    <a class="learn-more" href="{{route('blog_single',['slug'=>$e->slug])}}" title="Pandemic phishing is luring many">Learn More</a>
                                                                                    <!-- .readmore link -->
                                                                                </footer>
                                                                                <!-- .entry-footer -->
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>

                                                            </div>
                                                        </div>

                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                             <!-- ---------------------------------------------- -->
</article><!-- #post -->
				
<div id="comments" class="comments-area">
		
	
</div><!-- #comments -->
			
		</div><!-- #content -->
	</div><!-- #primary -->
</div>

		</div>
	<!-- #main -->
	    <footer>
        <div id="cshero-footer-top" class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                        <aside id="text-2" class="widget widget_text">
                            <h3 class="wg-title">About ISOC</h3>
                            <div class="textwidget">
                                <div class="footer-information" style="text-align: justify;">
                                    Internet Society (ISOC) Pakistan Islamabad (PK IBD) Chapter is bring together members of Internet society to advance and promote the general purpose and guiding principles of ISOC by serving the
                                    interests of the global Internet community through a local presence. The Bylaws of ISOC Pakistan Islamabad Chapter are available.
                                </div>
                            </div>
                        </aside>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5">
                        <aside id="cms_recent_posts_events-3" class="widget cms-recent-posts">
                            <h3 class="wg-title">What we do</h3>
                             <div class="textwidget">
                                <div class="footer-information" style="text-align: justify;">
                                    At Internet Society (ISOC) Pakistan Islamabad (PK IBD) Chapter, we are committed to bringing together members of the Internet society to advance and promote the general purpose and guiding principles of ISOC. Our mission is to serve the interests of the global Internet community through a strong local presence. Through our dedicated efforts, we strive to foster a thriving digital ecosystem and make a positive impact on the world of the Internet. Together, we work towards building a connected, secure, and inclusive digital future for everyone.
                                </div>
                            </div>    
                            
                        </aside>
                    </div>
                    
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <aside id="text-6" class="widget widget_text">
                            <h3 class="wg-title">Contact Us</h3>
                            <div class="textwidget">
                                <ul class="contact-us">
                                    <li>
                                        <i class="fa fa-map-marker"></i>RISE – Suit # 7, <br />
                                        Ground floor, <br />
                                        Evacuee Trust Complex, <br />
                                        Agha Khan Road F-5/1 Islamabad.
                                    </li>
                                    <li><i class="fa fa-envelope-o"></i><a href="#">bc160201030@vu.edu.pk</a></li>
                                    <li><i class="fa fa-phone"></i>(+92)3249911001</li>
                                </ul>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
        <div id="cshero-footer-bottom" class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 copyright">Copyright © 2023. All Rights Reserved.</div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 social">
                        <aside id="text-5" class="widget widget_text">
                            <div class="textwidget">
                                <div style="float: right; line-height: 68px; font-family: 'Montserrat', sans-serif; text-transform: uppercase; font-size: 12px; letter-spacing: 0.25px; color: #999;">
                                    Design and Developed by: <a style="color: #fff;" href="#" rel="noopener"><strong>Ali Mazahir</strong></a>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </footer>	<!-- #site-footer -->
</div>
<!-- #page -->
<div class="cause-donate-popup"><div class="cause-donate-popup-inner"></div></div>
<div id="imageDownloaderSidebarContainer">
	<div class="image-downloader-ext-container">
		<div tabindex="-1" class="b-sidebar-outer">
			<!---->
			<div id="image-downloader-sidebar" tabindex="-1" role="dialog" aria-modal="false" aria-hidden="true" class="b-sidebar shadow b-sidebar-right bg-light text-dark" style="width: 500px; display: none;">
				<!---->
				<div class="b-sidebar-body"><div></div></div>
				<!---->
			</div>
			<!----><!---->
		</div>
	</div>
</div>
<div id="back_to_top" class="back_to_top off">
	<span class="go_up"><i style="" class="fa fa-arrow-up"></i></span>
</div>

@include('theme.js')
</body>
</html>