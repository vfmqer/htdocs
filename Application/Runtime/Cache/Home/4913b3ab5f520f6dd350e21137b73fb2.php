<?php if (!defined('THINK_PATH')) exit(); function get_td_array($table) { $table = preg_replace("'<table[^>]*?>'si", "", $table); $table = preg_replace("'<tr[^>]*?>'si", "", $table); $table = preg_replace("'<td[^>]*?>'si", "", $table); $table = str_replace("</tr>", "{tr}", $table); $table = str_replace("</td>", "{td}", $table); $table = preg_replace("'<[\/\!]*?[^<>]*?>'si", "", $table); $table = preg_replace("'([\r\n])[\s]+'", "", $table); $table = str_replace(" ", "", $table); $table = str_replace(" ", "", $table); $table = explode('{tr}', $table); array_pop($table); foreach ($table as $key => $tr) { $td = explode('{td}', $tr); array_pop($td); $td_array[] = $td; } return $td_array; } echo 'enenba.com亲自撸过结果：<br />'; $str = '
<table width="200" border="1" cellspacing="0" cellpadding="0">
    <tr>
        <td>姓名</td>
        <td>公司</td>
        <td>电话</td>
    </tr>
    <tr>
        <td>小明</td>
        <td>xx科技</td>
        <td>15858585858</td>
    </tr>
    <tr>
    <tr>
        <td>小红</td>
        <td>yy科技</td>
        <td>14848484848</td>
    </tr>
    </tr>
</table>
'; $r = get_td_array($str); echo $str; printf("<p>输出数据为：</p><pre>%s</pre>\n",var_export( $r ,TRUE)); ?>