<?php

namespace Register;


use Zend\Db\Adapter\AdapterInterface; //zum datenbank zu tun
use Zend\Db\ResultSet\ResultSet; //zum datenbank zu tun
use Zend\Db\TableGateway\TableGateway; //zum datenbank zu tun
use Zend\ModuleManager\Feature\ConfigProviderInterface;



class Module implements ConfigProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

	 // Add this method:
    public function getServiceConfig()
    {
        return [
            'factories' => [
                Model\RegisterTable::class => function($container) {
                    $tableGateway = $container->get(Model\RegisterTableGateway::class);
                    return new Model\RegisterTable($tableGateway);
                },
                Model\RegisterTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Register());
                    return new TableGateway('register', $dbAdapter, null, $resultSetPrototype);
                },
            ],
        ];
    }
	 // Add this method:
    public function getControllerConfig()
    {
        return [
            'factories' => [
                Controller\RegisterController::class => function($container) {
                    return new Controller\RegisterController(
                        $container->get(Model\RegisterTable::class)
                    );
                },
            ],
        ];
    }
	
	
	
}
	
?>