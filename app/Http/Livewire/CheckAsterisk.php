<?php

namespace App\Http\Livewire;

use Exception;
use Livewire\Component;
use PAMI\Client\Impl\ClientImpl;
use PAMI\Message\Action\PingAction;

class CheckAsterisk extends Component
{
    // public $connect;
    
    public function render()
    {
        return view('livewire.check-asterisk');
    }

    public function booted()
    {
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
            $action = new PingAction();
          
           
            $manager->open();
            $ping = $manager->send($action);
            $manager->close();
           
           

            $pong = $ping->getKey('ping');

            if ($pong ==='Pong') {
                $this->connect = 1;
            } else {
                $this->connect = 0;
            }
        } catch (Exception $e) {
            $this->connect = 0;
        }
    }
}
