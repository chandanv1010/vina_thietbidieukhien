<footer class="footer">
    <div class="uk-container uk-container-center">
        <div class="uk-grid uk-grid-medium">
            {{-- Cột thông tin công ty --}}
            <div class="uk-width-large-1-4">
                <div class="ft-information">
                    <div class="company-name">{{ $system['homepage_company'] ?? '' }}</div>
                    <p class="phone">Điện thoại: {{ $system['contact_hotline'] ?? '' }}</p>
                    <p class="address">Địa chỉ: {{ $system['contact_address'] ?? '' }}</p>

                    <p class="address">Miền Trung: {{ $system['contact_address_mt'] ?? '' }}</p>
                    <p class="phone">Điện thoại: {{ $system['contact_hotline_mt'] ?? '' }}</p>

                    <p class="address">Miền Nam: {{ $system['contact_address_mn'] ?? '' }}</p>
                    <p class="phone">Điện thoại: {{ $system['contact_hotline_mn'] ?? '' }}</p>

                    <p class="email">Email: {{ $system['contact_email'] ?? '' }}</p>
                    <p class="clock">Giờ mở cửa: Thứ 2 - Thứ 6 : 8h30 - 17h30</p>
                </div>
            </div>

            {{-- Cột liên kết footer + form đăng ký --}}
            <div class="uk-width-large-2-4">
                <div class="ft-midlde">
                    <div class="uk-list uk-clearfix uk-grid uk-grid-medium">
                        
                        @if(isset($menu['footer-menu']) && is_array($menu['footer-menu']) && count($menu['footer-menu']))
                            @foreach($menu['footer-menu'] as $key => $val)
                            @php
                                $name = $val['item']->languages->first()->pivot->name;
                                $canonical = write_url($val['item']->languages->first()->pivot->canonical);
                            @endphp
                                <div class="uk-width-large-1-2">
                                    <div class="ft-panel">
                                        <div class="ft-panel_heading">{{ $name ?? '' }}</div>

                                        @if($val['children'])
                                            <ul class="uk-list uk-clearfix">
                                                @foreach($val['children'] as $children)
                                                @php
                                                    $nameC = $children['item']->languages->first()->pivot->name;
                                                    $canonicalC = write_url($children['item']->languages->first()->pivot->canonical);
                                                @endphp
                                                <li>
                                                    <a href="{{ $canonicalC }}" title="{{ $nameC }}" >- {{ $nameC }}</a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <div class="ft-form">
                        <div class="ft-form_heading">Đăng ký nhận thông tin khuyến mãi</div>
                        <div class="ft-form_subheading">Nhập Email để nhận thông tin từ chúng tôi</div>
                        <form action="" class="uk-form form" method="post">
                            @csrf
                            <div class="uk-flex uk-flex-middle">
                                <div class="form-row">
                                    <input type="text" class="input-text" name="email" placeholder="Nhập địa chỉ Email..">
                                </div>
                                <button class="btn-button" type="submit">Đăng ký</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- Facebook --}}
            <div class="uk-width-large-1-4">
                <div class="ft-panel">
                    <div class="ft-panel_heading">Facebook us</div>
                    <div class="ft-body">
                        <div class="fb-page"
                            data-href="{{ $system['social_facebook'] ?? 'https://facebook.com' }}"
                            data-tabs=""
                            data-small-header="false"
                            data-adapt-container-width="true"
                            data-hide-cover="false"
                            data-show-facepile="true">
                            <blockquote cite="https://www.facebook.com/facebook" class="fb-xfbml-parse-ignore">
                                <a href="https://www.facebook.com/facebook">Facebook</a>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="ft-copyright uk-text-center">
    2025 Design by HTVIETNAM
</div>

<a class="btn-zalo btn-frame text-decoration-none" target="_blank" href="https://zalo.me/{{ $system['social_zalo'] ?? '' }}">
    <div class="animated infinite zoomIn kenit-alo-circle"></div>
    <div class="animated infinite pulse kenit-alo-circle-fill"></div>
    <i><img class="lazy loaded"  alt="Zalo" src="{{ asset('zl.png') }}" data-was-processed="true"></i>
</a>

<a class="btn-phone btn-frame text-decoration-none" href="tel:{{ $system['contact_hotline'] ?? '' }}">
    <div class="animated infinite zoomIn kenit-alo-circle"></div>
    <div class="animated infinite pulse kenit-alo-circle-fill"></div>
    <i><img class="lazy loaded" alt="Hotline" src="{{ asset('hl.png') }}" data-was-processed="true"></i>
</a>

<a href="{{ $system['social_facebook'] ?? 'https://facebook.com' }}" class="btn-messenger btn-frame text-decoration-none" target="_blank">
    <div id="messages-facebook">    
        <div class="js-facebook-messenger-box onApp rotate bottom-right cfm rubberBand animated" data-anim="rubberBand">
            <svg id="fb-msng-icon" data-name="messenger icon" xmlns="//www.w3.org/2000/svg" viewBox="0 0 30.47 30.66">
                <path d="M29.56,14.34c-8.41,0-15.23,6.35-15.23,14.19A13.83,13.83,0,0,0,20,39.59V45l5.19-2.86a16.27,16.27,0,0,0,4.37.59c8.41,0,15.23-6.35,15.23-14.19S38,14.34,29.56,14.34Zm1.51,19.11-3.88-4.16-7.57,4.16,8.33-8.89,4,4.16,7.48-4.16Z" transform="translate(-14.32 -14.34)" style="fill:#fff"></path>
            </svg>
            <svg id="close-icon" data-name="close icon" xmlns="//www.w3.org/2000/svg" viewBox="0 0 39.98 39.99">
                <path d="M48.88,11.14a3.87,3.87,0,0,0-5.44,0L30,24.58,16.58,11.14a3.84,3.84,0,1,0-5.44,5.44L24.58,30,11.14,43.45a3.87,3.87,0,0,0,0,5.44,3.84,3.84,0,0,0,5.44,0L30,35.45,43.45,48.88a3.84,3.84,0,0,0,5.44,0,3.87,3.87,0,0,0,0-5.44L35.45,30,48.88,16.58A3.87,3.87,0,0,0,48.88,11.14Z" transform="translate(-10.02 -10.02)" style="fill:#fff"></path>
            </svg>
        </div>
        <div class="js-facebook-messenger-container">
            <div class="js-facebook-messenger-top-header">
                <span>{{ $system['homepage_company'] }}</span>
            </div>
            <div class="fb-page fb_iframe_widget" data-href="https://www.facebook.com/www.LEvn.vn" data-tabs="messages" data-small-header="true" data-height="300" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" fb-xfbml-state="rendered" fb-iframe-plugin-query="adapt_container_width=true&amp;app_id=&amp;container_width=220&amp;height=300&amp;hide_cover=false&amp;href=https%3A%2F%2Fwww.facebook.com%2Fwww.LEvn.vn&amp;locale=vi_VN&amp;sdk=joey&amp;show_facepile=true&amp;small_header=true&amp;tabs=messages"><span style="vertical-align: bottom; width: 0px; height: 0px;"><iframe name="f218b7473e1cdfaa8" width="1000px" height="300px" data-testid="fb:page Facebook Social Plugin" title="fb:page Facebook Social Plugin" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" src="https://www.facebook.com/v2.6/plugins/page.php?adapt_container_width=true&amp;app_id=&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fx%2Fconnect%2Fxd_arbiter%2F%3Fversion%3D46%23cb%3Df25f2de8c15f8cfbb%26domain%3Dle-technology.vn%26is_canvas%3Dfalse%26origin%3Dhttps%253A%252F%252Fle-technology.vn%252Ff5c0353e3bdf8d02c%26relation%3Dparent.parent&amp;container_width=220&amp;height=300&amp;hide_cover=false&amp;href=https%3A%2F%2Fwww.facebook.com%2Fwww.LEvn.vn&amp;locale=vi_VN&amp;sdk=joey&amp;show_facepile=true&amp;small_header=true&amp;tabs=messages" style="border: none; visibility: visible; width: 0px; height: 0px;" class=""></iframe></span></div>
        </div>
    </div>
</a>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous"
    src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v5.0&appId=103609027035330&autoLogAppEvents=1">
</script>

{{-- Form liên hệ nhỏ --}}
<div class="contact-us" style="width: 150px;display:none">
    <form action="" class="contact-form" method="post">
        @csrf
        <div class="contact-title">
            <h2><i class="fa fa-comments" style="color:#fff;" aria-hidden="true"></i>
                <span style="color:#fff;">Liên Hệ</span>
            </h2>
        </div>
        <div class="contact-body">
            <div class="contact-text">
                <p>
                    Quý khách vui lòng để lại lời nhắn.
                    {{ $system['contact_hotline'] ?? '' }} sẽ liên hệ quý khách trong thời gian sớm nhất
                </p>

                <div class="js-contact-form">
                    <div class="input-form">
                        <label>HỌ VÀ TÊN *</label>
                        <input type="text" name="fullname" class="form-control js-contact-name"
                            required placeholder="Họ và tên" data-alert="Bạn vui lòng điền tên">
                    </div>

                    <div class="input-form">
                        <label>Số điện thoại *</label>
                        <input type="text" name="phone" class="form-control js-contact-phone"
                            required placeholder="Số điện thoại" data-alert="Bạn vui lòng điền số điện thoại">
                    </div>

                    <div class="input-form">
                        <label>Địa chỉ Email *</label>
                        <input type="text" name="email" class="form-control js-contact-email"
                            required placeholder="Email" data-alert="Bạn vui lòng điền email"
                            data-invalid="Địa chỉ email không hợp lệ">
                    </div>

                    <div class="input-form">
                        <label>Lời nhắn</label>
                        <textarea name="message" class="form-control js-contact-message"
                            required placeholder="Vui lòng để lại lời nhắn, bộ phận tư vấn sẽ hỗ trợ."
                            data-alert="Bạn vui lòng điền lời nhắn"></textarea>
                    </div>

                    <div class="input-form checkbox">
                        <input type="checkbox" id="keep" checked class="js-contact-subcribe">
                        <label for="keep">
                            <span></span>
                            Đăng ký cập nhật thông tin mới nhất từ {{ $system['contact_hotline'] ?? '' }}
                        </label>
                    </div>
                </div>

                <div class="input-btn">
                    <input type="submit" value="Gửi" class="btn-3 js-contact-send" name="submit">
                </div>
            </div>
        </div>
    </form>
</div>

{{-- Nút gọi nhanh --}}
<a class="call-now" href="tel:{{ $system['contact_hotline'] ?? '' }}">
    <div class="mypage-alo-phone">
        <div class="animated infinite zoomIn mypage-alo-ph-circle"></div>
        <div class="animated infinite pulse mypage-alo-ph-circle-fill"></div>
        <div class="animated infinite tada mypage-alo-ph-img-circle"></div>
    </div>
</a>

{{-- Script xử lý form --}}
<script>
    $(document).ready(function() {
        $(document).on('submit', '.contact-form', function() {
            const postData = $(this).serializeArray();
            const formURL = '{{ url('contact/ajax/contact/addContact') }}';
            $.post(formURL, { post: postData }, function(data) {
                alert(data);
                location.reload();
            });
            return false;
        });
    });
</script>
