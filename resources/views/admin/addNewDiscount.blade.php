@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Добавление новой скидки</div>

                <div class="panel-body">

                    <form action="/addNewDiscount" method="POST">
                        {{ csrf_field() }}
                        
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row">

                                    <div class="col-sm-12">
                                        <p><input type="text" class="form-control" name="name" placeholder="Имя скидки" required></p>
                                    </div>
        
                                    <div class="col-sm-6">
                                        <p><input type="text" class="form-control" name="discount_price" placeholder="Сколько отнять от цены" required></p>
                                    </div>
        
                                </div>   
                            </div>

                            <div class="col-sm-6">
                                <table class="table">
                                <tr>
                                    <th>Имя</th>
                                    <th colspan="2">Что отнимется от цены</th>
                                </tr>
                                @foreach($discounts as $discount)
                                     <tr>
                                         <td>{{ $discount->name }}</td>
                                         <td>{{ $discount->discount_price }}</td>
                                         <td><a href="{{ url('/removeDiscount/'.$discount->id) }}" class="btn btn-sm btn-danger">Del</a></td>
                                     </tr>
                                @endforeach
                                </table>
                            </div>

                            <div class="col-sm-12">    
                                <button class="btn btn-sm btn-primary pull-right" type="submit">Добавить</button>
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
