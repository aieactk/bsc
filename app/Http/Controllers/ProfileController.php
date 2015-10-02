<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

/**
 * ProfileController
 *
 * @author Lim Afriyadi <lim.afriyadi.id@gmail.com>
 */
class ProfileController extends Controller
{
    public function index() 
    {
        return view('profile/index');
    }
}
