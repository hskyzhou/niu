<?php

namespace App\Repositories\Presenters;

use App\Repositories\Transformers\WechatTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class WechatPresenter.
 *
 * @package namespace App\Repositories\Presenters;
 */
class WechatPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new WechatTransformer();
    }
}
