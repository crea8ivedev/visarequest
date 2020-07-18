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
                    'title' => 'Categories',
                    'page'  => 'admin/service-category',
                ],
                [
                    'title' => 'Services',
                    'page'  => 'admin/service',
                ],
            ]
        ],

        //Application
        [
            'title' => 'Applications',
            'root'  => true,
            'icon'  => 'public/images/icons/Clipboard.svg', // or can be 'flaticon-home' or any flaticon-*
            'page'  => 'admin/application',
            'new-tab' => false,
        ],

        //Finance
        [
            'title' => 'Finance',
            'root'  => true,
            'icon'  => 'public/images/icons/Dollar.svg', // or can be 'flaticon-home' or any flaticon-*
            'page'  => 'admin/finance',
            'new-tab' => false,
        ],

        //Reports
        // [
        //     'title' => 'Reports',
        //     'root'  => true,
        //     'icon'  => 'public/images/icons/File.svg', // or can be 'flaticon-home' or any flaticon-*
        //     'page'  => 'admin/reports',
        //     'new-tab' => false,
        // ],

        // Contact
        [
            'title' => 'Contact US',
            'root' => true,
            'icon' => 'public/images/icons/Contact1.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => 'admin/contact',
            'new-tab' => false,
            'bullet' => 'dot',
            'submenu' => [
                [
                    'title' => 'Contact US',
                    'page' => 'admin/contact',
                ],
            ]
        ],

        //Update
        [
            'title' => 'Update',
            'icon' => 'public/images/icons/Update.svg',
            'bullet' => 'dot',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Team Members',
                    'page'  => 'admin/team-member',
                    
                ],
                [
                    'title' => 'Email Templates',
                    'page'  => 'admin/email-template',
                    
                ],
                [
                    'title' => 'Terms And Conditions',
                    'page' => 'admin/terms-and-conditions',
                ],
                [
                    'title' => 'About US',
                    'page' => 'admin/about-us',
                ],
                [
                    'title' => 'Contact US',
                    'page' => 'admin/contact-us',
                ],
                [
                    'title' => 'Visa Questions',
                    'page' => 'admin/visa-question',
                ],
            ]
        ],

         //Update
         [
            'title' => 'Messages',
            'icon' => 'public/images/icons/Mail.svg',
            'bullet' => 'dot',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Messages',
                    'page'  => 'admin/messages',
                    
                ],
            ]
        ],
        
    ],

];
