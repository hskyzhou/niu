$(function(){
    var bt = baidu.template;
    var itemsList = $('.course-items-list');
    var form = $('#create-chapter-event');
    //内容类型切换
    $(document).on('change', '.type-change-event', function(){
        var that = $(this),
            val = that.val();
            that.find('option:selected').attr('selected',true).siblings().removeAttr('selected');
        var formBody = that.closest('.form'),
            allTypeEl = formBody.find('.type-content .form-group[data-type]');

            allTypeEl.each(function(){
                var el = $(this),
                    type = el.attr('data-type');
                    if(type.split(',').indexOf(val) > -1){
                        el.show();
                    }else{
                        el.find('input,select,textarea').val("");
                        el.find('.fileinput').fileinput('clear');
                        el.hide();
                    }
            });
    }).find('.type-change-event').trigger('change');
    //添加
    $('.add-course-item-event').click(function(){
        var len = itemsList.children('.chapter-item').length;
        if(len > 10){
            layer.msg('一个课程最多允许添加十份内容！');
            return false;
        }
        var tpl = bt('course_tpl',{index: len});
        itemsList.append(tpl);
    });
    //删除
    $(document).on('click','.delete-item-event',function(){
        var that = $(this);
        layer.confirm("确定删除此内容？",{
            btn:['取消','确定']
        },function(index){
            layer.close(index);
        },function(index){
            that.closest('.chapter-item').remove();
            updateNum();
        })
    })
    //上移
    $(document).on('click','.up-item-event',function(){
        var that = $(this);
        var box = that.closest('.chapter-item');
        var prev_el = box.prev('.chapter-item');
        if(prev_el.length > 0){
            prev_el.before(box.clone(true));
            box.remove();
            updateNum();
        }else{
            layer.msg("此数据已经属于首条数据了！")
        }
    })
    //下移
    $(document).on('click','.down-item-event',function(){
        var that = $(this);
        var box = that.closest('.chapter-item');
        var next_el = box.next('.chapter-item');
        if(next_el.length > 0){
            next_el.after(box.clone(true));
            box.remove();
            updateNum();
        }else{
            layer.msg("此数据已经属于末尾数据了！")
        }
    });
    //更新序号
    var updateNum = function(){
        itemsList.children('.chapter-item').each(function(){
            var box = $(this);
            var title = box.find('.caption h4');
            var index = box.index();
            console.log(index);
            title.text('内容 ' + (index));
        })
    }
    // 文件被修改和删除的时候重置input file name 为 ...
    setTimeout(function(){
        $('.btn-file input[type=file]').on('change',function(){
            $(this).attr("data-name", 'newfile');
        })
    },300);
    $(document).on('click', '.fileinput [data-dismiss="fileinput"]', function(){
        $(this).closest('.fileinput').find('input[type=file]').val('newfile');
    })
})