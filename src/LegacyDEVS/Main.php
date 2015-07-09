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

	public function onEnable(){
	$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->getLogger()->info("BackToHub - Enabled!");
		$this->saveDefaultConfig();
	}

	public function onDisable(){
		$this->getLogger()->info(“BackToHub - Enabled!");
		$this->saveDefaultConfig();
	}

	public function onCommand(CommandSender $sender, Command $command, $label, array $args){
		if($sender instanceof Player){
			if(strtolower($command->getName('hub'))){
			if($check == "world"){
			$sender->sendTip($msg);
			$sender->teleport($world->getSafeSpawn());
}else{
if($check == "server"){
$this->getServer()->dispathCommand($sender, "transfer" $sender->getName, $ip $port)
}else{


			
	
		}
}
