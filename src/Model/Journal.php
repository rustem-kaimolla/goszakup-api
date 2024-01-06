<?php

namespace RustemKaimolla\GoszakupApi\Model;

class Journal
{
    /**
     * @param string $action       Событие. U - Обновление или изменение документа, D - Удаление документа
     * @param string $objectId     ИД объекта
     * @param string $dateAction   Дата события
     * @param string $serviceName  Имя сервиса в котором произошло изменение
     * @param string $serviceTitle Наименование сервиса
     * @param string $url          Ссылка на документ
     */
    public function __construct(
        public string $action,
        public string $objectId,
        public string $dateAction,
        public string $serviceName,
        public string $serviceTitle,
        public string $url
    )
    {
    }
}
