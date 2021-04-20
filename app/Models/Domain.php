<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    use HasFactory;
    protected $table='domains';
    protected $fillable=['product_id','customer_id','company_id','price','started_at', 'finished_at'];
    protected $dates = ['started_at', 'finished_at'];
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function customer(){
        return $this->belongsTo(Customer::class);
    }
    public function company(){
        return $this->belongsTo(Company::class);
    }
    public function getDaysLeftAttribute(){
        $date1= date_create($this->started_at);
        $date2= date_create($this->finished_at);
        $interval= date_diff($date1,$date2);
        return $interval->format('%a gün kaldı');
    }
}
