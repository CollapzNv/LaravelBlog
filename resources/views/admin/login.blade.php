@extends("admin.layout.layout")
@section('content')

    <body>
<div class="bg"></div>
<div class="container">
    <div class="line bouncein">
        <div class="xs6 xm4 xs3-move xm4-move">
            <div style="height:150px;"></div>
            <div class="media media-y margin-big-bottom">
            </div>
            <form action="{{url('admin/toLogin')}}" method="post" class="adminLogin">
                {{csrf_field()}}
            <div class="panel loginbox">
                <div class="text-center margin-big padding-big-top"><h1>后台管理中心</h1></div>
                <div class="panel-body" style="padding:30px; padding-bottom:10px; padding-top:10px;">
                    <div class="form-group">
                        <div class="field field-icon-right">
                            <input type="text" class="input input-big" name="name" placeholder="登录账号" {{--data-validate="required:请填写账号"--}} datatype="s4-10"/>
                            <span class="icon icon-user margin-small"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="field field-icon-right">
                            <input type="password" class="input input-big" name="password" placeholder="登录密码" datatype="s4-8"{{--data-validate="required:请填写密码"--}} />
                            <span class="icon icon-key margin-small"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="field">
                            <input type="text" class="input input-big" name="code" placeholder="填写右侧的验证码" datatype="s4-4" {{--data-validate="required:请填写右侧的验证码"--}} />
                           <img src="{{captcha_src()}}" alt="" width="100" height="32" class="passcode" style="height:43px;cursor:pointer;" onclick="this.src=this.src+'?'">

                        </div>
                    </div>
                </div>
                <div style="padding:30px;"><input type="submit" class="button button-block bg-main text-big input-big" value="登录"></div>
            </div>
            </form>
        </div>
    </div>
</div>

</body>

    <script>
        /*表单登录*/
        $(".adminLogin").Validform({
            tiptype: 4,
            ajaxPost:true,
            callback:function(res){
                if(res.status==0){
                    layer.msg(res.msg,{icon:2})
                }else if(res.status==1){
                    layer.msg(res.msg,{time:2000,icon:1},function () {
                        location.href = "{{url('admin/index')}}"
                    });

                }
            }

        });

    </script>

@endsection
