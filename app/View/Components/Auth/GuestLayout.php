<?php

namespace App\View\Components\Auth;

use Illuminate\View\Component;
use Illuminate\View\View;

class GuestLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('auth.layouts.guest');
    }
}
