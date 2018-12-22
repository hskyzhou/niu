<?php

namespace App\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Interfaces\PageViewRepository;
use App\Repositories\Models\PageView;
use App\Repositories\Validators\PageViewValidator;

/**
 * Class PageViewRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquents;
 */
class PageViewRepositoryEloquent extends BaseRepository implements PageViewRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PageView::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return PageViewValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
