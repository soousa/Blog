<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;
#use Album\Album\Controller\AlbumController;

return [
    'router' => [
	'router_class' => Zend\Mvc\I18n\Router\TranslatorAwareTreeRouteStack::class,
        'routes' => [
            'home' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'application' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/application[/:action]',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => InvokableFactory::class,
        ],
    ],
	'navigation' => [
        'default' => [
            [
                'label' => 'Home',
                'route' => 'home',
            ],
            [
                'label' => 'Album',
                'route' => 'album',
                'pages' => [
                    [
                        'label'  => 'Add',
                        'route'  => 'album',
                        'action' => 'add',
                    ],
                    [
                        'label'  => 'Edit',
                        'route'  => 'album',
                        'action' => 'edit',
                    ],
                    [
                        'label'  => 'Delete',
                        'route'  => 'album',
                        'action' => 'delete',
                    ],
                ],
            ],
			[
                'label' => 'Book',
                'route' => 'book',
                'pages' => [
                    [
                        'label'  => 'Add',
                        'route'  => 'book',
                        'action' => 'add',
                    ],
                    [
                        'label'  => 'Edit',
                        'route'  => 'book',
                        'action' => 'edit',
                    ],
                    [
                        'label'  => 'Delete',
                        'route'  => 'book',
                        'action' => 'delete',
                    ],
                ],
            ],
			[
                'label' => 'Galerie',
                'route' => 'galerie',
                'pages' => [
                    [
                        'label'  => 'Add',
                        'route'  => 'galerie',
                        'action' => 'add',
                    ],
                    [
                        'label'  => 'Edit',
                        'route'  => 'galerie',
                        'action' => 'edit',
                    ],
                    [
                        'label'  => 'Delete',
                        'route'  => 'galerie',
                        'action' => 'delete',
                    ],
                ],
            ],
			[
                'label' => 'Register',
                'route' => 'register',
                'pages' => [
                    [
                        'label'  => 'Add',
                        'route'  => 'register',
                        'action' => 'add',
                    ],
                    [
                        'label'  => 'Edit',
                        'route'  => 'register',
                        'action' => 'edit',
                    ],
                    [
                        'label'  => 'Delete',
                        'route'  => 'register',
                        'action' => 'delete',
                    ],
                ],
            ],
			[
                'label' => 'Ola',
                'route' => 'ola',
            ],
			[
                'label' => 'Blog',
                'route' => 'blog',
            ],
			
        ],
    ],
	'view_helpers' => [
		'invokables' => [
			'translate' => \Zend\I18n\View\Helper\Translate::class
    ]
],
	'translator' => [
		'locale' => 'de_DE',
			'translation_file_patterns' => [
        [
            'type'     => 'gettext',
            'base_dir' => __DIR__ . '/../language',
            'pattern'  => '%s.mo',
        ],
    ],
],
		'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
