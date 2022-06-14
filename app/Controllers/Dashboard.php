<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $data['content']='Dashboard/dashboard';
        echo view('BasicTemplate/content',$data);
    }
   
    
}	