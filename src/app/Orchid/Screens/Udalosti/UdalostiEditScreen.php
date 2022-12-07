<?php

declare(strict_types=1);

namespace App\Orchid\Screens\Udalosti;

use Orchid\Platform\Models\Udalosti;
use App\Orchid\Layouts\Udalosti\UdalostiEditLayout;
use App\Orchid\Layouts\Udalosti\UdalostiPermissionLayout;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Orchid\Platform\Models\Role;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class UdalostiEditScreen extends Screen
{
    /**
     * @var \App\Models\Udalosti
     */
    public $udalosti;

    /**
     * Query data.
     *
     * @param \App\Models\Udalosti $role
     *
     * @return array
     */
    public function query(\App\Models\Udalosti $udalosti): array
    {
        return [
            'udalosti' => $udalosti
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
                ->canSee($this->udalosti->exists),
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
                UdalostiEditLayout::class,
                ])
                ->title('Udalosti')
                ->description('Tu môžete pridať/editovať/vymazať udalosti.'),

          
        ];
    }

    /**
     * @param Request $request
     * @param \App\Models\Udalosti    $role
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createOrUpdate(\App\Models\Udalosti $udalosti, Request $request)
    {
        $udalosti->fill($request->get('udalosti'))->save();

        Alert::info('You have successfully saved.');

        return redirect()->route('platform.systems.udalosti');
    }

    public function remove(\App\Models\Udalosti $udalosti)
    {
        $udalosti->delete();

        Alert::info('You have successfully deleted the post.');

        return redirect()->route('platform.systems.udalosti');
    }
    /**
     * @param \App\Models\Udalosti $role
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\RedirectResponse
     */

}
