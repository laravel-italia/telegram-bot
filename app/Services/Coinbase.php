<?php

namespace TelegramBot\Services;

use GuzzleHttp\Client;

class Coinbase
{
    const COINBASE_API_URL = 'https://api.coinbase.com/v2/';

    /** @var Client **/
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getPriceFor($currencyCode)
    {
      if(!in_array($currencyCode, ['BTC', 'ETH'])) {
        throw new \Exception('Currency code must be BTC or ETH');
      }

      $response  = $this->client->get(self::COINBASE_API_URL . 'prices/' . $currencyCode . '-EUR/spot');
      $decodedResponse = json_decode($response->getBody()->getContents(), true);

      return $decodedResponse['data']['amount'];
    }
}
