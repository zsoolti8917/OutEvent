<?php

declare(strict_types=1);

namespace App\Orchid\Screens\Pracoviska;

use App\Orchid\Layouts\Pracoviska\PracoviskaListLayout;
use Orchid\Platform\Models\Pracoviska;
use Orchid\Platform\Models\Role;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

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
            'pracoviska' => \App\Models\Pracoviska::paginate()
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
    public function permission(): ?iterable
    {
        return [
           
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
                ->route('platform.systems.pracoviska.edit')
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
            PracoviskaListLayout::class,
        ];
    }
}
