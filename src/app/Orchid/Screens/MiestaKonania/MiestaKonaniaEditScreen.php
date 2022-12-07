<?php

declare(strict_types=1);

namespace App\Orchid\Screens\MiestaKonania;

use Orchid\Platform\Models\MiestaKonania;
use App\Orchid\Layouts\MiestaKonania\MiestaKonaniaEditLayout;
use App\Orchid\Layouts\MiestaKonania\MiestaKonaniaPermissionLayout;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Orchid\Platform\Models\Role;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class MiestaKonaniaEditScreen extends Screen
{
    /**
     * @var \App\Models\MiestaKonania
     */
    public $miestakonania;

    /**
     * Query data.
     *
     * @param \App\Models\MiestaKonania $role
     *
     * @return array
     */
    public function query(\App\Models\MiestaKonania $miestakonania): array
    {
        return [
            'miestakonania' => $miestakonania
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


    /**
     * Button commands.
     *
     * @return Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make(__('Uložit'))
                ->icon('check')
                ->method('createOrUpdate'),

            Button::make(__('Vymazať'))
                ->icon('trash')
                ->method('remove')
                ->canSee($this->miestakonania->exists),
        ];
    }

    /**
     * Views.
     *
     * @return string[]|\Orchid\Screen\Layout[]
     */
    public function layout(): iterable
    {
        return [
            Layout::block([
                MiestaKonaniaEditLayout::class,
                ])
                ->title('Miesta konania')
                ->description('Tu môžete pridať/editovať/vymazať miesta konania udalostí.'),

          
        ];
    }

    /**
     * @param Request $request
     * @param \App\Models\MiestaKonania    $role
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createOrUpdate(\App\Models\MiestaKonania $miestakonania, Request $request)
    {
        $miestakonania->fill($request->get('miestakonania'))->save();

        Alert::info('Úspešne ste uložili miesto.');

        return redirect()->route('platform.systems.miestakonania');
    }

    public function remove(\App\Models\MiestaKonania $miestakonania)
    {
        $miestakonania->delete();

        Alert::info('Úspešne ste vymazali miesto.');

        return redirect()->route('platform.systems.miestakonania');
    }
    /**
     * @param \App\Models\MiestaKonania $role
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\RedirectResponse
     */

}
