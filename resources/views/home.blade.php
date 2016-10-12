@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-3 left-content">
            	<p class="text-center Philosopher filters">Фильтры<hr></p>
            </div>    

            <div class="col-sm-offset-1 col-sm-8 content">
                <div class="row">
                <?php for ($i=0; $i<9; $i++){ ?>

                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="{{ url('img/1.jpg')}}" alt="Постельное белье">
                            <div class="caption">
                                <p>Постельное белье Вилюта 8624</p>
                                <p>от 120.00 грн
                                <a href="{{ url('/more') }}" class="btn btn-danger pull-right" role="button"> Купить </a></p>
                            </div>
                        </div>
                    </div>

                <?php } ?>
                </div>
            </div> 	
        </div>
  	</div>
@endsection