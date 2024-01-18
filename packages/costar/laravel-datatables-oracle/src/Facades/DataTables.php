<?php

namespace Costar\DataTables\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @mixin \Costar\DataTables\DataTables
 *
 * @method static \Costar\DataTables\EloquentDatatable eloquent($builder)
 * @method static \Costar\DataTables\QueryDataTable query($builder)
 * @method static \Costar\DataTables\CollectionDataTable collection($collection)
 *
 * @see \Costar\DataTables\DataTables
 */
class DataTables extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'datatables';
    }
}
