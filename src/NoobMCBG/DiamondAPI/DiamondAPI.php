<?php

namespace NoobMCBG\DiamondAPI;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\utils\Config;
use pocketmine\event\player\PlayerJoinEvent;
use NoobMCBG\DiamondAPI\event\DiamondChangeEvent;
use NoobMCBG\DiamondAPI\event\DiamondEvent;
use NoobMCBG\DiamondAPI\commands\DiamondAPICommands;

class DiamondAPI extends PluginBase implements Listener {

    public static $instance;

    public static function getInstance(){
        return self::$instance;
    }
  
    public function onEnable() : void {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->diamond = new Config($this->getDataFolder() . "diamond.yml", Config::YAML);
        $this->saveDefaultConfig();
        $this->getServer()->getCommandMap()->register("DiamondAPI", new DiamondAPICommands($this));
        self::$instance = $this;
    }
    
    public function onDisable() : void {
        $this->diamond->save();
    }
    
    public function onJoin(PlayerJoinEvent $ev){
        $player = $ev->getPlayer();
        if(!$this->diamond->exists($player->getName())){
            $this->diamond->set($player->getName(), $this->getConfig()->get("default-diamond"));
            $this->diamond->save();
            $this->getServer()->getPluginManager()->callEvent(new DiamondChangeEvent($this, $player));
        }
    }
    
    public function reduceDiamond($player, $diamond){
        if($player instanceof Player){
            if(is_numeric($diamond)){
                $this->diamond->set(strtolower($player->getName()), ($this->diamond->get($player->getName()) - $diamond));
                $this->diamond->save();
                $this->getServer()->getPluginManager()->callEvent(new DiamondChangeEvent($this, $player));
            }
        }
    }
    
    public function addDiamond($player, $diamond){
        if($player instanceof Player){
            if(is_numeric($diamond)){
                $this->diamond->set(strtolower($player->getName()), ($this->diamond->get($player->getName()) + $diamond));
                $this->diamond->save();
                $this->getServer()->getPluginManager()->callEvent(new DiamondChangeEvent($this, $player));
            }
        }
    }

    public function setDiamond($player, $diamond){
        if($player instanceof Player){
            if(is_numeric($diamond)){
                $this->diamond->set(strtolower($player->getName()), $diamond);
                $this->diamond->save();
                $this->getServer()->getPluginManager()->callEvent(new DiamondChangeEvent($this, $player));
            }
        }
    }
    
    public function myDiamond($player){
        if($player instanceof Player){
            return ($this->diamond->get($player->getName()));
        }
    }
    
    public function getAllDiamond(){
        return $this->diamond->getAll();
    }
}