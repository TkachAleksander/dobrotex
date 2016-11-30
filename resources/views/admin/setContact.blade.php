@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">

        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Удалить связь 
                </div>
                <div class="panel-body">
                    <div onclick="tree_toggle(arguments[0])">

                    @if ($contents != null)
                        @foreach($contents as $key => $content) 
                        <ul class="Container">
                          <li class="Node IsRoot ExpandOpen">
                            <div class="Expand"></div>
                            <!-- <input type="checkbox" name="roots[{{ $key }}]" value="{{ $key }}"/> -->
                            <div class="Content">
                            <button type="button" class="btn btn-sm btn-padding-5 btn-danger removeRootGroup confirmDelete" data-id-root="{{ $key }}">х</button>
                            {{ "[".$key."]".$is_roots[$key]->category." ".$is_roots[$key]->name}}
                            </div>
                            <ul class="Container">
                            @foreach($content as $child)
                                <li class="Node ExpandLeaf IsLast">
                                  <div class="Expand"></div>
                                  <!-- <input type="checkbox" name="childs[{{ $child->id_prod }}]" value="" /> -->
                                  <div class="Content">
                                    <button type="button" class="btn btn-sm btn-padding-5 btn-warning removeChildGroup confirmDelete" data-id-root="{{ $key }}" data-id-child="{{ $child->id_prod }}">х</button>
                                  {{ "[".$child->id_prod."] ".$child->category." ".$child->name }}
                                  </div>
                                </li>
                            @endforeach
                            </ul>
                          </li>
                        </ul>
                        @endforeach
                    @endif
                    
                    </div>
                </div>
            </div>        
        </div>

        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Добавить связь
                    <span class="pull-right">
                    </span>
                </div>

                <div class="panel-body">
                    <form action="/admin/setContact" method="POST">
                    {{ csrf_field() }}
                            <div class="col-sm-6">
                                <input class="form-control" type="text" name="id_group" placeholder="Код товара к которому привязываем" style="margin-bottom: 20px;" required>
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-sm btn-primary" style="margin-bottom: 20px;"> Добавить </button>
                            </div>
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
                                            <input class="pull-right" type="checkbox" name="id_products[]" value="{{ $product->id }}" style="margin-left:10px;">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$id}}" aria-expanded="true" aria-controls="collapse{{$id}}">
                                                    {{ $product->category.' '.$product->name}} <span class="pull-right">{{ '['.$product->discount.'] Код продукта: '.$product->id }} </span>
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
                                                                <a href="{{ url('/admin/editProduct/'.$product->id) }}" class="btn btn-sm btn-primary"> Редактировать </a>
                                                                
                                                                @if ($product->show)
                                                                    <a href="{{ url('/admin/boolProduct/'.$product->id.'/0') }}" class="btn btn-sm btn-primary"> Скрыть от пользователей </a>
                                                                @else
                                                                    <a href="{{ url('/admin/boolProduct/'.$product->id.'/1') }}" class="btn btn-sm btn-success"> Показать пользователям </a>
                                                                @endif
                                                                
                                                            <span class="pull-right">
                                                                <a href="{{ url('/admin/removeProduct/'.$product->id) }}" class="btn btn-sm btn-danger confirmDelete"> Удалить </a>
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
                    </form>
                </div>

            </div>
        </div>
    
    </div>
</div>
@endsection
