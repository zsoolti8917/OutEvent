<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Pracoviska;

use Orchid\Platform\Models\Role;
use Orchid\Platform\Models\Pracoviska;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
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
            TD::make('nazov', 'Názov pracoviska')
                ->sort()
                ->cantHide()
                ->filter(Input::make())
                ->render(function (\App\Models\Pracoviska $pracoviska) {
                    return Link::make($pracoviska->nazov)
                        ->route('platform.systems.pracoviska.update',$pracoviska->id);
                }),

            TD::make('address', 'Adresa pracoviska')
                ->sort()
                ->cantHide()
                ->filter(Input::make())
                ->render(function (\App\Models\Pracoviska $pracoviska) {
                    return Link::make($pracoviska->address)
                        ->route('platform.systems.pracoviska.update',$pracoviska->id);
                }),

                TD::make('created_at', __('Vytvorené'))
                ->sort()
                ->render(function (\App\Models\Pracoviska $pracoviska) {
                    return $pracoviska->created_at->toDateTimeString();
                }),
                
            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function (\App\Models\Pracoviska $pracoviska) {
                    return DropDown::make()
                        ->icon('options-vertical')
                        ->list([

                            Link::make(__('Upraviť'))
                                ->route('platform.systems.pracoviska.update', $pracoviska->id)
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
