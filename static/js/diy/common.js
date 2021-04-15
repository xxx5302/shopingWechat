function closeBox(obj) {
    var elem = $(obj).parents(".template-edit-title").next();
    if ($(elem).hasClass("layui-hide")) {
        $(elem).removeClass("layui-hide");
        $(obj).removeClass("closed-right");
    } else {
        $(elem).addClass("layui-hide");
        $(obj).addClass("closed-right");
    }
}

function get_math_rant(len) {
    return Number(Math.random().toString().substr(3, len) + Date.now()).toString(36);
}
