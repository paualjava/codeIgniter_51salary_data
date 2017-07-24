<link rel="stylesheet" href="<?php echo $base_url;?>resource/kindeditor-4.1.9/themes/default/default.css" />
<script charset="utf-8" src="<?php echo $base_url;?>resource/kindeditor-4.1.9/kindeditor-min.js"></script>
<script charset="utf-8" src="<?php echo $base_url;?>resource/kindeditor-4.1.9/lang/zh_CN.js"></script>
<div class="box">
  <div class="box-title">
    <div class="span10" style="float:left">
      <h3><i class="icon-table" style="background-position:-97px -71px"></i>编辑广告 </h3>
    </div>
    <div class="span2" style="float:left"><a class="btn" href="Javascript:window.history.go(-1)">返回</a></div>
  </div>
  <div class="box-content">
    <form action="" method="post" class='form-horizontal form-validate wj_form' id="post_form">
      <input name="form_is_post" type="hidden" value="1" />
      <input name="id" type="hidden" value="<?php echo $this_data->id;?>" />
      <div class="control-group">
        <label for="title" class="control-label">标题：</label>
        <div class="controls">
          <input type="text" name="title" id="title" value="<?php echo $this_data->title;?>" class="input-xxlarge ui-wizard-content ui-helper-reset ui-state-default valid" data-rule-required="true" >
          <span class="maroon">*</span><span class="help-inline">请输入标题</span> <span for="title" class="help-block error valid"></span></div>
      </div>
      <div class="control-group">
        <label for="txt" class="control-label">图片：</label>
        <div class="controls">
          <input class="input-xxlarge ui-wizard-content ui-helper-reset ui-state-default valid" name="pic" type="text" value="<?php echo $this_data->pic;?>" >
          <span class="help-inline"><a class="btn insertimage">上传图片</a></span>
          <?php $pic=(substr($this_data->pic,0,4)=="http" || substr($this_data->pic,0,1)=="/") ? $this_data->pic : (($this_data->pic) ? base_url().$this_data->pic : "");?>
          <div><img src="<?php echo $pic;?>" style="max-width:360px;margin:10px 0 2px 0;"></div>
          <span class="help-inline">请上传图片</span> </div>
      </div>
      <div class="control-group">
        <label for="width" class="control-label">宽度：</label>
        <div class="controls">
          <input type="text" name="width" id="width" value="<?php echo $this_data->width;?>" class="input-xxlarge ui-wizard-content ui-helper-reset ui-state-default valid" data-rule-digits="true" >
          <span class="help-inline">请输入宽度</span> <span for="width" class="help-block error valid"></span></div>
      </div>
      <div class="control-group">
        <label for="height" class="control-label">高度：</label>
        <div class="controls">
          <input type="text" name="height" id="height" value="<?php echo $this_data->height;?>" class="input-xxlarge ui-wizard-content ui-helper-reset ui-state-default valid" data-rule-digits="true" >
          <span class="help-inline">请输入高度</span> <span for="height" class="help-block error valid"></span></div>
      </div>
      <div class="control-group">
        <label for="url" class="control-label">链接地址：</label>
        <div class="controls">
          <input type="text" name="url" id="url" value="<?php echo $this_data->url;?>" class="input-xxlarge ui-wizard-content ui-helper-reset ui-state-default valid" >
          <span class="help-inline">请输入链接地址</span> <span for="url" class="help-block error valid"></span></div>
      </div>
      <div class="control-group">
        <label for="info" class="control-label">备注：</label>
        <div class="controls">
          <textarea class="input-xxlarge" name="info" id="info" style="height:80px;"><?php echo $this_data->info;?></textarea>
          <span class="help-inline">请输入备注</span> <span for="info" class="help-block error valid"></span></div>
      </div>
      <!--<div class="control-group">
        <label for="info" class="control-label">前台代码：</label>
        <div class="controls">
          <textarea class="input-xxlarge" name="code" id="code" style="height:80px;"><?php $width=($this_data->width) ? 'width:'.$this_data->width.'px;' : ""; $height=($this_data->height) ? 'height:'.$this_data->height.'px;' : ''; $code='<?php $surface=get_table_row("'.$table_name.'",'.$this_data->id.');?><a href="<?php echo $surface->url;?>" target="_blank"><img src="<?php echo (substr($surface->pic,0,4)=="http" || substr($surface->pic,0,1)=="/") ? $surface->pic : (($surface->pic) ? $base_url.$info->pic : "resource/images/none.png");?>" style="'.$width.$height.'"/></a>'; echo htmlspecialchars($code) ?></textarea>
          <span class="help-inline">请输入备注</span> <span for="info" class="help-block error valid"></span></div>
      </div>-->
      <div class="control-group">
        <label for="sort_order" class="control-label">排序：</label>
        <div class="controls">
          <input type="text" name="sort_order" id="sort_order" value="<?php echo $this_data->sort_order;?>" class="input-xxlarge ui-wizard-content ui-helper-reset ui-state-default valid" data-rule-number="true" >
          <span class="help-inline">请输入排序</span> <span for="sort_order" class="help-block error valid"></span></div>
      </div>
      <div class="form-actions">
        <?php if(role("slide_wap_edit")){?>
        <button id="bsubmit" type="submit" data-loading-text="提交中..." class="btn btn-primary">保存</button>
        <?php }?>
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
