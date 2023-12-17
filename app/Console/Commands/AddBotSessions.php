<?php

namespace App\Console\Commands;

use App\Models\BotSession;
use App\Models\BotResponse;
use App\Models\BotSessionStep;
use Illuminate\Console\Command;

class AddBotSessions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:bot-steps';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $bot_sessions = [
            [
                'session_name' => 'hi',
                'channel' => 'WA',
                'session_switching' => 1,
                'session_key_word' => 0,
                'session_steps' => [
                    [
                        'channel' => 'WA',
                        'is_initial_step' => true,
                        'session_step' => 0,
                        'step_title' => "Hello👋🏽, welcome to doctor's appointment. Choose an option below👇🏽to continue.\n",
                        'next_session_step' => 1,
                        // 'service_methods' => [
                        //     [
                        //         'method_name' => 'getCounty',
                        //         'method_type' => 'get_county',
                        //     ]
                        // ],
                        'back_to_session' => false,
                        'previous_session_name' => null,
                        'allow_back' => false,
                        'previous_session_step' => null,
                        'with_input' => 0,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 1,
                                'response_text' => 'Book Appointment',
                                'show_step_id' => 1,
                                'next_session_step' => 1,
                                'previous_session_step' => null,
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 2,
                                'response_text' => 'Appointment History',
                                'show_step_id' => 1,
                                'next_session_step' => 1,
                                'previous_session_step' => null,
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 3,
                                'response_text' => 'Customer Care',
                                'show_step_id' => 1,
                                'next_session_step' => 1,
                                'previous_session_step' => null,
                            ]

                        ]
                    ]
                ]
            ],
            [
                'session_name' => '99',
                'channel' => 'WA',
                'session_switching' => 1,
                'session_key_word' => 0,
                'session_steps' => [
                    [
                        'channel' => 'WA',
                        'is_initial_step' => true,
                        'session_step' => 0,
                        'step_title' => "Hello👋🏽, welcome to doctor's appointment. Choose an option below👇🏽to continue.\n",
                        'next_session_step' => 1,
                        // 'service_methods' => [
                        //     [
                        //         'method_name' => 'getCounty',
                        //         'method_type' => 'get_county',
                        //     ]
                        // ],
                        'back_to_session' => false,
                        'previous_session_name' => null,
                        'allow_back' => false,
                        'previous_session_step' => null,
                        'with_input' => 0,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 1,
                                'response_text' => 'Book Appointment',
                                'show_step_id' => 1,
                                'next_session_step' => 1,
                                'previous_session_step' => null,
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 2,
                                'response_text' => 'Appointment History',
                                'show_step_id' => 1,
                                'next_session_step' => 1,
                                'previous_session_step' => null,
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 3,
                                'response_text' => 'Customer Care',
                                'show_step_id' => 1,
                                'next_session_step' => 1,
                                'previous_session_step' => null,
                            ]

                        ]
                    ]
                ]
            ],
            [
                'session_name' => 'book appointment',
                'channel' => 'WA',
                'session_switching' => 1,
                'session_key_word' => 1,
                'session_steps' => [
                    [
                        'channel' => 'WA',
                        'is_initial_step' => true,
                        'session_step' => 0,
                        'step_title' => "Choose a date👇🏽 to book an appointment.\n\n",
                        'next_session_step' => 1,
                        'reply_type' => 'list',
                        'back_to_session' => false,
                        'previous_session_name' => null,
                        'allow_back' => false,
                        'previous_session_step' => null,
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 1,
                                'show_step_id' => 1,
                                'response_text' => "Monday",
                                'next_session_step' => 1
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 2,
                                'show_step_id' => 1,
                                'response_text' => "Tuesday",
                                'next_session_step' => 1
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 3,
                                'show_step_id' => 1,
                                'response_text' => "Wednesday",
                                'next_session_step' => 1
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 4,
                                'show_step_id' => 1,
                                'response_text' => "Thursday",
                                'next_session_step' => 1
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 5,
                                'show_step_id' => 1,
                                'response_text' => "Friday",
                                'next_session_step' => 1
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 6,
                                'show_step_id' => 1,
                                'response_text' => "Saturday",
                                'next_session_step' => 1
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 7,
                                'show_step_id' => 1,
                                'response_text' => "Sunday",
                                'next_session_step' => 1
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 8,
                                'show_step_id' => 0,
                                'response_text' => "\n\nType *99* to go back home",
                                'next_session_step' => 1
                            ]
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 1,
                        'step_title' => "Choose time👇🏽 to continue.\n\n",
                        'next_session_step' => 2,
                        // 'service_methods' => [
                        //     [
                        //         'method_name' => 'getProduct',
                        //         'method_type' => 'get_product',
                        //     ]
                        // ],
                        'reply_type' => 'list',
                        'back_to_session' => false,
                        'previous_session_name' => null,
                        'allow_back' => true,
                        'previous_session_step' => 0,
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 1,
                                'show_step_id' => 1,
                                'response_text' => "10:00 AM",
                                'next_session_step' => 2
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 2,
                                'show_step_id' => 1,
                                'response_text' => "11:00 AM",
                                'next_session_step' => 2
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 3,
                                'show_step_id' => 1,
                                'response_text' => "12:00 PM",
                                'next_session_step' => 2
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 4,
                                'show_step_id' => 1,
                                'response_text' => "13:00 PM",
                                'next_session_step' => 2
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 5,
                                'show_step_id' => 1,
                                'response_text' => "14:00 PM",
                                'next_session_step' => 2
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 6,
                                'show_step_id' => 1,
                                'response_text' => "15:00 PM",
                                'next_session_step' => 2
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 7,
                                'show_step_id' => 0,
                                'response_text' => "\n\nType *0* to go back one step\nType *99* to go back home",
                                'next_session_step' => 2
                            ]
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 2,
                        'step_title' => "The booking price is 500 KES.\n\n",
                        'next_session_step' => 3,
                        'service_methods' => [
                            [
                                'method_name' => 'getMpesa',
                                'method_type' => 'get_mpesa',
                            ]
                        ],
                        'back_to_session' => false,
                        'previous_session_name' => null,
                        'allow_back' => true,
                        'previous_session_step' => 0,
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 1,
                                'show_step_id' => 1,
                                'response_text' => "Confirm",
                                'next_session_step' => 3
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 2,
                                'show_step_id' => 1,
                                'response_text' => "Cancel",
                                'next_session_step' => 4
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 3,
                                'show_step_id' => 0,
                                'response_text' => "\n\nType *0* to go back one step\nType *99* to go back home",
                                'next_session_step' => 2
                            ]

                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 3,
                        'step_title' => "Thank you for booking an appointmnet with me.\n\nType *0* to go back one step\nType *99* to go back home",
                        'next_session_step' => 0,
                        'back_to_session' => false,
                        'previous_session_name' => null,
                        'allow_back' => true,
                        'previous_session_step' => 0,
                        'with_input' => 0,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 1,
                                'show_step_id' => 0,
                                'response_text' => "",
                                'next_session_step' => 2
                            ]

                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 4,
                        'step_title' => "The booking was not successful. Kindly confirm to book the appointment.\n\nType *0* to go back one step\nType *99* to go back home",
                        'next_session_step' => 4,
                        'back_to_session' => false,
                        'previous_session_name' => null,
                        'allow_back' => true,
                        'previous_session_step' => 0,
                        'with_input' => 0,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 1,
                                'show_step_id' => 0,
                                'response_text' => "",
                                'next_session_step' => 2
                            ]

                        ]
                    ]
                ]
            ],
            [
                'session_name' => 'appointment history',
                'channel' => 'WA',
                'session_switching' => 1,
                'session_key_word' => 2,
                'session_steps' => [
                    [
                        'channel' => 'WA',
                        'is_initial_step' => true,
                        'session_step' => 0,
                        'step_title' => "Please reply with a number to choose an option below👇🏽to continue.\n\n",
                        'next_session_step' => 1,
                        'reply_type' => 'list',
                        'back_to_session' => false,
                        'previous_session_name' => null,
                        'allow_back' => false,
                        'previous_session_step' => null,
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 1,
                                'show_step_id' => 1,
                                'response_text' => "Accent",
                                'next_session_step' => 1
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 2,
                                'show_step_id' => 1,
                                'response_text' => "Clean & Bright",
                                'next_session_step' => 3
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 3,
                                'show_step_id' => 1,
                                'response_text' => "Neutral & Natural",
                                'next_session_step' => 3
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 4,
                                'show_step_id' => 1,
                                'response_text' => "Pastels",
                                'next_session_step' => 3
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 5,
                                'show_step_id' => 1,
                                'response_text' => "Soft & Muted",
                                'next_session_step' => 3
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 6,
                                'show_step_id' => 1,
                                'response_text' => "Whites",
                                'next_session_step' => 3
                            ]
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 1,
                        'step_title' => "",
                        'next_session_step' => 2,
                        'reply_type' => 'inline_buttons',
                        'button_header_type' => 'image',
                        'is_next_step_session' => true,
                        'back_to_session' => false,
                        'previous_session_name' => null,
                        'allow_back' => true,
                        'previous_session_step' => 9,
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 1,
                                'show_step_id' => 0,
                                'image_url' => "https://edonation.s3.amazonaws.com/product_images/types-of-beans-mung-600x400.jpg",
                                'response_text' => "YELLOW CLUSTER AP153-1",
                                'next_session_step' => 13,
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 2,
                                'show_step_id' => 0,
                                'image_url' => "https://edonation.s3.amazonaws.com/product_images/types-of-beans-mung-600x400.jpg",
                                'response_text' => "SUNRAY AP153-2",
                                'next_session_step' => 13,
                            ]
                            // [
                            //   'channel' => 'WA',
                            //   'key_word' => 2,
                            //   'show_step_id' => 0,
                            //   'image_url' => "https://api1.sasa.ai/images/tuta-absoluta.jpg",
                            //   'response_text' => "*Tuta Absoluta*\n\nThis moth is grey-brown, same size and posture as diamond back moth (DBM) and has a long antenna.\nThe Pupa is light brown.\nThe larva (caterpillar) is the damaging stage.\nIt bores on fruits, leaving symptomatic tiny holes.\nIt also burrows on stems causing breakages.\nCan lead to 100% crop loss.\n*SOLUTION.*\nEarly control is important before the pest pressure builds up\nUse PASSWORD 57WDG® 4gms/20L, FIREWORKS 90SC® 10mls/20L, RELAY 150SC® 5mls/20L.",
                            //   'next_session_step' => 13,
                            //   'next_session' => 'agrovet'
                            // ]

                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 2,
                        'step_title' => "Please reply with a number to choose an option below👇🏽to continue.\n\n",
                        'next_session_step' => 3,
                        'reply_type' => 'list',
                        'back_to_session' => false,
                        'previous_session_name' => null,
                        'allow_back' => true,
                        'previous_session_step' => 0,
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 1,
                                'show_step_id' => 1,
                                'response_text' => "Yellow Cluster",
                                'next_session_step' => 2
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 2,
                                'show_step_id' => 1,
                                'response_text' => "Sunray",
                                'next_session_step' => 2
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 3,
                                'show_step_id' => 1,
                                'response_text' => "Meadow Daisy",
                                'next_session_step' => 2
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 4,
                                'show_step_id' => 0,
                                'response_text' => "\n\nType *0* to go back one step\nType *99* to go back home",
                                'next_session_step' => 2
                            ]
                        ]
                    ]
                ]
            ],
            [
                'session_name' => 'customer care',
                'channel' => 'WA',
                'session_switching' => 1,
                'session_key_word' => 3,
                'session_steps' => [
                    [
                        'channel' => 'WA',
                        'is_initial_step' => true,
                        'session_step' => 0,
                        'step_title' => "Choose a county to find a painter\n\n",
                        'next_session_step' => 1,
                        'back_to_session' => false,
                        'previous_session_name' => null,
                        'reply_type' => 'list',
                        'allow_back' => false,
                        'previous_session_step' => null,
                        'with_input' => 0,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 1,
                                'show_step_id' => 1,
                                'response_text' => "Nairobi\n",
                                'next_session_step' => 1
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 2,
                                'show_step_id' => 1,
                                'response_text' => "Mombasa\n",
                                'next_session_step' => 1
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 3,
                                'show_step_id' => 1,
                                'response_text' => "Kisumu\n",
                                'next_session_step' => 1
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 4,
                                'show_step_id' => 1,
                                'response_text' => "Thika\n",
                                'next_session_step' => 1
                            ]
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 1,
                        'step_title' => "Here is the list of painters in your county.\n\n",
                        'next_session_step' => 2,
                        'reply_type' => 'list',
                        'back_to_session' => false,
                        'previous_session_name' => null,
                        'allow_back' => true,
                        'previous_session_step' => 0,
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 1,
                                'show_step_id' => 1,
                                'response_text' => "John Kamau\n",
                                'next_session_step' => 2
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 2,
                                'show_step_id' => 1,
                                'response_text' => "David Mwenyewe\n",
                                'next_session_step' => 2
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 3,
                                'show_step_id' => 1,
                                'response_text' => "Mary Jane\n",
                                'next_session_step' => 2
                            ]
                        ]
                    ]

                ]
            ],
            [
                'session_name' => 'team_kubwa',
                'channel' => 'WA',
                'session_switching' => 1,
                'session_key_word' => 4,
                'session_steps' => [
                    [
                        'channel' => 'WA',
                        'is_initial_step' => true,
                        'session_step' => 0,
                        'step_title' => "Please reply with a number to choose an option below👇🏽to continue.\n\n",
                        'next_session_step' => 1,
                        'back_to_session' => false,
                        'previous_session_name' => null,
                        'allow_back' => false,
                        'previous_session_step' => null,
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 1,
                                'show_step_id' => 1,
                                'response_text' => "Mobi Loan",
                                'next_session_step' => 1
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 2,
                                'show_step_id' => 1,
                                'response_text' => "Normal Loan",
                                'next_session_step' => 3
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 3,
                                'show_step_id' => 1,
                                'response_text' => "Guarantee Loan",
                                'next_session_step' => 3
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 4,
                                'show_step_id' => 1,
                                'response_text' => "Clear Loan",
                                'next_session_step' => 3
                            ]
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 1,
                        'step_title' => "Please send a clear image of the car.",
                        'next_session_step' => 2,
                        'back_to_session' => false,
                        'previous_session_name' => null,
                        'allow_back' => true,
                        'previous_session_step' => 0,
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 1,
                                'show_step_id' => 0,
                                'response_text' => "\n\nType *0* to go back one step\nType *99* to go back home",
                                'next_session_step' => 2
                            ]
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 2,
                        'step_title' => "Thank you profilename, for sending the car image🙂. You will be contacted by the car dealer.",
                        'next_session_step' => 200,
                        'back_to_session' => false,
                        'previous_session_name' => null,
                        'allow_back' => true,
                        'previous_session_step' => 1,
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 1,
                                'show_step_id' => 0,
                                'response_text' => "\n\nType *0* to go back one step\nType *99* to go back home",
                                'next_session_step' => 200
                            ]
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 3,
                        'step_title' => "Please write a description of the car. Include the make and model of the car in one text. For example, Toyota Ractis new model.",
                        'next_session_step' => 4,
                        'back_to_session' => false,
                        'previous_session_name' => null,
                        'allow_back' => true,
                        'previous_session_step' => 0,
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 1,
                                'show_step_id' => 0,
                                'response_text' => "\n\nType *0* to go back one step\nType *99* to go back home",
                                'next_session_step' => 4
                            ]
                        ]
                    ],
                    [
                        'channel' => 'WA',
                        'is_initial_step' => false,
                        'session_step' => 4,
                        'step_title' => "Thank you profilename, for sending the car description🙂. You will be contacted by the car dealer.",
                        'next_session_step' => 5,
                        'back_to_session' => false,
                        'previous_session_name' => null,
                        'allow_back' => true,
                        'previous_session_step' => 3,
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 1,
                                'show_step_id' => 0,
                                'response_text' => "\n\nType *0* to go back one step\nType *99* to go back home",
                                'next_session_step' => 1
                            ]
                        ]
                    ]

                ]
            ],
            [
                'session_name' => 'crown_your_space',
                'channel' => 'WA',
                'session_switching' => 1,
                'session_key_word' => 5,
                'session_steps' => [
                    [
                        'channel' => 'WA',
                        'is_initial_step' => true,
                        'session_step' => 0,
                        'step_title' => "Please reply with a number to choose an option below👇🏽to continue.\n\n",
                        'next_session_step' => 1,
                        'back_to_session' => false,
                        'previous_session_name' => null,
                        'allow_back' => false,
                        'previous_session_step' => null,
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 1,
                                'show_step_id' => 1,
                                'response_text' => "Mobi Loan",
                                'next_session_step' => 1
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 2,
                                'show_step_id' => 1,
                                'response_text' => "Normal Loan",
                                'next_session_step' => 3
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 3,
                                'show_step_id' => 1,
                                'response_text' => "Guarantee Loan",
                                'next_session_step' => 3
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 4,
                                'show_step_id' => 1,
                                'response_text' => "Clear Loan",
                                'next_session_step' => 3
                            ]
                        ]
                    ]
                ]
            ],
            [
                'session_name' => 'crown_colour_app',
                'channel' => 'WA',
                'session_switching' => 1,
                'session_key_word' => 6,
                'session_steps' => [
                    [
                        'channel' => 'WA',
                        'is_initial_step' => true,
                        'session_step' => 0,
                        'step_title' => "Please reply with a number to choose an option below👇🏽to continue.\n\n",
                        'next_session_step' => 1,
                        'back_to_session' => false,
                        'previous_session_name' => null,
                        'allow_back' => false,
                        'previous_session_step' => null,
                        'with_input' => 1,
                        'responses' => [
                            [
                                'channel' => 'WA',
                                'key_word' => 1,
                                'show_step_id' => 1,
                                'response_text' => "Mobi Loan",
                                'next_session_step' => 1
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 2,
                                'show_step_id' => 1,
                                'response_text' => "Normal Loan",
                                'next_session_step' => 3
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 3,
                                'show_step_id' => 1,
                                'response_text' => "Guarantee Loan",
                                'next_session_step' => 3
                            ],
                            [
                                'channel' => 'WA',
                                'key_word' => 4,
                                'show_step_id' => 1,
                                'response_text' => "Clear Loan",
                                'next_session_step' => 3
                            ]
                        ]
                    ]
                ]
            ]


        ];
        foreach ($bot_sessions as $bot_session) {

            if (!BotSession::where('session_name', $bot_session['session_name'])
                ->where('channel', $bot_session['channel'])
                ->exists()) {

                $bot_session_model = new BotSession();

                $bot_session_model->session_name = $bot_session['session_name'];
                $bot_session_model->session_key_word = $bot_session['session_key_word'];
                $bot_session_model->channel = $bot_session['channel'];

                $bot_session_model->save();
            } else {

                $bot_session_model = BotSession::where('session_name', $bot_session['session_name'])
                    ->where('channel', $bot_session['channel'])
                    ->first();
            }

            foreach ($bot_session['session_steps'] as $session_step) {

                if (!BotSessionStep::where('session_step_key', $session_step['session_step'])
                    ->where('bot_session_id', $bot_session_model->id)
                    ->where('channel', $bot_session['channel'])
                    ->exists()) {

                    $bot_session_step = new BotSessionStep();

                    $bot_session_step->bot_session_id = $bot_session_model->id;
                    $bot_session_step->session_step_key = $session_step['session_step'];
                    $bot_session_step->next_session_step_key = $session_step['next_session_step'];
                    $bot_session_step->channel = $session_step['channel'];
                    $bot_session_step->step_title = $session_step['step_title'];
                    $bot_session_step->is_initial_step = $session_step['is_initial_step'];
                    $bot_session_step->with_input = $session_step['with_input'];
                    $bot_session_step->service_methods = array_key_exists('service_methods', $session_step) ? json_encode($session_step['service_methods']) : null;
                    $bot_session_step->back_to_session = array_key_exists('back_to_session', $session_step) ? $session_step['back_to_session'] : null;
                    $bot_session_step->previous_session_name = array_key_exists('previous_session_name', $session_step) ? $session_step['previous_session_name'] : null;
                    $bot_session_step->allow_back = array_key_exists('allow_back', $session_step) ? $session_step['allow_back'] : null;
                    $bot_session_step->previous_session_step = array_key_exists('previous_session_step', $session_step) ? $session_step['previous_session_step'] : null;
                    $bot_session_step->reply_type = isset($session_step['reply_type']) ? $session_step['reply_type'] : null;
                    $bot_session_step->button_header_type = isset($session_step['button_header_type']) ? $session_step['button_header_type'] : null;
                    $bot_session_step->is_next_step_session = isset($session_step['is_next_step_session']) ? $session_step['is_next_step_session'] : null;
                    $bot_session_step->next_session = isset($session_step['next_session']) ? $session_step['next_session'] : null;

                    $bot_session_step->save();
                } else {

                    $bot_session_step = BotSessionStep::where('session_step_key', $session_step['session_step'])
                        ->where('channel', $bot_session['channel'])
                        ->first();
                }

                foreach ($session_step['responses'] as $response) {

                    if (!BotResponse::where('response_text', $response['response_text'])
                        ->where('bot_session_step_id', $bot_session_step->id)
                        ->where('channel', $bot_session['channel'])
                        ->exists()) {

                        $bot_response = new BotResponse();

                        $bot_response->channel = $response['channel'];
                        $bot_response->bot_session_id = $bot_session_model->id;
                        $bot_response->bot_session_step_id = $bot_session_step->id;
                        $bot_response->key_word = $response['key_word'];
                        $bot_response->response_text = $response['response_text'];
                        $bot_response->show_step_id = $response['show_step_id'];
                        $bot_response->next_session_step = $response['next_session_step'];
                        $bot_response->image_url = isset($response['image_url']) ? $response['image_url'] : null;


                        $bot_response->save();
                    }
                }
            }
        }
    }
}
