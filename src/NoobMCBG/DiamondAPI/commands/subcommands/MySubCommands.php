<?php

declare(strict_types=1);

namespace NoobMCBG\DiamondAPI\commands\subcommands;

use pocketmine\player\Player;
use pocketmine\Server;
use pocketmine\command\CommandSender;
use NoobMCBG\DiamondAPI\DiamondAPI;
use NoobMCBG\DiamondAPI\commands\subcommands\SubCommand;

class MySubCommands implements SubCommand {

	public function execute(CommandSender $sender, array $args, string $name){
		$instance = DiamondAPI::getInstance();
		$diamond = $instance->myDiamond($sender);
		$sender->sendMessage("§l§c•§e Số Kim Cương Của Bạn Hiện Tại:§b $diamond Kim Cương");
	}
}