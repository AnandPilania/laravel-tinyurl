<?php

namespace AP\Tinyurl;

use AP\Support\Repository as Base;

class Repository extends Base implements Contract
{
    protected $model;
    protected $config;

    public function __construct(Model $model)
    {
        $this->config = $this->config ?: (config('tinyurl') ?: (is_file(__DIR__.'/../config/config.php') ? include __DIR__.'/../config/config.php' : []));
        $this->model = $model;
    }

    public function index($user = null)
    {}

    public function make($url, $title = null)
    {}

    public function destroy($hash)
    {}
}