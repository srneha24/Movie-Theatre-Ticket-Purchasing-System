<!DOCTYPE html>

<html>

<head>

    <title> Show Tickets </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="CSS/Default Colours.css">

</head>

<body>

    <?php include_once "Navigation Bar.php" ?> <!-- NAVIGATION BAR -->

    <br><br><br><br><br><br><br><br>

    <?php
    
    if (isset($_SESSION['outmessage'])) {
        $popup = $_SESSION['outmessage'];

        if ($popup === "error=nokeyword") {
            echo '
                <div class = "alert alert-danger fade show">

                    <a href = "#" class = "close" data-dismiss = "alert"> &times; </a>
                    <p class="text-center"><b>No Keyword Entered</b></p>
                
                </div>';

                unset($_SESSION['outmessage']);
        }
    }
    
    ?>

    <div class="container-fluid title-bg text-white">
        <h2 class="text-center"><?php echo $_SESSION["film_name_choice"]; ?></h2> <br>
        <p class="text-center">
            DATE: <?php echo date("F j, Y", strtotime($_SESSION["date_select"])); ?> &emsp; TIME: <?php echo substr($_SESSION["time_choice"], 0, 5); ?>
        </p>
    </div>

    <br>

    <div class="container">
        
        <div class="bg-white border border-secondary m-2 p-5">
            <h3 class="text-center" style="background-color: blue; color: white;"> <i>FIRST CLASS</i> </h3>

            <br>
        
            <table class = "table table-hover" style="background-color: cyan;">
                
                <thead>
                
                    <tr class = "table-secondary">
                
                        <th> TICKET NUMBER </th>
                        <th> SEAT NO. </th>
                        <th> CUSTOMER ID </th>
                        <th> CUSTOMER NAME </th>
                    
                    </tr>
                
                </thead>
                
                <tbody>
                
                    <?php
                    
                        for ($i=0; $i < count($_SESSION["first_ticket_no"]); $i++) { 
                            echo '<tr>
                                <td> '.$_SESSION["first_ticket_no"][$i].' </td>
                                <td> '.$_SESSION["first_seat_no"][$i].' </td>
                                <td> '.$_SESSION["first_cust_id"][$i].' </td>
                                <td> '.$_SESSION["first_cust_name"][$i].' </td>
                            </tr>';
                        }
                    
                    ?>
                
                </tbody>

            </table>

            <br><br>

            <h3 class="text-center" style="background-color: blue; color: white;"> <i>SECOND CLASS</i> </h3>

            <br>
        
            <table class = "table table-hover" style="background-color: yellow;">
                
                <thead>
                
                    <tr class = "table-secondary">
                
                        <th> TICKET NUMBER </th>
                        <th> SEAT NO. </th>
                        <th> CUSTOMER ID </th>
                        <th> CUSTOMER NAME </th>
                    
                    </tr>
                
                </thead>
                
                <tbody>
                
                    <?php
                        
                        for ($i=0; $i < count($_SESSION["second_ticket_no"]); $i++) { 
                            echo '<tr>
                                <td> '.$_SESSION["second_ticket_no"][$i].' </td>
                                <td> '.$_SESSION["second_seat_no"][$i].' </td>
                                <td> '.$_SESSION["second_cust_id"][$i].' </td>
                                <td> '.$_SESSION["second_cust_name"][$i].' </td>
                            </tr>';
                        }
                    
                    ?>
                
                </tbody>

            </table>

            <br><br>

            <h3 class="text-center" style="background-color: blue; color: white;"> <i>THIRD CLASS</i> </h3>

            <br>

            <table class = "table table-hover" style="background-color: lightgreen;">
                
                <thead>
                
                    <tr class = "table-secondary">
                
                        <th> TICKET NUMBER </th>
                        <th> SEAT NO. </th>
                        <th> CUSTOMER ID </th>
                        <th> CUSTOMER NAME </th>
                    
                    </tr>
                
                </thead>
                
                <tbody>
                
                    <?php
                        
                        for ($i=0; $i < count($_SESSION["third_ticket_no"]); $i++) { 
                            echo '<tr>
                                <td> '.$_SESSION["third_ticket_no"][$i].' </td>
                                <td> '.$_SESSION["third_seat_no"][$i].' </td>
                                <td> '.$_SESSION["third_cust_id"][$i].' </td>
                                <td> '.$_SESSION["third_cust_name"][$i].' </td>
                            </tr>';
                        }
                    
                    ?>
                
                </tbody>

            </table>
        </div>
        
    </div>

    <br><br>

</body>

</html>