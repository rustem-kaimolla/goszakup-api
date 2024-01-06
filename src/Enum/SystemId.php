<?php

namespace RustemKaimolla\GoszakupApi\Enum;

/**
 * Идентификатор системы
 */
enum SystemId: int
{
    case PRICE_OFFER = 1;
    case COMPETITION = 2;
    case CURRENT = 3;

    public function title(): string
    {
        return match ($this) {
            self::PRICE_OFFER => 'Модуль “Ценовые предложения”',
            self::COMPETITION => 'Модуль “Конкурс и аукцион”',
            self::CURRENT => 'Текущая версия гос.закупа',
        };
    }
}
