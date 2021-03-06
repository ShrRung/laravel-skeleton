<?php
/**
 * This is NOT a freeware, use is subject to license terms
 * @copyright Copyright (c) 2010-2099 Jinan Larva Information Technology Co., Ltd.
 * @link http://www.larva.com.cn/
 * @license http://www.larva.com.cn/license/
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 邮件验证码
 * @property string $email
 * @property string $code
 * @property string $type
 * @property string $ip
 * @property int $state
 * @property \Carbon\Carbon $expired_at
 * @property User $user
 * @author Tongle Xu <xutongle@gmail.com>
 */
class MailCode extends Model
{
    use Traits\HasDateTimeFormatter;

    //使用状态
    const USED_STATE = 1;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mail_codes';

    /**
     * @var array 允许批量赋值属性
     */
    protected $fillable = ['email', 'code', 'type', 'expired_at'];

    /**
     * 应该被调整为日期的属性
     *
     * @var array
     */
    protected $dates = [
        'expired_at',
        'created_at',
        'updated_at',
    ];

    /**
     * 修改使用状态
     * @param int $status
     * @return $this
     */
    public function changeState($status)
    {
        $this->state = $status;
        return $this;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }

    /**
     * 获取状态Label
     * @return string[]
     */
    public static function getTypeLabels()
    {
        return [

        ];
    }
}
