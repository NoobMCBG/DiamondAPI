<?php

declare(strict_types=1);

namespace NoobMCBG\DiamondAPI\commands\subcommands;

use pocketmine\player\Player;
use pocketmine\Server;
use pocketmine\command\CommandSender;
use NoobMCBG\DiamondAPI\DiamondAPI;
use NoobMCBG\DiamondAPI\commands\subcommands\SubCommand;

class SeeSubCommands implements SubCommand {

	public function execute(CommandSender $sender, array $args, string $name){
		$instance = DiamondAPI::getInstance();
		if(isset($args[0])){
			$p = $instance->getServer()->getPlayerByPrefix($args[0]);
			if(!$instance->diamond->exists($args[0])){
				$sender->sendMessage("§l§c•§e Người Chơi§a ".$args[0]." §eKhông Tồn Tại");
				return true;
			}
			$diamond = $instance->myDiamond($p);
			$sender->sendMessage("§l§c•§e Đã Chỉnh Số Kim Cương Của§a ".$args[0]."§e Là§b $diamond Kim Cương");
		}else{
			$sender->sendMessage("§l§c•§e Sử Dụng:§b /diamond see <player>");
		}
	}
}