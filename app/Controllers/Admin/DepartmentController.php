<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Department;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class DepartmentController extends BaseController
{
    private $route      = 'admin/department/';
    private $pagetitle  = 'Department';
    private $namespace  = 'admin/departments';

    public function index()
    {
        $deparment = new Department();

        $data = [
            'title'         => $this->pagetitle,
            'departments'   => $deparment->findAll()
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
            $department = new Department();
            $department->insert([
                'department' => $this->request->getPost('department')
            ]);

            session()->setFlashdata('success', 'Data Department saved succesfully');

            return redirect()->to(base_url($this->route));
        }
    }

    public function edit($id)
    {
        $department = new Department();

        $data = [
            'title'         => 'Edit '.$this->pagetitle,
            'validation'    => Services::validation(),
            'route_back'    => base_url($this->route),
            'department'    => $department->find($id),
        ];

        return view($this->namespace.'/edit', $data);
    }

    public function update($id)
    {
        $department = new Department();

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
                'department'    => $department->find($id),
                'route_back'    => base_url($this->route)
            ];

            echo view($this->namespace.'/edit', $data);
        }else{
            $department = new Department();
            $department->update($id, [
                'department' => $this->request->getPost('department')
            ]);

            session()->setFlashdata('success', 'Data Department updated succesfully');

            return redirect()->to(base_url($this->route));
        }
    }

    public function delete($id)
    {
        $departmentModel = new Department();

        $department = $departmentModel->find($id);
        if($department){
            $departmentModel->delete($id);
            session()->setFlashdata('success', 'Data has ben deleted');

            return redirect()->to(base_url($this->route));
        }
    }
}
