@extends('front_end.layouts.master')
@section('content')

    <!-- blog-slider-->
    <section class="blog blog-home4 d-flex align-items-center justify-content-center">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="owl-carousel">
                        @foreach ($post as $posts)
                         <!--post-->
                        <div class="blog-item" style="background-image:url({{asset('upload/posts/')}}/{{$posts['image']}})">
                            <div class="blog-banner">
                                <div class="post-overly">
                                    <div class="post-overly-content">
                                        <div class="entry-cat">
                                            <a href="blog-layout-1.html" class="category-style-2">{{$posts->rel_to_cate['category_name']}}</a>
                                        </div>
                                        <h2 class="entry-title">
                                            <a href="{{route('singlePost',$posts->slug)}}">{{$posts->title}}</a>
                                            </h2>
                                        <ul class="entry-meta">
                                            <li class="post-author"> <a href="author.html">{{$posts->rel_to_user->name}}</a></li>
                                            <li class="post-date"> <span class="line"></span> {{$posts->created_at->format('M d,Y')}}</li>
                                            <li class="post-timeread"> <span class="line"></span> {{$posts->created_at->diffForHumans()}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- top categories-->
    <div class="categories">
        <div class="container-fluid">
            <div class="categories-area">
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="categories-items">
                            @foreach ($category as $categories)
                            <a class="category-item" href="#">
                                <div class="image">
                                    <img src="{{asset('upload/category')}}/{{$categories->category_image}}" alt="" style="height:80px;">
                                </div>
                                <p>{{$categories->category_name}} <span>{{App\Models\Post::where('category_id',$categories->id)->count()}}</span> </p>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent articles-->
    <section class="section-feature-1">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 oredoo-content">
                    <div class="theiaStickySidebar">
                        <div class="section-title">
                            <h3>recent Articles </h3>
                            <p>Discover the most outstanding articles in all topics of life.</p>
                        </div>

                        @foreach ($recent_post as $recent_posts)
                        <div class="post-list post-list-style4">
                            <div class="post-list-image">
                                <a href="">
                                    <img src="{{asset('upload/posts/')}}/{{$recent_posts['image']}}" style="height:200px;width:290px;"alt="">
                                </a>
                            </div>
                            <div class="post-list-content">
                                <ul class="entry-meta">
                                    <li class="entry-cat">
                                        <a href="blog-layout-1.html" class="category-style-1">{{$recent_posts->rel_to_cate['category_name']}}</a>
                                    </li>
                                    <li class="post-date"> <span class="line"></span> {{$recent_posts->created_at->format('M d,Y')}}</li>
                                </ul>
                                <h5 class="entry-title">
                                    <a href="">{{$recent_posts->title}}</a>
                                </h5>

                                <div class="post-btn">
                                    <a href="" class="btn-read-more">Continue Reading <i
                                            class="las la-long-arrow-alt-right"></i></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!--pagination-->
                        <div class="pagination">
                            <div class="pagination-area">
                                <div class="pagination-list">
                                    <ul class="list-inline">
                                        <li><a href="#"><i class="las la-arrow-left"></i></a></li>
                                        <li><a href="#" class="active">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#"><i class="las la-arrow-right"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Sidebar-->
                <div class="col-lg-4 oredoo-sidebar">
                    <div class="theiaStickySidebar">
                        <div class="sidebar">
                            <!--search-->
                            <div class="widget">
                                <div class="widget-title">
                                    <h5>Search</h5>
                                </div>
                                <div class=" widget-search">
                                    <form action="https://oredoo.assiagroupe.net/Oredoo/search.html">
                                        <input type="search" id="gsearch" name="gsearch" placeholder="Search ....">
                                        <a href="search.html" class="btn-submit"><i class="las la-search"></i></a>
                                    </form>
                                </div>
                            </div>

                            <!--popular-posts-->
                            <div class="widget">
                                <div class="widget-title">
                                    <h5>popular Posts</h5>
                                </div>

                                <ul class="widget-popular-posts">
                                    @foreach ($popular_post as $popular_posts)
                                    <li class="small-post">
                                        <div class="small-post-image">
                                            <a href="">
                                                <img src="{{asset('upload/posts/')}}/{{$popular_posts['image']}}" alt="">
                                                <small class="nb">1</small>
                                            </a>
                                        </div>
                                        <div class="small-post-content">
                                            <p>
                                                <a href="">{{$popular_posts['title']}}</a>
                                            </p>
                                            <small> <span class="slash"></span>{{$popular_posts->created_at->diffForHumans()}}</small>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>

                            <!--newslatter-->
                            <div class="widget widget-newsletter">
                                <h5>Subscribe To Our Newsletter</h5>
                                <p>No spam, notifications only about new products, updates.</p>
                                <form action="#" class="newslettre-form">
                                    <div class="form-flex">
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Your Email Adress"
                                                required="required">
                                        </div>
                                        <button class="btn-custom" type="submit">Subscribe now</button>
                                    </div>
                                </form>
                            </div>

                            <!--stay connected-->
                            <div class="widget ">
                                <div class="widget-title">
                                    <h5>Stay connected</h5>
                                </div>

                                <div class="widget-stay-connected">
                                    <div class="list">
                                        <div class="item color-facebook">
                                            <a href="#"><i class="fab fa-facebook"></i></a>
                                            <p>Facebook</p>
                                        </div>

                                        <div class="item color-instagram">
                                            <a href="#"><i class="fab fa-instagram"></i></a>
                                            <p>instagram</p>
                                        </div>

                                        <div class="item color-twitter">
                                            <a href="#"><i class="fab fa-twitter"></i></a>
                                            <p>twitter</p>
                                        </div>

                                        <div class="item color-youtube">
                                            <a href="#"><i class="fab fa-youtube"></i></a>
                                            <p>Youtube</p>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!--Tags-->
                            <div class="widget">
                                <div class="widget-title">
                                    <h5>Tags</h5>
                                </div>
                                <div class="widget-tags">
                                    <ul class="list-inline">
                                        @foreach ($tag as $tags)

                                        <li>
                                            <a href="#">{{$tags->tag_name}}</a>
                                        </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/-->
            </div>
        </div>
    </section>

@endsection
