<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PresenceLocation;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class PresenceLocationController extends BaseController
{
    private $route      = 'admin/presence_location';
    private $pagetitle  = 'Presence Location';
    private $namespace  = 'admin/presence_locations';

    public function index()
    {
        $presence_location = new PresenceLocation();

        $data = [
            'title'                 => $this->pagetitle,
            'presence_locations'    => $presence_location->findAll()
        ];

        return view($this->namespace.'/index', $data);
    }

    public function create()
    {
        $data = [
            'title'         => 'Add '.$this->pagetitle,
            'validation'    => Services::validation(),
            'route_back'    => base_url($this->route)
        ];

        return view($this->namespace.'/create', $data);
    }

    public function store()
    {
        $rules = [
            'name' => [
                'rules'     => 'required',
                'errors'    =>[
                    'required' => 'Name is required' 
                ]
            ],
            'address' => [
                'rules'     => 'required',
                'errors'    =>[
                    'required' => 'Address is required' 
                ]
            ],
            'tipe' => [
                'rules'     => 'required',
                'errors'    =>[
                    'required' => 'Tipe is required' 
                ]
            ],
            'latitude' => [
                'rules'     => 'required',
                'errors'    =>[
                    'required' => 'Latitude is required' 
                ]
            ],
            'longitude' => [
                'rules'     => 'required',
                'errors'    =>[
                    'required' => 'Longitude is required' 
                ]
            ],
            'radius' => [
                'rules'     => 'required',
                'errors'    =>[
                    'required' => 'Radius is required' 
                ]
            ],
            'timezone' => [
                'rules'     => 'required',
                'errors'    =>[
                    'required' => 'Timezone is required' 
                ]
            ],
            'clock_in' => [
                'rules'     => 'required',
                'errors'    =>[
                    'required' => 'Clock In is required' 
                ]
            ],
            'clock_out' => [
                'rules'     => 'required',
                'errors'    =>[
                    'required' => 'Clock Out is required' 
                ]
            ],
        ];

        if(!$this->validate($rules)){
            $data = [
                'title'         => 'Add '.$this->pagetitle,
                'validation'    => Services::validation(),
                'route_back'    => base_url($this->route)
            ];

            echo view($this->namespace.'/create', $data);
        }else{
            $presence_location = new PresenceLocation();
            $presence_location->insert([
                'name' => $this->request->getPost('name'),
                'address' => $this->request->getPost('address'),
                'tipe' => $this->request->getPost('tipe'),
                'latitude' => $this->request->getPost('latitude'),
                'longitude' => $this->request->getPost('longitude'),
                'radius' => $this->request->getPost('radius'),
                'timezone' => $this->request->getPost('timezone'),
                'clock_in' => $this->request->getPost('clock_in'),
                'clock_out' => $this->request->getPost('clock_out'),
            ]);

            session()->setFlashdata('success', 'Data presence_location saved succesfully');

            return redirect()->to(base_url($this->route));
        }
    }

    public function edit($id)
    {
        $presence_location = new PresenceLocation();

        $data = [
            'title'                 => 'Edit '.$this->pagetitle,
            'validation'            => Services::validation(),
            'route_back'            => base_url($this->route),
            'presence_location'     => $presence_location->find($id),
        ];

        return view($this->namespace.'/edit', $data);
    }

    public function update($id)
    {
        $presence_location = new PresenceLocation();

        $rules = [
            'name' => [
                'rules'     => 'required',
                'errors'    =>[
                    'required' => 'Name is required' 
                ]
            ],
            'address' => [
                'rules'     => 'required',
                'errors'    =>[
                    'required' => 'Address is required' 
                ]
            ],
            'tipe' => [
                'rules'     => 'required',
                'errors'    =>[
                    'required' => 'Tipe is required' 
                ]
            ],
            'latitude' => [
                'rules'     => 'required',
                'errors'    =>[
                    'required' => 'Latitude is required' 
                ]
            ],
            'longitude' => [
                'rules'     => 'required',
                'errors'    =>[
                    'required' => 'Longitude is required' 
                ]
            ],
            'radius' => [
                'rules'     => 'required',
                'errors'    =>[
                    'required' => 'Radius is required' 
                ]
            ],
            'timezone' => [
                'rules'     => 'required',
                'errors'    =>[
                    'required' => 'Timezone is required' 
                ]
            ],
            'clock_in' => [
                'rules'     => 'required',
                'errors'    =>[
                    'required' => 'Clock In is required' 
                ]
            ],
            'clock_out' => [
                'rules'     => 'required',
                'errors'    =>[
                    'required' => 'Clock Out is required' 
                ]
            ],
        ];

        if(!$this->validate($rules)){
            $data = [
                'title'         => 'Edit '.$this->pagetitle,
                'validation'    => Services::validation(),
                'department'    => $presence_location->find($id),
                'route_back'    => base_url($this->route)
            ];

            echo view($this->namespace.'/edit', $data);
        }else{
            $presence_location = new PresenceLocation();
            $presence_location->update($id, [
                'name' => $this->request->getPost('name'),
                'address' => $this->request->getPost('address'),
                'tipe' => $this->request->getPost('tipe'),
                'latitude' => $this->request->getPost('latitude'),
                'longitude' => $this->request->getPost('longitude'),
                'radius' => $this->request->getPost('radius'),
                'timezone' => $this->request->getPost('timezone'),
                'clock_in' => $this->request->getPost('clock_in'),
                'clock_out' => $this->request->getPost('clock_out'),
            ]);

            session()->setFlashdata('success', 'Data Presence Location updated succesfully');

            return redirect()->to(base_url($this->route));
        }
    }

    public function delete($id)
    {
        $presenceLocation = new PresenceLocation();

        $presence_location = $presenceLocation->find($id);
        if($presence_location){
            $presenceLocation->delete($id);
            session()->setFlashdata('success', 'Data has ben deleted');

            return redirect()->to(base_url($this->route));
        }
    }

    public function detail($id)
    {
        $presence_location = new PresenceLocation();

        $data = [
            'title'             => 'Detail '.$this->pagetitle,
            'route_back'        => base_url($this->route),
            'presence_location' => $presence_location->find($id)
        ];

        return view($this->namespace.'/detail', $data);
    }
}
