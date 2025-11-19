@extends('frontend.homepage.layout')

@section('content')
<div id="prd-catalogue" class="page-body">
     <div class="uk-container uk-container-center">
     	<x-breadcrumb :breadcrumb="$breadcrumb" />
     	<div class="prd-catalogue-wrapper">
     		<div class="uk-grid uk-grid-small">
     			<div class="uk-width-large-1-4">
     				@include('frontend.component.sidebar')
     			</div>
     			<div class="uk-width-large-3-4">
     				<div class="prd-catalogue">
     					<div class="prd-catalogue_description">
     						<h1>{{ $productCatalogue->name }}</h1>
     						<div class="description">
     							{!! $productCatalogue->description !!}
     						</div>
     					</div>
     					
                        @if (!is_null($products))
                        <ul class="uk-list uk-clearfix uk-grid uk-grid-small uk-grid-width-1-2 uk-grid-width-small-1-2 uk-grid-width-medium-1-2 uk-grid-width-large-1-3">
                            @foreach ($products as $keyPost => $valPost)
                            @php
                                $title = $valPost->languages->first()->pivot->name;
                                $image = $valPost->image;
                                $href  = write_url($valPost->languages->first()->pivot->canonical);
                                $description = cutnchar(strip_tags($valPost->languages->first()->pivot->description), 100);
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
                        <div class="uk-flex uk-flex-center">
                            @include('frontend.component.pagination', ['model' => $products])
                        </div>
     				</div>
     			</div>
     		</div>
     	</div>
     </div>
</div>

@endsection