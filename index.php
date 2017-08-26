<?php
include 'models/my_patient.php';
$patient_model = new my_patient();

$agefilter = "";
if (isset($_POST['age_filter'])) {
    
    $agefilter = $_POST['age_filter'];
    if (is_numeric($agefilter)) {
        
        $patients = $patient_model->get_older_than($agefilter);

    }else{

        echo '<script type="text/javascript">alert("The age field must be a numeric value");</script>';
        $patients = $patient_model->list_all();
    
    }
    unset($_POST['age_filter']);

}else{

    $patients = $patient_model->list_all();

}

$groups = $patient_model->get_number_byage($patients);

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Test for New Hires</title>
    <meta name="description" content="Test for New Hires">
    <meta name="author" content="PV">
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="src/css/resize.css">
</head>
<body>

    <div class="container">

        <h1>Patient Listing</h1>

        <p>
            <label for="patient_filter">Filter by Name</label>
            <input type="text" name="patient_filter" id="filterp"/>
        </p>

        <form method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            
            <label for="age_filter">List patients older than </label>
            <input type="text" name="age_filter" id="filterage"/>

            <input type="submit" name="submit" value="Submit"> </br>

        </form>

        <p>
            <label for="patient_filter">Number of patients grouped by age</label>
            <ul>
                <!-- Hint: Task 3. -->
                <?php 
                    if (!empty($groups)) {
                       

                        foreach($groups as $key => $value) { ?>
                    
                            <li><span>Age: <?php echo $key; ?> </span><span>Patients quantity: <?php echo $value; ?></span></li>
                
                <?php   }

                    }?>
                
            </ul>
        </p>

        <div class="row">
            <div class="col-xs-4">Name</div>
            <div class="col-xs-4 ages">Age</div>
            <div class="col-xs-4">Phone</div>
        </div>

        <!-- Hint: Task 4. -->
        <?php 
            if (!empty($patients)) {
                
            foreach($patients as $patient): ?>
            
            <div class="row patient">
                <div class="col-xs-4"><?php echo $patient->patient_name; ?></div>
                <div class="col-xs-4 ages"><?php echo $patient->patient_age; ?></div>
                <div class="col-xs-4"><?php echo $patient->patient_phone; ?></div>
            </div>
        <?php endforeach; 
            }else{ ?>
                
                <div class="col-xs-4">There is not results</div>
        <?php
            }
        ?>

    </div>

    <!-- scripts at the bottom! -->
    <!--<script src="public/js/jquery-3.2.1.min.js"></script>
    <script src="public/js/bootstrap.js"></script>
    <script src="public/js/script.js"></script>-->

    <!--  Hint: Task 5. -->
    <script src="public/script.js"></script>
</body>
</html>
