@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">

            <div class="col-sm-offset-1 col-sm-10 content">
                <div class="row">

                    @foreach ($blankets as $blanket)
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <a href="{{ url('/more/'.$blanket->id) }}">
                            <img style="height:260px;" src="{{ url('img/products/'.$blanket->name_img) }}" alt="{{ $blanket->category.' '. $blanket->name }}" title="{{ $blanket->category.' '. $blanket->name }}">
                            <div class="caption">
                                <p>{{ $blanket->category.' '. $blanket->name }}</p>
                                <p>
                                    <span class="price">
                                       {{ $blanket->price.' грн'}}
                                    </span>
                                    <a href="/" class="btn btn-danger pull-right buy" role="button"> Купить </a>
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