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
            TD::make('nazov', 'Nazov')
                ->sort()
                ->cantHide()
                ->filter(Input::make())
                ->render(function (\App\Models\Udalosti $udalosti) {
                    return Link::make($udalosti->nazov)
                        ->route('platform.systems.udalosti.update',$udalosti->id);
                }),

            TD::make('description', 'Description')
                ->sort()
                ->cantHide()
                ->filter(Input::make())
                ->render(function (\App\Models\Udalosti $udalosti) {
                    return Link::make($udalosti->description)
                        ->route('platform.systems.udalosti.update',$udalosti->id);
                }),
                TD::make('start_time', 'Start_time')
                ->sort()
                ->cantHide()
                ->filter(Input::make())
                ->render(function (\App\Models\Udalosti $udalosti) {
                    return Link::make($udalosti->start_time)
                        ->route('platform.systems.udalosti.update',$udalosti->id);
                }),
                TD::make('end_time', 'end_time')
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

                TD::make('created_at', __('Vytvoren??'))
                ->sort()
                ->render(function (\App\Models\Udalosti $udalosti) {
                    return $udalosti->created_at->toDateTimeString();
                }),
                TD::make('updated_at', __('Upraven??'))
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

                            Link::make(__('Upravi??'))
                                ->route('platform.systems.udalosti.update', $udalosti->id)
                                ->icon('pencil'),

                           /*  Button::make(__('Vymaza??'))
                                ->icon('trash')
                                ->confirm(__('Po odstr??nen?? Pracoviska bud?? natrvalo odstr??nen?? v??etky jeho ??daje. Pred odstr??nen??m pracoviska stiahnite si v??etky ??daje alebo inform??cie, ktor?? si chcete ponecha??.'))
                                ->method('remove'), */
                        ]);
                }),

        ];
        
    }
}
