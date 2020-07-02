<?php
// Aside menu Admin
return [

    'items' => [
        // Dashboard
        [
            'title' => 'Dashboard',
            'root' => true,
            'icon' => 'images/icons/dashboard.svg', 
            'page' => 'admin',
            'new-tab' => false,
        ],

        //Users
        [
            'title' => 'Users',
            'icon' => 'images/icons/Add-user.svg',
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
            ]
        ],

        //Country
        [
            'title' => 'Countries',
            'root'  => true,
            'icon'  => 'images/icons/country.svg', // or can be 'flaticon-home' or any flaticon-*
            'page'  => 'admin/country',
            'new-tab' => false,
        ],

        //Service
        [
            'title' => 'Services',
            'root'  => true,
            'icon'  => 'images/icons/service.svg', // or can be 'flaticon-home' or any flaticon-*
            'page'  => 'admin/service',
            'new-tab' => false,
        ],
        
        

    ],

];
