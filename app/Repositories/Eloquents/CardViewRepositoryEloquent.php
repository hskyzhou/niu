<?php

namespace App\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Interfaces\CardViewRepository;
use App\Repositories\Models\CardView;
use App\Repositories\Validators\CardViewValidator;

/**
 * Class CardViewRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquents;
 */
class CardViewRepositoryEloquent extends BaseRepository implements CardViewRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CardView::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return CardViewValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
