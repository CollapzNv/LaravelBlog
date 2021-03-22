@extends("admin.layout.layout")
@section('content')

  <body>
<div class="panel admin-panel">
  <div class="panel-head"><strong><span class="icon-key"></span> 修改会员密码</strong></div>
  <div class="body-content">
    <form method="post" class="form-x editPass" action="{{url('admin/pass')}}">
        {{csrf_field()}}
      <div class="form-group">
        <div class="label">
          <label for="sitename">管理员帐号：</label>
        </div>
        <div class="field">
          <label style="line-height:33px;">
              {{session('username')}}
          </label>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label for="sitename">原始密码：</label>
        </div>
        <div class="field">
          <input type="password" class="input w50" id="password" name="password" size="50" placeholder="请输入原始密码" ajaxurl="{{url('admin/checkPass')}}" datatype="s4-10" {{--data-validate="required:请输入原始密码"--}} />
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label for="sitename">新密码：</label>
        </div>
        <div class="field">
          <input type="password" class="input w50" name="newpass" size="50" placeholder="请输入新密码" datatype="s4-10"{{--data-validate="required:请输入新密码,length#>=5:新密码不能小于5位"--}} />
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label for="sitename">确认新密码：</label>
        </div>
        <div class="field">
          <input type="password" class="input w50" name="renewpass" size="50" recheck="newpass" placeholder="请再次输入新密码" datatype="s4-10"{{--data-validate="required:请再次输入新密码,repeat#newpass:两次输入的密码不一致"--}} />
        </div>
      </div>

      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
        </div>
      </div>
    </form>
  </div>
</div>
</body>
<script>
    $(".editPass").Validform({
        tiptype:4,
        ajaxPost:true,
        callback:function(res){
            if(res.status==0){
                layer.msg(res.msg,{icon:2})
            }else if(res.status==1){
                layer.msg(res.msg,{time:2000,icon:1},function () {
                    window.parent.location.href = "{{url('admin/toLogout')}}"
                });

            }
        }
    });

</script>
@endsection
