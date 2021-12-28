<?php include 'inc/head.php'; ?>
<?php 
    
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../Classes/Question.php');
    $qs = new Question();
    
?>
<?php 
    if ($_SERVER['REQUEST_METHOD']=='POST') {
        $addQues = $qs->addQuestion($_POST);
    } 
//get total question
    $total = $qs->getTotalRow();
    $next = $total + 1;
?>

     <article class="maincontent clear">
    <?php 
        if (isset($addQues)) {
        echo $addQues;
        }
    ?>
        <form action="" method="post">
            <table class="mytble">
                    <tr>
                        <th>Question Number</th>
                        <th>:</th>
                        <td><input type="number" value="<?php 
                                if (isset($next)) {
                                    echo $next;
                                }
                            ?>" name="quesNo"></td>
                    </tr>
                    <tr>
                        <th>Question</th>
                        <th>:</th>
                        <td><input type="text" name="ques" placeholder="Pleace Enter Your Question..."></td>
                    </tr>
                    <tr>
                        <th>Choose One</th>
                        <th>:</th>
                        <td><input type="text" name="ans1" placeholder="Pleace Enter Your Frist Answer..."></td>
                    </tr>
                    <tr>
                        <th>Choose Two</th>
                        <th>:</th>
                        <td><input type="text" name="ans2" placeholder="Pleace Enter Your Secound Answer..."></td>
                    </tr>
                    <tr>
                        <th>Choose Three</th>
                        <th>:</th>
                        <td><input type="text" name="ans3" placeholder="Pleace Enter Your Third Answer..."></td>
                    </tr>
                    <tr>
                        <th>Choose Four</th>
                        <th>:</th>
                        <td><input type="text" name="ans4" placeholder="Pleace Enter Your Fourth Answer..."></td>
                    </tr>
                    <tr>
                        <th>Correct Number</th>
                        <th>:</th>
                        <td><input type="number" name="rightAns" </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><input type="submit" name="submit" Value="Add Question"></td>
                    </tr>
                    
            </table>
        </form>
     </article>
 <?php include 'inc/foot.php';?>