<?php

namespace RustemKaimolla\GoszakupApi\Model;

use RustemKaimolla\GoszakupApi\Enum\SystemId;

class Subject
{
    /**
     * @param int         $pid          ID участника
     * @param string      $nameRu       Наименование на русском языке
     * @param string      $nameKz       Наименование на казахском языке
     * @param int         $typeSupplier Тип поставщика (1 - юридическое лицо, 2 - физическое лицо, 3 - ИП)
     * @param string      $indexDate    Дата индексации
     * @param string|null $bin          БИН
     * @param string|null $iin          ИИН
     * @param SystemId    $systemId     ИД Системы
     */
    public function __construct(
        public int      $pid,
        public string   $nameRu,
        public string   $nameKz,
        public int      $typeSupplier,
        public string   $indexDate,
        public ?string  $bin = null,
        public ?string  $iin = null,
        public SystemId $systemId = SystemId::CURRENT,
    )
    {
    }
}
