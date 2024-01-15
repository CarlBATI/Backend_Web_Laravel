<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * AdminBarButton Component
 *
 * This component renders a button with a specific color. The color is determined by the `color` attribute passed to the component.
 * The `id` attribute is used to set the HTML `id` attribute of the button.
 * The component uses Tailwind CSS for styling.
 *
 * Usage:
 * <x-admin-bar-button id="myButton" color="red">My Button</x-admin-bar-button>
 *
 * Attributes:
 * - `id` (string): The HTML `id` attribute of the button.
 * - `color` (string): The color of the button. This should be one of the following: 'red', 'blue', 'green', 'yellow', 'indigo'.
 *   If the color is not one of these, the color will default to 'blue'.
 *
 * Slots:
 * - Default slot: The content of the button. This is usually the button text.
 *
 * Example:
 * <x-admin-bar-button id="saveButton" color="green">Save</x-admin-bar-button>
 * This will render a green button with the text "Save" and an HTML `id` of "saveButton".
 */
class AdminBarButton extends Component
{
    public $id;
    public $color;

    /**
     * Create a new component instance.
     */
    public function __construct($id, $color)
    {
        $this->id = $id;
        $this->color = $color;
    }
    

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin-bar-button');
    }
}
