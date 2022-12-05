<?php

declare(strict_types=1);

namespace App\Orchid\Screens\EventTags;

use App\Orchid\Layouts\EventTags\EventTagsEditLayout;
use App\Orchid\Layouts\EventTags\EventTagsPermissionLayout;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Orchid\Platform\Models\Role;
use Orchid\Platform\Models\EventTags;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class EventTagsEditScreen extends Screen
{
    /**
     * @var Role
     */
    public $eventtags;

    /**
     * Query data.
     *
     * @param Role $role
     *
     * @return array
     */
    public function query(\App\Models\EventTags $eventtags): array
    {
        return [
            'eventtags' => $eventtags
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
                ->canSee($this->eventtags->exists),
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
                EventTagsEditLayout::class,
            ])
                ->title('Role')
                ->description('Rola je súbor privilégií (možno rôznych služieb, ako je služba Používatelia, Moderátor atď.), ktoré používateľom s touto rolou umožňujú vykonávať určité úlohy alebo operácie.'),

          
        ];
    }

    /**
     * @param Request $request
     * @param Role    $role
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createOrUpdate(EventTags $eventtags, Request $request)
    {
        $eventtags->fill($request->get('eventtags'))->save();

        Alert::info('You have successfully created a post.');

        return redirect()->route('platform.systems.eventtags');
    }

    public function remove(EventTags $eventtags)
    {
        $eventtags->delete();

        Alert::info('You have successfully deleted the post.');

        return redirect()->route('platform.systems.eventtags');
    }
    /**
     * @param Role $role
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\RedirectResponse
     */

}
