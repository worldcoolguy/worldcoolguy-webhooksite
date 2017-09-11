<?php

namespace App\Events;

use App\Requests\Request;
use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class RequestCreated implements ShouldBroadcast
{
    /**
     * @var Request
     */
    public $request;

    /**
     * NewRequest constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @return string
     */
    public function broadcastAs()
    {
        return 'request.created';
    }

    /**
     * @return Channel
     */
    public function broadcastOn()
    {
        return new Channel((string)$this->request->token_id);
    }
}
