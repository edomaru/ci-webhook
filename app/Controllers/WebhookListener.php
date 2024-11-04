<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class WebhookListener extends ResourceController
{
    protected $modelName = 'App\Models\MessageModel';
    protected $format = 'json';

    public function index()
    {
        $message = $this->request->getJSON(true);
        
        $this->readWebhook($message);

        // Don't forget to return this response
        // to indicate that request from waba is successfully sent
        return $this->respond(['status' => 'ok']);
    }

    /**
     * Read incoming webhook message
     * 
     * @param array $message
     */
    protected function readWebhook(array $message)
    {
        if (!empty($message['statuses'])) {
            $this->readMessageStatus($message['statuses']);
        } elseif (!empty($message['messages'])) {
            $this->readInboundMessage($message['messages']);
        } else {
            // TODO: Do something else
        }
    }

    /**
     * Read message status
     * 
     * @param array $data
     * 
     * See https://wabacdn.s45.in/docs/index.html#message-status-notifications
     */
    protected function readMessageStatus(array $data)
    {
        $message = $data[0] ?? [];
        if (empty($message)) {
            return;
        }

        $this->model->where('message_id', $message['id'])
            ->set(['status' => $message['status']])
            ->update();
    }
    
    /**
     * Read inbound message
     * 
     * @param array $data
     * 
     * See https://wabacdn.s45.in/docs/index.html#inbound-message-notifications
     */
    protected function readInboundMessage(array $data)
    {
        $message = $data[0] ?? [];
        if (empty($message)) {
            return;
        }

        $this->model->insert([
            'message_id' => $message['id'],
            'from' => $message['from'],
            'type' => $message['type'],
            'payload' => $this->getPayload($message)
        ]);
    }

    protected function getPayload(array $data)
    {
        $type = $data['type'];

        $payload = $data[$type] ?? [];

        if (!empty($data['context'])) {
            $payload['context'] = $data['context'];
        }

        return json_encode($payload);
    }
}
