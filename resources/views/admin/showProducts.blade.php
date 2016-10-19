@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Список всех товаров 
                    <span class="pull-right">
                        <a href="{{ url('/addNewProduct') }}">Добавить товар</a>
                    </span>
                </div>

                <div class="panel-body">
                            <div class="col-sm-12">

                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    @foreach($products as $id => $product)
                                    <div class="panel panel-default">
                                    @if($product->show)
                                        <div class="panel-heading" role="tab" id="heading{{$id}}">
                                    @else
                                        <div class="panel-heading" role="tab" id="heading{{$id}}" style="background-color: #ffce75;">
                                    @endif
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$id}}" aria-expanded="true" aria-controls="collapse{{$id}}">
                                                    {{ $product->category.' '.$product->name}} <span class="pull-right">{{ '['.$product->discount.'] Код продукта: '.$product->id }}</span>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse{{$id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{$id}}">
                                             <div class="panel-body">
                                             <div class="col-sm-12">
                                                <table class="table table-bordered" style="background-color: #f5f5f5;">
                                                    <tr>
                                                        <th>Код продукта</th>
                                                        <td class="text-center">{{ $product->id }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Категория</th>
                                                        <td class="text-center">{{ $product->category }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Наименование</th>
                                                        <td class="text-center">{{ $product->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Себестоимость</th>
                                                        <td class="text-center">{{ $product->cost_price }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Цена</th>
                                                        <td class="text-center">{{ $product->price }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Скидки</th>
                                                        <td class="text-center">
                                                        @if ($product->discount == null)
                                                            {{ '---' }}
                                                        @else
                                                            {{ $product->discount_name }}
                                                        @endif
                                                        </td> 
                                                    </tr>
                                                    <tr>
                                                        <th>Наполнитель</th>
                                                        <td class="text-center">{{ $product->set_of_characteristics }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Описание</th>
                                                        <td class="text-center">{{ $product->description }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Имя картинки</th>
                                                        <td class="text-center">{{ $product->name_img }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>
                                                                <a href="{{ url('/editProduct/'.$product->id) }}" class="btn btn-sm btn-primary"> Редактировать </a>
                                                                
                                                                @if ($product->show)
                                                                    <a href="{{ url('/boolProduct/'.$product->id.'/0') }}" class="btn btn-sm btn-primary"> Скрыть от пользователей </a>
                                                                @else
                                                                    <a href="{{ url('/boolProduct/'.$product->id.'/1') }}" class="btn btn-sm btn-success"> Показать пользователям </a>
                                                                @endif
                                                                
                                                            <span class="pull-right">
                                                                <a href="{{ url('/removeProduct/'.$product->id) }}" class="btn btn-sm btn-danger confirmDelete"> Удалить </a>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>                                                 
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                
                            </div>
                        </div>

                </div>

                </div>
            </div>
        </div>
    
    </div>
</div>
@endsection
