<?php
namespace PHPMaker2019\acc_prj;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start(); 

// Autoload
include_once "autoload.php";
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$t0006_tipejurnal_view = new t0006_tipejurnal_view();

// Run the page
$t0006_tipejurnal_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0006_tipejurnal_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t0006_tipejurnal->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var ft0006_tipejurnalview = currentForm = new ew.Form("ft0006_tipejurnalview", "view");

// Form_CustomValidate event
ft0006_tipejurnalview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0006_tipejurnalview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$t0006_tipejurnal->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t0006_tipejurnal_view->ExportOptions->render("body") ?>
<?php $t0006_tipejurnal_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t0006_tipejurnal_view->showPageHeader(); ?>
<?php
$t0006_tipejurnal_view->showMessage();
?>
<form name="ft0006_tipejurnalview" id="ft0006_tipejurnalview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0006_tipejurnal_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0006_tipejurnal_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0006_tipejurnal">
<input type="hidden" name="modal" value="<?php echo (int)$t0006_tipejurnal_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t0006_tipejurnal->ID->Visible) { // ID ?>
	<tr id="r_ID">
		<td class="<?php echo $t0006_tipejurnal_view->TableLeftColumnClass ?>"><span id="elh_t0006_tipejurnal_ID"><?php echo $t0006_tipejurnal->ID->caption() ?></span></td>
		<td data-name="ID"<?php echo $t0006_tipejurnal->ID->cellAttributes() ?>>
<span id="el_t0006_tipejurnal_ID">
<span<?php echo $t0006_tipejurnal->ID->viewAttributes() ?>>
<?php echo $t0006_tipejurnal->ID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t0006_tipejurnal->Nama->Visible) { // Nama ?>
	<tr id="r_Nama">
		<td class="<?php echo $t0006_tipejurnal_view->TableLeftColumnClass ?>"><span id="elh_t0006_tipejurnal_Nama"><?php echo $t0006_tipejurnal->Nama->caption() ?></span></td>
		<td data-name="Nama"<?php echo $t0006_tipejurnal->Nama->cellAttributes() ?>>
<span id="el_t0006_tipejurnal_Nama">
<span<?php echo $t0006_tipejurnal->Nama->viewAttributes() ?>>
<?php echo $t0006_tipejurnal->Nama->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$t0006_tipejurnal_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t0006_tipejurnal->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t0006_tipejurnal_view->terminate();
?>