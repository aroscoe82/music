<?php 
session_start();

include 'header.php'; 

$NAME = $_SESSION["Name"];
$GENRE = $_SESSION["Genre"];
$MEMBERS = $_SESSION["Members"];
$CONTACT = $_SESSION["Contact"];
$MAILADD = $_SESSION["Address"];
$EMAIL = $_SESSION["EMail"];
$YEARFORMED = $_SESSION["FormationYear"];
$LOCATION = $_SESSION["Location"];
$YOUTUBELINK = $_SESSION["YouTubeLink"];
$WEBSITELINK = $_SESSION["websiteLink"];
$BIO = $_SESSION["Bio"];
$IMAGE = $_SESSION["ImageFile"];

?>

<h3>Entry Form</h3>
<form action="EntryReview.php" method="post" name="entryform" id="entryform">
<table border="0" cellspacing="10" cellpadding="5">
  <tr>
    <td>Band/Artist Name</td>
    <td><input name="Name" type="text" id="Name" size="30" maxlength="30" required value="<?php echo $NAME ?>" /></td>
  </tr>
  <tr>
    <td>Genre</td>
    <td>
      <select name="Genre" size="1" id="Genre"  required="required" selected="<?php echo $GENRE ?>">
        <option value=""></option>
        <option value="Alternative" <?php if($GENRE=='Alternative') echo "selected=\"selected\""; ?>>Alternative</option>
        <option value="Blues" <?php if($GENRE=='Blues') echo "selected=\"selected\""; ?>>Blues</option>
        <option value="Classical" <?php if($GENRE=='Classical') echo "selected=\"selected\""; ?>>Classical</option>
        <option value="Country" <?php if($GENRE=='Country') echo "selected=\"selected\""; ?>>Country</option>
        <option value="Dance Music" <?php if($GENRE=='Dance Music') echo "selected=\"selected\""; ?>>Dance Music</option>
        <option value="Electronic" <?php if($GENRE=='Electronic') echo "selected=\"selected\""; ?>>Electronic</option>
        <option value="Folk" <?php if($GENRE=='Folk') echo "selected=\"selected\""; ?>>Folk</option>
        <option value="Gospal" <?php if($GENRE=='Gospal') echo "selected=\"selected\""; ?>>Gospal</option>
        <option value="Hip-Hop/Rap" <?php if($GENRE=='Hip-Hop/Rap') echo "selected=\"selected\""; ?>>Hip-Hop/Rap</option>
        <option value="Opera" <?php if($GENRE=='Opera') echo "selected=\"selected\""; ?>>Opera</option>
        <option value="Pop" <?php if($GENRE=='Pop') echo "selected=\"selected\""; ?>>Pop</option>
        <option value="R&amp;B Soul" <?php if($GENRE=='R&B') echo "selected=\"selected\""; ?>>R&amp;B Soul</option>
        <option value="Reggae" <?php if($GENRE=='Reggae') echo "selected=\"selected\""; ?>>Reggae</option>
        <option value="Rock" <?php if($GENRE=='Rock') echo "selected=\"selected\""; ?>>Rock</option>
        <option value="Singer/Songwritter" <?php if($GENRE=='Singer/Songwritter') echo "selected=\"selected\""; ?>>Singer/Songwritter</option>
        <option value="World Music" <?php if($GENRE=='World Music') echo "selected=\"selected\""; ?>>World Music</option>
        <option value="Other" <?php if($GENRE=='Other') echo "selected=\"selected\""; ?>>Other</option>
      </select></td>
  </tr>
  <tr>
    <td>Members</td>
    <td>
      <textarea name="Members" id="Members"><?php echo $MEMBERS ?></textarea></td>
  </tr>
  <tr>
    <td>Contact Person</td>
    <td>
      <input name="Contact" type="text" id="Contact" size="30" maxlength="30" required value="<?php echo $CONTACT ?>"></td>
  </tr>
  <tr>
    <td>Mailing Address</td>
    <td>
      <textarea name="Address" id="Address" required><?php echo $MAILADD ?></textarea>
    </td>
  </tr>
  <tr>
    <td>Email Address</td>
    <td><input type="email" name="EMail" id="EMail" required value="<?php echo $EMAIL ?>"></td>
  </tr>
  <tr>
    <td>Year Formed</td>
    <td>
      <select name="FormationYear" size="1" id="FormationYear">
      	<option value=""></option>
        <option value="1980" <?php if($YEARFORMED == '1980') echo "selected=\"selected\""; ?>>1980</option>
        <option value="1981" <?php if($YEARFORMED == '1981') echo "selected=\"selected\""; ?>>1981</option>
        <option value="1982" <?php if($YEARFORMED == '1982') echo "selected=\"selected\""; ?>>1982</option>
        <option value="1983" <?php if($YEARFORMED == '1983') echo "selected=\"selected\""; ?>>1983</option>
        <option value="1984" <?php if($YEARFORMED == '1984') echo "selected=\"selected\""; ?>>1984</option>
        <option value="1985" <?php if($YEARFORMED == '1985') echo "selected=\"selected\""; ?>>1985</option>
        <option value="1986" <?php if($YEARFORMED == '1986') echo "selected=\"selected\""; ?>>1986</option>
        <option value="1987" <?php if($YEARFORMED == '1987') echo "selected=\"selected\""; ?>>1987</option>
        <option value="1988" <?php if($YEARFORMED == '1988') echo "selected=\"selected\""; ?>>1988</option>
        <option value="1989" <?php if($YEARFORMED == '1989') echo "selected=\"selected\""; ?>>1989</option>
        <option value="1990" <?php if($YEARFORMED == '1990') echo "selected=\"selected\""; ?>>1990</option>
        <option value="1991" <?php if($YEARFORMED == '1991') echo "selected=\"selected\""; ?>>1991</option>
        <option value="1992" <?php if($YEARFORMED == '1992') echo "selected=\"selected\""; ?>>1992</option>
        <option value="1993" <?php if($YEARFORMED == '1993') echo "selected=\"selected\""; ?>>1993</option>
        <option value="1994" <?php if($YEARFORMED == '1994') echo "selected=\"selected\""; ?>>1994</option>
        <option value="1995" <?php if($YEARFORMED == '1995') echo "selected=\"selected\""; ?>>1995</option>
        <option value="1996" <?php if($YEARFORMED == '1996') echo "selected=\"selected\""; ?>>1996</option>
        <option value="1997" <?php if($YEARFORMED == '1997') echo "selected=\"selected\""; ?>>1997</option>
        <option value="1998" <?php if($YEARFORMED == '1998') echo "selected=\"selected\""; ?>>1998</option>
        <option value="1999" <?php if($YEARFORMED == '1999') echo "selected=\"selected\""; ?>>1999</option>
        <option value="2000" <?php if($YEARFORMED == '2000') echo "selected=\"selected\""; ?>>2000</option>
        <option value="2001" <?php if($YEARFORMED == '2001') echo "selected=\"selected\""; ?>>2001</option>
        <option value="2002" <?php if($YEARFORMED == '2002') echo "selected=\"selected\""; ?>>2002</option>
        <option value="2003" <?php if($YEARFORMED == '2003') echo "selected=\"selected\""; ?>>2003</option>
        <option value="2004" <?php if($YEARFORMED == '2004') echo "selected=\"selected\""; ?>>2004</option>
        <option value="2005" <?php if($YEARFORMED == '2005') echo "selected=\"selected\""; ?>>2005</option>
        <option value="2006" <?php if($YEARFORMED == '2006') echo "selected=\"selected\""; ?>>2006</option>
        <option value="2007" <?php if($YEARFORMED == '2007') echo "selected=\"selected\""; ?>>2007</option>
        <option value="2008" <?php if($YEARFORMED == '2008') echo "selected=\"selected\""; ?>>2008</option>
        <option value="2009" <?php if($YEARFORMED == '2009') echo "selected=\"selected\""; ?>>2009</option>
        <option value="2010" <?php if($YEARFORMED == '2010') echo "selected=\"selected\""; ?>>2010</option>
        <option value="2011" <?php if($YEARFORMED == '2011') echo "selected=\"selected\""; ?>>2011</option>
        <option value="2012" <?php if($YEARFORMED == '2012') echo "selected=\"selected\""; ?>>2012</option>
        <option value="2013" <?php if($YEARFORMED == '2013') echo "selected=\"selected\""; ?>>2013</option>
      </select></td>
  </tr>
  <tr>
    <td>General Location</td>
    <td>
      <select name="Location" id="Location">
      	<option value=""></option>
        <option value="Philly" <?php if($LOCATION == 'Philly') echo "selected=\"selected\""; ?>>Philly</option>
        <option value="Option 2" <?php if($LOCATION == 'Option 2') echo "selected=\"selected\""; ?>>Option 2</option>
        <option value="Option 3" <?php if($LOCATION == 'Option 3') echo "selected=\"selected\""; ?>>Option 3</option>
      </select></td>
  </tr>
  <tr>
    <td>YouTube Video Link</td>
    <td>
      <input type="text" name="YouTubeLink" id="YouTubeLink" required value="<?php echo $YOUTUBELINK ?>"></td>
  </tr>
  <tr>
    <td>Website</td>
    <td>
      <input name="websiteLink" type="text" id="websiteLink" size="30" maxlength="30" value="<?php echo $WEBSITELINK ?>"></td>
  </tr>
    <tr>
    <td>Image upload</td>
    <td>
      <input type="file" name="ImageFile" id="ImageFile" value="<?php echo $IMAGE ?>"/></td>
  </tr>
  <tr>
    <td>Bio</td>
    <td>
      <textarea name="Bio" cols="75" rows="7" id="Bio"><?php echo $BIO ?></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
    <input type="submit" name="Submit" value="Submit" /></td>
  </tr>
</table>
</form>

<?php include 'footer.php'; ?>