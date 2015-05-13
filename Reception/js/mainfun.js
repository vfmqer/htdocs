//数据库调用方法
//获取资讯信息
function getzxlist(){
    var id = '13';
    var urls = generateUrl(id);
    var postdata = {
          "newsid":"",    
          "type":"",   
    }; 
    $.ajax({
          url: urls,
          type: 'POST',
          dataType: 'json',
          data:jQuery.param(postdata, true),// 要提交的数据
          //error:function(XMLResponse){alert(XMLResponse.responseText)},
          success:function(data){
            if(data!=null){   //返回成功   
              for(var i=0;i<data.length;i++){
                  $html='<div class="zxlist" align="left" alt='+data[i]["id"]+'><img src='+url_img()+data[i]["img"]+' class="zximg" /><div class="zxcontect" ><div style="font-size:14px">'+data[i]["title"]+'</div><div style="font-size:12px">摘要：'+data[i]["remark"]+'</div><div style="font-size:12px;color:#ccc">点击：'+data[i]["read"]+'&nbsp;&nbsp;&nbsp;发布日期：'+data[i]["date"].substring(0, 10);+'</div></div></div>';
                 $("#lists").append($html); 

              }
            }else{  //没有资讯！
              openTip('没有资讯！','.personregist_tip','.personregist_windowcover');
            }
          }
    });
}

//获取产品分类
function getprotitle(){     
    var id = '04';
    var urls = generateUrl(id);
    var postdata = {
        "productid":"",    
        "category":"",  
    }; 
    $.ajax({
          url: urls,
          type: 'POST',
          dataType: 'json',
          data:jQuery.param(postdata, true),// 要提交的数据
          //error:function(XMLResponse){alert(XMLResponse.responseText)},
          success:function(data){
            if(data!=null){   //返回成功   
              for(var i=0;i<data.length;i++){
                if (data[i]["typeid"]==$.session.get("category")) {
                   var html='<div class="active" alt='+data[i]["typeid"]+'>'+data[i]["typename"]+'</div>';
                }else{
                   var html='<div class="list" alt='+data[i]["typeid"]+'>'+data[i]["typename"]+'</div>';
                }      
                 $("#title").append(html); 
              }
            }else{  //没有资讯！
              openTip('没有资讯！','.personregist_tip','.personregist_windowcover');
            }
          }
    });
}

//根据分类获取产品
function getcatpro(category){    
    $(".context").html(""); 
    var id = '04';
    var urls = generateUrl(id);
    var postdata = {
        "productid":"",    
        "category":category,  
    }; 
    $.ajax({
          url: urls,
          type: 'POST',
          dataType: 'json',
          data:jQuery.param(postdata, true),// 要提交的数据
          //error:function(XMLResponse){alert(XMLResponse.responseText)},
          success:function(data){
            if(data!=null){   //返回成功   
              for(var i=0;i<data.length;i++){
                var html='<div class="prolist1"><img src='+url_img()+data[i]["img"]+' class="proimg"/><div class="protitle">'+data[i]["name"]+'<div class="pclick">点击：'+data[i]["read"]+'&nbsp;&nbsp;&nbsp;发布日期：'+data[i]["lasttime"].substring(0,10)+'</div></div></div>';                
                $(".context").append(html);
              }
            }else{  //没有资讯！
              openTip('没有资讯！','.personregist_tip','.personregist_windowcover');
            }
          }
    });
}

//侧边栏应用
function leftdiv(){
    //如果已经登录，显示用户名
    if ($.session.get('username')) {
      $("#usernc").text($.session.get('username'));
    }

    //1跳转之前先检查是否登录，没有登录直接跳转到登录界面
    $("#myproduct").click(function(event) {
      if ($.session.get('username')) {
        location.href = "myproductlist.html";
      }else{
        location.href = "login.html";
      }
    });

    //2跳转之前先检查是否登录，没有登录直接跳转到登录界面
    $("#myorder").click(function(event) {
      if ($.session.get('username')) {
        location.href = "myorder.html";
      }else{
        location.href = "login.html";
      }
    });

    //3跳转之前先检查是否登录，没有登录直接跳转到登录界面
    $("#myreward").click(function(event) {
      if ($.session.get('username')) {
        location.href = "myreward.html";
      }else{
        location.href = "login.html";
      }
    });

    //4跳转之前先检查是否登录，没有登录直接跳转到登录界面
    $("#zxcenter").click(function(event) {
      location.href = "zxcenter.html";
    });

    //5跳转之前先检查是否登录，没有登录直接跳转到登录界面
    $("#recommend").click(function(event) {
      if ($.session.get('username')) {
        location.href = "recommend.html";
      }else{
        location.href = "login.html";
      }
    });

    //6跳转之前先检查是否登录，没有登录直接跳转到登录界面
    $("#mypassword").click(function(event) {
      if ($.session.get('username')) {
        location.href = "xgmm.html";
      }else{
        location.href = "login.html";
      }
    });

    //7跳转之前先检查是否登录，没有登录直接跳转到登录界面
    $("#onekeymap").click(function(event) {
      location.href = "onekeymap.html";
    });    

    //8跳转之前先检查是否登录，没有登录直接跳转到登录界面
    $("#totaobao").click(function(event) {
      location.href = "http://ai.m.taobao.com/index.html";
    });       

    //9跳转之前先检查是否登录，没有登录直接跳转到登录界面
    $("#complain").click(function(event) {
      if ($.session.get('username')) {
        location.href = "complain.html";
      }else{
        location.href = "login.html";
      }
    });

    //10退出登录，关闭session
    $("#loginout").click(function(event) {
      if ($.session.get('username')) {
        $.session.clear();
        $("#usernc").text("用户昵称");
      }else{
        openTip('没有登录，不需要退出！','.personregist_tip','.personregist_windowcover');
      }
    });      
}