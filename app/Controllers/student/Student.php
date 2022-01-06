<?php
namespace App\Controllers\student;
use CodeIgniter\Controller;
use App\Models\student\Student_m;
class Student extends Controller{
    private $student_m;
    private $session;

    public function __construct(){
        helper('form');
        $this->student_m = new Student_m();
        $this->session = session();
    }

    public function index(){
        $db1 = \Config\Database::connect();
        $db2 = \Config\Database::connect('development');
        
        $data['session'] = $this->session;
        $data['title'] = 'Students Detail';
        $data['students_list'] = $this->student_m->findAll();

        echo view('header_v',$data);
        echo view('Student/student_v',$data);
    }

    public function add_student(){
        $data['title'] = 'Add Students Detail';
        if($this->request->getMethod() == 'post'){
            $rules = [
                "fName" => [
                    "label" => "First Name",
                    "rules" => "required",
                    "errors" => [
                        "required" => "First Name Required"
                    ]
                ],
                'lName' => [
                    "label" => "Last Name",
                    "rules" => "required|min_length[3]"
                ],
                'rollno' => [
                    "label" => "Roll No",
                    "rules" => "required|min_length[1]|numeric"
                ],
                'age' => [
                    "label" => "Age",
                    "rules" => "required|numeric"
                ]
            ];

            if($this->validate($rules)){
                $std_data = [
                    'first_name' => $this->request->getPost('fName'),
                    'last_name' => $this->request->getPost('lName'),
                    'roll_no' => $this->request->getPost('rollno'),
                    'age' => $this->request->getPost('age')
                ];
                $this->student_m->insert($std_data);

                // mail code
                $to = 'pranaysurve51@gmail.com';
                $subject = 'Codeigniter 4 Student CRUD';
                $message = 'Hello '.$this->request->getPost('fName').',<br> Thanks For Adding Student Data.';
                $email = \Config\Services::email();
                $email->setFrom('pranaysurve51@gmail.com', 'Pranay Surve');
                $email->setTo($to);
                $email->setSubject($subject);
                $email->setMessage($message);
                if($email->send()){
                    $this->session->setFlashdata('success','Student Data Added Successful And mail send');
                    return redirect()->to('/');
                }else{
                    print_r($email->printDebugger(['headers']));
                }
                $this->session->setFlashdata('success','Student Data Added Successful And mail send fail');
                return redirect()->to('/');
            }else{
                $data['validation'] = $this->validator;
            }
        }
        echo view('header_v',$data);
        echo view('Student/add_student_v',$data);
    }

    public function edit($id = null){
        // var_dump($this->request->getMethod());
        $data = [];
        if($this->request->getMethod() == 'post'){
            $rules = [
                "fName" => [
                    "label" => "First Name", 
                    "rules" => "required|min_length[3]|max_length[20]",
                ],
                'lName' => [
                    "label" => "Last Name",
                    "rules" => "required|min_length[3]"
                ],
                'rollno' => [
                    "label" => "Roll No",
                    "rules" => "required|min_length[1]|numeric"
                ],
                'age' => [
                    "label" => "Age",
                    "rules" => "required|numeric"
                ],
            ];
            if($this->validate($rules)){
                $data = [
                    'first_name' => $this->request->getPost('fName',FILTER_SANITIZE_STRING),
                    'last_name' => $this->request->getPost('lName',FILTER_SANITIZE_STRING),
                    'roll_no' => $this->request->getPost('rollno'),
                    'age' => $this->request->getPost('age')
                ];
                $this->student_m->update($id,$data);
                
                $this->session->setFlashdata('success','Student Edited Successful');
                return redirect()->to(base_url());
            }else{
                $data['validation'] = $this->validator;
            }
        }
        $data['title'] = 'Edit Record';
        $data['single_students_list'] = $this->student_m->find($id);
        // var_dump($data['single_students_list']);
        echo view('header_v',$data);
        echo view('Student/edit_v',$data);
    }
    public function delete($id = null){
        if($this->student_m->where('id',$id)->delete()){
            $this->session->setFlashdata('error','Student Deleted Successful');
            return redirect()->to('/');
        }
    }
}

?>