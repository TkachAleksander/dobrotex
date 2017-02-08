@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">

            <div class="col-sm-offset-1 col-sm-10 content">
                <div class="row">
                    <form role="form" method="POST" action="/orders">
                        {{ csrf_field() }}
                        <div class="modal-header">
                           <h4 class="modal-title" id="myModalLabel"> Оформить заказ </h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-offset-1 col-sm-10">
                                    <div class="form-group">
                                        <label> Как к Вам обращаться ? </label>
                                        <input required id="l_name" type="text" name="l_name" class="form-control" placeholder="Фамилия" maxlength="30"><div class="error-box"></div><p></p>
                                        <input required id="f_name" type="text" name="f_name" class="form-control" placeholder="Имя" maxlength="30"><div class="error-box"></div><p></p>
                                        <input required id="s_name" type="text" name="s_name" class="form-control" placeholder="Отчество" maxlength="30"><div class="error-box"></div><p></p>

                                    </div>

                                    <div class="form-group">
                                        <label> Контактный телефон для подтвержения заказа </label>
                                        <input required id="phone" type="text" name="phone" class="form-control" placeholder="0951177733" maxlength="10"><div class="error-box"></div><p></p>
                                        <p class="checkoutPhoneError"></p>
                                    </div>

                                    <label> Способ доставки </label>
                                    <p>
                                        <label class="radio-inline"><input id="input-np" class="input-delivery" type="radio" name="delivery"> Новая Почта </label>
                                        <label class="radio-inline"><input id="input-issuing-point" class="input-delivery active" type="radio" name="delivery" checked="checked"> Из точки выдачи </label>
                                    </p>

                                    {{--<label> Способ оплаты </label>--}}
                                    {{--<p>--}}
                                        {{--<label class="radio-inline"><input id="input-np" class="input-delivery" type="radio" name="delivery"> Наличными </label>--}}
                                        {{--<label class="radio-inline"><input id="input-issuing-point" class="input-delivery active" type="radio" name="delivery" checked="checked"> Картой </label>--}}
                                    {{--</p>--}}
                                    <div id="div-delivery">
                                        <input type="text" name="address" class="form-control" placeholder="Город Сумы, ул.Харьковская, д.54" required disabled>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal" data-toggle="modal" data-target="#cart"> Корзина </button>
                            <button type="submit" class="btn btn-success"> Заказать </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection