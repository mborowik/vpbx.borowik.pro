<?php

namespace App\View\Components\forms;

use Illuminate\View\Component;

class input extends Component
{
    public $type;
    public $label;
    public $placeholder;
    public $value;
    public $readonly;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type, $label, $placeholder = '', $value ='', $readonly = '')
    {
        $this->type = $type;
        $this->label = $label;
        $this->placeholder = $placeholder;
        $this->value = $value;
        $this->readonly = $readonly;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.input');
    }
}
