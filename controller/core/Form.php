<?php
class Form
{
    public $controller;
    public function __construct($controller)
    {
        $this->controller = $controller;
    }
    public function input($name, $type, $placeholder = null)
    {
        return '<div class="input-group custom">
                                <input type="' . $type . '" name="' . $name . '" class="form-control form-control-lg" placeholder="' . $placeholder . '">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                            </div>';
    }
}
