@extends('layouts.master')
@section('content')

    <div class="container">
        <div class="row">

            <div class="col-sm-offset-1 col-sm-10 content">
                <div class="row">
                    @for($i=0;$i<15; $i++)
                    @foreach ($products as $product)
                    <div class="col-sm-6 col-md-4" itemscope itemtype="http://schema.org/Product">
                        <div class="thumbnail">
                            <a href="{{ url('/more/'.$product->id) }}">
                            <div class="thumbinal-img">
                                <img style="height:260px;" src="{{ url('img/products/'.$product->name_img) }}" alt="{{ $product->category.' '. $product->name }}" title="{{ $product->category.' '. $product->name }}">
                            </div>
                            <div class="caption Lobster" itemscope itemtype="http://schema.org/Offer">
                                <p class="small-description" itemprop="name">{{ $product->category.' '. $product->name }} <span class="pull-right">{{ $product->size }}</span> </p>
                                <p>
                                    <span class="price" itemprop="price">
                                       {{ $product->price.' грн'}}
                                    </span>
                                    <a role="button" class="btn btn-danger pull-right buy" role="button"
                                     data-id="{{ $product->id }}"
                                    > 
                                       Купить 
                                    </a>
                                <div class="id-product">{{ $product->id }}</div>
                                </p>

                            </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                        @endfor
                </div>
            </div> 	
        </div>
  	</div>
@endsection