<?php include_once 'P_header.php';?>

<?php
include 'dbh.inc.php';

if (isset($_POST['reserve'])){
    $Full_Name = $_POST["FullName"];
    $Email = $_POST["Email"];
    $Booking_For = $_POST["BookingFor"];
    $Hotel_Name = $_POST["HotelName"];
    $Package_Name = $_POST["HotelPackage"];
    $Check_In_Date = $_POST["CheckIntime"];
    $Check_Out_Date = $_POST["CheckOuttime"];
    $Room_Type = $_POST["countR"];
    $No_Of_Adult = $_POST["countA"];
    $No_Of_Children = $_POST["countC"];
    $Special_Request = $_POST["SpecialRequest"];

    $query = "SELECT `Package_ID` FROM `hotel_package` WHERE `Package_Name` = '$Package_Name'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $Package_ID = $row['Package_ID'];

        $query = "SELECT `Package_Price` FROM `hotel_package` WHERE `Package_ID`='$Package_ID'";
        $result = $conn->query($query);
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $packagePrice2 = $row['Package_Price'];
        
            $checkInDateTime = new DateTime($Check_In_Date);
            $checkOutDateTime = new DateTime($Check_Out_Date);
            $interval = $checkInDateTime->diff($checkOutDateTime);
            $numNights = $interval->format('%a');

            $totalPrice = $packagePrice2 * ($No_Of_Adult + $No_Of_Children) * $numNights;
        
        $sql = "INSERT INTO `hotel_reservation`(`user_name`, `Package_ID`, `Full_Name`, `Email`, `Booking_For`, `Check_In_Date`, `Check_Out_Date`, `Room_Type`, `No_Of_Adult`, `No_Of_Children`,`Total_Price`, `Special_Request`) 
        VALUES ('$Username', '$Package_ID', '$Full_Name', '$Email', '$Booking_For', '$Check_In_Date', '$Check_Out_Date', '$Room_Type', '$No_Of_Adult', '$No_Of_Children','$totalPrice','$Special_Request')";
            
        if ($conn->query($sql) === TRUE) {
            // Redirect to the view page
            header("Location: P_view.php");
            exit();
        } else {
            echo "Error: " . $conn->error;
        } 
    } 
    } else {
        echo "Error: Package not found";
    } 
}
?>

    <div class="background">
        <div class="transbox">
            <!--reservation form-->
            <div class="form">
                <form method="POST" action="" name="myForm" id="myForm" onsubmit="return validatemyForm()">
                    <fieldset>
                        <legend><span class="number">1</span>Reservation Details</legend>
                        <input type="text" id="FullName" name="FullName" placeholder="Full Name *" required autocomplete="off">
                        <input type="email" id="Email" name="Email" placeholder="Email *" required autocomplete="off">
                        <label for="guest">Who are you booking for?</label>
                        <select id="guest" name="BookingFor" required>
                            <optgroup label="Booking For"> 
                                <option value="main_Guest">I am the main Guest</option>
                                <option value="Guest">Booking is for someone else</option>
                            </optgroup>
                        </select>
                        <label for="hotel">Select your Hotel :</label>
                        <select id="hotel" name="HotelName" required>
                            <optgroup label="Hotel Name"> 
                                <option value="Wild Coast Tented Lodge">Wild Coast Tented Lodge</option>
                                <option value="Leopard Nest">Leopard Nest</option>
                                <option value="Jetwing Yala">Jetwing Yala</option>
                                <option value="Cinnamon Yala">Cinnamon Yala</option>
                                <option value="Yala Eco Tree House">Yala Eco Tree House</option>
                            </optgroup>
                        </select>
                        <label for="package">Select your Hotel Package:</label>
                        <select id="package" name="HotelPackage" required>
                            <optgroup label="Hotel Package"> 
                                <option value="Adventure Leopard Package">Adventure Leopard Package</option>
                                <option value="Adventure Eco Budget Tree Package">Adventure Eco Budget Tree Package</option>
                                <option value="Wild Lodge Package">Wild Lodge Package</option>
                                <option value="Sweet Family Package">Sweet Family Package</option>
                                <option value="Cinnamon Luxury Package">Cinnamon Luxury Package</option>
                                <option value="Jetwing Luxury Package">Jetwing Luxury Package</option>
                            </optgroup>
                        </select>
                        <label for="count">Room Type: </label>
                            <input type="number" id="countR" name="countR" min="1" max="3" placeholder="Bed Count *" required>
                        <label for="count">No Of Adults: </label>
                            <input type="number" id="countA" name="countA" min="1" placeholder="No Of Adults *" required>
                        <label for="count">No Of Children: </label>
                            <input type="number" id="countC" name="countC" min="0" placeholder="No Of Children *" required>
                        <label for="CheckInDate">Check In Date:</label>
                            <input type="datetime-local" id="CheckIntime" name="CheckIntime" required>
                        <label for="CheckOutDate">Check Out Date:</label>
                            <input type="datetime-local" id="CheckOuttime" name="CheckOuttime" required>    
                    </fieldset>
                    <fieldset>
                        <legend><span class="number">2</span> Special Request</legend>
                        <textarea name="SpecialRequest" id="SpecialRequest" placeholder="Write your special request here. (optional)" autocomplete="off"></textarea>
                    </fieldset>
                    <input type="submit" id ="resbtn" name = "reserve" value="Reserve">
                </form>
                <script>
                    function validatemyForm() {
                        // Get the values of the fields
                        let FullName = document.forms["myForm"]["FullName"].value;
                        let Email = document.forms["myForm"]["Email"].value;
                        let BookingFor = document.forms["myForm"]["BookingFor"].value;
                        let countR = document.forms["myForm"]["countR"].value;
                        let countA = document.forms["myForm"]["countA"].value;
                        let countC = document.forms["myForm"]["countC"].value;
                        let CheckIntime = document.forms["myForm"]["CheckIntime"].value;
                        let CheckOuttime = document.forms["myForm"]["CheckOuttime"].value;

                        // Perform validation
                        if (FullName == "") {
                            alert("Full Name must be filled out");
                            return false;
                        }
                        
                        if (Email == "") {
                            alert("Email must be filled out");
                            return false;
                        }

                        if (BookingFor == "") {
                            alert("Booking For must be filled out");
                            return false;
                        }

                        if (countR == "") {
                            alert("Room Type must be filled out");
                            return false;
                        }

                        if (countA == "") {
                            alert("No Of Adults must be filled out");
                            return false;
                        }

                        if (countC == "") {
                            alert("No Of Children must be filled out");
                            return false;
                        }

                        if (CheckIntime == "") {
                            alert("Check In time must be filled out");
                            return false;
                        }

                        if (CheckOuttime == "") {
                            alert("Check Out time must be filled out");
                            return false;
                        }

                        if (!validateRoomCount()){
                            return false;

                        }
                        if (!validateDates()){
                            return false;

                        }

                        alert("Reservation Successful!");



                        return true;
                    }

                    //Room count validation
                    function validateRoomCount() {
                        var roomCount = document.getElementById("countR").value;
                        var adultCount = document.getElementById("countA").value;

                        if (roomCount < adultCount) {
                            alert("The Bed count cannot be less than the number of adults.");
                            return false;
                        } else {
                            return true;
                        }

                    }

                    //Date Pick
                    function validateDates() {
                        var checkInDate = new Date(document.getElementById("CheckIntime").value);
                        var checkOutDate = new Date(document.getElementById("CheckOuttime").value);

                        if (checkOutDate < checkInDate) {
                            alert("Check-out date cannot be earlier than check-in date");
                            return false;
                        } else {
                            return true;
                        }

                    }

                    //disable previous dates
                    var today = new Date().toISOString().slice(0, 16);
                    document.getElementsByName("CheckIntime")[0].min = today;
                    document.getElementsByName("CheckOuttime")[0].min = today;                        
                </script>
            </div>
        </div>
    </div> 
<?php include_once 'P_footer.php';?>
