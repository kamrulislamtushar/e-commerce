<div class="footer">
    <div class="footer-content">
        <div class="footer-list-container">

            @if (count($categories))
                <div class="list-container">
                    <span class="list-heading">Categories</span>

                    <ul class="list-group">
                        @foreach ($categories as $key => $category)
                            <li>
                                <a href="{{ route('shop.categories.index', $category->slug) }}">{{ $category->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

                <div class="list-container">
                    <span class="list-heading">Quick Links</span>
                    <ul class="list-group">
                        {{--<li><a href="{{ route('footer.about_us') }}">About Us</a></li>--}}
                        <li><a href="{{ route('footer.terms') }}">Terms and conditions</a></li>
                        <li><a href="{{ route('footer.use') }}">Frequently Asked Questions (FAQ)</a></li>
                        <li><a href="{{ route('footer.privacy') }}">Privacy Policy</a></li>
                        <li><a href="{{ route('footer.contact') }}">Contact Us</a></li>
                    </ul>
                </div>
                <div class="list-container">
                    <span class="list-heading">Connect With Us</span>
                    <ul class="list-group">
                        <li><a href="#"><span class="icon icon-facebook"></span>Facebook </a></li>
                        <li><a href="#"><span class="icon icon-twitter"></span> Twitter </a></li>
                        <li><a href="#"><span class="icon icon-instagram"></span> Instagram </a></li>
                        <li><a href="#"> <span class="icon icon-google-plus"></span>Google+ </a></li>
                        <li><a href="#"> <span class="icon icon-linkedin"></span>LinkedIn </a></li>
                    </ul>
                </div>
            <div class="list-container">
                <span class="list-heading">{{ __('shop::app.footer.subscribe-newsletter') }}</span>
                <div class="form-container">
                    <form action="{{ route('shop.subscribe') }}">
                        <div class="control-group" :class="[errors.has('subscriber_email') ? 'has-error' : '']">
                            <input type="email" class="control subscribe-field" name="subscriber_email" placeholder="Email Address" required><br/>

                            <button class="btn btn-md btn-primary">{{ __('shop::app.subscription.subscribe') }}</button>
                        </div>
                    </form>
                </div>

{{--                <span class="list-heading">{{ __('shop::app.footer.locale') }}</span>--}}
{{--                <div class="form-container">--}}
{{--                    <div class="control-group">--}}
{{--                        <select class="control locale-switcher" onchange="window.location.href = this.value">--}}

{{--                            @foreach (core()->getCurrentChannel()->locales as $locale)--}}
{{--                                <option value="?locale={{ $locale->code }}" {{ $locale->code == app()->getLocale() ? 'selected' : '' }}>{{ $locale->name }}</option>--}}
{{--                            @endforeach--}}

{{--                        </select>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="currency">--}}
{{--                    <span class="list-heading">{{ __('shop::app.footer.currency') }}</span>--}}
{{--                    <div class="form-container">--}}
{{--                        <div class="control-group">--}}
{{--                            <select class="control locale-switcher" onchange="window.location.href = this.value">--}}

{{--                                @foreach (core()->getCurrentChannel()->currencies as $currency)--}}
{{--                                    <option value="?currency={{ $currency->code }}" {{ $currency->code == core()->getCurrentCurrencyCode() ? 'selected' : '' }}>{{ $currency->code }}</option>--}}
{{--                                @endforeach--}}

{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

            </div>
        </div>
    </div>
</div>
