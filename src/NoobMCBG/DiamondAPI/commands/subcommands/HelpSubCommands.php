<?php

declare(strict_types=1);

namespace NoobMCBG\DiamondAPI\commands\subcommands;

use function is_numeric;
use pocketmine\command\CommandSender;
use NoobMCBG\DiamondAPI\commands\subcommands\SubCommand;

class HelpSubCommands implements SubCommand {

	public function execute(CommandSender $sender, array $args, string $name){
		if(!isset($args[0])){
			$sender->sendMessage("§l§c•§e Sử Dụng:§b /diamond help");
			return true;
		}
		$sender->sendMessage("§l§c•§e Các Lệnh Về Kim Cương §c•");
		$sender->sendMessage("§l§b/diamond pay§e - Chuyển Kim Cương");
		$sender->sendMessage("§l§b/diamond see§e - Xem Kim Cương Của Người Khác");
		$sender->sendMessage("§l§b/diamond my§e - Xem Số Kim Cương Của Bạn");
		$sender->sendMessage("§l§b/diamond help§e- Các Lệnh Về Kim Cương");
	}
}