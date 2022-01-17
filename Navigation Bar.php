<?php

    session_start();

?>

<style> 

nav {
    max-height: 75px;
    background-color: black;
}

</style>

<nav class="navbar navbar-expand navbar-dark fixed-top">
        <div class="container-fluid m-5">
            <div class="navbar-header mt-5 pt-5"> <!-- LOGO -->
                <a class="navbar-brand" href="Homepage.php">
                    <img class="rounded-circle" src="Images/System Images/Logo.jpg" alt="Movie Theatre Ticket Purchasing System" width="150" height="150">
                </a>
            </div>

            <ul class="nav navbar-nav">
                <li class="nav-item mr-2"><a class="nav-link" href="Showtime.php">SHOWTIME</a></li>
                <?php
                
                    if (isset($_SESSION["emp_name"])) {
                        echo '<li class="nav-item mr-2"><a class="nav-link" href="Sold Tickets.php">VIEW SOLD TICKETS</a></li>';
                        echo '<li class="nav-item mr-2"><a class="nav-link" href="Add Film.php">ADD FILM</a></li>';
                    }

                    else {
                        echo '<li class="nav-item mr-2"><a class="nav-link" href="Buy Tickets.php">BUY TICKETS</a></li>';
                    }
                
                ?>
                <li class="nav-item mr-2">
                <form role="form" action="Includes/Search Results.Inc.php" method="post">
                    <input type="text" name="film-search" <?php 
                    if (isset($_SESSION["film_search"])) {
                        echo 'value="'.$_SESSION["film_search"].'"';
                        unset($_SESSION["film_search"]);
                    }
                    else{
                        echo 'placeholder="Search Film"';
                    }
                    ?> >
                    <button type="submit" name="search-submit" class="btn btn-light"> <span class="pl-1 pr-3 txtsize">
                        <span class="material-icons">search</span> Search </span> 
                    </button>
                </form>
                </li>
            </ul>

            <?php 
            
                if (isset($_SESSION["cust_name"])) {
                    echo '<ul class="nav navbar-nav navbar-right">
                        <li class="nav-item mr-2"><a class="nav-link" href="Customer Profile.php">'.$_SESSION["cust_name"].'</a></li>
                        <li class="nav-item">
                            <form action="Includes/Log Out.Inc.php" method="post">
                                <button class="btn text-secondary" type="submit" name="logout-submit" style="background-color: black;">Log Out</button>
                            </form>
                        </li>
                    </ul>';
                }

                elseif (isset($_SESSION["emp_name"])) {
                    if ($_SESSION["emp_id"] === 'Admin') {
                        echo '<ul class="nav navbar-nav navbar-right">
                            <li class="nav-item mr-2 nav-link">'.$_SESSION["emp_name"].'</li>
                            <li class="nav-item">
                                <form action="Includes/Log Out.Inc.php" method="post">
                                    <button class="btn text-secondary" type="submit" name="logout-submit" style="background-color: black;">Log Out</button>
                                </form>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="Admin Tasks.php">Tasks</a></li>
                        </ul>';
                    }

                    else {
                        echo '<ul class="nav navbar-nav navbar-right">
                            <li class="nav-item mr-2 nav-link">'.$_SESSION["emp_name"].'</li>
                            <li class="nav-item">
                                <form action="Includes/Log Out.Inc.php" method="post">
                                    <button class="btn text-secondary" type="submit" name="logout-submit" style="background-color: black;">Log Out</button>
                                </form>
                            </li>
                        </ul>';
                    }
                }

                else {
                    echo '<ul class="nav navbar-nav navbar-right">
                        <li class="nav-item"><a class="nav-link" href="Sign Up.php">Sign Up</a></li>
                        <li class="nav-item"><a class="nav-link" href="Log In.php">Log In</a></li>
                    </ul>';
                }
            
            ?>

        </div>
    </nav>