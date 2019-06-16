<?php
$products = Webkul\Product\Models\ProductFlat::where('special_price', '>', 0)->get();
?>
@if ($products->count())

    <section class="featured-products">

        <div class="featured-heading">
            {{ __('Flush-Sell-products') }}<br/>

            <span class="featured-seperator" style="color:lightgrey;">_____</span>
        </div>

        <div class="featured-grid product-grid-4 owl-carousel owl-theme" style="grid-column-gap: 0px !important;">

            @foreach ($products as $productFlat)

                @include ('shop::products.list.card', ['product' => $productFlat->product])

            @endforeach

        </div>
    </section>
@endif