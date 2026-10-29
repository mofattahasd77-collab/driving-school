<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactInformation extends Model
{
    protected $fillable = [
        'phone',
        'whatsapp',
        'email',
        'address',
        'working_hours',
    ];

    public function whatsappUrl(): ?string
    {
        return $this->whatsapp === null ? null : 'https://wa.me/'.$this->whatsapp;
    }
}
