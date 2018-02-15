<?php

namespace Book;

use Zend\Router\Http\Segment;
#use Zend\ServiceManager\Factory\InvokableFactory;

return [
#    'controllers' => [
 #       'factories' => [
  #          Controller\BookController::class => InvokableFactory::class,
    #    ],
	#
	#],
	 // The following section is new and should be added to your file:
    'router' => [
        'routes' => [
            'book' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/book[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\BookController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],

    'view_manager' => [
        'template_path_stack' => [
            'book' => __DIR__ . '/../view',
        ],
    ],
];


?>