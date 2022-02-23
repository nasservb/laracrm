<?php

namespace App\Domains\Customer\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerListResource extends JsonResource
{
    public function toArray($request = null)
    {
        return [
            'id' => $this->id,
            'firstName' =>$this->firstName,
            'lastName' =>$this->lastName,
            'desiredBudget' =>$this->desiredBudget,
            'website' =>$this->websites()?->first()?->url,
            'message' => substr($this->description, 0, 120) . '...',
        ];
    }
}
