<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UserModel;

class Users extends BaseController
{
    public function index()
    {
        $data = [];
        helper(['form']);


        if($this->request->getMethod() == 'POST'){
            //let's do the validation here
            $rules=[

            'email' => 'required|min_length[6]|max_length[50]|valid_email',
            'password' => 'required|min_length[8]|max_length[255]|validateUser[email,password]',
            ];


            $errors = [
                'password' => [
                    'validateUser' => 'Email or Password don\'t match'
                ]
            ];



            if(! $this->validate($rules, $errors)){
                $data['validation'] = $this->validator;
            }else{

                $model = new UserModel();

                $user = $model->where('email', $this->request->getVar('email'))
                              ->first();

                $this->setUsersession($user);


                if ($user['role'] == 1) {
                    return redirect()->to('/dashboard');
                } else {
                    return redirect()->to('/index');
                }
                
                
                // $session->setFlashdata('success', 'Successful Registration');
                // return redirect()->to('/index');
            }
        }

        echo view('Admin/login');
    }




    private function setUsersession($user){
        $data = [
            'id' => $user['id'],
            'firstname' => $user['firstname'],
            'lastname' => $user['lastname'],
            'email' => $user['email'],
            'isLoggedIn' => true,

        ];

        session()->set($data);
        return true;
    }


    public function register()
    {
        $data = [];
        helper(['form']);

        if($this->request->getMethod() == 'POST'){
            //let's do the validation here
            $rules=[
            'firstname' => 'required|min_length[3]|max_length[50]',
            'lastname' => 'required|min_length[3]|max_length[50]',
            'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[8]|max_length[255]',
            'repeatpassword' => 'matches[password]',
            ];

            if(! $this->validate($rules)){
                $data['validation'] = $this->validator;
            }else{

                $model = new UserModel();
                
                $newData = [
                    'firstname' => $this->request->getVar('firstname'),
                    'lastname' => $this->request->getVar('lastname'),
                    'email' => $this->request->getVar('email'),
                    'password' => $this->request->getVar('password'),
                ];
                $model->save($newData);
                $session = session();
                $session->setFlashdata('success', 'Successful Registration');
                return redirect()->to('/index');
            }
        }

        echo view('Admin/register', $data);
    }
}
