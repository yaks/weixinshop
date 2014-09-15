<?php if (!defined('THINK_PATH')) exit();?><meta charset="utf-8" /><meta name="keywords" content="<?php echo ($page_seo["keywords"]); ?>" /><meta name="description" content="<?php echo ($page_seo["description"]); ?>" /><meta content="width=device-width,minimum-scale=1.0,maximum-scale=1.0" name="viewport"><html><head><title><?php echo ($user_site['set_name']); ?></title><script type="text/javascript" src="__STATIC__/GMU/dist/zepto.js"></script></style></head><body><a id="auto" href="https://open.weixin.qq.com/connect/oauth2/authorize?appid=<?php echo ($appid); ?>&redirect_uri=http://shop.bismai.com/index.php/weixin/?a=author&response_type=code&scope=snsapi_base&state=1#wechat_redirect&state=1"></a><body></body></html><script type="text/javascript">$(function ($){	

$("#auto").click();

});
</script>