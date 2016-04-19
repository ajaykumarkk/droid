<?php
include 'connect.php';
session_start();
?>
<html>
<body>
	<?php
		$patid=$_POST['patid'];
		$diagnosis=$_POST['diagnosis'];
		$med=$_POST['med'];
		$date=$_POST['date'];
		$note=$_POST['note'];
		if(isset($_SESSION['doc_id']))
		{
			$docid=$_SESSION['doc_id'];
		}
		else
		{
			echo 'Not logged in';
			header("Location : login.php");
		}
		$db_selected = mysqli_select_db(mysqli_connect($server, $username, $password,$database),$database) ;
		$sql = "INSERT INTO `dr_droid`.`prescription` (`P_id`, `Usr_id`, `Doc_id`, `Diagnosis`, `Medicines`, `Date`, `Note`) VALUES (NULL, '$patid', '$docid', '$diagnosis', '$med', '$date', '$note');";				
		$result = mysqli_query($conn,$sql);
		
		
		
		
		
		
		
		
		if(!$result)
		{
			//something went wrong, display the error
			//echo 'Something went wrong while registering. Please try again later.';
			//echo mysqli_connect_error();
			echo $conn->error;		//debugging purposes, uncomment when needed
			echo '-->'.$docid;
		}
		else
		{
			$sql="SELECT max(P_id) from prescription";
			$result = mysqli_query($conn,$sql);
			$res=mysqli_fetch_array($result);
			$pid=$res[0];
			
			$sql="SELECT * FROM `doctor` WHERE `Doc_id` = '$docid'";
			$result = mysqli_query($conn,$sql);
			$docp = mysqli_fetch_array($result);
			$docname=$docp['FirstName']."  ".$docp['LastName'];
			$docplace=$docp['Place']."  ".$docp['City'];
			$doccontact=$docp['MobileNo'];
			$docemail=$docp['email'];
			$docspec=$docp['Specialization'];
			
			$sql="SELECT * FROM `user` WHERE `Usr_id` = '$patid'";
			$result = mysqli_query($conn,$sql);
			$patp = mysqli_fetch_array($result);
			$username=$patp['Name'];
			$age=$patp['Age'];
			$sex=$patp['Sex'];
			include('C:\\wamp\\www\\droid\\phpqrcode\\qrlib.php'); 
     

			// how to save PNG codes to server 
			 
			$tempDir = 'C:\\wamp\\www\\droid\\prescrips\\'; 
			 
			$codeContents = "http://192.168.0.109/droid/prescripdownload.php?name=$pid.pdf"; 
			 
			// we need to generate filename somehow,  
			// with md5 or with database ID used to obtains $codeContents... 
			$fileName = $pid.'.png'; 
			 
			$pngAbsoluteFilePath = $tempDir.$fileName; 
			
			 
			// generating 
			if (!file_exists($pngAbsoluteFilePath)) { 
				QRcode::png($codeContents, $pngAbsoluteFilePath); 
				echo 'File generated!'; 
				echo '<hr />'; 
			} else { 
				echo 'File already generated! We can use this cached file to speed up site on common codes!'; 
				echo '<hr />'; 
			} 
			 
			echo 'Server PNG File: '.$pngAbsoluteFilePath; 
			echo '<hr />'; 
			
			require('fpdf.php');

			$pdf = new FPDF();
			$pdf->AddPage();
			$pdf->SetFont('Arial','B',16);
			
			$pdf->Cell(70);
			$pdf->Cell(40,10,'Prescription',1,1,'C');
			$pdf->Cell(160);
			$pdf->Cell(40,10,"$date",'C');

			
			$pdf->SetFont('Arial','',13);
			$pdf->Ln(10);
			$pdf->Cell(70);
			$pdf->Cell(40,10,"$docname",'C');
			$pdf->Ln(7);
			$pdf->Cell(70);
			$pdf->Cell(40,10,"$docplace",'C');
			$pdf->Ln(7);
			$pdf->Cell(70);
			$pdf->Cell(40,10,"$doccontact",'C');
			$pdf->Ln(7);
			$pdf->Cell(70);
			$pdf->Cell(40,10,"$docemail",'C');
			$pdf->Ln(7);
			$pdf->Cell(70);
			$pdf->Cell(40,10,"$docspec",'C');
			$pdf->Ln(5);
			$pdf->Cell(40,10,'---------------------------------------------------------------------------------------------------------------------------','C');
			
			$pdf->Ln(10);
			$pdf->Cell(40,10,"Patient Name:".$username,'C');

			$pdf->Cell(50);
			$pdf->Cell(40,10,'Age: '.$age,'C');
			
			$pdf->Cell(10);
			$pdf->Cell(40,10,'Sex'.$sex,'C');
			
			$pdf->Ln(10);
			$pdf->Cell(40,10,'---------------------------------------------------------------------------------------------------------------------------','C');
			
			$pdf->Ln(15);
			
			$pdf->Cell(40,10,'Diagnosis:'.$diagnosis,'C');

			$pdf->Ln(15);
			$pdf->Cell(40,10,'medicines'.$med,'C');
			
			$pdf->Ln(15);
			$pdf->Cell(40,10,'Note'.$note,'C');
			
			
			$pdf->Image("prescrips\\$pid.png",160,230,30);
			
			
			$filename="C:\\wamp\\www\\droid\\prescrips\\"."$pid";
			$pdf->Output($filename.'.pdf','F');
			

			header("Location :index.php");
		}
	?>
</body>
</html>