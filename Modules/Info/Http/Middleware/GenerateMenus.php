<?php

namespace Modules\Info\Http\Middleware;

use Closure;

class GenerateMenus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
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

            // Infos
            $menu->add('<i class="nav-icon fa fa-info-circle"></i> '.__('Infos'), [
                'route' => 'backend.infos.index',
                'class' => 'nav-item',
            ])
            ->data([
                'order'         => 100,
                'activematches' => ['admin/infos*'],
                'permission'    => ['view_infos'],
            ])
            ->link->attr([
                'class' => 'nav-link',
            ]);
        })->sortBy('order');

        return $next($request);
    }
}
