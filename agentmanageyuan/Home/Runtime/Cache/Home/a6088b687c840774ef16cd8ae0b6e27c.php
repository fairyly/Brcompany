<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html data-embedded="">
<head>
<title>T-star代理商管理系统</title>
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
<meta charset="utf-8" />
<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
<link rel="shortcut icon" type="image/x-icon" href="/agentmanage/Public/images/home/l.ico" />
<link rel="stylesheet" media="screen" href="/agentmanage/Public/stylesheets/home/style2.css" debug="false" />
<link rel="stylesheet" media="screen" href="/agentmanage/Public/stylesheets/home/style1.css" debug="false" />
<script src="/agentmanage/Public/javascripts/home/jquery.js"></script>
<style>
.entry-container-inner form .field-goods-field .goods-items .goods-item, .entry-container-inner form .field-basic-goods-field .goods-items .goods-item{
  width:100%;
}
.entry-container-inner form .field{
  padding:5px 0px;
}
.entry-container-inner form #shopping_cart{
  padding:0px 7%;
}
.entry-container-inner form .field select:not(.fixed-width-control), .entry-container-inner form .field input[type="text"]:not(.fixed-width-control), .entry-container-inner form .field input[type="date"]:not(.fixed-width-control), .entry-container-inner form .field input[type="number"]:not(.fixed-width-control), .entry-container-inner form .field input[type="email"]:not(.fixed-width-control), .entry-container-inner form .field input[type="url"]:not(.fixed-width-control), .entry-container-inner form .field input[type="tel"]:not(.fixed-width-control){
  max-width:800px;
  width:99.5%;
  margin:0 auto;
}
.entry-container-inner form .field-drop-down .dropdown-wrapper{
  max-width:800px;
  width:99.5%;
  margin:0 auto;
}
body{
   width:100%;
   margin:0 auto;
    font-family:myFirstFont;
}
@font-face{
 font-family:myFirstFont;
 src:url("/agentmanage/Public/stylesheets/home/xihei.ttf");
}
i{font-style:normal;}
.banner{
  width:100%;
  height:45px;
  background:#009AFF;
  position:fixed;
  top:0px;
  left:0px;
  z-index:100;
  text-align:center;
  font-size:2em;
  color:white;
  line-height:45px;
 }
</style>
<script>
(function () {
  var js;
  if (typeof JSON !== 'undefined' && 'querySelector' in document && 'addEventListener' in window) {
    js = '/agentmanage/Public/javascripts/home/dingdan1.js';
  } else {
    js = '/agentmanage/Public/javascripts/home/dingdan2.js';
  }
document.write('<script src="' + js + '"><\/script>');
}());

$(document).ready(function(){
  $(".xj_main_xuanze span").click(function(){
    $(".xj_main_xuanze ul").slideDown("slow");
  })
  $(".xj_main_xuanze li").click(function(){
    var thisc=$(this).text();
    $(".xj_main_xuanze span").text(thisc);
    $(".xj_main_xuanze ul").slideUp("slow");
  })
})
</script>
<script src="https://cdn.jinshuju.net/assets/columbus/published_forms/application-b96cb056d4515679df9c6431a76b0908.js" debug="false"></script>

<meta name="csrf-param" content="authenticity_token" />
<meta name="csrf-token" content="jVyXiRRJoukxD30MHNLrNqfkvANhYl3CKKAKweqCX1/Uw6/fpn5icRirMcgwfSVOaCLhPFKeX4eiQm1ohaXyEA==" />
</head>
<body class="entry-container browser-firefox">
  <div class="entry-container-inner">
  <body style="margin:0 auto;">
      <div class="banner">
          <div class="banner-text">Tstar代理商管理系统</div>
  </div>

<form class="center skd" action="<?php echo U('User/onlineadd',array('id'=>$id));?>" accept-charset="UTF-8" method="post" enctype="multipart/form-data">
<input type="hidden" name="utf8" value="&#x2713;" /><input type="hidden" name="authenticity_token" value="xFlPS3vqGC5ig5+a19gW8bBJ9gsIxDurZfHV6JIIIb2dxncdyd3Ytksn0177d9iJf4+rNDs4Oe7vE7JB/S+M8g==" />
  <div class="form-header container-fluid" style="margin-top:26px;">
    <div class="row">
      <h1 class="form-title col-md-12" style="color:#009AFF;">直属代理在线下单</h1>
    </div>
  </div>
  <div class="form-content container-fluid">
    <div class="row">
      <div class="fields clearfix">
      <div class="form-group" >
			  <p style="font-size:1.2em;"><i>请选择对接助理<font color="red">*</font></i></p>
        <select name="entry_level" id="entry_field_11" class="needsclick" data-has-error="false" style="width:100%;">
          <option value="0" selected="selected" >请选择</option>
          <?php if(is_array($admin)): $i = 0; $__LIST__ = $admin;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["remark"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
			</div>
      <div class="field field-text-field col-md-12 required" data-api-code="field_3" data-type="TextField" data-label="收件人姓名" data-validations="[&quot;Presence&quot;]">
        <div class="form-group" >
          <label class="field-label" onclick="" for="entry_field_3">收件人姓名</label>
        <div class="field-content">
          <input type="text" value="" name="entry_name" id="entry_field_3" />
        </div>
        </div>
      </div>
      <div class="field field-mobile-field col-md-12 required" data-api-code="field_4" data-type="MobileField" data-label="收件人手机号" data-validations="[&quot;Presence&quot;,&quot;Format&quot;]">
      <div class="form-group" >
        <label class="field-label" onclick="" for="entry_field_4">收件人手机号</label>
        <div class="field-content">
          <div data-role='verification_sender'>
          <input class="mobile-input input-with-icon" data-icon="gd-icon-mobile" type="tel" value="" name="entry_tel" id="entry_field_4" />
          </div>
        </div>
      </div>
      </div>            
      <div class="field field-text-field col-md-12 required" data-api-code="field_5" data-type="TextField" data-label="收件地址" data-validations="[&quot;Presence&quot;]">
        <div class="form-group" >
          <label class="field-label" onclick="" for="entry_field_5">收件地址</label>
        <div class="field-content">
          <input type="text" value="" name="entry_add" id="entry_field_5" />
        </div>
        </div>
      </div>            
      <!-- <div class="field field-text-field col-md-12 required" data-api-code="field_8" data-type="TextField" data-label="授权代理商姓名" data-validations="[&quot;Presence&quot;]">   
        <div class="form-group" >
          <label class="field-label" onclick="" for="entry_field_8">授权代理商姓名</label>
        <div class="field-content">
          <div class="field-description clearfix"><p>仅限总部直属代理商下单使用</p></div>
          <input type="text" name="entry[field_8]" id="entry_field_8" />
        </div>
        </div>
      </div>            
      <div class="field field-drop-down col-md-12" data-api-code="field_11" data-type="DropDown" data-label="代理级别" data-validations="[]">
        <div class="form-group" >
        <label class="field-label" onclick="" for="entry_field_11">代理级别</label>
        <div class="field-content">
        <div class="field-description clearfix"><p>总代600盒，一级120盒，二级20盒，特约4盒</p></div>
        <select name="entry[field_11]" id="entry_field_11" class="needsclick" data-has-error="false">
          <option value="">请选择</option>
          <option selected="selected" value="C3VF">总代</option>
          <option value="s84r">一级</option>
          <option value="ihwB">二级</option>
          <option value="G8Cv">特约</option>
        </select>
        </div>
        </div>
      </div>  -->           
      <div class="field field-text-field col-md-12" data-api-code="field_13" data-type="TextField" data-label="备注" data-validations="[]">
        <div class="form-group" >
          <label class="field-label" onclick="" for="entry_field_13">备注</label>
          <div class="field-content">
            <div class="field-description clearfix"><p>特殊情况请在此处填写，例如：加急快递</p></div>
            <input type="text" name="entry_note" id="entry_field_13" />
          </div>
        </div>
      </div>      
      <!--上传支付图片-->      
      <div class="field field-attachment-field col-md-12 required" data-api-code="field_9" data-type="AttachmentField" data-label="上传支付截图" data-validations="[&quot;Presence&quot;]">
        <label class="field-label" onclick="" for="entry_field_3">上传支付截图</label>
        <div class="up_img">
          <div class="tu">
						<div class="din">
						<div id="preview">
							<img id="imghead" width=50 height=50  >
						</div>
						<div class="file"> 
							<input type="file" name="payment1" onchange="previewImage(this)" /> 
						</div> 
						<span id="chong" style="display:none">重新选择</span>  
						<div id="tupian"><img src="/agentmanage/Public/images/home/plus.png"/><span style="display:block;float:right;font-size:0.9em;line-height:50px;text-indent:10px;">请选择上传文件(最多5个),限制每个20MB以内</span></div>
						</div> 

            <div id="din1" style="display:none">
							<div id="preview1">
								<img id="imghead1" width=50 height=50  >
							</div>
						  <div class="file"> 
							 <input type="file" name="payment2" onchange="previewImage1(this)" /> 
							</div> 
							<span id="chong1" style="display:none">重新选择</span> 
							<span id="shan1" style="display:none">删除</span>
							<div id="tupian1"><img src="/agentmanage/Public/images/home/plus.png"/><span style="display:block;float:right;font-size:0.9em;line-height:50px;text-indent:10px;">请选择上传文件(最多5个),限制每个20MB以内</span></div>
						</div>     

							
						<div id="din2" style="display:none">
							<div id="preview2">
								<img id="imghead2" width=50 height=50  >
							</div>
						 
							 <div class="file"> 
							<input type="file" name="payment3" onchange="previewImage2(this)" /> 
							</div> 
							<span id="chong2" style="display:none">重新选择</span>
							<span id="shan2" style="display:none">删除</span>  
							<div id="tupian2"><img src="/agentmanage/Public/images/home/plus.png"/><span style="display:block;float:right;font-size:0.9em;line-height:50px;text-indent:10px;">请选择上传文件(最多5个),限制每个20MB以内</span></div>
						</div>
							
						<div id="din3" style="display:none">
							<div id="preview3">
								<img id="imghead3" width=50 height=50  >
							</div>	 
  						<div class="file"> 
  							<input type="file" name="payment4" onchange="previewImage3(this)" /> 
  					  </div> 
  						<span id="chong3" style="display:none">重新选择</span> 
  						<span id="shan3" style="display:none">删除</span> 
  						<div id="tupian3"><img src="/agentmanage/Public/images/home/plus.png"/><span style="display:block;float:right;font-size:0.9em;line-height:50px;text-indent:10px;">请选择上传文件(最多5个),限制每个20MB以内</span></div>
						</div>
							
						<div id="din4" style="display:none; ">
  						<div id="preview4">
  							<img id="imghead4" width=50 height=50  >
  						</div>
  						<div class="file"> 
  							<input type="file" name="payment5" onchange="previewImage4(this)" /> 
  						</div> 
  						<span id="chong4" style="display:none">重新选择</span> 
  						<span id="shan4" style="display:none">删除</span> 
  						<div id="tupian4"><img src="/agentmanage/Public/images/home/plus.png"/><span style="display:block;float:right;font-size:0.9em;line-height:50px;text-indent:10px;">请选择上传文件(最多5个),限制每个20MB以内</span></div>
						</div>
					</div>	
        </div>
      </div>            
      <div class="field field-goods-field col-md-12" data-api-code="field_1" data-type="GoodsField" data-label="配货比例" data-validations="[]">
        <div class="form-group" >
        <label class="field-label" onclick="" for="entry_field_1">配货比例</label>
        <div class="field-content">
          <div class="field-description clearfix"><p>建议配货比例：总代200/200/160/40；一级40/40/30/10；二级7/7/4/2；特约/1/1/1/1</p></div>
            <div class="goods-items">
              <div class="goods-item" data-role='goods' data-inventory-label='库存' data-unit='件'>
                <div class="content-wrapper">
                  <div class="goods-image-wrapper">
                    <a class="lightbox-image-link" rel="lightbox[field_1]" title="iPhone6 plus/6s plus" href="https://dn-jsjpub.qbox.me/gi/20151210180653_c2d9d2@gixlarge">
                    <div class="image-loading" data-url='https://dn-jsjpub.qbox.me/gi/20151210180653_c2d9d2@gilarge'>加载中...</div>
                    </a>
                  </div>
                  <div class="text-wrapper">
                    <div class="name">iPhone6 plus/6s plus</div>
                  </div>
                </div>
                <div class="actions-wrapper">
                  <div class="price-number clearfix">
                    <div class="price-inventory">
                      <div class="price"><span class='currency'>&yen;</span>39.00</div>
                        <!-- <div class="inventory">库存 998780 件</div> -->
                    </div>
                    <div class="number-container gd-input-prepend gd-input-append">
                      <a href="javascript:void(0)" class="add-on decrease disabled"><i class="gd-icon-minus"></i></a>
                      <input type="hidden" name="entry[field_1][0][value]" id="entry_field_1_0_value" value="5690a0f4a3f52023460000ef" />
                      <input type="number" name="entry_sixp" id="entry_field_1_0_number" value="0" min="0" step="1" class="number" tabindex="-1" data-field-api-code="field_1" data-goods-value="5690a0f4a3f52023460000ef" data-goods-price="39.0" data-inventory="998780" />
                      <a href="javascript:void(0)" class="add-on increase disabled"><i class="gd-icon-plus"></i></a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="goods-item" data-role='goods' data-inventory-label='库存' data-unit='件'>
                <div class="content-wrapper">
                  <div class="goods-image-wrapper">
                    <a class="lightbox-image-link" rel="lightbox[field_1]" title="iPhone6/6s" href="https://dn-jsjpub.qbox.me/gi/20151210180702_f4c305@gixlarge">
                    <div class="image-loading" data-url='https://dn-jsjpub.qbox.me/gi/20151210180702_f4c305@gilarge'>加载中...</div>
                    </a>
                  </div>
                  <div class="text-wrapper">
                    <div class="name">iPhone6/6s</div>
                  </div>
                </div>
                <div class="actions-wrapper">
                  <div class="price-number clearfix">
                    <div class="price-inventory">
                      <div class="price"><span class='currency'>&yen;</span>39.00</div>
                      <!-- <div class="inventory">库存 998650 件</div> -->
                    </div>
                    <div class="number-container gd-input-prepend gd-input-append">
                      <a href="javascript:void(0)" class="add-on decrease disabled">
                        <i class="gd-icon-minus"></i>
                      </a>
                      <input type="hidden" name="entry[field_1][1][value]" id="entry_field_1_1_value" value="5690a0f4a3f52023460000f0" />
                      <input type="number" name="entry_six" id="entry_field_1_1_number" value="0" min="0" step="1" class="number" tabindex="-1" data-field-api-code="field_1" data-goods-value="5690a0f4a3f52023460000f0" data-goods-price="39.0" data-inventory="998650" />
                      <a href="javascript:void(0)" class="add-on increase disabled">
                        <i class="gd-icon-plus"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="goods-item" data-role='goods' data-inventory-label='库存' data-unit='件'>
                <div class="content-wrapper">
                  <div class="goods-image-wrapper">
                    <a class="lightbox-image-link" rel="lightbox[field_1]" title="iPhone5/5s" href="https://dn-jsjpub.qbox.me/gi/20151210180709_c8a741@gixlarge">
                      <div class="image-loading" data-url='https://dn-jsjpub.qbox.me/gi/20151210180709_c8a741@gilarge'>加载中...</div>
                    </a>
                  </div>
                  <div class="text-wrapper">
                    <div class="name">iPhone5/5s</div>
                  </div>
                </div>
                <div class="actions-wrapper">
                  <div class="price-number clearfix">
                    <div class="price-inventory">
                      <div class="price"><span class='currency'>&yen;</span>39.00</div>
                      <!-- <div class="inventory">库存 999860 件</div> -->
                    </div>
                    <div class="number-container gd-input-prepend gd-input-append">
                      <a href="javascript:void(0)" class="add-on decrease disabled">
                        <i class="gd-icon-minus"></i>
                      </a>
                      <input type="hidden" name="entry[field_1][2][value]" id="entry_field_1_2_value" value="5690a0f4a3f52023460000f1" />
                      <input type="number" name="entry_five" id="entry_field_1_2_number" value="0" min="0" step="1" class="number" tabindex="-1" data-field-api-code="field_1" data-goods-value="5690a0f4a3f52023460000f1" data-goods-price="39.0" data-inventory="999860" />
                      <a href="javascript:void(0)" class="add-on increase disabled">
                        <i class="gd-icon-plus"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="goods-item" data-role='goods' data-inventory-label='库存' data-unit='件'>
                <div class="content-wrapper">
                  <div class="goods-image-wrapper">
                    <a class="lightbox-image-link" rel="lightbox[field_1]" title="iPhone4/4s" href="https://dn-jsjpub.qbox.me/gi/20151210180716_2cdb57@gixlarge">
                      <div class="image-loading" data-url='https://dn-jsjpub.qbox.me/gi/20151210180716_2cdb57@gilarge'>加载中...</div>
                    </a>
                  </div>
                  <div class="text-wrapper">
                    <div class="name">iPhone4/4s</div>
                  </div>
                </div>
                <div class="actions-wrapper">
                <div class="price-number clearfix">
                  <div class="price-inventory">
                    <div class="price"><span class='currency'>&yen;</span>39.00</div>
                    <!-- <div class="inventory">库存 999970 件</div> -->
                  </div>
                  <div class="number-container gd-input-prepend gd-input-append">
                    <a href="javascript:void(0)" class="add-on decrease disabled">
                      <i class="gd-icon-minus"></i>
                    </a>
                    <input type="hidden" name="entry[field_1][3][value]" id="entry_field_1_3_value" value="5690a0f4a3f52023460000f2" />
                    <input type="number" name="entry_four" id="entry_field_1_3_number" value="0" min="0" step="1" class="number" tabindex="-1" data-field-api-code="field_1" data-goods-value="5690a0f4a3f52023460000f2" data-goods-price="39.0" data-inventory="999970" />
                    <a href="javascript:void(0)" class="add-on increase disabled">
                      <i class="gd-icon-plus"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>        
  </div>
  <div id="shopping_cart" class="col-md-12"></div>
<script>
//<![CDATA[

  $(function() {
    String.locale = 'zh-CN';

    var $form = $("form[data-form-token='9k1gYZ']");
    var rules = $.parseJSON('{}');
    if (!_.isEmpty(rules)) {
      GD.initFormLogic(rules, $form);
    }

    if(GD.FormClientValidator) {
      GD.clientValidator = new GD.FormClientValidator($form)
      GD.clientValidator.run()
    }

  });

//]]>
</script>



      <div class="field submit-field col-md-12 clearfix">
              <input type="submit" name="commit" value="提交" data-disable-with="提交中..." class="submit" style="width:60%;margin-left:20%;"/>
      </div>
    </div>
  </div>
</form>
  <script>
//<![CDATA[

  $(function() {
    var formContainer = $("form[data-form-token='9k1gYZ']:visible");
    if (formContainer.length > 0 && $('.entry').length == 0) {
      GD.initFormPagination(formContainer);
    }
  });

//]]>
</script>

  <script>
//<![CDATA[

    $(function() {
      GD = GD || {};
      GD.xhrUploadToken = 'kTs1p9Tn1gGWiIC_O83TcJeBc2E7oVxVCgDuTGFj:gn72ATz8UmKWCR8VUCPdU4JZOd0=:eyJzY29wZSI6ImpzanByaSIsImRlYWRsaW5lIjoxNDUzNDIwNDcyLCJyZXR1cm5Cb2R5Ijoie1wic2VjdXJpdHlfY29kZVwiOlwiZm9ybV85azFnWVpfYXR0YWNobWVudF8wVURoeExuL01wYz0xNDUzNDE2ODcyXCIsXCJjb250ZW50X3R5cGVcIjokKG1pbWVUeXBlKSxcImZvcm1faWRcIjpcIjlrMWdZWlwiLFwiZmllbGRfYXBpX2NvZGVcIjokKHg6ZmllbGRfYXBpX2NvZGUpLFwiZmlsZV9uYW1lXCI6JChmbmFtZSksXCJmaWxlX3NpemVcIjokKGZzaXplKSxcImtleVwiOiQoa2V5KX0iLCJzYXZlS2V5IjoiJChldGFnKV8kKHg6ZmllbGRfYXBpX2NvZGUpXyQoeDp0aW1lc3RhbXBfd2l0aF9yYW5kb21fbnVtYmVyKSJ9';
    })

//]]>
</script>



  <div id="form_page_error_messages_modal" class="modal warning form-error-messages-modal " tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false"><div class="modal-dialog modal-sm"><div class="modal-content">
  <div class="modal-header"><button type="button" class="close" data-dismiss="modal"><span>&times;</span></button><h4 class="modal-title">错误提醒</h4></div><div class="modal-body clearfix">
    <div class="error-explanation">
      <h5>提交未成功，当前页面填写有错误！</h5>
    </div>
</div></div></div></div>








    <footer class='published text-center hide'>
  </div>

  
    <script>
//<![CDATA[

    $(function(){
    })

//]]>
</script>  <script>
//<![CDATA[

      $(function(){
      });

    $(function() {
      $('.top-warning').delay(1000).slideDown(500);
    });


//]]>
</script>

<script type="text/javascript">
  var _smq = _smq || [];

  _smq.push(['_setAccount', '617170b', new Date()]);
  _smq.push(['_setHeatmapEnabled', 'no']);
  _smq.push(['pageview']);

  (function() {
    var sm = document.createElement('script'); sm.type = 'text/javascript'; sm.async = true;
    sm.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdnmaster.com/sitemaster/collect.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(sm, s);
  })();
</script>

  <img src="https://v.admaster.com.cn/i/a58935,b933282,c1327,i0,m202,h" width="1" height="1" />
  <img src="https://v502.fw4.me/i/a58935,b933282,c1327,i0,m202,h" width="1" height="1" />
  <img src="https://v502.admaster.com.cn/i/a58935,b933282,c1327,i0,m202,h" width="1" height="1" />


	 <script type="text/javascript">
var   flag1=0;   
  var   flag2=0;   
    
  function   NumberInc()   
  {   
      if(flag1==1   &&   flag2==1)   
              {alert("Error!");}   
      else   
      {   
              if(flag1==1)   
              {   
                  document.all.TextBox1.value++;   
                  setTimeout("NumberInc()",100);   
              }   
              if(flag2==1)   
              {   
                  document.all.TextBox1.value--;   
                  setTimeout("NumberInc()",100);   
              }   
      }   
  }   
    
  function   md(obj)   
  {   
    if(obj.id=="Button1")   flag1=1;   
    if(obj.id=="Button2")   flag2=1;   
    NumberInc();   
  }   
    
  function   mo(obj)   
  {   
    if(obj.id=="Button1")   flag1=0;   
    if(obj.id=="Button2")   flag2=0;   
  }   
 var   flag3=0;   
  var   flag4=0;           
  function   NumberInc1()   
  {   
      if(flag3==1   &&   flag4==1)   
              {alert("Error!");}   
      else   
      {   
              if(flag3==1)   
              {   
                  document.all.TextBox2.value++;   
                  setTimeout("NumberInc1()",100);   
              }   
              if(flag4==1)   
              {   
                  document.all.TextBox2.value--;   
                  setTimeout("NumberInc1()",100);   
              }   
      }   
  }   
    
  function   md1(obj)   
  {   
    if(obj.id=="Button3")   flag3=1;   
    if(obj.id=="Button4")   flag4=1;   
    NumberInc1();   
  }   
    
  function   mo1(obj)   
  {   
    if(obj.id=="Button3")   flag3=0;   
    if(obj.id=="Button4")   flag4=0;   
  } 
  
   var   flag5=0;   
  var   flag6=0;           
  function   NumberInc2()   
  {   
      if(flag5==1   &&   flag6==1)   
              {alert("Error!");}   
      else   
      {   
              if(flag5==1)   
              {   
                  document.all.TextBox3.value++;   
                  setTimeout("NumberInc2()",100);   
              }   
              if(flag6==1)   
              {   
                  document.all.TextBox3.value--;   
                  setTimeout("NumberInc2()",100);   
              }   
      }   
  }   
    
  function   md2(obj)   
  {   
    if(obj.id=="Button5")   flag5=1;   
    if(obj.id=="Button6")   flag6=1;   
    NumberInc2();   
  }   
    
  function   mo2(obj)   
  {   
    if(obj.id=="Button5")   flag5=0;   
    if(obj.id=="Button6")   flag6=0;   
  } 
  
   var   flag7=0;   
  var   flag8=0;           
  function   NumberInc3()   
  {   
      if(flag7==1   &&   flag8==1)   
              {alert("Error!");}   
      else   
      {   
              if(flag7==1)   
              {   
                  document.all.TextBox4.value++;   
                  setTimeout("NumberInc3()",100);   
              }   
              if(flag8==1)   
              {   
                  document.all.TextBox4.value--;   
                  setTimeout("NumberInc3()",100);   
              }   
      }   
  }   
    
  function   md3(obj)   
  {   
    if(obj.id=="Button7")   flag7=1;   
    if(obj.id=="Button8")   flag8=1;   
    NumberInc3();   
  }   
    
  function   mo3(obj)   
  {   
    if(obj.id=="Button7")   flag7=0;   
    if(obj.id=="Button8")   flag8=0;   
  } 
      
	 
	   shan1.addEventListener('click',function(){
		var shan1=document.getElementById('shan1');
		var din1=document.getElementById('din1'); 
		   din1.style.display='none';
		   })
	   shan2.addEventListener('click',function(){
		  var shan2=document.getElementById('shan2');
		  var din2=document.getElementById('din2');
		  din2.style.display='none'; 
		   })
	   shan3.addEventListener('click',function(){
		   var shan3=document.getElementById('shan3');
		   var din3=document.getElementById('din3');
		   din3.style.display='none';
		   })
		shan4.addEventListener('click',function(){
			var shan4=document.getElementById('shan4');
			var din4=document.getElementById('din4');
			din4.style.display='none';
			})
	           
        function previewImage(file)
        {
		  
          var MAXWIDTH  = 50; 
          var MAXHEIGHT = 50;
          var div = document.getElementById('preview');
		  var chong=document.getElementById('chong');
		  var tupian=document.getElementById('tupian');
		   var din1=document.getElementById('din1');
		   tupian.style.display='none';
		  chong.style.display='block';
		  din1.style.display='block';
          if (file.files && file.files[0])
          {
              div.innerHTML ='<img id=imghead>';
              var img = document.getElementById('imghead');
              img.onload = function(){
                var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
                img.width  =  rect.width;
                img.height =  rect.height;
//                 img.style.marginLeft = rect.left+'px';
                img.style.marginTop = rect.top+'px';
              }
              var reader = new FileReader();
              reader.onload = function(evt){img.src = evt.target.result;}
              reader.readAsDataURL(file.files[0]);
          }
          else //兼容IE
          {
            var sFilter='filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src="';
            file.select();
            var src = document.selection.createRange().text;
            div.innerHTML = '<img id=imghead>';
            var img = document.getElementById('imghead');
            img.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src = src;
            var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
            status =('rect:'+rect.top+','+rect.left+','+rect.width+','+rect.height);
            div.innerHTML = "<div id=divhead style='width:"+rect.width+"px;height:"+rect.height+"px;margin-top:"+rect.top+"px;"+sFilter+src+"\"'></div>";
          }
        }
        function clacImgZoomParam( maxWidth, maxHeight, width, height ){
            var param = {top:0, left:0, width:width, height:height};
            if( width>maxWidth || height>maxHeight )
            {
                rateWidth = width / maxWidth;
                rateHeight = height / maxHeight;
                 
                if( rateWidth > rateHeight )
                {
                    param.width =  maxWidth;
                    param.height = Math.round(height / rateWidth);
                }else
                {
                    param.width = Math.round(width / rateHeight);
                    param.height = maxHeight;
                }
            }
             
            param.left = Math.round((maxWidth - param.width) / 2);
            param.top = Math.round((maxHeight - param.height) / 2);
            return param;
        }
		
		                  //图片上传预览    IE是用了滤镜。
        function previewImage1(file)
        {
		  
          var MAXWIDTH  = 50; 
          var MAXHEIGHT = 50;
          var div = document.getElementById('preview1');
		  var chong=document.getElementById('chong1');
		  var tupian=document.getElementById('tupian1');
		   var din2=document.getElementById('din2');
		    var shan1=document.getElementById('shan1');
		   tupian.style.display='none';
		  chong.style.display='block';
		  din2.style.display='block';
		  shan1.style.display='block';
          if (file.files && file.files[0])
          {
              div.innerHTML ='<img id=imghead1>';
              var img = document.getElementById('imghead1');
              img.onload = function(){
                var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
                img.width  =  rect.width;
                img.height =  rect.height;
//                 img.style.marginLeft = rect.left+'px';
                img.style.marginTop = rect.top+'px';
              }
              var reader = new FileReader();
              reader.onload = function(evt){img.src = evt.target.result;}
              reader.readAsDataURL(file.files[0]);
          }
          else //兼容IE
          {
            var sFilter='filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src="';
            file.select();
            var src = document.selection.createRange().text;
            div.innerHTML = '<img id=imghead1>';
            var img = document.getElementById('imghead1');
            img.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src = src;
            var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
            status =('rect:'+rect.top+','+rect.left+','+rect.width+','+rect.height);
            div.innerHTML = "<div id=divhead style='width:"+rect.width+"px;height:"+rect.height+"px;margin-top:"+rect.top+"px;"+sFilter+src+"\"'></div>";
          }
        }
        function clacImgZoomParam( maxWidth, maxHeight, width, height ){
            var param = {top:0, left:0, width:width, height:height};
            if( width>maxWidth || height>maxHeight )
            {
                rateWidth = width / maxWidth;
                rateHeight = height / maxHeight;
                 
                if( rateWidth > rateHeight )
                {
                    param.width =  maxWidth;
                    param.height = Math.round(height / rateWidth);
                }else
                {
                    param.width = Math.round(width / rateHeight);
                    param.height = maxHeight;
                }
            }
             
            param.left = Math.round((maxWidth - param.width) / 2);
            param.top = Math.round((maxHeight - param.height) / 2);
            return param;
        }


	 		                  //图片上传预览    IE是用了滤镜。
        function previewImage2(file)
        {
		  
          var MAXWIDTH  = 50; 
          var MAXHEIGHT = 50;
          var div = document.getElementById('preview2');
		  var chong=document.getElementById('chong2');
		  var tupian=document.getElementById('tupian2');
		   var din3=document.getElementById('din3');
		   var shan2=document.getElementById('shan2');
		   tupian.style.display='none';
		   shan2.style.display='block';
		  chong.style.display='block';
		  din3.style.display='block';
          if (file.files && file.files[0])
          {
              div.innerHTML ='<img id=imghead2>';
              var img = document.getElementById('imghead2');
              img.onload = function(){
                var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
                img.width  =  rect.width;
                img.height =  rect.height;
//                 img.style.marginLeft = rect.left+'px';
                img.style.marginTop = rect.top+'px';
              }
              var reader = new FileReader();
              reader.onload = function(evt){img.src = evt.target.result;}
              reader.readAsDataURL(file.files[0]);
          }
          else //兼容IE
          {
            var sFilter='filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src="';
            file.select();
            var src = document.selection.createRange().text;
            div.innerHTML = '<img id=imghead2>';
            var img = document.getElementById('imghead2');
            img.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src = src;
            var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
            status =('rect:'+rect.top+','+rect.left+','+rect.width+','+rect.height);
            div.innerHTML = "<div id=divhead style='width:"+rect.width+"px;height:"+rect.height+"px;margin-top:"+rect.top+"px;"+sFilter+src+"\"'></div>";
          }
        }
        function clacImgZoomParam( maxWidth, maxHeight, width, height ){
            var param = {top:0, left:0, width:width, height:height};
            if( width>maxWidth || height>maxHeight )
            {
                rateWidth = width / maxWidth;
                rateHeight = height / maxHeight;
                 
                if( rateWidth > rateHeight )
                {
                    param.width =  maxWidth;
                    param.height = Math.round(height / rateWidth);
                }else
                {
                    param.width = Math.round(width / rateHeight);
                    param.height = maxHeight;
                }
            }
             
            param.left = Math.round((maxWidth - param.width) / 2);
            param.top = Math.round((maxHeight - param.height) / 2);
            return param;
        }
		
				                  //图片上传预览    IE是用了滤镜。
        function previewImage3(file)
        {
		  
          var MAXWIDTH  = 50; 
          var MAXHEIGHT = 50;
          var div = document.getElementById('preview3');
		  var chong=document.getElementById('chong3');
		  var tupian=document.getElementById('tupian3');
		   var din4=document.getElementById('din4');
		   var shan3=document.getElementById('shan3');
		   tupian.style.display='none';
		  chong.style.display='block';
		  shan3.style.display='block';
		  din4.style.display='block';
          if (file.files && file.files[0])
          {
              div.innerHTML ='<img id=imghead3>';
              var img = document.getElementById('imghead3');
              img.onload = function(){
                var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
                img.width  =  rect.width;
                img.height =  rect.height;
//                 img.style.marginLeft = rect.left+'px';
                img.style.marginTop = rect.top+'px';
              }
              var reader = new FileReader();
              reader.onload = function(evt){img.src = evt.target.result;}
              reader.readAsDataURL(file.files[0]);
          }
          else //兼容IE
          {
            var sFilter='filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src="';
            file.select();
            var src = document.selection.createRange().text;
            div.innerHTML = '<img id=imghead3>';
            var img = document.getElementById('imghead3');
            img.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src = src;
            var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
            status =('rect:'+rect.top+','+rect.left+','+rect.width+','+rect.height);
            div.innerHTML = "<div id=divhead style='width:"+rect.width+"px;height:"+rect.height+"px;margin-top:"+rect.top+"px;"+sFilter+src+"\"'></div>";
          }
        }
        function clacImgZoomParam( maxWidth, maxHeight, width, height ){
            var param = {top:0, left:0, width:width, height:height};
            if( width>maxWidth || height>maxHeight )
            {
                rateWidth = width / maxWidth;
                rateHeight = height / maxHeight;
                 
                if( rateWidth > rateHeight )
                {
                    param.width =  maxWidth;
                    param.height = Math.round(height / rateWidth);
                }else
                {
                    param.width = Math.round(width / rateHeight);
                    param.height = maxHeight;
                }
            }
             
            param.left = Math.round((maxWidth - param.width) / 2);
            param.top = Math.round((maxHeight - param.height) / 2);
            return param;
        }
		
		
				                  //图片上传预览    IE是用了滤镜。
        function previewImage4(file)
        {
		  
          var MAXWIDTH  = 50; 
          var MAXHEIGHT = 50;
          var div = document.getElementById('preview4');
		  var chong=document.getElementById('chong4');
		  var tupian=document.getElementById('tupian4');
		  var shan4=document.getElementById('shan4');
		   tupian.style.display='none';
		  chong.style.display='block';
		  shan4.style.display='block';
		  
          if (file.files && file.files[0])
          {
              div.innerHTML ='<img id=imghead4>';
              var img = document.getElementById('imghead4');
              img.onload = function(){
                var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
                img.width  =  rect.width;
                img.height =  rect.height;
//                 img.style.marginLeft = rect.left+'px';
                img.style.marginTop = rect.top+'px';
              }
              var reader = new FileReader();
              reader.onload = function(evt){img.src = evt.target.result;}
              reader.readAsDataURL(file.files[0]);
          }
          else //兼容IE
          {
            var sFilter='filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src="';
            file.select();
            var src = document.selection.createRange().text;
            div.innerHTML = '<img id=imghead4>';
            var img = document.getElementById('imghead4');
            img.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src = src;
            var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
            status =('rect:'+rect.top+','+rect.left+','+rect.width+','+rect.height);
            div.innerHTML = "<div id=divhead style='width:"+rect.width+"px;height:"+rect.height+"px;margin-top:"+rect.top+"px;"+sFilter+src+"\"'></div>";
          }
        }
        function clacImgZoomParam( maxWidth, maxHeight, width, height ){
            var param = {top:0, left:0, width:width, height:height};
            if( width>maxWidth || height>maxHeight )
            {
                rateWidth = width / maxWidth;
                rateHeight = height / maxHeight;
                 
                if( rateWidth > rateHeight )
                {
                    param.width =  maxWidth;
                    param.height = Math.round(height / rateWidth);
                }else
                {
                    param.width = Math.round(width / rateHeight);
                    param.height = maxHeight;
                }
            }
             
            param.left = Math.round((maxWidth - param.width) / 2);
            param.top = Math.round((maxHeight - param.height) / 2);
            return param;
        }
    

</script>
  

</body>
</html>