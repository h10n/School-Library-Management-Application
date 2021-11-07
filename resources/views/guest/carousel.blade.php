<section class="slider-container">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            @foreach($carousel as $carousels)
            <li data-target="#myCarousel" data-slide-to="{{ $loop->index}}" class="{{ $loop->first ? 'active' : '' }}">
            </li>
            @endforeach
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            @foreach($carousel as $carousel)
            <div class="item {{ $loop->first ? 'active' : '' }}">
                <img src="storage/uploads/slider/{{$carousel->img}}" alt="{{$carousel->title}}"
                    class="img-carousel-rule">
                <div class="carousel-caption">
                    <h3>{{$carousel->title}}</h3>
                    <p>{{$carousel->text}}</p>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>