<?php

namespace Blog;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;



return [
	   'service_manager' => [
        'aliases' => [
            Model\PostRepositoryInterface::class => Model\ZendDbSqlRepository::class,   
			Model\PostCommandInterface::class => Model\ZendDbSqlCommand::class,			],
        'factories' => [
            Model\PostRepository::class => InvokableFactory::class,
			Model\ZendDbSqlRepository::class => Factory\ZendDbSqlRepositoryFactory::class,
			Model\PostCommand::class => InvokableFactory::class,
			Model\ZendDbSqlCommand::class => Factory\ZendDbSqlCommandFactory::class,
        ],
    ],
    'controllers'  => [ /** Controller Config */ ],
    'router'       => [ /** Router Config */ ],
    'view_manager' => [ /** View Manager Config */ ],
    'controllers' => [ /** Controller Configuration */ ],
    'router'      => [ /** Route Configuration */ ],
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
	'controllers' => [
    'factories' => [
			Controller\ListController::class => Factory\ListControllerFactory::class,  
			Controller\WriteController::class => Factory\WriteControllerFactory::class,	
			Controller\DeleteController::class => Factory\DeleteControllerFactory::class,	],
    ],
    // This lines opens the configuration for the RouteManager
    'router' => [
		'router_class' => Zend\Mvc\I18n\Router\TranslatorAwareTreeRouteStack::class,
        // Open configuration for all possible routes
        'routes' => [
            // Define a new route called "blog"
            'blog' => [
                // Define a "literal" route type:
                'type' => Literal::class,
                // Configure the route itself
                'options' => [
                    // Listen to "/blog" as uri:
                    'route' => '/blog',
                    // Define default controller and action to be called when
                    // this route is matched
                    'defaults' => [
                        'controller' => Controller\ListController::class,
                        'action'     => 'index',
                    ],
                ],
       'may_terminate' => true,
                'child_routes'  => [
                    'detail' => [
                        'type' => Segment::class,
                        'options' => [
                            'route'    => '/:id',
                            'defaults' => [
                                'action' => 'detail',
                            ],
                            'constraints' => [
                                'id' => '[1-9]\d*',
                            ],
                        ],
                    ],
					
					           // Add the following route:
                    'add' => [
                        'type' => Literal::class,
                        'options' => [
                            'route'    => '/add',
                            'defaults' => [
                                'controller' => Controller\WriteController::class,
                                'action'     => 'add',
                            ],
                        ],
                    ],
					     'edit' => [
                        'type' => Segment::class,
                        'options' => [
                            'route'    => '/edit/:id',
                            'defaults' => [
                                'controller' => Controller\WriteController::class,
                                'action'     => 'edit',
                            ],
					
                        ],
                    ],
						'delete' => [
						'type' => Segment::class,
						'options' => [
							'route' => '/delete/:id',
							'defaults' => [
								'controller' => Controller\DeleteController::class,
								'action'     => 'delete',
                        ],
						
                    ],
					
                ],
            ],
        ],
    ],
    'view_manager'    => [ 'template_path_stack' => [
            __DIR__ . '/../view',
        ],],
	]
		
];


?>