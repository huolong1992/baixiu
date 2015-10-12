/**
 *ajax请求
 */
//(function(){

//'use strict';
var Ajax = {

    //////////创建xmlhttprequest对象
    createXMLHttp:function(){
        var versions = [
            function(){return new XMLHttpRequest();},
            function(){return new ActiveXObject("Microsoft.XMLHttp");},
            function(){return new ActiveXObject("MSXML2.XMLHttp.5.0");},
            function(){return new ActiveXObject("MSXML2.XMLHttp.4.0");},
            function(){return new ActiveXObject("MSXML2.XMLHttp.3.0");},
            function(){return new ActiveXObject("MSXML2.XMLHttp");}
        ];

        for(var i=0; i<versions.length; i++){
            try{
                //从中找到一个支持的版本并建立XMLHttp对象
                var request = versions[i]();
                if (request != null) {
                    return request;
                }
                
            }
            catch(exception){
                continue;
            }
        }

        throw new Error('您的浏览器不支持XMLHttpRequest');
    },

    ////////////////开始请求并返回数据
    send:function(url,options){

        ///////////设置请求参数
        var _options = {
            method:'GET',///请求方式
            asyn:true,///是否异步
            data:null,///请求数据
            onsuccess:function(){},///请求成功的回调函数
            onerror:function(){}///请求失败的回调函数
        };
        for ( var key in options) {
            _options[key] = options[key];
        }

        ////////////创建请求,发送,并返回数据
        var request = Ajax.createXMLHttp();
        request.onreadystatechange = function(){
            if(request.readyState == 4){
                if(request.status == 200){
                    _options.onsuccess(Ajax.getResponse(request));
                }else{
                    _options.onerror(Ajax.getResponse(request));
                }
            }
        }
        request.open(_options.method, url, _options.asyn);
        if(_options.method.toUpperCase()=='POST'){
            request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        }


        request.send(Ajax.encodeData(_options.data));
    },

    //////////根据响应类型返回相应数据
    getResponse:function(request){
        switch(request.getResponseHeader('Content-Type')){
            case 'text/xml':
                return request.responseXML;
            case 'text/json':
                return JSON.parse(request.responseText);
            case 'text/javascript':
            case 'application/javascript':
            case 'application/x-javascript':
                return eval(request.responseText);
            default:
                return decodeURIComponent(request.responseText);
        }
    },

    ///////////encode the object to string as 'name=value&sex=...'
    encodeData:function(data){

        if(data==null){
            return null;
        }
        
        var pairs = [];
        for(var name in data){

            var value = data[name];
            var pair = encodeURIComponent(name)+'='+encodeURIComponent(value);
            pairs.push(pair);
        }

        return pairs.join('&');
    },

    /////////////get data from other domain
    getJsonp:function(url,callback){
        url += '?callback=' + callback;
        var script = Ajax.createScript(url);
        //var script = document.createElement ("script");

        if (script.readyState){ //IE
            script.onreadystatechange = function(){
                if (script.readyState == "loaded" || script.readyState == "complete"){
                    script.onreadystatechange = null;
                    callback();
                }
            };
        } else { //Others
            script.onload = function(){
                callback();
            };
        }
    },

    /////////////dynamiclly create <script> tag
    createScript:function(url){
        /////////if already exist the <script id='jsonp_script'>
        //////then delete it
        var jsonp_script = document.getElementById('jsonp_script');
        if(jsonp_script){
            //jsonp_script.parentNode.removeChild(jsonp_script);//this can not remove from the memory
            jsonp_script = null;
            //delete jsonp_script 是不能删除对象的,
            //delete jsonp_script.src可以删除对象的属性和方法
        }

        ///////now begin to create
        var script = document.createElement('script');
        script.setAttribute('type', 'text/javascript');
        script.setAttribute('src', url);
        script.setAttribute('id', 'jsonp_script');
        document.body.appendChild(script);

        return script;
    }
}


//}());