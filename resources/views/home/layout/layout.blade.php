<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <title>{{$SYSTEM['title']}}</title>
    <meta name="keywords" content="{{$SYSTEM['keywords']}}" />
    <meta name="description" content="{{$SYSTEM['desc']}}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('home/css/base.css')}}" rel="stylesheet">
    <link href="{{asset('home/css/index.css')}}" rel="stylesheet">
    <link href="{{asset('home/css/m.css')}}" rel="stylesheet">
    <link href="{{asset('home/css/login.css')}}" rel="stylesheet">
    <script src="{{asset('home/js/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('lib/Layer/layer.js')}}"></script>
    <script type="text/javascript" src="{{asset('home/js/comm.js')}}"></script>
    <script type="text/javascript" src="{{asset('home/js/slidr.js')}}"></script>

    <!--[if lt IE 9]>
    <script src="{{asset('home/js/modernizr.js')}}"></script>
    <![endif]-->


</head>
<body>
<header class="header-navigation" id="header">
    <nav><div class="logo"><a href="/">{{$SYSTEM['title']}}</a></div>
        <h2 id="mnavh"><span class="navicon"></span></h2>
        <ul id="starlist">
            <li><a href="/">首页</a></li>
            @foreach($CATES as $k=>$v)
            <li><a href="{{url('cate/'.$v['id'])}}">{{$v['name']}}</a></li>
            @endforeach

            @if(session('user'))
                <li><a href="javascript:void(0);" class="btn btn-default login-btn no-pjax">欢迎，{{session('user')}}</a></li>
                <li><a href="{{url('logout')}}" class="btn btn-default login-btn no-pjax">退 出</a></li>
            @else
                <li><a href="{{url('login')}}" class="btn btn-default login-btn no-pjax">登 录</a></li>
                <li><a href="{{url('register')}}" class="btn btn-default login-btn no-pjax">注 册</a></li>
            @endif
        </ul>
    </nav>
</header>
@section('content')


@show

<footer id="footer" >
    <p>Powerd By  <a href="{{$SYSTEM['url']}}" target="_blank">{{$SYSTEM['author']}}</a> <a href="/">{{$SYSTEM['footer']}}</a></p>
</footer>
<a href="#" class="cd-top">Top</a>

</body>
<script>
    slidr.create('slidr-img').start();


</script>
</html>