<?php include 'inc/header.php';?>




<?php 

$db= new Database();

?>


<link rel="stylesheet" href="admin/css/ex.css" type="text/css">
<link rel="stylesheet" href="admin/css/ex2.css" type="text/css">

<script src="admin/js/dw_tooltip_c.js" type="text/javascript"></script>
<title>jQuery ImageSelect && chosen</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="admin/imageselect/chosen.css">
    <link rel="stylesheet" href="admin/imageselect/ImageSelect.css">

<script src="admin/imageselect/jquery.min.js"></script>
<script src="admin/imageselect/chosen.jquery.js"></script>
<script src="admin/imageselect/ImageSelect.jquery.js"></script>
<link rel="stylesheet" href="admin/css/ex.css" type="text/css">
<link rel="stylesheet" href="admin/css/ex2.css" type="text/css">

<script src="admin/js/dw_tooltip_c.js" type="text/javascript"></script>
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
        img: 'admin/images/Capture.JPG',
        txt: 'Use measurment taps and take the measurment around your neck',
        w: 500 // width of tooltip
    },
   
        L2: {
        caption: 'Chest',
        img: 'admin/images/chest.JPG',
        txt: '*measure around your chest, making sure taps is high up right below your underarm',
        w: 500
    },

 L3: {
        caption: 'Waist', // optional caption 
        img: 'admin/images/waist.JPG',
        txt: '*measure around widest  part of your body waist, white breathing normaly.',
        w: 500
    },
    L4: {
        caption: 'Hips', // optional caption 
        img: 'admin/images/hips.JPG',
        txt: 'measure at your widest point at your hips taps.',
        w: 500
    },

     L5: {
        caption: 'Length',
        img: 'admin/images/length.JPG',
        txt: '*measure from the end of your soulder to the base of teh thumbds or desired length',
        w: 500
    },
    L6: {
        caption: 'Shoulder', // optional caption 
        img: 'admin/images/shoulder.JPG',
        txt: '*measure from the point where your shoulder meets your arms across to the other point to the soulder, making sure the tape is high crossing the base of neck',
        w: 500
    },
    L7: {
        caption: 'Sleeve', // optional caption 
        img: 'admin/images/sleeve.JPG',
        txt: 'measure at your widest point at your hips taps.',
        w: 500
    },
     L8: {
        caption: ' Shoulder Epauletes', // optional caption 
        img: 'admin/images/epauletes.JPG',
        txt: 'measure at your widest point at your hips taps.',
        w: 500
    },
     L9: {
        caption: 'Front Seams', // optional caption 
        img: 'admin/images/frontseams.JPG',
        txt: 'Front long dart is front seams.',
        w: 500
    },
     L10: {
        caption: 'Back Dart', // optional caption 
        img: 'admin/images/backdart.JPG',
        txt: 'back dart.',
        w: 500
    }

   
}

</script>

<?php 


if ($_SERVER['REQUEST_METHOD']=='POST') {

        $product_id= mysqli_real_escape_string($db->link,$_POST['product_id']);
        //----------shirt design
        $pocket= mysqli_real_escape_string($db->link,$_POST['pocket']);
        $sleeve= mysqli_real_escape_string($db->link,$_POST['sleeve']);
        $front= mysqli_real_escape_string($db->link,$_POST['front']);
        $back= mysqli_real_escape_string($db->link,$_POST['back']);
        $bottom= mysqli_real_escape_string($db->link,$_POST['bottom']);
        $cuffs= mysqli_real_escape_string($db->link,$_POST['cuffs']);
        $collar= mysqli_real_escape_string($db->link,$_POST['collar']);
        $checklist= implode( ';' , $_POST['check_list'] );
        //----------measurment
        $neck= mysqli_real_escape_string($db->link,$_POST['neck']);
        $chest= mysqli_real_escape_string($db->link,$_POST['chest']);
        $waist= mysqli_real_escape_string($db->link,$_POST['waist']);
        $hip= mysqli_real_escape_string($db->link,$_POST['hip']);
        $length= mysqli_real_escape_string($db->link,$_POST['length']);
        $soulder= mysqli_real_escape_string($db->link,$_POST['soulder']);
        $sleeve= mysqli_real_escape_string($db->link,$_POST['sleeve']);
        $fitness= mysqli_real_escape_string($db->link,$_POST['fitness']);
        //----------customer details
        $customer_name= mysqli_real_escape_string($db->link,$_POST['customer_name']);
        $customer_email= mysqli_real_escape_string($db->link,$_POST['customer_email']);
        $phone= mysqli_real_escape_string($db->link,$_POST['phone']);
        $city= mysqli_real_escape_string($db->link,$_POST['city']);
        $postal_code= mysqli_real_escape_string($db->link,$_POST['postal_code']);
        $address= mysqli_real_escape_string($db->link,$_POST['address']);
        $other_list=implode(",",  $_POST['check_list']);;

        if ($pocket=="Select Pocket" || $sleeve=="Select Sleeve" || $front=="Front" || $back=="Back Pleats" || $bottom=="Bottom" || $cuffs=="Select Cuffs" || $collar=="Collar" || $neck=="" || $chest=="" || $waist=="" || $hip=="" || $length=="" || $soulder=="" || $sleeve=="" || $fitness=="" || $customer_name=="" || $customer_email==""|| $phone==""|| $city==""|| $postal_code==""|| $address=="")
            {
                echo "<span class='error'>Field Must Not Be Empty !!</span>";

            }elseif (is_numeric($customer_name)  || is_numeric($customer_email) || is_numeric($city) || is_numeric($address)) {
        
                echo "<span class='error'> without phone and postal code, customer field Must Be alphabet !!</span>";
            }//elseif (!is_numeric($neck) || !is_numeric($chest) || !is_numeric($waist) || !is_numeric($hip) || !is_numeric($neck) || !is_numeric($neck) || !is_numeric($neck) || !is_numeric($neck) || !is_numeric($length) || !is_numeric($soulder) || !is_numeric($sleeve) || !is_numeric($fitness) || !is_numeric($postal_code)) {
            
                   // echo "<span class='error'> measurment, phone postal code, customer field Must Be numeric!!</span>";
                else {
                    echo($sleeve.",".$pocket.", ".$front." ,".$back.", ".$bottom." ,".$cuffs." ,".$collar.",".$checklist." ,".$neck.","." ,".$chest.","." ,".$waist.","." ,".$hip.","." ,".$length.","." ,".$soulder.","." ,".$sleeve.","." ,".$fitness.","." ,".$customer_name.","." ,".$customer_email.","." ,".$phone.","." ,".$city.","." ,".$postal_code.","." ,".$address);echo "<script>alert('There are no fields to generate a report');</script>"; 

                        $insertcust= "INSERT INTO customer(customer_email, phone, customer_name, city, postal_code, address) VALUES('$customer_email', '$phone', '$customer_name', '$city', '$postal_code', '$address')";
                        $insertcust= $db->insert($insertcust);
                        if (!$insertcust) {

                            echo "<script>alert('customer data not inserted');</script>"; exit();
                        }else {
                            $insertmesurment= "INSERT INTO shirt_measurment(customer_email, neck, chest, waist, hip, length, sleeve, fitness) VALUES('$customer_email', '$neck', '$chest', '$waist', '$hip', '$length', '$sleeve', '$fitness')";
                                $insertmesurment= $db->insert($insertmesurment);
                                if (!$insertmesurment) {

                                echo "<script>alert('measurment data not inserted');</script>"; exit();
                                }else{
                                    $insertdesign= "INSERT INTO shirt_design(customer_email, product_id, pocket, sleeve, front, back_pleats, bottom, collar, cuffs, other) VALUES('$customer_email', '$product_id', '$pocket', '$sleeve', '$front', '$back', '$bottom', '$collar', '$cuffs', '$other_list')";
                                $insertdesign= $db->insert($insertdesign);
                                if (!$insertdesign) {
                                    echo "<script>alert('customer data not inserted');</script>"; exit();
                                }
                            
                        }
                    
                }
        }
}

 ?>
 <div class="contentsection contemplete clear">
    <?php include 'inc/sidebar.php';?>
    <div class="maincontent clear">


   <form action="" method="post" enctype="multipart/form-data">

        <select class="my-select" name="pocket">
            <option  selected="selected" style="color: red;font-size: 20px">Select Pocket</option>
             <option data-img-src="admin/imageselect/nopocket.jpg" value="No Pocket ">No Pocket</option>
             <option data-img-src="admin/imageselect/classicpocket.jpg" value="Classic pocket">Classic Pocket</option>
             <option data-img-src="adminimageselect/diamondstraing.jpg" value="Diamond Straight">Diamond Straight</option>
             <option data-img-src="adminimageselect/classicsquarp.jpg" value="Classic Squar">classic Squar</option>
             <option data-img-src="admin/imageselect/roundflap.jpg" value="Round Flap">Round Flap</option>
             <option data-img-src="admin/imageselect/angleflap.jpg" value="Angle Flap">Angle Flap</option>
             <option data-img-src="admin/imageselect/diamondflap.jpg" value="Diamond Flap">Diamond Flap</option>
             <option data-img-src="admin/imageselect/roundwithglass.jpg" value="Round With Glass">Round With Glass</option>
        </select>
    
        <select class="my-select" name="sleeve">
            <option  selected="selected" style="color: red;font-size: 20px">Select Sleeve</option>
             <option data-img-src="admin/imageselect/longsleeve.png" value="Long Sleeve"> Long Sleeve</option>
             <option data-img-src="admin/imageselect/rollupsleeve.png" value="Long Sleeve Roll Up">Long Sleeve Roll Up</option>
             <option data-img-src="admin/imageselect/shortsleeve.png" value="Short Sleeve">Short Sleeve</option>
        </select>

        <select class="my-select" name="front">
            <option  selected="selected" style="color: red;font-size: 20px">Front</option>
             <option data-img-src="admin/imageselect/FrenchPlacket.jpg" value="French Placket">French Placket</option>
             <option data-img-src="admin/imageselect/boxplacket.jpg" value="box Placket">Box Placket</option>
             <option data-img-src="admin/imageselect/ConcealedPlacket.png" value="Hidden Placket">Hidden Placket</option>
        </select>
        <select class="my-select" name="back">
            <option  selected="selected" style="color: red;font-size: 20px">Back Pleats</option>
            <option data-img-src="admin/imageselect/plain.jpg" value="Plain Pleats">Plain Pleats</option>
             <option data-img-src="admin/imageselect/boxpleats.jpg" value="Box pleats">Box Pleats</option>
             <option data-img-src="admin/imageselect/SidePleats.jpg" value="Side Pleats">Side Pleats</option>
             
        </select>
        <select class="my-select" name="bottom">
            <option  selected="selected" style="color: red;font-size: 20px">Bottom</option>
             <option data-img-src="admin/imageselect/tri-tab.png" value="Tri-Tab Bottom">Tri_Tab Bottom</option>
            <!-- <option data-img-src="imageselect/" value="Straight Bottom">Straight Bottom</option> -->
             <option data-img-src="admin/imageselect/straingveants.jpg" value="Straight Vents Bottoms">Straite Vents</option>
        </select>
        <select class="my-select" name="collar">
            <option  selected="selected" style="color: red;font-size: 20px">Collar</option>
             <option data-img-src="admin/imageselect/italianc.JPG" value="Italian Collar">Italian collar </option>
             
             <option data-img-src="admin/imageselect/prenchc.JPG" value="French Collar">French collar </option>
             <option data-img-src="admin/imageselect/batman.JPG" value="Batman Collar">Batman Collar</option>
             <option data-img-src="admin/imageselect/cutaway.jpg" value="Cut Away">Cut Away</option>
             <option data-img-src="admin/imageselect/roundc.JPG" value="Round Collar">Round Collar</option>
        </select>
        <select class="my-select" name="cuffs">
            <option  selected="selected" style="color: red;font-size: 20px">Select Cuffs</option>
             <option data-img-src="admin/imageselect/roundb.jpg" value="Round Cuffs">Round Cuffs</option>
             <option data-img-src="admin/imageselect/Straight.JPG" value="Squar Cuffs">Squar Cuffs</option>
             <option data-img-src="admin/imageselect/angle.jpg" value="Angle Cuffs">Angle Cuffs</option>
             <option data-img-src="admin/imageselect/frenchangle.JPG" value="French Ancgle Cuffs">French Angle Cuffs</option>
             
            </select>
            <br>
            <br>

        <div class="grid_10">
            <div class="block" style="color: black;">
                 <input type="checkbox" name="check_list[]" value="none">none of them             
                    <input type="checkbox" name="check_list[]" value="shoulder Epaucattes, " class="showTip L8">shoulder Epaucattes
                    <input type="checkbox" name="check_list[]" value="Front Seams, " class="showTip L9">Front Seams
                    <input type="checkbox" name="check_list[]" value="Back dart, " class="showTip L10">Back dart
                    <input type="checkbox" name="check_list[]" value="2 Front Pockets">2 Front Pockets
                    <input type="checkbox" name="check_list[]" value="2 Cuffs buttam">2 Cuffs buttam
                    
                <br>
                <br>
                <hr style=" color: green; width=20px;">
                <br>

        <script>
        $(".my-select").chosen({
         width:"25%",
         //html_template: '<img style="border:3px solid black;padding:0px;margin-right:4px" class="{class_name}" src="{url}">'
         });
        </script>

        </div>



    <div class="grid_10">
        <div class="box round first grid">
            <h2>Add New Measurment</h2>
            <br>
            <hr>
                <div class="block">
                        <style>
                                input {
                                    background-color:#edebea;
                                }
                                span.text{
                                  color: #red; font-size:10px; font-style: italic;  
                                } 
                        </style>  

                 
                    <table class="form">
                        <tr>
                            <td>
                                <label>Add Measurment For Product_id</label>

                                <br>
                            </td>
                            <td>
                                <select id="select" name="product_id">
                                    <option>Select Product_id</option>
                                    <?php 
                                        $query= "SELECT * FROM product";
                                        $product_id= $db->select($query);
                                        while ($result= $product_id->fetch_assoc()) {   
                                        
                                     ?>
                                    <option value="<?php echo $result['product_id'] ?>"><?php echo $result['product_id']; ?></option>
                                   <?php } ?>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Neck</label>
                            </td>
                            <td>
                                <input type="text" name="neck" placeholder="9-23 inch" class="small" />
                                <span class="text"> <span class="showTip L1" style="color:red">*show hints</span></span>
                            </td> 
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
                                <input type="text" name="waist" placeholder="24-75 inch" class="small" /> <span class="text"><span class="showTip L3" style="color:red">*show hints</span></span>
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
                                <input type="text" name="length" placeholder="19 to 42 Inch" class="small" /><span class="text"><span class="showTip L5" style="color:red">*show hints</span></span>
                            </td>
                        </tr>
                            
                        <tr>
                            <td>
                                <label>Soulder</label>
                            </td>
                            <td>
                                <input type="text" name="soulder" placeholder="14-27 Inch" class="small" />
                                 <span class="text"><span class="showTip L6" style="color:red">*show hints</span></span>
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <label>Sleeve</label>
                            </td>
                            <td>
                                <input type="text" name="sleeve" placeholder="18-30 Inch" class="small" /><span class="text"><span class="showTip L7" style="color:red">*show hints</span></span>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Select Your Fit</label>
                            </td>
                            <td>
                                <input type="radio" name="fitness" value="body fit" style="color: white;" /> Body Fit
                                <input type="radio" name="fitness" value="Signature" />Signature Fit
                                <input type="radio" name="fitness" value="Large fit" /> Large Fit
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
<br>
<hr>

        <div class="grid_10">
        
            <div class="box round first grid">
                <h2>Add Customer Details</h2>

<br>
<hr>
<br>
                <div class="block">

                        <style>
                                input {
                                    background-color:#edebea;
                                }
                                span.text{
                                  color: #red; font-size:10px; font-style: italic;  
                                } 
                        </style>  

                    <table class="form">

                        <tr>
                            <td>
                                <label>Customer Name</label>
                            </td>
                            <td>
                                <input type="text" name="customer_name" placeholder="full name" class="small" />
                            </td> 
                        </tr>

                        <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="email" name="customer_email" placeholder="email" class="small" />
                            </td>
                        </tr>

                         <tr>
                            <td>
                                <label>Phone</label>
                            </td>
                            <td>
                                <input type="text" name="phone" placeholder="cell number" class="small" />
                            </td>
                        </tr>

                        
                         <tr>
                            <td>
                                <label>City</label>
                            </td>
                            <td>
                                <input type="text" name="city" placeholder="city" class="small" /> 
                            </td>
                        </tr>

                     
                          <tr>
                            <td>
                                <label>Postal code</label>
                            </td>
                            <td>
                                <input type="text" name="postal_code" placeholder="postal code" class="small" />
                            </td>
                        </tr>
                            
                        <tr>
                            <td>
                                <label>address</label>
                            </td>
                            <td>
                               <textarea name="address" style="width:300px; height:150px;"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Confirm Order" style="color:blue; background: yellow;" />
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</form>
</div>

 <!-- Load TinyMCE -->
    <script src="admin/js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>

<?php include 'inc/footer.php';?>