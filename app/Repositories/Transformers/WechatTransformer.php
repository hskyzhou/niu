<?php

namespace App\Repositories\Transformers;

use League\Fractal\TransformerAbstract;
use App\Repositories\Models\Wechat;

/**
 * Class WechatTransformer.
 *
 * @package namespace App\Repositories\Transformers;
 */
class WechatTransformer extends TransformerAbstract
{
    /**
     * Transform the Wechat entity.
     *
     * @param \App\Repositories\Models\Wechat $model
     *
     * @return array
     */
    public function transform(Wechat $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
