<?php

namespace App\Http\Resources;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 响应基类
 *
 * @author artisan <artisan@tencent.com>
 */
class Resource extends JsonResource
{
    /**
     * Resource constructor.
     *
     * @param $resource
     */
    public function __construct(Model $resource)
    {
        parent::__construct($resource);

        if ($resource->wasRecentlyCreated) {
            $resource->refresh();
        }
    }
}
