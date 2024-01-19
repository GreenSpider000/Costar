<?php

namespace Modules\Taxon\Http\Middleware;

use Closure;

class GenerateMenus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /*
         *
         * Module Menu for Admin Backend
         *
         * *********************************************************************
         */
        \Menu::make('admin_sidebar', function ($menu) {
            // Taxons
            $menu->add('<i class="nav-icon fa fa-fw fa-cubes"></i> '.__('Taxons'), [
                'route' => 'backend.taxons.index',
                'class' => 'nav-item',
            ])
                ->data([
                    'order' => 14,
                    'activematches' => ['admin/taxons*'],
                    'permission' => ['view_taxons'],
                ])
                ->link->attr([
                    'class' => 'nav-link',
                ]);
        })->sortBy('order');

        return $next($request);
    }
}
