<?php

namespace App\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Interfaces\WechatRepository;
use App\Repositories\Models\Wechat;
use App\Repositories\Validators\WechatValidator;

/**
 * Class WechatRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquents;
 */
class WechatRepositoryEloquent extends BaseRepository implements WechatRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Wechat::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return WechatValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
