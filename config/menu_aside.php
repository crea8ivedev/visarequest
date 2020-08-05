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

        //Services
        [
            'title' => 'Services',
            'icon' => 'public/images/icons/service.svg',
            'bullet' => 'dot',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Processing',
                    'page'  => 'admin/application',
                ],
                [
                    'title' => 'Completed',
                    'page'  => 'admin/application',
                ],
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
        //Finance
        [
            'title' => 'Finance',
            'root'  => true,
            'icon'  => 'public/images/icons/Dollar.svg', // or can be 'flaticon-home' or any flaticon-*
            'page'  => 'admin/finance',
            'new-tab' => false,
        ],


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
                [
                    'title' => 'Feedback',
                    'page' => 'admin/feedback',
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
                    'title' => 'Countries',
                    'page'  => 'admin/country',
                ],
                [
                    'title' => 'Email Templates',
                    'page'  => 'admin/email-template',
                    
                ],
                [
                    'title' => 'Visa Questions',
                    'page' => 'admin/visa-question',
                ],
                [
                    'title' => 'Team Members',
                    'page'  => 'admin/team-member',
                    
                ],
                [
                    'title' => 'Visa Client',
                    'page'  => 'admin/visa-client',
                    
                ],
                [
                    'title' => 'Sliders',
                    'page'  => 'admin/slider',
                    
                ],
                [
                    'title' => 'News',
                    'page' => 'admin/news',
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
        [
            'title' => 'Pages',
            'icon' => 'public/images/icons/service.svg',
            'bullet' => 'dot',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Contact US',
                    'page' => 'admin/contact-us'
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
                    'title' => 'Privacy',
                    'page' => 'admin/privacy',
                ],
                [
                    'title' => 'Disclaimer',
                    'page' => 'admin/disclaimer',
                ],
                [
                    'title' => 'Meta Setting',
                    'page' => 'admin/meta-page',
                ],
        ],
        ],
        
    ],

];