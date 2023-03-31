<?php if($_SESSION['login'])
{?>
<div class="top-header">
	<div class="container">
		<ul class="tp-hd-lft wow fadeInLeft animated" data-wow-delay=".1s">
			<li class="hm"><a href="index.html"><i class="fa fa-home"></i></a></li>
			<li class="prnt"><a href="profile.php">My Profile</a></li>
				<li class="prnt"><a href="change-password.php">Change Password</a></li>
			<li class="prnt"><a href="tour-history.php">My Tour History</a></li>
			<li class="prnt"><a href="issuetickets.php">Issue Tickets</a></li>
			<li><a href="points.php">My Safari Points</a></li>
		</ul>
		<ul class="tp-hd-rgt wow fadeInRight animated" data-wow-delay=".1s"> 
			<li class="tol">Welcome :</li>				
			<li class="sig"><?php echo htmlentities($_SESSION['login']);?></li> 
			<li class="sigi"><a href="logout.php" >/ Logout</a></li>
        </ul>
		<div class="clearfix"></div>
	</div>
</div><?php } else {?>
<div class="top-header">
	<div class="container">
		<ul class="tp-hd-lft wow fadeInLeft animated" data-wow-delay=".1s">
			<li class="hm"><a href="index.php"><i class="fa fa-home"></i></a></li>
				<li class="hm"><a href="admin/index.php">ADMIN LOGIN</a></li>
		</ul>
		<ul class="tp-hd-rgt wow fadeInRight animated" data-wow-delay=".1s"> 
			<li class="tol">Toll Number : +254 70101 8835</li>				
			<li class="sig"><a href="#" data-toggle="modal" data-target="#myModal" >CREATE AN ACCOUNT</a></li> 
			<li class="sigi"><a href="#" data-toggle="modal" data-target="#myModal4" >| LOGIN</a></li>
        </ul>
		<div class="clearfix"></div>
	</div>
</div>
<?php }?>
<!--- /top-header ---->
<!--- header ---->
<div class="header">
	<div class="container">
		<div class="logo wow fadeInDown animated" data-wow-delay=".1s">
			<a href="index.php">iSAFARI TOUR COMPANY</a>	
		</div>
	
		<div class="lock fadeInDown animated" data-wow-delay=".1s"> 
			<li><img src="images/iSAFARI.png" height="60" width="60"alt="iSAFAI"></li>
            <li><div class="securetxt">THE GREATEST OF ALL </div></li>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!--- /header ---->
<!--- footer-btm ---->
<div class="footer-btm wow fadeInLeft animated" data-wow-delay=".1s">
	<div class="container">
	<div class="navigation">
			<nav class="navbar navbar-default">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
					<nav class="cl-effect-1">
						<ul class="nav navbar-nav">
							<li><a href="index.php">HOME</a></li>
							<li><a href="page.php?type=aboutus">ABOUT</a></li>
								<li><a href="package-list.php">TOUR DESTINATIONS</a></li>
								<li><a href="chatbot">CHATROOM</a></li>
								<li><a href="virtualtour.php">VIRTUAL TOURS</a></li>
								
								<li><a href="feedbackhub.php">CUSTOMER FEEDBACK FORM</a></li>
								<?php if($_SESSION['login'])
{?>
								<!--<li>Need Help?<a href="write-us.php" data-toggle="modal" data-target="#myModal3"> / Write Us </a>  </li>-->
								<?php } else { ?>
								<li><a href="enquiry.php"> ENQUIRY </a>  </li>
								<?php } ?>
								<div class="clearfix"></div>

						</ul>
					</nav>
				</div><!-- /.navbar-collapse -->	
			</nav>
		</div>
		
		<div class="clearfix"></div>
	</div>
</div>