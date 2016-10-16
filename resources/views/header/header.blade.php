<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="    #bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand Oswald" href="/">Dobrotex</a>
        </div>


        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav top-menu Philosopher-15">

                @foreach($top_menu as $id => $cat)
                    <li id="{{ 'cat'.$id }}"><a href="{{ $cat->link }}"> {{ $cat->name }} </a></li>
                @endforeach

            </ul>
         
            <ul class="nav navbar-nav navbar-right">
                <li><div class="cart"><p class="text-center">1500.00<p></div></li>
            </ul>
        </div>

    </div>
</nav>