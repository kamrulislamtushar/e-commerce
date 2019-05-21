{!! view_render_event('bagisto.shop.products.list.card.before', ['product' => $product]) !!}

<div class="product-card">

    @inject ('productImageHelper', 'Webkul\Product\Helpers\ProductImage')

    <?php $productBaseImage = $productImageHelper->getProductBaseImage($product); ?>

    @if ($product->new)
        <div class="sticker new">
            {{ __('shop::app.products.new') }}
        </div>
    @endif

    <div class="product-image" id="product-image">
        <a href="{{ route('shop.products.index', $product->url_key) }}" title="{{ $product->name }}">
            <img src="{{ $productBaseImage['medium_image_url'] }}" />
            @include('shop::products.wishlist')
        </a>
    </div>

    <div class="product-information">

        <div class="product-name">
            <a href="{{ url()->to('/').'/products/'.$product->url_key }}" title="{{ $product->name }}">
                <span>
                    {{ $product->name }}
                </span>
            </a>
        </div>

        @include ('shop::products.price', ['product' => $product])

        @if (Route::currentRouteName() == "shop.products.index")
            @include ('shop::products.add-to', ['product' => $product])
        @else
            @if ($product->type == "configurable")
                <div class="cart-wish-wrap">
                    <a href="{{ route('cart.add.configurable', $product->url_key) }}" class="btn btn-lg btn-primary addtocart">
                        {{ __('shop::app.products.add-to-cart') }}
                    </a>
                </div>
            @else
                <div class="cart-wish-wrap middle">
                    <form action="{{route('cart.add', $product->id)}}" method="POST">
                        @csrf
                        <input type="hidden" name="product" value="{{ $product->id }}">
                        <input type="hidden" name="quantity" value="1">
                        <input type="hidden" value="false" name="is_configurable">
                        <button id="add-cart" class="btn btn-lg btn-primary addtocart" {{ $product->haveSufficientQuantity(1) ? '' : 'disabled' }}><i class="fas fa-cart-plus"></i> {{ __('shop::app.products.add-to-cart') }}</button>
                    </form>
                </div>
            @endif
        @endif
    </div>

</div>
@push('css')
    <style>
        /*#add-cart {*/
        /*    opacity: 0;*/
        /*}*/
        /*.product-card:hover #add-cart {*/
        /*    opacity: 1;*/
        /*}*/
        .product-card {
            position: relative;
        }
        .product-image {
            opacity: 1;
            display: block;
            width: 100%;
            height: auto;
            transition: .5s ease;
            backface-visibility: hidden;
        }
        .middle {
            transition: .5s ease;
            opacity: 0;
            position: absolute;
            width: 100%;
            margin-left: 45px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            /*text-align: center;*/
        }

        .product-card:hover .product-image {
            opacity: 0.1;
        }

        .product-card:hover .middle {
            opacity: 1;
        }
    </style>
@endpush
{!! view_render_event('bagisto.shop.products.list.card.after', ['product' => $product]) !!}
