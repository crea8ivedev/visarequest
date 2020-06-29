<?php
// Aside menu Admin
return [

    'items' => [
        // Dashboard
        [
            'title' => 'Dashboard',
            'root' => true,
            'icon' => 'public/media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => 'admin',
            'new-tab' => false,
        ],

        //Users
        [
            'title' => 'Users',
            'icon' => 'public/media/svg/icons/Communication/Group.svg',
            'bullet' => 'dot',
            'root' => true,
            
            'submenu' => [
                [
                    'title' => 'Agent',
                    'page' => 'admin/agent'
                ],
                [
                    'title' => 'Processor',
                    'page' => 'admin/processor'
                ],
            ]
        ],

        //Country
        [
            'title' => 'Country',
            'root'  => true,
            'icon'  => 'public/media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
            'page'  => 'admin/country',
            'new-tab' => false,
        ],

        //Service
        [
            'title' => 'Service',
            'root'  => true,
            'icon'  => 'public/media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
            'page'  => 'admin/service',
            'new-tab' => false,
        ],
        
        

    ],

];
