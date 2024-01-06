<?php

namespace RustemKaimolla\GoszakupApi\Client;

use Carbon\Carbon;
use GuzzleHttp\Exception\GuzzleException;
use RustemKaimolla\GoszakupApi\System\Json;
use RustemKaimolla\GoszakupApi\Model\Journal;
use RustemKaimolla\GoszakupApi\Response\ListResponse;

class JournalClient
{
    private ?GoszakupClient $client;

    public function __construct(
        string $token,
    )
    {
        $this->client = new GoszakupClient($token);
    }

    /**
     * Получение списка измененных объектов
     *
     * @throws GuzzleException
     * @throws \JsonException
     */
    public function get(string $dateFrom, ?string $dateTo = null): ListResponse
    {
        $dateFrom = Carbon::parse($dateFrom)->format('Y-m-d');
        $dateTo   = Carbon::parse($dateTo)->format('Y-m-d');

        $request = $this->client->get(
            'journal',
            [
                'date_from' => $dateFrom,
                'date_to' => $dateTo,
            ]
        );

        $response = Json::decode($request->getBody()->getContents());

        $journal = array_map(function($item) {
            return new Journal(
                $item['action'],
                $item['object_id'],
                $item['date_action'],
                $item['service_name'],
                $item['service_title'],
                $item['url'],
            );
        }, $response['items']);

        return new ListResponse($response['total'], items: $journal);
    }
}
