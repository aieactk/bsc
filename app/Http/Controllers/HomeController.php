<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

/**
 * HomeController
 *
 * @author Ihsan Kurniawan <ihsan.1x4n@gmail.com>
 */
class HomeController extends Controller
{
    public function index()
    {
        return view('home/index');
    }
}
