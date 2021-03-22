@extends("admin.layout.layout")
@section('content')

  <body>
<div class="panel admin-panel">
  <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong></div>
  <div class="padding border-bottom">  
  <button type="button" class="button border-yellow" onclick="window.location.href='{{url('admin/image/create')}}'"><span class="icon-plus-square-o"></span> 添加内容</button>
  </div>
  <table class="table table-hover text-center">
    <tr>
      <th width="5%">ID</th>
      <th width="20%">图片</th>
      <th width="15%">名称</th>
      <th width="15%">链接</th>
      <th width="20%">描述</th>
      <th width="10%">排序</th>
      <th width="15%">操作</th>
    </tr>

    @foreach($image_list as $k=>$image)
    <tr>
      <td>{{$k+1}}</td>
      <td><img src="{{$image['src']}}" alt="" width="120" height="50" /></td>
      <td>{{$image['title']}}</td>
      <td>{{$image['url']}}</td>
      <td>{{$image['desc']}}</td>
      <td>{{$image['sort']}}</td>
      <td><div class="button-group">
      <a class="button border-main" href="{{url('admin/image/'.$image['id'].'/edit')}}"><span class="icon-edit"></span> 修改</a>
      <a class="button border-red" href="javascript:void(0)" onclick="delImg($image['id'])"><span class="icon-trash-o"></span> 删除</a>
      </div></td>
    </tr>
    @endforeach
{{--    <tr>
      <td>2</td>     
      <td><img src="images/11.jpg" alt="" width="120" height="50" /></td>     
      <td>首页焦点图</td>
      <td>描述文字....</td>
      <td>1</td>
      <td><div class="button-group">
      <a class="button border-main" href="#add"><span class="icon-edit"></span> 修改</a>
      <a class="button border-red" href="javascript:void(0)" onclick="return del(1,1)"><span class="icon-trash-o"></span> 删除</a>
      </div></td>
    </tr>
    <tr>
      <td>3</td>     
      <td><img src="images/11.jpg" alt="" width="120" height="50" /></td>     
      <td>首页焦点图</td>
      <td>描述文字....</td>
      <td>1</td>
      <td><div class="button-group">
      <a class="button border-main" href="#add"><span class="icon-edit"></span> 修改</a>
      <a class="button border-red" href="javascript:void(0)" onclick="return del(1,1)"><span class="icon-trash-o"></span> 删除</a>
      </div></td>
    </tr>--}}
    
  </table>
</div>
<script type="text/javascript">
/*function del(id,mid){
	if(confirm("您确定要删除吗?")){
	
	}
}*/
function delImg(id){
    layer.confirm('确认删除吗？', function(index) {
        layer.close(index);
        $.ajax("{{url('admin/image/')}}", {

            id: data.action_id
        }, function(res) {
            if (res.code == 1) {
                layer.msg(res.msg, {
                    icon: 1,
                    time: 1500
                }, function() {
                    obj.del();
                })
            } else {
                layer.msg(res.msg, {
                    icon: 2,
                    time: 1500
                })
            }
        });
    });
}
</script>

</body>

@endsection