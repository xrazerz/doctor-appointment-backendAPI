<?php

namespace App\Http\Controllers;

use Twilio\Rest\Client;
use Illuminate\Http\Request;
use App\Services\BotSessionService;
use Illuminate\Support\Facades\Log;
use App\Services\BotAccountsService;
use App\Services\BotServices;
use App\Services\WhatsAppServiceApi;
use App\Models\UniqueWhatsappMessage;
use App\Repositories\BotSessionRepository;
use App\Repositories\WhatsappAccountRepository;
use App\Repositories\WhatsappSessionRepository;

class BotController extends Controller
{

    public function index(
        Request $request,
        BotAccountsService $botAccountsService,
        BotSessionService $botSessionService,
        WhatsappSessionRepository $whatsappSessionRepository,
        BotSessionRepository $botSessionRepository,
        WhatsAppServiceApi $whatsAppServiceApi
    ) {

        $data = $request->all();

        $messages = isset($data['messages']) ? $data['messages'] : 'n/a';

        $first_message = $messages[0];

        if (isset($first_message['id'])) {
            log::info("True message");
            $this->botEngine(
                $request,
                $botAccountsService,
                $botSessionService,
                $whatsappSessionRepository,
                $botSessionRepository,
                $whatsAppServiceApi
            );
        } else {
            log::info("Status manenoz");
            return "ok";
        }
    }

    public function botEngine(
        Request $request,
        BotAccountsService $botAccountsService,
        BotSessionService $botSessionService,
        WhatsappSessionRepository $whatsappSessionRepository,
        BotSessionRepository $botSessionRepository,
        WhatsAppServiceApi $whatsAppServiceApi
    ) {
        Log::info('controller 1');
        if (env('WA_BOT_ENV') == 'TWILIO') {
            Log::info('controller 2');
            // Get all the data from the user input
            $data = $request->all();

            // Get the WhatsApp number making the request
            $from = $data['From'];

            Log::info('FROM WHATSAPP NUMBER : ' . $from);

            // We remove all whitespaces from the body
            $body = $string = preg_replace('/\s+/', '', $data['Body']);

            // If a media exixts, we retrieve the media url
            $media_url0 = array_key_exists('MediaUrl0', $data) ? $data['MediaUrl0'] : null;

            Log::info('MEDIA0 : ' . $media_url0);

            // We truncate the WhatsApp number from the 13th character
            $truncated_number = substr($from, 13);

            // We create the number starting with 0
            $phone_number = '0' . $truncated_number;

            // We create the WhatsApp number by adding +254
            $whatsapp_number = '+254' . $truncated_number;

            $latitude = array_key_exists('Latitude', $data) ? $data['Latitude'] : null;

            $longitude = array_key_exists('Longitude', $data) ? $data['Longitude'] : null;

            $address = array_key_exists('Address', $data) ? $data['Address'] : null;

            Log::info('Latitude : ' . $latitude);
            Log::info('Longitude : ' . $longitude);
            Log::info('Address : ' . $address);


            Log::info('Body : ' . $body);

            //        Log::info('Emoji : '. Emoji::Encode($body));

            $channel = 'WA'; //$request->channel;
            $user_identifier = $whatsapp_number;
            $message = $body;

            $message_from = $from;

            $profile_name = $data['ProfileName'];
            Log::info("Whatsapp profile name:  " . $profile_name);
        }

        if (env('WA_BOT_ENV') == '360') {

            Log::info('NEW BOT HIT');

            $data = $request->all();

            $status = isset($data['statuses'][0]['status']) ? $data['statuses'][0]['status'] : '';


            if (isset($data['contacts'])) {

                $profile_name = isset($data['contacts'][0]['profile']['name']) ? $data['contacts'][0]['profile']['name'] : '';
            } else {

                $profile_name = "";
            }

            if (isset($data['messages'])) {
            }

            if (isset($data['statuses'])) {
                log::info("statuses iko");
                $status = isset($data['statuses'][0]['status']) ? $data['statuses'][0]['status'] : '';
                log::info("status:" . $status);
                exit();
                Log::info("Aje sasa");
            }

            $messages = isset($data['messages']) ? $data['messages'] : 'n/a';

            if ($messages == 'n/a') {
                return 'ok';
            }

            $first_message = $messages[0];

            $message_from = isset($first_message['from']) ? $first_message['from'] : 'n/a';
            $message_text = isset($first_message['text']) ? $first_message['text'] : 'n/a';
            $message_body = isset($message_text['body']) ? $message_text['body'] : 'n/a';
            $message_id = isset($first_message['id']) ? $first_message['id'] : 'n/a';
            $message_name = isset($first_message['type']) ? $first_message['type'] : 'n/a';

            //

            $total_price = 1;
            if (isset($first_message['order'])) {
                log::info("Order Details");
                $order_price = isset($first_message['order']["product_items"][0]["item_price"]) ? $first_message['order']["product_items"][0]["item_price"] : 'n/a';
                log::info("Order price: " . $order_price);
                $order_quantity = isset($first_message['order']["product_items"][0]["quantity"]) ? $first_message['order']["product_items"][0]["quantity"] : 'n/a';
                log::info("Order price: " . $order_quantity);
                $total_price = $order_price * $order_quantity;
            }
            log::info("Total price: " . $total_price);




            $environment = isset($data[0]['environment']) ? $data[0]['environment'] : 'n/a';
            $events = isset($data[0]['events']) ? $data[0]['events'] : 'n/a';
            $device = isset($data[0]['device']) ? $data[0]['device'] : 'n/a';
            $recipient_id = isset($data[0]['recipient_id']) ? $data[0]['recipient_id'] : 'n/a';

            $app_id = isset($environment['app_id']) ? $environment['app_id'] : 'n/a';

            Log::info('APP ID : ' . $app_id);


            Log::info('PROFILE NAME : ' . $profile_name);

            //        $message_id = isset($events[0]['properties']['message_id']) ? $events[0]['properties']['message_id'] : 'n/a';

            Log::info('MESSAGE ID : ' . $message_id);

            //        $message_name = isset($events[0]['name']) ? $events[0]['name'] : 'n/a';
            //
            //        Log::info('MESSAGE NAME : ' . $message_name);

            $stack_id = isset($events[0]['properties']['stack_id']) ? $events[0]['properties']['stack_id'] : 'n/a';

            Log::info('STACK ID : ' . $stack_id);

            $conversation_id = isset($events[0]['properties']['conversation_id']) ? $events[0]['properties']['conversation_id'] : 'n/a';

            Log::info('CONVERSATION ID : ' . $conversation_id);

            $message_type = isset($events[0]['properties']['type']) ? $events[0]['properties']['type'] : 'n/a';

            Log::info('Message Type : ' . $message_type);

            //        $message_from = isset($device['mdn']) ? $device['mdn'] : 'n/a';


            Log::info('FROM : ' . $message_from);

            $message_timestamp = isset($events[0]['timestamp']) ? $events[0]['timestamp'] : 'n/a';

            Log::info('Message Timestamp : ' . $message_timestamp);

            $message_property_id = isset($events[0]['id']) ? $events[0]['id'] : 'n/a';

            Log::info('Message Property Id : ' . $message_property_id);

            //        dd($message_timestamp);

            //        if($message_type == 'text'){

            //        $message_body = isset($events[0]['properties']['content']['body']) ? $events[0]['properties']['content']['body'] : null;


            $request['Body'] = $message_body;

            Log::info('Message Body : ' . $message_body);

            //        }

            if ($message_body == null && $message_name != 'd360_whatsapp_message_in') {

                return 'ok';
            }

            //        if($message_name == 'd360_whatsapp_message_in'){
            //
            //            $unique_message = new UniqueWhatsappMessage();
            //
            //            $unique_message->message_id = $message_id;
            //
            //            $unique_message->save();
            //        }

            // if ($message_name == 'text') {

            //     $unique_message = new UniqueWhatsappMessage();

            //     $unique_message->message_id = $message_id;

            //     $unique_message->save();
            // }

            //capture the button id
            $button_reply_id = 1;

            if ($message_name == 'interactive') {

                Log::info('kaaaaaaaaaaaaput');

                $interactive = $first_message['interactive'];

                //            Log::info('Interactive : '.$interactive);

                if ($interactive['type'] == 'list_reply') {

                    $button_reply = $interactive['list_reply'];

                    $button_reply_id = $button_reply['id'];

                    Log::info('BRID : ' . $button_reply_id);

                    $button_reply_title = $button_reply['title'];

                    Log::info('BRT : ' . $button_reply_title);

                    $message_body = $button_reply_id;
                }

                if ($interactive['type'] == 'button_reply') {

                    $button_reply = $interactive['button_reply'];

                    $button_reply_id = $button_reply['id'];

                    Log::info('BRID : ' . $button_reply_id);

                    $button_reply_title = $button_reply['title'];

                    Log::info('BRT : ' . $button_reply_title);

                    $message_body = $button_reply_id;
                }
                //            return 'ok';
            }

            $from = '+' . $message_from;

            // We truncate the WhatsApp number from the 13th character
            $truncated_number = substr($from, 4);

            // We create the number starting with 0
            $phone_number = '0' . $truncated_number;

            Log::info('FROM WHATSAPP NUMBER : ' . $from);

            $body = $string = preg_replace('/\s+/', '', $message_body);

            $media_url0 = null;

            Log::info('MEDIA0 : ' . $media_url0);

            $whatsapp_number = $from;

            Log::info('Body : ' . $body);
            Log::info('Button id:' . $button_reply_id);

            //        Log::info('Emoji : '. Emoji::Encode($body));

            $channel = 'WA'; //$request->channel;
            $user_identifier = $whatsapp_number;
            $message = $body;
        }

        return $this->startEngine(
            $botAccountsService,
            $user_identifier,
            $channel,
            $botSessionService,
            $message,
            $whatsappSessionRepository,
            $botSessionRepository,
            $whatsAppServiceApi,
            $profile_name,
            $message_from,

        );
    }

    public function startEngine(
        BotAccountsService $botAccountsService,
        $user_identifier,
        $channel,
        BotSessionService $botSessionService,
        $message,
        WhatsappSessionRepository $whatsappSessionRepository,
        BotSessionRepository $botSessionRepository,
        WhatsAppServiceApi $whatsAppServiceApi,
        $profile_name,
        $message_from

    ) {

        // Get Account From Channel and userIdentifier
        $bot_account = $botAccountsService->getAccount(
            $user_identifier,
            $channel,
            new WhatsappAccountRepository()
        );

        if (!is_null($bot_account)) {

            $active_session = $botSessionService->checkForActiveSession(
                $bot_account,
                $channel,
                new WhatsappSessionRepository()
            );

            // check if session keyword
            if ($botSessionService->checkIfSessionExistsByName($channel, $message, new BotSessionRepository())) {

                Log::info('uid' . $user_identifier);

                $botSessionService->deactivateBotSession(
                    $channel,
                    $user_identifier,
                    $whatsappSessionRepository,
                );

                $bot_responses = $this->getSession($botSessionService, $user_identifier, $channel, $bot_account, $message);

                $reply_message = $bot_responses['bot_step']->step_title;

                foreach ($bot_responses['bot_responses'] as $bot_response) {

                    $reply_message .= $bot_response->show_step_id == true ? $bot_response->key_word . " " . $bot_response->response_text . "\n" : $bot_response->response_text . "\n";
                }

                if ($channel == env('WHATSAPP_CHANNEL')) {

                    if (env('WA_BOT_ENV') == 'TWILIO') {
                        // TWILIO API CREDENTIALS
                        $sid = env('TWILIO_SID');
                        $token = env('TWILIO_TOKEN');

                        // The TujengePay WhatsApp number
                        $whatsapp_live_number = '+14155238886'; //'+254203892383'; //+254203892383 // +14155238886

                        // Initialize the Twilio Client
                        $twilio = new \Twilio\Rest\Client($sid, $token);

                        $message = $twilio->messages
                            ->create(
                                "whatsapp:" . $user_identifier,
                                array(
                                    "body" => $reply_message,
                                    "from" => "whatsapp:" . $whatsapp_live_number
                                )
                            );
                    }

                    if (env('WA_BOT_ENV') == '360') {
                        log::info("3600");

                        //                        $whatsAppServiceApi->send('text', $message_from, $reply_message, 'individual', false);

                        foreach ($bot_responses['bot_responses'] as $bot_response) {

                            $rows[] = [
                                "id" => $bot_response->key_word,
                                "title" => $bot_response->response_text,
                                //                                "description" => $bot_response->response_text,
                            ];
                        }

                        $word = "profilename";
                        $mystring = $bot_responses['bot_step']->step_title;

                        // Test if string contains the word
                        if (strpos($mystring, $word) !== false) {
                            Log::info("Word Found: " . $mystring);
                            $body_text = str_replace("profilename", "*" . $profile_name . "*", $mystring);
                            Log::info("Replaced reply message: " . $reply_message);
                        }

                        $client = new \GuzzleHttp\Client();

                        $response = $client->request('POST', 'https://waba.360dialog.io/v1/messages', [
                            'headers' => [
                                'Content-Type' => 'application/json',
                                'D360-API-KEY' => 'FSHBI59lo6uLQBarrtWxAO1mAK',

                            ],

                            'body' => json_encode([
                                "recipient_type" => "individual",
                                "to" => $message_from,
                                "type" => "interactive",
                                "interactive" => [
                                    "type" => "list",
                                    "body" => [
                                        "text" => $body_text
                                    ],
                                    "action" => [
                                        "button" => "Get Started",
                                        "sections" => [
                                            [
                                                "title" => "get-started",
                                                "rows" => $rows
                                            ],

                                        ]
                                    ]
                                ]
                            ])
                        ]);
                    }
                }
                Log::info("response section");
                $data = (array)json_decode($response->getBody());
                return $data;
                // return 'ok';
            }

            $active_session = $botSessionService->checkForActiveSession(
                $bot_account,
                $channel,
                new WhatsappSessionRepository()
            );

            Log::info('AS');

            if ($active_session) {

                Log::info('AS1');


                $active_session_step = $botSessionService->getActiveBotStep(
                    $bot_account,
                    $channel,
                    new WhatsappSessionRepository()
                );

                $session = $botSessionService->getActiveSession(
                    $channel,
                    $user_identifier,
                    new WhatsappSessionRepository()
                );

                Log::info('res exists');

                $bot_session = $session->bot_session;

                Log::info('ASST ID ' . $active_session_step->id);

                if ($active_session_step->bot_session_step->is_initial_step && $bot_session->session_key_word == 0) {

                    $next_bot_session = $botSessionService->getNextBotSession($channel, $message, new BotSessionRepository());

                    $session = $botSessionService->processSession(
                        $user_identifier,
                        $channel,
                        $bot_account,
                        $next_bot_session,
                        new WhatsappSessionRepository()
                    );

                    $bot_session = $next_bot_session;

                    Log::info('NBS' . $next_bot_session->session_key_word);

                    $next_bot_step = $botSessionService->getZeroBotSessionStep($channel, $next_bot_session, new BotSessionRepository());

                    Log::info('NS' . $next_bot_step->session_step_key);
                } else {

                    $next_bot_step = $botSessionService->getNextBotStep($channel, $active_session_step->bot_session_step, $message);
                }

                //back button
                if ($active_session_step->bot_session_step->allow_back) {

                    if ($message == '0') {

                        $session = $botSessionService->getActiveSession(
                            $channel,
                            $user_identifier,
                            new WhatsappSessionRepository()
                        );

                        $bot_session = $session->bot_session;

                        Log::info('Lets get previous bot step');

                        Log::info('ASS ' . $active_session_step->bot_session_step);


                        $next_bot_step = $botSessionService->getPreviousBotStep($channel, $active_session_step->bot_session_step, $message);

                        Log::info('BSS ' . $next_bot_step);

                        $bot_session_step = $next_bot_step;
                    }
                }

                //service
                if ($active_session_step->bot_session_step->service_methods != null) {

                    $service_methods = (array)json_decode($active_session_step->bot_session_step->service_methods);

                    foreach ($service_methods as $service_method) {
                        //method_type

                    }
                }

                $botSessionService->deactivateBotSessionSteps(
                    $channel,
                    $user_identifier,
                    $bot_account,
                    new WhatsappSessionRepository()
                );

                $botSessionService->setSessionStep(
                    $session,
                    $channel,
                    $user_identifier,
                    $message,
                    $bot_account,
                    $next_bot_step,
                    new WhatsappSessionRepository()
                );
                $bot_responses = $botSessionService->getBotResponses($message, $channel, $bot_session, $next_bot_step, $active_session_step->bot_session_step);
                $reply_message = $next_bot_step->step_title;
                $word = "profilename";
                $mystring = $next_bot_step->step_title;

                // Test if string contains the word
                if (strpos($mystring, $word) !== false) {
                    Log::info("Word Found: " . $mystring);
                    $reply_message = str_replace("profilename", $profile_name, $mystring);
                    Log::info("Replaced reply message: " . $reply_message);
                }

                foreach ($bot_responses as $bot_response) {

                    $reply_message .= $bot_response->show_step_id == true ? $bot_response->key_word . " " . $bot_response->response_text . "\n" : $bot_response->response_text . "\n";
                }

                if ($channel == env('WHATSAPP_CHANNEL')) {

                    if (env('WA_BOT_ENV') == 'TWILIO') {
                        // TWILIO API CREDENTIALS
                        $sid = env('TWILIO_SID');
                        $token = env('TWILIO_TOKEN');

                        // The TujengePay WhatsApp number
                        $whatsapp_live_number = '+14155238886'; //'+254203892383'; //+254203892383 // +14155238886

                        // Initialize the Twilio Client
                        $twilio = new \Twilio\Rest\Client($sid, $token);

                        $message = $twilio->messages
                            ->create(
                                "whatsapp:" . $user_identifier,
                                array(
                                    "body" => $reply_message,
                                    "from" => "whatsapp:" . $whatsapp_live_number
                                )
                            );
                    }

                    if (env('WA_BOT_ENV') == '360') {
                        Log::info('360 response');
                        if ($next_bot_step->reply_type == 'inline_buttons') {
                            foreach ($bot_responses as $bot_response) {
                                if ($bot_response->image_url != "") {
                                    if ($next_bot_step->button_header_type == 'image') {
                                        $client = new \GuzzleHttp\Client();

                                        $response = $client->request('POST', 'https://waba.360dialog.io/v1/messages', [

                                            'headers' => [
                                                'Content-Type' => 'application/json',
                                                'D360-API-KEY' => env('D360_API_KEY'),
                                            ],

                                            'body' => json_encode([
                                                'preview_url' => false,
                                                'recipient_type' => "individual",
                                                "to" => $message_from,
                                                "type" => "image",
                                                'image' => [
                                                    'link' => $bot_response->image_url,
                                                    'provider' => [
                                                        'name' => null
                                                    ],
                                                    'caption' => $bot_response->response_text
                                                ]
                                            ])
                                        ]);
                                    }
                                }
                            }
                        } elseif ($next_bot_step->reply_type == 'list') {
                            Log::info('360 list');
                            $word = "profilename";
                            $mystring = $next_bot_step->step_title;

                            // Test if string contains the word
                            if (strpos($mystring, $word) !== false) {
                                Log::info("Word Found: " . $mystring);
                                $next_bot_step_title = str_replace("profilename", $profile_name, $mystring);
                                Log::info("Replaced reply message: " . $reply_message);
                            } else {

                                $next_bot_step_title = $next_bot_step->step_title;
                            }

                            $sections = [
                                [
                                    "title" => 'Pick an item below',
                                    'rows' => []
                                ]
                            ];

                            foreach ($bot_responses as $bot_response) {

                                $sections[0]['rows'][] =

                                    [
                                        "id" => $bot_response->key_word,
                                        "title" => $bot_response->response_text
                                    ];
                                Log::info('360 response text: ' . $bot_response->response_text);
                            }

                            $whatsAppServiceApi->sendInteractiveList($message_from, $sections, $next_bot_step->step_title == '' ? 'Pick an item below' : $next_bot_step_title);
                        } else {

                            $whatsAppServiceApi->send('text', $message_from, $reply_message, 'individual', false);
                        }
                    }
                    Log::info('360 mwisho ama');
                }
                $botSessionService->deactivateBotSessionSteps(
                    $channel,
                    $user_identifier,
                    $bot_account,
                    new WhatsappSessionRepository()
                );

                $botSessionService->setSessionStep(
                    $session,
                    $channel,
                    $user_identifier,
                    $message,
                    $bot_account,
                    $next_bot_step,
                    new WhatsappSessionRepository()
                );
                return 'ok';
            }
        } else {

            // Create a new bot account
            $created_bot_account = $botAccountsService->storeAccount(
                $user_identifier,
                $channel,
                new WhatsappAccountRepository()
            );

            $bot_responses = $this->getStartSession($botSessionService, $user_identifier, $channel, $created_bot_account, $message);

            $reply_message = $bot_responses['bot_step']->step_title;

            foreach ($bot_responses['bot_responses'] as $bot_response) {

                $reply_message .= $bot_response->show_step_id == true ? $bot_response->key_word . " " . $bot_response->response_text . "\n" : $bot_response->response_text . "\n";
            }

            if ($channel == env('WHATSAPP_CHANNEL')) {

                if (env('WA_BOT_ENV') == 'TWILIO') {
                    // TWILIO API CREDENTIALS
                    $sid = env('TWILIO_SID');
                    $token = env('TWILIO_TOKEN');

                    // The TujengePay WhatsApp number
                    $whatsapp_live_number = '+14155238886'; //'+254203892383'; //+254203892383 // +14155238886

                    // Initialize the Twilio Client
                    $twilio = new \Twilio\Rest\Client($sid, $token);

                    $message = $twilio->messages
                        ->create(
                            "whatsapp:" . $user_identifier,
                            array(
                                "body" => $reply_message,
                                "from" => "whatsapp:" . $whatsapp_live_number
                            )
                        );
                }

                $message_type = 'inline_buttons';
                $body_text = "Hi " . $profile_name . " 👋🏽" . "Sorry I didn't understand what you said. I'm just a chatbot 😅...Please choose an option below to talk to a real person or to view *AAR* services.👇🏽";

                if (env('WA_BOT_ENV') == '360') {

                    if ($message_type == 'inline_buttons') {

                        $buttons[] = [
                            [
                                "type" => "reply",
                                "reply" => [
                                    "id" => "customer",
                                    "title" => "Talk to a person"
                                ]
                            ],
                            [
                                "type" => "reply",
                                "reply" => [
                                    "id" => "aar",
                                    "title" => "View AAR services"
                                ]
                            ]
                        ];

                        $whatsAppServiceApi->sendInteractiveButton($message_from, $buttons, $body_text);
                    }
                }
            }
        }

        return 'ok';
    }

    public function getStartSession(BotSessionService $botSessionService, $user_identifier, $channel, $created_bot_account, $message)
    {
        // Get Initiate Session
        $bot_session = $botSessionService->getBotSession($channel, 'hi');

        // Process the bot session
        $session = $botSessionService->processSession(
            $user_identifier,
            $channel,
            $created_bot_account,
            $bot_session,
            new WhatsappSessionRepository()
        );

        $whatsappSessionRepository = new WhatsappSessionRepository();

        //Process the bot session step
        $bot_step = $botSessionService->getBotStep($message, $channel, $bot_session);

        // Get the session step
        $botSessionService->setSessionStep(
            $session,
            $channel,
            $user_identifier,
            $message,
            $created_bot_account,
            $bot_step,
            new WhatsappSessionRepository()
        );

        // Get bot output response using user key word, channel and session
        $bot_responses = $botSessionService->getBotResponses($message, $channel, $bot_session, $bot_step, $bot_step);

        return [
            'bot_step' => $bot_step,
            'bot_responses' => $bot_responses
        ];
    }

    //

    //
    public
    function getSession(BotSessionService $botSessionService, $user_identifier, $channel, $created_bot_account, $message)
    {
        // Get Initiate Session
        $bot_session = $botSessionService->getBotSession($channel, $message);

        Log::info('Session Name : ' . $bot_session->session_name);



        // Process the bot session
        $session = $botSessionService->processSession(
            $user_identifier,
            $channel,
            $created_bot_account,
            $bot_session,
            new WhatsappSessionRepository()
        );

        //Process the bot session step
        $bot_step = $botSessionService->getInitialBotStep($message, $channel, $bot_session);

        // Get the session step
        $botSessionService->setSessionStep(
            $session,
            $channel,
            $user_identifier,
            $message,
            $created_bot_account,
            $bot_step,
            new WhatsappSessionRepository()
        );

        // Get bot output response using user key word, channel and session
        $bot_responses = $botSessionService->getBotResponses($message, $channel, $bot_session, $bot_step, $bot_step);

        Log::info('GET SESSION');

        return [
            'bot_step' => $bot_step,
            'bot_responses' => $bot_responses
        ];
    }


    public function messengerUpdates(
        BotAccountsService $botAccountsService,
        BotSessionService $botSessionService,
        WhatsappSessionRepository $whatsappSessionRepository,
        BotSessionRepository $botSessionRepository,
        WhatsAppServiceApi $whatsAppServiceApi
    ) {

        $input = json_decode(file_get_contents('php://input'), true);

        // Get the Senders Graph ID
        $sender = $input['entry'][0]['messaging'][0]['sender']['id'];

        // Get the returned message
        $message = $input['entry'][0]['messaging'][0]['message']['text'];

        $channel = env('MESSENGER_CHANNEL');

        Log::info('ME ' . $message);

        $this->startEngine(
            $botAccountsService,
            $sender,
            $channel,
            $botSessionService,
            $message,
            $whatsappSessionRepository,
            $botSessionRepository,
            $whatsAppServiceApi
        );
    }

    public function botUpdates(
        Request $request,
        BotAccountsService $botAccountsService,
        BotSessionService $botSessionService,
        WhatsappSessionRepository $whatsappSessionRepository,
        BotSessionRepository $botSessionRepository,
        WhatsAppServiceApi $whatsAppServiceApi
    ) {

        $message = $request->message;

        $update_id = $request->update_id;

        Log::info('Update Id : ' . $request->update_id);

        $from = $message['from'];

        $from_id = $from['id'];

        $is_bot = $from['is_bot'];

        $first_name = $from['first_name'];

        $last_name = $from['last_name'];

        $user_name = $from['username'];

        $language_code = $from['language_code'];

        $chat = $message['chat'];

        $chat_id = $chat['id'];

        $chat_first_name = $chat['first_name'];

        $chat_last_name = $chat['last_name'];

        $chat_username = $chat['username'];

        $chat_type = $chat['type'];

        $message_date = $message['date'];

        $message_text = $message['text'];

        $channel = env('TELEGRAM_CHANNEL');

        Log::info('Update Id : ' . $request->update_id);
        Log::info('Message :' . $message['message_id']);
        Log::info('From Id :' . $from_id);
        Log::info('Is Bot :' . $is_bot);
        Log::info('First Name :' . $first_name);
        Log::info('Last Name : ' . $last_name);
        Log::info('Username :' . $user_name);
        Log::info('Language :' . $language_code);
        Log::info('Chat Id :' . $chat_id);
        Log::info('Chat First Name :' . $chat_first_name);
        Log::info('Chat Last Name :' . $chat_last_name);
        Log::info('Chat Username :' . $chat_username);
        Log::info('Chat Type :' . $chat_type);
        Log::info('Message Date : ' . $message_date);
        Log::info('Message Text :' . $message_text);

        $this->startEngine(
            $botAccountsService,
            $chat_id,
            $channel,
            $botSessionService,
            $message_text,
            $whatsappSessionRepository,
            $botSessionRepository,
            $whatsAppServiceApi
        );
    }
}
