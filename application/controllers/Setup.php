<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setup extends MY_Controller {

    /**
     * Index Page for this controller.
     * Run from CLI to create necessary tables etc.
     */
    public function create_tables()
    {
        Menu::build();
    }
}
