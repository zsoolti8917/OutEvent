<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\MiestaKonania;

use Orchid\Platform\Models\Role;
use Orchid\Platform\Models\MiestaKonania;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class MiestaKonaniaListLayout extends Table
{
    /**
     * @var string
     */
    public $target = 'miestakonania';


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
                ->render(function (\App\Models\MiestaKonania $miestakonania) {
                    return Link::make($miestakonania->nazov)
                        ->route('platform.systems.miestakonania.update',$miestakonania->id);
                }),

            TD::make('address', 'Adresa')
                ->sort()
                ->cantHide()
                ->filter(Input::make())
                ->render(function (\App\Models\MiestaKonania $miestakonania) {
                    return Link::make($miestakonania->address)
                        ->route('platform.systems.miestakonania.update',$miestakonania->id);
                }),
                
            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function (\App\Models\MiestaKonania $miestakonania) {
                    return DropDown::make()
                        ->icon('options-vertical')
                        ->list([

                            Link::make(__('Upraviť'))
                                ->route('platform.systems.miestakonania.update', $miestakonania->id)
                                ->icon('pencil'),

                           /*  Button::make(__('Vymazať'))
                                ->icon('trash')
                                ->confirm(__('Po odstránení MiestaKonania budú natrvalo odstránené všetky jeho údaje. Pred odstránením MiestaKonania stiahnite si všetky údaje alebo informácie, ktoré si chcete ponechať.'))
                                ->method('remove'), */
                        ]);
                }),

        ];
        
    }
}
