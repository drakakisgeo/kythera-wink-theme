@extends('blog.base')
@section('main')
    <div class="grid-x">
        <div class="medium-8 medium-offset-2 cell" style="margin-top:80px;margin-bottom:80px">
            @foreach($articles as $article)
                <div class="blog-post">
                    <h2 class="article-title"><a href="/blog/{{$article->slug}}">{{$article->title}}</a></h2>
                    <div class="article-date">{{$article->publish_date->format(config('services.wink-theme.dateFormat'))}} @if(config('services.wink-theme.showAuthor')) <small>by {{$article->author->name}}</small> @endif</div>
                    <a href="/blog/{{$article->slug}}"><img class="thumbnail" src="{{$article->featured_image}}"
                                                            alias="{{$article->featured_image_caption}}"
                                                            width="100%"></a>
                    <p>{{$article->excerpt}}</p>

                    <div class="grid-x grid-margin-x">
                        @if(config('services.wink-theme.showMoreBtn'))
                        <div class="cell shrink">
                            <div class="readmore"><a href="/blog/{{$article->slug}}">Read more</a></div>
                        </div>
                        @endif
                        @if(config('services.wink-theme.showTags'))
                            <div class="cell auto text-right">
                                <ul class="tags">
                                    @foreach($article->tags as $tag)
                                        <li><a href="{{url('/').'/blog?tag='.$tag->slug}}" class="taglink">{{$tag->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    @if(!$loop->last)
                        <div class="divider"></div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
    <div class="grid-x text-center">
        <div class="cell">{{$articles->links()}}</div>
    </div>

@stop