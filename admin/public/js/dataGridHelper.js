/**
 * Created by Elsa on 2017-06-23.
 */

var dataGridHelper = {
    'gridSelectorAll': {},
    //switch element when editing inline
    'aceSwitch': function (cellvalue, options, cell) {
        setTimeout(function () {
            $(cell).find('input[type=checkbox]')
                .addClass('ace ace-switch ace-switch-5')
                .after('<span class="lbl"></span>');
        }, 0);
    },
    //enable datepicker
    'pickDate': function (cellvalue, options, cell) {
        setTimeout(function () {
            $(cell).find('input[type=text]')
                .datepicker({format: 'yyyy-mm-dd', autoclose: true});
        }, 0);
    },
    'gridAutoWidth': function (grid_selector) {
        //resize to fit page size 拖动相关
        var parent_column = $(grid_selector).closest('[class*="col-"]');
        $(window).on('resize.jqGrid', function () {
            $(grid_selector).jqGrid('setGridWidth', parent_column.width());
        });
        //折叠菜单自动处理宽度
        $(document).on('settings.ace.jqGrid', function (ev, event_name, collapsed) {
            if (event_name === 'sidebar_collapsed' || event_name === 'main_container_fixed') {
                setTimeout(function () {
                    $(grid_selector).jqGrid('setGridWidth', parent_column.width());
                }, 20);
            }
        });
    },
    'updatePagerIcons': function (table) {
        var replacement = {
            'ui-icon-seek-first': 'ace-icon fa fa-angle-double-left bigger-140',
            'ui-icon-seek-prev': 'ace-icon fa fa-angle-left bigger-140',
            'ui-icon-seek-next': 'ace-icon fa fa-angle-right bigger-140',
            'ui-icon-seek-end': 'ace-icon fa fa-angle-double-right bigger-140'
        };
        $('.ui-pg-table:not(.navtable) > tbody > tr > .ui-pg-button > .ui-icon').each(function () {
            var icon = $(this);
            var $class = $.trim(icon.attr('class').replace('ui-icon', ''));
            if ($class in replacement) icon.attr('class', 'ui-icon ' + replacement[$class]);
        })
    },
    'afterGrid': function (grid_selector, pager_selector) {
        jQuery(grid_selector).jqGrid('navGrid', pager_selector,
            {
                edit: false,
                add: false,
                del: false,
                search: false,
                view: false,
                falserefresh: true,
                refreshtext: "刷新",
                refreshicon: 'ace-icon fa fa-refresh green'
            }
        );
        $(window).triggerHandler('resize.jqGrid');
        $(document).one('ajaxloadstart.page', function (e) {
            $.jgrid.gridDestroy(grid_selector);
            $('.ui-jqdialog').remove();
        });
    },
    'show': function (grid_selectors, pager_selectors, colNames, colModel, loadCompleteFn, loadCompleteErrorFn, options) {
        var grid_selector = "#" + grid_selectors;
        var pager_selector = "#" + pager_selectors;
        var dataUrl = $(grid_selector).data('url');
        dataGridHelper.gridAutoWidth(grid_selector);
        var gridConfig = {
            url: dataUrl,//请求数据地址
            mtype: 'POST',//请求数据方式
            datatype: "json",
            colNames: colNames,//列表头显示名
            colModel: colModel,
            viewrecords: true,
            rowNum: 10,
            height: 'auto',//高度自动
            autowidth: true,//宽度自动
            page: 1,//初始请求第几页的数据
            rowList: [10, 20, 30],
            pager: pager_selector,
            altRows: true,
            sortname: 'id',//默认排序名称
            sortorder: 'desc',
            hiddengrid: false,//为true 时折叠表格
            hidegrid: true,//显示折叠按钮
            toppager: false,//上面也显示分页
            multiselect: false,//是否可以多选
            //multikey: "ctrlKey",
            multiboxonly: true,
            viewsortcols: [true, 'vertical', true],//排序样式选项
            loadComplete: function (backData) {//数据加载完成调用方法
                dataGridHelper.updatePagerIcons(this);
                if (backData.status === 'error') {
                    bootbox.alert(backData.msg);
                    if (loadCompleteErrorFn && typeof loadCompleteErrorFn == "function") {
                        loadCompleteErrorFn(backData);
                    }
                    return false;
                }
                if (loadCompleteFn && typeof loadCompleteFn == "function") {
                    loadCompleteFn(backData);
                }
            },
            emptyrecords: '<span style="color:red;font-weight: bold"> 没有数据</span>',//查询不到数据时显示的文字
            loadtext: '正在查询数据...'//执行ajax请求时显示的文字
        };
        if (options) {
            for (var key in options) {
                gridConfig[key] = options[key];
            }
        }
        var grid = $(grid_selector).jqGrid(gridConfig);
        dataGridHelper.afterGrid(grid_selector, pager_selector);
        this.gridSelectorAll[grid_selectors] = grid;
        return grid;
    }
};

