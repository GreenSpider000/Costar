<?php

namespace Costar\LaravelFilemanager\Exceptions;

class FileSizeExceedIniMaximumException extends \Exception
{
    public function __construct()
    {
        $this->message = trans('laravel-file-manager::lfm.error-file-size', ['max' => ini_get('upload_max_filesize')]);
    }
}
