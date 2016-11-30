@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Список заказов</div>

                <div class="panel-body">
                <table class="table table-bordered">
                <tr>
                    <th> Имя </th>
                    <th> Телефон </th>
                    <th> Адрес доставки </th>
                    <th> Подробнее </th>
                </tr>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->l_name." ".$order->f_name." ".$order->s_name}}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->address }}</td>
                    <td><a><span data-id-order="{{ $order->id }}" class="glyphicon glyphicon glyphicon-list btn-more-order" aria-hidden="true" data-dismiss="modal" data-toggle="modal" data-target="#moreOrder"> Подробнее </span></a></td>
                </tr>
                @endforeach                    
                </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection