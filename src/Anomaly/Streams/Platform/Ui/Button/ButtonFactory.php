<?php namespace Anomaly\Streams\Platform\Ui\Button;

class ButtonFactory
{
    protected $button = 'Anomaly\Streams\Platform\Ui\Button\Button';

    protected $buttons = [
        'cancel' => [
            'text' => 'streams::button.cancel',
            'type' => 'default',
        ],
        'edit'   => [
            'text' => 'streams::button.edit',
            'type' => 'warning',
        ],
        'delete' => [
            'text' => 'streams::button.delete',
            'type' => 'danger',
        ],
    ];

    public function make(array $parameters)
    {
        if (isset($parameters['button']) && class_exists($parameters['button'])) {
            return app()->make($parameters['button'], $parameters);
        }

        if ($button = array_get($this->buttons, array_get($parameters, 'button'))) {
            $parameters = array_replace_recursive($button, array_except($parameters, 'button'));
        }

        return app()->make($this->button, $parameters);
    }
}
