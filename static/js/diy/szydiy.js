//最外层组件
var ncommonComponentHtml = '<div>';

ncommonComponentHtml += '<slot name="content"></slot>';
ncommonComponentHtml += '</div>';

var commonComponent = {
    props: ["data"],
    template: ncommonComponentHtml,
    created: function () {
        console.log(2);
    }
};

//cm-construct

var vue = new Vue({

    el: "#modify-view",

    data: {
        //当前编辑的组件位置
        currentIndex: -99,
        changeIndex: -1,
        isAdd: false,
        globalLazyLoad: false,//全局设置是为了页面设置这个独特组件
        //全局属性
        global: {
            title: "页面名称",
            bgColor: "#ffffff",
            topNavColor: "#ffffff",
            topNavbg:false,
            textNavColor: "#333333",
            topNavImg:"",
            moreLink:{},
            //是否显示底部导航标识
            openBottomNav: false,
            navStyle:1,
            textImgStyleLink:'1',
            textImgPosLink:'left',
            mpCollect:false,
            bgUrl:'',
            // 弹框形式，不弹出 -1，首次弹出 1，每次弹出 0
            popWindow: {
                imageUrl: "",
                count: -1,
                link: {},
                imgWidth: '',
                imgHeight: ''
            },
        },
        textImgPositionList:[
            {
                text: "居左",
                value: "left",
                src: "/static/images/diy/nav/text_left.png",
                selectedSrc: "/static/images/diy/nav/text_left_hover.png"
            },
            {
                text: "居中",
                value: "center",
                src: "/static/images/diy/nav/text_right.png",
                selectedSrc: "/static/images/diy/nav/text_right_hover.png"
            }
        ],
        //组件列表存储数组
        demo:{
            "text" :{ title : "『文本』", textColor : "#333333", "defaultTextColor": "#333333", "alignStyle": "center", subTitle : "副标题", "marginTop": 0, "padding": 0, backgroundColor : "", "link" : {}, "fontSize" : 16, "fontSizeSub" : 14, "colorSub": "#999", "defaultColorSub": "#999", "style": 1, "sub": 0, "styleName": "模板一", "isShowMore": 0, "fontWeight": 600, "moreText": "查看更多", "moreLink" : {}, "btnColor": "#999", "defaultBtnColor": "#999" , type : "text",  title : "文本", max_count : 0, addon_name : "", controller : "text", is_delete : "0" },
            "notice":{ "sources": "default","backgroundColor": "", "marginTop": 0, "style": 1, "isEdit": 1, "styleName": "风格一", "textColor": "#333333", "defaultTextColor": "#333333", "fontSize": 14,"list": [{"title": "公告","link": {}}], "noticeIds": [], type : "notice", title : "公告", max_count : 0, addon_name : "", controller : "notice", is_delete : "0" },
            "popadv":{type : "popadv", title : "弹出广告", max_count : 1, addon_name : "", controller : "popadv", is_delete : "0"}
        },
        data:[]
    },
    components: {
        'cm-construct': commonComponent,//剥离当前data. 循环时这么处理佳
    },
    methods:{
        addSzyComponent:function(obj)
        {
            //1、检测是否添加到最大数量
            if (obj && !this.checkComponentIsAdd(obj.type, obj.max_count)) {
                this.autoSelected(obj.type);//自动选中这个元素
                return;
            }

            this.data.push(obj);
            //选中最后一个对象作为当前索引
            if(obj)
            {
                this.currentIndex = this.data.length - 1;
                console.log( this.currentIndex );
            }
            this.isAdd = true;


            this.refreshSort();

            var self = this;

            $(".edit-attribute-placeholder").show();
            setTimeout(function () {
                $(".edit-attribute-placeholder").hide();
                if(obj.controller == "FloatBtn"){
                }else{
                    if (self.changeIndex == -1 || (self.changeIndex != self.currentIndex)) {
                        $(".preview-div .preview-screen .view-wrap").scrollTop($(".screen_center").height());
                    }
                }

            },60);

        },
        checkComponentIsAdd: function (type, max_count) {
            //判断添加数量是否最大
            //max_count为0时不处理
            if (max_count == 0) return true;

            var count = 0;

            //遍历已添加的自定义组件，检测是否超出数量
            for (var i in this.data) if (this.data[i].type == type) count++;

            if (count >= max_count) return false;
            else
                return true;
        },
        //改变当前编辑的组件选中
        changeCurrentIndex: function (sort) {
            this.currentIndex = parseInt(sort);
            this.changeIndex = this.currentIndex;
            this.isAdd = false;
            this.refreshSort();
        },
        autoSelected(type){
            //选中这个类型的对象
            for (var i in this.data) {
                if (this.data[i].type == type) {
                    this.changeCurrentIndex(this.data[i].index);
                    var element = $('.preview-box .preview-div [data-index="'+ this.data[i].index +'"]'),
                        warp = $(".preview-box .preview-div .preview-screen"),
                        warpTop = warp.offset().top,
                        warpBottom = warpTop + warp.height(),
                        elementTop = element.offset().top,
                        elementBottom = elementTop + element.height(),
                        scrollTop = $(".preview-box .preview-div .preview-screen").scrollTop();

                    if (elementBottom > warpBottom) {
                        scrollTop += (elementBottom - warpBottom) + 2;
                    } else if (warpTop > elementTop) {
                        scrollTop -= (warpTop - elementTop);
                    }
                    $(".preview-box .preview-div .preview-screen").animate({ scrollTop: scrollTop }, 300);
                    return;
                }
            }
        },
        refreshSort:function(){
            var self = this;

            setTimeout(function () {

                $(".draggable-element").each(function (i) {
                    $(this).attr("data-sort", i);
                });

                for (var i = 0; i < self.data.length; i++) {
                    self.data[i].index = $(".draggable-element[data-index=" + i + "]").attr("data-index");
                    self.data[i].sort = $(".draggable-element[data-index=" + i + "]").attr("data-sort");
                }

                self.data.push({});
                self.data.pop();

                //如果当前编辑的组件不存在了，则选中最后一个
                if (parseInt(self.currentIndex) >= self.data.length) self.currentIndex--;

                $(".draggable-element[data-index=" + self.currentIndex + "] .edit-attribute .attr-wrap").css("height", ($(window).height() - 214) + "px");

                if (self.isAdd && self.changeIndex > -1 && (self.changeIndex != self.currentIndex) && self.changeIndex < (self.data.length - 1)) {
                    var curr = $(".draggable-element[data-index=" + self.changeIndex + "]");
                    var last = $(".draggable-element[data-index=" + (self.data.length - 1) + "]");

                    curr.after(last);
                    self.changeIndex = self.currentIndex;
                }

                // 显示插件添加的数量，防止一进入看到代码
                $(".js-component-add-count").show();

            }, 50);
        }
    }
})

$(function(){
    $('.screen_center').DDSort({

        //拖拽数据源
        target: '.draggable-element',

        //拖拽时显示的样式
        floatStyle: {
            'border': '1px solid #FF6A00',
            'background-color': '#ffffff'
        },

        //设置可拖拽区域
        draggableArea: "preview-draggable",

        //拖拽中，隐藏右侧编辑属性栏
        move: function (index) {
            if ($(".draggable-element[data-index='" + index + "'] .edit-attribute").attr("data-have-edit") == 1)
                $(".draggable-element[data-index='" + index + "'] .edit-attribute").hide();
        },

        //拖拽结束后，选择当前拖拽，并且显示右侧编辑属性栏，刷新数据
        up: function (index) {
            if ($(".draggable-element[data-index='" + index + "'] .edit-attribute").attr("data-have-edit") == 1) {
                vue.currentIndex = index;
                $(".draggable-element[data-index='" + index + "'] .edit-attribute").show();
            }
            vue.refreshSort();
        }
    });
})