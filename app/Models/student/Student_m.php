<?php 
namespace App\Models\student;
use CodeIgniter\Model;

class Student_m extends Model{
    protected $table = "students_mst";
    protected $primaryKey = 'id';
    protected $allowedFields = ['first_name','last_name','roll_no','age'];
} 

?>