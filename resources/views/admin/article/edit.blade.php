
@extends("admin.layout.layout")
@section('content')
    <script src="{{asset('lib/Ueditor/ueditor.config.js')}}"></script>
    <script src="{{asset('lib/Ueditor/ueditor.all.min.js')}}"></script>
<body>
<div class="panel admin-panel">
  <div class="body-content">
    <form method="post" class="form-x articleInsert" action="{{url('admin/article/'.$article['id'])}}">
      {{csrf_field()}}
      {{method_field('put')}}
      <div class="form-group">
        <div class="label">
          <label>文章标题：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="{{$article['title']}}" name="title" data-validate="required:请输入标题" />
          <div class="tips"></div>
        </div>
      </div>



      <div class="form-group">
        <div class="label">
          <label>作者：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="author" value="{{$article['author']}}"  />
          <div class="tips"></div>
        </div>
      </div>

      <div class="form-group">
        <div class="label">
          <label>图片：</label>
        </div>
        <div class="field">
          {{--<div class="field">
          <input type="text" id="url1" name="img" class="input tips" style="width:25%; float:left;"  value=""  data-toggle="hover" data-place="right" data-image="" />
          <input type="button" class="button bg-blue margin-left" id="image1" value="+ 浏览上传"  style="float:left;">
          <div class="tipss">图片尺寸：500*500</div>
        </div>--}}
          <div id="uploader-demo">
            <!--用来存放item-->
            <div id="fileList" class="uploader-list"></div>
            <div id="filePicker">选择图片</div>
            <input type="hidden" name="img_url" class="input tips" style="width:25%; float:left;"  value="{{$article['img_url']}}" data-toggle="hover" data-place="right" data-image="" />
            <img id="uploadImg" src="{{$article['img_url']}}">
          </div>
          <div class="tipss">图片尺寸：500*500</div>
        </div>
      </div>     
      

        <div class="form-group">
          <div class="label">
            <label>分类标题：</label>
          </div>
          <div class="field">
            <select name="cate_id" class="input w50">
              <option value="">请选择分类</option>
              @foreach($cates as $k=>$v)
              <option value="{{$v['id']}}" @if($v['id']==$article['cate_id']) selected @endif >{{$v['name']}}</option>
              @endforeach
            </select>
            <div class="tips"></div>
          </div>
        </div>
        {{--<div class="form-group">
          <div class="label">
            <label>其他属性：</label>
          </div>
          <div class="field" style="padding-top:8px;"> 
            首页 <input id="ishome"  type="checkbox" />
            推荐 <input id="isvouch"  type="checkbox" />
            置顶 <input id="istop"  type="checkbox" /> 
         
          </div>
        </div>--}}

      <div class="form-group">
        <div class="label">
          <label>描述：</label>
        </div>
        <div class="field">
          <textarea class="input w-50" name="desc" style=" height:90px;">{{$article['desc']}}</textarea>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>内容：</label>
        </div>
        <div class="field">
            <script id="container" name="content" type="text/plain">
                {!!$article['content']!!}
            </script>

        </div>
      </div>
     


      {{--<div class="form-group">
        <div class="label">
          <label>内容关键字：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="s_keywords" value=""/>
        </div>
      </div>--}}
      <div class="form-group">
        <div class="label">
          <label>关键字描述：</label>
        </div>
        <div class="field">
          <textarea type="text" class="input" name="keywords" value="{{$article['keywords']}}"></textarea>
        </div>
      </div>

      {{--<div class="form-group">
        <div class="label">
          <label>排序：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="sort" value="0"  data-validate="number:排序必须为数字" />
          <div class="tips"></div>
        </div>
      </div>--}}
      {{--<div class="form-group">
        <div class="label">
          <label>发布时间：</label>
        </div>
        <div class="field"> 
          <script src="js/laydate/laydate.js"></script>
          <input type="text" class="laydate-icon input w50" name="datetime" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" value=""  data-validate="required:日期不能为空" style="padding:10px!important; height:auto!important;border:1px solid #ddd!important;" />
          <div class="tips"></div>
        </div>
      </div>--}}
      {{--<div class="form-group">
        <div class="label">
          <label>点击次数：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="views" value="" data-validate="member:只能为数字"  />
          <div class="tips"></div>
        </div>
      </div>--}}
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
      //编辑器
      var ue = UE.getEditor('container',{
          imagePathFormat:"{{url('admin/article/upload')}}"
      });


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
          $("input[name='img_url']").val('/'+res.msg);
          $("#uploadImg").attr('src','/'+res.msg);

          $( '#'+file.id ).addClass('upload-state-done');
      });

      /*表单推送*/
      $(".articleInsert").Validform({
          tiptype: 4,
          ajaxPost:true,
          callback:function(res){
              if(res.status==0){
                  layer.msg(res.msg,{icon:2})
              }else if(res.status==1){
                  layer.msg(res.msg,{time:2000,icon:1},function () {
                      location.href = "{{url('admin/article')}}"
                  });

              }
          }

      });

  </script>

@endsection