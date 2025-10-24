@php
    // Chuẩn bị dữ liệu
    $prd_title   = $product->name;
    $prd_code    = $product->code;
    $prd_model   = $product->model ?? '';
    
    
    $list_image = [$product->image, ...(json_decode($product->album) ?? [])];
    $prd_href        = write_url($product->canonical ?? '');
    $prd_description = $product->description ?? '';
    $prd_extend_des  = $product->content ?? '';
    $price = getPrice($product);

@endphp


@extends('frontend.homepage.layout')

@section('content')

<div id="prddetail" class="page-body" style="background:#fff;">
   <x-breadcrumb :breadcrumb="$breadcrumb" />


  <section class="prddetail">
    <div class="uk-container uk-container-center">
      <div class="uk-grid uk-grid-medium uk-grid-width-large-1-2">

        
        <div class="product-gallery">
            @if(isset($list_image) && !empty($list_image) && !is_null($list_image))
                <div class="product-list_image">
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-container">
                        <div class="swiper-wrapper big-pic">
                            <?php foreach($list_image as $key => $val){  ?>
                                <div class="swiper-slide" data-swiper-autoplay="2000">
                                    <a href="{{ $val }}" data-fancybox="my-group" class="image img-cover">
                                        <img src="{{ image($val) }}" alt="<?php echo $val ?>">
                                    </a>
                                </div>
                            <?php }  ?>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                    <div class="swiper-container-thumbs">
                        <div class="swiper-wrapper pic-list">
                            <?php foreach($list_image as $key => $val){  ?>
                            <div class="swiper-slide">
                                <span  class="image img-cover"><img src="{{  image($val) }}" alt="<?php echo $val ?>"></span>
                            </div>
                            <?php }  ?>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        {{-- Product info --}}
        <div class="product-info">
          <h1 class="prd-name">{{ $prd_title }}</h1>
          <div class="description">
            {!! $product->description !!}
          </div>
         
          <div class="product-price">
            <div class="uk-flex uk-flex-middle">
                <span>Giá: </span><span class="uk-text-danger">{!! $price['html'] !!}</span>
            </div>
          </div>

          @if (!empty($prd_description))
            <div class="prd-description">
              {!! $prd_description !!}
            </div>
          @endif

          <div class="prd-option">
           
            <div class="option-block">
              <div class="product-stock">
                <div class="uk-grid uk-grid-medium uk-grid-width-large-1-2 uk-flex uk-flex-middle">
                  <div class="prd-btn btn-addtocard">
                    <a href="#order-buy"
                       title=""
                       id="btn-buy"
                       data-uk-modal
                      >
                      <span class="title">Mua ngay</span>
                      <span class="sub-title">Giao tận nơi hoặc đến siêu thị xem hàng</span>
                    </a>
                  </div>
                  <div class="prd-btn btn-installment">
                    <a href="tel:{{ $system['contact_hotline'] ?? '' }}"
                       title="{{ $system['contact_hotline'] ?? '' }}">
                      <span class="title">Liên hệ</span>
                      <span class="sub-title">Liên hệ ngay để có giá tốt nhất</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>

          </div>

          <div class="prd-buy-address">
            <div class="title">Địa chỉ mua hàng</div>
            <div class="address mb10">Văn phòng: <b>{{ $system['contact_address'] ?? '' }}</b></div>
            <div class="hotline mb10">Hotline: <b>{{ $system['contact_hotline'] ?? '' }}</b></div>
            <div class="email mb10">Email: <b>{{ $system['contact_email'] ?? '' }}</b></div>
            <div class="email mb10">Website: <b>{{ $system['contact_website'] ?? '' }}</b></div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <div class="block-extend">
    <div class="uk-container uk-container-center">
       
        {{-- Bản Desktop --}}
        <section class="prd-block uk-visible-large" id="prd-block">
            <header class="panel-head">
                <ul class="uk-list uk-clearfix nav-tabs" data-uk-switcher="{connect:'#prd-nav-tabs', animation: 'uk-animation-fade'}">
                    <li>
                        <a>Thông tin sản phẩm</a>
                    </li>
                </ul>
            </header>

            <section class="panel-body">
                <ul id="prd-nav-tabs" class="uk-switcher">
                    <li>
                        <article class="prd-shipping-policy">
                            {!! $product->content !!}
                        </article>
                    </li>
                </ul>
            </section>
        </section>

        {{-- Bản Mobile --}}
        <section class="prd-block uk-hidden-large mb20" id="prd-block-mobile">
            <div class="uk-accordion" data-uk-accordion='{collapse: false}'>
               
                <h2 class="uk-accordion-title" style="border: 0">
                    <span>Thông tin sản phẩm</span>
                </h2>
                <div class="uk-accordion-content">
                    <section class="dt-content">
                        {!! $product->content !!}
                    </section>
                </div>
            </div>
        </section>

        {{-- Sản phẩm liên quan --}}
        @if (!is_null($productCatalogue->products))
            <section class="categories-panel">
                <div class="uk-container uk-container-center">
                    <h2 class="heading-1">
                        <a href="#" onclick="return false;" title="Sản phẩm liên quan">Sản phẩm liên quan</a>
                    </h2>

                    <ul class="uk-list uk-clearfix uk-grid uk-grid-small uk-grid-width-1-2 uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4">
                        @foreach ($productCatalogue->products as $key => $valPost)
                            @php
                                if($key > 7) break;
                                $title = $valPost->languages->first()->pivot->name;
                                $image = $valPost->image;
                                $href = write_url($valPost->languages->first()->pivot->canonical);
                                $description = cutnchar(strip_tags($valPost->languages->first()->pivot->description), 100);
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
                                        <div class="contact-us-1">
                                            <a href="{{ $href }}" title="{{ $title }}">
                                                Liên Hệ: {{ $system['contact_hotline'] ?? '' }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </section>
        @endif
    </div>
</div>


 
</div> {{-- #prddetail --}}

{{-- Modal --}}
<div id="order-buy" class="uk-modal">
  <form action="" method="post" class="form uk-form" id="form-order-buy">
    <div class="uk-modal-dialog" style="padding: 0;">
      <a class="uk-modal-close uk-close"></a>
      <div class="uk-modal-header">
        <h2 class="md-heading"><span>Đặt mua sản phẩm</span></h2>
      </div>

      <div class="modal-content loading">
        <div class="bg-loader"></div>
        <div class="error hidden">
          <div class="alert alert-danger"></div>
        </div>

        <div class="uk-grid lib-grid-20">
          <div class="uk-width-large-1-2">
            <div class="form-control">
              <label class="md-label">Họ tên</label>
              <div class="form-row">
                <input
                    required
                  type="text"
                  name="order_name"
                  value="{{ old('order_name') }}"
                  placeholder="Nhập họ tên"
                  class="input-text order order-name"
                  autocomplete="off"
                >
              </div>
            </div>

            <div class="form-control">
              <label class="md-label">Số điện thoại</label>
              <div class="form-row">
                <input
                    required
                  type="tel"
                  name="order_phone"
                  value="{{ old('order_phone') }}"
                  placeholder="Nhập số điện thoại"
                  class="input-text order order-phone"
                  autocomplete="off"
                >
              </div>
            </div>

            <div class="form-control">
              <label class="md-label">Email</label>
              <div class="form-row">
                <input
                    required
                  type="email"
                  name="order_email"
                  value="{{ old('order_email') }}"
                  placeholder="Nhập địa chỉ email"
                  class="input-text order order-email"
                  autocomplete="off"
                >
              </div>
            </div>

            <div class="form-control">
              <label class="md-label">Địa chỉ</label>
              <div class="form-row">
                <input
                    required
                    type="text"
                    name="order_address"
                    value="{{ old('order_address') }}"
                    placeholder="Số nhà, đường, ..."
                    class="input-text order order-address"
                    autocomplete="off"
                >
              </div>
            </div>
          </div>

          <div class="uk-width-large-1-2">
            <div class="form-control">
              <label class="md-label">Sản phẩm</label>
              <div class="form-row">
                <input
                    required
                    type="text"
                    name="order_title_prd"
                    value="{{ old('order_title_prd', $product->name) }}"
                    placeholder=""
                    class="input-text order-title-prd"
                    readonly
                    autocomplete="off"
                >
              </div>
            </div>

            <div class="form-control">
              <label class="md-label">Lời nhắn</label>
              <div class="form-row">
                <textarea
                    name="order_message"
                    placeholder="Nhập lời nhắn"
                    class="textarea order order-message"
                    autocomplete="off"
                    rows="4"
                >{{ old('order_message') }}</textarea>
              </div>
            </div>
          </div>
        </div>

        <div class="uk-text-center">
          <button type="submit" value="submit" class="btn order order-1">Gửi thông tin</button>
        </div>

      </div>
    </div>
  </form>
</div>

@endsection

{{-- 
<script type="text/javascript">
  $(document).on('click', '#btn-buy', function() {
    let _this = $(this);
    let titlePrd = _this.attr('data-title');
    $('#form-order-buy').find('.order-title-prd').val(titlePrd);
  });

  var time;
  $(document).on('submit', '#form-order-buy', function() {
    let _this = $(this);
    let loader = _this.find('.bg-loader');
    loader.show();
    let modalTks = UIkit.modal("#md-thanks");
    let fullname = _this.find('.order-name').val();
    let email = _this.find('.order-email').val();
    let phone = _this.find('.order-phone').val();
    let address = _this.find('.order-address').val();
    let productTitle = _this.find('.order-title-prd').val();
    let message = _this.find('.order-message').val();
    let data = $(this).serializeArray();
    let ajaxUrl = 'contact/ajax/contact/sent_mail';
    clearTimeout(time);

    time = setTimeout(function() {
      $.ajax({
        method: "POST",
        url: ajaxUrl,
        data: {
          data: data,
          fullname: fullname,
          email: email,
          phone: phone,
          address: address,
          productTitle: productTitle,
          message: message,
        },
        dataType: "json",
        cache: false,
        success: function(json) {
          loader.hide();
          if (json.error == '') {
            _this.find('.error').addClass('hidden');
            _this.find('.order').val('');
            modalTks.show();
          } else {
            _this.find('.error').removeClass('hidden');
            _this.find('.error .alert').html(json.error);
          }
        }
      });
    }, 300);
    return false;
  });
</script> --}}
