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
$t0004_jurnal_view = new t0004_jurnal_view();

// Run the page
$t0004_jurnal_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0004_jurnal_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t0004_jurnal->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var ft0004_jurnalview = currentForm = new ew.Form("ft0004_jurnalview", "view");

// Form_CustomValidate event
ft0004_jurnalview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0004_jurnalview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$t0004_jurnal->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t0004_jurnal_view->ExportOptions->render("body") ?>
<?php $t0004_jurnal_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t0004_jurnal_view->showPageHeader(); ?>
<?php
$t0004_jurnal_view->showMessage();
?>
<form name="ft0004_jurnalview" id="ft0004_jurnalview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0004_jurnal_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0004_jurnal_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0004_jurnal">
<input type="hidden" name="modal" value="<?php echo (int)$t0004_jurnal_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t0004_jurnal->ID->Visible) { // ID ?>
	<tr id="r_ID">
		<td class="<?php echo $t0004_jurnal_view->TableLeftColumnClass ?>"><span id="elh_t0004_jurnal_ID"><?php echo $t0004_jurnal->ID->caption() ?></span></td>
		<td data-name="ID"<?php echo $t0004_jurnal->ID->cellAttributes() ?>>
<span id="el_t0004_jurnal_ID">
<span<?php echo $t0004_jurnal->ID->viewAttributes() ?>>
<?php echo $t0004_jurnal->ID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t0004_jurnal->Tipe->Visible) { // Tipe ?>
	<tr id="r_Tipe">
		<td class="<?php echo $t0004_jurnal_view->TableLeftColumnClass ?>"><span id="elh_t0004_jurnal_Tipe"><?php echo $t0004_jurnal->Tipe->caption() ?></span></td>
		<td data-name="Tipe"<?php echo $t0004_jurnal->Tipe->cellAttributes() ?>>
<span id="el_t0004_jurnal_Tipe">
<span<?php echo $t0004_jurnal->Tipe->viewAttributes() ?>>
<?php echo $t0004_jurnal->Tipe->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t0004_jurnal->Tanggal->Visible) { // Tanggal ?>
	<tr id="r_Tanggal">
		<td class="<?php echo $t0004_jurnal_view->TableLeftColumnClass ?>"><span id="elh_t0004_jurnal_Tanggal"><?php echo $t0004_jurnal->Tanggal->caption() ?></span></td>
		<td data-name="Tanggal"<?php echo $t0004_jurnal->Tanggal->cellAttributes() ?>>
<span id="el_t0004_jurnal_Tanggal">
<span<?php echo $t0004_jurnal->Tanggal->viewAttributes() ?>>
<?php echo $t0004_jurnal->Tanggal->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t0004_jurnal->Deskripsi->Visible) { // Deskripsi ?>
	<tr id="r_Deskripsi">
		<td class="<?php echo $t0004_jurnal_view->TableLeftColumnClass ?>"><span id="elh_t0004_jurnal_Deskripsi"><?php echo $t0004_jurnal->Deskripsi->caption() ?></span></td>
		<td data-name="Deskripsi"<?php echo $t0004_jurnal->Deskripsi->cellAttributes() ?>>
<span id="el_t0004_jurnal_Deskripsi">
<span<?php echo $t0004_jurnal->Deskripsi->viewAttributes() ?>>
<?php echo $t0004_jurnal->Deskripsi->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$t0004_jurnal_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t0004_jurnal->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t0004_jurnal_view->terminate();
?>