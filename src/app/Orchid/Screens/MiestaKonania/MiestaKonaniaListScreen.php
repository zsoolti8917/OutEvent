<?php

declare(strict_types=1);

namespace App\Orchid\Screens\MiestaKonania;

use App\Orchid\Layouts\MiestaKonania\MiestaKonaniaListLayout;
use App\Orchid\Layouts\MiestaKonania\MiestaKonaniaEditLayout;
use Orchid\Platform\Models\MiestaKonania;
use Orchid\Platform\Models\Role;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Illuminate\Http\Request;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class MiestaKonaniaListScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */

    public function query(): iterable
    {
        return [
            'miestakonania' => \App\Models\MiestaKonania::paginate()
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Spravovať miesta konania';
    }

    /**
     * Display header description.
     *
     * @return string|null
     */
    public function description(): ?string
    {
        return null;
    }

    /**
     * @return iterable|null
     */
    public function permission(): ?iterable
    {
        return [
           
        ];
    }
 /**
     * @param \App\Models\MiestaKonania $user
     *
     * @return array
     */
    public function asyncGetUser(\App\Models\MiestaKonania $miestakonania): iterable
    {
        return [
            'miestakonania' => $miestakonania,
        ];
    }
    /**
     * Button commands.
     *
     * @return Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('Pridať')
                ->icon('pencil')
                ->route('platform.systems.miestakonania.edit')
        ];
    }
    /**
     * @param Request $request
     */
    /**
     * @param Request $request
     */
    /* public function remove(Request $request): void
    {
        \App\Models\MiestaKonania::findOrFail($request->get('id'))->delete();

        Toast::info(__('Používateľ bol odstránený.'));
    } */
    /**
     * Views.
     *
     * @return string[]|\Orchid\Screen\Layout[]
     */
    public function layout(): iterable
    {
        return [
            MiestaKonaniaListLayout::class,
            /* Layout::modal('asyncEditMiestaKonaniaModal', MiestaKonaniaEditLayout::class)
            ->async('asyncGetMiestaKonania'), */
        ];
    }
}
