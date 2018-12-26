<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Backend\MenuService as Service;
use App\Traits\ControllerTrait;

class MenuController extends Controller
{
    use ControllerTrait;

    protected $routePrefix = 'admin.menu';

    protected $service;
	public function __construct(Service $service)
	{
		$this->service = $service;
	}

	public function index()
    {
        $results = $this->service->index();

        return view('backend.menu.index')->with($results);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $results = $this->service->create();

        return view('backend.menu.create')->with($results);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return response()->json($this->service->store());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $results = $this->service->edit($id);

        return view('backend.menu.edit')->with($results);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return response()->json($this->service->update($id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $results = $this->service->destroy($id);

        return response()->json($results);
    }
}
