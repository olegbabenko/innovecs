<?php

namespace CoreBundle\Controller;

use CoreBundle\Dictionary\Controllers;
use CoreBundle\Dictionary\Settings;

Config::set(Settings::DEFAULT_CONTROLLER, Controllers::APP);
Config::set(Settings::DEFAULT_ACTION, Controllers::APP_ACTION);
Config::set(Settings::DB_HOST, 'mysql');
Config::set(Settings::DB_USER, 'root');
Config::set(Settings::DB_PASSWORD, 'secret');
Config::set(Settings::DB_NAME, 'innovecs');
