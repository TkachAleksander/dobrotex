@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">

            <div class="col-sm-offset-1 col-sm-10 content">
                <div class="row">

                    @foreach ($pillows as $pillow)
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <a href="{{ url('/more/'.$pillow->id) }}">
                            <img style="height:260px;" src="{{ url('img/products/'.$pillow->name_img) }}" alt="{{ $pillow->category.' '. $pillow->name }}">
                            <div class="caption">
                                <p>{{ $pillow->category.' '. $pillow->name }}</p>
                                <p>
                                    <span class="price">
                                       от {{ $pillow->price.' грн'}}

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