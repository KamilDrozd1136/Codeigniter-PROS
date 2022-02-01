<?php

namespace App\Controllers;
use App\Models\OffersModel;

class Dashboard extends BaseController
{
     public function __construct(){
        helper(['url','form']);
        $this->db= \Config\Database::connect();
    }

    public function index()
    {
        $offer = new OffersModel;
        $data['offer'] = $offer->where('status','1')->orderBy('offer_id','DESC')->findAll();
        return view('dashboard/index',$data);
    }
 
    public function view($id = null)
    {
      $offer = new OffersModel;
      $data['offer'] = $offer->find($id);
     
      return view('dashboard/offerview', $data);
    }

// PODATNY NA SQL INJECTION

    public function viewCategory($id = null){ 

      $data['offer'] = $this->db->query("SELECT * from offers WHERE category_id=$id")->getResultArray();     
      return view('dashboard/viewcategory', $data);
    }
   
/*
      NIE PODATNY SQL INJECTION 

    public function viewCategory($id = null)
    {
      $offer = new OffersModel;
      $data['offer'] = $offer->where('category_id',$id)->where('status',1)->findAll();
     
      return view('dashboard/viewcategory', $data);
    }
*/  

    public function viewMyOffers($id = null)
    {
      $offer = new OffersModel;
      $data['offer'] = $offer->where('seller_id',$id)->findAll();
     
      return view('dashboard/myoffers', $data);
    }
    public function viewMyPurchases($id = null)
    {
      $offer = new OffersModel;
      $data['offer'] = $offer->where('buyer',$id)->findAll();
     
      return view('dashboard/mypurchases', $data);
    }


    public function transaction($id = null)
    {

        $offer = new OffersModel;
        $data['offer'] = $offer->find($id);

        return view('dashboard/transaction', $data);
    }
}
