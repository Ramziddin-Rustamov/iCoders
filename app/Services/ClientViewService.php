<?php

namespace App\Services;

use App\Models\ClientView;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

class ClientViewService
{
    private $clintViewModel;
    private $user;

    public function __construct(ClientView $client, User $user)
    {
        $this->clintViewModel = $client;
        $this->user = $user;
    }
    public function paginate($perPage = 6)
    {
        return Cache::remember("all_client_view",now()->addMinute(59),function () use ($perPage){
            return $this->clintViewModel->simplePaginate($perPage);
        });
    }

    public function create($clientView, $userId)
    {
        $client = new $this->clintViewModel;
        $client->clientView = $clientView;
        $client->user_id = $userId;
        $client->save();
    }

    public function showUser($id)
    {
        $user = $this->user->find($id);

        if (!$user) {
            return false; 
        }

        return $user;
    }
}

