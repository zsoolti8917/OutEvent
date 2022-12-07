<?php

declare(strict_types=1);

namespace App\Orchid\Screens\Udalosti;

use App\Orchid\Layouts\Udalosti\UdalostiListLayout;
use App\Orchid\Layouts\Udalosti\UdalostiEditLayout;
use Orchid\Platform\Models\Udalosti;
use Orchid\Platform\Models\Role;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Illuminate\Http\Request;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class UdalostiListScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */

    public function query(): iterable
    {
        return [
            'udalosti' => \App\Models\Udalosti::filters()->defaultSort('id')->paginate()
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Spravovať udalosti';
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
     * @param \App\Models\Udalosti $user
     *
     * @return array
     */
    public function asyncGetUDalosti(\App\Models\Udalosti $udalosti): iterable
    {
        return [
            'udalosti' => $udalosti,
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
                ->route('platform.systems.udalosti.edit')
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
        \App\Models\Pracoviska::findOrFail($request->get('id'))->delete();

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
            UdalostiListLayout::class,
            /* Layout::modal('asyncEditPracoviskaModal', PracoviskaEditLayout::class)
            ->async('asyncGetPracoviska'), */
        ];
    }
}
