<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PAMI\Client\Impl\ClientImpl;
use PAMI\Message\Action\SIPPeersAction;
use PAMI\Message\Action\CoreShowChannelsAction;

class Activecallscontroller extends Controller
{
    public function index()
    {
        $calls = [];
        $options = array(
        'host' => config('app.ami_url'),
        'port' => config('app.ami_port'),
        'username' => config('app.ami_user'),
        'secret' => config('app.ami_password'),
        'connect_timeout' => '20',
        'read_timeout' => '40',
        'scheme' => 'tcp://'
    );



        try {
            $manager = new ClientImpl($options);
            $action = new CoreShowChannelsAction();
      
       
            $manager->open();
            $ping = $manager->send($action);
            $manager->close();
       
         
            $events =  $ping->getEvents();
            
            foreach ($events as $key => $value) {
                if ($value->getKey('event') === 'CoreShowChannel') {
                    $calls[] =  $value->getKeys();
                }
            }
            //  dd($calls);

            if ($calls) {
                return view('calls.index', ['calls' => $calls]);
            } else {
                return view('calls.index', ['calls' => []]);
            }
        } catch (Exception $e) {
            $this->connect = 0;
        }
    }
}
