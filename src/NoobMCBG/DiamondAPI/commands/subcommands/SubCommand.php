<?php

declare(strict_types=1);

namespace NoobMCBG\DiamondAPI\commands\subcommands;

use pocketmine\command\CommandSender;

interface SubCommand {

	/**
	 * @param string[] $args
	 */
	public function execute(CommandSender $sender, array $args, string $name);
}