<?php 

namespace BackToHub;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;
use pocketmine\event\player\CommandProcessEvent;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\command\Command;

class Main extends PluginBase implements Listener{

	private $FastTransfer;

	public function onEnable(){
	$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->getLogger()->info("BackToHub - Enabled!");
		$this->saveDefaultConfig();
		$this->FastTransfer = $this->getServer()->getPluginManager()->getPlugin("FastTransfer");//fast transfer doesn't have getInstance() function
	}

	public function onDisable(){
		$this->getLogger()->info("BackToHub - Enabled!");
		$this->saveDefaultConfig();
	}

	public function onCommand(CommandSender $sender, Command $command, $label, array $args){
		if($sender instanceof Player){
			$check = $config->get("Hub-Type");
			$msg = $config->get("Message");
			$world = $config->get("Hub-World");
			$ip = $config->get("Hub-Server-IP");
			$port = $config->get("Hub-Server-Port");
			if(strtolower($command->getName('hub'))){
			if($check == "world"){
			$sender->sendTip($msg);
			$sender->teleport($world->getSafeSpawn());

			}else{
				if($check == "server"){
					if(!$this->FastTransfer){
						$this->getLogger()->info(TextFormat::RED."Fast Transfer Must Be Installed!");	
					}else{
						$this->getServer()->dispatchCommand(CommandSender $sender, "transfer " . $sender->getName() . " " . $ip . $port);
						$this->getLogger()->info(TextFormat::GREEN."Sent $sender to " . $ip . ":" . $port . "!");
					}
					}else{
					$this->getLogger()->info(TextFormat::RED."Error In Config!");
					$this->getLogger()->info(TextFormat::RED."Error: Hub-Type Unknown!");
					$this->getLogger()->info(TextFormat::RED."Optional Hub Types:");
					$this->getLogger()->info(TextFormat::RED."world, server");
					}
				}
			}
		}else{
			$this->getLogger()->info(TextFormat::RED."This command can only be ran in-game!");	
		}
	}
}
