<?php
// Định nghĩa lớp Sinh viên
class Student {
    public $id;
    public $name;
    public $age;
    public $grade;
    

    public function __construct($id, $name, $age, $grade) {
        $this->major = $id;
        $this->name = $name;
        $this->age = $age;
        $this->gender = $grade;
    }
}

// Định nghĩa lớp Danh sách Sinh viên
class StudentDAO {
    public $students = array();

    public function addStudent($student) {
        array_push($this->students, $student);
    }

    public function getAllStudents() {
        return $this->students;
    }
}

// Đọc dữ liệu từ file và lưu vào danh sách sinh viên
$studentDAO = new StudentDAO();
$file = fopen("students.txt", "r");
while (!feof($file)) {
    $line = fgets($file);
    $data = explode(",", $line);
    $id = $data[0];
    $name = $data[1];
    $age = $data[2];
    $grade = $data[3]; 
    $student = new Student($id, $name, $age, $grade);
    $studentDAO->addStudent($student);
}
fclose($file);

// Hiển thị danh sách sinh viên trên trang web
$students = $studentDAO->getAllStudents();
foreach ($students as $student) {
    echo "<p>" . $student->id . " - " . $student->name . " - " . $student->age . " - " . $student->grade . "</p>";
}
?>