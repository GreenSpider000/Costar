<?php

namespace LocalStore\LaravelFilemanager\Exceptions;

class InvalidMimeTypeException extends \Exception
{
    public function __construct($mimetype)
    {
        $this->message = trans('laravel-file-manager::lfm.error-mime') . $mimetype;
    }
}
