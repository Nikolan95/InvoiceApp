<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
    	  <title>Krooya</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Avant">
        <meta name="author" content="The Red Team">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script type="text/javascript">
            var csrf = "{{csrf_token()}}";
        </script>
        <link href="{{ asset('/css/styles.css') }}" rel="stylesheet">
        
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600' rel='stylesheet' type='text/css'> <!-- slova za stampu -->

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"><!-- datepicker -->

        <link href="{{ asset('/css/dataTables.css') }}" rel="stylesheet"> <!-- tabele -->

        <link href="{{ asset('/fonts/glyphicons/css/glyphicons.min.css') }}" rel="stylesheet"> <!--  gyphs za logout -->                
    </head>
    <body class="">
        @include('layouts.header')
        <div id="page-container">
        
            @include('layouts.navigationbar')
            <div class="row">
                <div class="container">            
                    <main class="py-4">
                        @yield('containerr')
                    </main>
                </div> 
            </div>
         
            @include('layouts.footer')  
        </div> 
        @include('layouts.modals')
    </body>

    <script src="{{ asset('js/jquery-1.10.2.min.js') }}" defer></script>

    <script src="{{ asset('js/jqueryui-1.10.3.min.js') }}" defer></script>

    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script> <!-- admin panel -->

    <script src="{{ asset('js/enquire.js') }}" defer></script><!-- minimizovanje tabela -->

    <script src="{{ asset('js/jquery.nicescroll.min.js') }}" defer></script><!-- ne rade neki delovi createjsa, tipa addrow deleterow ited -->

    <!-- prettify -->

    <!-- sparklines min js -->

    <!-- placehodir js -->

    <script src="{{ asset('js/application.js') }}" defer></script><!-- aktivira sidebar -->

    <script src="{{ asset('js/accounting.js') }}" defer></script><!-- formatira data u js -->

    <script src="{{ asset('js/moment.js') }}" defer></script><!-- formatira data u js -->

    <script src="{{ asset('js/jquery.PrintArea.js') }}" defer></script><!-- media print -->

    <script src="{{ asset('js/demo-datatables.js') }}" defer></script><!-- search i paggination tabela -->

    <!-- toggle min js -->

    <script src="{{ asset('js/jquery.dataTables.min.js') }}" defer></script><!-- search i paggination tabela -->

    <script src="{{ asset('js/dataTables.bootstrap.js') }}" defer></script><!-- kompletan izgled tabela -->

    <script src="{{ asset('js/Chart.min.js') }}" defer></script><!-- moji chartovi -->

    <script src="{{ asset('js/chartjs.js') }}" defer></script><!-- default chartovi za dashboard -->

    <script src="{{ asset('js/create.js') }}" defer></script><!-- moj js -->

</html>