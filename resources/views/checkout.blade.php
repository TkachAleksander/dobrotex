@extends('layouts.checkout')
@section('content')

    <div class="container">
        <div class="row">

            <div class="col-sm-offset-1 col-sm-6 content-checkout pull-right">
                <div class="row">

                    <div class="col-sm-12">
                        <h3 class="Philosopher-15"> В корзине </h3>
                        <hr>

                        <table class="table table-bordered table-cart Lobster">
                            <tr id="th-cart" class="active">
                                <td class="text-center hide-mobile"> Имя товара </td>
                                <td class="text-center"> Фото </td>
                                <td class="text-center hide-mobile"> Код </td>
                                <td class="text-center"> Размер </td>
                                <td class="text-center"> Количество </td>
                                <td class="text-center"> Цена </td>
                            </tr>
                            <?php $sum = 0; ?>
                            @foreach($array_products as $product)
                                <tr style="background-color: #f5f5f5;" class="tr-cart">
                                    <td class="name-product-cart"> {{$product->category.' '.$product->name}} </td>
                                    <td class="text-center">
                                        <img class="img-in-cart img-responsive img-center" src="{{ url('/img/products/'.$product->name_img) }}">
                                    </td>
                                    <td class="text-center"> {{$product->id}} </td>
                                    <td class="text-center"> {{$product->size.' см'}} </td>
                                    <td class="text-center"> {{$product->quantity.' шт'}} </td>
                                    <td class="text-center"> {{$product->price}} </td>
                                </tr>
                                <?php $sum += ($product->discount_price != null) ? $product->discount_price - $product->price : $product->price; ?>
                            @endforeach
                            <tr>
                                <td colspan="4"></td>
                                <td class="text-center "> Сумма </td>
                                <td class="text-center summa-cart" class="text-center"> {{number_format($sum, 2, '.', '')}} </td>
                            </tr>
                        </table>
                    </div>

                </div>
            </div>

            <div class="col-sm-5 content-checkout">
                <div class="row">

                    <form action="/orders" method="POST">
                        {{ csrf_field() }}

                        <div class="col-sm-12">
                            <h3 class="Philosopher-15"> Оформление заказа </h3>
                            <hr>
                        </div>

                        <div class="col-sm-offset-1 col-sm-10 ">
                            <label> Контактные данные </label>
                            <div class="form-group">
                                <p><input required id="name" type="text" name="name" class="form-control" placeholder="Имя и фамилия" minlength="3"></p>
                                <p><input required id="phone" type="text" name="phone" class="form-control" placeholder="Мобильный телефон для подтвержения заказа" maxlength="13"></p>
                            </div>

                            <label> Способ доставки </label>
                            <table class="table border-none">
                                <tr>
                                    <td><label class="font-weight-normal"><input type="radio" name="delivery"  value="Самовывоз" checked> Самовывоз </label></td>
                                    <td><span>Текст</span></td>
                                </tr>
                                <tr>
                                    <td><label class="font-weight-normal"><input type="radio" name="delivery" value="Новая Почта" > Новая Почта </label></td>
                                    <td><span>Текст</span></td>
                                </tr>
                            </table>

                            <label> Способ оплаты </label>
                            <table class="table border-none">
                                <tr>
                                    <td><label class="font-weight-normal"><input type="radio" name="payment" value="Наличными при получении" checked> Наличными при получении </label></td>
                                </tr>
                                <tr>
                                    <td><label class="font-weight-normal"><input type="radio" name="payment" value="Картой"> Картой </label></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-sm-offset-4 col-sm-8 padding-bottom-15">
                        <a href="{{url('/')}}" class="btn btn-sm btn-default" > Продолжить покупки  </a>
                        <button type="submit" class="btn btn-sm btn-success pull-right" > Подтвердить заказ </button>
                        </div>
                    </form>

                    @include('api')
                    <?php
                    $liqpay = new LiqPay('i26478810090', 'dTEWxZNkuw4bw3WJMfcfJoz6u8CeGyYcqC6NIU34');
                    $html = $liqpay->cnb_form(array(
                            'action'         => 'pay',
                            'amount'         => 1,//$sum,
                            'currency'       => 'UAH',
                            'description'    => 'Оплата покупок, интернет-магазин Dobrotex.',
                            'order_id'       => 'order_id_1',
                            'version'        => '3'
                    ));

                    echo $html;
                    ?>

                </div>
            </div>

        </div>
    </div>
@endsection