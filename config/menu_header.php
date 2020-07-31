<?php
// Header menu
return [

    'items' => [
        [],
        [
            'title' => 'Dashboard',
            'root' => true,
            'page' => 'admin',
            'new-tab' => false,
        ],

        //Users
        [
            'title' => 'Users',
            'bullet' => 'dot',
            'root' => true,
            'submenu' => [
                'type' => 'classic',
                'alignment' => 'left',
                'items' => [
                    [
                        'title' => 'Admin',
                        'icon' => 'public/images/icons/Add-user.svg',
                        'page' => 'admin/admin'
                    ],
                    [
                        'title' => 'Processors', 
                        'icon' => 'public/images/icons/Add-user.svg',
                        'page' => 'admin/processor'
                    ],
                    [
                        'title' => 'Agents',
                        'icon' => 'public/images/icons/Add-user.svg',
                        'page' => 'admin/agent'
                    ],
                     [
                        'title' => 'Clients',
                        'icon' => 'public/images/icons/Add-user.svg',
                        'page' => 'admin/client'
                    ],
                ]
            ]
        ],

   
        //Service
    
        [
            'title' => 'Services',
            'bullet' => 'dot',
            'root' => true,
            'submenu' => [
                'type' => 'classic',
                'alignment' => 'left',
                  'items' => [
                    [
                        'title' => 'Categories',  
                        'icon'  => 'images/icons/service.svg',
                        'page'  => 'admin/service-category',
                    ],
                    [
                        'title' => 'Services',
                        'icon'  => 'images/icons/service.svg',
                        'page'  => 'admin/service',
                    ],
                    [
                        'title' => 'Processing',
                        'page'  => 'admin/application',
                    ],
            
                ]
            ]
        ],

        //Application
        
        //Finance
        [
            'title' => 'Finance',
            'root'  => true,
            'page'  => 'admin/finance',
            'new-tab' => false,
        ],
        //Update
        [
            'title' => 'Update',
            'bullet' => 'dot',
            'root' => true,
            'submenu' => [
                'type' => 'classic',
                'alignment' => 'left',
                  'items' => [
                      [
                          
                        'title' => 'Countries',
                        'page'  => 'admin/country',
                      ],
                    [
                        'title' => 'Sliders',
                        'page'  => 'admin/slider',
                        
                    ],
                    [
                        'title' => 'Team Members',  
                        'icon'  => 'images/icons/service.svg',
                        'page'  => 'admin/team-member',
                    ],

                    [
                        'title' => 'Email Templates',  
                        'icon'  => 'images/icons/email.svg',
                        'page'  => 'admin/email-template',
                    ],
     
                    [
                        'title' => 'Contact US',
                        'bullet' => 'dot',
                        'submenu' => [
                                [
                                    'title' => 'Contact US',
                                    'page' => 'admin/contact-us'
                                ],
                                [
                                    'title' => 'Social Links',
                                    'page' => 'admin/social-link'
                                ],
                        ],
                    ],
                    [
                        'title' => 'Visa Questions',
                        'page' => 'admin/visa-question',
                    ],
                    [
                        'title' => 'Meta Page',
                        'page' => 'admin/meta-page',
                    ],
                ]
            ]
        ],

        //Update
        [
            'title' => 'Messages',
            'bullet' => 'dot',
            'root' => true,
            'submenu' => [
                'type' => 'classic',
                'alignment' => 'left',
                  'items' => [
                    [
                        'title' => 'Messages',  
                        'icon' => 'images/icons/Mail.svg',
                        'page'  => 'admin/messages',
                    ],
                ]
            ]
        ],
        [
            'title' => 'Pages',
            'bullet' => 'dot',
            'root' => true,
           
                    'submenu' => [
                        'type' => 'classic',
                        'alignment' => 'left',
                          'items' => [
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
                                'title' => 'Meta Setting',
                                'page' => 'admin/meta-page',
                            ],
                          ]
                    ],
        ],

       
    ]

];