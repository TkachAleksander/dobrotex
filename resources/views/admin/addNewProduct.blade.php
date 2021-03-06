@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Добавление нового товара</div>

                <div class="panel-body">

                    <form action="/admin/addNewProduct" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <p><input type="text" class="form-control" name="name" placeholder="Имя товара" required></p>
                                    </div>
        
                                    <div class="col-sm-6">
                                        <p><input type="text" class="form-control" name="cost_price" placeholder="Себестоимость" required></p>
                                    </div>
        
                                    <div class="col-sm-6">
                                        <p><input type="text" class="form-control" name="price" placeholder="Цена продажи" required></p>
                                    </div>       
        
                                    <div class="col-sm-3">
                                        <p><select id="categories" class="multiselect" name="category">
                                        @foreach($categories as $cat)
                                            <option value="{{ $cat->name }}">{{ $cat->name }}</option>
                                        @endforeach
                                        </select></p>
                                    </div>     
                                    <div class="col-sm-4">
                                    <p><select id="sets" class="multiselect" name="set_of_characteristics">
                                        @foreach($sets as $set)
                                            <option value="{{ $set->name }}">{{ $set->name }}</option>
                                        @endforeach
                                        </select></p>
                                    </div>     
                                    <div class="col-sm-4">
                                        <p><select id="discount" class="multiselect" name="discount">
                                        <option value="0">Отсутствует</option>
                                        @foreach($discounts as $discount)
                                            <option value="{{ $discount->id }}">{{ $discount->name }}</option>
                                        @endforeach
                                        </select></p>
                                    </div>  
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p><select id="size" class="multiselect" name="size">
                                        @foreach($sizes as $size)
                                            <option value="{{ $size->name_sizes }}">{{ $size->name_sizes }}</option>
                                        @endforeach
                                        </select></p>
                                    </div> 
                                    <div class="col-sm-3">
                                        <input class="form-control" type="text" name="kg" placeholder="кг">  
                                    </div>                                                                         
                                </div>
                                <div class="row">
                
                                    <div class="col-sm-12">
                                        <p><textarea class="form-control" rows="5" name="description" placeholder="Описание" style="max-width: 442px;" ></textarea></p>
                                    </div>
        
                                    <div class="col-sm-12">
                                        <input type="file" name="photo">
                                    </div>
                                    <div class="col-sm-12">
                                        <button class="btn btn-sm btn-primary pull-right" type="submit">Добавить</button>
                                    </div>
                                </div>   
                            </div>

                            <div class="col-sm-6">
                                <table class="table">
                                <tr>
                                    <th>Код продукта</th>
                                    <th>Наименование</th>
                                </tr>
                                @foreach($products as $product)
                                     <tr>
                                         <td>{{ $product->id }}</td>
                                         <td>{{ $product->category.' '.$product->name }}</td>
                                     </tr>
                                @endforeach
                                </table>
                            </div>

                        </div>
                    </form>


                </div>

                </div>
            </div>
        </div>
    
    </div>
</div>
@endsection
