<?php

require_once '../../src/CoreBundle/Dictionary/Controllers.php';
require_once '../../src/CoreBundle/Dictionary/Settings.php';
require_once '../../src/WebBundle/Dictionary/Users.php';
require_once '../../src/WebBundle/Dictionary/Statuses.php';
require_once '../../src/WebBundle/Dictionary/Transactions.php';
require_once '../../vendor/autoload.php';

require_once '../../src/CoreBundle/Config/Config.php';
require_once '../../src/CoreBundle/Config/Env.php';
require_once '../../src/CoreBundle/Config/DataBase.php';

require_once '../../src/CoreBundle/Controller/Controller.php';
require_once '../../src/CoreBundle/Controller/RouteParser.php';
require_once '../../src/CoreBundle/Controller/View.php';
require_once '../../src/CoreBundle/Controller/ControllerFactory.php';
require_once '../../src/WebBundle/Controller/AppController.php';
require_once '../../src/WebBundle/Controller/TransactionController.php';

require_once '../../src/CoreBundle/Model/Model.php';
require_once '../../src/WebBundle/Model/App.php';
require_once '../../src/WebBundle/Model/Transaction.php';
require_once '../../src/WebBundle/Model/User.php';

RouteParser::up();

