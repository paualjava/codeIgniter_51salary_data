<link rel="stylesheet" href="<?php echo $base_url;?>resource/kindeditor-4.1.9/themes/default/default.css" />
<script charset="utf-8" src="<?php echo $base_url;?>resource/kindeditor-4.1.9/kindeditor-min.js"></script>
<script charset="utf-8" src="<?php echo $base_url;?>resource/kindeditor-4.1.9/lang/zh_CN.js"></script>
<div class="box">
  <div class="box-title">
    <div class="span10" style="float:left">
      <h3><i class="icon-table" style="background-position:-265px 1px"></i>手机设置
      </h3>
    </div>
    <div class="span2" style="float:left"><a class="btn" href="Javascript:window.history.go(-1)">返回</a></div>
  </div>
  <div class="box-content">
  <form action="" method="post" class='form-horizontal form-validate wj_form' id="post_form">
  <input name="form_is_post" type="hidden" value="1" />
  <input name="id" type="hidden" value="<?php echo $this_data->id;?>" />
      <div class="control-group">
        <label for="title" class="control-label">网站名称：</label>
        <div class="controls">
          <input type="text" name="title" id="title" value="<?php echo $this_data->title;?>" class="input-xxlarge ui-wizard-content ui-helper-reset ui-state-default valid" data-rule-required="true" >
          <span class="maroon">*</span><span class="help-inline">请输入网站名称</span> <span for="title" class="help-block error valid"></span></div>
      </div>
      <div class="control-group">
        <label for="keyword" class="control-label">站点关键字：</label>
        <div class="controls">
          <input type="text" name="keyword" id="keyword" value="<?php echo $this_data->keyword;?>" class="input-xxlarge ui-wizard-content ui-helper-reset ui-state-default valid" >
          <span class="help-inline">请输入站点关键字</span> <span for="keyword" class="help-block error valid"></span></div>
      </div><div class="control-group">
                                                <label for="description" class="control-label">站点描述：</label>
                                                <div class="controls">
                                                     <textarea class="input-xxlarge" name="description" id="description" style="height:80px;"><?php echo $this_data->description;?></textarea><span class="help-inline">请输入站点描述</span>
                                                <span for="description" class="help-block error valid"></span></div>
                                            </div>
      <div class="control-group">
        <label for="txt" class="control-label">网站Logo：</label>
        <div class="controls">
          <input class="input-xxlarge ui-wizard-content ui-helper-reset ui-state-default valid" name="pic" type="text" value="<?php echo $this_data->pic;?>" >
          <span class="help-inline"><a class="btn insertimage">上传图片</a></span>
          <?php $pic=(substr($this_data->pic,0,4)=="http" || substr($this_data->pic,0,1)=="/") ? $this_data->pic : (($this_data->pic) ? base_url().$this_data->pic : "");?>
          <div><img src="<?php echo $pic;?>" style="max-width:360px;margin:10px 0 2px 0;"></div><span class="help-inline">请上传网站Logo</span> </div>
      </div>
    <div class="form-actions">
      <?php if(role("setting_wap_edit")){?><button id="bsubmit" type="submit" data-loading-text="提交中..." class="btn btn-primary">保存</button><?php }?>
      <button type="button" class="btn" onclick="Javascript:window.history.go(-1)">返回</button>
    </div>
    	<script type="text/javascript">
                                                    KindEditor.ready(function (K) {
                                                        var editor = K.editor({
                                                            themeType: "simple",
                                                            allowFileManager: true
                                                        });
                                                        $('a.insertimage').add("button.insertimage").click(function (e) {
                                                            editor.loadPlugin('smimage', function () {
																var $input = $(e.target).parent().prev();
                                                                editor.plugin.imageDialog({
                                                                    imageUrl: $input ? $input.val() : "",
                                                                    clickFn: function (url, title, width, height, border, align) {
                                                                        if ($input) {
                                                                            $input.val(url);
                                                                            var rel = $(e.target).attr("rel")
																			$(e.target).parent().prev().val(url);
																			 $(e.target).parent().next().find("img").attr("src",url);
                                                                        }
                                                                        editor.hideDialog();
                                                                    }
                                                                });
                                                            });
                                                        })
                                                    });
                                                </script>
  </form>
   </div>
</div>
</div>