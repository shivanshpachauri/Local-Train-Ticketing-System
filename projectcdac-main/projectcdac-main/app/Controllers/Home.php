<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Book;


class Home extends Basecontroller
{
    private $book_model = '' ; 
    private  $db ; 
    private $session;
    public function __construct(){
       $db = db_connect(); 
    }
    
    public function index(): string
    {
        return view('welcome_message');
    }

    public function dashboard()
    {
            $db = db_connect(); 
          $data = [];
        // $data['title']      = 'Page Title';
        // $data['heading']    = 'Welcome';
          $session = session(); 
        $data['main_content']   = 'dashboard';   // page name


$builder=$db->table('train');
$query=$builder->get();
$data['record']=$query;

$builder=$db->table('station');
$query=$builder->get();
$data['station']=$query;


if($_SERVER['REQUEST_METHOD']=="GET" && isset($_GET['org']))
{

$org=$_GET['org'];
$dest=$_GET['dest'];
$builder=$db->table('station_time')->where('origin_stat',$org)->where('dest_stat',$dest);
$query=$builder->get();
$data['station_time']=$query;


$builder=$db->table('fare')->where('org_stat',$org)->where('dest_stat',$dest);
$query=$builder->get();
$data['fare']=$query;

$builder=$db->table('seat')->where('date_j',$_GET['inputDate']);
$query=$builder->get();
$data['seat']=$query;


}

if(!isset($_SESSION['login_id']))
{
     

return redirect()->to('http://localhost:8080/login');

}


if($_SERVER['REQUEST_METHOD']=="POST")
{

    if($_POST["logout"]=="flag_logout")
    {
$session->destroy();
 return redirect()->to('http://localhost:8080/login');
    }
     
}

        echo view('dashboard',$data);        
    }
    public function login()
    {
           
        $data = [];
        // $data['title']      = 'Page Title';
        // $data['heading']    = 'Welcome';
        $data['main_content']   = 'login';   // page name
        $session = session();  
        $session->setFlashdata('msg', '');
                if($_SERVER['REQUEST_METHOD']=="POST")  {


    $salt = "abc";// You can adjust the length of the salt

    // Concatenate the salt with the password
    $saltedPassword = $_POST['password'] . $salt;

    // Hash the salted password using MD5
    $_POST['password'] = md5($saltedPassword);
 
    //print_r($_POST);
                       $db = db_connect();  
                       $rows =  $db->table('pass_det')->where($_POST)->countAllResults(); 
                       $session = session(); 


                       if($rows==1){
                        $query= $db->table('pass_det')->where($_POST)->limit(1);
                        $que = $query->get();
                         $result = $que->getResult();
                         // print_r($result[0]->id);
                            $session->setFlashdata('msg', 'valid User');
                             $_SESSION['login_id']=$result[0]->id;
                            
                         return redirect()->to('http://localhost:8080/dashboard') ;
                        }else{
                         $session->setFlashdata('msg', 'Invalid User');
                 }        
        }

        echo view('header');
        echo view('login');
        echo view('footer');
        return 0;
      
    }
    public function registration()
    {
         $data = [];
        // $data['title']      = 'Page Title';
        // $data['heading']    = 'Welcome to infovistar.in'
        $data['main_content']   = 'registration';   // page name
         
             if($_SERVER['REQUEST_METHOD']=="POST")
                {
                    //print_r($_POST);    
 
                    $book = new Book;
                    $data["reg"]=$book->reg($_POST); 
                          $session = session();
                     $session->setFlashdata('msg_r', 'Your registration was successful!');
                           return redirect()->to('http://localhost:8080/login');
                
                }

                echo view('registration'); 
                echo view('footer');
               // return 0;
        
               
    }
public function booktrain()
{

        $data = [];
        // $data['title']      = 'Page Title';
        // $data['heading']    = 'Welcome to infovistar.in'
        $data['main_content']   = 'booktrain';  
          $db = db_connect(); // page name
        $session = session();  
        $builder=$db->table('station');
        $query=$builder->get();
    $data['station']=$query;
  if($_SERVER['REQUEST_METHOD']=="GET")
                {
                    //print_r($_POST);    
                    $data['add']=$_GET;
                         echo view('booktrain',$data);   
                
                }
  if($_SERVER['REQUEST_METHOD']=="POST")
                {
                    $data['add']=$_GET;
                    $book = new Book;
                    $data["booking"]=$book->booking($_POST); 
                                                 
                    $session->setFlashdata('msg_b', 'Your booking was successful!');
                    return redirect()->to('http://localhost:8080/ticket');

            }
    }
   
public function ticket()
{
        $data['main_content']   = 'ticket';  
        $db = db_connect(); 
        $session = session(); 
        $builder = $db->table('booking')->where('prof_id', $_SESSION['login_id']);
        $query=$builder->get();
        $data['record_ticket']=$query;
        if($_SERVER['REQUEST_METHOD']=="POST")
                {
                    print_r($_POST);
                //    die();
         $db->table('booking')->where('Id', $_POST['del_id'])->delete();
         return redirect()->to('http://localhost:8080/ticket');
                  }

        echo view('ticket',$data);        
    }
    public function profile()
    {

        $db = db_connect(); 
          $data = [];
        // $data['title']      = 'Page Title';
        // $data['heading']    = 'Welcome';
          $session = session(); 
        $data['main_content']   = 'profile';   // page name


$builder=$db->table('pass_det')->where('id', $_SESSION['login_id']);
$query=$builder->get();
$data['record']=$query;

       echo view('profile',$data); 
        echo view('footer');

    }
     public function adminlogin()
    {
        $data = [];
        // $data['title']      = 'Page Title';
        // $data['heading']    = 'Welcome';
        $data['main_content']   = 'adminlogin';   // page name
        $session = session();  
        $session->setFlashdata('msg', '');
        if($_SERVER['REQUEST_METHOD']=="POST")
        {               
    $salt = "abc";// You can adjust the length of the salt

    // Concatenate the salt with the password
    $saltedPassword = $_POST['password'] . $salt;

    // Hash the salted password using MD5
    $_POST['password'] = md5($saltedPassword);
    //print_r($_POST);


                       $db = db_connect();  
                       $rows =  $db->table('admin')->where($_POST)->countAllResults();
                      

                       $session = session();          
                       if($rows==1){
                       
                        $query= $db->table('admin')->where($_POST)->limit(1);
                        $que = $query->get();
                         $result = $que->getResult();
                         // print_r($result[0]->id);
                          
                            $session->setFlashdata('msg_ad', 'valid User');
                            $_SESSION['login_admin']=$result[0]->id;
                           return redirect()->to('http://localhost:8080/admindashboard') ;
                        }else{
                         $session->setFlashdata('msg_ad', 'Invalid User');
                 }        
        }

        //echo view('header');
        echo view('adminlogin');
        //echo view('footer');
        return 0;

               
    }
     public function ticketfare()
    {
        echo view('ticketfare');        
    }
  public function admindashboard()
    {

        $db = db_connect(); 
$session = session(); 
        $builder=$db->table('station');
        $query=$builder->get();
        $data['station']=$query;

$builder=$db->table('train');
$query=$builder->get();
$data['train']=$query;

        if($_SERVER['REQUEST_METHOD']=="POST")
                {
                    //print_r($_POST);   
                   

if(isset($_POST["logout"]) && $_POST["logout"]=="flag_logout_admin")
    {
$session->destroy();
 return redirect()->to('http://localhost:8080/adminlogin');
    }
else if(isset($_POST['del_id']))
                 {

       $db->table('train')->where('Id', $_POST['del_id'])->delete();
         return redirect()->to('http://localhost:8080/admindashboard');

     }else if(isset($_POST['Id_up']))
     {


                    $book = new Book;
                    $data["updatetrain"]=$book->updatetrain($_POST); 
                        $session = session();
                     $session->setFlashdata('msg_train', 'Train detail are updated');
                           return redirect()->to('http://localhost:8080/admindashboard');

     }
     else if(isset($_POST['Id']))
     {


                    $book = new Book;
                    $data["addtrain"]=$book->addtrain($_POST); 
                        $session = session();
                     $session->setFlashdata('msg_train', 'Train detail are updated');
                           return redirect()->to('http://localhost:8080/admindashboard');

     }
    }
        echo view('admindashboard',$data);        
    
}

     public function modifyseat()
    {

 if($_SERVER['REQUEST_METHOD']=="POST")
                {

  $db = db_connect();
                     $seatData = [
    
        'train_id' => $_POST['train_id'],
        'seat' => $_POST['seat'],
        'date_j' => $_POST['date_j'],
         
        ];

        $db->table('seat')->where('train_id', $_POST['train_id'])->update($seatData);
    $session = session();
                     $session->setFlashdata('msg_seat', 'Seat was modified!');
                  //  print_r($_POST);
    }

        echo view('modifyseat');        
    }

   public function modifyfare()
    {
         $db = db_connect(); 
          $data = [];
        $builder=$db->table('station');
$query=$builder->get();
$data['station']=$query;

//print_r($_POST);
 if($_SERVER['REQUEST_METHOD']=="POST")
                {
//print_r($_POST);

                    $db = db_connect();
                     $faremodify = [
    
        'train_id' => $_POST['train_id'],
        'date_j' => $_POST['date_j'],
        'org_stat' => $_POST['org_stat'],
        'dest_stat' => $_POST['dest_stat'],
        'fare' => $_POST['fare'],
         
        ];

        $db->table('fare')->where('train_id', $_POST['train_id'])->update($faremodify);
$session = session();
                     $session->setFlashdata('msg_fare', 'Fare was modified!');


                      //  print_r($_POST);


                }

        echo view('modifyfare',$data);        
    }


}
