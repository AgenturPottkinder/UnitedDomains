#!/usr/bin/env php
<?php

set_time_limit(0);
date_default_timezone_set('Europe/Berlin');
require_once __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Console\Application;
$app = new Application();
$app->add(new \Pottkinder\UnitedDomains\Command\MoveDomainToSubAccountCommand());
$app->run();