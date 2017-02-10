<style>
    table{
    	border-spacing: 0;
        border-collapse: collapse;
    }
	.table{
        width: 100%;
        max-width: 100%;
        margin-top: 20px;
        margin-bottom: 20px;
	}
	table,
	table>tbody>tr>td,
	table>tbody>tr>th{
		border:1px solid #ddd;
	}
	.text-center{ text-align: center; }
	.text-right{ text-align: right; margin-right: 15px; }
</style>

<p> Новый заказ: </p>
<b> {{ $name}} </b><br>
<b> тел. </b>{{ " ".$phone}}<br>
<b> адрес: </b>{{ " ".$address }}

<table class="table table-bordered">
<tr>
	<th> Код </th>
	<th> Имя товара </th>
	<th> Наполнитель </th>
	<th> Размер </th>
	<th> Количество </th>
	<th> Скидка </th>
	<th> Цена - скидка </th>
</tr>
    <?php $sum = 0; ?>
@foreach ($cart_info as $key=>$value)
    <?php 
    	$value->price = ($value->discount_price != null) ? $value->price - $value->discount_price : $value->price; 
    	$value->discount_price = ($value->discount_price != null) ? $value->discount_price : "---";
    	$sum += $value->price;
    ?>
<tr>
	<td class="text-center">{{ $value->id }}</td>
	<td>{{ $value->category." ".$value->name }}</td>
	<td>{{ $value->set_of_characteristics }}</td>
	<td class="text-center">{{ $value->size }}</td>
	<td class="text-center">{{ $value->quantity }}</td>
	<td class="text-center">{{ $value->discount_price }}</td>
	<td class="text-center">{{ $value->price }}</td>
</tr>
@endforeach
<tr>
	<td class="text-right" colspan="6"> Сумма </td>
	<td class="text-center" >{{ $sum }}</td>
</tr>
</table>