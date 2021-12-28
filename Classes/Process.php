<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/Session.php');
    include_once ($filepath.'/../lib/Database.php');
    include_once ($filepath.'/../helpers/Format.php');

    class Process{
        private $db;
        private $fm;
        public function __construct(){
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function getProcess($data){
            $selectAns = $this->fm->validation($data['ans']);
            $number = $this->fm->validation($data['number']);
            $selectAns = mysqli_real_escape_string($this->db->link,$selectAns); 
            $number = mysqli_real_escape_string($this->db->link, $number);
            $next = $number+1;
            if (!isset($_SESSION['score'])) {
                $_SESSION['score'] = '0';
            }
            $total = $this->getTotal();
            $right = $this->rightAnswer($number);
            if ($right == $selectAns) {
                $_SESSION['score']++;
            }
            if ( $number == $total) {
                header("Location:score.php");
            }else {
                header("Location:test.php?QsNo=".$next);
            }
        }
        private function getTotal(){
            $query = "SELECT * FROM tbl_ques";
            $getTotalQues = $this->db->select($query);
            $total = $getTotalQues->num_rows;
            return $total;
        }
        private function rightAnswer($number){
            $query = "SELECT * FROM tbl_ans WHERE quesNo = '$number' AND rightAns = '1'";
            $right = $this->db->select($query)->fetch_assoc();
            $result = $right['ansId'];
            return $result;
        }
   
    }
?>