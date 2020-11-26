<?php
/**
 * This is NOT a freeware, use is subject to license terms
 * @copyright Copyright (c) 2010-2099 Jinan Larva Information Technology Co., Ltd.
 * @link http://www.larva.com.cn/
 * @license http://www.larva.com.cn/license/
 */

namespace App\Admin\Controllers\Content;

use App\Models\Tag;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;

/**
 * Class TagController
 * @author Tongle Xu <xutongle@gmail.com>
 */
class TagController extends AdminController
{
    protected function title()
    {
        return '标签';
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Tag(), function (Grid $grid) {
            $grid->filter(function (Grid\Filter $filter) {
                //右侧搜索
                $filter->equal('id');
                $filter->equal('name');
                $filter->equal('title');
            });
            $grid->quickSearch(['id', 'name','title']);
            $grid->model()->orderBy('id', 'desc');

            $grid->column('id', 'ID')->sortable();
            $grid->column('name', '名称');
            $grid->column('frequency', '标签热度');
            $grid->column('title', 'SEO标题');
            $grid->column('keywords', 'SEO关键词');
            $grid->column('created_at','创建时间')->sortable();
            $grid->disableRowSelector();
            $grid->disableViewButton();
            $grid->enableDialogCreate();
            $grid->paginate(10);
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new Tag(), function (Form $form) {
            $form->tools(function (Form\Tools $tools) {
                $tools->disableView();
            });
            $form->text('name', '名称')->rules('required');
            $form->text('frequency', '标签热度')->default(0);
            $form->text('title', 'SEO标题');
            $form->text('keywords', 'SEO关键词');
            $form->textarea('description', 'SEO描述');
        });
    }
}