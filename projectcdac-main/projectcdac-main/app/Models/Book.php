<?php
namespace App\Models;
use CodeIgniter\Model;

class Book extends Model
{

public function reg($data=array())
{

    print_r($data);

    $salt = "abc";// You can adjust the length of the salt

    // Concatenate the salt with the password
    $saltedPassword = $data['password'] . $salt;

    // Hash the salted password using MD5
    $data['password'] = md5($saltedPassword);

    
    unset($data['cfpass']);
    return $this->db
                        ->table('pass_det')
                        ->insert($data);


}
public function booking($data=array())
{

    print_r($data);
             
//print_r($data['seat'][0]->seat);
 // Assuming you want to get the result as an array

$c=0;
  foreach ($data['pass_name'] as $key => $name) {
$builder = $this->db->table('seat')->where('train_id', $data['train_id'])->where('date_j', $data['date_j']);
$query = $builder->get();
$data['seat'] = $query->getResult();
if (!empty($data['seat'])) {
    $firstRow = $data['seat'][0]->train_id;
    
   // $date_j = $data['seat'][0]->date_j;
     $newval = ($data['seat'][0]->seat) - 1;
  $this->db->table('seat')
    ->where('train_id', $firstRow) 
    ->where('date_j', $data['date_j'])
    ->update(['seat' => $newval]);
}

    $passengerData = [
        'train_id' => $data['train_id'],
        'org' => $data['org'],
        'dest' => $data['dest'],
        'org_time' => $data['org_time'],
        'dest_time' => $data['dest_time'],
        'date_j' => $data['date_j'],
        'pass_name' => $data['pass_name'][$key],
        'pass_age' => $data['pass_age'][$key],
        'fare' => $data['fare'],
        'prof_id' => $_SESSION['login_id'],
        'seat_no' =>  $data['seat'][0]->seat
        ];

   $this->db->table('booking')->insert($passengerData);
    
}

}


public function addtrain($data=array())
{

   // print_r($data);
            
    $trainData = [
        'Id' => $data['Id'],
        'name' => $data['name'],
        'origin' => $data['origin'],
        'dest' => $data['dest'],
        'origin_time' => $data['origin_time'],
        'dest_time' => $data['dest_time']    
        ];

   $this->db->table('train')->insert($trainData);



}

public function updatetrain($data=array())
{

   // print_r($data);
            
    $trainData = [
        'Id' => $data['Id_up'],
        'name' => $data['name_up'],
        'origin' => $data['origin'],
        'dest' => $data['dest'],
        'origin_time' => $data['origin_time'],
        'dest_time' => $data['dest_time']    
        ];

        $this->db->table('train')->where('Id', $data['Id_up'])->update($trainData);

}

}
?>