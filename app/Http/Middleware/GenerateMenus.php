<?php

namespace App\Http\Middleware;

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
            /**
             * Dashboard
             */ 
            $menu->add('<i class="nav-icon fa-solid fa-cubes"></i> '.__('Dashboard'), [
                'route' => 'backend.dashboard',
                'class' => 'nav-item',
            ])->data([
                'order' => 1,
                'activematches' => 'admin/dashboard*',
            ])->link->attr([
                'class' => 'nav-link',
            ]);

            /**
             * Pages
             */ 
            $menu->add('<i class="nav-icon fa-regular fa-sun"></i> '.__('Pages'), [
                'route' => 'backend.pages.index',
                'class' => 'nav-item',
            ])->data([
                'order'         => 10,
                'activematches' => ['admin/pages*'],
                'permission'    => ['view_pages'],
            ])->link->attr([
                'class' => 'nav-link',
            ]);

            /**
             * Articles
             */ 
            $articles_menu = $menu->add('<i class="nav-icon fas fa-tasks"></i> '.__('Article'), [
                'class' => 'nav-group',
            ])->data([
                'order' => 20,
                'activematches' => [
                    'admin/posts*',
                    'admin/categories*',
                    'admin/tags*',
                    'admin/comments*'
                ],
                'permission' => ['view_posts', 'view_categories'],
            ]);
            $articles_menu->link->attr([
                'class' => 'nav-link nav-group-toggle',
                'href' => '#',
            ]);
            // Submenu: Posts
            $articles_menu->add('<i class="nav-icon fas fa-file-alt"></i> '.__('Posts'), [
                'route' => 'backend.posts.index',
                'class' => 'nav-item',
            ])->data([
                'order' => 21,
                'activematches' => 'admin/posts*',
                'permission' => ['edit_posts'],
            ])->link->attr([
                'class' => 'nav-link',
            ]);
            // Submenu: Categories
            $articles_menu->add('<i class="nav-icon fas fa-sitemap"></i> '.__('Categories'), [
                'route' => 'backend.categories.index',
                'class' => 'nav-item',
            ])->data([
                'order' => 22,
                'activematches' => 'admin/categories*',
                'permission' => ['view_categories'],
            ])->link->attr([
                'class' => 'nav-link',
            ]);
            // Submenu: Tags
            $articles_menu->add('<i class="nav-icon fas fa-tags"></i> '.__('Tags'), [
                'route' => 'backend.tags.index',
                'class' => 'nav-item',
            ])->data([
                'order' => 23,
                'activematches' => ['admin/tags*'],
                'permission' => ['view_tags'],
            ])->link->attr([
                'class' => 'nav-link',
            ]);
            // Submenu: Comments
            $articles_menu->add('<i class="nav-icon fas fa-comments"></i> '.__('Comments'), [
                'route' => 'backend.comments.index',
                'class' => 'nav-item',
            ])->data([
                'order' => 24,
                'activematches' => ['admin/comments*'],
                'permission' => ['view_comments'],
            ])->link->attr([
                'class' => 'nav-link',
            ]);

            /**
             * Collections
             */ 
            $collections_menu = $menu->add('<i class="nav-icon fa fa-fw fa-map-signs"></i> '.__('Collection'), [
                'class' => 'nav-group',
            ])->data([
                'order' => 30,
                'activematches' => [
                    'admin/subjects*',
                    'admin/taxons*'
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
                'order' => 31,
                'activematches' => 'admin/subjects*',
                'permission' => ['edit_subjects'],
            ])->link->attr([
                'class' => 'nav-link',
            ]);
            // Submenu: Taxons
            $collections_menu->add('<i class="nav-icon fa fa-fw fa-cubes"></i> '.__('Taxons'), [
                'route' => 'backend.taxons.index',
                'class' => 'nav-item',
            ])->data([
                'order' => 32,
                'activematches' => ['admin/taxons*'],
                'permission' => ['view_taxons'],
            ])->link->attr([
                'class' => 'nav-link',
            ]);

            /**
             * Separator: Access Management
             */ 
            // $menu->add(__('Management'), [
            //     'class' => 'nav-title',
            // ])->data([
            //     'order' => 50,
            //     'permission' => ['edit_settings', 'view_backups', 'view_users', 'view_roles', 'view_logs'],
            // ]);

            /**
             * Settings
             */ 
            $menu->add('<i class="nav-icon fas fa-cogs"></i> '.__('Settings'), [
                'route' => 'backend.settings',
                'class' => 'nav-item',
            ])->data([
                'order' => 60,
                'activematches' => 'admin/settings*',
                'permission' => ['edit_settings'],
            ])->link->attr([
                'class' => 'nav-link',
            ]);

            /**
             * Access Control
             */ 
            $accessControl = $menu->add('<i class="nav-icon fa-solid fa-user-gear"></i> '.__('Access Control'), [
                'class' => 'nav-group',
            ])->data([
                'order' => 70,
                'activematches' => [
                    'admin/users*',
                    'admin/roles*',
                ],
                'permission' => ['view_users', 'view_roles'],
            ]);
            $accessControl->link->attr([
                'class' => 'nav-link nav-group-toggle',
                'href' => '#',
            ]);
            // Submenu: Users
            $accessControl->add('<i class="nav-icon fa-solid fa-user-group"></i> '.__('Users'), [
                'route' => 'backend.users.index',
                'class' => 'nav-item',
            ])->data([
                'order' => 71,
                'activematches' => 'admin/users*',
                'permission' => ['view_users'],
            ])->link->attr([
                'class' => 'nav-link',
            ]);
            // Submenu: Roles
            $accessControl->add('<i class="nav-icon fa-solid fa-user-shield"></i> '.__('Roles'), [
                'route' => 'backend.roles.index',
                'class' => 'nav-item',
            ])->data([
                'order' => 72,
                'activematches' => 'admin/roles*',
                'permission' => ['view_roles'],
            ])->link->attr([
                'class' => 'nav-link',
            ]);

            /**
             * Notifications
             */ 
            $menu->add('<i class="nav-icon fas fa-bell"></i> '.__('Notifications'), [
                'route' => 'backend.notifications.index',
                'class' => 'nav-item',
            ])->data([
                'order' => 80,
                'activematches' => 'admin/notifications*',
                'permission' => [],
            ])->link->attr([
                'class' => 'nav-link',
            ]);

            /**
             * Backup
             */ 
            $menu->add('<i class="nav-icon fas fa-archive"></i> '.__('Backups'), [
                'route' => 'backend.backups.index',
                'class' => 'nav-item',
            ])->data([
                'order' => 90,
                'activematches' => 'admin/backups*',
                'permission' => ['view_backups'],
            ])->link->attr([
                'class' => 'nav-link',
            ]);

            /**
             * Log Viewer
             */ 
            $accessControl = $menu->add('<i class="nav-icon fa-solid fa-list-check"></i> '.__('Log Viewer'), [
                'class' => 'nav-group',
            ])->data([
                'order' => 100,
                'activematches' => [
                    'log-viewer*',
                ],
                'permission' => ['view_logs'],
            ]);
            $accessControl->link->attr([
                'class' => 'nav-link nav-group-toggle',
                'href' => '#',
            ]);
            // Submenu: Log Viewer Dashboard
            $accessControl->add('<i class="nav-icon fa-solid fa-list"></i> '.__('Logs dashboard'), [
                'route' => 'log-viewer::dashboard',
                'class' => 'nav-item',
            ])->data([
                'order' => 101,
                'activematches' => 'admin/log-viewer',
            ])->link->attr([
                'class' => 'nav-link',
            ]);
            // Submenu: Log Viewer Logs by Days
            $accessControl->add('<i class="nav-icon fa-solid fa-list-ol"></i> '.__('Logs by Days'), [
                'route' => 'log-viewer::logs.list',
                'class' => 'nav-item',
            ])->data([
                'order' => 102,
                'activematches' => 'admin/log-viewer/logs*',
            ])->link->attr([
                'class' => 'nav-link',
            ]);

            /**
             * Access Permission Check
             */
            $menu->filter(function ($item) {
                if ($item->data('permission')) {
                    if (auth()->check()) {
                        if (auth()->user()->hasRole('super admin')) {
                            return true;
                        }
                        if (auth()->user()->hasAnyPermission($item->data('permission'))) {
                            return true;
                        }
                    }

                    return false;
                }

                return true;
            });

            /**
             * Set Active Menu
             */
            $menu->filter(function ($item) {
                if ($item->activematches) {
                    $activematches = is_string($item->activematches) ? [$item->activematches] : $item->activematches;
                    foreach ($activematches as $pattern) {
                        if (request()->is($pattern)) {
                            $item->active();
                            $item->link->active();
                            if ($item->hasParent()) {
                                $item->parent()->active();
                            }
                        }
                    }
                }

                return true;
            });
        })->sortBy('order');

        return $next($request);
    }
}