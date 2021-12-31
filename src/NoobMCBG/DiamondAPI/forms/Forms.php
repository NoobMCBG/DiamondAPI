<?php

declare(strict_types=1);

namespace NoobMCBG\DiamondAPI\forms;

use pocketmine\player\Player;
use NoobMCBG\DiamondAPI\DiamondAPI;
use NoobMCBG\DiamondAPI\libs\jojoe77777\FormAPI\SimpleForm;

class Forms {

	public static function MenuTOPDiamond($player){
		$instance = DiamondAPI::getInstance();
		$kc = $instance->getAllDiamond();
		$message = "";
		$message1 = "";
		if(count($kc) > 0){
			arsort($kc);
			$i = 1;
			foreach($kc as $name => $kc){
				$message .= "§l§c•§e TOP§d $i §a $name §c→§b $diamond Kim Cương\n";
				if($name == $player->getName())$xh=$i;
				if($i == 1000)break;
				++$i;
			}
		}
		$form = new SimpleForm(function(Player $player, $data){
			if($data == null){
				return true;
			}
			switch($data){
				case 0:
				break;
			}
		});
		$form->setTitle("§l§c•§9 TOP Kim Cương §c•");
		$form->setContent("$message");
		$form->addButton("§l§c•§9 Thoát §c•", 0, "textures/blocks/barrier");
		$form->sendToPlayer($player);
	}
}