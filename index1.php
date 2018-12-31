<?php
session_start();
$con=mysqli_connect('localhost','root','','shak');
$today=date("Y-m-d");
if($con)
{
    $nam=$_POST['MailID'];
    $pass=$_POST['Title'];
    $Initial=$_POST['Initial'];
    $CandName=$_POST['CandName'];
    $FatherName=$_POST['FatherName']; 
    $Gender=$_POST['Gender'];
    $Mstatus=$_POST['Mstatus'];
    $Aadhar=$_POST['aadharno'];
    $sample=$_POST['sameadd'];
    $CAddrLine3=$_POST['CAddrLine3'];
    $CAddrLine1=$_POST['CAddrLine1'];
    $CAddrLine2=$_POST['CAddrLine2'];
    $Cpincode=$_POST['Cpincode'];
    $cat=$_POST['cat'];
    $subcat=$_POST['subcat'];
    if($sample=="Y")
    {
     $PAddrLine1=$CAddrLine1;
     $PAddrLine2=$CAddrLine2;
     $PAddrLine3=$CAddrLine3;
    $PState=$cat;
    $PDistrict=$subcat;
    $Ppincode=$Cpincode;

    }
    else
    {
    $PAddrLine1=$_POST['PAddrLine1'];
    $PAddrLine2=$_POST['PAddrLine2'];
    $PAddrLine3=$_POST['PAddrLine3'];
    $PState=$_POST['PState'];
    $PDistrict=$_POST['PDistrict'];
    $Ppincode=$_POST['PPincode'];
    }
    $MobileNo=$_POST['MobileNo'];
    $MobileNo2=$_POST['MobileNo2'];
    $physic=$_POST['physic'];
    $Interest=$_POST['Interest'];
    $salary=$_POST['salary'];
    
    $join=$_POST['joining_date'];   
   
    
    echo "successful connection...";
    
    
  /*  $check = getimagesize($_FILES["upImage"]["tmp_name"]);
    $check1 = getimagesize($_FILES["upSign"]["tmp_name"]);
    $check2 = getimagesize($_FILES["upCertificate"]["tmp_name"]);*/
    
    
    //photo naming starts
    $photo=$_FILES['upImage'];
    $photo_name=$photo['name'];
   
    //renaming the file
    $temp=explode(".",$_FILES['upImage']['name']);
     $newfilename=date('dmYHis').str_replace(" "," ",basename($_FILES['upImage']['name']));
     $ph_path='imageperson/photo/'.$newfilename;
    $photo_path=$photo['tmp_name'];
 
   //photo naming ends
        
$file = $_FILES['upCertificates'];
$file_name = $file['name'];
$file_type = $file ['type'];
$file_size = $file ['size'];
$file_path = $file ['tmp_name'];

//Restriction to the image. You can upload any types of file for example video file, mp3 file, .doc or .pdf just mention here in OR condition. 
 $path='imageperson/certificates/'.$file_name;
        
  /****signature****/      
        
     $sign=$_FILES['upSign'];
    $sign_name=$sign['name'];
    
    
    //renaming the file
    $temp=explode(".",$_FILES['upSign']['name']);
     $newsignname=date('dmYHis').str_replace(" "," ",basename($_FILES['upSign']['name']));
     $si_path='imageperson/signature/'.$newsignname;
    $sign_path=$sign['tmp_name'];
    
    /****Signature end****/       
        
    
    /****adhar****/
     $adhar=$_FILES['upCertificate'];
     $adhar_name=$adhar['name'];
    
    //renaming the file
    $temp=explode(".",$_FILES['upCertificate']['name']);
     $newAdharname=date('dmYHis').str_replace(" "," ",basename($_FILES['upCertificate']['name']));
     $ad_path='imageperson/adhar/'.$newAdharname;
    $adhar_path=$adhar['tmp_name'];
    
    
    
    
    
    /*****adhar ends****/
        
//**** relations....
        $a="";
        $b="";
        $c="";
        $itemCount = count($_POST["item_name"]);
		$itemValues=0;
		$queryValue = "";
		for($i=0;$i<$itemCount;$i++) {
			if(!empty($_POST["item_name"][$i]) || !empty($_POST["item_price"][$i])) {
				$itemValues++;
				if($queryValue!="") {
					$queryValue .= ",";
				}
                $a=$_POST["item_name"][$i].",".$a;
                $b=$_POST["item_price"][$i].",".$b;
                $c=$_POST["item_size"][$i].",".$c;
				
			}
		}
        echo $a." ".$b;
       
		
        
        
        
        
        //////****////appraties....
        //last before...
        //****
        $a1="";
        $b1="";
        $c1="";
        $d1="";
        $itemCount1 = count($_POST["t1"]);
		$itemValues=0;
		
		$queryValue = "";
		for($i=0;$i<$itemCount1;$i++) {
			if(!empty($_POST["t1"][$i]) || !empty($_POST["k1"][$i])) {
				$itemValues++;
				if($queryValue!="") {
					$queryValue .= ",";
				}
                $a1=$_POST["t1"][$i].",".$a1;
                $b1=$_POST["k1"][$i].",".$b1;
                $c1=$_POST["from1"][$i].",".$c1;
                $d1=$_POST["to1"][$i].",".$d1;

				}
		}
        echo $a1." ".$b1;
        
        
        
        
        //////****////
        
        $a2="";
        $b2="";
        $c2="";
        $d2="";
        $e2="";
        $itemCount2 = count($_POST["deg"]);
		$itemValues=0;
		
		$queryValue = "";
		for($i=0;$i<$itemCount2;$i++) {
			if(!empty($_POST["ma"][$i]) || !empty($_POST["un"][$i])) {
				$itemValues++;
				if($queryValue!="") {
					$queryValue .= ",";
				}
                $a2=$_POST["deg"][$i].",".$a2;
                $b2=$_POST["un"][$i].",".$b2;
                $c2=$_POST["ma"][$i].",".$c2;
                $d2=$_POST["from2"][$i].",".$d2;
                $e2=$_POST["to2"][$i].",".$e2;

				}
		}
        echo $a2." ".$b2;
        
        
        
        
        
        
                $_SESSION['name']=$CandName;
                $_SESSION['father']=$FatherName;
        
        //////****////




        
      
        /*$query12=mysqli_query($con,"insert into reg (Email,title,apply_date,initial,CandName,Fathername,Gender,Mstatus,Aadhar,cadd1,cadd2,cadd3,padd1,padd2,padd3,cstate,pstate,cdist,pdist,cpin,ppin,mobile1,mobile2,physic,Interest,salary,joined,upimage,signImage,upCertificate,upCertificates,hid1,hid2,hid3,t1,k1,from1,to1,de,un,ma,from2,to2) values('$nam','$pass','$today','$Initial','$CandName','$FatherName','$Gender','$Mstatus','$Aadhar','$CAddrLine1','$CAddrLine2','$CAddrLine3', '$PAddrLine1','$PAddrLine2','$PAddrLine3','$cat','$PState','$subcat','$PDistrict','$Cpincode','$Ppincode','$MobileNo','$MobileNo2','$physic','$Interest','$salary','$join','$imgContent','$imgContent1','$imgContent2','$path','$a','$b','$c','$a1','$b1','$c1','$d1','$a2','$b2','$c2','$d2','$e2');");*/
    
   
         if(move_uploaded_file ($adhar_path,'imageperson/adhar/'.$newAdharname))
        if(move_uploaded_file ($sign_path,'imageperson/signature/'.$newsignname))
          if(move_uploaded_file ($file_path,'imageperson/certificates/'.$file_name))
             if(move_uploaded_file ($photo_path,'imageperson/photo/'.$newfilename))
             {
      $query12=mysqli_query($con,"insert into reg (Email,title,initial,CandName,Fathername,Gender,signature,adhar,Mstatus,Aadhar,cadd1,cadd2,cadd3,padd1,padd2,padd3,cstate,pstate,cdist,pdist,cpin,ppin,mobile1,mobile2,physic,Interest,salary,joined,photo,upCertificates,hid1,hid2,hid3,t1,k1,from1,to1,de,un,ma,from2,to2,apply_date) values('$nam','$pass','$Initial','$CandName','$FatherName','$Gender','$si_path','$ad_path','$Mstatus','$Aadhar','$CAddrLine1','$CAddrLine2','$CAddrLine3', '$PAddrLine1','$PAddrLine2','$PAddrLine3','$cat','$PState','$subcat','$PDistrict','$Cpincode','$Ppincode','$MobileNo','$MobileNo2','$physic','$Interest','$salary','$join','$ph_path','$path','$a','$b','$c','$a1','$b1','$c1','$d1','$a2','$b2','$c2','$d2','$e2','$today')");
                if($query12)
                {
                   //$_SESSION['aadhar']=$Aadhar;
                   echo '<script>window.location.href="pdf_generator/Employee.php"</script>';
                }
            else
                {
                    echo "Query not executed...";
                } 
    }
    else{
        echo "Please select an image file to upload.";
    }
   


else
{
    echo "connection failure";
}
}
?>