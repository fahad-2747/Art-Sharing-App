@extends('frontend.main_master')
@section('content')
    <br><br><br><br><br>
    <div class="wrapper row3">
        <main class="hoc container clear">
            <!-- main body -->
            <!-- ################################################################################################ -->
            <section id="introblocks">
                <ul class="nospace group">
                    @foreach($category as $item)
                        <li class="one_third">
                            <a href="{{ route('category.art', $item->id)}}">
                            <figure><a class="imgover" href="{{ route('category.art', $item->id)}}"><img src="{{ asset($item->image) }}" alt="" style="width: 780px;height: 510px;"></a>
                                <figcaption>
                                    <h6 class="heading">{{ $item->name }}</h6>
                                 </figcaption>
                            </figure>
                            </a>
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
