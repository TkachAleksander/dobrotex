<!-- Корзина -->
<div class="modal fade"  id="cart" tabindex="-1" role="dialog" aria-labelledby="ModalLabel">
    <div class="modal-dialog Lobcter" role="document">
        
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title Lobster" id="ModalLabel" > Корзина </h4>
            </div>
            
            <div class="modal-body">
                <table class="table table-bordered table-cart Lobster">
                    <tr id="th-cart" class="active">
                        <td class="text-center hide-mobile"> Имя товара </td>
                        <td class="text-center"> Фото </td>
                        <td class="text-center hide-mobile"> Код </td>
                        <td class="text-center"> Размер </td>
                        <td class="text-center" style="min-width: 145px;"> Количество </td>
                        <td class="text-center"> Цена </td>
                    </tr>
                    <tr>
                        <td colspan="4"></td>
                        <td class="text-center ">Сумма</td>
                        <td class="text-center summa-cart" class="text-center">0 грн</td>
                    </tr>
                </table> 
            </div>
            
            <div class="modal-footer Lobster">
                <button type="button" class="btn btn-default" data-dismiss="modal"> Закрыть </button>
                <a href="/checkout/order" type="button" class="btn btn-primary btn-checkout"> Оформить заказ </a>

                {{--<button type="button" class="btn btn-primary btn-checkout" data-dismiss="modal" data-toggle="modal" data-target="#checkout"> Оформить заказ </button>--}}
            </div>
        </div>
    
    </div>
</div>

<!-- Оформить заказ -->
{{--<div class="modal fade" id="checkout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">--}}
    {{--<div class="modal-dialog modal-dialog-checkout" role="document">--}}
        {{--<div class="modal-content Lobster">--}}

            {{--<form role="form" method="POST" action="/orders">--}}
                {{--{{ csrf_field() }}--}}
                {{--<div class="modal-header">--}}
                    {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>--}}
                    {{--<h4 class="modal-title" id="myModalLabel"> Оформить заказ </h4>--}}
                {{--</div>--}}
                {{--<div class="modal-body">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-sm-offset-1 col-sm-10">--}}
                            {{--<div class="form-group">--}}
                                {{--<label> Как к Вам обращаться ? </label>--}}
                                {{--<input required id="l_name" type="text" name="l_name" class="form-control" placeholder="Фамилия" maxlength="30"><div class="error-box"></div><p></p>--}}
                                {{--<input required id="f_name" type="text" name="f_name" class="form-control" placeholder="Имя" maxlength="30"><div class="error-box"></div><p></p>--}}
                                {{--<input required id="s_name" type="text" name="s_name" class="form-control" placeholder="Отчество" maxlength="30"><div class="error-box"></div><p></p>--}}

                            {{--</div>--}}

                            {{--<div class="form-group">--}}
                                {{--<label> Номер телефона для подтвержения заказа </label>--}}
                                {{--<input required id="phone" type="text" name="phone" class="form-control" placeholder="0951177733" maxlength="10"><div class="error-box"></div><p></p>--}}
                                {{--<p class="checkoutPhoneError"></p>--}}
                            {{--</div>--}}

                            {{--<label> Способ доставки </label>--}}
                            {{--<p>--}}
                            {{--<label class="radio-inline"><input id="input-np" class="input-delivery" type="radio" name="delivery"> Новая Почта </label> --}}
                            {{--<label class="radio-inline"><input id="input-issuing-point" class="input-delivery active" type="radio" name="delivery" checked="checked"> Из точки выдачи </label>--}}
                            {{--</p>--}}

                            {{--<div id="div-delivery">--}}
                                {{--<input type="text" name="address" class="form-control" placeholder="Город Сумы, ул.Харьковская, д.54" required disabled>--}}
                            {{--</div>--}}

                            {{--<p></p>--}}
                            {{--<label> Способ оплаты </label>--}}
                            {{--<p>--}}
                                {{--<label class="radio-inline"><input id="input-np" class="input-delivery" type="radio" name="delivery"> Оплатить наличными </label>--}}
                                {{--<label class="radio-inline"><input id="input-issuing-point" class="input-delivery active" type="radio" name="delivery" checked="checked"> Оплатить картой </label>--}}
                            {{--</p>--}}
            {{--<form method="POST" action="https://www.liqpay.com/api/3/checkout"--}}
                  {{--accept-charset="utf-8">--}}
                {{--<input type="hidden" name="data" value="eyAidmVyc2lvbiIgOiAzLCAicHVibGljX2tleSIgOiAieW91cl9wdWJsaWNfa2V5IiwgImFjdGlv--}}
                                                        {{--biIgOiAicGF5IiwgImFtb3VudCIgOiAxLCAiY3VycmVuY3kiIDogIlVTRCIsICJkZXNjcmlwdGlv--}}
                                                        {{--biIgOiAiZGVzY3JpcHRpb24gdGV4dCIsICJvcmRlcl9pZCIgOiAib3JkZXJfaWRfMSIgfQ=="/>--}}
                {{--<input type="hidden" name="signature" value="dTEWxZNkuw4bw3WJMfcfJoz6u8CeGyYcqC6NIU34"/>--}}
                {{--<input type="image"--}}
                       {{--src="//static.liqpay.com/buttons/p1ru.radius.png"/>--}}
            {{--</form>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="modal-footer">--}}
                    {{--<button type="button" class="btn btn-default" data-dismiss="modal" data-toggle="modal" data-target="#cart"> Корзина </button>--}}
                    {{--<button type="submit" class="btn btn-success"> Заказать </button>--}}
                {{--</div>--}}
            {{--</form>--}}

        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}