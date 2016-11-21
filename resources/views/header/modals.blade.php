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
                        <th class="text-center hide-mobile"> Имя товара </th>
                        <th class="text-center"> Фото </th>
                        <th class="text-center hide-mobile"> Код </th>
                        <th class="text-center"> Размер </th>
                        <th class="text-center"> Количество </th>
                        <th class="text-center"> Цена </th>
                    </tr>
                    <tr>
                        <td colspan="4"></td>
                        <td class="text-center "><b>Сумма</b></td>
                        <td class="summa-cart" class="text-center">0 грн</td>
                    </tr>
                </table> 
            </div>
            
            <div class="modal-footer Lobster">
                <button type="button" class="btn btn-default" data-dismiss="modal"> Закрыть </button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#checkout"> Оформить заказ </button>
            </div>
        </div>
    
    </div>
</div>

<div class="modal fade" id="checkout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-dialog-checkout" role="document">
        <div class="modal-content Lobster">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"> Оформить заказ </h4>
            </div>
            <div class="modal-body">
            <div class="row">
                <div class="col-sm-offset-1 col-sm-10">
                    <form role="form" method="POST" action="" >
                            <div class="form-group">
                                <label> Как к Вам обращаться ? </label>
                                <p><input required type="text" name="f_name" class="form-control inputCheckoutName" placeholder="Имя" onblur="inputCheckoutName()"></p>
                                <p class="checkoutNameError"></p>
                                <input required type="text" name="l_name" class="form-control inputCheckoutLName" placeholder="Фамилия" onblur="inputCheckoutLName()">
                                <p class="checkoutLNameError"></p>
                            </div>
                            <div class="form-group">
                                <label> Номер телефона для подтвержения заказа </label>
                                <input required type="text" name="phone" class="form-control inputPhone" placeholder="0951177733" onblur="inputPhone()">
                                <p class="checkoutPhoneError"></p>
                            </div>

                            <label> Адрес получателя </label>

                            <p>
                            <div class="row">
                                <div class="col-sm-5">
                                    <input  type="text" name="delivery" class="form-control input-delivery" placeholder="Улица">
                                </div>
                                <div class="col-sm-3">
                                    <input  type="text" name="delivery" class="form-control input-delivery" placeholder="Дом">
                                </div>
                                <div class="col-sm-4">
                                    <input  type="text" name="delivery" class="form-control input-delivery" placeholder="Квартира"></p>
                                </div>
                            </div>
                    </form>
                </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" data-toggle="modal" data-target="#cart"> Корзина </button>
                <button type="button" class="btn btn-success"> Заказать </button>
            </div>
        </div>
    </div>
</div>