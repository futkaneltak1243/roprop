<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AppointmentCard extends Component
{
    public $id;
    public $name;
    public $fullname;
    public $condition;
    public $date;


    /**
     * Create a new component instance.
     *
     * @param  int  $id
     * @param  string  $name
     * @param  string  $fullname
     * @param  string  $condition
     * @return void
     */
    public function __construct($id, $name, $fullname, $condition, $date)
    {


        $this->id = $id;
        $this->name = $name;
        $this->fullname = $fullname;
        $this->condition = $condition;
        $this->date = $date;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.appointment-card');
    }
}
