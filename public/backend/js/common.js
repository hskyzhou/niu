(function($, win) {
    if (typeof $ == "undefined") return false;

    //动态Modal 隐藏后设空
    var layerIndex = 0;
    $(document).on('hidden.bs.modal', '#php-ajax-modal,#php-ajax-modal-small,#php-ajax-modal-next', function() {
        $(this).find('.modal-content').html("");
    }).on('show.bs.modal', '#php-ajax-modal,#php-ajax-modal-small,#php-ajax-modal-next', function() {
        layerIndex = layer.load();
    }).on('shown.bs.modal', '#php-ajax-modal,#php-ajax-modal-small,#php-ajax-modal-next', function() {
        layer.close(layerIndex);
    }).on('show.bs.modal', '#php-ajax-modal,#php-ajax-modal-small,#php-ajax-modal-next', function() {
        var zIndex = 10050 + (10 * $('.modal:visible').length);
        $(this).css('z-index', zIndex);
    });
    //静态Modal 重置form
    $(document).on('hidden.bs.modal', '#local-modal,.local-modal', function() {
        var form = $(this).find('form');
        //每次操作结束后都将 modal 重置为新增状态
        $(this).find('input[name=modal_type]').val("create");

        if (form.length > 0) {
            form.find('input:not([type=radio]):not([type=checkbox]),select,textarea').val('');
            form.find('input[type=radio],input[type=checkbox]').removeAttr('checked');
        }
    }).on('show.bs.modal', '#local-modal,.local-modal', function() {
        var zIndex = 10050 + (10 * $('.modal:visible').length);
        var form = $(this).find('form');

        // if(form.length > 0){
        //     form.find("[data-event]").each(function(){
        //         var name = $(this).attr('data-event');
        //         $(this).trigger(name);
        //     })
        // }
        $(this).css('z-index', zIndex);
    });

    // 系统配置
    var config = {
        dictURL: '/admin/dictionaries/hasmanydictionaries' //获取字典下拉数据
            ,
        fileUploadURL: '/admin/attachment/upload' //文件上传接口
            ,
        fileSWFURL: '/vendor/webuploader-0.1.5/Uploader.swf' // 上传插件需要的 swf 文件
            ,
        pinyinURL: '/admin/common/firstcapital' // 中文转拼音
        ,
        javaURL: '/transfer' //调用Java接口
    };
    // 数据缓存
    var cache = {

    };

    // 系统方法
    var pv = {
        //
        jump_blank: function(url){
            var el = $('#jump_blank');
            if(el.length > 0){
                el.attr('href',url).trigger('click')[0].click();
            }else{
                $('<a href="'+url+'" target="_blank" style="display:none;" id="jump_blank"></a>').appendTo($('body')).trigger('click')[0].click();
            }
        },
        logo: function(){
            console.lot(this);
        },
        /**
         * 初始化系统全局方法
         * @return {[type]} [description]
         */
        init: function() {
            pv.rendre.renderDict();
            pv.rendre.laydate();
            pv.rendre.YMD();

            pv.tooltip();
            pv.tableAction($('table.table'));
            pv.modal();
        },
        /**
         * 公共的 ajax 请求
         * @param  {[type]}   opts     ajax 请求配置参数
         * @param  {[type]}   loading  是否请求显示 loading 状态，默认为 true
         * @return {[type]}            [description]
         */
        ajax: function(opts, loading) {
            var loading = loading === false ? false  : true;
            var index = null;
            var opts_def = {};
            var def = {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name=_token]').attr('content')
                }
            }

            if (loading)(typeof layer != "undefined") && (index = layer.load());

            opts_def = $.extend({}, def, opts, true);

            $.ajax(opts_def).always(function(resp, status, xhr) {
                if (index != null) layer && layer.close(index);
                switch (xhr.status) {
                    case 401:
                        layer.msg("授权认证失败！");
                        location.href.reload();
                        break;
                    case 422:
                        layer.msg("部分数据校验失败！");
                        break;
                    case 500:
                        layer.msg("服务器错误，请联系管理员！");
                        break;
                }
            });
        },
        /**
         * [fixedTime description]
         * @param  {[type]} num [description]
         * @param  {[type]} len [description]
         * @return {[type]}     [description]
         */
        fixedTime: function(num,len){
            var l = len - num.toString().length;
            if(l <0) return num;
            return "000000".slice(0, l) + num;
        },
        /**
         * 生成 UUID
         * @param  {[type]} len   UUID 长度
         * @param  {[type]} radix UUID 基数
         * @return {[type]}       [description]
         */
        uuid: function(len, radix) {
            var chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'.split('');
            var uuid = [],
                i;
            radix = radix || chars.length;

            if (len) {
                // Compact form
                for (i = 0; i < len; i++) uuid[i] = chars[0 | Math.random() * radix];
            } else {
                // rfc4122, version 4 form
                var r;

                // rfc4122 requires these characters
                uuid[8] = uuid[13] = uuid[18] = uuid[23] = '-';
                uuid[14] = '4';

                // Fill in random data.  At i==19 set the high bits of clock sequence as
                // per rfc4122, sec. 4.1.5
                for (i = 0; i < 36; i++) {
                    if (!uuid[i]) {
                        r = 0 | Math.random() * 16;
                        uuid[i] = chars[(i == 19) ? (r & 0x3) | 0x8 : r];
                    }
                }
            }
            return uuid.join('');
        },
        /**
         * 拼音获取
         * @param  {[type]}   word     [description]
         * @param  {Function} callback [description]
         * @return {[type]}            [description]
         */
        pinyinFn: function(word, callback){
            var word = word || "";
            if(word.length <=0) return false;

            sJs.ajax({
                url: config.pinyinURL + '?word=' + word,
                type: 'get',
                success: function(resp){
                    if(resp.result){
                        callback && callback(resp);
                    }
                }
            })
        },
        /**
         * 百度模版引擎
         * @return {[type]} [description]
         */
        bt: function() {
            if (typeof baidu !== "undefined") {
                return baidu.template;
            }
            console.log("模版引擎加载失败！");
            return false;
        },
        /**
         * 获取光标位置
         * @param  {[type]} el Element 不是 jQuery 对象
         * @return {[type]}      [description]
         */
        getCursortPosition: function(el) {
            var CaretPos = 0; // IE Support
            if (document.selection) {
                el.focus();
                var Sel = document.selection.createRange();
                Sel.moveStart('character', -el.value.length);
                CaretPos = Sel.text.length;
            }
            // Firefox support
            else if (el.selectionStart || el.selectionStart == '0')
                CaretPos = el.selectionStart;
            return (CaretPos);
        },
        /**
         * 设置光标位置 (默认定位到最后)
         * @param {[type]} el Element 不是 jQuery 对象
         * @param {[type]} pos  需要定位到的位置
         */
        setCaretPosition: function(el, pos) {
            if (typeof pos == "undefined") {
                var pos = $(el).val().trim().length;
            }
            if (el.setSelectionRange) {
                el.focus();
                el.setSelectionRange(pos, pos);
            } else if (el.createTextRange) {
                var range = el.createTextRange();
                range.collapse(true);
                range.moveEnd('character', pos);
                range.moveStart('character', pos);
                range.select();
            }
        },
        /**
         * form 表单获取数据，但是不包含 table 中的数据点
         * @param  {elements}  form     表单form
         * @param  {Boolean} hasTable 是否包含form ,默认不包含
         * @return {[type]}           [description]
         */
        serializeArray: function(form, hasTable) {
            var basicInput = 'input:not(disabled),select:not(disabled),textarea:not(disabled)';
            var hasTable = hasTable || false;
            var formArr = [];
            var checkbox = {}; // 缓存 checkbox 选项，方便后期拼接.jion(',');

            var push = function(obj) {
                obj.push({
                    name: this.name,
                    value: $(this).val() || ""
                })
            }

            if (!hasTable) {
                //不包含table内的数据
                form.find(basicInput).each(function() {
                    var that = $(this);
                    var type = that.attr('type');

                    //table 内的数据过滤掉
                    if (that.parents('tr').attr('data-uuid')) return;
                    if (this.name == "" || this.name == undefined) return;
                    if (that.attr('disabled') == "disabled" || that.attr('disabled') == true) return;

                    if (type == "radio" || type == "checkbox") {
                        if (that.is(':checked')) {
                            if (checkbox[this.name] == undefined) {
                                checkbox[this.name] = [];
                                checkbox[this.name].push(that.val());
                            } else {
                                checkbox[this.name].push(that.val());
                            }
                        }
                    } else {
                        push.call(this, formArr);
                    }
                });
                for (var i in checkbox) {
                    formArr.push({
                        name: i,
                        value: checkbox[i].join(',')
                    })
                }
            } else {
                //只有table内的数据
                form.find('table:not(.notable)').each(function(index) {
                    var t = $(this);
                    if (t.parent().attr('type')) return;
                    var table_alias = t.attr('data-alias');

                    var trArr = {
                        "table_id": table_alias,
                        "values": []
                    };
                    t.find('tr[data-uuid]').each(function() {
                        var tr = $(this);
                        var uuid = tr.index();

                        var checkbox = {};
                        var trObj = {};

                        tr.find(basicInput).each(function() {
                            var that = $(this);
                            var type = that.attr('type');

                            if (this.name == "" || this.name == undefined) return;
                            if (that.attr('disabled') == "disabled" || that.attr('disabled') == true) return;

                            if (type == "radio" || type == "checkbox") {
                                if (that.is(':checked')) {
                                    if (checkbox[this.name] == undefined) {
                                        checkbox[this.name] = [];
                                        checkbox[this.name].push(that.val());
                                    } else {
                                        checkbox[this.name].push(that.val());
                                    }
                                }
                            } else {
                                trObj[this.name] = that.val();
                            }
                        });
                        for (var i in checkbox) {
                            trObj[i] = checkbox[i].join(',');
                        }
                        trArr.values.push(trObj);
                    });
                    formArr.push(trArr);
                });
            }
            return formArr;
        },
        /**
         * serializeArray 转 Object
         * @param  {[type]} f   object
         * @param  {[type]} arr serializeArray 结果集
         * @return {[type]}     [description]
         */
        mergeObj: function(f, arr) {
            var arr = arr || [];
            $.each(arr, function(index, item) {
                f[item.name] = item.value;
            });
        },
        /**
         * [checkPlugin description]
         * @param  {[type]} plugin [description]
         * @return {[type]}        [description]
         */
        checkPlugin: function(plugin) {
            if (plugin === undefined) {
                log("插件没有加载");
                return false;
            }
            return true;
        },
        /**
         * validform 校验 form 表单
         * @param  {[type]} form [description]
         * @param  {[type]} opts [description]
         * @return {[type]}      [description]
         */
        validForm: function(form, opts) {
            if (!sJs.checkPlugin($.fn.Validform)) return false;
            var default_opt = {
                tiptype: function(msg, o, cssctl) {
                    var q_el = o.obj,
                        nodeName = o.obj[0].nodeName.toLocaleLowerCase(),
                        type = o.type,
                        form = o.curform;

                    if (type == 3) {
                        //验证失败
                        switch (nodeName) {
                            case 'input':
                                var _t = q_el.attr("type");
                                if (_t == 'radio') {
                                    q_el.closest('.radio-list').length > 0 ?
                                        q_el.closest('.radio-list').addClass('Validform_error') :
                                        q_el.parent().addClass('Validform_error');
                                } else if (_t == "checkbox") {
                                    q_el.closest('.checkbox-list').length > 0 ?
                                        q_el.closest('.checkbox-list').addClass('Validform_error') :
                                        q_el.parent().addClass('Validform_error');
                                } else {
                                    q_el.addClass('Validform_error');
                                }
                                break;
                            case 'select':
                                q_el.addClass('Validform_error');
                                console.log(q_el,q_el.next());
                                q_el.next('.select2').addClass('Validform_error');
                                break;
                            default:
                                q_el.addClass('Validform_error');
                                break;
                        }
                    } else if (type = 2) {
                        //验证成功
                        switch (nodeName) {
                            case 'input':
                                var _t = q_el.attr("type");
                                if (_t == 'radio') {
                                    q_el.closest('.radio-list').length > 0 ?
                                        q_el.closest('.radio-list').removeClass('Validform_error') :
                                        q_el.parent().removeClass('Validform_error');
                                } else if (_t == "checkbox") {
                                    q_el.closest('.checkbox-list').length > 0 ?
                                        q_el.closest('.checkbox-list').removeClass('Validform_error') :
                                        q_el.parent().removeClass('Validform_error');
                                } else {
                                    q_el.removeClass('Validform_error');
                                }
                                break;
                            case 'select':
                                q_el.removeClass('Validform_error');
                                q_el.next('.select2').removeClass('Validform_error');
                                break;
                            default:
                                q_el.removeClass('Validform_error');
                                break;
                        }
                    }
                },
                ignoreHidden: true //忽略input hidden的验证
                    ,
                showAllError: true
            };
            var opt = $.extend({}, default_opt, (opts || {}));
            return form.Validform(opt);
        },
        /**
         * 缓存数据
         * @type {Object}
         */
        caches: {
            // jsTree 数据
            jsTreeData: {

            },
            dictData:{

            }
        },
        /**
         * 页面 dom 常用公共事件监听
         * @type {Object}
         */
        events: {
            /**
             * switch 切换插件
             * @param  {[type]} el [description]
             * @return {[type]}    [description]
             */
            switchUI: function(el,callback){
                if($.fn.bootstrapSwitch == undefined) return false;
                var index = 0;
                var el = el || $(document);
                
                setTimeout(function(){
                    $(document).find('input.make-switch').trigger('switchChange.bootstrapSwitch')
                },2500);

                el.find('input.make-switch').each(function(){
                    index ++;
                    var that = $(this);

                    if(that.attr('key-switch') == "" || that.attr('key-switch') == undefined){
                        that.attr('key-switch',index);

                        that.bootstrapSwitch({
                            // onText:'修改'
                        });
                        that.parents('.form-group').parent().find('input,select,textarea').attr({
                            'readonly': true
                        }).css('pointer-events','none');
                        that.parents('.table-toolbar').parent().find('.CRUD-Table .table-tr-buttons').attr({
                                    'readonly': true
                                }).css({'pointer-events':'none', 'background-color': '#f2f2f2' });

                        that.on('switchChange.bootstrapSwitch', function(){
                            var checkbox = $(this);
                            var p = checkbox.parents('.form-group').parent().find('input,select,textarea');
                            var pp = checkbox.parents('.table-toolbar').parent().find('.CRUD-Table .table-tr-buttons');
                            var ppp = checkbox.parents('.form-group').parent().find('.select2-selection');

                            if(checkbox.is(':checked')){
                                p.attr({
                                    'readonly': false
                                }).css('pointer-events','all');
                                pp.attr({
                                    'readonly': false
                                }).css({'pointer-events':'all', 'background-color': 'inherit' });
                                ppp.attr({
                                    'readonly': false
                                }).css({'pointer-events':'all', 'background-color': 'inherit' });
                            }else{
                                p.attr({
                                    'readonly': true
                                }).css('pointer-events','none');
                                pp.attr({
                                    'readonly': true
                                }).css({'pointer-events':'none', 'background-color': '#f2f2f2' });
                                ppp.attr({
                                    'readonly': true
                                }).css({'pointer-events':'none', 'background-color': '#f2f2f2' });
                            }
                            callback && callback.apply(this, arguments);
                        })
                    }
                })

            },
            /**
             * 报告详情中的 table 中按钮操作
             * @param  {Element} el table 元素 
             * @return {[type]}    [description]
             */
            tabTableEvent: function(el) {
                var bt = sJs.bt();
                if (el == undefined || el.length <= 0) return false;
                /**
                 * 事件触发
                 * @param  {[type]} tr_tpl [description]
                 * @return {[type]}        [description]
                 */
                var triggerFn = function(tr_tpl){
                    if(tr_tpl == "the_drug-table_tr"){
                            $('table[data-tr-tpl=the_drug-table_tr]:visible').trigger('table.tb.change');
                        }
                }
                /**
                 * 新增Tr
                 * @param  {[type]} tr_tpl  模版ID
                 * @param  {[type]} riTable 对应table
                 * @param  {[type]} data    [description]
                 * @return {[type]}         [description]
                 */
                var rendreTableTr = function(tr_tpl, riTable, data) {
                    if (tr_tpl == "") {
                        console.log("新增 table 行模版未找到！");
                        return false;
                    }
                    if (!bt) return false;

                    data.uuid = sJs.uuid(10);
                    var buff = bt(tr_tpl, data || {});
                    if(riTable.is(':hidden')){
                        var alias = riTable.attr('data-alias');
                        var buff_el = $(buff).appendTo($('form:visible table[data-alias='+alias+']').find('tbody'));
                    }else{
                        var buff_el = $(buff).appendTo(riTable.find('tbody'));
                    }
                    sJs.tooltip(buff_el);
                }
                /**
                 * 更新Tr
                 * @param  {[type]} riTable table
                 * @param  {[type]} data    数据
                 * @param  {[type]} uuid    uuid
                 * @return {[type]}         [description]
                 */
                var updateTableTr = function(riTable, data, uuid) {
                    if(riTable.is(':hidden')){
                        var alias = riTable.attr('data-alias');
                        riTable = $('form:visible table[data-alias='+alias+']');
                    }
                    var tr = $('tr[data-uuid="' + uuid + '"]', riTable);

                    if (tr.length <= 0) {
                        console.log("该条数据无法查找到！");
                        return false;
                    }

                    tr.find('[data-name],input').each(function() {
                        var el = $(this);
                        var name = el.attr("data-name") || this.name;
                        if (name == undefined || name == null || name == "") return;
                        if (this.nodeName == "TD") {
                            el.text(data[name]);
                        } else if (this.nodeName == "INPUT") {
                            el.val(data[name]);
                        }
                    });
                }
                //回显渲染数据到 modal 中
                var rendreModalDataFn = function(modal, data) {
                    modal.find('form [data-name]').each(function() {
                        var self = $(this);
                        var name = self.attr('data-name');
                        var ymd = self.attr('data-ymd');

                        if (this.type == "checkbox" || this.type == "radio") {
                            var d = (data[name] || "").split(',');
                            var this_val = self.val();
                            if ($.inArray(this_val, d) >= 0) {
                                if(!self.is(':checked')){
                                    self.trigger('click');
                                }
                            }
                        } else{
                            self.val(data[name] || "")
                        }
                        if(ymd == "ymd"){
                            var arrData = (data[name] || "").split('-');
                            if(arrData.length > 0){
                                self.parent('.pv-ymd').find('.input-group-btn').each(function(){
                                    var input_span = $(this);
                                    var index = input_span.index();
                                    input_span.children('select').val(arrData[index]);
                                });
                            }
                        }
                    })
                    modal.find('.select2').trigger('change');
                }
                //回显事件
                var editShowEvent = function() {
                        var that = $(this);
                        var tr = that.parents('tr[data-uuid]');
                        var modal = $(that.attr('data-target'));
                        var uuid = that.parents('tr').attr('data-uuid');
                        var data = {};

                        that.tooltip('hide');

                        tr.find('input[type=hidden]').each(function() {
                            var self = $(this);
                            data[this.name] = self.val();
                        });

                        modal.find('input[name=modal_type]').val(uuid);
                        modal.modal('show');


                        rendreModalDataFn(modal, data);
                    };
                // 删除事件
                var deleteEvent = function() {
                    var that = $(this),
                        tr_tpl = that.attr('data-tr-tpl') || "",
                        tr = that.parents('tr[data-uuid]');

                    that.tooltip('hide');

                    layer.confirm("确定删除此数据？", {
                        btn: ["确定", "取消"]
                    }, function(index) {
                        tr.remove();
                        //针对-用药情况
                        triggerFn(tr_tpl);
                        layer.close(index);
                    })
                };
                //复制
                var copyEvent = function() {
                    var that = $(this),
                        tr_tpl = that.attr('data-tr-tpl') || "",
                        tr = that.parents('tr[data-uuid]');
                    new_tr = tr.clone();
                    new_tr.attr("data-uuid", sJs.uuid(10));

                    that.tooltip('hide');
                    tr.after(new_tr);
                    //针对-用药情况
                    triggerFn(tr_tpl);

                    sJs.tooltip(new_tr);
                };
                //上移
                var moveUpEvent = function() {
                    var that = $(this),
                        tr_tpl = that.attr('data-tr-tpl') || "",
                        tr = that.parents('tr[data-uuid]'),
                        new_tr = tr.clone(),
                        index = tr.index();

                    that.tooltip('hide');

                    if (index === 0) {
                        return false;
                    }
                    tr.prev().before(new_tr);
                    tr.remove();
                    sJs.tooltip(new_tr);
                };
                //下移
                var moveDownEvent = function() {
                    var that = $(this),
                        tr_tpl = that.attr('data-tr-tpl') || "",
                        tr = that.parents('tr[data-uuid]'),
                        new_tr = tr.clone(true),
                        tbody = tr.parent(),
                        index = tr.index();

                    that.tooltip('hide');

                    if (tbody.children('tr').length <= (index + 1)) {
                        return false;
                    }
                    tr.next().after(new_tr);
                    tr.remove();
                    sJs.tooltip(new_tr);
                };

                el.each(function() {
                    var riTable = $(this);
                    
                    var tr_tpl = riTable.attr('data-tr-tpl') || "";
                    var modal_save_btn = riTable.attr('data-modal-save') || "";

                    if(riTable.attr('data-binding') != "true"){
                        riTable.attr('data-binding', "true");

                        //修改回显
                        riTable.on('click', '.local-table-edit', editShowEvent);
                        //删除
                        riTable.on('click', '.local-table-delete', deleteEvent);
                        //复制
                        riTable.on('click', '.local-table-copy', copyEvent);
                        //上移
                        riTable.on('click', '.local-table-up', moveUpEvent);
                        //下移
                        riTable.on('click', '.local-table-down', moveDownEvent);
                    }

                    //新增|修改保存
                    if (modal_save_btn !== "") {
                        var modal_save_btn_el = $(modal_save_btn);
                        if(modal_save_btn_el.attr('data-binding') != "true"){
                            modal_save_btn_el.attr('data-binding',"true");

                            modal_save_btn_el.click(function() {
                                var data = {},
                                    that = $(this),
                                    modal = that.parents('.modal'),
                                    type = modal.find('input[name=modal_type]'),
                                    form = modal.find('form'),
                                    close = modal.find('[data-dismiss=modal]');

                                form.find('[data-name]:not([type=checkbox]):not([type=radio])').each(function() {
                                    var self = $(this);
                                    var name = self.attr("data-name"),
                                        val = self.val();
                                    data[name] = val || "";
                                });
                                form.find('[data-name]:checked').each(function() {
                                    var self = $(this);
                                    var name = self.attr('data-name'),
                                        val = self.val();

                                    if (this.type == "radio") {
                                        data[name] = val;
                                    } else {
                                        if (data[name] == undefined) {
                                            data[name] = [];
                                        }
                                        data[name].push(val);
                                    }
                                });
                                if (type.val() == "create") {
                                    rendreTableTr(tr_tpl, riTable, data);
                                } else {
                                    updateTableTr(riTable, data, type.val());
                                }
                                close.trigger('click');
                                //针对-用药情况
                                triggerFn(tr_tpl);
                            });
                        }
                    }
                })
            },
            /**
             * 公共的checkbox 选择后的显隐操作
             * @return {[type]} [description]
             */
            showHideFn: function(el, active) {
                var el = el || $(document);
                var reverseType = {
                    "show": "hide",
                    "hide": "show",
                    "disabled": "undisabled",
                    "undisabled": "disabled",
                    "modal": ""
                };

                var doItFn = function(selArr, type, parent) {
                    var p = parent || el;
                    if (selArr instanceof Array) {
                        $.each(selArr, function(index, item) {
                           
                            switch (type) {
                                case "hide":
                                    $(item, p).hide().find('input,select').val("");
                                    break;
                                case "show":
                                    $(item, p).show();
                                    break;
                                case "disabled":
                                    $(item, p).attr("disabled", true);
                                    break;
                                case "undisabled":
                                    $(item, p).removeAttr("disabled");
                                    break;
                                case 'modal':
                                    $(item, p).modal('show');
                            }
                        });
                    }
                }

                el.find('input[data-showhide-event]:not([showhide-key])').each(function() {
                    var that = $(this),
                        name = this.name,
                        val = this.value,
                        type = this.type,
                        show_hide = that.attr('data-showhide'),
                        hideSelArr = that.attr('data-showhide-event').split(',');

                    if(that.attr('showhide-key') == "true") return false;
                    that.attr('showhide-key',"true");


                    if (type == "radio") {
                        $('input[name="' + name + '"]', el).change(function() {
                            if (val == this.value) {
                                doItFn(hideSelArr, show_hide);
                            } else {
                                doItFn(hideSelArr, reverseType[show_hide]);
                            }
                        });
                    } else {
                        that.change(function() {
                            if (that.is(':checked')) {
                                doItFn(hideSelArr, show_hide);
                            } else {
                                doItFn(hideSelArr, reverseType[show_hide]);
                            }
                        });
                    }
                });
            }
        },
        select2:function(el){
            sJs.rendre.select2(el.parent());
        },
        /**
         * 页面dom常用渲染库
         * @type {Object}
         */
        rendre: {
            /**
             * 激活select2 差距
             * @param  {[type]} el [description]
             * @return {[type]}    [description]
             */
            select2: function(el) {
                var el = el || $(document);
                if ($.fn.select2 == undefined) return;

                $.fn.select2.defaults.set("theme", "bootstrap");

                var placeholder = "请选择！";
                $(".select2, .select2-multiple", el).select2({
                    placeholder: placeholder,
                    width: null
                });
            },
            /**
             * 通用 select option 渲染
             * @param  {[type]} el   [description]
             * @param  {[type]} data [description]
             * @param  {[type]} opts [description]
             * @return {[type]}      [description]
             */
            optionFn: function(el, data, opts) {
                if (el == undefined || el.length <= 0) return;

                var def_cfg = {
                    name: 'name',
                    value: 'value'
                }
                var buff = '';
                var opt = $.extend({}, def_cfg, opts, true);

                for (var i = 0; i < data.length; i++) {
                    var d = data[i];
                    buff += '<option value="' + d[opt.name] + '">' + d[opt.value] + '</option>'
                }
                el.html(buff);
            },
            /**
             * 渲染需要使用字典库的 select
             * @param  {[type]} el [description]
             * @return {[type]}    [description]
             */
            renderDict: function(el) {
                var params = [];
                var el = el || $(document);
                el.find('[data-dict]:not([dict-key])').each(function() {
                    params.push($(this).attr("data-dict"));
                });
                pv.getDict(params, el);
            },
            /**
             * 日期组件渲染
             * @param  {[type]} el [description]
             * @return {[type]}    [description]
             */
            laydate: function(el) {
                var el = el || $(document);
                
                if (typeof laydate == "undefined") return false;
                
                el.find('input[data-type=laydate]:not([lay-key]):not([disabled])').each(function() {
                    var self = this;
                    var that = $(this);
                    var opts = that.attr('laydate-opt') || "{}";
                    if (opts != undefined) opts = eval('(' + opts + ')');

                    var val = that.val() || "";
                    var cfg = $.extend({}, {
                        elem: self,
                        done: function(time, date, endTime) {
                            if (opts.range) {
                                var t = time.split(opts.range);
                                if (opts.starTime) $(opts.starTime).val(t[0].trim());
                                if (opts.endTime) $(opts.endTime).val(t[1].trim());
                            }

                        }
                    }, opts || {});
                    cfg.value = val;

                    laydate.render(cfg);
                });
            },
            /**
             * 带有某年/某月/某日 的日期下拉组件
             * @param {[type]} el [description]
             */
            YMD: function(el) {
                var el = el || $(document);
                var nYear = (new Date()).getFullYear();
                var keys = {
                    year: "年",
                    month: "月",
                    day: "日"
                }
                var keyNum = {
                    year: 0,
                    month: 1,
                    day: 2
                }
                var init = {
                    toFixed: function(val, len) {
                        var len = len || 2;
                        var valen = val.toString().length;
                        return valen < len ? "0000000000".slice(0, len - val.toString().length) + val : val;
                    },
                    optionHTML: function(type, starNum, endNum, value) {
                        var buff = '<option value="未知">未知</option>';
                        if (type == 'year') {
                            var starNum = nYear;
                            var endNum = nYear - endNum;
                            for (var i = starNum; i >= endNum; i--) {
                                var selected = i == value ? "selected" : "";
                                buff += '<option ' + selected + ' value="' + i + '">' + i + '</option>'
                            }
                        } else {
                            for (var i = starNum; i <= endNum; i++) {
                                var selected = i == value ? "selected" : "";
                                buff += '<option ' + selected + ' value="' + this.toFixed(i) + '">' + this.toFixed(i) + '</option>'
                            }
                        }
                        return buff;
                    }
                };
                el.find('[data-type=pvYMD]').each(function() {
                    var that = $(this);
                    var val = (that.attr("data-value") || "").split('-');

                    that.find('select[data-ymd]').each(function() {
                        var sel = $(this);
                        var type = sel.attr("data-ymd");
                        var opts = sel.attr('ymd-opts') || "{}";

                        if (opts != undefined) opts = eval("(" + opts + ")");

                        opts.value = val;

                        var maxlength = opts.maxlength || 20;
                        if (type == 'month') maxlength = 12;
                        if (type == 'day') maxlength = 31;
                        var buff = init.optionHTML(type, 1, maxlength, (val[keyNum[type]] || ""));
                        sel.html(buff);

                        sel.on('change', function() {
                            var year = $('select[data-ymd=year]', that).val() || "未知";
                            var month = $('select[data-ymd=month]', that).val() || "未知";
                            var day = $('select[data-ymd=day]', that).val() || "未知";
                            var val = year + "-" + month + "-" + day;
                            that.find('input[type=hidden]').val(val);
                        });
                    });
                })
            }
        },
        /**
         * 获取字典库数据
         * @param  {[type]} arrParams [description]
         * @param  {[type]} el        [description]
         * @return {[type]}           [description]
         */
        getDict: function(arrParams, el) {
            if (arrParams == undefined || arrParams.length <= 0) return false;
            var el = el || $(document);
            var cacheData = {};
            var noCacheParams = [];
            var flag = 'dictData'; //cache key

            $.each(arrParams, function(index, item){
                if(typeof sJs.caches[flag][item] !== "undefined"){
                    cacheData[item] = sJs.caches[flag][item];
                }else{
                    noCacheParams.push(item);
                }
            });

            var renderSelectFn = function(data) {
                for (var i in data) {
                    // 一个页面中可能使用多个相同字典库（国家）
                    $('[data-dict="' + i + '"]:not([dict-key])', el).each(function() {
                        var self = $(this);
                        var val = self.attr("data-value");
                        var type = self.attr('data-type');
                        var name = self.attr('data-name');
                        var callback = self.attr('data-callback');

                        var buff = "";

                        if(this.nodeName == "SELECT"){
                            buff = '<option value="">请选择</option>';
                            for (var j = 0; j < data[i].length; j++) {
                                var d = data[i][j];
                                var selected = d.sub_chinese == val ? 'selected' : '';
                                buff += '<option value="' + d.sub_chinese + '" ' + selected + ' >' + d.sub_chinese + '</option>';
                            }
                        }else{
                            if(type == "inline-radio"){
                                for(var j = 0; j < data[i].length; j++){
                                    var d = data[i][j];

                                    var selected = d.sub_chinese == val ? 'checked' : '';
                                        buff += '<div class="md-radio">'+
                                                    '<input type="radio" value="' + d.sub_chinese + '" id="radio5_1-' + d.id + '" name="' + name + '" class="md-check" ' + selected + '>'+
                                                    '<label for="radio5_1-' + d.id + '">'+
                                                        '<span></span>' +
                                                        '<span class="check"></span>'+
                                                        '<span class="box"></span>' + d.sub_chinese + '</label>'+
                                                '</div>';
                                }
                                buff = '<div class="md-radio-list"><div class="md-radio-inline">' + buff + '</div></div>';
                            }
                        }
                        self.html(buff);
                        self.attr('dict-key', sJs.uuid(4));
                        if(callback){
                            var arr_callback = callback.split('.');
                            window[arr_callback[0]][arr_callback[1]](self, arguments);
                        }

                    });
                }
            }
            
            renderSelectFn(cacheData);
            if(noCacheParams.length <= 0) return false;
            pv.ajax({
                url: config.dictURL,
                type: 'GET',
                data: {
                    chinese: noCacheParams
                },
                success: function(resp) {
                    if (resp.result) {
                        renderSelectFn(resp.data);
                        sJs.setCache(resp.data,'dictData');
                    }
                }
            })
        },
        /**
         * 数据缓存到cache
         * @param  {[type]} data [description]
         * @param  {[type]} key  [description]
         * @return {[type]}      [description]
         */
        setCache: function(data,key){
            var cache = sJs.caches;
            if(key){
                cache = cache[key];
            }
            for(var i in data){
                cache[i] = data[i];
            }
        },
        /**
         * 文件上传功能
         * @param  {[type]}   el       [description]
         * @param  {[type]}   opts     [description]
         * @param  {Object} callbackOpts [description]
         * @return {[type]}            [description]
         */
        uploadFile: function(el, opts, callbackOpts) {
            if (typeof WebUploader == "undefined") return;
            var selectInput = $('#file-upload-element');
            if (selectInput.length > 0) {
                selectInput.hide();
            } else {
                selectInput = $('<div id="file-upload-element"></div>').appendTo($('body')).hide();
            }
            // 上传成功后的配置
            var callback_cfg = {
                callback: {},
                // 上传成功回调写入 dom 的数据点
                opts: {
                    "file": 'input[type=file]', // 选中文件的input
                    "value": 'input[name=file_id]', // 回调写入文件id的隐藏input 
                    // "other":[{  //需要存储的其他文件信息格式为
                    //   ele: "", //页面 dom sel
                    //   key: "" //文件返回的数据字段
                    // }] 
                }
            }
            //上传插件配置
            var cfg = {
                server: config.fileUploadURL,
                swf: config.fileSWFURL,
                method: 'POST',
                chunked: false, // 分片上传关闭
                paste: document.body,
                formData: {
                    _token: $('meta[name=_token]').attr('content')
                },
                accept: {
                    extensions: '', //允许的文件后缀
                    mimeTypes: '*', //允许的文件类型
                },
                pick: {
                    id: '#file-upload-element',
                    label: '点击选择图片'
                }
            }

            var opt = $.extend({}, cfg, opts || {}, true);
            var cOpt = $.extend({}, callback_cfg, callbackOpts || {}, true);

            var callback = cOpt.callback;
            var cOption = cOpt.opts;

            var uploader = WebUploader.create(opt);

            //上传进度
            uploader.onUploadProgress = function() {
                // console.log(arguments);
            }
            // 开始上传
            uploader.onStartUpload = function() {
                if (callback && callback.startUpload) {
                    callback.startUpload.apply(this, arguments);
                } else {
                    layer.msg("开始上传文件！");
                }
            };
            //上传暂停
            uploader.onStopUpload = function() {
                if (callback && callback.stopUpload) {
                    callback.stopUpload.apply(this, arguments);
                } else {
                    layer.msg("文件上传暂停！");
                }
            };
            //上传进度
            uploader.onUploadProgress = function(file, percentage) {
                if (callback && callback.uploadProgress) {
                    callback.uploadProgress.apply(this, arguments);
                } else {
                    // console.log(percentage);
                }
            };
            //上传结束
            uploader.onUploadFinished = function() {
                if (callback && callback.uploadFinished) {
                    callback.uploadFinished.apply(this, arguments);
                }
            };
            // 上传成功
            uploader.onUploadSuccess = function(file, resp) {
                if (callback && callback.uploadSuccess) {
                    callback.uploadSuccess.apply(this, arguments);
                } else {
                    layer.msg("文件上传成功！");
                    // console.log(resp);
                }
            }
            return {
                uploader: uploader,
                upload: function(callback, file) {
                    if (typeof file !== "undefined") {
                        uploader.addFile(file);
                    } else {
                        var file = $(cOption.file, el);
                        if (file.length > 0) {
                            if (file[0].files.length <= 0) {
                                layer.msg("请选择需要上传的图片！");
                                return false;
                            }
                            uploader.reset();
                            uploader.addFile(file[0].files);
                            uploader.upload();
                            if (callback) {
                                // 上传成功
                                uploader.onUploadSuccess = function(file, resp) {
                                    callback.apply(this, arguments);
                                }
                            }
                        } else {
                            console.log("未找到对应的file标签!");
                        }
                    }
                }
            };
        },

        /**
         * 原始资料分类
         * @param  {[type]} el  [description]
         * @param  {[type]} url [description]
         * @return {[type]}     [description]
         */
        jsTree: function(el, url, key) {

            if (el.length <= 0) return false;

            var changeData = function(data) {

                for (var i = 0; i < data.length; i++) {
                    data[i].text = data[i].text || data[i].name;
                    if (data[i].son && data[i].son.length > 0) {
                        data[i].children = changeData(data[i].son);
                    }
                }

                return data;
            }
            return el.jstree({
                "core": {
                    "multiple": false,
                    "themes": {
                        "responsive": false
                    },
                    "check_callback": true,
                    'data': function(obj, callback) {
                        var d = [];
                        if (typeof key !== "undefined" && sJs.caches.jsTreeData[key] instanceof Array && sJs.caches.jsTreeData[key].length > 0) {
                            d = sJs.caches.jsTreeData[key];
                        } else {
                            sJs.ajax({
                                url: url,
                                type: 'GET',
                                async: false,
                                success: function(resp) {
                                    if (resp.result) {
                                        d = changeData(resp.data);
                                        sJs.caches.jsTreeData = d;
                                    }
                                }
                            });
                        }
                        if (d.length > 0) {
                            callback.call(this, d);
                        } else {
                            layer.msg("查询数据结果为空！");
                            el.jstree(true).destroy();
                        }

                    }
                },
                "types": {
                    "default": {
                        "icon": "fa fa-folder icon-state-warning icon-lg"
                    },
                    "file": {
                        "icon": "fa fa-file icon-state-warning icon-lg"
                    }
                },
                "plugins": ["types"]
            });
        },
        scrollDatatable: function(el, opts, form) {
            var table = el || $('#local-scroll-table');
            var cfg = {
                language: {
                    url: '/vendor/datatables/lang/zh_CN.json'
                },
                // scroller extension: http://datatables.net/extensions/scroller/
                scrollY: 300,
                deferRender: true,
                scroller: true,
                stateSave: true,
                "order": [
                    [0, 'asc']
                ],
                "lengthMenu": [
                    [10, 15, 20, -1],
                    [10, 15, 20, "All"] // change per page values here
                ],
                "pageLength": 10,
                "dom": "<'row'><'row'r><'table-scrollable't><'row'<'col-md-5 col-sm-12'il><'col-md-7 col-sm-12'p>>"
            };
            var options = $.extend({}, cfg, opts, true);
            var oTable = table.dataTable(options);

            return oTable;
        },
        /**
         * datatable 公共 js 实现方法  
         * @param  {Element} el   datatable el
         * @param  {[type]} opts [description]
         * @param  {[type]} form [description]
         * @return {[type]}      [description]
         *  table class => table table-striped table-bordered table-hover dataTable no-footer white-space-nowrap
         *  
         */
        datatable: function(el, opts, form) {
            var cfg = {
                processing: true,
                serverSide: true,
                pagingType: "bootstrap_extended",
                autoWidth: false,
                dom: "<'table-responsive't><'row'<'col-md-12 col-sm-12'il<'table-group-actions pull-right'p>>r>",
                language: {
                    url: '/vendor/datatables/lang/zh_CN.json'
                },
                bStateSave: true,
                drawCallback: function() {
                    sJs.tableInit.apply(this, arguments);
                }
            }
            var options = $.extend({}, cfg, opts, true);
            var table = el.DataTable(options);

            if (form) {
                form.find('.pv-search-event').click(function() {
                    table.ajax.reload();
                });
                form.find('.pv-search-reset-event').click(function() {
                    form.trigger('reset');
                });
            }

            return table;
        },
        /**
         * datatable action init
         * @return {[type]} [description]
         */
        tableInit: function() {
            var el = $(this);
            pv.tooltip(el);
            pv.tableAction(el);
            pv.modal(el);
        },
        /**
         * 激活 tooltip 插件
         * @param  {[type]} el 需要激活的 tooltip 范围
         * @return {[type]}    [description]
         */
        tooltip: function(el) {
            var el = el || $(document);
            $('[data-toggle*="tooltip"]', el).tooltip({ container: 'body' });
            // $('[data-toggle*="tooltip"]', el).unbind('show.bs.tooltip').on('show.bs.tooltip',function(){
            //    console.log($(this).attr('z-index',10051));
            // })
        },
        /**
         * 激活 modal 插件
         * @param  {[type]} el  el 需要激活的 modal 范围
         * @return {[type]}    [description]
         */
        modal: function(el) {
            var el = el || $(document);
            $('[data-toggle*="modal"]', el).each(function() {
                var that = $(this);
                var target = that.attr('data-target');
                var url = that.attr("href");
                if (target.indexOf('php-ajax-modal') > 0) {
                    var modalEl = $(target);

                    that.click(function(e) {
                        e.stopPropagation();
                        e.preventDefault();
                        var m = modalEl.modal({
                            remote: url,
                            show: true
                        });
                        // $.get(url,function(resp){
                        //     modalEl.find('.modal-content').html(resp);
                        //     m.modal('show');
                        // });
                    })
                }
            })
        },
        /**
         * modal 在 modal 显示的过程中，添加中间的操作环节
         * @param  {[type]}   sel      [description]
         * @param  {Function} callback [description]
         * @param  {[type]}   warp     [description]
         * @return {[type]}            [description]
         */
        modalPHP: function(sel, callback, warp) {
            var warp = warp || $(document);
            var sel = sel || '.pv-meddra-event';

            warp.on('click', sel, function() {
                var self = this,
                    that = $(this),
                    target = that.attr('data-target'),
                    modal = $(target),
                    url = that.attr('data-url');

                var fn = function() {
                    callback && callback.apply(self, [that, modal]);
                    modal.unbind('loaded.bs.modal', fn);
                }

                modal.modal({
                    remote: url,
                    show: true
                }).on('loaded.bs.modal', fn);
            });
        },
        /**
         * datatable 内按钮操作
         * @param  {Element}   el      元素范围
         * @param  {Function} callback 操作结束后的回调方法
         * @return {[type]}            [description]
         */
        tableAction: function(el, callback) {
            el.find('[data-method="delete"],[data-method="post"],[data-method="get"],[data-method="put"]').each(function() {
                var that = $(this);

                var method = that.attr('data-method');
                var url = that.attr('data-url');
                var type = that.attr('data-type');
                var confirm = that.attr('data-confirm');
                var reload = that.attr('data-reload');
                var title = that.attr('title') || that.attr('data-original-title');
                var loading = that.attr('data-loading');
                var elCallback = that.attr('data-callback'); // callback 的规则为 page.function


                var ajax = function() {
                    pv.ajax({
                        url: url,
                        type: method,
                        dataType: type,
                        success: function(resp) {
                            if(typeof resp.message != "undefined" && resp.message.length){
                                layer.msg(resp.message);    
                            }

                            if (resp.result) {
                                if (reload) {
                                    if (typeof LaravelDataTables != "undefined" && typeof LaravelDataTables.dataTableBuilder != "undefined") {
                                        LaravelDataTables.dataTableBuilder.ajax.reload();
                                    } else {
                                        window.location.reload();
                                    }
                                }
                                callback && callback.apply(that, [resp, that]);

                                if (elCallback) {
                                    var arr_callback = elCallback.split('.');
                                    window[arr_callback[0]][arr_callback[1]](that, arguments);
                                }
                            }
                        }
                    }, loading);
                }

                that.click(function() {
                    $('[data-toggle*="tooltip"]').tooltip('hide');
                    if (confirm == undefined) {
                        ajax();
                    } else {
                        if (confirm.length > 0) {
                            layer.confirm(confirm, {
                                btn: ["确定", "取消"]
                            }, ajax);
                        } else {
                            layer.confirm("您确定执行 [ " + title + " ] 操作！", {
                                btn: ["确定", "取消"]
                            }, ajax);
                        }
                    }
                });
            });
        },
        /**
         * 轻轻等待loading
         * @param  {String} el Element select
         * @return {[type]}    [description]
         */
        backUI: function(el) {
            App.blockUI({
                target: el,
                animate: true
            });
        },
        /**
         * 清除请求等待 如果没有 el 则清楚全部的
         * @param  {String} el Element Select
         * @return {[type]}    [description]
         */
        clearBackUI: function(el) {
            if (el) {
                App.unblockUI(el);
            } else {
                $.unblockUI();
            }
        },
        /**
         * 公共的默认激活事件
         * @return {[type]} [description]
         */
        commonEventInit: function() {
            $('button[type="submit"]').click(function() {
                pv.backUI($(this).parents('.form-fit'));
            })
        },
        valid: {
            m: /^13[0-9]{9}$|14[0-9]{9}|15[0-9]{9}$|17[0-9]{9}$|18[0-9]{9}$/,
            incidence: /^[0][.]{1}\d+$/,
        }
    };

    win.sJs = pv;
    

    $(function(){
        // validform 验证规则
        if($.fn.Validform){
            var v = sJs.valid;
            for(var i in v){
               $.Datatype[i] = v[i]; 
            }
        };

        var goLogin = function(){
            layer.msg('登陆失效！');
            location.reload();
        }
        $(document).ajaxComplete(function(e, xhr, opt){
            var status = xhr.status;

            switch(status){
                case 422:
                    goLogin();
                    break;
                case 401:
                    goLogin();
                    break;
                case 500:
                    layer.msg('服务器内部错误！请联系管理员。');
            }
        })
    })

})(jQuery, window);