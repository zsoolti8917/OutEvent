<?php

declare(strict_types=1);

namespace App\Orchid\Screens\Pracoviska;

use App\Orchid\Layouts\Pracoviska\PracoviskaEditLayout;
use App\Orchid\Layouts\Pracoviska\PracoviskaPermissionLayout;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Orchid\Platform\Models\Role;
use Orchid\Platform\Models\Pracoviska;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class PracoviskaEditScreen extends Screen
{
    /**
     * @var Role
     */
    public $pracoviska;

    /**
     * Query data.
     *
     * @param Role $role
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
                ->canSee($this->role->exists),
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
    public function createOrUpdate(Pracoviska $pracoviska, Request $request)
    {
        $pracoviska->fill($request->get('pracoviska'))->save();

        Alert::info('You have successfully created a post.');

        return redirect()->route('platform.systems.pracoviska');
    }

    public function remove(Pracoviska $pracoviska)
    {
        $pracoviska->delete();

        Alert::info('You have successfully deleted the post.');

        return redirect()->route('platform.systems.pracoviska');
    }
    /**
     * @param Role $role
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\RedirectResponse
     */

}
