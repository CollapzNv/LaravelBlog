@extends("admin.layout.layout")
@section('content')

  <body>
<div class="panel admin-panel">
  <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 网站信息</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="">
      <div class="form-group">
        <div class="label">
          <label>网站标题：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="stitle" value="{{$setting['title']}}" disabled/>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>网站LOGO：</label>
        </div>
        <div class="field">
          <input type="text" id="url1" name="slogo" class="input tips" style="width:25%; float:left;" value="{{$setting['img']}}" data-toggle="hover" data-place="right" data-image=""  />
          <input type="button" class="button bg-blue margin-left" id="image1" value="+ 浏览上传" >
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>网站域名：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="surl" value="{{$setting['url']}}" disabled/>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>作者：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="sauthor" disabled value="{{$setting['author']}}" />
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>网站关键字：</label>
        </div>
        <div class="field">
          <textarea class="input" name="skeywords" style="height:80px" disabled>{{$setting['keywords']}}</textarea>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>网站描述：</label>
        </div>
        <div class="field">
          <textarea class="input" name="sdescription" disabled>{{$setting['desc']}}</textarea>
          <div class="tips"></div>
        </div>
      </div>
      {{--<div class="form-group">
        <div class="label">
          <label>联系人：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="s_name" value="" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>手机：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="s_phone" value="" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>电话：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="s_tel" value="" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group" style="display:none;">
        <div class="label">
          <label>400电话：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="s_400" value="" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>传真：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="s_fax" value="" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>QQ：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="s_qq" value="" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group" style="display:none">
        <div class="label">
          <label>QQ群：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="s_qqu" value="" />
          <div class="tips"></div>
        </div>
      </div>
     
      <div class="form-group">
        <div class="label">
          <label>Email：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="s_email" value="" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>地址：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="s_address" value="" />
          <div class="tips"></div>
        </div>
      </div>  --}}
              
      <div class="form-group">
        <div class="label">
          <label>底部信息：</label>
        </div>
        <div class="field">
          <textarea name="scopyright" class="input" style="height:120px;" disabled>{{$setting['footer']}}</textarea>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <a class="button bg-main icon-check-square-o" href="{{url('admin/system/edit')}}"> 修改</a>
        </div>
      </div>
    </form>
  </div>
</div>
</body>

@endsection