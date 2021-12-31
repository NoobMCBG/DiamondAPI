<?php

declare(strict_types=1);

namespace NoobMCBG\DiamondAPI\commands;

use pocketmine\Server;
use pocketmine\player\Player;
use pocketmine\command\{Command, CommandSender};
use pocketmine\plugin\Plugin;
use NoobMCBG\DiamondAPI\DiamondAPI;
use NoobMCBG\DiamondAPI\commands\subcommands\GiveSubCommands;
use NoobMCBG\DiamondAPI\commands\subcommands\TakeSubCommands;
use NoobMCBG\DiamondAPI\commands\subcommands\SetSubCommands;
use NoobMCBG\DiamondAPI\commands\subcommands\HelpSubCommands;
use NoobMCBG\DiamondAPI\commands\subcommands\MySubCommands;
use NoobMCBG\DiamondAPI\commands\subcommands\SeeSubCommands;
use NoobMCBG\DiamondAPI\commands\subcommands\PaySubCommands;
use NoobMCBG\DiamondAPI\commands\subcommands\TopSubCommands;

class DiamondAPICommands extends Command {

	protected $plugin;

	public array $subcommands = [];

	public function __construct(DiamondAPI $plugin){
        $this->plugin = $plugin;
        parent::__construct("diamond", "Lệnh Về Đơn Vị Tiền Kim Cương", \null, ["kimcuong", "kc"]);
        $this->setPermission("diamondapi.*");
        $this->subcommands["give"] = new GiveSubCommands;
		$this->subcommands["take"] = new TakeSubCommands;
		$this->subcommands["set"] = new SetSubCommands;
		$this->subcommands["help"] = new HelpSubCommands;
		$this->subcommands["my"] = new MySubCommands;
		$this->subcommands["see"] = new SeeSubCommands;
		$this->subcommands["pay"] = new PaySubCommands;
		$this->subcommands["top"] = new TopSubCommands;
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args) {
		if(!isset($args[0])) {
			$sender->sendMessage("§l§c•§e Sử Dụng: §b/diamond help");
			return true;
		}
		$subCommandName = $this->getSubCommandNameByAlias($args[0]);
		if($subCommandName === null) {
			$sender->sendMessage("§l§c•§e Sử Dụng: §b/diamond help");
			return true;
		}
		$subCommand = $this->subcommands[$subCommandName] ?? null;
		if($subCommand === null) {
			$sender->sendMessage("§l§c•§e Sử Dụng: §b/diamond help");
			return true;
		}
		if(!$this->checkPermissions($sender, $args[0])) {
			$sender->sendMessage("§l§c•§e Bạn Không Có Quyền Sử Dụng Lệnh Này !");
			return true;
		}
		array_shift($args);
		$subCommand->execute($sender, $args, $subCommandName);
	}

	public function getSubCommandNameByAlias(string $alias): ?string {
		switch($alias) {
			case "help":
			case "?":
				return "help";
			case "give":
			case "cho":
			case "g":
				return "give";
			case "take":
			case "t":
			case "lay":
				return "take";
			case "set":
			case "s":
			case "chinh":
				return "set";
			case "my":
			case "m":
				return "my";
			case "see":
			case "xem":
				return "see";
			case "top":
			case "xephang":
				return "top";
		    case "pay":
		    case "chuyen":
		        return "pay";
		}
		return null;
	}

	public function checkPermissions(CommandSender $sender, string $command): bool {
		if($sender instanceof Player && !$sender->hasPermission("diamondapi.{$this->getSubCommandNameByAlias($command)}")) {
			$sender->sendMessage("§l§c•§e Bạn Không Có Quyền Sử Dụng Lệnh Này !");
			return false;
		}
		return true;
	}

	public function getServer() : Server {
		return Server::getInstance();
	}

	public function getOwningPlugin() : Plugin {
		return DiamondAPI::getInstance();
	} 
}