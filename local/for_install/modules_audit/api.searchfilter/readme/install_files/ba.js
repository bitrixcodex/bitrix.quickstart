(function(e){var t=2;var n=(document.location.protocol=="https:"?"https://":"http://")+"bitrix.info/bx_stat";var o={host:null,aid:null};var r=u(o);var a=v();var i=l();e._baq=e._baq||{};e._baq.setResponse=function(e){var t=h("BX_USER_ID");if(t==undefined&&!!e.uid){var n=new Date((new Date).getTime()+1e3*3600*24*365*10);document.cookie="BX_USER_ID="+e.uid+"; path=/; expires="+n.toUTCString()}};if(p()){if(a.domContentLoadedEventStart>0){c()}else if(document.addEventListener){document.addEventListener("DOMContentLoaded",c,false)}}function c(){if("withCredentials"in i){s()}else{d()}}function d(){var e=document.createElement("script");e.type="text/javascript";e.async=true;e.src=n+"?"+f();var t=document.getElementsByTagName("script")[0];t.parentNode.insertBefore(e,t)}function s(){i.open("POST",n,true);i.setRequestHeader("Content-Type","application/x-www-form-urlencoded");i.withCredentials=true;i.onreadystatechange=function(){if(i.readyState==4&&i.status==200){var t=JSON.parse(this.responseText);e._baq.setResponse(t)}};i.send(f())}function u(t){if(!e._ba){return""}var n="";for(var o=0;o<e._ba.length;o++){var r=e._ba[o];if(typeof t[r[0]]!=="undefined"){t[r[0]]=r[1]}else if(typeof r[1]==="function"){n+="&"+r[0]+"="+encodeURIComponent(r[1]())}else{n+="&"+r[0]+"="+encodeURIComponent(r[1])}}return n}function f(){var n=a.navigationStart;return"d="+encodeURIComponent(e.location.host)+"&ru="+encodeURIComponent(e.location.pathname)+"&dns="+(a.domainLookupEnd-a.domainLookupStart)+"&tcp="+(a.connectEnd-a.connectStart)+"&srt="+(a.responseStart-a.requestStart)+"&pdt="+(a.responseEnd-a.responseStart)+"&rrt="+(a.fetchStart-n)+"&dit="+(a.domInteractive-n)+"&clt="+(a.domContentLoadedEventStart-n)+"&sr="+e.screen.width+"x"+e.screen.height+"&prc="+(a.domInteractive-a.domLoading)+"&com="+(e.frameRequestStart?"1":"0")+"&tmz="+(new Date).getTimezoneOffset()+"&xts="+(new Date).getTime()+"&ver="+t+"&aid="+encodeURIComponent(o.aid)+r}function p(){return i&&a&&m(o.host)&&o.aid!==null&&!(e.BX&&e.BX.admin)}function m(t){if(t===null||e.location.host===t){return true}var n=e.document.createElement("a");n.href="//"+t;return e.location.host===n.host||t===n.host}function l(){if(e.XMLHttpRequest){return new XMLHttpRequest}else if(e.ActiveXObject){return new e.ActiveXObject("Microsoft.XMLHTTP")}return null}function v(){if(e.performance&&e.performance.timing){return e.performance.timing}return null}function h(e){var t=document.cookie.match(new RegExp("(?:^|; )"+e.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g,"\\$1")+"=([^;]*)"));return t?decodeURIComponent(t[1]):undefined}})(window);