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
    private $modelName  = PresenceLocation::class;

    protected $model; // Property untuk menyimpan instance model

    public function __construct()
    {
        // parent::__construct(); // Memanggil constructor parent
        $this->model = new $this->modelName; // Menginisialisasi model
    }

    public function index()
    {
        $data = [
            'title'                 => $this->pagetitle,
            'presence_locations'    => $this->model->findAll()
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
            $this->model->insert([
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
        $decodeId = decode_id($id)[0];

        $data = [
            'title'                 => 'Edit '.$this->pagetitle,
            'validation'            => Services::validation(),
            'route_back'            => base_url($this->route),
            'presence_location'     => $this->model->find($decodeId),
        ];

        return view($this->namespace.'/edit', $data);
    }

    public function update($id)
    {
        $decodeId = decode_id($id)[0];

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
                'title'                 => 'Edit '.$this->pagetitle,
                'validation'            => Services::validation(),
                'presence_location'     => $this->model->find($decodeId),
                'route_back'            => base_url($this->route)
            ];

            echo view($this->namespace.'/edit', $data);
        }else{
            $this->model->update($id, [
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
        $decodeId = decode_id($id)[0];

        $presence_location = $this->model->find($decodeId);
        if($presence_location){
            $this->model->delete($decodeId);
            session()->setFlashdata('success', 'Data has ben deleted');

            return redirect()->to(base_url($this->route));
        }
    }

    public function detail($id)
    {
        $decodeId = decode_id($id)[0];

        $data = [
            'title'             => 'Detail '.$this->pagetitle,
            'route_back'        => base_url($this->route),
            'presence_location' => $this->model->find($decodeId)
        ];

        return view($this->namespace.'/detail', $data);
    }
}
