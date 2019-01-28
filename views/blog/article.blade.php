@extends('blog.base')

@section('socialmeta')
        <meta itemprop="name" content="{{config('app.name')}}">
        <meta itemprop="description" content="{{$meta['meta_description']}}">
    @if($meta['opengraph_title'] !=='')
        <meta property="og:url" content="{{config('app.url')}}">
        <meta property="og:type" content="website">
        <meta property="og:title" content="{{$meta['opengraph_title']}}">
        <meta property="og:description" content="{{$meta['opengraph_description']}}">
        <meta property="og:image" content="{{config('app.url').$meta['opengraph_image']}}">
    @endif
    @if($meta['twitter_title'] !=='')
        <meta name="twitter:title" content="{{$meta['twitter_title']}}">
        <meta name="twitter:description" content="{{$meta['twitter_description']}}">
        <meta name="twitter:image" content="{{config('app.url').$meta['twitter_image']}}">
    @endif
@stop

@section('header')
    <div class="callout"
         style="background-image: url({{$article->featured_image}});height:250px;background-size: cover;background-position: center;background-repeat: no-repeat;border:0px;"></div>
@stop

@section('backlink')
    <a href="/blog" class="home">< Back to index</a>
@stop

@section('main')
    <div class="grid-x">
        <div class="cell medium-8 medium-offset-2" id="article">
            <div class="blog-post">
                <h2 class="article-title">{{$article->title}}</h2>
                <div class="article-date">{{$article->publish_date->format('d/m/Y')}}</div>
                <div class="article-body">
                    {!! $article->body !!}
                </div>
            </div>
        </div>
    </div>
    @if(config('services.wink-theme.disqusUsername'))
    <div class="grid-x">
        <div class="cell">
            <div id="disqus_thread"></div>
        </div>
    </div>
    @endif
@stop

@section('disqusBlock')
    @if(config('services.wink-theme.disqusUsername'))
        <script>
            (function() { // DON'T EDIT BELOW THIS LINE
                var d = document, s = d.createElement('script');
                s.src = 'https://{{config('services.wink-theme.disqusUsername')}}.disqus.com/embed.js';
                s.setAttribute('data-timestamp', +new Date());
                (d.head || d.body).appendChild(s);
            })();
        </script>
        <script id="dsq-count-scr" src="//{{config('services.wink-theme.disqusUsername')}}.disqus.com/count.js" async></script>
    @endif
@stop