<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incapacity extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'employee_id',
        'incapacity_type_id',
        'cie_10_id',
        'start_date',
        'end_date',
        'clasification',
        'paid_company',
        'paid_eps',
        'paid_arl',
        'paid_afp',

    ];   

    public function getFullNameAttribute()
    {
        return "{$this->name} {$this->lastname}";
    }
    
    public function getTotalDiasAttribute()
    {
        return ((strtotime($this->end_date) - strtotime($this->start_date)) / 60 / 60 / 24);
    }
    
    public function getPagoTotalAttribute(){

        return '$'.number_format($this->paid_company + $this->paid_eps + $this->paid_arl + $this->paid_afp, 2);
        
    }
    
    //Relationship
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function incapacity_type()
    {
        return $this->belongsTo(Incapacity_type::class);
    }

    public function cie_10()
    {
        return $this->belongsTo(Cie_10::class);
    }
}
