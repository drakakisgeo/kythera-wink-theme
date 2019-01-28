Kythera Wink Theme
==============
Kythera is a theme for [Wink](https://github.com/writingink/wink) build with [Foundation Zurb framework Ver. 6.5](https://foundation.zurb.com/). It's the theme I made from scratch for my personal website and you can watch it live at [G.Drakakis Blog](https://www.lollypop.gr/blog). 

## How can this help?
This theme has build in a number of things:
- An index page with the articles.
- Included an article view page with for the main article
- Google analytics tracking easily configurable.
- Disqus support, easily configurable.
- Tagging logic filtering in the index.
- Social media meta enabled in article view.
- Basic pagination.

## Pre-Requirements and assumptions
You need to have a laravel project, and Wink package already installed. Wink is rather flexible on how you want your routing. This theme, at this stage is not that flexible. If you copy the routes from step 3 you'll be just fine but keep in mind that the blog index will be under "/blog" and each article will appear at "/blog/article-slug". If you need to serve your blog under a subdomain or anything else, you just need to tweak the routing and the template a bit.

## Setup
1.  In config/services.php add this option
    ```php
     'wink-theme'=>[
            'showAuthor' => false,
            'showMoreBtn' => true,
            'showTags' => true,
            'dateFormat' => 'd/m/Y',
            'googleAnalyticsAccount' => env('GOOGLE_ACCOUNT', null),
            'disqusUsername' => env('DISQUS_USERNAME', null)
        ]
    ```

2. Make a copy of the folder "wink-theme" in your /public directory.
3. Make a copy of the folder views/blog to your project at the same path. 
4. Copy/paste those routes in your routes/web.php
    ```php
         Route::get('/blog', function (\Illuminate\Http\Request $request) {
             $tag = $request->tag;
             $articles = WinkPost::with('tags')
                 ->when($tag, function ($query, $tag) {
                     return $query->whereHas('tags', function ($q) use ($tag) {
                         $q->where('slug', $tag);
                     });
                 })
                 ->live()
                 ->orderBy('publish_date', 'DESC')
                 ->simplePaginate(10);
             return view('blog.index')->with('articles', $articles);
         });
         
         Route::get('/blog/{slug}', function ($slug) {
             $article = WinkPost::where('slug', $slug)->first();
             return view('blog.article')->with('article', $article)->with('meta', $article->meta);
         });
    ``` 

Have fun!