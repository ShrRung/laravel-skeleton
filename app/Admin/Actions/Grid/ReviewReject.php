<?php
/**
 * This is NOT a freeware, use is subject to license terms
 * @copyright Copyright (c) 2010-2099 Jinan Larva Information Technology Co., Ltd.
 * @link http://www.larva.com.cn/
 * @license http://www.larva.com.cn/license/
 */

namespace App\Admin\Actions\Grid;

use Dcat\Admin\Grid\RowAction;
use Illuminate\Http\Request;

/**
 * 审核通过
 * @author Tongle Xu <xutongle@gmail.com>
 */
class ReviewReject extends RowAction
{
    /**
     * @var string
     */
    protected $title = '<i class="feather icon-slash"></i> '.'拒绝通过';

    /**
     * @var string|null
     */
    protected $model;

    /**
     * Restore constructor.
     * @param string|null $model
     */
    public function __construct(string $model = null)
    {
        $this->model = $model;
        parent::__construct($this->title);
    }

    public function handle(Request $request)
    {
        $key = $this->getKey();
        $model = $request->get('model');

        $model::findOrFail($key)->setRejected();

        return $this->response()->success('已拒绝通过')->refresh();
    }

    public function confirm()
    {
        return ['确定拒绝通过吗？'];
    }

    public function parameters()
    {
        return [
            'model' => $this->model,
        ];
    }
}
