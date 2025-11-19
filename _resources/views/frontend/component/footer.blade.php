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
