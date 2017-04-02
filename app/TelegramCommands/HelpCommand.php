<?php

namespace TelegramBot\TelegramCommands;

use Telegram\Bot\Commands\Command;

class HelpCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = "help";

    /**
     * @var string Command Description
     */
    protected $description = "Comando di benvenuto, eseguito di default";

    /**
     * @inheritdoc
     */
    public function handle($arguments)
    {
        $this->replyWithMessage(['text' => 'Ciao! Sono TokenBot! Scrivi "/quote btc" per conoscere il prezzo di un Bitcoin, oppure "/quote eth" per conoscere il prezzo di un Ethereum.']);
    }
}
