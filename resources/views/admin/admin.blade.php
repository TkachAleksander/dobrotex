@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Панель управления</div>

                <div class="panel-body">
                    <ul>
                        <li><a href="{{ url('/addNewProduct') }}"> Добавить товар </a></li>
                        <li><a href="{{ url('/addNewDiscount') }}"> Добавить скидку </a></li>
                        <li><a href="{{ url('/showProducts') }}"> Управление товарами </a></li>
                        <li><a href="{{ url('/setContact') }}"> Связь товаров </a></li>

                        <li><a href="{{ url('/register') }}">Регистрация</a></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
