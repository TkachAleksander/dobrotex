@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
<!--             <div class="col-sm-3 left-content">
            	<p class="text-center Philosopher filters">Фильтры<hr></p>
            </div>    --> 

            <div class="col-sm-offset-1 col-sm-10 content">
                <div class="row">

                    @foreach ($discount_products as $d_product)
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <a href="{{ url('/more/'.$d_product->id) }}">
                            <img style="height:260px;" src="{{ url('img/products/'.$d_product->name_img) }}" alt="{{ $d_product->category.' '. $d_product->name }}">
                            <div class="caption">
                                <p>{{ $d_product->category.' '. $d_product->name }}</p>

                                <span class="old-price">
                                    от {{ $d_product->price }}
                                </span>
                                <br/>
                                <p>
                                    <span class="price">
                                       от {{ $d_product->price - $d_product->discount_price.' грн'}}
                                    </span>
                                    <a href="/" class="btn btn-danger pull-right" role="button"> Купить </a>

                                </p>
                            </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div> 	
        </div>
  	</div>
@endsection