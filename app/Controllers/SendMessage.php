<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class SendMessage extends ResourceController
{
    protected $modelName = 'App\Models\MessageModel';
    protected $format = 'json';

    /**
     * Send template message
     * 
     * See: https://wabacdn.s45.in/docs/index.html?php#send-template-message
     */
    public function sendTemplate()
    { 
        $apiKey = getenv('WABA_API_KEY');
        $header = [
            "X-API-KEY: " . $apiKey,
            "Content-Type: application/json"
        ];

        // manual payload
        $payload = [
            'wa_id' => '62895xxxxxxx',
            'template_id' => '65f7b5f02bb6ca29641c5be2',
            'components' => [
                [
                    'type' => 'body',
                    'parameters' => [
                        [
                            'type' => 'text',
                            'text' => 'Edo'
                        ],
                        [
                            'type' => 'text',
                            'text' => 'Pria'
                        ],
                        [
                            'type' => 'text',
                            'text' => 'Amazing'
                        ],
                    ]
                ]
            ]
        ];

        // payload from request input
        // $payload = [
        //     'wa_id' => $this->request->getJsonVar('wa_id'),
        //     'template_id' => $this->request->getJsonVar('template_id'),
        //     'components' => $this->request->getJsonVar('components')
        // ];

        $options = ['http' =>
            [
                'method'  => 'POST',
                'header'  => $header,
                'content' => json_encode($payload)
            ]
        ];

        return file_get_contents(
            'https://waba.ivosights.com/api/v1/messages/send-template-message', 
            false, 
            stream_context_create($options)
        );
    }
    
    /**
     * Send text message
     * 
     * See: https://wabacdn.s45.in/docs/index.html?php#send-text-message
     */
    public function sendText()
    {
        $apiKey = getenv('WABA_API_KEY');
        $header = [
            "X-API-KEY: " . $apiKey,
            "Content-Type: application/json"
        ];

        // manual payload
        $payload = [
            'wa_id' => '62895xxxxxxx',
            'text' => 'Terima kasih'
        ];

        // payload from request input
        // $payload = [
        //     'wa_id' => $this->request->getJsonVar('wa_id'),
        //     'text' => $this->request->getJsonVar('text'),
        // ];

        $options = ['http' =>
            [
                'method'  => 'POST',
                'header'  => $header,
                'content' => json_encode($payload)
            ]
        ];

        return file_get_contents(
            'https://waba.ivosights.com/api/v1/messages/send-text-message', 
            false, 
            stream_context_create($options)
        );
    }
    
    /**
     * Send media message
     * 
     * See: https://wabacdn.s45.in/docs/index.html?php#send-media-message
     */
    public function sendMedia()
    {
        $apiKey = getenv('WABA_API_KEY');
        $header = [
            "X-API-KEY: " . $apiKey,
            "Content-Type: application/json"
        ];

        // manual payload
        $payload = [
            'wa_id' => '62895xxxxxxx',
            'type' => 'image',
            'link' => 'https://www.google.com/images/branding/googlelogo/2x/googlelogo_color_92x30dp.png'
        ];

        // payload from request input
        // $payload = [
        //     'wa_id' => $this->request->getJsonVar('wa_id'),
        //     'type' => $this->request->getJsonVar('type'),
        //     'link' => $this->request->getJsonVar('link'),
        // ];

        $options = ['http' =>
            [
                'method'  => 'POST',
                'header'  => $header,
                'content' => json_encode($payload)
            ]
        ];

        return file_get_contents(
            'https://waba.ivosights.com/api/v1/messages/send-media-message', 
            false, 
            stream_context_create($options)
        );
    }
}
