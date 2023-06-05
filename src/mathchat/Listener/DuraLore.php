<?php

namespace mathchat\Listener;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerItemUseEvent;
use pocketmine\item\Tool;
use pocketmine\player\Player;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\item\ItemFactory;
use pocketmine\item\getTypeId;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\item\getArmorSlot;
use pocketmine\item\Durable;

class DuraLore implements Listener
{

    public function OnDamage(EntityDamageEvent $event)
    {
        $player = $event->getEntity();
        if ($player instanceof Player) {
            $armor = $player->getArmorInventory();
            if ($armor->getHelmet()->getTypeId() !== 0) {
                $helmet = $armor->getHelmet();
                if ($helmet instanceof Durable) {
                    $dura = $helmet->getMaxDurability() - $helmet->getDamage();
                    $max = $helmet->getMaxDurability();
                    $helmet->setLore(["§c$dura/$max"]);
                    $armor->setHelmet($helmet);
                }
            }
            if ($armor->getChestplate()->getTypeId() !== 0) {
                $chestplate = $armor->getChestplate();
                if ($chestplate instanceof Durable) {
                    $dura = $chestplate->getMaxDurability() - $chestplate->getDamage();
                    $max = $chestplate->getMaxDurability();
                    $chestplate->setLore(["§c$dura/$max"]);
                    $armor->setChestplate($chestplate);
                }
            }
            if ($armor->getLeggings()->getTypeId() !== 0) {
                $leggings = $armor->getLeggings();
                if ($leggings instanceof Durable) {
                    $dura = $leggings->getMaxDurability() - $leggings->getDamage();
                    $max = $leggings->getMaxDurability();
                    $leggings->setLore(["§c$dura/$max"]);
                    $armor->setLeggings($leggings);
                }
            }
            if ($armor->getBoots()->getTypeId() !== 0) {
                $boots = $armor->getBoots();
                if ($boots instanceof Durable) {
                    $dura = $boots->getMaxDurability() - $boots->getDamage();
                    $max = $boots->getMaxDurability();
                    $boots->setLore(["§c$dura/$max"]);
                    $armor->setBoots($boots);
                }
            }
        }
    }


    public function useToEntity(EntityDamageByEntityEvent $event)
    {
        $player = $event->getDamager();
        if($player instanceof Player) {
            $item = $player->getInventory()->getItemInHand();
            if ($item instanceof Tool) {
                $dura = $item->getMaxDurability() - $item->getDamage();
                $max = $item->getMaxDurability();
                $item->setLore(["$dura / $max"]);
                $player->getInventory()->setItemInHand($item);

            }
        }
    }

    public function useItem(PlayerItemUseEvent $event)
    {
        $player = $event->getPlayer();
        if($player instanceof Player) {
            $item = $player->getInventory()->getItemInHand();
            if ($item instanceof Tool) {
                    $dura = $item->getMaxDurability() - $item->getDamage();
                    $max = $item->getMaxDurability();
                    $item->setLore(["$dura / $max"]);
                    $player->getInventory()->setItemInHand($item);
                }
            }
        }



    public function OnBreak(BlockBreakEvent $event){
        $player = $event->getPlayer();
        if($player instanceof Player) {
            $item = $player->getInventory()->getItemInHand();
            if ($item instanceof Tool) {
                    $dura = $item->getMaxDurability() - $item->getDamage();
                    $max = $item->getMaxDurability();
                    $item->setLore(["$dura / $max"]);
                    $player->getInventory()->setItemInHand($item);
                }
            }
        }

}