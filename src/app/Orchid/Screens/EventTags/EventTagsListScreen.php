<?php

declare(strict_types=1);

namespace App\Orchid\Screens\EventTags;

use App\Orchid\Layouts\EventTags\EventTagsListLayout;
use App\Orchid\Layouts\EventTags\EventTagsEditLayout;
use Orchid\Platform\Models\Role;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Illuminate\Http\Request;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;
use \App\Models\EventTags;
class EventTagsListScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */

    public function query(): iterable
    {
        return [
            'eventtags' => \App\Models\EventTags::paginate()
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Spravovať tagy';
    }

    /**
     * Display header description.
     *
     * @return string|null
     */
    public function description(): ?string
    {
        return 'Prístupové práva';
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
     * @param \App\Models\EventTags $user
     *
     * @return array
     */
    public function asyncGetUser(\App\Models\EventTags $eventtags): iterable
    {
        return [
            'eventtags' => $eventtags,
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
            Link::make('Create new')
                ->icon('pencil')
                ->route('platform.systems.eventtags.edit')
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
            EventTagsListLayout::class,
            /* Layout::modal('asyncEditPracoviskaModal', PracoviskaEditLayout::class)
            ->async('asyncGetPracoviska'), */
        ];
    }
}
