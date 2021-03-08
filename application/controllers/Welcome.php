<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'libraries/Elevens.php';

class Welcome extends Elevens {

	public function index()
	{
		template();
	}
}
