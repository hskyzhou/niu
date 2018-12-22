<?php

namespace App\Repositories\Transformers;

use League\Fractal\TransformerAbstract;
use App\Repositories\Models\PageView;

/**
 * Class PageViewTransformer.
 *
 * @package namespace App\Repositories\Transformers;
 */
class PageViewTransformer extends TransformerAbstract
{
    /**
     * Transform the PageView entity.
     *
     * @param \App\Repositories\Models\PageView $model
     *
     * @return array
     */
    public function transform(PageView $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
