// 文字大小
var textFontSizeHtml = '<div class="layui-form-item ns-icon-radio">';
textFontSizeHtml +=	 '<label class="layui-form-label sm">{{data.label}}</label>';
textFontSizeHtml +=	 '<div class="layui-input-block">';
textFontSizeHtml +=		 '<template v-for="(item, index) in list" v-bind:k="index">';
textFontSizeHtml +=			 '<span :class="[item.value == parent[data.field] ? \'\' : \'layui-hide\']">{{item.value}}px</span>';
textFontSizeHtml +=		 '</template>';
textFontSizeHtml +=		 '<ul class="ns-icon">';
textFontSizeHtml +=			 '<li v-for="(item, index) in list" v-bind:k="index" :class="[item.value == parent[data.field] ? \'ns-text-color ns-border-color ns-bg-color-diaphaneity\' : \'\']" :title="item.value + \'px\'" @click="parent[data.field] = item.value">';
textFontSizeHtml +=				 '<img v-if="item.value == parent[data.field]" :src="item.selectedSrc" />'
textFontSizeHtml +=				 '<img v-else :src="item.src" />'
textFontSizeHtml +=			 '</li>';
textFontSizeHtml +=		 '</ul>';
textFontSizeHtml +=	 '</div>';
textFontSizeHtml += '</div>';

Vue.component("text-font-size", {
    template: textFontSizeHtml,
    props: {
        data: {
            type: Object,
            default: function () {
                return {
                    field: "fontSize",
                    label: "文字大小",
                    max: 16
                };
            }
        }
    },
    data: function () {
        return {
            list: [],
            parent: this.$parent.data,
        };
    },
    created: function () {
        if (this.data.label == undefined) this.data.label = "文字大小";
        if (this.data.field == undefined) this.data.field = "fontSize";
        if (this.data.max == undefined) this.data.max = "16";

        if (this.data.max == 12) {
            this.list = [{label: "小", value: "12", src:  "/static/images/diy/text/font_12.png", selectedSrc:  "/static/images/diy/text/font_12_1.png"}];
        } else if (this.data.max == 14) {
            this.list = [
                {label: "小", value: "12", src: "/static/images/diy/text/font_12.png", selectedSrc:  "/static/images/diy/text/font_12_1.png"},
                {label: "中", value: "14", src:  "/static/images/diy/text/font_14.png", selectedSrc: "/static/images/diy/text/font_14_1.png"}
            ]
        } else {
            this.list = [
                {label: "小", value: "12", src:  "/static/images/diy/text/font_12.png", selectedSrc:  "/static/images/diy/text/font_12_1.png"},
                {label: "中", value: "14", src: "/static/images/diy/text/font_14.png", selectedSrc:  "/static/images/diy/text/font_14_1.png"},
                {label: "大", value: "16", src:  "/static/images/diy/text/font_16.png", selectedSrc: "/static/images/diy/text/font_16_1.png"}
            ];
        }
        console.log( this.$parent );
    },
    watch: {
        data: function (val, oldVal) {
            if (val.field == undefined) val.field = oldVal.field;
            if (val.label == undefined) val.label = "文字大小";
            if (val.max == undefined) val.max = "16";
        },
    }
});


//[颜色]属性组件
var colorHtml = '<div class="layui-form-item flex">';
colorHtml += 	'<div class="flex_left">';
colorHtml += 		'<label class="layui-form-label sm">{{d.label}}</label>';
colorHtml += 		'<div class="curr_color">{{parent[d.field]}}</div>';
colorHtml += 	'</div>';
colorHtml += 	'<div class="layui-input-block flex_fill">';
colorHtml += 		'<span class="color-selector-reset" v-on:click="reset()">重置</span>';
colorHtml += 		'<div v-bind:id="class_name" class="picker colorSelector"><div v-bind:style="{ background : parent[d.field] }"></div></div>';
// colorHtml += '<div v-bind:id="class_name" v-bind:class="class_name" class="colorSelector"><div v-bind:style="{ background : parent[d.field] }"></div></div>';
colorHtml += 	'</div>';
colorHtml += '</div>';

/**
 * 颜色组件：
 * 参数说明：
 * data：{ field : 字段名, value : 值(默认:#333333), 'label' : 文本标签(默认:文字颜色) }
 */
Vue.component("color", {
    props: {
        data: {
            type: Object,
            default: function () {
                return {
                    field: "textColor",
                    label: "文字颜色",
                    defaultcolor: ""
                };
            }
        },
    },

    data: function () {
        return {
            d: this.data,
            class_name: "",
            parent: (Object.keys(this.$parent.data).length) ? this.$parent.data : this.$parent.global,
        };
    },
    created: function () {
        this.bindColor();
    },
    watch:{
    },
    methods: {
        init:function(){

            if (this.data.field == undefined) this.data.field = "textColor";
            if (this.data.label == undefined) this.data.label = "文字颜色";
            if (this.data.value == undefined) this.data.value = "#333333";
            if (this.data.defaultcolor == undefined) this.data.defaultcolor = "";
            if (this.data.defaultvalue == undefined) this.data.defaultvalue = "";

            if(this.data.global == 1) this.parent = this.$parent.global;

            if (this.parent[this.data.field] == undefined) this.$set(this.parent, this.data.field, this.data.value);
            else this.data.value = this.parent[this.data.field];
            this.parent[this.data.field] = this.data.value;

            this.d = this.data;
        },
        reset: function () {
            try {
                if(this.data.global == 1) this.parent = this.$parent.global;
                this.parent[this.d.field] = this.d.defaultcolor;
            } catch (e) {
                console.log("color reset() ERROR:" + e.message);
            }
        },
        bindColor() {
            this.init();
            this.class_name = "colorSelector_" + (this.data.field ? this.data.field : "textColor") + get_math_rant(10);
            var class_name = "." + this.class_name;
            var $self = this;

            setColorPicker($self.data.value, this.class_name, function (hex) {
                try {
                    if(hex) {
                        $self.parent[$self.d.field] = hex;
                    } else {
                        $self.parent[$self.d.field] = "";
                    }
                } catch (e) {
                    console.log("color ERROR:" + e.message);
                }
            });
        },
        refreshData(){
            // 刷新parent、data
            // console.log("this.parent",this.parent);
            if(this.parent.controller && this.parent.controller != vue.data[vue.currentIndex].controller){
                // 数据发送变动
                this.parent = vue.data[vue.currentIndex];
                this.init();
                // console.log("数据发送变动",this.d);
            }
            return this.parent;
        }
    },

    template: colorHtml
});

/**
 * 生成颜色选择器
 * @param defaultColor
 * @param obj
 * @param callBack
 */
function setColorPicker(defaultColor, name, callBack) {

    setTimeout(function () {
        var obj = document.getElementById("picker");
        var a = Colorpicker.create({
            el: name,
            color: defaultColor,
            change: function (elem, hex) {
                $(elem).find("div").css('background', hex);
                if (callBack) callBack(hex);
            }
        });
        if(defaultColor) $("#" + name).find("div").css('background', defaultColor);

    }, 500);
}


//[图片上传]组件
var imageSecHtml = '<div  v-show="condition" class="img-block layui-form ns-text-color" :id="id" v-bind:class="{ \'has-choose-image\' : (myData.data[myData.field]) }">';
imageSecHtml += '<div>';
imageSecHtml += '<template v-if="myData.data[myData.field]">';
imageSecHtml += '<img v-bind:src="changeImgUrl(myData.data[myData.field])" onclick="showImageDialog(this);" />';
imageSecHtml += '<span>更换图片</span>';
imageSecHtml += '<i class="del" v-on:click.stop="del()" data-disabled="1" v-if = "isShow == true">x</i>';
imageSecHtml += '</template>';

imageSecHtml += '<template v-else>';
imageSecHtml += '<img src="/resource/images/nopic.jpg" onclick="showImageDialog(this);" />';
imageSecHtml += '<i class="del" v-on:click.stop="del()" data-disabled="1">x</i>';
// imageSecHtml += '<span v-if="myData.text">{{myData.text}}</span>';
imageSecHtml += '</template>';

imageSecHtml += '</div>';
imageSecHtml += '</div>';

/**
 * 图片上传
 * 参数说明：
 * data：{ field : 字段名, value : 值(默认:14), 'label' : 文本标签(默认:文字大小) }
 */
Vue.component("img-sec-upload", {

    template: imageSecHtml,
    props: {
        data: {
            type: Object,
            default: function () {
                return {
                    data: {},
                    field: "imageUrl",
                    callback: null,
                    text: "添加图片"
                };
            }
        },
        condition: {
            type: Boolean,
            default: true
        },
        currIndex: {
            type: Number,
            default: 0
        },
        isShow:{
            type: Boolean,
            default: true
        }
    },
    data: function () {
        return {
            myData: this.data,
            upload : null,
            id : get_math_rant(10),
            // parent: (Object.keys(this.$parent.data).length) ? this.$parent.data : this.data,
        };
    },
    watch: {
        data: function (val, oldVal) {
            if (val.field == undefined) val.field = oldVal.field;
            if (val.text == undefined) val.text = "添加图片";

            this.myData = val;
        }
    },
    created: function () {

        if (this.data.field == undefined) this.data.field = "imageUrl";
        if (this.data.data[this.data.field] == undefined) this.$set(this.data.data, this.data.field, "");
        if (this.data.text == undefined) this.data.text = "添加图片";

        this.id = get_math_rant(10);



    },
    methods: {
        del: function () {
            // console.log(this.$parent.list)
            // this.$parent.list.splice(this.currIndex,1)
            this.data.data[this.data.field] = "";
        },

        //转换图片路径
        changeImgUrl: function (url) {
            if (url == null || url == "") return '';
            else return ns.img(url);
        },
        uploadImg: function() {
            var self = this;
            if (post == 'store') post += '://store';
            if (post != 'store://store') {
                openAlbum(function (obj) {
                    for (var i = 0; i < obj.length; i++) {
                        self.data.data[self.data.field] = obj[i].pic_path;
                        self.data.data.imgWidth = obj[i].pic_spec.split("*")[0];
                        self.data.data.imgHeight = obj[i].pic_spec.split("*")[1];
                    }
                }, 1);
            }
            /* openAlbum(function (data) {
                for (var i = 0; i < data.length; i++) {
                    self.data.data[self.data.field] = data[i].pic_path;
                }
            }, 1); */
        }
    }
});