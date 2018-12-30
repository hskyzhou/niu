<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/12/28
 * Time: 下午7:51
 */

namespace App\Services\Api;


use App\Services\Service;
use App\Traits\ResultTrait;

class FilterWordService extends Service
{
    use ResultTrait;

    /**
     * 检验参数是否包含敏感词
     *
     * @return bool
     */
    public function check()
    {
        $word = request('word');

        if (sensitiveWordFilter($word)) {
            return array_merge($this->results, [
                'code'    => 200,
                'message' => '有敏感字'
            ]);
        }

        return array_merge($this->results, [
            'code'    => 404,
            'message' => '无敏感字'
        ]);
    }
}