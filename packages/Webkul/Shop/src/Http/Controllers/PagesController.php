<?php

namespace Webkul\Shop\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Cart controller for the customer and guest users for adding and
 * removing the products in the cart.
 *
 * @author    Prashant Singh <prashant.singh852@webkul.com> @prashant-webkul
 * @copyright 2018 Webkul Software Pvt Ltd (http://www.webkul.com)
 */
class PagesController extends Controller
{
    protected $_config;

    public function __construct()
    {
        $this->_config = request('_config');
    }

    public function about_us()
    {
        return view($this->_config['view']);
    }

    public function terms()
    {
        return view($this->_config['view']);
    }

    public function contact()
    {
        return view($this->_config['view']);
    }

    public function terms_use()
    {
        return view($this->_config['view']);
    }

    public function privacy()
    {
        return view($this->_config['view']);
    }
}