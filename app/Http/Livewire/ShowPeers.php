<?php

namespace App\Http\Livewire;

use Livewire\Component;
use PAMI\Client\Impl\ClientImpl;
use PAMI\Message\Action\SIPPeersAction;

class ShowPeers extends Component
{
    public $providers;
    public $sippeers;
    public function render()
    {
        return view('livewire.show-peers', [
            'providers' => $this->providers,
            'sippeers' => $this->sippeers,
        ]);
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
            $action = new SIPPeersAction();
          
           
            $manager->open();
            $ping = $manager->send($action);
            $manager->close();
           
            // dd($ping->getEvents());
            $events =  $ping->getEvents();

            foreach ($events as $key => $value) {
                ;
                if ($value->getKey('event') === 'PeerEntry') {
                    $this->sippeers[] =  $value->getKeys();
                }
            }
            // die();
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
