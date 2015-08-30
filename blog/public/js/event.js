/**
 *事件监听模型,实现浏览器兼容问题
 */
//(function(){
//'use strict';


var Event = {
	/////////添加事件监听器
	add:function(element,type,handler){
		if(element.addEventListener){//标准DOM
			element.addEventListener(type,handler,false);
		}else if(element.attachEvent){//IE
			element.attachEvent('on'+type,handler);
		}else{//0 DOM
			element['on'+type] = handler;
		}
	},

	//////////移除事件监听器
	remove:function(element,type,handler){
		if(element.removeEventListener){//标准DOM
			element.removeEventListener(type,handler,false);
		}else if(element.detachEvent){//IE
			element.detachEvent('on'+type,handler);
		}else{//0 DOM
			element['on'+type] = null;
		}
	},

	//////////阻止事件传播(这里是阻止冒泡)
	stopPropagation:function(event){
		if(event.stopPropagation){//标准DOM
			event.stopPropagation();
		}else{//IE
			event.cancelBubble = true;
		}
	},

	// ///////取消事件的默认行为
	preventDefault : function(event) {
		if (event.preventDefault) {//标准DOM
			event.preventDefault();
		} else {//IE
			event.returnValue = false;
		}
	},

	//////////获取事件的文档节点
	getTarget:function(event){
		return event.target || event.srcElement;
	},
	
	//////////获取事件对象的引用
	getEvent:function(event){
		return event ? event : window.event;
	}
};
//}());