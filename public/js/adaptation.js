adaptation(750);
//适配
function adaptation(size) {
    if (document.documentElement.clientWidth > size) {
        document.documentElement.style.fontSize = size / 7.5 + 'px';		//px转rem比例是100， 实际()px/100=()rem.例如：宽300px,就是3rem
    } else {
        document.documentElement.style.fontSize = document.documentElement.clientWidth / 7.5 + 'px';
    }
}
//当调整浏览器窗口的大小时，发生 resize 事件
window.onresize = function () {
    adaptation(750);
}
// 百度推送
/*
(function(){
    var bp = document.createElement('script');
    var curProtocol = window.location.protocol.split(':')[0];
    if (curProtocol === 'https') {
        bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
    }
    else {
        bp.src = 'http://push.zhanzhang.baidu.com/push.js';
    }
    var s = document.getElementsByTagName("script")[0];
    s.parentNode.insertBefore(bp, s);
})();*/
