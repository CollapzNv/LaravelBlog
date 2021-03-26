
@extends("home.layout.layout")
@section('content')

    <link href="{{asset('home/css/info.css')}}" rel="stylesheet">
<article>
    @include("home.layout.sidebar")


  <main>
    <div class="infosbox">
      <div class="newsview">
        <h3 class="news_title">{{$article['title']}}</h3>
        <div class="bloginfo">
          <ul>
            <li class="author">作者：<a href="/">{{$article['author']}}</a></li>
           
            <li class="timer">时间：{{$article['created_at']}}</li>
            <li class="view">{{$article['views']}}人已阅读</li>
          </ul>
        </div>

        <div class="news_about"><strong>简介</strong>

            {{$article['desc']}}
		</div>
        <div class="news_con">
            {!! $article['content']!!}
		
      </div>
      <div class="share">
        <p class="diggit"><a href="javascript:void(0);"> 很赞哦！ </a>(<b id="diggnum"><script type="text/javascript" src="/e/public/ViewClick/?classid=2&id=20&down=5"></script>13</b>)</p>
      </div>
      <div class="nextinfo">
        <p>上一篇：<a href="#">关于程序员面试的问题</a></p>
        <p>下一篇：<a href="#">程序员最讨厌康熙的哪个儿子</a></p>
      </div>
      <div class="news_pl">
        <h2>文章评论</h2>
        <div class="gbko"> 

          <div class="fb">
            <ul>
              <p class="fbtime"><span>2018-07-24 11:52:38</span>dancesmile</p>
              <p class="fbinfo">可以啊，好评之</p>
            </ul>
          </div>
          
          
         
          <form action="?" method="post" >
            <div id="plpost">
              <p class="saying"><span><a href="#">共有<script type="text/javascript" src=""></script>2条评论</a></span>来说两句吧...</p>

              <p class="yzm"><span>验证码:</span>
                <input name="key" type="text" class="inputText" size="16">
              </p>
            
              <textarea name="saytext" rows="6" id="saytext"></textarea>
              <input type="submit" value="提交">

            </div>
          </form>
        </div>
      </div>
    </div>
  </main>
</article>


@endsection