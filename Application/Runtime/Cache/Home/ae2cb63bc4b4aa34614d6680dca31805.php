<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/Public/Css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/Public/Css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="/Public/Css/style.css" />
    <script type="text/javascript" src="/Public/Js/jquery.js"></script>
    <script type="text/javascript" src="/Public/Js/jquery.sorted.js"></script>
    <script type="text/javascript" src="/Public/Js/bootstrap.js"></script>
    <script type="text/javascript" src="/Public/Js/ckform.js"></script>
    <script type="text/javascript" src="/Public/Js/common.js"></script>
    <style type="text/css">
    body {
        padding-bottom: 40px;
    }
    
    .sidebar-nav {
        padding: 9px 0;
    }
    
    @media (max-width: 980px) {
        /* Enable use of floated navbar text */
        
        .navbar-text.pull-right {
            float: none;
            padding-left: 5px;
            padding-right: 5px;
        }
    }
    </style>
</head>

<body>
    <div style="width:auto;float:left;">
        <form action="?" method="post" class="definewidth m20">
            <table class="table table-bordered table-hover definewidth m10" style="width:100%;margin-left:10px;margin-top:25px">
                <tr>
                    <td width="35%" class="tableleft">门店名称</td>
                    <td>
                        <input type="text" name="data[storename]" value="<?php echo ($address["storename"]); ?>" />
                        
                    </td>
                </tr>
                <tr>
                    <td class="tableleft">门店联系人</td>
                    <td>
                        <input type="text" name="data[contacts]" value="<?php echo ($address["contacts"]); ?>" />
                    </td>
                </tr>
                <tr>
                    <td class="tableleft">门店百度X,Y坐标</td>
                    <td>
                        <input id="xy" type="text" name="data[xy]" value="<?php echo ($address["xy"]); ?>" />
                    </td>
                </tr>
                <tr>
                    <td class="tableleft">门店地址</td>
                    <td>
                        <input type="text" name="data[address]" value="<?php echo ($address["address"]); ?>" />
                    </td>
                </tr>
                <tr>
                    <td class="tableleft">联系电话</td>
                    <td>
                        <input type="text" name="data[tel]" value="<?php echo ($address["tel"]); ?>" />
                    </td>
                </tr>
                <input type="hidden" name="id" value="<?php echo ($address["id"]); ?>">
                <tr>
                    <td class="tableleft"></td>
                    <td>
                        <button type="submit" class="btn btn-primary" type="button">修改</button> &nbsp;&nbsp;
                        <button type="button" class="btn btn-success" name="backid" id="backid">返回列表</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <div style="width:60%;float:left;margin-left:20px;height:400px;">
        <div style="height:30px;margin-top:15px;">
            关键字：
            <input type="text" name="username" id="input" class="abc input-default" placeholder="" value="">&nbsp;&nbsp;
            <button type="submit" class="btn btn-primary" style="padding-bottom: 1px;padding-top: 1px;border-top-width: 0px;border-bottom-width: 0px;margin-bottom: 10px;" onclick="search()">查询</button>&nbsp;&nbsp;
            <input type="text" name="username" id="xy1" disabled class="abc input-default" placeholder="" value="">&nbsp;&nbsp;
        </div>
        <html>

        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
            <style type="text/css">
            body,
            html {
                width: 100%;
                height: 100%;
                margin: 0;
                font-family: "微软雅黑";
                font-family: "微软雅黑";
            }
            
            #allmap {
                width: 100%;
                height: 500px;
            }
            
            #r-result {
                width: 100%;
            }
            
            p {
                margin-left: 5px;
                font-size: 14px;
            }
            </style>
            <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=pj4GSVhYWndaxn3xnktmTpQa"></script>
            <title>依森百度地图插件</title>
        </head>

        <body>
            <div id="allmap" style="float:left;"></div>
            <div id="r-result" style="float:right;"></div>
        </body>

        </html>
        <script type="text/javascript">
        // 百度地图API功能
        var map = new BMap.Map("allmap"); //新建一个地图实例
        var point = new BMap.Point(121.564296, 29.878312); // 创建点坐标  
        map.centerAndZoom(point, 13); //地图实例化，设置放大级别为13级


        function showInfo(e) {
            var mark = e.point.lng + ", " + e.point.lat;
            document.getElementById('xy').value = (mark);
            document.getElementById('xy1').value = (mark);
        }
        map.addEventListener("click", showInfo); //设置点击事件


        //     function add_overlay(e){

        //     var mark = e.point.lng + ", " + e.point.lat;


        //     var marker = new BMap.Marker(new BMap.Point(mark));

        //     document.getElementById('xy').value = (mark);                
        //     document.getElementById('xy1').value = (marker);                
        //     map.addOverlay(marker);            //增加点
        //     // marker.enableDragging();

        //     }
        //     //清除覆盖物
        //     function remove_overlay(){
        //         map.clearOverlays();         
        //     }

        // map.addEventListener("click", add_overlay); //设置点击事件



        // map.addEventListener('click', function(e) {

        //             var icon = new BMap.Icon('/Public/Images/pin.png', new BMap.Size(20, 32), {
        //                 anchor: new BMap.Size(10, 30)，
        //                 infoWindowAnchor: new BMap.Size(10, 0)
        //             });

        //             var mkr = new BMap.Marker(new BMap.Point(121.564296, 29.878312), {
        //                     icon: icon,
        //                     enableDragging: true,
        //                     raiseOnDrag: true
        //                 });

        //                 map.addOverlay(mkr);


        //                 document.getElementById('xy').value = (e.point.lng + ', ' + e.point.lat);

        //             });








                function search() {
                    //输出查找到的地址所需要的函数
                    var options = {
                        onSearchComplete: function(results) {
                            // 判断状态是否正确
                            if (local.getStatus() == BMAP_STATUS_SUCCESS) {
                                var s = [];
                                for (var i = 0; i < results.getCurrentNumPois(); i++) {
                                    s.push(results.getPoi(i).title + ", " + results.getPoi(i).address);
                                }
                                document.getElementById("r-result").innerHTML = s.join("<br/>");
                            }
                        }
                    };


                    var local = new BMap.LocalSearch(map, {
                        renderOptions: {
                            map: map,
                            panel: "r-result"
                        }
                    }); //列表输出查找到的地点，并在地图标注，显示信息

                    // var local = new BMap.LocalSearch(map, options);//输出查找到的地址，不标注


                    var pStart = new BMap.Point(120.944537, 30.348676); //自己规定的起始区域
                    var pEnd = new BMap.Point(121.972486, 29.075912); //自己规定的结束区域
                    var bs = new BMap.Bounds(pStart, pEnd); //自己规定范围


                    local.search(document.getElementById('input').value, bs); //用区域查询到的结果输出到r-result中

                }

                // 初始化地图，设置中心点坐标和地图级别  
                var opts = {
                        type: BMAP_NAVIGATION_CONTROL_LARGE
                    } //设置放大缩小框
                map.addControl(new BMap.NavigationControl(opts));


                map.enableScrollWheelZoom(); //启用滚轮放大缩小，默认禁用
                map.enableContinuousZoom(); //启用地图惯性拖拽，默认禁用


                var marker = new BMap.Marker(point); // 创建标注
                map.addOverlay(marker); // 将标注添加到地图中
                // marker.setAnimation(BMAP_ANIMATION_BOUNCE); //跳动的动画
                marker.enableDragging();

                // mkr.addEventListener('dragend', function(e) {
                //     alert(e.point.lng + ', ' + e.point.lat);
                // });

                //     function myDis());
                //     }
        </script>
    </div>
</body>

</html>
<script>
$(function() {
    $('#backid').click(function() {
        window.location.href = "index.html";
    });

});
</script>