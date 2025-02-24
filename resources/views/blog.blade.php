@include('theme.head')
<body class="home page-template-default page page-id-7 woocommerce-js wpb-js-composer js-comp-ver-5.6 vc_responsive">
    <div id="page">
        <!-- #masthead -->                                
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

    <!-- #main -->
    <!-- @include('theme.footer') -->
    <!-- #site-footer -->
</div>
<!-- #page -->


<!-- #back-to-top -->
@include('theme.js')
</body>

</html>