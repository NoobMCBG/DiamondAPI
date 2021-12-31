<?php

declare(strict_types=1);

namespace NoobMCBG\DiamondAPI\commands\subcommands;

use pocketmine\player\Player;
use pocketmine\Server;
use pocketmine\command\CommandSender;
use NoobMCBG\DiamondAPI\DiamondAPI;
use NoobMCBG\DiamondAPI\forms\Forms;
use NoobMCBG\DiamondAPI\commands\subcommands\SubCommand;

class TopSubCommands implements SubCommand {

	public function execute(CommandSender $sender, array $args, string $name){
		if(!$sender instanceof Player){
			$sender->sendMessage("§l§c•§e Hãy Sử Dụng Lệnh Trong Trò Chơi !");
			return true;
		}
		Forms::MenuTOPDiamond($sender);
	}
}