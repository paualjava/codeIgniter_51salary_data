<link rel="stylesheet" href="<?php echo $base_url;?>resource/kindeditor-4.1.9/themes/default/default.css" />
<script charset="utf-8" src="<?php echo $base_url;?>resource/kindeditor-4.1.9/kindeditor-min.js"></script>
<script charset="utf-8" src="<?php echo $base_url;?>resource/kindeditor-4.1.9/lang/zh_CN.js"></script>
<div class="box">
  <div class="box-title">
    <div class="span10" style="float:left">
      <h3><i class="icon-table" style="background-position:-97px -71px"></i>编辑关于我们
      </h3>
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
          <input type="text" name="title" id="title" value="<?php echo $this_data->title;?>" class="input-xxlarge ui-wizard-content ui-helper-reset ui-state-default valid" data-rule-required="true" data-rule-maxlength="200" >
          <span class="maroon">*</span><span class="help-inline">请输入标题</span> <span for="title" class="help-block error valid"></span></div>
      </div>
      <div class="control-group">
        <label for="content" class="control-label">内容：</label>
        <div class="controls">
          <textarea class="input-xxlarge" name="content" id="content" ><?php echo $this_data->content;?></textarea>
          <span class="help-inline">请输入内容</span> </div>
      </div>
      <div class="control-group">
        <label for="is_show" class="control-label">审核显示：</label>
        <div class="controls">
          <?php
           $check1=($this_data->is_show==1) ? "checked=\"checked\"" : "";
           $check2=($this_data->is_show==0) ? "checked=\"checked\"" : "";
          ?>
          <label class="radio inline" style="padding-top:2px"><input type="radio" name="is_show" id="is_show" value="1" <?php echo $check1;?> style="margin-top:0px"/>是</label>
          <label class="radio inline" style="padding-top:2px"><input type="radio" name="is_show" id="is_show" value="2" <?php echo $check2;?> style="margin-top:0px"/>否</label>
        </div>
      </div>
      <div class="control-group">
        <label for="sort_order" class="control-label">排序：</label>
        <div class="controls">
          <input type="text" name="sort_order" id="sort_order" value="<?php echo $this_data->sort_order;?>" class="input-xxlarge ui-wizard-content ui-helper-reset ui-state-default valid" data-rule-number="true" data-rule-digits="true" >
          <span class="help-inline">请输入整数，数值越大，越靠前</span> <span for="sort_order" class="help-block error valid"></span></div>
      </div>
    <div class="form-actions">
      <?php if(role("about_us_edit")){?><button id="bsubmit" type="submit" data-loading-text="提交中..." class="btn btn-primary">保存</button><?php }?>
      <button type="button" class="btn" onclick="Javascript:window.history.go(-1)">返回</button>
    </div>
    <script>
                        var seting = {
                                themeType: "simple",
                                resizeType: 1,
                                syncType:"",
                                allowPreviewEmoticons: false,
                                items: [
        'source', 'undo', 'redo', 'plainpaste', 'plainpaste', 'wordpaste', 'clearhtml', 'quickformat', 'selectall', 'fullscreen', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline', 'hr',
        'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
        'insertunorderedlist', '|', 'emoticons', 'image', 'link', 'unlink', 'baidumap'],
                                allowFileManager: true,
                                minWidth: 600,
                                width: 800,
								height: 330,
                                afterCreate: function () {
                                    this.sync();
                                },
                                afterBlur: function () {
                                    this.sync();
                                }
                            }
                            KindEditor.ready(function (K) {
                               var editor1 = K.create('#content', seting);
                                K('a.insertimage').click(function (e) {
                                    editor1.loadPlugin('smimage', function () {
                                        editor1.plugin.imageDialog({
                                            imageUrl: $(e.target).parent().prev().val(),
                                            clickFn: function (url, title, width, height, border, align) {
                                            	$(e.target).parent().prev().val(url);
                                                $(e.target).parent().next().find("img").attr("src",url);
                                                editor1.hideDialog();
                                            }
                                        });
                                    });
                                });
                            });
                        </script>
  </form>
   </div>
</div>
</div>