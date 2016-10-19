@extends('layouts.master')
@section('content')
    <div class="container">

            <div class="col-sm-offset-1 col-sm-10 content-more">
                <div class="row">
                    <div class="col-sm-12 Philosopher">
                        <h3>
                            {{$product[0]->category.' '.$product[0]->name}}
                        </h3>
                    </div>
                </div>
                <div class="row">

                    <div class="col-sm-5">
                        <img class="img-responsive" src="{{ url('img/products/'.$product[0]->name_img)}}" alt="Постельное белье" style="border-radius: 2px; border: 1px solid rgba(0, 31, 255, 0.22);">
                    </div>

                    <div class="col-sm-7">
                        <table class="table table-bordered table-td-characteristics-product Philoso" style="background-color: #fff;">
                            <tr>
                                <th class="text-center">Размер</th>
                                <th class="text-center">Вес</th>
                                <th class="text-center">Чехол</th>
                                <th class="text-center" colspan="2">Цена</th>                           
                            </tr>
                        @foreach($product_characteristics as $product)
                            <tr>
                                <td class="text-center"> {{ $product->size_length.' x '.$product->size_width.' см'}} </td>
                                <td class="text-center"> {{ $product->weight.' г' }} </td>
                                <td class="text-center"> {{ $product->cover }} </td>
                                <td class="text-right"> {{ $product->price.' грн' }} </td>
                                <td><a href="{{ url('/buy/'.$product->id) }}" class="btn btn-sm btn-danger pull-right" role="button"> Купить </a></td>
                            </tr>
                        @endforeach
                            <tr>
                                <th class="text-center">
                                    Наполнение
                                </th>
                                <td class="text-center" colspan="5">{{ $product_characteristics[0]->name_set}}</td>
                            </tr>
                                                                                                                                                                                                                     
                        </table>                                                    
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-12" style="padding-top: 25px;">
                        <p align="justify">
Постельное белье из ранфорса с нежным рисунком порадует Вас прекрасным качеством.
Обратите внимание, что рисунок, нанесенный на наволочку, может несколько отличаться от фотографии.Указанные различия имеют место из-за особенностей орнамента на самой ткани. Напоминаем, что производитель не рассматривает подобное несоответствие в качестве бракованной или некондиционной продукции, поэтому обмену или возврату такие изделия не подлежат.
Обратите внимание, что дополнительно Вы можете купить в нашем магазине наволочки Вилюта 8624 в размере 50х70 см, а также простынь Вилюта 8624 в любом, необходимом Вам количестве!
                        </p>
                    </div>
                </div>
            </div> 	
    </div>
	
@endcontent