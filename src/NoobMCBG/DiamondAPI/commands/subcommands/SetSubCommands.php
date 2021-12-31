<?php

declare(strict_types=1);

namespace NoobMCBG\DiamondAPI\commands\subcommands;

use pocketmine\player\Player;
use pocketmine\Server;
use pocketmine\command\CommandSender;
use NoobMCBG\DiamondAPI\DiamondAPI;
use NoobMCBG\DiamondAPI\commands\subcommands\SubCommand;

class SetSubCommands implements SubCommand {

	public function execute(CommandSender $sender, array $args, string $name){
		$instance = DiamondAPI::getInstance();
		if(isset($args[0])){
			if(isset($args[1])){
				$p = $instance->getServer()->getPlayerByPrefix($args[0]);
				if(!is_numeric($args[1])){
	                $sender->sendMessage("§l§c•§e Bạn Cần Ghi Số Kim Cương Muốn Chỉnh");
	                return true;
				}
				if(!$instance->diamond->exists($args[0])){
					$sender->sendMessage("§l§c•§e Người Chơi§a ".$args[0]." §eKhông Tồn Tại");
					return true;
				}
				$diamond = (int)$args[1];
				$instance->setDiamond($p, $diamond);
			    $sender->sendMessage("§l§c•§e Đã Chỉnh Số Kim Cương Của§a ".$args[0]."§e Thành§b $diamond Kim Cương");
			    if($instance->getServer()->getPlayerByPrefix($args[0]) !== null) $p->sendMessage("§l§c•§e Số Kim Cương Của Bạn Đã Được Chỉnh Thành§b $diamond Kim Cương");
			}else{
				$sender->sendMessage("§l§c•§e Sử Dụng:§b /diamond set <player> <diamond>");
			}
		}else{
			$sender->sendMessage("§l§c•§e Sử Dụng:§b /diamond set <player> <diamond>");
		}
	}
}