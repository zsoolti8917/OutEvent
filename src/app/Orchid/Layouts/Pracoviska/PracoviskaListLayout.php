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
                TD::make('nazov')
                    ->sort()
                    ->cantHide()
                    ->filter(Input::make())
                    ->render(function (Pracoviska $pracoviska) {
                        return Link::make($pracoviska->name)
                            ->route('platform.systems.pracoviska.edit',$pracoviska);
                    }),

                    TD::make('address')
                    ->sort()
                    ->cantHide()
                    ->filter(Input::make())
                    ->render(function (Pracoviska $pracoviska) {
                        return Link::make($pracoviska->address)
                            ->route('platform.systems.pracoviska.edit',$pracoviska);
                    }),

            ];
        
    }
}
