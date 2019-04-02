<?php /*a:1:{s:44:"E:\www\tp5\/template/admin/column\index.html";i:1554199722;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="/public/static/admin/assets/css/layui.css">
    <link rel="stylesheet" href="/public/static/admin/assets/css/view.css"/>
    <title>权限配置</title>
    <style type="text/css">
        .layui-input-block{margin-left:0px; }
    </style>
</head>
<body class="layui-view-body">
<div class="layui-content">
    <div class="layui-page-header">
        <div class="pagewrap">
            <span class="layui-breadcrumb">
              <a href="">首页</a>
              <a href="">用户</a>
              <a><cite>权限配置</cite></a>
            </span>
            <h2 class="title">权限配置</h2>
        </div>
    </div>
    <div class="layui-row">
        <div class="layui-card">
            <div class="layui-card-body">
                <table class="layui-table">
                    <colgroup>
                        <col width="50">
                        <col width="50">
                        <col width="250">
                        <col width="500">
                        <col width="60">
                        <col>
                    </colgroup>
                <thead>
                    <tr>
                        <td>排序</td>
                        <th>id</th>
                        <th>栏目名称</th>
                        <th>关键词</th>
                        <th>状态</th>
                        <th>操作</th>
                    </tr> 
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" name="sort" style="width: 35px;text-align: center;"></td>
                        <td>1</td>
                        <td>2016-11-29</td>
                        <td>2016-11-29</td>
                        <td>
                            <form class="layui-form">
                                <div class="layui-form-item">
                                    <div class="layui-input-block">
                                        <input type="checkbox" value="0" name="status" lay-skin="switch" lay-text="开启|关闭">
                                    </div>
                                </div>
                            </form>
                        </td>
                        <td>
                            <div class="layui-btn-group">
                                <button class="layui-btn layui-btn-primary layui-btn-sm">
                                    <i class="layui-icon">&#xe65f;</i>
                                </button>
                                <button class="layui-btn layui-btn-primary layui-btn-sm">
                                    <i class="layui-icon">&#xe642;</i>
                                </button>
                                <button class="layui-btn layui-btn-primary layui-btn-sm">
                                    <i class="layui-icon">&#xe640;</i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="/public/static/admin/assets/layui.all.js"></script>
<script>
layui.use('form', function(){
    var form = layui.form;
    form.on('switch', function(data) {
        // $(data.elem).attr('type', 'hidden').val(this.checked ? 1 : 0);
        console.log(data.elem.value);
        console.log(data.elem.value);
    });
});
</script>
</body>
</html>