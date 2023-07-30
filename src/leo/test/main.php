<?php

declare(strict_types=1);

namespace leo\test;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class TestPlugin extends PluginBase {

    /** @var Config */
    private $config;

    public function onEnable(): void {
        $this->saveDefaultConfig();
        $this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML);
        $this->getLogger()->info("TestPlugin has been enabled.");
    }

    public function onDisable(): void {
        $this->getLogger()->info("TestPlugin has been disabled.");
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool {
        if (strtolower($command->getName()) === "test") {
            $message = $this->config->get("message", "Hello, this plugin is working");
            $sender->sendMessage($message);
            return true;
        }
        return false;
    }
}
