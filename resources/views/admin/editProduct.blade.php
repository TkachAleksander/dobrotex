@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Редактирование товара</div>

                <div class="panel-body">

                    <form action="/editProduct/{{ $product->id }}" method="POST" >
                        {{ csrf_field() }}
                        
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <p><div class="input-group">
                                            <span class="input-group-btn">
                                              <button class="btn btn-default" type="button">Имя товара</button>
                                            </span>
                                            <input type="text" class="form-control" name="name" placeholder="Имя товара" value="{{ $product->name }}" required>
                                        </div></p>
                                    </div>
       
                                    <div class="col-sm-6">
                                        <p><div class="input-group">
                                            <span class="input-group-btn">
                                              <button class="btn btn-default" type="button">Себестоимость</button>
                                            </span>
                                            <input type="text" class="form-control" name="cost_price" placeholder="Себестоимость" value="{{ $product->cost_price }}" required>
                                        </div></p>
                                    </div>
        
                                    <div class="col-sm-6">
                                        <p><div class="input-group">
                                            <span class="input-group-btn">
                                              <button class="btn btn-default" type="button">Цена</button>
                                            </span>
                                            <input type="text" class="form-control" name="price" placeholder="Цена продажи" value="{{ $product->price }}"  required>
                                        </div></p>
                                    </div>       
                                    
                                    <!-- MULTISELECT -->
                                    <div class="col-sm-4">
                                        <p><select id="categories" name="category">
                                        @foreach($categories as $cat)
                                            <option value="{{ $cat->name }}">{{ $cat->name }}</option>
                                        @endforeach
                                        </select></p>
                                    </div>     
                                    <div class="col-sm-4">
                                    <p><select id="sets" name="set_of_characteristics">
                                        @foreach($sets as $set)
                                            <option value="{{ $set->name }}">{{ $set->name }}</option>
                                        @endforeach
                                        </select></p>
                                    </div>     
                                    <div class="col-sm-4">
                                        <p><select id="discount" name="discount">
                                        <option value="0">Отсутствует</option>
                                        @foreach($discounts as $discount)
                                            <option value="{{ $discount->id }}">{{ $discount->name }}</option>
                                        @endforeach
                                        </select></p>
                                    </div>                                    
                                    <!-- - -->

                                    <div class="col-sm-12">
                                        <p><textarea class="form-control" rows="5" name="description" placeholder="Описание" style="max-width: 913px;">{{ $product->description }}</textarea></p>
                                    </div>
        
                                    <div class="col-sm-12">
                                        <p><div class="input-group">
                                            <span class="input-group-btn">
                                              <button class="btn btn-default" type="button">Имя фото</button>
                                            </span>
                                            <input type="text" class="form-control" name="name_img" placeholder="1.jpg" value="{{ $product->name_img }}" required>
                                        </div></p>
                                    </div>
                                </div>   
                            </div>


                            <div class="col-sm-12">    
                                <button class="btn btn-sm btn-primary pull-right" type="submit">Редактировать</button>
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
