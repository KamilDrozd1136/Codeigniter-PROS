<?php 

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Libraries\Hash;

class Auth extends Controller
{
    public function __construct(){
        helper(['url','form']);
    }
    public function index()
    {
        return view('auth/login');
    }
    public function register(){
        return view('auth/register');
    }
    public function changepassword(){
        return view('auth/changepassword');
    }
    public function save(){
      
    $validation = $this->validate([
        'username' =>[
            'rules'=>'required|is_unique[users.username]',
            'errors'=>[
                'required'=>'Nazwa użytkownika jest wymagana',
                'is_unique'=>'Nazwa użytkownika jest już zajęta'
            ]
            ],
        'password'=>[
            'rules'=>'required|min_length[5]|max_length[16]',
            'errors'=>[
                'required'=>'Hasło jest wymagane',
                'min_length'=>'Hasło mieć przynajmniej 5 znaków',
                'max_length'=>'Hasło nie może być dłuższe niż 16 znaków'
            ]
            ],
        'cpassword'=>[
                'rules'=>'required|min_length[5]|max_length[16]|matches[password]',
                'errors'=>[
                    'required'=>'Hasło jest wymagane',
                    'min_length'=>'Hasło mieć przynajmniej 5 znaków',
                    'max_length'=>'Hasło nie może być dłuższe niż 16 znaków',
                    'matches'=>'Hasła nie są takie same'
                ]
                ]

                ]);


        if(!$validation){
            return view('auth/register',['validation'=>$this->validator]);
        }else {
           $username = $this->request->getPost('username');
           $password = $this->request->getPost('password');

           $values = [
               'username'=>$username,
               'password'=>Hash::make($password),
           ];

           $usersModel = new \App\Models\UsersModel();
           $query = $usersModel->insert($values);
           if(!$query){
               return redirect()->back()->with('fail','Coś poszło nie tak');
              // return redirect()->to('register')->with('fail','Coś poszło nie tak');
           } else {
            return redirect()->to('auth/register')->with('success','Zarejestrowano pomyślnie');
           }
        }

    }
        public function changepass()
        {
            $validation = $this->validate([
      
                'password'=>[
                    'rules'=>'required|min_length[5]|max_length[16]',
                    'errors'=>[
                        'required'=>'Hasło jest wymagane',
                        'min_length'=>'Hasło mieć przynajmniej 5 znaków',
                        'max_length'=>'Hasło nie może być dłuższe niż 16 znaków'
                    ]
                    ],
                'cpassword'=>[
                        'rules'=>'required|min_length[5]|max_length[16]|matches[password]',
                        'errors'=>[
                            'required'=>'Hasło jest wymagane',
                            'min_length'=>'Hasło mieć przynajmniej 5 znaków',
                            'max_length'=>'Hasło nie może być dłuższe niż 16 znaków',
                            'matches'=>'Hasła nie są takie same'
                        ]
                        ]
        
                        ]);

            
            $uid = session()->get('loggedUser');

            if(!$validation){
                return view('auth/changepassword',['validation'=>$this->validator]);
            }else {
               $password = $this->request->getPost('password');
    
               $data = [
                'password'=>Hash::make($password),
               ];   
               $usersModel = new \App\Models\UsersModel();
               $usersModel->update($uid,$data);
               if(!$usersModel){
                   return redirect()->back()->with('fail','Coś poszło nie tak');
                  // return redirect()->to('register')->with('fail','Coś poszło nie tak');
               } else {
                return redirect()->to('dashboard/index')->with('success','Hasło zostało zmienione');
               }
            }
    
        }


    function check(){

       $validation = $this->validate([
            'username'=>[
                'rules'=>'required|is_not_unique[users.username]',
                'errors'=>[
                    'required'=>'Nazwa użytkownika jest wymagana',
                    'is_not_unique'=>'Brak użytkownika o takiej nazwie'
                ]
                ],
            'password'=>[
                'rules'=>'required|min_length[5]|max_length[16]',
                    'errors'=>[
                    'required'=>'Hasło jest wymagane',
                    'min_length'=>'Hasło mieć przynajmniej 5 znaków',
                    'max_length'=>'Hasło nie może być dłuższe niż 16 znaków'
                  ]
            ]

        ]);

                    if(!$validation){
                        return view('auth/login',['validation'=>$this->validator]);
                    }else {

                        $username = $this->request->getPost('username');
                        $password = $this->request->getPost('password');
                        $usersModel = new \App\Models\UsersModel();
                        $user_info = $usersModel->where('username', $username)->first();
                        $check_password = Hash::check($password, $user_info['password']);

                        if(!$check_password){
                            session()->setFlashdata('fail', 'Niepoprawne hasło');
                            return redirect()->to('/auth')->withInput();
                        }else{
                            $user_id = $user_info['user_id'];
                            $user = $user_info['username'];
                            session()->set('loggedUser',$user_id);
                            session()->set('username',$user);
                            return redirect()->to('/dashboard/index');
                        }
                    }
   }

   public function logout() {

    if(session()->get('loggedUser')){
    session()->remove('loggedUser');
    session()->remove('username');
    return redirect()->to('/auth');
    }
}

  
}