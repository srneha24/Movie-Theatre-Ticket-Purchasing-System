<!DOCTYPE html>

<html>

<head>

    <title> User Profile </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="CSS/Default Colours.css">

    <script type="text/javascript">
        $(function() {
            $(edit).change(function() {
                var x = this.checked;
                if (x) {
                    $("#username").prop("disabled", false);
                    $("#phone").prop("disabled", false);
                    $("#email").prop("disabled", false);
                    $("#card_no").prop("disabled", false);
                    $("#exp_date").prop("disabled", false);
                    $("#cvc_no").prop("disabled", false);
                    $("#save").prop("disabled", false);
                }

                else {
                    $("#username").prop("disabled", true);
                    $("#phone").prop("disabled", true);
                    $("#email").prop("disabled", true);
                    $("#card_no").prop("disabled", true);
                    $("#exp_date").prop("disabled", true);
                    $("#cvc_no").prop("disabled", true);
                    $("#save").prop("disabled", true);
                }
            });
        });
    </script>

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

        elseif ($popup === "infoupdate=success") {
            echo '
                <div class = "alert alert-success fade show">

                    <a href = "#" class = "close" data-dismiss = "alert"> &times; </a>
                    <p class="text-center"><b>Information Updated!</b></p>
                
                </div>';

                unset($_SESSION['outmessage']);
        }
    }
    
    ?>

    <div class="container-fluid">
        <h1 class="title-bg text-white text-center"><?php echo $_SESSION["cust_name"]; ?></h1>
    </div>

    <br>

    <div class="container">

        <div style="float: right;">
            <form role="form" action="Includes/Customer Tickets.Inc.php" method="post">
                <button class="btn btn-primary btn-lg" type="submit" name="usertix-submit"><b><i>My Tickets</i></b></button>
            </form>
        </div>

        <br><br><br>
        
        <div class="bg-white border border-secondary m-2 p-5">
            <div style="float: right;">
                <input class="form-check-input" type="checkbox" id="edit" name="editinfo">
                <label class="form-check-label">Edit Information</label>
            </div>

            <br><br><br>

            <form role="form" action="Includes/Customer Profile.Inc.php" method="post">                
                <div class="form-group row">
                    <label class="col-3 col-form-label"><strong>ID:</strong></label>
                    <div class="col-9">
                        <b><i><?php echo $_SESSION["cust_id"]; ?></i></b>
                    </div>
                </div>
            
                <div class="form-group row">
                    <label class="col-3 col-form-label"><strong>Name:</strong></label>
                    <div class="col-9">
                        <input type="text" class="form-control" name="cust_name" id="username" maxlength = "50" value="<?php echo $_SESSION["cust_name"]; ?>" disabled>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label"><strong>Phone Number:</strong></label>
                    <div class="col-9">
                        <input type="text" class="form-control" name="cust_phone" id="phone" pattern="[0-9]{11}" value="<?php echo $_SESSION["cust_phone"]; ?>" disabled>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label"><strong>Email Address:</strong></label>
                    <div class="col-9">
                        <input type="text" class="form-control" name="cust_email" id="email" value="<?php echo $_SESSION["cust_email"]; ?>" disabled>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label"><strong>Card No.:</strong></label>
                    <div class="col-9">
                        <input type="text" class="form-control" name="cust_card_no" id="card_no" value="<?php echo $_SESSION["card_no"]; ?>" maxlength = "20" disabled>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label"><strong>Expiration Date:</strong></label>
                    <div class="col-9">
                        <input type="text" class="form-control" name="cust_exp_date" id="exp_date" value="<?php echo $_SESSION["exp_date"]; ?>" min="1997-01-01" max="2030-12-31" disabled>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label"><strong>CVC No.:</strong></label>
                    <div class="col-9">
                        <input type="text" class="form-control" name="cust_cvc_no" id="cvc_no" value="<?php echo $_SESSION["cvc_no"]; ?>" maxlength = "4" disabled>
                    </div>
                </div>

                <br>

                <div class="form-group row" style="float: right;">
                    <button class="btn btn-danger" type="submit" name="custinfo-submit" id="save" disabled>Save Changes</button>
                </div>

                <br>
            </form>
        </div>
        
    </div>

    <br><br>

</body>

</html>