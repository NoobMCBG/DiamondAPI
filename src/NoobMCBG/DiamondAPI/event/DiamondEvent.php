<?php

namespace NoobMCBG\DiamondAPI\event;

use NoobMCBG\DiamondAPI\DiamondAPI;

use pocketmine\event\plugin\PluginEvent;

class DiamondEvent extends PluginEvent {
  
    public function __construct(DiamondAPI $plugin){
        $this->plugin = $plugin;
    }
}