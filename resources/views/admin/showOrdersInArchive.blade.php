@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"> Архив заказов </div>

                    <div class="panel-body">
                        <table class="table table-bordered">
                            <tr class="active">
                                <th> ФИО </th>
                                <th class="text-center"> Телефон </th>
                                <th class="text-center"> Адрес доставки </th>
                                <th class="text-center"> Статус </th>
                                <th class="text-center"> Время </th>
                                <th class="text-center"> Подробнее </th>
                            </tr>
                            @foreach($orders_in_archive as $order)
                                <tr>
                                    <td>{{ $order->name}}</td>
                                    <td class="text-center">{{ $order->phone }}</td>
                                    <td>{{ $order->address }}</td>
                                    <td class="status-out-archive text-center" data-id-order="{{ $order->id }}">{{ $order->status }}</td>
                                    <td class="text-center">{{ $order->time }}</td>
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