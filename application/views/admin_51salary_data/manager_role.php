<div class="box">
  <div class="box-title">
    <div class="span8" style="float:left">
      <h3><i class="icon-table" style="background-position:-265px 1px"></i>角色管理</h3>
    </div>
    <div class="pull-right"><a class="btn" href="Javascript:window.history.go(-1)">返回</a></div>
  </div>
  <div class="box-content">
    <div class="row-fluid">
      <div class="span12 control-group">
       <div class="span5 pull-left"><a class="btn" href="<?php echo $admin_url;?>manager_role_add"><i class="icon-plus"></i>添加角色</a> <a class="btn" href="javascript:location.reload()"><i class="icon-refresh"></i>刷新</a> <a class="btn" href="javascript:delete_all('<?php echo $admin_url;?>manager_role/delete_all/')"><i class="icon-trash"></i>批量删除</a> </div>
       <div class="span7 pull-right">
          <form name="filter" method="get" action="<?php echo $admin_url;?>manager_role" style="text-align:right;">
            <input type="text" name="keyword" id="keyword" value="<?php echo @$keyword;?>" class="input-large ui-wizard-content ui-helper-reset ui-state-default valid" data-rule-required="true" placeholder="请输入角色名称">
      
           <button id="bsubmit" type="submit" data-loading-text="提交中..." class="btn btn-primary">搜索</button> <?php if(@$keyword){?><a href="<?php echo $admin_url;?>manager_role" class="btn btn-small btn-link"><i class="icon-list"></i> 全部</a><?php }?>
          </form>
        </div>
        
      </div>
    </div>
    <div class="row-fluid dataTables_wrapper">
      <form name="form2" method="post">
        <table id="listTable" class="table table-bordered table-hover dataTable">
          <tr class="main2">
            <th class="with-checkbox"><input type="checkbox" class="check_all" style="width:13px;"/></th>
            <th>ID</th>
            <th>角色名称</th>
            <th>角色描述</th>
         

            <th style="width:70px">操作</th>
          </tr>
<?php 
$i=1;
if(@$list['this_data']){
foreach ($list['this_data'] as $row)
{
?>
          <tr>
            <td class="with-checkbox"><input name="check" type="checkbox" value="<?php echo $row->id;?>" style="width:13px;"/></td>
            <td><?php echo $row->id;?></td>
            <td><?php echo $row->name;?></td>
            <td><?php echo $row->description;?></td>
            
           	
            <td><div style="float:left;margin:0 4px 0 0;"><?php /*if($row->id!=1){*/?>&nbsp;<a href="<?php echo $admin_url;?>manager_role_edit/<?php echo $row->id;?>/<?php echo $current;?>/<?php echo $query_string;?>"><img src="<?php echo $base_url;?>resource/images/admin_51salary_data/edit.gif" border="0"/></a></div><div style="float:left"><a href="<?php echo $admin_url;?>manager_role/delete/<?php echo $row->id;?>/<?php echo $current;?>/<?php echo $query_string;?>"><img src="<?php echo $base_url;?>resource/images/admin_51salary_data/admin_del.gif" border="0" onclick='{if(confirm("该操作不可恢复")){return true;}return false;}'/></a> &nbsp;<?php /*}*/?></div></td>
          </tr>
          <?php  $i++; }}?>
        </table>
      </form>
    <?php if($list['total_record']>$per_page){?>
      <div class="pagenation2">每页 <?php echo $per_page;?> 条记录 总计 <?php echo $list['total_record'];?> 条记录<?php echo $list['this_page'];?></div>
      <?php }?>
      
    </div>
  </div>
</div>
<script type="text/javascript">
$(".is_show").each(function ()
{
	$(this).live("click",function ()
	{
		sort_id=$(this).parent().parent().find("td").eq(1).html();
		this_url="<?php echo $admin_url?>manager_role/ajax_save_is_show/"+sort_id+"/+?rand=<?php echo mt_rand(1,999);?>";
		var a=$(this);
		$.post(this_url,function (result)
		{
			if(result==1)
			{
	
				$(a).attr("class","label label-satgreen is_show");
				$(a).html("显示");
			}	
			else
			{
				$(a).attr("class","label is_show");
				$(a).html("隐藏");	
			}	
		})
	})
})

</script>
<script type="text/javascript">
$(".sort_order").focusin(function() {
		$(this).attr("v", $(this).val());
	}).focusout(function() {
		var orderby = $(this).val();
		var old_orderby = $(this).attr("v");
		if(orderby == old_orderby) {return;}
		sort_id=$(this).parent().parent().find("td").eq(1).html();
		this_url="<?php echo $admin_url?>manager_role/ajax_save_sort_order";
		$.post(this_url,{id:sort_id, orderby:orderby}, function(data){
			//if(data.err==0) //get_data();
		});
	});
</script>