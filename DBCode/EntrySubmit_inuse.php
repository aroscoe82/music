[insert_php]

$con=mysqli_connect("localhost","phlmusic_aiphUsr","aiphT3amC0d3","phlmusic_registrationInfo");

$_SESSION['Genre'] =mysql_real_escape_string($_POST['Genre']);
$_SESSION['EntryName'] =mysql_real_escape_string($_POST['EntryName']);
$_SESSION['Members'] =mysql_real_escape_string($_POST['Members']);
$_SESSION['Trained'] =$_POST['Trained'];
$_SESSION['YearFormed'] =mysql_real_escape_string($_POST['YearFormed']);
$_SESSION['ContactName'] =mysql_real_escape_string($_POST['ContactName']);
$_SESSION['Email'] =mysql_real_escape_string($_POST['Email']);
$_SESSION['Address1'] =mysql_real_escape_string($_POST['Address1']);
$_SESSION['Address2'] =mysql_real_escape_string($_POST['Address2']);
$_SESSION['City'] =mysql_real_escape_string($_POST['City']);
$_SESSION['State'] =mysql_real_escape_string($_POST['State']);
$_SESSION['ZipCode'] =mysql_real_escape_string($_POST['ZipCode']);
$_SESSION['Location'] =mysql_real_escape_string($_POST['Location']);
$_SESSION['Phone'] =mysql_real_escape_string($_POST['Phone']);
$_SESSION['YouTubeLink'] =mysql_real_escape_string($_POST['YouTubeLink']);
$_SESSION['WebSite'] =mysql_real_escape_string($_POST['WebSite']);
$_SESSION['ImgSrc'] =$_FILES['file']['name'];
$_SESSION['ImgTmp'] =$_FILES['file']['tmp_name'];
$_SESSION['Bio'] =mysql_real_escape_string($_POST['Bio']);

$fileUploaded = 0;
$validFileUpload = 0;

if (mysqli_connect_errno()){
     echo "Failed to connect to Database: ";
}else{

//echo "Connected to DB";

     if((isset($_FILES["file"])) AND !empty($_FILES['file']['name'])){  // check to see if they uploaded an image
          $fileUploaded = 1; // if file exists, set file upload to true

          $allowedExts = array("jpg", "gif", "png");
	$extension = end(explode(".", $_FILES["file"]["name"]));
          $directory = "wp-content/uploads/Participants/";
            
          if (($_FILES["file"]["size"] < 200000) && in_array($extension, $allowedExts)){
               $validFileUpload = 1; // file is valid, set to true
               //echo "File to be uploaded is " . $_SESSION['ImgSrc'];
          }else{
               exit ("Error in file, please review file size and acceptable file types.");
          }
      }

     $sql = "INSERT INTO Entries (Genre, Name, Members, MusicallyTrained, YearFormed, ContactPerson, Email, Location, YouTubeLink, WebSiteLink, Bio) VALUES (\"" . $_SESSION['Genre'] . "\",\"" . $_SESSION['EntryName']  . "\",\"" . $_SESSION['Members'] . "\",\"" . $_SESSION['Trained'] . "\",\"" . $_SESSION['YearFormed']  . "\",\"" . $_SESSION['ContactName']  . "\",\"" . $_SESSION['Email']  . "\",\"" . $_SESSION['Location']  . "\",\"" . $_SESSION['YouTubeLink']  . "\",\"" . $_SESSION['WebSite']  . "\",\"" . $_SESSION['Bio']  . "\")";

     if (mysqli_query($con,$sql)){

          $sql = "Select UserID From Entries Where (Name=\"" . $_SESSION['EntryName'] . "\" AND Genre=\"" . $_SESSION['Genre'] . "\")";  

          $result= mysqli_query($con, $sql);

          while($row = mysqli_fetch_array($result))
          {
            $EntryID = $row['UserID'];
          }
         
          if($fileUploaded == 1){
               $fileName = $EntryID . "-" . $_SESSION['EntryName'];

               if (file_exists($directory . $fileName)){
               // file already exists for this entry, drop entry from table and notify
                    $sql = "DELETE * FROM Entries WHERE UserID=\"" . $EntryID . "\"";
                    if(mysqli_query($con,$sql)){
                         echo "Error, entry with ID " . $EntryID . " already exists, entry was removed from list.";
                    }
               }else{

                    $sql = "UPDATE Entries SET ImgSrc=\"" . $fileName . "." . $extension . "\" WHERE UserID=\"" . $EntryID . "\"";

                    if(mysqli_query($con,$sql)){
                         move_uploaded_file($_FILES["file"]["tmp_name"], $directory . $fileName . "." . $extension);
                    }else{
                         $sql = "DELETE * FROM Entries WHERE UserID=\"" . $EntryID . "\"";
                         mysqli_query($con,$sql);
                    }
               }
          }
 
          echo "Thank you for Entering, your entry was submitted and is pending review.\nYour Entry ID is " . $EntryID;
     }else{
       exit("Failed to submit entry, please try again later.");
     }
}
[/insert_php]