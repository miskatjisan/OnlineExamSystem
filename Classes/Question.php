<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/Session.php');
    include_once ($filepath.'/../lib/Database.php');
    include_once ($filepath.'/../helpers/Format.php');

    class Question{
        private $db;
        private $fm;
        public function __construct(){
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function delQuestion($quesNo){
        
            $tables = array("tbl_ques" , "tbl_ans");
            foreach ($tables as $table) {
                $query = "DELETE FROM $table WHERE quesNo = '$quesNo' ";
                $delData = $this->db->delete($query);
            }
                if ($delData) {
                    $msg = "<span class='success'>Data Deleted Successfully.</span>";
                    return $msg;
                }else {
                    $msg = "<span class='error'>Data Not Deleted!</span>";
                    return $msg;
                }
            
        }
        public function getQuesByOrder(){
            $query = "SELECT * FROM tbl_ques ORDER BY quesNo ASC";
            $getQues = $this->db->select($query);
            return $getQues;
        }
        public function getQuestion(){
            $query = "SELECT * FROM tbl_ques";
            $getQues = $this->db->select($query);
            $result = $getQues->fetch_assoc();
            return $result;
        }
        public function getQuestionByid($number){
            $number = $this->fm->validation($number);
            $number = mysqli_real_escape_string($this->db->link, $number);
            $query = "SELECT * FROM tbl_ques WHERE quesNo = '$number'";
            $getQues = $this->db->select($query);
            $result = $getQues->fetch_assoc();
            return $result;
        }
        public function getAnsById($number){
            $number = $this->fm->validation($number);
            $number = mysqli_real_escape_string($this->db->link, $number);
            $query = "SELECT * FROM tbl_ans WHERE quesNo = '$number'";
            $getans = $this->db->select($query);
            return $getans;
        }
       
        public function getTotalRow(){
            $query = "SELECT * FROM tbl_ques";
            $getTotalQues = $this->db->select($query);
            $total = $getTotalQues->num_rows;
            return $total;
        }
        public function addQuestion($data){
            $quesNo = $this->fm->validation($data['quesNo']);
            $ques = $this->fm->validation($data['ques']);
            $ans1 = $this->fm->validation($data['ans1']);
            $ans2 = $this->fm->validation($data['ans2']);
            $ans3 = $this->fm->validation($data['ans3']);
            $ans4 = $this->fm->validation($data['ans4']);
            $rightAns = $this->fm->validation($data['rightAns']);
            $quesNo = mysqli_real_escape_string($this->db->link, $quesNo);
            $ques = mysqli_real_escape_string($this->db->link, $ques);
            $ans1 = mysqli_real_escape_string($this->db->link, $ans1);
            $ans2 = mysqli_real_escape_string($this->db->link, $ans2);
            $ans3 = mysqli_real_escape_string($this->db->link, $ans3);
            $ans4 = mysqli_real_escape_string($this->db->link, $ans4);
            $rightAns = mysqli_real_escape_string($this->db->link, $rightAns);
            $ans    = array();
            $ans[1] = $ans1;
            $ans[2] = $ans2;
            $ans[3] = $ans3;
            $ans[4] = $ans4;
            $query = "INSERT INTO tbl_ques(quesNo,ques) VALUES('$quesNo','$ques')";
            $insert_row = $this->db->insert($query);
            if ($insert_row) {
                foreach ($ans as $key => $quesAns) {
                    if ($quesAns != '') {
                       if ($rightAns == $key) {
                        $rquery = "INSERT INTO tbl_ans(quesNo,rightAns,ans) VALUES('$quesNo','1','$quesAns')";
                       }else{
                        $rquery = "INSERT INTO tbl_ans(quesNo,rightAns,ans) VALUES('$quesNo','0','$quesAns')";
                       }
                       $insert_ans = $this->db->insert($rquery);
                       if ($insert_ans) {
                           continue;
                       }else{
                           die('error..!');
                       }
                    }
                }
            }
            $msg = "<span class='success'>Question Added Successfully...</span>";
            return $msg;
        }
    }
    
?>