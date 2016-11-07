@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">

            <div class="col-sm-offset-1 col-sm-10 content">
                <div class="row">

                    @foreach ($products as $product)
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <a href="{{ url('/more/'.$product->id) }}">
                            <div class="thumbinal-img">
                                <img style="height:260px;" src="{{ url('img/products/'.$product->name_img) }}" alt="{{ $product->category.' '. $product->name }}" title="{{ $product->category.' '. $product->name }}">
                            </div>
                            <div class="caption Lobster">
                                <p>{{ $product->category.' '. $product->name }} <span class="pull-right">{{ $product->size }}</span> </p>
                                <p>
                                    <span class="price">
                                       {{ $product->price.' грн'}}
                                    </span>
                                    <a role="button" class="btn btn-danger pull-right buy" role="button"
                                     data-id="{{ $product->id }}"
                                     data-category="{{ $product->category }}"
                                     data-name="{{ $product->name }}"
                                     data-price="{{ $product->price }}"
                                    > 
                                       Купить 
                                    </a>
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