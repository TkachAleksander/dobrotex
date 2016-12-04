<!-- Подробнее о заказе -->

<div class="modal fade" id="moreOrder" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-dialog-checkout" role="document">
        <div class="modal-content Lobster">

            <form role="form" method="POST" action="/orders">
                {{ csrf_field() }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"> Подробнее о заказе </h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered">
                                <tr id="tr-moreOrder" class="active">
                                    <th class="text-center"> Код </th>
                                    <th class="text-center"> Имя товара </th>
                                    <th class="text-center"> Наполнитель </th>
                                    <th class="text-center"> Размер </th>
                                    <th class="text-center"> Количество </th>
                                    <th class="text-center"> Закупка </th>
                                    <th class="text-center"> Цена - скидка</th>
                                    <th class="text-center"> Скидка </th>
                                    <th class="text-center"> Прибыль </th>
                                </tr>

                                <tr>
                                    <td colspan="6" > Всего: </td>
                                    <td id="sum-more-order"></td>
                                    <td></td>
                                    <td id="sum-profit"></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button"  data-dismiss="modal" aria-label="Close"> Закрыть </button>
                </div>
            </form>

        </div>
    </div>
</div>