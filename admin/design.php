<?php include './inc/header.php';?>
<?php include './inc/sidebar.php';?>

    <title>jQuery ImageSelect && chosen</title>
    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="imageselect/chosen.css">
	<link rel="stylesheet" href="imageselect/ImageSelect.css">

<script src="imageselect/jquery.min.js"></script>
<script src="imageselect/chosen.jquery.js"></script>
<script src="imageselect/ImageSelect.jquery.js"></script>
<link rel="stylesheet" href="css/ex.css" type="text/css">
<link rel="stylesheet" href="css/ex2.css" type="text/css">

<script src="js/dw_tooltip_c.js" type="text/javascript"></script>
<script type="text/javascript">

dw_Tooltip.defaultProps = {
    //supportTouch: true, // set false by default
    wrapFn: dw_Tooltip.wrapTextByImage
}
// See info on image-text functions at http://www.dyn-web.com/code/tooltips/documentation2.php#img_txt
// Problems, errors? See http://www.dyn-web.com/tutorials/obj_lit.php#syntax

dw_Tooltip.content_vars = {
    L1: {
        caption: 'Neck',
        img: 'images/Capture.JPG',
        txt: 'Use measurment taps and take the measurment around your neck',
        w: 500 // width of tooltip
    },
   
        L2: {
        caption: 'Chest',
        img: 'images/chest.JPG',
        txt: '*measure around your chest, making sure taps is high up right below your underarm',
        w: 500
    },

 L3: {
        caption: 'Waist', // optional caption 
        img: 'images/waist.JPG',
        txt: '*measure around widest  part of your body waist, white breathing normaly.',
        w: 500
    },
    L4: {
        caption: 'Hips', // optional caption 
        img: 'images/hips.JPG',
        txt: 'measure at your widest point at your hips taps.',
        w: 500
    },

     L5: {
        caption: 'Length',
        img: 'images/length.JPG',
        txt: '*measure from the end of your soulder to the base of teh thumbds or desired length',
        w: 500
    },
    L6: {
        caption: 'Shoulder', // optional caption 
        img: 'images/shoulder.JPG',
        txt: '*measure from the point where your shoulder meets your arms across to the other point to the soulder, making sure the tape is high crossing the base of neck',
        w: 500
    },
    L7: {
        caption: 'Sleeve', // optional caption 
        img: 'images/sleeve.JPG',
        txt: 'measure at your widest point at your hips taps.',
        w: 500
    },
     L8: {
        caption: ' Shoulder Epauletes', // optional caption 
        img: 'images/epauletes.JPG',
        txt: 'measure at your widest point at your hips taps.',
        w: 500
    },
     L9: {
        caption: 'Front Seams', // optional caption 
        img: 'images/frontseams.JPG',
        txt: 'Front long dart is front seams.',
        w: 500
    },
     L10: {
        caption: 'Back Dart', // optional caption 
        img: 'images/backdart.JPG',
        txt: 'back dart.',
        w: 500
    }

   
}

</script>

<?php 

if ($_SERVER['REQUEST_METHOD']=='POST') {

$sleeve= mysqli_real_escape_string($db->link,$_POST['sleeve']);
$pocket= mysqli_real_escape_string($db->link,$_POST['pocket']);
$front= mysqli_real_escape_string($db->link,$_POST['front']);
$back= mysqli_real_escape_string($db->link,$_POST['back']);
$bottom= mysqli_real_escape_string($db->link,$_POST['bottom']);
$cuffs= mysqli_real_escape_string($db->link,$_POST['cuffs']);
$collar= mysqli_real_escape_string($db->link,$_POST['collar']);
echo($sleeve.",".$pocket.", ".$front." ,".$back.", ".$bottom." ,".$cuffs." ,".$collar);
exit();
//$check_list=$_POST['check_list'];
if ($sleeve=="" || $pocket="" || $front="" || $back="" || $back="" || $bottom || $cuffs="" || $collar="") {

	echo "<span style='color: red'> please comptele  your design </span>";
	
} else {
	//$checklist= implode( ';' , $_POST['check_list'] );

	echo($sleeve.",".$pocket.", ".$front." ,".$back.", ".$bottom." ,".$cuffs." ,".$collar);
	
}

}

 ?>

   <div class="container">
   <form action="" method="post" enctype="multipart/form-data">

    	<select class="my-select" name="pocket">
			<option  selected="selected" style="color: red;font-size: 20px">Select Pocket</option>
			 <option data-img-src="imageselect/nopocket.jpg" value="No Pocket ">No Pocket</option>
			 <option data-img-src="imageselect/classicpocket.jpg" value="Classic pocket">Classic Pocket</option>
			 <option data-img-src="imageselect/diamondstraing.jpg" value="Diamond Straight">Diamond Straight</option>
			 <option data-img-src="imageselect/classicsquarp.jpg" value="Classic Squar">classic Squar</option>
			 <option data-img-src="imageselect/roundflap.jpg" value="Round Flap">Round Flap</option>
			 <option data-img-src="imageselect/angleflap.jpg" value="Angle Flap">Angle Flap</option>
			 <option data-img-src="imageselect/diamondflap.jpg" value="Diamond Flap">Diamond Flap</option>
			 <option data-img-src="imageselect/roundwithglass.jpg" value="Round With Glass">Round With Glass</option>
		</select>
	
		<select class="my-select" name="sleeve">
			<option  selected="selected" style="color: red;font-size: 20px">Select Sleeve</option>
			 <option data-img-src="imageselect/longsleeve.png" value="Long Sleeve"> Long Sleeve</option>
			 <option data-img-src="imageselect/rollupsleeve.png" value="Long Sleeve Roll Up">Long Sleeve Roll Up</option>
			 <option data-img-src="imageselect/shortsleeve.png" value="Short Sleeve">Short Sleeve</option>
		</select>

		<select class="my-select" name="front">
			<option  selected="selected" style="color: red;font-size: 20px">Front</option>
			 <option data-img-src="imageselect/FrenchPlacket.jpg" value="French Placket">French Placket</option>
			 <option data-img-src="imageselect/boxplacket.jpg" value="box Placket">Box Placket</option>
			 <option data-img-src="imageselect/ConcealedPlacket.png" value="Hidden Placket">Hidden Placket</option>
		</select>
		<select class="my-select" name="back">
			<option  selected="selected" style="color: red;font-size: 20px">Back Pleats</option>
			<option data-img-src="imageselect/plain.jpg" value="Plain Pleats">Plain Pleats</option>
			 <option data-img-src="imageselect/boxpleats.jpg" value="Box pleats">Box Pleats</option>
			 <option data-img-src="imageselect/SidePleats.jpg" value="Side Pleats">Side Pleats</option>
			 
		</select>
		<select class="my-select" name="bottom">
			<option  selected="selected" style="color: red;font-size: 20px">Bottom</option>
			 <option data-img-src="imageselect/tri-tab.png" value="Tri-Tab Bottom">Tri_Tab Bottom</option>
			<!-- <option data-img-src="imageselect/" value="Straight Bottom">Straight Bottom</option> -->
			 <option data-img-src="imageselect/straingveants.jpg" value="Straight Vents Bottoms">Straite Vents</option>
		</select>
		<select class="my-select" name="collar">
			<option  selected="selected" style="color: red;font-size: 20px">Collar</option>
			 <option data-img-src="imageselect/italianc.JPG" value="Italian Collar">Italian collar </option>
			 
			 <option data-img-src="imageselect/prenchc.JPG" value="French Collar">French collar </option>
			 <option data-img-src="imageselect/batman.JPG" value="Batman Collar">Batman Collar</option>
			 <option data-img-src="imageselect/cutaway.jpg" value="Cut Away">Cut Away</option>
			 <option data-img-src="imageselect/roundc.JPG" value="Round Collar">Round Collar</option>
		</select>
		<select class="my-select" name="cuffs">
			<option  selected="selected" style="color: red;font-size: 20px">Select Cuffs</option>
			 <option data-img-src="imageselect/roundb.jpg" value="Round Cuffs">Round Cuffs</option>
			 <option data-img-src="imageselect/Straight.JPG" value="Squar Cuffs">Squar Cuffs</option>
			 <option data-img-src="imageselect/angle.jpg" value="Angle Cuffs">Angle Cuffs</option>
			 <option data-img-src="imageselect/frenchangle.JPG" value="French Ancgle Cuffs">French Angle Cuffs</option>
			 
			</select>

			<div class="grid_10">
                 <div class="block" style="color: white;">
                 <input type="checkbox" name="check_list[]" value="none" class="showTip L2" >none of them             
                    <input type="checkbox" name="check_list[]" value="shoulder Epaucattes, " class="showTip L8">shoulder Epaucattes
					<input type="checkbox" name="check_list[]" value="Front Seams, " class="showTip L9">Front Seams
					<input type="checkbox" name="check_list[]" value="Back dart, " class="showTip L10">Back dart
					<input type="checkbox" name="check_list[]" value="2 Front Pockets">2 Front Pockets
					<input type="checkbox" name="check_list[]" value="2 Cuffs buttam">2 Cuffs buttam
					
            	<br>
            	<hr>


		<script>
		$(".my-select").chosen({
		 width:"25%",
		 //html_template: '<img style="border:3px solid black;padding:0px;margin-right:4px" class="{class_name}" src="{url}">'
		 });
		</script>

<!--------- -->

	
                <?php 
                    if ($_SERVER['REQUEST_METHOD']=='POST') {
                    
                    $product_id= mysqli_real_escape_string($db->link,$_POST['product_id']);
                    $product_typeid= mysqli_real_escape_string($db->link,$_POST['product_typeid']); //catagory id
                    $title= mysqli_real_escape_string($db->link,$_POST['title']);
                    $price= mysqli_real_escape_string($db->link,$_POST['price']);
                    $body= mysqli_real_escape_string($db->link,$_POST['body']);

                    $permited  = array('jpg', 'jpeg', 'png', 'gif');
                        $file_name = $_FILES['image']['name'];
                        $file_size = $_FILES['image']['size'];
                        $file_temp = $_FILES['image']['tmp_name'];

                        $div = explode('.', $file_name);
                        $file_ext = strtolower(end($div));
                        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                    $uploaded_image = "upload/".$unique_image;

                    //body, image
                    $author= mysqli_real_escape_string($db->link,$_POST['author']);
                    $tags= mysqli_real_escape_string($db->link,$_POST['tags']);
                    //date
                    
                    $Season= mysqli_real_escape_string($db->link,$_POST['Season']);
                    $weight= mysqli_real_escape_string($db->link,$_POST['weight']);
    
                    
                    

                        

                    if ($product_id=="" || $product_typeid=="" || $title=="" || $price=="" || $body=="" || $file_name=="" || $author=="" || $tags=="" || $Season=="" || $weight =="")
                         {
                        echo "<span class='error'>Field Must Not Be Empty !!</span>";

                    }elseif ($file_size >1048567) {
                        echo "<span class='error'>Image Size should be less then 1MB!</span>";

                    } elseif (in_array($file_ext, $permited) === false) {
                            echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";

                    } else{
                                move_uploaded_file($file_temp, $uploaded_image);

                                $query = "INSERT INTO PRODUCT ( product_id, product_typeid, title, price, body, image, author, tags, Season, weight)
                                 Values ('$product_id', '$product_typeid', '$title', '$price', '$body', '$uploaded_image', '$author', '$tags','$Season', '$weight')";

                                $inserted_rows = $db->insert($query);

                                    if ($inserted_rows) {
                                        echo "<span class='success'> Product Data Inserted Successfully.</span>";
                                    }else {
                                    echo "<span class='error'> Product Data Not Inserted !</span>";
                    }

                    // product_id, title, price, body, image, author, tags, date, product_id, product_type, Season, weight
                
                    


                 }
             }

                 ?>

            <div class="block">

                <style>
                        input {
                            background-color:#edebea;
                        }
                        span.text{
                          color: #red; font-size:10px; font-style: italic;  
                        }
                       label{
                        	color: white;
                        }
                </style>
                <h1 style="text-align: center; color: yellow">Add Measurment</h1>

                    <table class="form">

                        <tr>
                            <td>
                                <label>Neck</label>
                            </td>
                            <td>
                                <input type="text" name="neck" placeholder="9-23 inch" class="small" />
                                <span class="text"> <span class="showTip L1" style="color:red">*show hints</span>
                            </td> 
                        </tr>

                        </tr>

                        <tr>
                            <td>
                                <label>Chest</label>
                            </td>
                            <td>
                                <input type="text" name="chest" placeholder="24-75 inch" class="small" /> <span class="text"><span class="showTip L2" style="color:red">*show hints</span></span>
                                 
                            </td>
                        </tr>

                         <tr>
                            <td>
                                <label>Waist</label>
                            </td>
                            <td>
                                <input type="text" name="Waist" placeholder="24-75 inch" class="small" /> <span class="text"><span class="showTip L3" style="color:red">*show hints</span></span>
                            </td>
                        </tr>

                        
                         <tr>
                            <td>
                                <label>Hip</label>
                            </td>
                            <td>
                                <input type="text" name="hip" placeholder="24-75 inch" class="small" /><span class="text"><span class="showTip L4" style="color:red">*show hints</span></span> 
                            </td>
                        </tr>

                     
                          <tr>
                            <td>
                                <label>Length</label>
                            </td>
                            <td>
                                <input type="text" name="Season" placeholder="19 to 42 Inch" class="small" /><span class="text"><span class="showTip L5" style="color:red">*show hints</span></span>
                            </td>
                        </tr>
                            
                        <tr>
                            <td>
                                <label>Soulder</label>
                            </td>
                            <td>
                                <input type="text" name="weight" placeholder="14-27 Inch" class="small" />
                                 <span class="text"><span class="showTip L6" style="color:red">*show hints</span></span>
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <label>Sleeve</label>
                            </td>
                            <td>
                                <input type="text" name="author" placeholder="18-30 Inch" class="small" /><span class="text"><span class="showTip L7" style="color:red">*show hints</span></span>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Select Your Fit</label>
                            </td>
                            <td>
                                <input type="radio" name="fit" value="body fit" style= /> Body Fit
                                <input type="radio" name="fit" value="Signature" />Signature Fit
                                <input type="radio" name="fit" value="body fit" /> Large Fit
                            </td>
                        </tr>

						<tr>
                            
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>

 <!-- Load TinyMCE -->
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
	
<?php include 'inc/footer.php';?>
