<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController; // Add this line to use the correct base Controller

abstract class Controller extends BaseController // Change extends class to BaseController
{
    // You can leave the body empty or add any common logic for your controllers here
}