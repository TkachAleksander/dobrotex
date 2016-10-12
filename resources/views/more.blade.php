@extends('layouts.master')
@section('content')
    <div class="container">

            <div class="col-sm-offset-1 col-sm-10 content">
                <div class="row">
                    <div class="col-sm-5">
                        <img class="img-responsive" src="{{ url('img/1.jpg')}}" alt="Постельное белье" style="border-radius: 2px; border: 1px solid rgba(0, 31, 255, 0.22);">
                    </div>
                    <div class="col-sm-6">
                        <h3>
                            Постельное белье Вилюта 8624
                        </h3>
                        <table class="table table-bordered" style="background-color: #fff;">
                            <tr>
                                <td>Производитель:</td>
                                <td>Вилюта (Украина)</td>
                            </tr>
                            <tr>
                                <td>Состав:</td>
                                <td> 100% хлопок (ранфорс)</td>
                            </tr>
                            <tr>
                                <td>Производитель:</td>
                                <td>Вилюта (Украина)</td>
                            </tr>                                                        
                        </table>

                            <table class="table">
                                <tr>
                                    <td><input type="radio" name="option2" value="a2"> Полуторный комплект </td>
                                    <td> 300 грн </td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="option2" value="a2"> Двуспальный комплект </td>
                                    <td> 400 грн </td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="option2" value="a2"> Семейный комплект</td>
                                    <td> 500 грн </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <a href="{{ url('/more') }}" class="btn btn-danger pull-right" role="button"> Купить </a>
                                    </td>
                                </tr>                                                                
                            </table>
                            
                                

                             
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-11" style="padding-top: 25px;">
                        <p align="justify">
Постельное белье из ранфорса с нежным рисунком порадует Вас прекрасным качеством.
Обратите внимание, что рисунок, нанесенный на наволочку, может несколько отличаться от фотографии.Указанные различия имеют место из-за особенностей орнамента на самой ткани. Напоминаем, что производитель не рассматривает подобное несоответствие в качестве бракованной или некондиционной продукции, поэтому обмену или возврату такие изделия не подлежат.
Обратите внимание, что дополнительно Вы можете купить в нашем магазине наволочки Вилюта 8624 в размере 50х70 см, а также простынь Вилюта 8624 в любом, необходимом Вам количестве!
                        </p>
                    </div>
                </div>
            </div> 	
    </div>
	
@endcontent