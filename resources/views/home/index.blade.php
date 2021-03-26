@extends("home.layout.layout")
@section('content')

<article>
  @include("home.layout.sidebar")


  <style>
    .page-item{display: inline-block;}
  </style>
  <main class="r_box">
	 <div id="slidr-img" style="display: inline-block">
       @foreach($SLIDESHOW as $item)
	  <img data-slidr="{{$loop->iteration}}" style="cursor: pointer;" onclick="window.open('{{$item['url']}}')" src="{{$item['src']}}"/>
       @endforeach
	</div>
	 

    @foreach($ARTICLES as $k=>$item)
	 <li><i><a href="{{url('article/detail/'.$item->id)}}"><img src="{{$item->img_url}}"></a></i>
      <h3><a href="{{url('article/detail/'.$item->id)}}">{{$item->title}}</a></h3>
      <p>{{$item->desc}}</p>
    </li>
    @endforeach
    {{$ARTICLES->links()}}

 

  </main>
</article>


@endsection