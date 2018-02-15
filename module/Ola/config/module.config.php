<?php


namespace Ola;


use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;


return [
    'router' => [
        'routes' => [
            'ola' => [
                'type' => Segment::class,
                'options' => [
                    'route'    => '/ola[/:action]',
                    'defaults' => [
                        'controller' => Controller\OlaController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
		],
	],
    'controllers' => [
        'factories' => [
            Controller\OlaController::class => InvokableFactory::class,
        ],
    ],
		  
    'view_manager' => [
        'template_path_stack' => [
           'ola' => __DIR__ . '/../view',
        ],
    ],
 ];

