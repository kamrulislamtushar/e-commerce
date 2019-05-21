@inject ('reviewHelper', 'Webkul\Product\Helpers\Review')
@extends('shop::layouts.master')

@section('page_title')
    {{ trim($product->meta_title) != "" ? $product->meta_title : $product->name }}
@stop

@section('seo')
    <meta name="description" content="{{ trim($product->meta_description) != "" ? $product->meta_description : str_limit(strip_tags($product->description), 120, '') }}"/>
    <meta name="keywords" content="{{ $product->meta_keywords }}"/>
@stop

@section('content-wrapper')

    {!! view_render_event('bagisto.shop.products.view.before', ['product' => $product]) !!}

    <section class="product-detail">
        <div class="layouter">
            <div class="row">
                <product-view>
                    <div class="form-container">
                        @csrf()

                        <input type="hidden" name="product" value="{{ $product->id }}">

                        @include ('shop::products.view.gallery')

                        <div class="details">

                            <div class="row">
                                <div class="col-6 col-sm-6 col-md-6">
                                    <div class="product-heading">
                                        <span>{{ $product->name }}</span>
                                    </div>

                                    @include ('shop::products.review', ['product' => $product])

                                    @include ('shop::products.price', ['product' => $product])

                                    @include ('shop::products.view.stock', ['product' => $product])
                                </div>
                                <div class="col-6 col-sm-6 col-md-6">
                                    @if ($product->type == 'configurable')
                                        <input type="hidden" value="true" name="is_configurable">
                                    @else
                                        <input type="hidden" value="false" name="is_configurable">
                                    @endif

                                    @include ('shop::products.view.configurable-options')
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    <div class="quantity control-group" :class="[errors.has('quantity') ? 'has-error' : '']">

                                        <label class="required">{{ __('shop::app.products.quantity') }}</label>

                                        <input name="quantity" class="control" value="1" v-validate="'required|numeric|min_value:1'" style="width: 60px;" data-vv-as="&quot;{{ __('shop::app.products.quantity') }}&quot;">

                                        <span class="control-error" v-if="errors.has('quantity')">@{{ errors.first('quantity') }}</span>
                                    </div>
                                </div>
                                <div class="col-10 mt-top3-3">
                                    {!! view_render_event('bagisto.shop.products.view.short_description.before', ['product' => $product]) !!}
                                    @include ('shop::products.view.product-add')
                                </div>

                            </div>

                            <div class="description pt-5">
                                {!! $product->short_description !!}
                            </div>

                            {!! view_render_event('bagisto.shop.products.view.short_description.after', ['product' => $product]) !!}


                            {!! view_render_event('bagisto.shop.products.view.quantity.before', ['product' => $product]) !!}



                            {!! view_render_event('bagisto.shop.products.view.quantity.after', ['product' => $product]) !!}

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active text-capitalize" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">DETAILS</a>
                                    @if ($total = $reviewHelper->getTotalReviews($product))
                                    <a class="nav-item nav-link text-capitalize" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">REVIEWS</a>
                                    @endif
                                    <a class="nav-item nav-link text-capitalize" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">ATTRIBUTES & CONDITIONS </a>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    {!! view_render_event('bagisto.shop.products.view.description.before', ['product' => $product]) !!}
                                    <div slot="body" class="pt-5">
                                        <div class="full-description">
                                            {!! $product->description !!}
                                        </div>
                                    </div>
                                    {!! view_render_event('bagisto.shop.products.view.description.before', ['product' => $product]) !!}
                                </div>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <div slot="body" class="pt-5">
                                        <div class="full-description">
                                            @include ('shop::products.view.reviews')
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                    @include ('shop::products.view.attributes')
                                </div>
                            </div>
                        </div>

                    </div>
            </product-view>
        </div>

        @include ('shop::products.view.related-products')

        @include ('shop::products.view.up-sells')

    </section>

    {!! view_render_event('bagisto.shop.products.view.after', ['product' => $product]) !!}
@endsection

@push('scripts')

    <script type="text/x-template" id="product-view-template">
        <form method="POST" id="product-form" action="{{ route('cart.add', $product->id) }}" @click="onSubmit($event)">

            <slot></slot>

        </form>
    </script>

    <script>

        Vue.component('product-view', {

            template: '#product-view-template',

            inject: ['$validator'],

            methods: {
                onSubmit (e) {
                    if (e.target.getAttribute('type') != 'submit')
                        return;

                    e.preventDefault();

                    this.$validator.validateAll().then(result => {
                        if (result) {
                            if (e.target.getAttribute('data-href')) {
                                window.location.href = e.target.getAttribute('data-href');
                            } else {
                                document.getElementById('product-form').submit();
                            }
                        }
                    });
                }
            }
        });

        document.onreadystatechange = function () {
            var state = document.readyState
            var galleryTemplate = document.getElementById('product-gallery-template');
            var addTOButton = document.getElementsByClassName('add-to-buttons')[0];

            if (galleryTemplate) {
                if (state != 'interactive') {
                    document.getElementById('loader').style.display="none";
                    addTOButton.style.display="flex";
                }
            }
        }

        window.onload = function() {
            var thumbList = document.getElementsByClassName('thumb-list')[0];
            var thumbFrame = document.getElementsByClassName('thumb-frame');
            var productHeroImage = document.getElementsByClassName('product-hero-image')[0];

            if (thumbList && productHeroImage) {

                for(let i=0; i < thumbFrame.length ; i++) {
                    thumbFrame[i].style.height = (productHeroImage.offsetHeight/4) + "px";
                    thumbFrame[i].style.width = (productHeroImage.offsetHeight/4)+ "px";
                }

                if (screen.width > 720) {
                    thumbList.style.width = (productHeroImage.offsetHeight/4) + "px";
                    thumbList.style.minWidth = (productHeroImage.offsetHeight/4) + "px";
                    thumbList.style.height = productHeroImage.offsetHeight + "px";
                }
            }

            window.onresize = function() {
                if (thumbList && productHeroImage) {

                    for(let i=0; i < thumbFrame.length; i++) {
                        thumbFrame[i].style.height = (productHeroImage.offsetHeight/4) + "px";
                        thumbFrame[i].style.width = (productHeroImage.offsetHeight/4)+ "px";
                    }

                    if (screen.width > 720) {
                        thumbList.style.width = (productHeroImage.offsetHeight/4) + "px";
                        thumbList.style.minWidth = (productHeroImage.offsetHeight/4) + "px";
                        thumbList.style.height = productHeroImage.offsetHeight + "px";
                    }
                }
            }
        };
    </script>
@endpush
