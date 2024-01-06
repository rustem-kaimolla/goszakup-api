<?php

namespace RustemKaimolla\GoszakupApi\Client;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class GoszakupClient
{
    private ?Client $client;

    public function __construct(
        string $token,
    )
    {
        $this->client = new Client([
            'base_uri' => 'https://ows.goszakup.gov.kz/v2/',
            'verify' => false, // У goszakup.gov.kz стоит кастомный сертификат
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $token
            ],
        ]);
    }

    /**
     * @throws GuzzleException
     */
    public function get(string $endpoint, array $params = []): \Psr\Http\Message\ResponseInterface
    {
        return $this->client->get(sprintf('%s?%s', $endpoint, http_build_query($params)));
    }

    /**
     * @throws GuzzleException
     */
    public function post(string $endpoint, array $body = []): \Psr\Http\Message\ResponseInterface
    {
        return $this->client->post($endpoint, ['body' => $body]);
    }
}
