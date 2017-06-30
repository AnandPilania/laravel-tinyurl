<?php

namespace AP\Tinyurl;

trait Tinyurl
{
    public function tinyurls()
    {
        return $this->belongsTo(Model::class);
    }
}