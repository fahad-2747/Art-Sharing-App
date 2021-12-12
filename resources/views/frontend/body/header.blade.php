
@php
    use App\Models\Banner;
    use App\Models\Category;
    $category = Category::latest()->get();
    $banner = Banner::latest()->first();
@endphp

<div class="bgded overlay" style="background-image:url('{{ asset( $banner->banner_image ) }}');">
    <!-- ################################################################################################ -->
    <header id="header" class="hoc clear">
        <!-- ################################################################################################ -->
        <div id="logo" class="one_quarter first">
            <a href="{{ url('/') }}"><img src="{{ asset('art_logo.png') }}" style="width: 100px"></a>
        </div>

    <!-- ################################################################################################ -->
    </header>
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <section id="navwrapper" class="hoc clear">
        <!-- ################################################################################################ -->
        <nav id="mainav">
            <ul class="clear">
                <li class="active"><a href="{{ url('/') }}">Home</a></li>
                <li ><a href="https://www.facebook.com/Fahadulislam181253" target="_blank">About Artist</a></li>
                <li><a class="drop" href="{{ url('/gallery') }}">Gallery</a>
                    <ul>
                        @foreach($category as $item)
                        <li><a href="{{ route('category.art', $item->id)}}">{{ $item->name }}</a></li>
                        @endforeach
                    </ul>
                </li>

                <li><a href="#">Contact</a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>

                @auth
                    <li><a class="btn" href="{{ route('user.logout') }}">Logout</a></li>
                @else
                    <li><a class="btn" href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @endauth

                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li>
                    <i class="fa-cart-arrow-down fa-fw fas" style="font-size: 30px;padding-top: 10%;"></i>
                </li>


            </ul>
        </nav>
        <!-- ################################################################################################ -->
        <div id="searchform">
            <div>
                <form action="#" method="post">
                    <fieldset>
                        <legend>Quick Search:</legend>
                        <input type="text" placeholder="Enter search term&hellip;">
                        <button type="submit"><i class="fas fa-search"></i></button>
                    </fieldset>
                </form>
            </div>
        </div>
        <!-- ################################################################################################ -->
    </section>
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <div id="pageintro" class="hoc clear">
        <!-- ################################################################################################ -->
        <article>
            <p>{{ $banner->banner_title }}</p>
            <h3 class="heading">{{ $banner->banner_title_heading_h1 }}</h3>
            <p>{{ $banner->banner_title_heading }}</p>
            <footer><a class="btn" href="#">Get Started</a></footer>
        </article>
        <!-- ################################################################################################ -->
    </div>
    <!-- ################################################################################################ -->
</div>
