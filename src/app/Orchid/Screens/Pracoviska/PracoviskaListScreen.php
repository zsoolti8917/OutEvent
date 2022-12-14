<?php

declare(strict_types=1);

namespace App\Orchid\Screens\Pracoviska;

use App\Orchid\Layouts\Pracoviska\PracoviskaListLayout;
use App\Orchid\Layouts\Pracoviska\PracoviskaEditLayout;
use Orchid\Platform\Models\Pracoviska;
use Orchid\Platform\Models\Role;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Illuminate\Http\Request;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class PracoviskaListScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */

    public function query(): iterable
    {
        return [
            'pracoviska' => \App\Models\Pracoviska::filters()->defaultSort('id')->paginate()
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Spravovať pracoviská';
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
     * @param \App\Models\Pracoviska $user
     *
     * @return array
     */
    public function asyncGetUser(\App\Models\Pracoviska $pracoviska): iterable
    {
        return [
            'pracoviska' => $pracoviska,
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
                ->route('platform.systems.pracoviska.edit')
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
            PracoviskaListLayout::class,
            /* Layout::modal('asyncEditPracoviskaModal', PracoviskaEditLayout::class)
            ->async('asyncGetPracoviska'), */
        ];
    }
}
