<?php

declare(strict_types=1);

namespace App\Orchid;

use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemPermission;
use Orchid\Platform\OrchidServiceProvider;
use Orchid\Screen\Actions\Menu;
use Orchid\Support\Color;

class PlatformProvider extends OrchidServiceProvider
{
    /**
     * @param Dashboard $dashboard
     */
    public function boot(Dashboard $dashboard): void
    {
        parent::boot($dashboard);

        // ...
    }

    /**
     * @return Menu[]
     */
    public function registerMainMenu(): array
    {
        return [
            Menu::make(('Používatelia'))
                ->icon('user')
                ->route('platform.systems.users')
                ->permission('platform.systems.users'),


            Menu::make(__('Roly'))
                ->icon('lock')
                ->route('platform.systems.roles')
                ->permission('platform.systems.roles'),

                Menu::make('Miesta Konania')
                ->icon('star')
                ->route('platform.miestakonania'),

                Menu::make('Nástenka')
                ->icon('table')
                ->route('platform.nastenka'),

                Menu::make('Pracoviská')
                ->icon('briefcase')
                ->route('platform.pracoviska'),

                Menu::make('Event Tags')
                ->icon('people')
                ->route('platform.systems.eventtags'),

                Menu::make('Udalosti')
                ->icon('bell')
                ->route('platform.udalosti')
        
        ];
    }

    /**
     * @return Menu[]
     */
    public function registerProfileMenu(): array
    {
        return [
            Menu::make('Profil')
                ->route('platform.profile')
                ->icon('user'),
        ];
    }

    /**
     * @return ItemPermission[]
     */
    public function registerPermissions(): array
    {
        return [
            ItemPermission::group(__('System'))
                ->addPermission('platform.systems.roles', __('Roles'))
                ->addPermission('platform.systems.users', __('Users')),
        ];
    }
}
