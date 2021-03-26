
@extends("home.layout.layout")
@section('content')

    <script type="text/javascript" src="js/hc-sticky.js"></script>
    <style>
        #slidr-img img{width:680px;height:300px}
        #footer{position: relative;margin: 0 auto;background: #304040;padding: 20px;}
    </style>


<article>
    @include("home.layout.sidebar")

  <main class="r_box">

   <li><i><a href="detail.html"><img src="images/p.png"></a></i>
      <h3><a href="detail.html">关于程序员面试的问题</a></h3>
      <p>一程序员去面试，面试官问：“你毕业才两年，这三年工作经验是怎么来的？！”程序员答：“加班。”</p>
    </li>


    <div class="pagelist"> </div>
  </main>
</article>

@endsection

