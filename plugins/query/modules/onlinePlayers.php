<?php
$config->setDefault("image-src", "http://cravatar.eu/avatar/{NAME}/64");

$imageSrc = $config->get("image-src");
?>
<div class="text-center">
    <?php
    foreach ($plugin->onlinePlayers() as $player):

        ?>
        <a href="<?= $url->player($player) ?>">
            <img src="<?= str_replace("{NAME}", $player, $imageSrc) ?>" alt="<?= $player ?>" title="<?= $player ?>"
                 data-toggle="tooltip" data-placement="top">
        </a>
    <?php endforeach; ?>
</div>