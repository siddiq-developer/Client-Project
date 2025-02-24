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
				                @include('theme.header')
				<!-- #site-navigation -->
			</div>
		</header>
		<div id="page-title" class="page-title" >
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div id="page-title-text" class="page-title-text col-xs-12 col-sm-12 col-md-12 col-lg-12"><h1>{{$blog->title}}</h1></div>
					<div id="breadcrumb-text" class="breadcrumb-text col-xs-12 col-sm-12 col-md-12 col-lg-12"><ul class="breadcrumbs"><li><a href="{{route('home')}}">Home</a></li><li>{{$blog->title}}</li></ul></div>
					
				</div>
			</div>
		</div>
		<!-- #masthead -->
		<div id="main">
			<div id="page-default" class="container">
				<div id="primary">
					<div id="content" role="main">
						
						<article id="post-1284" class="pray-single-blog post-1284 events type-events status-publish has-post-thumbnail hentry category-events-upcoming">
							<div class="entry-blog entry-post">
								<div class="entry-header">
									<img width="770" height="537" src="{{\Storage::disk('public')->url('app/public/blogs/'.$blog->image)}}" class="attachment-pray-img-blog size-pray-img-blog wp-post-image" alt="{{$blog->title}}" srcset="{{\Storage::disk('public')->url('app/public/blogs/'.$blog->image)}}" sizes="(max-width: 770px) 100vw, 770px"><div class="cms-grid-media  has-thumbnail"></div>				<h2 class="entry-title">{{$blog->title}}</h2>
									
							</div>
							<!-- .entry-header -->
							<div class="entry-content">{{$blog->content}}</div>
							<div class="share-causes">
								<div class="wrap-share">
									<div class="title-social">
										<h3>SHARE :</h3>
									</div>
									<div class="post-share">
										<a href="http://www.facebook.com/sharer.php?u={{route('blog_single',['slug'=>$blog->slug])}}/&amp;t={{$blog->title}}" title="Share on Facebook."><span class="share-box"><i class="social_facebook"></i></span></a>
										
										<a href="http://twitter.com/home/?status={{$blog->title}} - {{route('blog_single',['slug'=>$blog->slug])}}/" title="Tweet this!"><span class="share-box"><i class="social_twitter"></i></span></a>
										
									</div>
								</div>
							</div>
						</div>
						<!-- .entry-blog -->
						</article>

					</div><!-- #content -->
		</div><!-- #primary -->
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