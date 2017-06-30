<?php

namespace AP\Tinyurl;

use Illuminate\Http\Request;
use AP\Support\ApiController as Base;

class Controller extends Base
{
    protected $repo;

    public function __construct(Contract $contract)
    {
        $this->repo = $contract;
    }

	public function index()
	{
		return view('tinyurl::partials.index');
	}
	
	public function create()
	{
		return view('tinyurl::partials.create');
	}

    public function store(Request $request)
    {}

    public function show($hash)
    {
		return view('tinyurl::partials.show');
	}

    public function edit($hash)
    {}

    public function update(Request $request, $hash)
    {}

    public function destroy($hash)
    {}

    public function redirect($hash)
    {
		return view('tinyurl::partials.redirect');
	}
}