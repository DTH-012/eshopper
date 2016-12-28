@extends('layouts.mainsame')
@section('title', 'Login | E-Shopper')
@section('content')
    <div id="body">
        <section id="form"><!--form-->
            <div class="container">
                <div class="row">
                    @if(Session::has('flash_mesage'))
                        <div  class="alert alert-success">
                            {!! Session::get('flash_mesage') !!}
                        </div>
                    @endif
                </div>
            </div>
        </section> <!--/#cart_items-->
    </div>
@endsection