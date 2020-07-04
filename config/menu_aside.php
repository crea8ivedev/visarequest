<?php
// Aside menu Admin
return [

    'items' => [
        // Dashboard
        [
            'title' => 'Dashboard',
            'root' => true,
            'icon' => 'public/images/icons/dashboard.svg', 
            'page' => 'admin',
            'new-tab' => false,
        ],

        //Users
        [
            'title' => 'Users',
            'icon' => 'public/images/icons/Add-user.svg',
            'bullet' => 'dot',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Admin',
                    'page' => 'admin/admin'
                ],
                [
                    'title' => 'Processors',
                    'page' => 'admin/processor'
                ],
                [
                    'title' => 'Agents',
                    'page' => 'admin/agent'
                ],
                [
                    'title' => 'Clients',
                    'page' => 'admin/client'
                ],
            ]
        ],

        //Country
        [
            'title' => 'Countries',
            'root'  => true,
            'icon'  => 'public/images/icons/country.svg', // or can be 'flaticon-home' or any flaticon-*
            'page'  => 'admin/country',
            'new-tab' => false,
        ],
        
        //Services
        [
            'title' => 'Services',
            'icon' => 'public/images/icons/service.svg',
            'bullet' => 'dot',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Category',
                    'page'  => 'admin/service-category',
                ],
                [
                    'title' => 'Service',
                    'page'  => 'admin/service',
                    ]
            ]
        ],
        //
        // [
        //     'title' => 'Finance',
        //     'page' => 'admin/finace'
        // ],
    ],

];
