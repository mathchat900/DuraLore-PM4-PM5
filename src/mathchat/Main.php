<?php

namespace mathchat;

use pocketmine\plugin\PluginBase;
use mathchat\Listener\DuraLore;
use pocketmine\Server;

class Main extends PluginBase
{
    public function OnEnable(): void {

        $this->saveDefaultConfig();

        Server::getInstance()->getPluginManager()->registerEvents(new DuraLore(), $this);

    }

}