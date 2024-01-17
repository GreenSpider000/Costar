<?php

namespace Modules\Collection\Http\Middleware;

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
        \Menu::make('admin_sidebar', function ($menu) {
            // Collections Dropdown
            $collections_menu = $menu->add('<i class="nav-icon fas fa-tasks"></i> '.__('Collection'), [
                'class' => 'nav-group',
            ])->data([
                'order' => 13,
                'activematches' => [
                    'admin/subjects*',
                ],
                'permission' => ['view_subjects', 'view_taxons'],
            ]);
            $collections_menu->link->attr([
                'class' => 'nav-link nav-group-toggle',
                'href' => '#',
            ]);

            // Submenu: Subjects
            $collections_menu->add('<i class="nav-icon fas fa-file-alt"></i> '.__('Subjects'), [
                'route' => 'backend.subjects.index',
                'class' => 'nav-item',
            ])->data([
                'order' => 66,
                'activematches' => 'admin/subjects*',
                'permission' => ['edit_subjects'],
            ])->link->attr([
                'class' => 'nav-link',
            ]);
        })->sortBy('order');

        return $next($request);
    }
}
