<?php
function grade($marks)
{
        if( $marks > 91)
        {
           return "A+";
        }
        if( $marks < 90 and $marks>=81 )
        {
            return "A";
        }
        if( $marks < 80 and $marks>=71)
        {
            return "B+";
        }
        if( $marks <=70 and $marks>=61)
        {
            return "B";
        }
        if( $marks <=60 and $marks>=57)
        {
            return "C+";
        }
        if( $marks <=56 and $marks>=50)
        {
            return "C";
        }
        if( $marks <= 50 and $marks >33)
        {
            return "D";
        }
        if( $marks < 30)
        {
            return "fail";
        }
}

if(isset($_POST['submit']))
{

    $sname=$_POST['sname'];
    $fname=$_POST['fname'];
    $rollno=$_POST['rollno'];
    $h=$_POST['h'];
    $e=$_POST['e'];
    $m=$_POST['m'];
    $s=$_POST['s'];
    $ss=$_POST['ss'];

    $total=$h+$e+$m+$s+$ss;
    
    if(isset($_FILES['file']))
    {
        $tempFile = $_FILES['file']['tmp_name'];
        $destination = 'image/' . $_FILES['file']['name'];

        if (move_uploaded_file($tempFile, $destination)) 
        {

        } 
    
        else 
        {
            echo "Failed to upload the image.";
        }



        $avg=($total/5);
            if($avg>=33);
            {
                $result="pass";
            }
            if($avg<33)
            {
                
                $result="Fail";

            }

        $per=($total/500) * 100 ;

            if($per > 55)
            {
                $division="Fist Division";
            }
            if($per < 55 && $per > 40 )
            {
                $division="Second Division";
            }
            if($per < 40 && $per > 33 )
            {
                $division="Third Division";
            }

        $sgpa = $per/9.5;
        $sgpa=round($sgpa , 1);



        echo 
        "<table border='1'>

        <tr>
        <td>Name </td>
        <td colspan='2'>".$sname."</td>
        <td rowspan='3'><img width='100px' height='100px' src='$destination' alt='Uploaded Image'></td>
        </tr>

        <tr>
        <td>Father Name </td>
        <td colspan='2'>".$fname."</td>
        </tr>

        <tr>
        <td>Enrollment No. </td>
        <td colspan='2'>".$rollno."</td>
        </tr>


        <tr>
        <th>Subject</th>
        <th>Marks Obtained</th>
        <th colspan='2'>Grade</th>
        </tr>

        <tr>
            <td>ANDROID</td>
            <td>".$h."</td>
            <td colspan='2'>".grade($h)."</td>
        </tr>
        <tr>
            <td>DOT Net</td>
            <td>".$e."</td>
            <td colspan='2'>".grade($e)."</td>
        </tr>
        <tr>
            <td>MATHS</td>
            <td>".$m."</td>
            <td colspan='2'>".grade($m)."</td>
        </tr>
        <tr>
            <td>PHP</td>
            <td>".$s."</td>
            <td colspan='2'>".grade($s)."</td>
        </tr>
        <tr>
            <td>PHOTOSHOP</td>
            <td>".$ss."</td>
            <td colspan='2'>".grade($ss)."</td>
        </tr>

        <tr>
        <th>Grand Total</th>
        <td colspan='3'>".$total."/500</td>
        </tr>

        <tr>
        <th>Result</th>
        <td colspan='3'>".$result."</td>
        </tr>

        <tr>
        <th>SGPA</th>
        <td colspan='3'>".$sgpa."</td>
        </tr>

        <tr>
        <th>Percentage</th>
        <td colspan='3'>".$per."%</td>
        </tr>

        <tr>
        <th>Division</th>
        <td colspan='3'>".$division."</td>
        </tr>

        </table>";

    }
}
?>
