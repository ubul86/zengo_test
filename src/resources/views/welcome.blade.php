<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
          integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <link rel="stylesheet" href="{{mix('css/app.css')}}">

    <!-- Styles -->
    <style>
        
    </style>
</head>
<body>
{{--<div class="flex-center position-ref full-height">--}}

<div id="app">        
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1>Cities and Counties Laravel + Vue example</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">    
                <section class="left">
                    <county></county>                
                    <create-city></create-city>
                </section>
            </div>
            <div class="col-md-7">                
                <section class="right">
                    <city></city>                
                </section>
            </div>
        </div>
    </div>


</div>

{{--</div>--}}

<script async src="{{mix('js/app.js')}}"></script>
</body>
</html>
