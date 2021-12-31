<?php

namespace NoobMCBG\DiamondAPI\event;

use NoobMCBG\DiamondAPI\DiamondAPI;

use pocketmine\Player;

use NoobMCBG\DiamondAPI\DiamondEvent;

class DiamondChangeEvent extends DiamondEvent{
  
  public function __construct(DiamondAPI $plugin, $player){
    $this->plugin = $plugin;
    $this->player = $player;
  }
  
  public function getPlayer(){
    return $this->player;
  }
  
  public function getDiamond(){
    return $this->plugin->myDiamond($this->player);
  }
}