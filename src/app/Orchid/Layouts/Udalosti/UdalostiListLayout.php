<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Udalosti;

use Orchid\Platform\Models\Role;
use Orchid\Platform\Models\Udalosti;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class UdalostiListLayout extends Table
{
    /**
     * @var string
     */
    public $target = 'udalosti';


    /**
     * @return TD[]
     */
    public function columns(): array
    {
        
        return [
            TD::make('nazov', 'Názov')
                ->sort()
                ->cantHide()
                ->filter(Input::make())
                ->render(function (\App\Models\Udalosti $udalosti) {
                    return Link::make($udalosti->nazov)
                        ->route('platform.systems.udalosti.update',$udalosti->id);
                }),

            TD::make('description', 'Popis')
                ->sort()
                ->cantHide()
                ->filter(Input::make())
                ->render(function (\App\Models\Udalosti $udalosti) {
                    return Link::make($udalosti->description)
                        ->route('platform.systems.udalosti.update',$udalosti->id);
                }),
                TD::make('start_time', 'Začiatok')
                ->sort()
                ->cantHide()
                ->filter(Input::make())
                ->render(function (\App\Models\Udalosti $udalosti) {
                    return Link::make($udalosti->start_time)
                        ->route('platform.systems.udalosti.update',$udalosti->id);
                }),
                TD::make('end_time', 'Koniec')
                ->sort()
                ->cantHide()
                ->filter(Input::make())
                ->render(function (\App\Models\Udalosti $udalosti) {
                    return Link::make($udalosti->end_time)
                        ->route('platform.systems.udalosti.update',$udalosti->id);
                }),
                TD::make('image', 'Image')
                ->sort()
                ->cantHide()
                ->filter(Input::make())
                ->render(function (\App\Models\Udalosti $udalosti) {
                    return Link::make($udalosti->image)
                        ->route('platform.systems.udalosti.update',$udalosti->id);
                
                }),

                TD::make('created_at', __('Vytvorené'))
                ->sort()
                ->render(function (\App\Models\Udalosti $udalosti) {
                    return $udalosti->created_at->toDateTimeString();
                }),
                TD::make('updated_at', __('Upravené'))
                ->sort()
                ->render(function (\App\Models\Udalosti $udalosti) {
                    return $udalosti->updated_at->toDateTimeString();
                }),

                
            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function (\App\Models\Udalosti $udalosti) {
                    return DropDown::make()
                        ->icon('options-vertical')
                        ->list([

                            Link::make(__('Upraviť'))
                                ->route('platform.systems.udalosti.update', $udalosti->id)
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
