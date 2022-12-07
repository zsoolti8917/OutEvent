<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Udalosti;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;
use Orchid\Platform\Models\Udalosti;

class UdalostiEditLayout extends Rows
{
    /**
     * Views.
     *
     * @return Field[]
     */

    public $udalosti;

    public function query(\App\Models\Udalosti $udalosti): array
    {
        return [
            'udalosti' => $udalosti
        ];
    }
    public function fields(): array
    {
        return [
            Input::make('udalosti.nazov')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Názov udalosti'))
                ->placeholder(__('Názov udalosti'))
                ->help(__('Zobrazovaný názov udalosti')),
            Input::make('udalosti.description')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('udalosti description'))
                ->placeholder(__('udalosti description'))
                ->help(__('Zobrazovaný description')),
            Input::make('udalosti.start_time')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('start_time text1'))
                ->placeholder(__('start_time text2'))
                ->help(__('Zobrazovaný start_time text')),
            Input::make('udalosti.end_time')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('end_time1'))
                ->placeholder(__('end_time2'))
                ->help(__('end_time3')),
            Input::make('udalosti.image')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('image1'))
                ->placeholder(__('image2'))
                ->help(__('image3')),
        ];
    }
}
