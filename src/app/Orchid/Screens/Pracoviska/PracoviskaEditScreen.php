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
                ->title('Pracoviská')
                ->description('Tu môžete vytvárať, upravovať a mazať adresy pracovísk.'),

          
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

        Alert::info('Zmeny boli uložené');

        return redirect()->route('platform.systems.pracoviska');
    }

    public function remove(\App\Models\Pracoviska $pracoviska)
    {
        $pracoviska->delete();

        Alert::info('Pracovisko bolo vymazané');

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
