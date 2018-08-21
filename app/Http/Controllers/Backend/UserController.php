<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use Hash;
use Exception;
use App\Services\Backend\UserService as Service;
use App\Traits\ControllerTrait;

class UserController extends Controller
{
    use ControllerTrait;

    protected $routePrefix = 'admin.user';
    
    protected $service;
    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    /**
     * 列表
     * @param  Builder $builder [description]
     * @return [type]           [description]
     */
    public function index()
    {
        if (request()->ajax()) {
            return $this->service->datatables();
        } else {
            $results = $this->service->index();

            return view('backend.user.index')->with($results);
        }
    }

    public function create()
    {
        return view('backend.user.create');
    }

    public function store()
    {
        return response()->json($this->service->store());
    }

    public function edit($id)
    {
        $results = $this->service->edit($id);

        return view('backend.user.edit')->with($results);
    }

    public function update($id)
    {
        return response()->json($this->service->update($id));
    }

    public function destroy($id)
    {
        return response()->json($this->service->destroy($id));
    }

    /**
     * 修改密码
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function passwordEdit()
    {
        return view('backend.user.password.edit');
    }

    public function passwordUpdate()
    {
        return response()->json($this->service->passwordUpdate());
    }

    public function passwordReset($userId)
    {
        return response()->json($this->service->passwordReset());
    }
}