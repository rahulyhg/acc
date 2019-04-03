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
$t9901_perusahaan_view = new t9901_perusahaan_view();

// Run the page
$t9901_perusahaan_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t9901_perusahaan_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t9901_perusahaan->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var ft9901_perusahaanview = currentForm = new ew.Form("ft9901_perusahaanview", "view");

// Form_CustomValidate event
ft9901_perusahaanview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft9901_perusahaanview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$t9901_perusahaan->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t9901_perusahaan_view->ExportOptions->render("body") ?>
<?php $t9901_perusahaan_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t9901_perusahaan_view->showPageHeader(); ?>
<?php
$t9901_perusahaan_view->showMessage();
?>
<form name="ft9901_perusahaanview" id="ft9901_perusahaanview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t9901_perusahaan_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t9901_perusahaan_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t9901_perusahaan">
<input type="hidden" name="modal" value="<?php echo (int)$t9901_perusahaan_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t9901_perusahaan->Nama->Visible) { // Nama ?>
	<tr id="r_Nama">
		<td class="<?php echo $t9901_perusahaan_view->TableLeftColumnClass ?>"><span id="elh_t9901_perusahaan_Nama"><?php echo $t9901_perusahaan->Nama->caption() ?></span></td>
		<td data-name="Nama"<?php echo $t9901_perusahaan->Nama->cellAttributes() ?>>
<span id="el_t9901_perusahaan_Nama">
<span<?php echo $t9901_perusahaan->Nama->viewAttributes() ?>>
<?php echo $t9901_perusahaan->Nama->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t9901_perusahaan->Alamat->Visible) { // Alamat ?>
	<tr id="r_Alamat">
		<td class="<?php echo $t9901_perusahaan_view->TableLeftColumnClass ?>"><span id="elh_t9901_perusahaan_Alamat"><?php echo $t9901_perusahaan->Alamat->caption() ?></span></td>
		<td data-name="Alamat"<?php echo $t9901_perusahaan->Alamat->cellAttributes() ?>>
<span id="el_t9901_perusahaan_Alamat">
<span<?php echo $t9901_perusahaan->Alamat->viewAttributes() ?>>
<?php echo $t9901_perusahaan->Alamat->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t9901_perusahaan->_Email->Visible) { // Email ?>
	<tr id="r__Email">
		<td class="<?php echo $t9901_perusahaan_view->TableLeftColumnClass ?>"><span id="elh_t9901_perusahaan__Email"><?php echo $t9901_perusahaan->_Email->caption() ?></span></td>
		<td data-name="_Email"<?php echo $t9901_perusahaan->_Email->cellAttributes() ?>>
<span id="el_t9901_perusahaan__Email">
<span<?php echo $t9901_perusahaan->_Email->viewAttributes() ?>>
<?php echo $t9901_perusahaan->_Email->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t9901_perusahaan->NoTelepon->Visible) { // NoTelepon ?>
	<tr id="r_NoTelepon">
		<td class="<?php echo $t9901_perusahaan_view->TableLeftColumnClass ?>"><span id="elh_t9901_perusahaan_NoTelepon"><?php echo $t9901_perusahaan->NoTelepon->caption() ?></span></td>
		<td data-name="NoTelepon"<?php echo $t9901_perusahaan->NoTelepon->cellAttributes() ?>>
<span id="el_t9901_perusahaan_NoTelepon">
<span<?php echo $t9901_perusahaan->NoTelepon->viewAttributes() ?>>
<?php echo $t9901_perusahaan->NoTelepon->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t9901_perusahaan->NoHandphone->Visible) { // NoHandphone ?>
	<tr id="r_NoHandphone">
		<td class="<?php echo $t9901_perusahaan_view->TableLeftColumnClass ?>"><span id="elh_t9901_perusahaan_NoHandphone"><?php echo $t9901_perusahaan->NoHandphone->caption() ?></span></td>
		<td data-name="NoHandphone"<?php echo $t9901_perusahaan->NoHandphone->cellAttributes() ?>>
<span id="el_t9901_perusahaan_NoHandphone">
<span<?php echo $t9901_perusahaan->NoHandphone->viewAttributes() ?>>
<?php echo $t9901_perusahaan->NoHandphone->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$t9901_perusahaan_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t9901_perusahaan->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t9901_perusahaan_view->terminate();
?>