<?php

declare(strict_types=1);

namespace mmm545\NoHello;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\utils\TextFormat as TF;

class Main extends PluginBase implements Listener{
       public function onEnable(){
           $this->getServer()->getPluginManager()->registerEvents($this, $this);
       }

       public function onChatEvent(PlayerChatEvent $event){
           $words = ["hello", "hi"];
           $msg = $event->getMessage();
           foreach($words as $word){
               if(stripos($msg, $word) !== false){
                   $this->getServer()->broadcastMessage(TF::AQUA . "[NoHello] Don't just say hello/hi in the chat " . $event->getPlayer()->getName());
                }
           }
       }
    }