<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RdoctorCard extends Component
{
    public $name;
    public $specialty;
    public $experience;
    public $photoUrl;
    public $id;

    /**
     * Create a new component instance.
     *
     * @param  string  $name
     * @param  string  $specialty
     * @param  int  $experience
     * @param  string  $photoUrl
     * @param int $id
     * @return void
     */
    public function __construct($name, $specialty, $experience, $photoUrl, $id)
    {
        $this->name = $name;
        $this->specialty = $specialty;
        $this->experience = $experience;
        $this->photoUrl = $photoUrl;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render(): View|Closure|string
    {
        return view('components.rdoctor-card');
    }
}
