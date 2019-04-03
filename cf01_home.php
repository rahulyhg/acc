<?php
namespace PHPMaker2019\acc_prj;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start(); 
?>
<?php include_once "autoload.php" ?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$cf01_home = new cf01_home();

// Run the page
$cf01_home->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();
?>
<?php include_once "header.php" ?>
<!-- log -->
<!--
<div class="panel panel-default">
	<div class="panel-heading"><strong><a class='collapsed' data-toggle="collapse" href="#log">Progress Log</a></strong></div>
	<div id="log" class="panel-collapse collapse out">
		<div class="panel-body">
			<div>
<pre><?php $lines=file('01_log.txt');foreach ($lines as $line_num => $line){echo $line;}?></pre>
			</div>
		</div>
	</div>
</div>
-->

<!--<div class="card">
	<div class="card-heading">Progress Log.</div>
	<div class="card-body">
		<div>
		<pre><?php $lines=file('01_log.txt');foreach ($lines as $line_num => $line){echo $line;}?></pre>
		</div>
	</div>
 </div>-->

<!--<div class="card">
	<div class="card-header"><h3 class="card-title">Progress Log.</h3></div>
	<div class="card-body">
		<div>
			<pre><?php $lines=file('01_log.txt');foreach ($lines as $line_num => $line){echo $line;}?></pre>
		</div>
	</div>
</div>-->

<!--<p><a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Progress Log.</a></p>
<div class="collapse" id="collapseExample">
	<div class="card card-body">
		<pre><?php $lines=file('01_log.txt');foreach ($lines as $line_num => $line){echo $line;}?></pre>
	</div>
</div>-->

<div id="accordion">
	<div class="card">
		<div class="card-header" id="headingTwo">
			<h5 class="mb-0">
				<!--<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
					Progress Log.
				</button>-->
				<a role="button" data-toggle="collapse" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
					Progress Log.
				</a>
			</h5>
		</div>
		<div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
			<div class="card-body">
				<pre><?php $lines=file('01_log.txt');foreach ($lines as $line_num => $line){echo $line;}?></pre>
			</div>
		</div>
	</div>
</div>

<style>
.mb-0 > a {
  display: block;
  position: relative;
}
.mb-0 > a:after {
  content: "\f078"; /* fa-chevron-down */
  font-family: 'FontAwesome';
  position: absolute;
  right: 0;
}
.mb-0 > a[aria-expanded="true"]:after {
  content: "\f077"; /* fa-chevron-up */
}
</style>
<?php if (DEBUG_ENABLED) echo GetDebugMessage(); ?>
<?php include_once "footer.php" ?>
<?php
$cf01_home->terminate();
?>