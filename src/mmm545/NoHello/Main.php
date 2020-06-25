<?php

declare(strict_types=1);

namespace mmm545\NoHello;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\scheduler\ClosureTask;
use pocketmine\utils\TextFormat as TF;

class Main extends PluginBase implements Listener{
       public function onEnable(){
           $this->getServer()->getPluginManager()->registerEvents($this, $this);
       }

       public function onChatEvent(PlayerChatEvent $event){
           $words = ["hello", "hi"];
           $msg = $event->getMessage();
           foreach($words as $word){
               if(preg_match('/\b'.$word.'\b/i', $msg)){
                   $event->setMessage(TF::RED. $msg);
                   $this->getScheduler()->scheduleDelayedTask(new ClosureTask(function(int $tick) use($event) : void {
                       $this->getServer()->broadcastMessage(TF::AQUA . "[NoHello] Don't Just Say Hello/Hi in Chat " . $event->getPlayer()->getName());
                   }), 5);
                }
           }
       }
    }