<?php

namespace RustemKaimolla\GoszakupApi\Client;

use GuzzleHttp\Exception\GuzzleException;
use RustemKaimolla\GoszakupApi\System\Json;
use RustemKaimolla\GoszakupApi\Model\Subject;
use RustemKaimolla\GoszakupApi\Enum\SystemId;
use RustemKaimolla\GoszakupApi\Response\ListResponse;

class SubjectClient
{
    private ?GoszakupClient $client;

    public function __construct(
        string $token,
    )
    {
        $this->client = new GoszakupClient($token);
    }

    /**
     * Получение списка компаний участников
     *
     * @throws GuzzleException
     * @throws \JsonException
     */
    public function get(string $dateFrom, ?string $dateTo = null): ListResponse
    {
        $request = $this->client->get('subject');

        $response = Json::decode($request->getBody()->getContents());

        $subjects = array_map(function($item) {
            return new Subject(
                $item['pid'],
                $item['name_ru'],
                $item['name_kz'],
                $item['type_supplier'],
                $item['index_date'],
                $item['bin'],
                $item['iin'],
                SystemId::tryFrom($item['system_id']),
            );
        }, $response['items']);

        return new ListResponse($response['total'], $response['limit'], $response['next_page'], $subjects);
    }
}
