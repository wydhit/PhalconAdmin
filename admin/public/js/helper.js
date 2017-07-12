var helper = {
    'init': function () {
        /* 用jqgrid的页面头部搜索用*/
        var searchForGrid = $('#searchForGrid');
        if (searchForGrid !== undefined) {
            searchForGrid.bind('submit', function () {
                var postData = $(this).serializeArray(); //表单信息
                var pd = {};
                postData.forEach(function (data) {
                    var key = data.name;
                    var value = data.value;
                    pd[key] = value;
                });
                var grid_selector = $(this).data('grid');
                dataGridHelper.gridSelectorAll[grid_selector].setGridParam({'page': 1, postData: {'searchData': pd}})
                    .trigger("reloadGrid"); //重新载入
                return false;
            });
        }
        /*使用jqgrid的页面头部搜索用*/

    },
    /*格式化unix时间戳*/
    'unixTimeToStr': function (times) {
        if (times) {
            var date = new Date(times * 1000);
            return date.getFullYear() + '-' + (date.getMonth() + 1) + '-' + date.getDate() + ' ' + date.getHours() + ':' + date.getMinutes() + ':' + date.getSeconds();
        } else {
            return '\\';
        }
    },
    'changeAction': function (obj, successFn) {
        var href = $(obj).data('href');
        if (!href) {
            return false;
        }
        var title = $(obj).attr('title');
        if (!title) {
            title = '';
        }
        var data = {};
        bootbox.confirm('您确定要' + title, function (result) {
            if (result) {
                $.ajax({
                    url: href,
                    data: data,
                    dataType: 'json',
                    type:"POST",
                    success: function (backData) {
                        if (backData.status === 'success') {//执行成功
                            bootbox.alert(backData.msg);
                            if (successFn && typeof successFn == "function") {
                                successFn(backData);
                            }
                        } else {
                            bootbox.alert(backData.msg);
                        }
                    },
                    error: function () {
                        bootbox.alert('服务器连接失败！');
                    }
                });
            }
        });
    },
    'dialogInit': function () {
        //重写下jq ui 的dialog插件的title方法 让dialog的title可以支持html
        $.widget("ui.dialog", $.extend({}, $.ui.dialog.prototype, {
            _title: function (title) {
                var $title = this.options.title || '&nbsp;';
                if (("title_html" in this.options) && this.options.title_html == true)
                    title.html($title);
                else title.text($title);
            }
        }));
    },
    /*打开一个模拟对话框并加载一个网页*/
    'dialogOpen': function (obj) {
        this.dialogInit();
        var title = $(obj).attr('title') ? $(obj).attr('title') : '提示';
        var height = $(obj).data('height') ? $(obj).data('height') : 600;
        var width = $(obj).data('width') ? $(obj).data('width') : 800;
        var href = $(obj).data('href');
        var dialogDivId = 'dialog-message' + parseInt(Math.random() * 1000000);
        var dialogHtml = '<div id="' + dialogDivId + '" class="hide">' +
            '   <div id="dialog-message-loading" >' +
            '       <div style="text-align: center;margin-top: 30px;">' +
            '       <i class="fa fa-spinner fa-spin orange" style="font-size:400%!important"></i> <br>' +
            '       <p>正在加载....</p> ' +
            '       </div>' +
            '   </div>' +
            '</div>'
        ;
        $('body').append(dialogHtml);
        var dialogObj = $('#' + dialogDivId);
        var mydialog = dialogObj.removeClass('hide').dialog({
            modal: false,
            closeOnEscape: true,
            width: width,
            height: height,
            position: {my: "center top+40", at: "center top+40"},
            title: "<div class='widget-header widget-header-small'><h4 class='smaller'>" + title + "</h4></div>",
            title_html: true,
            buttons: [
                {
                    text: "关闭",
                    "class": "btn btn-minier",
                    click: function (e) {
                        $(this).dialog("close");
                        mydialog.dialog("close");
                        $("#" + dialogDivId).remove();
                    }
                }
            ],
            close: function (event, ui) {
                $(this).dialog("close");
                mydialog.dialog("close");
                $("#" + dialogDivId).remove();
            }
        });
        if (href) {
            $.get(href, function (result) {
                dialogObj.html(result);
            });
        } else {
            dialogObj.html('没找到数据请求地址href');
        }
    },
    submitByAjax: function (form, successFn, errorFn) {
        var data = $(form).serialize();
        var url = $(form).attr('action');
        $.ajax({
            cache: false,
            type: 'POST',
            url: url,
            data: data,
            dataType: 'json', //返回json格式数据
            success: function (json) {
                if (json.status === 'success') {
                    if (successFn && typeof successFn == "function") {
                        successFn(json);
                    } else if (json.msg) {
                        bootbox.alert(json.msg);
                    }
                } else {
                    if (errorFn && typeof errorFn == "function") {
                        errorFn(json);
                    } else if (json.msg) {
                        bootbox.alert(json.msg);
                    }
                    // common.formShowError(json.inputerr);
                }
            },
            error: function (xhr, type, error) {
                bootbox.alert('提交失败，亲重试');
            }
        })
    },
    formShowError: function (inputerr, form) {
        var obj;
        $(".help-block").remove();
        $(".form-group").removeClass('has-error');
        for (var ii in inputerr) {
            if (form !== undefined && form) {
                obj = $(form).find('#' + ii);
            } else {
                obj = $('#' + ii);
            }
            obj.focus().parents('.form-group').removeClass('has-info').addClass('has-error').append('<div id="name-error" class="help-block">' + inputerr[ii] + '</div>');
        }
    }
};
helper.init();

