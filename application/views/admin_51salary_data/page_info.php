<div class="box">
  <div class="box-title">
    <div class="span8" style="float:left">
      <h3><i class="icon-table" style="background-position:-265px 1px"></i>页面管理</h3>
    </div>
    <div class="pull-right"><a class="btn" href="Javascript:window.history.go(-1)">返回</a></div>
  </div>
  <div class="box-content">
    <div class="row-fluid">
      <div class="span12 control-group">
       <div class="span5 pull-left"><?php if(role("page_info_add")){?><a class="btn" href="<?php echo $admin_url;?>page_info_add"><i class="icon-plus"></i>添加页面</a><?php }?>  <a class="btn" href="javascript:location.reload()"><i class="icon-refresh"></i>刷新</a> <?php if(role("page_info_del")){?><a class="btn" href="javascript:delete_all('<?php echo $admin_url;?>page_info/delete_all/')"><i class="icon-trash"></i>批量删除</a><?php }?></div>
       <div class="span7 pull-right">
          <form name="filter" method="get" action="<?php echo $admin_url;?>page_info" style="text-align:right;">
            <input type="text" name="keyword" id="keyword" value="<?php echo @$search_keyword;?>" class="input-large ui-wizard-content ui-helper-reset ui-state-default valid" data-rule-required="true" placeholder="请输入关键词">
           <button id="bsubmit" type="submit" data-loading-text="提交中..." class="btn btn-primary">搜索</button> <?php if(@$search_keyword){?><a href="<?php echo $admin_url;?>page_info" class="btn btn-small btn-link"><i class="icon-list"></i> 全部</a><?php }?>
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
            <th>标题</th>
            <th>url</th>
            <th>添加时间</th>
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
            <td><?php echo $row->title;?></td>
            <td><?php echo $row->url;?></td>
            <td><?php echo get_time($row->postdate,"Y-m-d H:i:s");?></td>
            <td><div style="float:left;margin:0 4px 0 0;"><a href="<?php echo $admin_url;?>page_info_edit/<?php echo $row->id;?>/<?php echo $current;?>/<?php echo $query_string;?>"><img src="<?php echo $base_url;?>resource/images/admin_51salary_data/edit.gif" border="0"/></a></div><div style="float:left"><?php if(role("page_info_del")){?><a href="<?php echo $admin_url;?>page_info/delete/<?php echo $row->id;?>/<?php echo $current;?>/<?php echo $query_string;?>"><img src="<?php echo $base_url;?>resource/images/admin_51salary_data/admin_del.gif" border="0" onclick='{if(confirm("该操作不可恢复")){return true;}return false;}'/></a><?php }?></div></td>
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