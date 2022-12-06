<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\EventTags;

use Orchid\Platform\Models\Role;
use Orchid\Platform\Models\EventTags;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
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
            TD::make('nazov', 'Tag')
                ->sort()
                ->cantHide()
                ->filter(Input::make())
                ->render(function (\App\Models\EventTags $eventtags) {
                    return Link::make($eventtags->nazov)
                        ->route('platform.systems.eventtags.update',$eventtags->id);
                }),
                
            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function (\App\Models\EventTags $eventtags) {
                    return DropDown::make()
                        ->icon('options-vertical')
                        ->list([

                            Link::make(__('Upraviť'))
                                ->route('platform.systems.eventtags.update', $eventtags->id)
                                ->icon('pencil'),

                           /*  Button::make(__('Vymazať'))
                                ->icon('trash')
                                ->confirm(__('Po odstránení Pracoviska budú natrvalo odstránené všetky jeho údaje. Pred odstránením pracoviska stiahnite si všetky údaje alebo informácie, ktoré si chcete ponechať.'))
                                ->method('remove'), */
                        ]);
                }),

        ];
        
    }
}
