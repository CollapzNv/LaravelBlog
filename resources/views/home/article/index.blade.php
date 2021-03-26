
@extends("home.layout.layout")
@section('content')

    <script type="text/javascript" src="js/hc-sticky.js"></script>
    <style>
        #slidr-img img{width:680px;height:300px}
        #footer{position: relative;margin: 0 auto;background: #304040;padding: 20px;}
         .page-item{display: inline-block;}
    </style>


<article>
    @include("home.layout.sidebar")

    <main class="r_box">

        @foreach($articles as $k=>$v)
            <li><i><a href="{{url('article/detail/'.$v->id)}}"><img src="{{$v['img_url']}}"></a></i>
                <h3><a href="{{url('article/detail/'.$v->id)}}">{{$v->title}}</a></h3>
                <p>{{$v->desc}}</p>
            </li>
        @endforeach

            {{$articles->links()}}
        <div class="pagelist"> </div>
    </main>
</article>

@endsection

