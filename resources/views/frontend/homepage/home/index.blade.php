@extends('frontend.homepage.layout')
@section('content')
    @include('frontend.component.slide')

    @if(isset($widgets['about-us-2']))
	@foreach($widgets['about-us-2']->object as $key => $val)
	@php 		
		$name = $val->languages->name;
		$href = write_url($val->languages->canonical);
       	$description = cutnchar(strip_tags($val->languages->description), 500);
        $image = $val->image;
	@endphp

	<section class="intro-panel">
		<div class="uk-container uk-container-center">
			<div class="uk-grid uk-grid-large uk-flex uk-flex-middle">
				<div class="uk-width-medium-1-2">
					<div class="intro-panel-wrapper">
						<p>Welcome</p>
						<h2 class="title"><span>{{ $widgets['about-us-2']->name  }}</span></h2>
						<div class="intro-panel-wrapper_description line-8">
							{!!  $description !!}
						</div>
						<div class="readmore">
							<a href="{{ $href }}" title="{{ $name }}">Xem thêm</a>
						</div>
					</div>
				</div>
				<div class="uk-width-medium-1-2">
					<div class="intro-image">
						<a href="{{ $href }}" class="image img-cover img-zoomin"><img src="{{ $image }}" alt="{{ $name }}"></a>
					</div>
				</div>
			</div>
		</div>
	</section>
	@endforeach
    @endif

    @if(isset($widgets['product-category']->object))
        @foreach($widgets['product-category']->object as $key => $val)
            @php
                $titleC = $val->languages->name;
                $hrefC = write_url($val->languages->canonical);
            @endphp

            <section class="categories-panel order-1">
                <div class="uk-container uk-container-center">
                    <h2 class="heading-1">
                        <a href="{{ $hrefC }}" title="{{ $titleC }}">{{ $titleC }}</a>
                    </h2>

                    @if(isset($val->products) )
                        <ul class="uk-list uk-clearfix uk-grid uk-grid-small uk-grid-width-1-2 uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-5">
                            @foreach($val->products as $keyPost => $valPost)
                                @php
                                    if($keyPost > 4) break;
                                    $title = $valPost->languages[0]->name;
                                    $image = $valPost->image;
                                    $href = write_url($valPost->languages[0]->canonical);
                                    $description = cutnchar(strip_tags($valPost->languages[0]->description), 100);
                                    $price = getPrice($valPost);
                                @endphp

                                <li class="mb10">
                                    <div class="product-item">
                                        <div class="bagde">New</div>
                                        <a href="{{ $href }}" class="image img-scaledown img-zoomin">
                                            <img src="{{ $image }}" alt="{{ $title }}">
                                        </a>
                                        <div class="info">
                                            <h3 class="title" title="{{ $title }}">
                                                <a href="{{ $href }}" title="{{ $title }}">{{ $title }}</a>
                                            </h3>
                                            <div class="description">{!! $description !!}</div>
                                            <div class="mt10">
                                                {!! $price['html'] !!}
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </section>
        @endforeach
    @endif

    @if(isset($widgets['news']->object) )
        @foreach($widgets['news']->object as $key => $val)
            @php
                $titleC = $widgets['news']->name;
                $hrefC = write_url($val->languages->canonical)
            @endphp

            <section class="homepage-news owl-slide">
                <div class="uk-container uk-container-center">
                    <h2 class="heading-2">
                        <a href="{{ $hrefC }}" title="{{ $titleC }}">{{ $titleC }}</a>
                    </h2>

                    @if(!is_null($val->posts) && $val->posts->count() > 0 )
                    {{-- <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div> --}}
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            @foreach($val->posts as $keyPost => $valPost)
                                @php
                                    $title = $valPost->languages[0]->name;
                                    $image = $valPost->image;
                                    $href = write_url($valPost->languages[0]->canonical);
                                    $description = cutnchar(strip_tags($valPost->languages[0]->description), 200);
                                @endphp
                                <div class="swiper-slide">
                                    <div class="news">
                                        <div class="thumb">
                                            <a href="{{ $href }}" class="image img-cover" title="{{ $title }}">
                                                <img src="{{ $image }}" alt="{{ $title }}">
                                            </a>
                                        </div>
                                        <div class="info">
                                            <h3 class="title">
                                                <a href="{{ $href }}" title="{{ $title }}">{{ $title }}</a>
                                            </h3>
                                            <div class="description">
                                                {!! $description !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </section>
        @endforeach
    @endif

@endsection
