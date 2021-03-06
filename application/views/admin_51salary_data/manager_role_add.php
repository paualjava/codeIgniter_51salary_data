<style type="text/css">
input[type="checkbox"] {
	border: solid 1px #aaa;
}
</style>
<div class="box">
  <div class="box-title">
    <div class="span10" style="float:left">
      <h3><i class="icon-pencil"></i>添加角色 </h3>
    </div>
    <div class="span2" style="float:left"><a class="btn" href="Javascript:window.history.go(-1)">返回</a></div>
  </div>
  <div class="box-content">
    <form action="" method="post" class="form-horizontal form-validate" id="post_form">
      <input name="form_is_post" type="hidden" value="1" />
      <div class="control-group">
        <label for="name" class="control-label">角色名称：</label>
        <div class="controls">
          <input type="text" name="name" id="name" value="" class="input-xxlarge ui-wizard-content ui-helper-reset ui-state-default valid" data-rule-required="true" >
          <span class="maroon">*</span><span class="help-inline">请输入角色名称</span> <span for="name" class="help-block error valid"></span></div>
      </div>
      <div class="control-group">
        <label for="description" class="control-label">角色描述：</label>
        <div class="controls">
          <input type="text" name="description" id="description" value="" class="input-xxlarge ui-wizard-content ui-helper-reset ui-state-default valid" >
          <span class="help-inline">请输入角色描述</span> <span for="description" class="help-block error valid"></span></div>
      </div>
     
      <div class="control-group">
        <label for="role" class="control-label">权限设置：</label>
        <div class="controls"> <span class="help-inline"></span>
          <table id="listTable" class="table table-bordered table-hover dataTable" style="width:400px;">
            <thead>
              <tr>
                <th width="30">全选</th>
                <th width="160">栏目名称</th>
                <th width="30">查看</th>
                <th width="30">添加</th>
                <th width="30">修改</th>
                <th width="30">删除</th>
              </tr>
            </thead>
            <tbody class="singlebody_phone">
              <?php 
	  foreach($role_list as $role_row){?>
              <tr>
                <td><input type="checkbox" value="1" onclick="select_all(<?php echo $role_row->id;?>, this)"></td>
                <td><?php echo $role_row->name;?></td>
                <?php 
		  $role_str=$role_row->role_str;
		   $role_status=$role_row->role_status;
		  $role_str=explode(",",$role_str);
		   $role_status=explode(",",$role_status);
		   foreach($role_str as $str_key=>$str_v)
		   {
			if($str_v){
			$disabled=($role_status[$str_key]==2) ? 'disabled="disabled" style="border:solid 1px #ddd;"' : "";
			if($role_status[$str_key]==1){
		 ?>
                <td><input type="checkbox" name="priv[<?php echo $role_row->id;?>][]" value="<?php echo $str_v;?>" <?php echo $disabled;?>></td>
                <?php } else{?>
                <td></td>
                <?php }?>
                <?php }}?>
              </tr>
              <?php }?>
          
            </tbody>
          </table>
        </div>
      </div>
     
      <div class="form-actions">
        <button id="bsubmit" type="submit" data-loading-text="提交中..." class="btn btn-primary">保存</button>
        <button class="btn" onclick="Javascript:window.history.go(-1)">返回</button>
      </div>
    </form>
  </div>
</div>
<script type="text/javascript">
<!--
function select_all(name, obj) {
	if (obj.checked) {
		$("input[type='checkbox'][name='priv["+name+"][]']").attr('checked', 'checked');
	} else {
		$("input[type='checkbox'][name='priv["+name+"][]']").removeAttr('checked');
	}
}
//-->
</script>
