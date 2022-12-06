<?php

declare(strict_types=1);

namespace App\Orchid\Screens\Pracoviska;

use Orchid\Platform\Models\Pracoviska;
use App\Orchid\Layouts\Pracoviska\PracoviskaEditLayout;
use App\Orchid\Layouts\Pracoviska\PracoviskaPermissionLayout;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Orchid\Platform\Models\Role;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class PracoviskaEditScreen extends Screen
{
    /**
     * @var \App\Models\Pracoviska
     */
    public $pracoviska;

    /**
     * Query data.
     *
     * @param \App\Models\Pracoviska $role
     *
     * @return array
     */
    public function query(\App\Models\Pracoviska $pracoviska): array
    {
        return [
            'pracoviska' => $pracoviska
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Spravovať pracoviska';
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
                ->canSee($this->pracoviska->exists),
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
                PracoviskaEditLayout::class,
                ])
                ->title('Pracoviska')
                ->description('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),

          
        ];
    }

    /**
     * @param Request $request
     * @param \App\Models\Pracoviska    $role
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createOrUpdate(\App\Models\Pracoviska $pracoviska, Request $request)
    {
        $pracoviska->fill($request->get('pracoviska'))->save();

        Alert::info('You have successfully saved.');

        return redirect()->route('platform.systems.pracoviska');
    }

    public function remove(\App\Models\Pracoviska $pracoviska)
    {
        $pracoviska->delete();

        Alert::info('You have successfully deleted the post.');

        return redirect()->route('platform.systems.pracoviska');
    }
    /**
     * @param \App\Models\Pracoviska $role
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\RedirectResponse
     */

}
