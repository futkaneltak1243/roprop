<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AppointmentsCard extends Component
{
    public $appointments;
    /**
     * Create a new component instance.
     */
    public function __construct($appointments)
    {
        $this->appointments = $appointments;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.appointments-card');
    }
}
