<?php

namespace Costar\LaravelFilemanager\Exceptions;

class FileSizeExceedConfigurationMaximumException extends \Exception
{
    public function __construct($file_size)
    {
        $this->message = trans('laravel-file-manager::lfm.error-size') . $file_size;
    }
}
