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
					<div id="page-title-text" class="page-title-text col-xs-12 col-sm-12 col-md-12 col-lg-12"><h1>{{ucwords($type)}} Events</h1></div>
					<div id="breadcrumb-text" class="breadcrumb-text col-xs-12 col-sm-12 col-md-12 col-lg-12"><ul class="breadcrumbs"><li><a href="{{route('home')}}">Home</a></li><li>{{ucwords($type)}} Events</li></ul></div>
					
				</div>
			</div>
		</div>
		<!-- #masthead -->
		<div id="main">
			<div id="page-default" class="container">
				<div id="primary">
					<div id="content" role="main">
						<article id="post-894" class="post-894 page type-page status-publish hentry">
							<div class="entry-content">
								<div class="vc_row wpb_row vc_row-fluid"><div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner"><div class="wpb_wrapper"><div class="vc_empty_space" style="height: 60px"><span class="vc_empty_space_inner"></span></div>
								<div class="vc_row wpb_row vc_inner vc_row-fluid"><div class="wpb_column vc_column_container vc_col-sm-8"><div class="vc_column-inner"><div class="wpb_wrapper">
									<div class="cms-grid-events template-cms_grid--events-list-style " id="cms-grid">
										<div class="row cms-grid cms-grid">
											@foreach($events as $e)
											<div class="cms-grid-item cms-grid-item col-lg-12 col-md-12 col-sm-12 col-xs-12" data-groups="[&quot;all&quot;,&quot;category-upcoming&quot;]">
												<div class="content-grid-event row">
													<div class="header-event col-xs-12 col-sm-12 col-md-12 col-lg-6">
														<div class="entry-date">
															<div class="arow-date">
																<div class="day time">{{date('d',strtotime($e->start_date))}}</div><div class="time month">{{date('F Y',strtotime($e->start_date))}}</div>
															</div>
														</div>
														<div class="cms-grid-media  has-thumbnail"><img width="470" height="330" src="{{\Storage::disk('public')->url('app/public/events/'.$e->image)}}" class="attachment-pray-img-grid-blog size-pray-img-grid-blog wp-post-image" alt="{{$e->description}}" srcset="{{\Storage::disk('public')->url('app/public/events/'.$e->image)}} 470w" sizes="(max-width: 470px) 100vw, 470px"></div>
													</div>
													<div class="wrap-content-event col-xs-12 col-sm-12 col-md-12 col-lg-6">
														<div class="content-event">
															<h2 class="entry-title">
															<a href="{{route('event_single',['slug'=>$e->slug])}}">
																{{$e->title}}
															</a>
															</h2>
															<div class="entry-content">
																{{$e->description}}
															</div>
															
															<div class="time-event">
																<i class="fa fa-clock-o"></i>{{date('h:i A',strtotime($e->start_time))}} To {{date('h:i A',strtotime($e->end_time))}}
															</div>
															<div class="location">
																<i class="fa fa-map-marker"></i>{{$e->address}}
															</div>
														</div>
													</div>
												</div>
											</div>
											@endforeach
											
											
										</div>
										
									</div>
								</div></div></div><div class="wpb_column vc_column_container vc_col-sm-4"><div class="vc_column-inner"><div class="wpb_wrapper"><div class="wpb_widgetised_column wpb_content_element">
								<div class="wpb_wrapper">
									
									<aside id="search-4" class="widget widget_search"><h3 class="wg-title">search</h3><form action="{{route('search')}}" class="searchform" method="get">
										<div>
											<input type="text" class="form-search" name="s" value="" placeholder="Type here to search">
											<button type="submit"><i class="fa fa-search"></i></button>
										</div>
									</form></aside><aside id="cms_recent_posts_events-1" class="widget cms-recent-posts"><h3 class="wg-title">Recent Events</h3>                                    

								
								
								
								@foreach($latest_events as $e)
											<article class="recent-post-item clearfix post-1284 events type-events status-publish has-post-thumbnail hentry category-events-upcoming">
										<div class="featured-image">
										<img width="100" height="70" srcss="attachment-thumbnail size-thumbnail wp-post-image" alt="" srcset="{{\Storage::disk('public')->url('app/public/events/'.$e->image)}}" sizes="(max-width: 100px) 100vw, 100px">                        </div>
										<div class="post-element">
											<h5 class="entry-widget-title" style="margin: 0px"><a href="{{route('event_single',['slug'=>$e->slug])}}">{{$e->title}}</a></h5>
										</div>
									</article>
									@endforeach
								<!-- END WIDGET -->
							</aside>
		</div>
	</div>
</div></div></div></div></div></div></div></div>
</div><!-- .entry-content -->
<footer class="entry-meta">
	</footer><!-- .entry-meta -->
	</article><!-- #post -->
	
	<div id="comments" class="comments-area">
		
		
		</div><!-- #comments -->
		
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