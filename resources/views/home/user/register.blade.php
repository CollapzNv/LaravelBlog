@extends("home.layout.layout")
@section('content')
    <link rel="stylesheet" href="{{asset('lib/Validform/css/style.css')}}">
    <script src="{{asset('lib/Validform/js/Validform_v5.3.2_min.js')}}"></script>
    <article>
  
        <div id="wrap">
            <div class="container main-container ">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4 floating-box">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">请注册</h3>
                            </div>
                            <div class="panel-body">
                                <form method="POST" action="{{url('register')}}" class="userRegister">
                                    {{csrf_field()}}
                                    <div class="form-group ">
                                        <label class="control-label" for="phone">用户名</label>
                                        <input class="form-control" name="username" type="text" value="" datatype="s2-10"  ajaxurl="{{url('checkUser')}}" placeholder="请填写用户名" required="" />
                                    </div>
		 
                                    <div class="form-group ">
                                        <label class="control-label" for="phone">密码</label>
                                        <input class="form-control" name="password" type="password" value="" datatype="s6-20" placeholder="请填写密码" required="" />
                                    </div>
                                    <div class="form-group ">
                                        <label for="captcha" class="control-label">图片验证码</label>
                                        <div class="captcha-input">
                                            <input id="captcha" class="form-control" name="captcha" placeholder="请填写验证码" datatype="s4-4" required="" autocomplete="off" />
                                            <img class="thumbnail captcha" src="{{captcha_src()}}" onclick="this.src=this.src+'?'" title="点击图片重新获取验证码" />
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-lg btn-success btn-block"> <i class="fa fa-btn fa-sign-in"></i> 注册 </button>
                                    <hr />
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  

</article>

    <script>
        /*表单注册*/
        $(".userRegister").Validform({
            tiptype: 4,
            ajaxPost:true,
            callback:function(res){
                if(res.status==0){
                    layer.msg(res.msg,{icon:2})
                }else if(res.status==1){
                    layer.msg(res.msg,{time:2000,icon:1},function () {
                        location.href = "{{url('login')}}"
                    });

                }
            }

        });

    </script>

@endsection
