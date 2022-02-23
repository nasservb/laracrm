<?php

namespace App\Domains\Customer\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerDetailResource extends JsonResource
{
    public function toArray($request = null)
    {
        return [
            'id' => $this->id,
            'firstName' =>$this->firstName,
            'lastName' =>$this->lastName,
            'phone' =>$this->phone,
            'email' =>$this->email,
            'desiredBudget' =>$this->desiredBudget,
            'message' =>$this->message,
            'description' => $this->description,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
