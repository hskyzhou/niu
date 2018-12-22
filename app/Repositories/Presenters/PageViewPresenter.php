<?php

namespace App\Repositories\Presenters;

use App\Repositories\Transformers\PageViewTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PageViewPresenter.
 *
 * @package namespace App\Repositories\Presenters;
 */
class PageViewPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PageViewTransformer();
    }
}
