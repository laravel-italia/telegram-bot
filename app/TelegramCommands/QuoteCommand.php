<?php

namespace TelegramBot\TelegramCommands;

use Telegram\Bot\Commands\Command;
use TelegramBot\Services\Coinbase;

class QuoteCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = "quote";

    /**
     * @var string Command Description
     */
    protected $description = "Restituisce la quotazione attuale di una currency";

    /**
     * @inheritdoc
     */
    public function handle($arguments)
    {
      /** @var Coinbase **/
      $coinbase = app(Coinbase::class);
      $currencyCode = trim(strtoupper($arguments));

      switch ($currencyCode) {
        case 'ETH':
        case 'BTC':
          $quote = $coinbase->getPriceFor($currencyCode);
          $this->replyWithMessage(['text' => 'Quotazione ' . $currencyCode . ': €' . $quote]);
          break;

        default:
          $this->replyWithMessage(['text' => 'Mmmh... non conosco questa currency! Specifica "eth" o "btc" dopo il /quote.']);
          break;
      }
    }
}
