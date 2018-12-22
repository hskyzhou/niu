<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Hash;
use Exception;
use App\Services\Backend\WechatService as Service;
use App\Traits\ControllerTrait;

class WechatController extends Controller
{
    use ControllerTrait;

    protected $routePrefix = 'admin.wechat';
    
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

            return view('backend.wechat.index')->with($results);
        }
    }

    public function create()
    {
        return view('backend.wechat.create');
    }

    public function store()
    {
        return response()->json($this->service->store());
    }

    public function edit($id)
    {
        $results = $this->service->edit($id);

        return view('backend.wechat.edit')->with($results);
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
        return view('backend.wechat.password.edit');
    }

    public function passwordUpdate()
    {
        $results = $this->service->passwordUpdate();
        if ($results['result']) {
            return redirect('admin/wechat');
        } else {
            return back()->withInput()->withErrors($results['message']);
        }
    }

    public function passwordReset($wechatId)
    {
        return response()->json($this->service->passwordReset());
    }
}