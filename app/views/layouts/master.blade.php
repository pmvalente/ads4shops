<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Ads4Shops</title>
        {{ HTML::style('assets/css/select2.css') }}
		{{ HTML::style('assets/css/main.css') }}
		{{ HTML::style('assets/css/font-awesome.css') }}
		{{ HTML::style('assets/css/font-awesome.min.css') }}
		{{ HTML::script('assets/js/select2.min.js', array('defer' => 'defer')) }}
		{{ HTML::script('assets/js/select2_local_pr-BR.min.js', array('defer' => 'defer')) }}
	    {{ HTML::script('assets/js/jquery-2.0.3.min.js', array('defer' => 'defer')) }}
        {{ HTML::script('assets/js/jquery.maskedinput.min.js', array('defer' => 'defer')) }}
        {{ HTML::script('assets/js/main.js', array('defer' => 'defer')) }}
    </head>
    <body>
        <header>Ads4Shops</header>
        @include('partials._menu')
        <div id="content">
            {{ HTML::flash_message() }}
            @yield('content')
        </div>
    </body>
</html>