//添加实体列表添加表格中
function addRowByEntityList(tableId,entityList){
    if(typeof(entityList)=="undefined"||entityList==null) return;
    if(entityList instanceof Array){
        for(var i=0;i<entityList.length;i++)
            addRowByEntity(tableId,entityList[i]);
    }
}

//将一个实体添加到一行
function addRowByEntity(tableId,entity){
	addInstanceRow(tableId,entity,null,"setObjValueByFlag")
}

//添加一个行
//可以使用方法addInstanceRow(tableId,entity)
function addInstanceRow(tableId,names,values,functionName){
	var tableObj=getTargetControl(tableId);
	var tbodyOnlineEdit=getTableTbody(tableObj);
	var theadOnlineEdit=tableObj.getElementsByTagName("THEAD")[0];
	var elm=theadOnlineEdit.rows[theadOnlineEdit.rows.length-1].cloneNode(true);
	elm.style.display="";
	if(typeof(names)!="undefined"){
	    if(typeof(functionName)=="undefined") functionName="setObjValueByName";
	    if(typeof(values)!="undefined"&&values!=null){
		    var entity=ArrayToObj(names,values);
		    setInputValue(elm,entity,functionName);
	    }
	    else
		    setInputValue(elm,names,functionName);
	}
	tbodyOnlineEdit.appendChild(elm);
}


//设置新添加行的值
function setInputValue(elm,entity,functionName){
	var childNodes=elm.childNodes;
	for(var i=0;i<childNodes.length;i++){
		for(var j=0;j<childNodes[i].childNodes.length;j++){
			setHtmlObjValue(childNodes[i].childNodes[j],entity,functionName);
		}
	}
}

//设置值
function setHtmlObjValue(obj,entity,functionName){
	if(typeof(functionName)=="undefined"){
		setObjValueByName(obj,entity);
	}
	else{
		eval(functionName+"(obj,entity);");
	}
}

//根据客户控件Name匹配实体属性来设置值
function setObjValueByName(obj,entity){
	if(entity.hasOwnProperty(obj.name)){
		obj.value=getEntityPropertyValue(entity,obj.name);
	}
}

//根据标志设置添加值
function setObjValueByFlag(obj,entity){
	var objTemp=obj.parentNode;
	var arrMatches=objTemp.innerHTML.match(/\${\w+}/g);
	if(typeof(arrMatches)=="undefined"||arrMatches==null||typeof(arrMatches.length)=="undefined"||arrMatches.length==null)
	    return;
	var tempValue="";
	var propertyValue="";
	for(var i=0;i<arrMatches.length;i++){
		tempValue=arrMatches[i].replace(/\${|}/g,"");
		propertyValue=getEntityPropertyValue(entity,tempValue);
		if(propertyValue!=null){
		    if(typeof(propertyValue)=="string"){
		        if(propertyValue!="")
		            propertyValue=propertyValue.replace(/\s/g,"&nbsp;");
		        else
		            propertyValue="&nbsp;";
		    }    
		    objTemp.innerHTML=objTemp.innerHTML.replace(arrMatches[i],propertyValue);   
		}
		else{
			objTemp.innerHTML=objTemp.innerHTML.replace(arrMatches[i],"&nbsp;");
		}
	}
}

//得到实体指定的属性值
function getEntityPropertyValue(entity,propertyName){
	var tempValue="";
	if(entity.hasOwnProperty(propertyName)){
		eval("tempValue=entity."+propertyName+";");
	    return tempValue;
	}
	else return null;
}

//值对转成实体
function ArrayToObj(names,values){
	var entity=new Object();
	for(var i=0;i<names.length;i++){
		if(Trim(names[i])!="") eval("entity."+names[i]+"='"+values[i]+"';");
	}
	return entity;
}

//得到table中的tbody控件，注意兼容firefox
function getTableTbody(tableObj){
	var tbodyOnlineEdit=tableObj.getElementsByTagName("TBODY")[0];
	if(typeof(tbodyOnlineEdit)=="undefined"||tbodyOnlineEdit==null){
		tbodyOnlineEdit=document.createElement("tbody");
		tableObj.appendChild(tbodyOnlineEdit);
	}
	return tbodyOnlineEdit;
}

//去除空格
function Trim(s) {
    var m = s.match(/^\s*(\S+(\s+\S+)*)\s*$/);
    return (m == null) ? "" : m[1];
}

//删除触发事件控件所在的行
function deleteThisRow(targetControl){
	if(targetControl.tagName=="TR")
		targetControl.parentNode.removeChild(targetControl);
	else
		deleteThisRow(targetControl.parentNode);
}

//删除表格下的所有行
function deleteAllRow(tableId){
	var tableObj=getTargetControl(tableId);
	var tbodyOnlineEdit=getTableTbody(tableObj);
	for(var i=tbodyOnlineEdit.childNodes.length-1;i>=0;i--){
	    tbodyOnlineEdit.removeChild(tbodyOnlineEdit.childNodes[i]);
	}
}

//得到指定的控件
//假如传递的是控件，得返回控件
//假如传递的是ID值，则自动查找出控件并返回
function getTargetControl(targetControl){
	if(typeof(targetControl)=="string"){
		return document.getElementById(targetControl);
	}
	else return targetControl;
}


    //添加行ByName
    function addRowByName() {
            addInstanceRow("table1_byname", ["name", "sex", "age", "city", "nation"], ["张三", "男", "13", "北京", "汉"], "setObjValueByName");
        }
        //添加行ByFlag
    function addRowByFlag() {
            addInstanceRow("table1_byname", {
                name: "李四",
                sex: "男",
                age: 26,
                city: "天津",
                nation: "汉"
            }, null, "setObjValueByFlag");
        }
        //添加行ByFlag(属性存在空值时）
    function addRowByFlagWithNullPro() {
            addInstanceRow("table1_byname", {
                name: "李四",
                sex: "男",
                age: 26,
                nation: "汉"
            }, null, "setObjValueByFlag");
        }
        //添加行ByFlag,传递单个对象实体
    function addRowByFlagWithEntity() {
            addRowByEntity("table1_byname", {
                name: "五妹",
                sex: "女",
                city: "南京",
                age: 23,
                nation: "壮"
            });
        }
        //添加行ByFlag,传递单个对象实体集合
    function addRowByFlagWithEntityList() {
            addRowByEntityList("table1_byname", [{
                name: "五妹",
                sex: "女",
                city: "南京",
                age: 23,
                nation: "壮"
            }, {
                name: "阿六",
                sex: "男",
                city: "济南",
                age: 26,
                nation: "汉"
            }]);
        }
        //
    function alertValue(value) {
            alert(value);
        }
        //
    function tellinCity(txtBox) {
        alert("城市:" + txtBox.value + "<br/>人名:" + txtBox.tagname);
    }
