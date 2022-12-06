<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Pracoviska;

use Orchid\Platform\Models\Role;
use Orchid\Platform\Models\Pracoviska;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class PracoviskaListLayout extends Table
{
    /**
     * @var string
     */
    public $target = 'pracoviska';


    /**
     * @return TD[]
     */
    public function columns(): array
    {
        
        return [
            TD::make('nazov', 'Nazov')
                ->sort()
                ->cantHide()
                ->filter(Input::make())
                ->render(function (\App\Models\Pracoviska $pracoviska) {
                    return Link::make($pracoviska->nazov)
                        ->route('platform.systems.pracoviska.update',$pracoviska->id);
                }),

                TD::make('address', 'Address')
                ->sort()
                ->cantHide()
                ->filter(Input::make())
                ->render(function (\App\Models\Pracoviska $pracoviska) {
                    return Link::make($pracoviska->address)
                        ->route('platform.systems.pracoviska.update',$pracoviska->id);
                }),

        ];
        
    }
}
