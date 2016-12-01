@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Панель управления</div>

                <div class="panel-body text-center">
<!--                     <ul>
                        <li><a href="{{ url('/admin/addNewProduct') }}"> Добавить товар </a></li>
                        <li><a href="{{ url('/admin/addNewDiscount') }}"> Добавить скидку </a></li>
                        <li><a href="{{ url('/admin/showProducts') }}"> Управление товарами </a></li>
                        <li><a href="{{ url('/admin/setContact') }}"> Связь товаров </a></li>
                        <li><a href="{{ url('/admin/showOrders') }}"> Список заказов </a></li>

                        <li><a href="{{ url('/register') }}">Регистрация</a></li>

                    </ul> -->
                    <div class="block-menu"><a href="{{ url('/admin/addNewProduct') }}"> Добавить товар </a></div>
                    <div class="block-menu"><a href="{{ url('/admin/addNewDiscount') }}"> Добавить скидку </a></div>
                    <div class="block-menu"><a href="{{ url('/admin/showProducts') }}"> Управление товарами </a></div>
                    <div class="block-menu"><a href="{{ url('/admin/setContact') }}"> Связь товаров </a></div>
                    <div class="block-menu"><a href="{{ url('/admin/showOrders') }}"> Список заказов </a></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
