<?php

namespace App\Repositories\Transformers;

use League\Fractal\TransformerAbstract;
use App\Repositories\Models\CardView;

/**
 * Class CardViewTransformer.
 *
 * @package namespace App\Repositories\Transformers;
 */
class CardViewTransformer extends TransformerAbstract
{
    /**
     * Transform the CardView entity.
     *
     * @param \App\Repositories\Models\CardView $model
     *
     * @return array
     */
    public function transform(CardView $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
