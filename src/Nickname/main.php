<?php
namespace Nickname;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\utils\TextFormat;
use pocketmine\utils\Config;
use pocketmine\permission\ServerOperator;

class Main extends PluginBase implements Listener{
    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->saveDefaultConfig();
        $this->getLogger()->info(TextFormat::AQUA . "Nickname by Martin77Epic loaded.");
    }
    
    public function onDisable(){
        $this->getLogger()->info(TextFormat::AQUA . "Nickname by Martin77Epic disabled.");
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        switch($command->getName()){


case "nick":
                 if (!($sender instanceof Player)){ 
                $sender->sendMessage(TextFormat::GREEN . "This command is only avaible In-Game!");
                    return true;
                }
                $sender->sendMessage(TextFormat::GREEN . "Nick set sucessfully.");
                $sender->setDisplayName(implode(" ", $args));
                          return true;
case "unnick":           
    $name = \strtolower(\array_shift($args));

		$player = $sender->getServer()->getPlayer($name);
		
    if(!(isset($args[0]))){
      $sender->sendMessage(TextFormat::RED."Usage: /unnick <Player>");
      return true;
    }
		if($player instanceof Player){
		  $player->setDisplayName($player->getName());
		  return true;
		}
        }
    }
}
