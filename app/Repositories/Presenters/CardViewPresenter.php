<?php

namespace App\Repositories\Presenters;

use App\Repositories\Transformers\CardViewTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CardViewPresenter.
 *
 * @package namespace App\Repositories\Presenters;
 */
class CardViewPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CardViewTransformer();
    }
}
