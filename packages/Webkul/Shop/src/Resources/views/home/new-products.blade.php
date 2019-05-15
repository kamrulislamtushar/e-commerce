@if ($products->count())
    <section class="featured-products">

        <div class="featured-heading">
            {{ __('shop::app.home.new-products') }}<br/>

            <span class="featured-seperator" style="color:lightgrey;">_____</span>
        </div>

        <div class="product-grid-4 owl-carousel" style="grid-column-gap: 0px !important;">
        
            @foreach ($products as $productFlat)

                @include ('shop::products.list.card', ['product' => $productFlat->product])

            @endforeach

        </div>
        
    </section>
    @push('scripts')
        <script>
            $(document).ready(function() {
                $('.owl-carousel').owlCarousel({
                    loop:true,
                    margin:10,
                    nav:true,
                    dots: false,
                    autoplay: true,
                    responsive:{
                        0:{
                            items:1
                        },
                        600:{
                            items:3
                        },
                        1000:{
                            items:5
                        }
                    }
                })
            })
        </script>
    @endpush
@endif
