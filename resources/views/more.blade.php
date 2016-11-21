@extends('layouts.master')
@section('content')
    <div class="container">

            <div class="col-sm-offset-1 col-sm-10 content-more">
                <div class="row">

                    <div class="col-sm-6">
                        <img class="img-responsive" src="{{ url('img/products/'.$product[0]->name_img)}}" alt="{{$product[0]->category.' '.$product[0]->name}}" title="{{$product[0]->category.' '.$product[0]->name}}" style="border-radius: 2px; border: 1px solid rgba(0, 31, 255, 0.22);">
                    </div>

                    <div class="col-sm-6">
                        <div class="col-sm-12 Philosopher">
                            <h3>
                                {{$product[0]->category.' '.$product[0]->name}}
                            </h3>
                        </div>
                        <div class="col-sm-10">
                            <table class="table table-bordered" style="margin-bottom: 0px;">

                                <tr>
                                    <th>Вес:</th>
                                    <td>{{ $product[0]->kg.' кг' }}</td>
                                </tr>                                
                                <tr>
                                    <th>Размер:</th>
                                    <td>{{ $product[0]->size.' см' }}</td>
                                </tr>                                
                                <tr>
                                    <th>Наполнитель:</th>
                                    <td>{{ $product[0]->set_of_characteristics }}</td>
                                </tr>                              
                                <tr>
                                    <th>Цена:</th>
                                    <td>
                                        <span class="price"> 
                                        @if ($product[0]->discount != 0)
                                            {{ $product[0]->price - $discount_products[0]->discount_price.' грн' }}    
                                        @else 
                                            {{ $product[0]->price.' грн' }}                   
                                        @endif   
                                        </span>
                                    </td>                                
                                </tr>                           
                            </table>
                            <p class="pull-right">Код продукта: {{ $product[0]->id }}</p>
                        </div>
                        <div class="col-sm-10">
                            <a role="button" class="btn btn-danger pull-right buy" role="button"
                            data-id="{{ $product[0]->id }}"
                            > 
                            Купить 
                            </a>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-11" style="padding-top: 15px;">
                        @foreach($sizes as $key => $size)
                            <a href="{{ url('more/'.$size->id)}}">
                            <div class="block-size">
                                <div class="text-size">{{ $size->size }}</div>
                            </div>
                            </a>
                        @endforeach
                    </div>
                    <div class="col-sm-11" style="padding-top: 15px;">
                        <p class="description" align="justify">
                            {{ $product[0]->description }}
                        </p>
                    </div>
                </div>

                    <input id="category" type="hidden" value="{{ $product[0]->category }}">
            </div> 	
    </div>
	
@endsection