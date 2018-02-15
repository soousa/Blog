<?php

namespace Galerie;

use Zend\Router\Http\Segment;
#use Zend\ServiceManager\Factory\InvokableFactory;

return [
#    'controllers' => [
 #       'factories' => [
  #          Controller\GalerieController::class => InvokableFactory::class,
    #    ],
	#
	#],
	 // The following section is new and should be added to your file:
    'router' => [
        'routes' => [
            'galerie' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/galerie[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\GalerieController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],

    'view_manager' => [
        'template_path_stack' => [
            'galerie' => __DIR__ . '/../view',
        ],
    ],
];


?>