@extends("admin.layout.layout")
@section('content')

  <body>


<div class="panel admin-panel margin-top" id="edit">
  <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 修改内容</strong></div>
  <div class="body-content">
    <form method="post" class="form-x imageInsert" action="{{url('admin/image/'.$image['id'])}}">
      {{csrf_field()}}
      {{method_field('put')}}
      <div class="form-group">
        <div class="label">
          <label>标题：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="{{$image['title']}}" name="title" datatype="s2-20"{{--data-validate="required:请输入标题"--}} />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>URL：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="url" value="{{$image['url']}}"  datatype="url"/>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>图片：</label>
        </div>
        <div class="field">
          {{--<input type="text" id="url1" name="img" class="input tips" style="width:25%; float:left;"  value="" data-toggle="hover" data-place="right" data-image="" />
          <input type="button" class="button bg-blue margin-left" id="image1" value="+ 浏览上传"  style="float:left;">
          <div class="tipss">图片尺寸：1920*500</div>--}}
          <div id="uploader-demo">
            <!--用来存放item-->
            <div id="fileList" class="uploader-list"></div>
            <div id="filePicker">选择图片</div>
            <input type="hidden" name="src" class="input tips" style="width:25%; float:left;"  value="{{$image['src']}}" data-toggle="hover" data-place="right" data-image="" />
            <img id="uploadImg" src="{{$image['src']}}">
          </div>
          <div class="tipss">图片尺寸：1920*500</div>

        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>描述：</label>
        </div>
        <div class="field">
          <textarea type="text" class="input" name="desc" style="height:120px;" value="" datatype="s6-100">{{$image['desc']}}</textarea>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>排序：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="sort" value="{{$image['sort']}}"  datatype="n1-4"{{--data-validate="required:,number:排序必须为数字"--}} />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="submit"> 修改</button>
        </div>
      </div>
    </form>
  </div>
</div>
</body>
<script>
    var uploader = WebUploader.create({

        // 选完文件后，是否自动上传。
        auto: true,

        // swf文件路径
        swf: "{{asset('lib/webuploader/Uploader.swf')}}",

        // 文件接收服务端。
        server: "{{url('admin/upload')}}",

        // 选择文件的按钮。可选。
        // 内部根据当前运行是创建，可能是input元素，也可能是flash.
        pick: '#filePicker',

        fileSingleSizeLimit:1024*1024*4,

        // 只允许选择图片文件。
        accept: {
            title: 'Images',
            extensions: 'gif,jpg,jpeg,bmp,png',
            mimeTypes: 'image/*'
        }
    });
    // 文件上传成功，给item添加成功class, 用样式标记上传成功。
    uploader.on( 'uploadSuccess', function( file,res ) {
        //path = res.msg
        $("input[name='src']").val('/'+res.msg);
        $("#uploadImg").attr('src','/'+res.msg);

        $( '#'+file.id ).addClass('upload-state-done');
    });


    $(".imageInsert").Validform({
        tiptype: 4,
        ajaxPost:true,
        callback:function(res){
            if(res.status==0){
                layer.msg(res.msg,{icon:2})
            }else if(res.status==1){
                layer.msg(res.msg,{time:2000,icon:1},function () {
                    location.href = "{{url('admin/image')}}"
                });
            }
        }

    });
</script>
@endsection