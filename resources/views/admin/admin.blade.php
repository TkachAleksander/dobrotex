@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Панель управления</div>

                <div class="panel-body text-center">
                    <a href="{{ url('/admin/addNewProduct') }}"><div class="block-menu"> Добавить товар </div></a>
                    <a href="{{ url('/admin/addNewDiscount') }}"><div class="block-menu"> Добавить скидку </div></a>
                    <a href="{{ url('/admin/showProducts') }}"><div class="block-menu"> Управление товарами </div></a>
                    <a href="{{ url('/admin/setContact') }}"><div class="block-menu"> Связь товаров </div></a>
                    <a href="{{ url('/admin/showOrders') }}"><div class="block-menu"> Список заказов </div></a>
                    <a href="{{ url('/admin/valueFields') }}"><div class="block-menu"> Управление полями </div></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
