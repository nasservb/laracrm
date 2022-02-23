<?php

namespace App\Domains\Customer\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WebsiteDetailResource extends JsonResource
{
    public function toArray($request = null)
    {
        return [
            'id' => $this->id,
            'url' => $this->url,
            'isConnected' => $this->isConnected,
            'isAccountCreated' => $this->isAccountCreated,
            'description' => $this->description,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
