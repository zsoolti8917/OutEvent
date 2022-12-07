<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\MiestaKonania;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;
use Orchid\Platform\Models\MiestaKonania;

class MiestaKonaniaEditLayout extends Rows
{
    /**
     * Views.
     *
     * @return Field[]
     */

    public $miestakonania;

    public function query(\App\Models\MiestaKonania $miestakonania): array
    {
        return [
            'miestakonania' => $miestakonania
        ];
    }
    public function fields(): array
    {
        return [
            Input::make('miestakonania.nazov')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Názov miesta'))
                ->placeholder(__('Názov miesta'))
                ->help(__('Zobrazovaný názov miesta (napr. Hlavná budova, Fakulta alebo Katedra, miestnosť atď.)')),
            Input::make('miestakonania.address')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Adresa miesta konania'))
                ->placeholder(__('Addresa miesta konania'))
                ->help(__('Zobrazovaná adresa miesta konania')),
        ];
    }
}
