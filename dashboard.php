<?php 

$inactive = 7200; 
ini_set('session.gc_maxlifetime', $inactive);

session_start();

if (isset($_SESSION['timeout']) && (time() - $_SESSION['timeout'] > $inactive)) {
    session_unset();   
    session_destroy();
    header("Location: index.php");
}
$_SESSION['timeout'] = time();

?>

<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    
    <link rel="stylesheet" type="text/css" href="public/styles.css">
    <link href="https://uploads-ssl.webflow.com/5bb62897dda2ebc49ac7f989/5bbb7a717d36223ac8e28e87_favicon-32x32.png" rel="shortcut icon" type="image/x-icon">
    

    <title>Sqoals | Dashboard</title>
  </head>
  <body>
  
    <div class="container-fluid ">
       
        <div class="row">
            <header class="col-lg-12 clearfix">
                <div class="header-wrapper">
                    <img class="logo" src="images/Sqoals%20Full%20Logo%20Blue.png" alt="Company logo">
                    <ul class="nav-profile">
                        <li class="list-inline-item"><a class="fa fa-bell" href="#"></a></li>
                        <li class="list-inline-item"> <img class="rounded-circle avatar" src="images/avatar.png" alt="User image"></li>
                        <li class="list-inline-item"><p class="d-inline" id="user-name"><?php echo($_SESSION['email']); ?></p></li>
                        <li class="list-inline-item">
                            <div class="dropdown show">
                                <a class="btn dropdown-toggle " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="logout.php">Log out</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </header>
        </div>
        
        <div class="row">
            <div class="col-lg-3 side-bar d-flex flex-column">
                <nav class="navbar navbar-light light-blue lighten-4">
                    <button class="navbar-toggler burger-btn d-sm-none" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1"
                    aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="dark-blue-text"><i
                        class="fa fa-bars fa-1x"></i></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent1">
                        <ul class="navbar-nav mr-auto text-center">
                            <li class="nav-item active">
                                <a class="nav-link" href="#"><i class="fas fa-tasks d-inline"></i>Goals</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fas fa-star d-inline"></i>Offers</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fas fa-users d-inline"></i>Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fas fa-cog d-inline"></i>Settings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Sign up for</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fas fa-chart-line d-inline"></i>Learn</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fas fa-exchange-alt d-inline"></i>Invest</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fas fa-project-diagram d-inline"></i>Save</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="far fa-clone d-inline"></i>Acquire</a>
                            </li>    
                        </ul>
                    </div>
                </nav>
                <div class="nav-part1 d-none d-sm-block">
                    <nav class="nav m-auto">
                        <a class="nav-link" href="#"><i class="fas fa-tasks d-inline"></i>Goals</a>
                        <a class="nav-link" href="#"><i class="fas fa-star d-inline"></i>Offers</a>
                        <a class="nav-link" href="#"><i class="fas fa-users d-inline"></i>Profile</a>
                        <a class="nav-link" href="#"><i class="fas fa-cog d-inline"></i>Settings</a>
                    </nav>
                </div>
                <div class="nav-part2 d-none d-sm-block">
                    <nav class="nav m-auto">
                        <a class="nav-link" href="#">Sign up for</a>
                        <a class="nav-link" href="#"><i class="fas fa-chart-line d-inline"></i>Learn</a>
                        <a class="nav-link" href="#"><i class="fas fa-exchange-alt d-inline"></i>Invest</a>
                        <a class="nav-link" href="#"><i class="fas fa-project-diagram d-inline"></i>Save</a>
                        <a class="nav-link" href="#"><i class="far fa-clone d-inline"></i>Acquire</a>
                    </nav>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-12 goal-bar d-flex align-items-center justify-content-between">
                        <button class="btn active btn-add-goal"><i class="fas fa-plus"></i> Add a Goal</button>
                        <div class="btn-group goal-tabs" role="group">
                            <button type="button" class="btn btn-default btn-tab active" data-rel="#my-goals-panel">My goals</button>
                            <button type="button" class="btn btn-default btn-tab" data-rel="#squad-goals-panel">Squad goals</button>
                        </div>
                        <div class="search-form d-block" role="search">
                            <div class="input-group add-on">
                                <div class="input-group-btn">
                                <button class="btn btn-default" type="submit"><i class="fas fa-search"></i></button>
                                </div>
                                <input class="form-control" placeholder="Search for a goal" name="srch-term" id="srch-term" type="text">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-12 goal-panel">
                        <div class="panel-content" id="my-goals-panel">
                            <div class="row">
                                <div class="col-md-6 col-lg-4 card-column d-flex justify-content-center">
                                    <div class="card">
                                        <div class="card-header bg-transparent">
                                            Save for an Emergency
                                            <p class="progress-status d-inline-block">$200/$2500</p>
                                            <a href="#" class="more-menu float-right"><i class="fas fa-ellipsis-h"></i></a>
                                        </div>
                                        <div class="card-body d-flex align-items-center">
                                            <a href="#" class="mx-auto"><img src="images/cards/Card%20-1.png"></a>
                                        </div>
                                        <div class="card-footer bg-transparent">
                                            <span class="dot status-dot on-track"></span>On Track
                                            <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 80%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">40%</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 card-column d-flex justify-content-center">
                                    <div class="card">
                                        <div class="card-header bg-transparent">
                                            Invest for retirement
                                            <p class="progress-status d-inline-block">$12,150/$2,000,000</p>
                                            <a href="#" class="more-menu float-right"><i class="fas fa-ellipsis-h"></i></a>
                                        </div>
                                        <div class="card-body d-flex align-items-center">
                                            <a href="#" class="mx-auto"><img src="images/cards/Card-2.png"></a>
                                        </div>
                                        <div class="card-footer bg-transparent">
                                            <span class="dot status-dot on-track"></span>On Track
                                            <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 80%" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100">2%</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 card-column d-flex justify-content-center">
                                    <div class="card">
                                        <div class="card-header bg-transparent">
                                            Learn about Stocks
                                            <p class="progress-status d-inline-block">Lesson 1/5</p>
                                            <a href="#" class="more-menu float-right"><i class="fas fa-ellipsis-h"></i></a>
                                        </div>
                                        <div class="card-body d-flex align-items-center">
                                            <a href="#" class="mx-auto"><img class="mx-auto d-block" src="images/cards/Card-3.png"></a>
                                        </div>
                                        <div class="card-footer bg-transparent">
                                            <span class="dot status-dot on-track"></span>On Track
                                            <div class="progress">
                                                <div class="progress-bar bg-warning" role="progressbar" style="width: 80%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">20%</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 card-column d-flex justify-content-center">
                                    <div class="card">
                                        <div class="card-header bg-transparent">
                                            Save for my wedding
                                            <p class="progress-status d-inline-block">$20/$25,000</p>
                                            <a href="#" class="more-menu float-right"><i class="fas fa-ellipsis-h"></i></a>
                                        </div>
                                        <div class="card-body d-flex align-items-center">
                                            <a href="#" class="mx-auto"><img src="images/cards/Card-4.png"></a>
                                        </div>
                                        <div class="card-footer bg-transparent">
                                            <span class="dot status-dot of-track"></span>Of Track
                                            <div class="progress">
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 80%" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100">5%</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 card-column d-flex justify-content-center">
                                    <div class="card">
                                        <div class="card-header bg-transparent">
                                            Learn about Credit
                                            <p class="progress-status d-inline-block">Lesson 4/5</p>
                                            <a href="#" class="more-menu float-right"><i class="fas fa-ellipsis-h"></i></a>
                                        </div>
                                        <div class="card-body d-flex align-items-center">
                                            <a href="#" class="mx-auto"><img src="images/cards/Card-5.png"></a>
                                        </div>
                                        <div class="card-footer bg-transparent">
                                            <span class="dot status-dot on-track"></span>On Track
                                            <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 80%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90%</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 card-column d-flex justify-content-center">
                                    <div class="card">
                                        <div class="card-header bg-transparent">
                                            Acquire a credit card
                                            <p class="progress-status d-inline-block">Application submitted</p>
                                            <a href="#" class="more-menu float-right"><i class="fas fa-ellipsis-h"></i></a>
                                        </div>
                                        <div class="card-body d-flex align-items-center">
                                            <a href="#" class="mx-auto"><img src="images/cards/Card-6.png"></a>
                                        </div>
                                        <div class="card-footer bg-transparent">
                                            <span class="dot status-dot of-track"></span>Of Track
                                            <div class="progress">
                                                <div class="progress-bar bg-warning" role="progressbar" style="width: 80%" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100">33%</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                       </div>
                        
                        <div class="panel-content" id="squad-goals-panel">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="set-a-goal d-flex">
                                        <img class="float-left" src="images/cards/Vase.png">
                                        <div class="goal-info">
                                            <h5>Trip to London</h5>
                                            <h6>John</h6>
                                        </div>
                                        <button class="mx-auto"><i class="fas fa-plus"></i></button>
                                    </div>
                                    <div class="set-a-goal d-flex">
                                        <img class="float-left" src="images/cards/Vase.png">
                                        <div class="goal-info">
                                            <h5>Trip to London</h5>
                                            <h6>John</h6>
                                        </div>
                                        <button class="mx-auto"><i class="fas fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card">
                                        <div class="card-header bg-transparent">
                                            Learn about Credit
                                            <p class="progress-status d-inline-block">Lesson 4/5</p>
                                            <a href="#" class="more-menu float-right"><i class="fas fa-ellipsis-h"></i></a>
                                        </div>
                                        <div class="card-body d-flex align-items-center">
                                            <a href="#" class="mx-auto"><img src="images/cards/Card-5.png"></a>
                                        </div>
                                        <div class="card-footer bg-transparent">
                                            <span class="dot status-dot on-track"></span>On Track
                                            <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 80%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90%</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header bg-transparent">
                                            Acquire a credit card
                                            <p class="progress-status d-inline-block">Application submitted</p>
                                            <a href="#" class="more-menu float-right"><i class="fas fa-ellipsis-h"></i></a>
                                        </div>
                                        <div class="card-body d-flex align-items-center">
                                            <a href="#" class="mx-auto"><img src="images/cards/Card-6.png"></a>
                                        </div>
                                        <div class="card-footer bg-transparent">
                                            <span class="dot status-dot of-track"></span>Of Track
                                            <div class="progress">
                                                <div class="progress-bar bg-warning" role="progressbar" style="width: 80%" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100">33%</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    
                    </div>
                    
                </div>
           </div>
               
        </div>
        
    </div>
    
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script
    src="https://code.jquery.com/jquery-1.11.0.min.js"
    integrity="sha256-spTpc4lvj4dOkKjrGokIrHkJgNA0xMS98Pw9N7ir9oI="
    crossorigin="anonymous"></script>
    
    <script src="public/tabs.js"></script>
    
  </body>
</html>