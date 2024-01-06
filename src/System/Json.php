<?php

namespace RustemKaimolla\GoszakupApi\System;

class Json
{
    /**
     * @throws \JsonException
     */
    public static function encode(array $array): string
    {
        return json_encode($array, JSON_THROW_ON_ERROR);
    }

    /**
     * @throws \JsonException
     */
    public static function decode(string $json): array
    {
        return json_decode($json, true, flags: JSON_THROW_ON_ERROR);
    }
}
