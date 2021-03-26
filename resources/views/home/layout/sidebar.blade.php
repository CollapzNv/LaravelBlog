<aside class="l_box">

    <div class="search">
        <form action="/e/search/index.php" method="post" name="searchform" id="searchform">
            <input name="keyboard" id="keyboard" class="input_text" value="请输入关键字词" style="color: rgb(153, 153, 153);" onfocus="if(value=='请输入关键字词'){this.style.color='#000';value=''}" onblur="if(value==''){this.style.color='#999';value='请输入关键字词'}" type="text">
            <input name="Submit" class="input_submit" value="搜索" type="submit">
        </form>
    </div>

    <div class="about_me">
        <h2>关于作者</h2>
        <ul>
            <i><img src="{{asset('home/images/bug.jpg')}}"></i>
            <p><b>*</b>{{$SYSTEM['desc']}}</p>
        </ul>
    </div>


    <div class="tuijian">
        <h2>最近发布</h2>
        <ul>
            @foreach($LATEST as $k=>$v)
            <li><a href="{{url('article/detail/'.$v['id'])}}">{{$v['title']}}</a></li>
            @endforeach

        </ul>
    </div>

    <div class="guanzhu">
        <h2>好好干</h2>
        <ul>
            <img src="{{asset('home/images/reward.gif')}}">
        </ul>
    </div>

    <div class="cloud">
        <h2>文章标签</h2>
        <ul>
            @foreach($KEYWORDS as $k=>$v)
            <li><a href="javascript:void(0);">{{$v}}</a> </li>
            @endforeach
        </ul>
    </div>

    <div class="links">
        <h2>友情链接</h2>
        <ul>
            <li><a href="https://www.google.com/" target="_blank">咕噜咕噜</a> </li>
            <li><a href="https://ke.qq.com" target="_blank">腾讯课堂</a></li>
            <li><a href="https://bilibili.com" target="_blank">性感二刺猿</a></li>
            <li><a href="https://github.com" target="_blank">同性交友</a></li>
        </ul>
    </div>

</aside>