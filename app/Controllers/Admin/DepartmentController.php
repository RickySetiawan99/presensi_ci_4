<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Department;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class DepartmentController extends BaseController
{
    private $route      = 'admin/department';
    private $pagetitle  = 'Department';
    private $namespace  = 'admin/departments';
    private $modelName  = Department::class;

    protected $model; // Property untuk menyimpan instance model

    public function __construct()
    {
        // parent::__construct(); // Memanggil constructor parent
        $this->model = new $this->modelName; // Menginisialisasi model
    }

    public function index()
    {
        $data = [
            'title'         => $this->pagetitle,
            'departments'   => $this->model->findAll()
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
            'department' => [
                'rules'     => 'required',
                'errors'    =>[
                    'required' => 'Department is required' 
                ]
            ]
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
                'department' => $this->request->getPost('department')
            ]);

            session()->setFlashdata('success', 'Data Department saved succesfully');

            return redirect()->to(base_url($this->route));
        }
    }

    public function edit($id)
    {
        $decodeId = decode_id($id)[0];

        $data = [
            'title'         => 'Edit '.$this->pagetitle,
            'validation'    => Services::validation(),
            'route_back'    => base_url($this->route),
            'department'    => $this->model->find($decodeId),
        ];

        return view($this->namespace.'/edit', $data);
    }

    public function update($id)
    {
        $decodeId = decode_id($id)[0];

        $rules = [
            'department' => [
                'rules'     => 'required',
                'errors'    =>[
                    'required' => 'Department is required' 
                ]
            ]
        ];

        if(!$this->validate($rules)){
            $data = [
                'title'         => 'Edit '.$this->pagetitle,
                'validation'    => Services::validation(),
                'department'    => $this->model->find($decodeId),
                'route_back'    => base_url($this->route)
            ];

            echo view($this->namespace.'/edit', $data);
        }else{
            $this->model->update($decodeId, [
                'department' => $this->request->getPost('department')
            ]);

            session()->setFlashdata('success', 'Data Department updated succesfully');

            return redirect()->to(base_url($this->route));
        }
    }

    public function delete($id)
    {
        $decodeId = decode_id($id)[0];

        $department = $this->model->find($decodeId);
        if($department){
            $this->model->delete($decodeId);
            session()->setFlashdata('success', 'Data has ben deleted');

            return redirect()->to(base_url($this->route));
        }
    }
}
