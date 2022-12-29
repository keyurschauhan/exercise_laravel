<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerContactDetail extends Model
{
    use HasFactory;
    protected $table = 'customer_contact_details';

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
