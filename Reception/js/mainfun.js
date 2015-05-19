//数据库调用方法

//登录检查
function logincheck(){
  $('.btload').click(function(event){
    
    var username=$('#username').val();
    var password=$('#password').val();
    var yanzm=$('#yanzm').val();
    //alert(username+"|"+password+"|"+yanzm);

    if(username == '' )
    {  
      openTip('请填写用户名！','.personregist_tip','.personregist_windowcover'); 
      $('#username').focus();
    }
    else if(password == '' )
    {
      openTip('请填写密码！','.personregist_tip','.personregist_windowcover');  
      $('#password').focus();
    }  
    else if(yanzm == '' )
    {
      openTip('请填写验证码！','.personregist_tip','.personregist_windowcover');  
      $('#yanzm').focus();
    }
    else 
    {      
          var id = '01';
          var urls = generateUrl(id);
          var postdata = {
            "username":username,    
            "password":password,
            //"yanzm":yanzm   
          }; 
          $.ajax({
            url: urls,
            type: 'POST',
            dataType: 'json',
            data:jQuery.param(postdata, true),// 要提交的数据
            success: function (data) {
              if(data["a"]=='01001'){   //注册成功
                location.href = "index.html";
                $.session.set('username', username);
              }else if(data["a"]=='01002'){//重复注册
                openTip('用户名已被注册，请重新填写！','.personregist_tip','.personregist_windowcover');
              }else{  //注册失败
                openTip('注册失败！','.personregist_tip','.personregist_windowcover');
              }
            }
          });
          return false;
    } 
  }) 
}
//登录检查
function logincheck(){
  var username=$('#username').val();
  var password=$('#password').val();

  if(username == '')
  {   
    openTip('请填写用户名！','.personregist_tip','.personregist_windowcover'); 
    $('#username').focus();
  }
  else if(password == '' )
  {
    openTip('请填写密码！','.personregist_tip','.personregist_windowcover');  
    $('#password').focus();
  }
  else 
  {       var id = '02';
        var urls = generateUrl(id);
        var postdata = {
          "username":username,    
          "password":password,   
        }; 
        $.ajax({
          url: urls,
          type: 'POST',
          dataType: 'json',
          data:jQuery.param(postdata, true),// 要提交的数据
          success: function (data) {
            if(data["a"]=='02001'){   //登陆成功
              location.href = "index.html";
              $.session.set('username', username);
            }else{  //登陆失败
              openTip('用户名或者密码错误！','.personregist_tip','.personregist_windowcover');
            }
          }
        });
      
  } 
}

//获取产品分类用于标题
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
              openTip('没有分类信息！','.personregist_tip','.personregist_windowcover');
            }
          }
    });
}

//获取产品分类用于展示分类
function getprocatgroy(){
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
                  $html='<div class="divfl" alt='+data[i]["typeid"]+'><div class="catg">'+data[i]["typename"]+'</div></div>';
                 $("#prolist").append($html); 
              }

            }else{  //没有资讯！
              openTip('没有分类信息！','.personregist_tip','.personregist_windowcover');
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

                if (category!="*") {
                  var html='<div class="prolist1" alt='+data[i]["id"]+'><img src='+url_img()+data[i]["img"]+' class="proimg"/><div class="protitle">'+data[i]["name"]+'<div class="pclick">点击：'+data[i]["read"]+'&nbsp;&nbsp;&nbsp;发布日期：'+data[i]["lasttime"].substring(0,10)+'</div></div></div>';                
                  $(".context").append(html);
                }else{
                  var html='<div class="prolist" alt='+data[i]["id"]+'><img src='+url_img()+data[i]["img"]+' class="proimg" /><div class="pro_name" ><div>'+data[i]["name"]+'</div><div style="color:red">￥ '+data[i]["price"]+'</div><div class="fbdate">发布日期：'+data[i]["lasttime"].substring(0,10)+'</div></div></div>';                                  
                  $(".listbody").append(html);
                }
                
              }
            }else{  //没有资讯！
              openTip('没有产品信息！','.personregist_tip','.personregist_windowcover');
            }
          }
    });
}


//获取产品详情
function getprodetail(productid){    
    $(".context").html(""); 
    var id = '04';
    var urls = generateUrl(id);
    var postdata = {
        "productid":productid,    
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
                $(".proname span").text(data[i]["name"]);
                $(".proname1").text(data[i]["name"]);
                $(".proname div").text("￥"+data[i]["price"]);
                $("#imgsrc").attr("src",url_img()+data[i]["img"]);
                $(".imgset").attr("src",url_img()+data[i]["img"]);
                $(".content").text(data[i]["details"]);
                $(".contentfont").text(data[i]["details"]);
              }
            }else{  //没有资讯！
              openTip('没有产品信息！','.personregist_tip','.personregist_windowcover');
            }
          }
    });
}


//获取用户订单信息
function getmyorder(){
    var id = '05';
    var urls = generateUrl(id);
    var postdata = {
          "username":$.session.get("username"),    
          "orderid":"",   
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
                $html='<div class="prolist"><img src='+url_img()+data[i]["img"]+' class="photo"/><div class="cont">'+data[i]["name"]+'<br/>单价：￥'+data[i]["price"]+'&nbsp;&nbsp;数量：'+data[i]["number"]+'<br/><div style="font-size:12px">订单号 <span style="color:red">'+data[i]["orderid"]+'</span>&nbsp;&nbsp;&nbsp;日期：'+data[i]["transactiontime"].substring(0,10)+'</div></div></div>';
                $("#proshow").append($html); 
              }
            }else{  //没有资讯！
              openTip('没有订单信息！','.personregist_tip','.personregist_windowcover');
            }
          }
    });
}


//获取某个订单信息
function getorderdetail(){
    var id = '05';
    var urls = generateUrl(id);
    var postdata = {
          "username":$.session.get("username"),    
          "orderid":$.session.get("orderid"),   
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
                $(".myorderid").text("订单号 "+data[i]["orderid"]); 
                $(".bd ul li").children("img").attr("src",url_img()+data[i]["img"]);
                $(".productname").text(data[i]["name"]); 
                $("#pprice div span").text(data[i]["price"]); 
                $("#pprice div s").text(data[i]["price"]); 
              }
            }else{  //没有资讯！
              openTip('没有订单信息！','.personregist_tip','.personregist_windowcover');
            }
          }
    });
}


//获取所有抽奖信息
function getlotterylist(){
    var id = '09';
    var urls = generateUrl(id);
    var postdata = {
          "lotteryid":"",      
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
                $html='<div class="lotteryitem" alt='+data[i]["id"]+'><span>'+data[i]["title"]+'</span><img src="img/img22.png" height="15"><span id="deaddate" >'+data[i]["endtime"].substring(0,10)+' 截止</span></div>'; 
                $("#lotterylist").append($html);          
              }
            }else{  //没有资讯！
              openTip('没有抽奖信息！','.personregist_tip','.personregist_windowcover');
            }
          }
    });
}

//砸金蛋调用数据库
function getlotterydetail(){

  var id = '09';
  var urls = generateUrl(id);
  var postdata = {
      "lotteryid":$.session.get("lotteryid"),
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
                $(".hdsign").text(data[0]["title"]);
                $(".textfont").text(data[0]["describe"]);  
                //var prize_arr = new Array();
                //prize_arr[i]= new array('id':data[i]["number"],'prize':data[i]["name"],'v':data[i]["winning"]);
              }
              alert($prize_arr);
            }else{  //没有资讯！
              openTip('没有奖品！','.personregist_tip','.personregist_windowcover');
            }
        }    
  });

}


//砸金蛋控制
function eggClick(obj){

  clicktimes=1;
  var _this = obj;
  _this.find("span").hide();

  $.getJSON("data.php",function(res){
    /*if(_this.hasClass("curr")){
      alert("蛋全碎了，别砸了！刷新再来.");
      return false;
    }*/
    //_this.unbind('click');
    //$(".hammer").css({"top":_this.position().top-55,"left":_this.position().left+185});


    $(".hammer").css({"top":_this.position().top-55,"left":_this.position().left});
    $(".hammer").animate({
      "top":_this.position().top-25,
      "left":_this.position().left  //"left":_this.position().left+125
      },30,function(){
        _this.addClass("curr"); //蛋碎效果

        _this.find("sup").show(); //金花四溅
        $(".hammer").hide();
        $('.resultTip').css({display:'block',top:'550px',left:_this.position().left-15,opacity:0}).animate({top: '120px',opacity:1},300,function(){
          if(res.msg==1){
            $("#result").html("恭喜，您中得"+res.prize+"!");
          }else{
            $("#result").html("很遗憾,您没能中奖!");
          }
        }); 
      }
    );
  });
}

//提交问卷
function postlessons(){  
  var username=$.session.get("username");
  var questionid=$.session.get("questionid");
  var questiontype=$.session.get("questiontype");
  $("#questions").find(".wjlist").bind("myclick",function(){
    var id = '11';
    var urls = generateUrl(id);
    var postdata = {
        "username":username,
        "qusnumber":$(this).find("input:radio:checked").attr("name"),
        "result":$(this).find("input:radio:checked").attr("id"), 
        "questiontype":questiontype, 
        "questionid":questionid, 
    }; 
    $.ajax({
          url: urls,
          type: 'POST',
          dataType: 'json',
          data:jQuery.param(postdata, true),// 要提交的数据
          //error:function(XMLResponse){alert(XMLResponse.responseText)},
          success:function(data){
            if(data["a"]=="11001"){   //返回成功   
              openTip('提交成功！','.personregist_tip','.personregist_windowcover');
              location.href = "service.html";
            }else{  //插入失败！
              openTip('提交问卷失败，请重新提交！','.personregist_tip','.personregist_windowcover');
            }
          }
    });

  }).trigger("myclick");
}

//获取问卷问题
function getlessons(){    
    var id = '12';
    var urls = generateUrl(id);
    var postdata = {
      "questionid":$.session.get("questionid"),
      "questiontype":"",
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
                $htmlitem="";
                if(data[i]["a"]!=""){
                  $htmlitem=$htmlitem+'<div class="wjitem" ><input type="radio" name='+data[i]["id"]+' id="a" value='+data[i]["a"]+' checked><label>'+data[i]["a"]+'</label></div>';
                }
                if(data[i]["b"]!=""){
                  $htmlitem=$htmlitem+'<div class="wjitem" ><input type="radio" name='+data[i]["id"]+' id="b" value='+data[i]["b"]+'><label>'+data[i]["b"]+'</label></div>';
                }
                if(data[i]["c"]!=""){
                  $htmlitem=$htmlitem+'<div class="wjitem" ><input type="radio" name='+data[i]["id"]+' id="c" value='+data[i]["c"]+'><label>'+data[i]["c"]+'</label></div>';
                }
                if(data[i]["d"]!=""){
                  $htmlitem=$htmlitem+'<div class="wjitem" ><input type="radio" name='+data[i]["id"]+' id="d" value='+data[i]["d"]+'><label>'+data[i]["d"]+'</label></div>';
                }                                                                
                $html='<div class="wjlist"><div >'+data[i]["title"]+'：</div>'+$htmlitem+'</div>';           
                $("#questions").append($html);$(".wenj").text($.session.get("questiontitle"));     
              }                           
            }else{  //没有资讯！
              openTip('没有问卷信息！','.personregist_tip','.personregist_windowcover');
            }
          }
    });
}

//获取问卷title
function getquestionlist(questiontype){

  var id = '12';
  var urls = generateUrl(id);
  var postdata = {
      "questionid":"",
      "questiontype":questiontype,
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
                $html='<div class="lessons" alt='+data[i]["id"]+'><div><span>'+data[i]["title"]+'</span><img src="img/img22.png" height="15"></div></div>';           
                $("#questionlist").append($html);
              }
            }else{  //没有资讯！
              openTip('没有问卷信息！','.personregist_tip','.personregist_windowcover');
            }
        }    
  });
}


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

//创建订单
function createorder(){    
    var id = '16';
    var urls = generateUrl(id);
    //var mydate = new Date();
    //alert(mydate.getTime());
    //getorderid();  
    var orderid="D"+$.session.get("username")+$.session.get("zx_productid")+"001";
    var postdata = {
        "username":$.session.get("username"),
        "ordername":"",    
        "orderid":orderid,
        "productid":$.session.get("zx_productid"),  
    }; 
    $.ajax({
          url: urls,
          type: 'POST',
          dataType: 'json',
          data:jQuery.param(postdata, true),// 要提交的数据
          //error:function(XMLResponse){alert(XMLResponse.responseText)},
          success:function(data){
            if(data["a"]=="16001"){   //返回成功   
              //openTip('您的订单号是'+orderid,'.personregist_tip','.personregist_windowcover');
              alert('您的订单号是  '+orderid+" \\n 注：1、请您牢记您的订单号，点确定后系统会为您链接到淘宝界面直接购买！ \\n 2、与店家通过阿里旺旺联系，告知订单号，购买成功后可获得积分奖励！");
              location.href = "http://ai.m.taobao.com/index.html";
            }else{  //插入失败！
              openTip('购买失败，请重新购买！','.personregist_tip','.personregist_windowcover');
            }
          }
    });
}

//侧边栏应用
function leftdiv(){
    //如果已经登录，显示用户名
    if ($.session.get('username')) {
      $("#usernc").text($.session.get('username'));
    }else{
        location.href = "login.html";
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
        //window.opener = null; window.open('', '_self'); window.close(); 
      }else{
        openTip('没有登录，不需要退出！','.personregist_tip','.personregist_windowcover');
      }
    });  

    $("#showleft").click(function(event) {
    /* Act on the event */
      $(".cbbody").toggleClass('leftin');
      $(".bgdiv").toggleClass('leftin');
      $("body").toggleClass('bodydiv');
    });

    $(".cbbody,.bgdiv").click(function(event) {
      /* Act on the event */
      $(".cbbody").toggleClass('leftin');
      $(".bgdiv").toggleClass('leftin');
      $("body").toggleClass('bodydiv');
    });    
}