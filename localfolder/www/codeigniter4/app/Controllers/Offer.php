<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Offer extends BaseController
{
    public function __construct(){
        helper(['url','form']);
    }
    public function index()
    {
        return view('offer/addoffer');
    }
    
    public function add(){
      
        $offersModel = new \App\Models\OffersModel();

        $validation = $this->validate([
            'title' =>[
                'rules'=>'required|min_length[5]|max_length[50]',
                'errors'=>[
                    'required'=>'Tytuł jest wymagany'
                ]
                ],
            'desc'=>[
                'rules'=>'required|min_length[5]|max_length[500]',
                'errors'=>[
                    'required'=>'Opis jest wymagany',
                    'min_length'=>'Opis musi mieć przynajmniej 5 znaków',
                    'max_length'=>'Opis jest za długi'
                ]
                ],
            'localization'=>[
                'rules'=>'required',
                    'errors'=>[
                        'required'=>'Lokalizacja jest wymagana'
                    ]
                    ],
            'price'=>[
                'rules'=>'required',
                    'errors'=>[
                        'required'=>'Cena jest wymagana'
                     ]
                    ],

                     'image' => [
                        'label' => 'Image File',
                        'rules' => 
                             'required|mime_in[image,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                             'errors'=>[
                                'mime_in'=>'Niepoprawny plik',
                                'required'=>'Zdjęcie jest wymagane'
                            ]

                    ]
                     
                     
                    ]);
    
    
            if(!$validation){
                return view('offer/addoffer',['validation'=>$this->validator]);
            }else {

               $file = $this->request->getFile('image');
               if($file->isValid() && ! $file->hasMoved())
               {
                    $imageName = $file->getRandomName();
                    $file->move('uploads/', $imageName);       
               }


               $title = $this->request->getPost('title');
               $desc = $this->request->getPost('desc');
               $cat = $this->request->getPost('category');
               $end = $this->request->getPost('enddate');
               $loc = $this->request->getPost('localization');
               $price = $this->request->getPost('price');
               $uid = session()->get('loggedUser');
               $values = [
                   'title'=>$title,
                   'seller_id'=>$uid,
                   'desc'=>$desc,
                   'enddate'=>$end,
                   'category_id'=>$cat,
                   'price'=>$price,
                   'loc'=>$loc,
                   'file_name'=>$imageName
               ];
    
               $query = $offersModel->insert($values);
               if(!$query){
                   return redirect()->back()->with('fail','Coś poszło nie tak');
               } else {
                return redirect()->to('/dashboard/index')->with('success','Dodano pomyślnie');
               }
            }
    
        }

        public function edit($id = null)
        {
            $offer = new \App\Models\OffersModel();
            $data['offer'] = $offer->find($id);
            return view('offer/editoffer',$data);
        
        }

        public function update($id = null)
        {
            $offer = new \App\Models\OffersModel();
            $data = [
                'title' => $this->request->getPost('title'),
                'desc' => $this->request->getPost('desc'),
                'cat' => $this->request->getPost('category'),
                'end' => $this->request->getPost('enddate'),
                'loc' => $this->request->getPost('localization'),
                'price' => $this->request->getPost('price')
            ];

            $offer->update($id, $data);
            return redirect()->to('/dashboard/index');
        
        }

        public function changeStatus($id = null)
        {
            $offer = new \App\Models\OffersModel();
            $data = [
                'status' => 0,
                'buyer' => session()->get('loggedUser')
            ];

            $offer->update($id,$data);
            return redirect()->to('/dashboard/index');
        
        }


        
        
}