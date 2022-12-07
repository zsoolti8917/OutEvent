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
            Input::make('udalosti.address')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('udalosti Adresa'))
                ->placeholder(__('udalosti Adresa'))
                ->help(__('Zobrazovaný udalosti adresa')),
        ];
    }
}
