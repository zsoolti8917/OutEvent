<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\EventTags;

use Orchid\Platform\Models\Role;
use Orchid\Platform\Models\EventTags;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class EventTagsListLayout extends Table
{
    /**
     * @var string
     */
    public $target = 'eventtags';


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
                    ->render(function (EventTags $eventtags) {
                        return Link::make($eventtags->name)
                            ->route('platform.systems.eventtags.edit',$eventtags);
                    }),

                    TD::make('address')
                    ->sort()
                    ->cantHide()
                    ->filter(Input::make())
                    ->render(function (EventTags $eventtags) {
                        return Link::make($eventtags->address)
                            ->route('platform.systems.eventtags.edit',$eventtags);
                    }),

            ];
        
    }
}
