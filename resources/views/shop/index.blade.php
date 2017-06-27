@extends('layouts.master')

@section('title')
Pizza delivery
@endsection

<div style="position:relative" class="hidden-xs">
<img src="{{URL::to('storage/img/background/pizza.jpg')}}" class="img img-responsive">
<h1 id="frontpageImage"
    align="center">The Best Pizza in Town
</h1>
<hr style="margin-top:2px">
</div>
<div class="hidden-lg hidden-md hidden-sm"> <br><br><br></div>
@section('content')

@if(Session::has('sucessful'))
<div class="row">
    <div class="col-md-4 col-md-offset-4 col-sm-offset-3">
    <div class="alert alert-success"><p class="text-center">{{Session::get('sucessful')}}</p></div>
    </div>
</div>
@endif

@foreach($products->chunk(3) as $productChunk)
 <div class="row">
   @foreach($productChunk as $product)
   <div class="col-md-4">
       <div class="thumbnail" style="background-color:#fafbd2">
       <img src="{{$product->imagePath}}" alt="pizza pomodor"class="img img-responsive" width="100%">
       <div class="caption">
           <h3 style="font-family: 'Anton'">{{$product->title}}</h3>
           <p class="description" style="font-family: 'Roboto'">{{$product->description}}</p>
               <div class="clearfix">
               <div class="pull-left price">${{$product->price}}</div>
               <a href="{{route('product.addToCart', ['id' => $product->id])}}" class="btn btn-success pull-right" role="button">Add to Cart</a>
               </div>
       </div>
       </div>
   </div>
   @endforeach
 </div>
@endforeach

{{ $products->links() }}


<div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://shoppingcart-1.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
<script id="dsq-count-scr" src="//shoppingcart-1.disqus.com/count.js" async></script>

@endsection
