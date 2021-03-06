<?php /*a:1:{s:43:"E:\www\tp5\/template/index/wxpay\index.html";i:1557209945;}*/ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Javascript 二维码生成库：QRCode</title>
    <script type="text/javascript" src="/public/static/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="/public/static/js/qrcode.min.js"></script>
</head>
<body>
<div class="onqr">
    <input type="hidden" id="out_trade_no" value="<?php echo htmlentities($product_id); ?>" >
    <input id="text" type="hidden" value="<?php echo htmlentities($qrCode_url); ?>" style="width:80%" /><br />
    <div id="qrcode" style="width:100px; height:100px; margin-top:15px;"></div>
    <?php echo token(); ?>
</div>
<div class="liveqr">
    <img id="img" src="" />
</div>
<script type="text/javascript">
    var qrcode = new QRCode(document.getElementById("qrcode"), {
        width : 100,
        height : 100
    });

    function makeCode () {
        var elText = document.getElementById("text");
        if (!elText.value) {
            alert("Input a text");
            elText.focus();
            return;
        }
        qrcode.makeCode(elText.value);
    }
    makeCode();
    // 产看订单状态
    var time = setInterval("check()",3000);    //3秒查询一次是否支付成功
    function check() {
        var url = "<?php echo url('/index/Wxpay/orderstate'); ?>";
        var out_trade_no = $("#out_trade_no").val();
        var param = {'out_trade_no':out_trade_no};
        $.post(url,param,function(data){
            var obj = eval(data);
            // data = JSON.parse(data);
            if (obj.trade_state == 'SUCCESS') {
                time = window.clearInterval(time);
                $(".onqr").hide();
                // 支付成功把二维码替换成支付成功图标
                $("#img").attr('src','/public/wxpay/images/success.png');
                console.log(obj);
                // window.location.href="<?php echo url('/index/wxpay/notify'); ?>";
            }else{
                console.log("ajax 方法出现问题了！");
            }
        });
    }
</script>
</body>
</html>