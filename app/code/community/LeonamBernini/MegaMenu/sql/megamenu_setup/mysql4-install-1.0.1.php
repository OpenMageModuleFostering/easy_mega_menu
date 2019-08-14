<?php

$installer = $this;

$installer->startSetup();

$installer->run("

    -- DROP TABLE IF EXISTS {$this->getTable('lb_megamenu')};
    CREATE TABLE {$this->getTable('lb_megamenu')} (
        `id` int(11) unsigned NOT NULL auto_increment,
        `category` int(11) unsigned not null,
        `product_id` int(11) unsigned null,
        `block_id` varchar(50) null,
        `title` varchar(255) NOT NULL default '',
        `filename` varchar(255) NOT NULL default '',
        `url` varchar(500) NOT NULL default '',
        `target` varchar(255) NOT NULL default '',
        `status` smallint(6) NOT NULL default '0',
        `stores` VARCHAR( 255 ) NOT NULL DEFAULT '0',
        `start_time` datetime NULL default NULL,
        `end_time` datetime NULL default NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

");

$installer->endSetup(); 