<?php

namespace Register;

use Zend\Router\Http\Segment;
#use Zend\ServiceManager\Factory\InvokableFactory;

return [
#    'controllers' => [
 #       'factories' => [
  #          Controller\RegisterController::class => InvokableFactory::class,
    #    ],
	#
	#],
	 // The following section is new and should be added to your file:
    'router' => [
        'routes' => [
            'register' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/register[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\RegisterController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],

    'view_manager' => [
        'template_path_stack' => [
            'register' => __DIR__ . '/../view',
        ],
    ],
];


?>