<?php

namespace Setor;

return array(
    'controllers' => array(
        'invokables' => array(
            'Setor\Controller\Setor' => 'Setor\Controller\SetorController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'setor' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/setor',
                    'defaults' => array(
                        'controller' => 'Setor\Controller\Setor',
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'store' => array(
                        'type' => 'Segment',
                        'may_terminate' => true,
                        'options' => array(
                            'route' => '/store[/:id]',
                            'constraints' => array(
                                'id' => '[0-9]+'
                            ),
                            'defaults' => array(
                                'action' => 'store',
                            ),
                        ),
                    ),
                    'delete' => array(
                        'type' => 'Segment',
                        'may_terminate' => true,
                        'options' => array(
                            'route' => '/delete[/:id]',
                            'constraints' => array(
                                'id' => '[0-9]+'
                            ),
                            'defaults' => array(
                                'action' => 'delete',
                            ),
                        ),
                    ),
                    'setor-page' => array(
                        'type' => 'Segment',
                        'may_terminate' => true,
                        'options' => array(
                            'route' => '/page[/:page]',
                            'constraints' => array(
                                'page' => '[0-9]+'
                            ),
                            'defaults' => array(
                                'action' => 'index',
                                'page' => 1
                            ),
                        ),
                    ),
                )
            ),
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => array(
            'layout/layout' => __DIR__ . '/../../Base/view/layout/layout.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                )
            )
        ),
    ),
//    'service_manager' => array(
//        'factories' => array(
//            'Navigation' => 'Zend\Navigation\Service\DefaultNavigationFactory',
//        )
//    ),
//    'navigation' => array(
//        // The DefaultNavigationFactory we configured in (1) uses 'default' as the sitemap key
//        'default' => array(
//            // And finally, here is where we define our page hierarchy
//            'helpdesk' => array(
//                'label' => 'Helpdesk',
//                'route' => 'helpdesk',
//                'pages' => array(
//                    'abrir-chamado' => array(
//                        'label' => 'Abrir chamado',
//                        'route' => 'helpdesk/open',
//                    )
//                )
//            ),
//        ),
//    ),
);
