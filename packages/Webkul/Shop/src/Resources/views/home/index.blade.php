@extends('shop::layouts.master')

@section('page_title')
    BDKroy | Home
@endsection

@section('content-wrapper')

    {!! view_render_event('bagisto.shop.home.content.before') !!}

    {!! DbView::make(core()->getCurrentChannel())->field('home_page_content')->with(['sliderData' => $sliderData])->render() !!}
    
    {{ view_render_event('bagisto.shop.home.content.after') }}

@endsection
