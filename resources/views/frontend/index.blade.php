@extends('frontend.main_master')
@section('content')
    <br><br><br><br><br>
    <div class="wrapper row3">
        <main class="hoc container clear">
            <!-- main body -->
            <!-- ################################################################################################ -->
            <section id="introblocks">
                <ul class="nospace group">
                    @foreach($arts->take(6) as $item)
                        <li class="one_third">
                            <figure><a class="imgover" href="#"><img src="{{ asset($item->art_image) }}" alt="" style="width: 480px;height: 320px;"></a>
                                <figcaption>
                                    <h6 class="heading">{{ $item->art_name }}</h6>
                                    <p>{{ $item->description }}</p>
                                    <a href="{{ route('art.view',$item->id) }}" class="btn btn-info">View</a> <a href="#" class="btn btn-info">Buy Now</a>
                                </figcaption>
                            </figure>
                        </li>
                    @endforeach
                </ul>
            </section>
            <!-- ################################################################################################ -->
            <!-- / main body -->
            <div class="clear"></div>
        </main>
    </div>
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->

    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <div class="wrapper coloured">
        <section id="testimonials" class="hoc container clear">
            <!-- ################################################################################################ -->
            <div class="sectiontitle">
                <h6 class="nospace font-xs">Here You Can Select YOur Desired Art</h6>
                <h2 class="heading">Here Is Some Top Rated Art's</h2>
            </div>

            <article class="">
                    @foreach($arts->take(1) as $art)
                    <img src="{{ asset($art->art_image) }}" alt="" style="height: 480px">
                    <blockquote>{{ $art->description }}</blockquote>
                    <h6 class="heading">{{ $art->art_name }}</h6>
                    @endforeach
                </article>

            <!-- ################################################################################################ -->
        </section>
    </div>
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <div class="wrapper row3">
        <section class="hoc container clear">
            <!-- ################################################################################################ -->
            <div class="sectiontitle">
                <p class="nospace font-xs">Nisl sed blandit iaculis lectus</p>
                <h6 class="heading">Nam et erat nec eros elementum</h6>
            </div>
            <ul class="nospace group latest">
                <li class="one_half first">
                    <article>
                        <div class="excerpt">
                            <ul class="nospace meta">
                                <li><i class="fas fa-user"></i> <a href="#">Admin</a></li>
                                <li><i class="fas fa-tag"></i> <a href="#">Category Name</a></li>
                            </ul>
                            <h6 class="heading">Gravida integer tristique</h6>
                            <p>Dui vel odio proin magna ligula pellentesque eu tincidunt sed ornare tempor nisl in id dui vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae donec [<a href="#">&hellip;</a>]</p>
                            <footer><a href="#">Read More</a></footer>
                        </div>
                        <time datetime="2045-04-06T08:15+00:00"><strong>06</strong> <em>Apr</em></time>
                    </article>
                </li>
                <li class="one_half">
                    <article>
                        <div class="excerpt">
                            <ul class="nospace meta">
                                <li><i class="fas fa-user"></i> <a href="#">Admin</a></li>
                                <li><i class="fas fa-tag"></i> <a href="#">Category Name</a></li>
                            </ul>
                            <h6 class="heading">Eleifend semper nisl sed</h6>
                            <p>Eget lorem in in felis in metus mollis blandit ut eu justo suspendisse semper sem sit amet ligula quisque eget felis eu tortor tristique pharetra praesent turpis pede varius sed [<a href="#">&hellip;</a>]</p>
                            <footer><a href="#">Read More</a></footer>
                        </div>
                        <time datetime="2045-04-05T08:15+00:00"><strong>05</strong> <em>Apr</em></time>
                    </article>
                </li>
            </ul>
            <footer class="center"><a class="btn" href="#">View More</a></footer>
            <!-- ################################################################################################ -->
        </section>
    </div>
@endsection
