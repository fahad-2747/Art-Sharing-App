@extends('frontend.main_master')
@section('content')
    <br><br><br><br><br>
    <div class="wrapper row3">
        <main class="hoc container clear">
            <!-- main body -->
            <!-- ################################################################################################ -->
            <section id="introblocks">
                <ul class="nospace group">
                    @foreach($arts as $item)
                        <li class="one_third">

                                <figure><a class="imgover" href="#"><img src="{{ asset($item->art_image) }}" alt="" style="width: 780px;height: 510px;"></a>
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
@endsection
