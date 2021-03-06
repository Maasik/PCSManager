<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {

    protected $fillable = [
        'customer_id', 'pc_serial', 'customer_description', 'employee_accept_order', 'finish_order_date', 'ascertained_issues',
        'decision', 'description_iteme', 'note', 'released_employee', 'status'
    ];

    function __construct( array $attributes = array()) {
        parent::__construct($attributes);
        
       
      
        $this->finish_order_date = $this->finish_order_date == NULL? null:$this->finish_order_date;
    }

}
