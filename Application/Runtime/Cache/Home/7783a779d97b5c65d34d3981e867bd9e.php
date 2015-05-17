<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <title>订单返利管理</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/htdocs/Public/Css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/htdocs/Public/Css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="/htdocs/Public/Css/style.css" />
    <script type="text/javascript" src="/htdocs/Public/Js/jquery.js"></script>
    <script type="text/javascript" src="/htdocs/Public/Js/jquery.sorted.js"></script>
    <script type="text/javascript" src="/htdocs/Public/Js/bootstrap.js"></script>
    <script type="text/javascript" src="/htdocs/Public/Js/ckform.js"></script>
    <script type="text/javascript" src="/htdocs/Public/Js/common.js"></script>
    <script type="text/javascript" src="/htdocs/Public/Js/view.js"></script>
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
    <br/>
    <form class="form-inline definewidth m20" action="?" method="post">
        &nbsp;&nbsp;&nbsp;&nbsp;活动标题：
        <input type="text" name="time[title]" id="username" class="abc input-default" placeholder="" style="width:450px" value="<?php echo ($result_serial["title"]); ?>">
        <hr />
        <div style="text-align:center">
            <p>活动描述</p>
        </div>
        <textarea name="time[describe]" value="" style="margin: 0px 0px 10px; width: 100%; height: 80px;resize: none;"><?php echo ($result_serial["describe"]); ?></textarea>
        <br /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;活动起始时间：
        <input type="text" name="time[starttime]" value="<?php echo ($result_serial["starttime"]); ?>" style="border:1px solid #999;" onclick="fPopCalendar(event,this,this)" onfocus="this.select()" readonly="readonly" />&nbsp;&nbsp; 活动结束时间
        <input type="text" name="time[endtime]" value="<?php echo ($result_serial["endtime"]); ?>" style="border:1px solid #999;" onclick="fPopCalendar(event,this,this)" onfocus="this.select()" readonly="readonly" />
        <button type="button" class="btn btn-success" onclick="addRow()" id="addnew">新增奖品信息</button>
        <table id="table" name="data" class="table table-bordered table-hover definewidth m10" cellpadding="3">
            <thead>
                <tr>
                    <td>编号</td>
                    <td>奖品名称</td>
                    <td>奖品数量</td>
                    <td>中奖概率</td>
                    <td>操作</td>
                </tr>
                <input value="<?php echo ($id1); ?>" type="hidden" name="id1" type="text">
                <?php if(is_array($result_prize)): foreach($result_prize as $k=>$vo): ?><tr>
                        <td>
                            <p><?php echo ($k); ?></p>
                        </td>
                        <input value="<?php echo ($vo["id"]); ?>" type="hidden" name="data[<?php echo ($k); ?>][id]" type="text">
                        <td>
                            <input value="<?php echo ($vo["name"]); ?>" name="data[<?php echo ($k); ?>][name]" type="text">
                        </td>
                        <td>
                            <input value="<?php echo ($vo["number"]); ?>" name="data[<?php echo ($k); ?>][number]" type="text">
                        </td>
                        <td>
                            <input value="<?php echo ($vo["winning"]); ?>" name="data[<?php echo ($k); ?>][winning]" type="text">
                        </td>
                        <td><a>删除</a></td>
                    </tr>
                    </tr><?php endforeach; endif; ?>
            </thead>
        </table>
</body>
<hr />
<div style="text-align: center;">
    <button type="submit" class="btn btn-primary">保存 </button>&nbsp;&nbsp;
    <div>
        </form>

</html>
<script language="javascript" type="text/javascript">
function addRow() {
    //get rows
    var table = document.getElementById("table");
    var row = table.rows.length;
    var rows = row - 1;

    //添加一行
    var newTr = table.insertRow();
    //添加两列
    var newTd0 = newTr.insertCell();
    var newTd1 = newTr.insertCell();
    var newTd2 = newTr.insertCell();
    var newTd3 = newTr.insertCell();
    var newTd4 = newTr.insertCell();
    //设置列内容和属性
    newTd0.innerHTML = '<p>' + rows + '</p>';
    newTd1.innerHTML = '<input  value="" name=data[' + rows + '][name] type="text" >';
    newTd2.innerHTML = '<input  value="" name=data[' + rows + '][number] type="text" >';
    newTd3.innerHTML = '<input  value="" name=data[' + rows + '][winning] type="text" >';
    newTd4.innerHTML = '<a>删除</a>';
}

// function table() {

// alert(document.getElementsByTagName('que[2]').value);
//     // var url = "<?php echo U('index/lessons_add');?>?id=1";
//     // window.location.href = url;
// }

//日历脚本，    用<input type="text" style="border:1px solid #999;" onclick="fPopCalendar(event,this,this)" onfocus="this.select()" readonly="readonly" />可以把选择的日期输入到输入框
</script>
<script type="text/javascript">
var gMonths = new Array("一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月");
var WeekDay = new Array("日", "一", "二", "三", "四", "五", "六");
var strToday = "今天";
var strYear = "年";
var strMonth = "月";
var strDay = "日";
var splitChar = "-";
var startYear = 2000;
var endYear = 2050;
var dayTdHeight = 12;
var dayTdTextSize = 12;
var gcNotCurMonth = "#E0E0E0";
var gcRestDay = "#FF0000";
var gcWorkDay = "#444444";
var gcMouseOver = "#79D0FF";
var gcMouseOut = "#F4F4F4";
var gcToday = "#444444";
var gcTodayMouseOver = "#6699FF";
var gcTodayMouseOut = "#79D0FF";
var gdCtrl = new Object();
var goSelectTag = new Array();
var gdCurDate = new Date();
var giYear = gdCurDate.getFullYear();
var giMonth = gdCurDate.getMonth() + 1;
var giDay = gdCurDate.getDate();

function $() {
    var elements = new Array();
    for (var i = 0; i < arguments.length; i++) {
        var element = arguments[i];
        if (typeof(arguments[i]) == 'string') {
            element = document.getElementById(arguments[i]);
        }
        if (arguments.length == 1) {
            return element;
        }
        elements.Push(element);
    }
    return elements;
}
Array.prototype.Push = function() {
    var startLength = this.length;
    for (var i = 0; i < arguments.length; i++) {
        this[startLength + i] = arguments[i];
    }
    return this.length;
}
String.prototype.HexToDec = function() {
    return parseInt(this, 16);
}
String.prototype.cleanBlank = function() {
    return this.isEmpty() ? "" : this.replace(/\s/g, "");
}

function checkColor() {
    var color_tmp = (arguments[0] + "").replace(/\s/g, "").toUpperCase();
    var model_tmp1 = arguments[1].toUpperCase();
    var model_tmp2 = "rgb(" + arguments[1].substring(1, 3).HexToDec() + "," + arguments[1].substring(1, 3).HexToDec() + "," + arguments[1].substring(5).HexToDec() + ")";
    model_tmp2 = model_tmp2.toUpperCase();
    if (color_tmp == model_tmp1 || color_tmp == model_tmp2) {
        return true;
    }
    return false;
}

function $V() {
    return $(arguments[0]).value;
}

function fPopCalendar(evt, popCtrl, dateCtrl) {
    evt.cancelBubble = true;
    gdCtrl = dateCtrl;
    fSetYearMon(giYear, giMonth);
    var point = fGetXY(popCtrl);
    with($("calendardiv").style) {
        left = point.x + "px";
        top = (point.y + popCtrl.offsetHeight + 1) + "px";
        visibility = 'visible';
        zindex = '99';
        position = 'absolute';
    }
    $("calendardiv").focus();
}

function fSetDate(iYear, iMonth, iDay) {
    var iMonthNew = new String(iMonth);
    var iDayNew = new String(iDay);
    if (iMonthNew.length < 2) {
        iMonthNew = "0" + iMonthNew;
    }
    if (iDayNew.length < 2) {
        iDayNew = "0" + iDayNew;
    }
    gdCtrl.value = iYear + splitChar + iMonthNew + splitChar + iDayNew;
    fHideCalendar();
}

function fHideCalendar() {
    $("calendardiv").style.visibility = "hidden";
    for (var i = 0; i < goSelectTag.length; i++) {
        goSelectTag[i].style.visibility = "visible";
    }
    goSelectTag.length = 0;
}

function fSetSelected() {
    var iOffset = 0;
    var iYear = parseInt($("tbSelYear").value);
    var iMonth = parseInt($("tbSelMonth").value);
    var aCell = $("cellText" + arguments[0]);
    aCell.bgColor = gcMouseOut;
    with(aCell) {
        var iDay = parseInt(innerHTML);
        if (checkColor(style.color, gcNotCurMonth)) {
            iOffset = (innerHTML > 10) ? -1 : 1;
        }
        iMonth += iOffset;
        if (iMonth < 1) {
            iYear--;
            iMonth = 12;
        } else if (iMonth > 12) {
            iYear++;
            iMonth = 1;
        }
    }
    fSetDate(iYear, iMonth, iDay);
}

function Point(iX, iY) {
    this.x = iX;
    this.y = iY;
}

function fBuildCal(iYear, iMonth) {
    var aMonth = new Array();
    for (var i = 1; i < 7; i++) {
        aMonth[i] = new Array(i);
    }
    var dCalDate = new Date(iYear, iMonth - 1, 1);
    var iDayOfFirst = dCalDate.getDay();
    var iDaysInMonth = new Date(iYear, iMonth, 0).getDate();
    var iOffsetLast = new Date(iYear, iMonth - 1, 0).getDate() - iDayOfFirst + 1;
    var iDate = 1;
    var iNext = 1;
    for (var d = 0; d < 7; d++) {
        aMonth[1][d] = (d < iDayOfFirst) ? (iOffsetLast + d) * (-1) : iDate++;
    }
    for (var w = 2; w < 7; w++) {
        for (var d = 0; d < 7; d++) {
            aMonth[w][d] = (iDate <= iDaysInMonth) ? iDate++ : (iNext++) * (-1);
        }
    }
    return aMonth;
}

function fDrawCal(iYear, iMonth, iCellHeight, iDateTextSize) {
    var colorTD = " bgcolor='" + gcMouseOut + "' bordercolor='" + gcMouseOut + "'";
    var styleTD = " valign='middle' align='center' style='height:" + iCellHeight + "px;font-weight:bolder;font-size:" + iDateTextSize + "px;";
    var dateCal = "";
    dateCal += "<tr>";
    for (var i = 0; i < 7; i++) {
        dateCal += "<td" + colorTD + styleTD + "color:#990099'>" + WeekDay[i] + "</td>";
    }
    dateCal += "</tr>";
    for (var w = 1; w < 7; w++) {
        dateCal += "<tr>";
        for (var d = 0; d < 7; d++) {
            var tmpid = w + "" + d;
            dateCal += "<td" + styleTD + "cursor:pointer;' onclick='fSetSelected(" + tmpid + ")'>";
            dateCal += "<span id='cellText" + tmpid + "'></span>";
            dateCal += "</td>";
        }
        dateCal += "</tr>";
    }
    return dateCal;
}

function fUpdateCal(iYear, iMonth) {
    var myMonth = fBuildCal(iYear, iMonth);
    var i = 0;
    for (var w = 1; w < 7; w++) {
        for (var d = 0; d < 7; d++) {
            with($("cellText" + w + "" + d)) {
                parentNode.bgColor = gcMouseOut;
                parentNode.borderColor = gcMouseOut;
                parentNode.onmouseover = function() {
                    this.bgColor = gcMouseOver;
                };
                parentNode.onmouseout = function() {
                    this.bgColor = gcMouseOut;
                };
                if (myMonth[w][d] < 0) {
                    style.color = gcNotCurMonth;
                    innerHTML = Math.abs(myMonth[w][d]);
                } else {
                    style.color = ((d == 0) || (d == 6)) ? gcRestDay : gcWorkDay;
                    innerHTML = myMonth[w][d];
                    if (iYear == giYear && iMonth == giMonth && myMonth[w][d] == giDay) {
                        style.color = gcToday;
                        parentNode.bgColor = gcTodayMouseOut;
                        parentNode.onmouseover = function() {
                            this.bgColor = gcTodayMouseOver;
                        };
                        parentNode.onmouseout = function() {
                            this.bgColor = gcTodayMouseOut;
                        };
                    }
                }
            }
        }
    }
}

function fSetYearMon(iYear, iMon) {
    $("tbSelMonth").options[iMon - 1].selected = true;
    for (var i = 0; i < $("tbSelYear").length; i++) {
        if ($("tbSelYear").options[i].value == iYear) {
            $("tbSelYear").options[i].selected = true;
        }
    }
    fUpdateCal(iYear, iMon);
}

function fPrevMonth() {
    var iMon = $("tbSelMonth").value;
    var iYear = $("tbSelYear").value;
    if (--iMon < 1) {
        iMon = 12;
        iYear--;
    }
    fSetYearMon(iYear, iMon);
}

function fNextMonth() {
    var iMon = $("tbSelMonth").value;
    var iYear = $("tbSelYear").value;
    if (++iMon > 12) {
        iMon = 1;
        iYear++;
    }
    fSetYearMon(iYear, iMon);
}

function fGetXY(aTag) {
    var oTmp = aTag;
    var pt = new Point(0, 0);
    do {
        pt.x += oTmp.offsetLeft;
        pt.y += oTmp.offsetTop;
        oTmp = oTmp.offsetParent;
    } while (oTmp.tagName.toUpperCase() != "BODY");
    return pt;
}

function getDateDiv() {
    var noSelectForIE = "";
    var noSelectForFireFox = "";
    if (document.all) {
        noSelectForIE = "onselectstart='return false;'";
    } else {
        noSelectForFireFox = "-moz-user-select:none;";
    }
    var dateDiv = "";
    dateDiv += "<div id='calendardiv' onclick='event.cancelBubble=true' " + noSelectForIE + " style='" + noSelectForFireFox + "position:absolute;z-index:99;visibility:hidden;border:1px solid #999999;'>";
    dateDiv += "<table border='0' bgcolor='#E0E0E0' cellpadding='1' cellspacing='1' >";
    dateDiv += "<tr>";
    dateDiv += "<td><input type='button' id='PrevMonth' value='<' style='height:20px;width:20px;font-weight:bolder;' onclick='fPrevMonth()'>";
    dateDiv += "</td><td><select id='tbSelYear' style='border:1px solid;' onchange='fUpdateCal($V(\"tbSelYear\"),$V(\"tbSelMonth\"))'>";
    for (var i = startYear; i < endYear; i++) {
        dateDiv += "<option value='" + i + "'>" + i + strYear + "</option>";
    }
    dateDiv += "</select></td><td>";
    dateDiv += "<select id='tbSelMonth' style='border:1px solid;' onchange='fUpdateCal($V(\"tbSelYear\"),$V(\"tbSelMonth\"))'>";
    for (var i = 0; i < 12; i++) {
        dateDiv += "<option value='" + (i + 1) + "'>" + gMonths[i] + "</option>";
    }
    dateDiv += "</select></td><td>";
    dateDiv += "<input type='button' id='NextMonth' value='>' style='height:20px;width:20px;font-weight:bolder;' onclick='fNextMonth()'>";
    dateDiv += "</td>";
    dateDiv += "</tr><tr>";
    dateDiv += "<td align='center' colspan='4'>";
    dateDiv += "<div style='background-color:#cccccc'><table width='100%' border='0' cellpadding='3' cellspacing='1'>";
    dateDiv += fDrawCal(giYear, giMonth, dayTdHeight, dayTdTextSize);
    dateDiv += "</table></div>";
    dateDiv += "</td>";
    dateDiv += "</tr><tr><td align='center' colspan='4' nowrap>";
    dateDiv += "<span style='cursor:pointer;font-weight:bolder;' onclick='fSetDate(giYear,giMonth,giDay)' onmouseover='this.style.color=\"" + gcMouseOver + "\"' onmouseout='this.style.color=\"#000000\"'>" + strToday + ":" + giYear + strYear + giMonth + strMonth + giDay + strDay + "</span>";
    dateDiv += "</tr></tr>";
    dateDiv += "</table></div>";
    return dateDiv;
}
with(document) {
    onclick = fHideCalendar;
    write(getDateDiv());
}
</script>