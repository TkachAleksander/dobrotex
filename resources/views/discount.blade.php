@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">

            <div class="col-sm-offset-1 col-sm-10 content">
                <div class="row">

                    @foreach ($discount_products as $d_product)
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail thumbinal-discount">
                            <a href="{{ url('/more/'.$d_product->id) }}">
                            <div class="thumbinal-img">
                                 <img style="height:260px;" src="{{ url('img/products/'.$d_product->name_img) }}" alt="{{ $d_product->category.' '. $d_product->name }}" title="{{ $d_product->category.' '. $d_product->name }}">
                            </div>
                            <div class="caption Lobster">
                                <p class="small-description">{{ $d_product->category.' '. $d_product->name }} <span class="pull-right">{{ $d_product->size }}</span></p>

                                <span class="old-price">
                                    {{ $d_product->price }}
                                </span>
                                <br/>
                                <p>
                                    <span class="price">
                                       {{ $d_product->price - $d_product->discount_price.' грн'}}
                                    </span>
                                    <a role="button" class="btn btn-danger pull-right buy" role="button"
                                     data-id="{{ $d_product->id }}"
                                    > 
                                       Купить 
                                    </a>
                                    <div class="id-product">{{ $d_product->id }}</div>
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