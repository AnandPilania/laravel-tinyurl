<?php

namespace AP\Tinyurl;

interface Contract
{
    public function index($user = null);
    public function make($url, $title = null);
    public function destroy($hash);
}