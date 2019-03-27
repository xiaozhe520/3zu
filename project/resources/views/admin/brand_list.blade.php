<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SHOP 管理中心 - 品牌管理 </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="{{URL::asset('styles/general.css')}}" rel="stylesheet" type="text/css" />
<link href="{{URL::asset('styles/main.css')}}" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="{{URL::asset('js/jquery.min.js')}}"></script>
</head>
<body>

<h1>
<span class="action-span"><a href="{{url('brand/brand_add')}}">添加品牌</a></span>
<span class="action-span1"><a href="{{url('admin/index')}}">SHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 商品品牌 </span>
<div style="clear:both"></div>
</h1>

<div class="form-div">
  <form action="javascript:search_brand()" name="searchForm">
    <img src="images/icon_search.gif" width="26" height="22" border="0" alt="SEARCH">
     <input type="text" name="brand_name" size="15">
    <input type="submit" value=" 搜索 " class="button">
  </form>
</div>

<form method="post" action="" name="listForm">
<!-- start brand list -->
<div class="list-div" id="listDiv">

  <table cellpadding="3" cellspacing="1">
    <tbody>
		<tr>
			<th>品牌名称</th>
      <th>品牌LOGO</th>
			<th>品牌网址</th>
			<th>品牌描述</th>
			<th>排序</th>
			<th>是否显示</th>
			<th>操作</th>
		</tr>
  <?php foreach($data as $key => $val){ ?>
    <tr align="center">
			<td class="first-cell">
			<span onclick="javascript:listTable.edit(this, 'edit_brand_name', 1)" title="点击修改内容" style=""><?= $val->brand_name ?></span>
			</td>
      <td><img src="<?php echo 'http://www.h1.com/'.$val->brand_logo ?>" width="30px" height="20px" /></td>
			<td><a href="http://www.nokia.com.cn/" target="_brank"><?= $val->site_url ?></a></td>
			<td align="left" ><?= $val->brand_desc ?></td>
			<td align="right"><span onclick="javascript:listTable.edit(this, 'edit_sort_order', 1)"><?= $val->sort_order ?></span></td>
			
       <?php if($val->is_show==1){ ?>
       <td align="center"><img src="{{URL::asset('images/yes.gif')}}"></td>
       <?php }else{ ?>
       <td align="center"><img src="{{URL::asset('images/no.gif')}}"></td>
       <?php } ?>
			<td align="center">
				<a href="edit?id=<?php echo $val->brand_id ?>" title="编辑">编辑</a> |
				<a href="delete?id=<?php echo $val->brand_id ?>" title="编辑" id="del">移除</a> 
			</td>
		</tr>
	<?php } ?>
    <tr>
		<td align="right" nowrap="true" colspan="6">
            <div id="turn-page">
			总计  <span id="totalRecords">11</span>
        个记录分为 <span id="totalPages">2</span>
        页当前第 <span id="pageCurrent">1</span>
        页，每页 <input type="text" size="3" id="pageSize" value="10" onkeypress="return listTable.changePageSize(event)">
        <span id="page-link">
          <a href="javascript:listTable.gotoPageFirst()">第一页</a>
          <a href="javascript:listTable.gotoPagePrev()">上一页</a>
          <a href="javascript:listTable.gotoPageNext()">下一页</a>
          <a href="javascript:listTable.gotoPageLast()">最末页</a>
          <select id="gotoPage" onchange="listTable.gotoPage(this.value)">
            <option value="1">1</option><option value="2">2</option>          </select>
        </span>
      </div>
      </td>
    </tr>
  </tbody></table>

<!-- end brand list -->
</div>
</form>


<div id="footer">
	版权所有 &copy; 2006-2013 软工教育 - 高级PHP - </div>
</div>

</body>
</html>