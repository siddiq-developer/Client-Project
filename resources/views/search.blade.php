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
								<aside class="widget widget_search">
									<form action="" class="searchform" method="get">
										<div>
											<input type="text" class="form-search" name="s" value="" placeholder="Type here to search" />
											<button type="submit"><i class="fa fa-search"></i></button>
										</div>
									</form>
								</aside>
							</div>
						</div>
					</div>
				</div>
				                @include('theme.header')
				<!-- #site-navigation -->
			</div>
		</header>
		<div id="page-title" class="page-title" >
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div id="page-title-text" class="page-title-text col-xs-12 col-sm-12 col-md-12 col-lg-12"><h1>Search results for : {{$search}}</h1></div>
					<div id="breadcrumb-text" class="breadcrumb-text col-xs-12 col-sm-12 col-md-12 col-lg-12"><ul class="breadcrumbs"><li><a href="{{route('home')}}">Home</a></li><li>Search</li></ul></div>
					
				</div>
			</div>
		</div>
		<!-- #masthead -->
		<div id="main">
			

			<div class="container">
    <div class="row">
        <div class="archive-wrap">
            <section id="primary" class="col-xs-12 col-sm-8 col-md-12 col-lg-12 focusable" tabindex="-1">
                <div id="content" role="main">

                
@foreach($events as $e)                                                                
<article id="post-1284" class="blog-wrap post-1284 events type-events status-publish has-post-thumbnail hentry category-events-upcoming">
	<div class="entry-blog">
		<div class="entry-header">
			<div class="entry-date" style="height:70px;">
				<div class="arow-date">
					<div class="day time">{{date('d',strtotime($e->published_at))}} </div><div class="time month">{{date('M Y',strtotime($e->published_at))}}</div>
				</div>
			</div>
			<div class="cms-grid-media  has-thumbnail"></div>			<div class="content-archive">
					<h2 class="entry-title" style="margin-left: 5rem;">
				    	<a href="https://www.isoc.pk/events/universal-acceptance-ua-day/">
				    		{{$e->title}}</a>
				    </h2>
				<div class="entry-meta">
    </div>
								<div class="entry-content" style="margin-left: 5rem;">{{$e->content}}</div>
				<!-- .entry-content -->

				<footer class="entry-footer">
				    <a class="learn-more" href="https://www.isoc.pk/events/universal-acceptance-ua-day/" title="Universal Acceptance UA Day">Learn More</a>				    <!-- .readmore link -->
				</footer>
				<!-- .entry-footer -->
			</div>
		</div>
		<!-- .entry-header -->
	</div>
	<!-- .entry-blog -->
</article>
@endforeach
<!-- #post -->
                                            

<!-- #post -->
                                            

<!-- #post -->
                                            

<!-- #post -->
                    
                    
                
                </div><!-- #content -->
            </section><!-- #primary -->
        </div>
    </div>
</div>

		</div>
	<!-- #main -->
	    @include('theme.footer')
	<!-- #site-footer -->
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
<!-- #back-to-top -->
@include('theme.js')
</body>
</html>