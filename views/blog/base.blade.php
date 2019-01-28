<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    @yield('socialmeta')
    <title>{{config('app.name')}} blog</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.5.2/css/foundation.min.css">
    <link href="https://fonts.googleapis.com/css?family=Didact+Gothic|Tinos:400,700&amp;subset=greek" rel="stylesheet">
    <link rel="stylesheet" href="{{url('/')}}/wink-theme/css/wink.css">
</head>
<body>
<div class="grid-x small-up-2 align-items-center header">
    <div class="cell shrink">
        @section('backlink')
            <a href="/" class="home">< Home</a>
        @show
    </div>
    <div class="cell text-right">
        <a href="/" class="signature">{{config('app.name')}} blog</a>
    </div>
</div>
@section('header')
    <div class="callout headerimg"></div>
@show
<div class="grid-container">
    @yield('main')
</div>
@if(config('services.wink-theme.googleAnalyticsAccount'))
    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', '{{config('services.wink-theme.googleAnalyticsAccount')}}']);
        _gaq.push(['_trackPageview']);

        (function () {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();

    </script>
@endif
@yield('disqusBlock')
</body>
</html>
