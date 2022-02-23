<?php

namespace App\Domains\Customer\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WebsiteListResource extends JsonResource
{
    public function toArray($request = null)
    {
        return [
            'id' => $this->id,
            'url' => $this->url,
            'isConnected' => $this->isConnected,
            'isAccountCreated' => $this->isAccountCreated,
            'description' => substr($this->description, 0, 120) . '...',
        ];
    }
}
