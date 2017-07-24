
<div class="box">
  <div class="box-title">
    <div class="span10" style="float:left">
      <h3><i class="icon-pencil"></i>添加网站员 </h3>
    </div>
    <div class="span2" style="float:left"><a class="btn" href="Javascript:window.history.go(-1)">返回</a></div>
  </div>
  <div class="box-content">
    <form action="" method="post" class="form-horizontal form-validate" id="post_form">
      <input name="form_is_post" type="hidden" value="1" />
      <div class="control-group">
        <label for="username" class="control-label">用户名：</label>
        <div class="controls">
          <input type="text" name="username" id="username" value="" class="input-xxlarge ui-wizard-content ui-helper-reset ui-state-default valid" data-rule-required="true" >
          <span class="maroon">*</span><span class="help-inline">请输入用户名</span> <span for="username" class="help-block error valid"></span></div>
      </div>
      <div class="control-group">
        <label for="password" class="control-label">密码：</label>
        <div class="controls">
          <input type="password" name="password" id="password" value="" class="input-xxlarge ui-wizard-content ui-helper-reset ui-state-default valid" data-rule-required="true" data-rule-rangelength="[6,16]" >
          <span class="maroon">*</span><span class="help-inline">请输入密码</span> <span for="password" class="help-block error valid"></span></div>
      </div>
      <div class="control-group">
        <label for="password_confirm" class="control-label">确认密码：</label>
        <div class="controls">
          <input type="password" name="password_confirm" id="password_confirm" value="" class="input-xxlarge ui-wizard-content ui-helper-reset ui-state-default valid" data-rule-required="true" data-rule-equalto="#password" >
          <span class="help-inline">请输入确认密码</span> <span for="password_confirm" class="help-block error valid"></span></div>
      </div>
      <div class="control-group">
        <label for="role_id" class="control-label">所属角色</label>
        <div class="controls">
          <select name="role_id" id="role_id" class="input-xxlarge ui-wizard-content ui-helper-reset ui-state-default valid">
            
            <?php foreach($role_list as $role){
				$select=($role->id==$parent_role_id) ? 'selected="selected"' : ""
				?>
            <option value="<?php echo $role->id;?>" <?php echo $select;?>><?php echo $role->name;?></option>
            <?php }?>
          </select>
          &nbsp; &nbsp;  <span class="maroon"></span><span class="help-inline">请选择角色</span> <span for="role_id" class="help-block error valid"></span></div>
      </div>
      <div class="control-group">
        <label for="truename" class="control-label">姓名：</label>
        <div class="controls">
          <input type="text" name="truename" id="truename" value="" class="input-xxlarge ui-wizard-content ui-helper-reset ui-state-default valid" >
          <span class="help-inline">请输入姓名</span> <span for="truename" class="help-block error valid"></span></div>
      </div>
      <div class="control-group">
        <label for="email" class="control-label">邮箱：</label>
        <div class="controls">
          <input type="text" name="email" id="email" value="" class="input-xxlarge ui-wizard-content ui-helper-reset ui-state-default valid" data-rule-email="true">
          <span class="help-inline">请输入邮箱</span> <span for="email" class="help-block error valid"></span></div>
      </div>
      <div class="control-group">
        <label for="phone" class="control-label">电话：</label>
        <div class="controls">
          <input type="text" name="phone" id="phone" value="" class="input-xxlarge ui-wizard-content ui-helper-reset ui-state-default valid" >
          <span class="help-inline">请输入电话</span> <span for="phone" class="help-block error valid"></span></div>
      </div>
      
      <div class="form-actions">
        <button id="bsubmit" type="submit" data-loading-text="提交中..." class="btn btn-primary">保存</button>
        <button class="btn" onclick="Javascript:window.history.go(-1)">返回</button>
      </div>
    </form>
  </div>
</div>
