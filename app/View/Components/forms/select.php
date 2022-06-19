<?php

namespace App\View\Components\forms;

use Illuminate\View\Component;

class select extends Component
{
    public $type;
    public $label;
    public $placeholder;
    public $value;
    public $options;
    public $selected;


    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type, $label, $placeholder = '', $value = '', $options= [], $selected='')
    {
        $this->type = $type;
        $this->label = $label;
        $this->placeholder = $placeholder;
        $this->value = $value;
        $this->options = $options;
        $this->selected = $selected;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.select');
    }
}
