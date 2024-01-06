<?php

namespace RustemKaimolla\GoszakupApi\Response;

class ListResponse
{
    public function __construct(
        public int   $total,
        public int   $limit = 10,
        public ?int  $nextPage = null,
        public array $items = []
    )
    {
    }
}
