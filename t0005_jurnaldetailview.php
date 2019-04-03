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
$t0005_jurnaldetail_view = new t0005_jurnaldetail_view();

// Run the page
$t0005_jurnaldetail_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0005_jurnaldetail_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t0005_jurnaldetail->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var ft0005_jurnaldetailview = currentForm = new ew.Form("ft0005_jurnaldetailview", "view");

// Form_CustomValidate event
ft0005_jurnaldetailview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0005_jurnaldetailview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$t0005_jurnaldetail->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t0005_jurnaldetail_view->ExportOptions->render("body") ?>
<?php $t0005_jurnaldetail_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t0005_jurnaldetail_view->showPageHeader(); ?>
<?php
$t0005_jurnaldetail_view->showMessage();
?>
<form name="ft0005_jurnaldetailview" id="ft0005_jurnaldetailview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0005_jurnaldetail_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0005_jurnaldetail_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0005_jurnaldetail">
<input type="hidden" name="modal" value="<?php echo (int)$t0005_jurnaldetail_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t0005_jurnaldetail->ID->Visible) { // ID ?>
	<tr id="r_ID">
		<td class="<?php echo $t0005_jurnaldetail_view->TableLeftColumnClass ?>"><span id="elh_t0005_jurnaldetail_ID"><?php echo $t0005_jurnaldetail->ID->caption() ?></span></td>
		<td data-name="ID"<?php echo $t0005_jurnaldetail->ID->cellAttributes() ?>>
<span id="el_t0005_jurnaldetail_ID">
<span<?php echo $t0005_jurnaldetail->ID->viewAttributes() ?>>
<?php echo $t0005_jurnaldetail->ID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t0005_jurnaldetail->JurnalID->Visible) { // JurnalID ?>
	<tr id="r_JurnalID">
		<td class="<?php echo $t0005_jurnaldetail_view->TableLeftColumnClass ?>"><span id="elh_t0005_jurnaldetail_JurnalID"><?php echo $t0005_jurnaldetail->JurnalID->caption() ?></span></td>
		<td data-name="JurnalID"<?php echo $t0005_jurnaldetail->JurnalID->cellAttributes() ?>>
<span id="el_t0005_jurnaldetail_JurnalID">
<span<?php echo $t0005_jurnaldetail->JurnalID->viewAttributes() ?>>
<?php echo $t0005_jurnaldetail->JurnalID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t0005_jurnaldetail->Item->Visible) { // Item ?>
	<tr id="r_Item">
		<td class="<?php echo $t0005_jurnaldetail_view->TableLeftColumnClass ?>"><span id="elh_t0005_jurnaldetail_Item"><?php echo $t0005_jurnaldetail->Item->caption() ?></span></td>
		<td data-name="Item"<?php echo $t0005_jurnaldetail->Item->cellAttributes() ?>>
<span id="el_t0005_jurnaldetail_Item">
<span<?php echo $t0005_jurnaldetail->Item->viewAttributes() ?>>
<?php echo $t0005_jurnaldetail->Item->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t0005_jurnaldetail->AkunID->Visible) { // AkunID ?>
	<tr id="r_AkunID">
		<td class="<?php echo $t0005_jurnaldetail_view->TableLeftColumnClass ?>"><span id="elh_t0005_jurnaldetail_AkunID"><?php echo $t0005_jurnaldetail->AkunID->caption() ?></span></td>
		<td data-name="AkunID"<?php echo $t0005_jurnaldetail->AkunID->cellAttributes() ?>>
<span id="el_t0005_jurnaldetail_AkunID">
<span<?php echo $t0005_jurnaldetail->AkunID->viewAttributes() ?>>
<?php echo $t0005_jurnaldetail->AkunID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t0005_jurnaldetail->DebitKredit->Visible) { // DebitKredit ?>
	<tr id="r_DebitKredit">
		<td class="<?php echo $t0005_jurnaldetail_view->TableLeftColumnClass ?>"><span id="elh_t0005_jurnaldetail_DebitKredit"><?php echo $t0005_jurnaldetail->DebitKredit->caption() ?></span></td>
		<td data-name="DebitKredit"<?php echo $t0005_jurnaldetail->DebitKredit->cellAttributes() ?>>
<span id="el_t0005_jurnaldetail_DebitKredit">
<span<?php echo $t0005_jurnaldetail->DebitKredit->viewAttributes() ?>>
<?php echo $t0005_jurnaldetail->DebitKredit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t0005_jurnaldetail->Nilai->Visible) { // Nilai ?>
	<tr id="r_Nilai">
		<td class="<?php echo $t0005_jurnaldetail_view->TableLeftColumnClass ?>"><span id="elh_t0005_jurnaldetail_Nilai"><?php echo $t0005_jurnaldetail->Nilai->caption() ?></span></td>
		<td data-name="Nilai"<?php echo $t0005_jurnaldetail->Nilai->cellAttributes() ?>>
<span id="el_t0005_jurnaldetail_Nilai">
<span<?php echo $t0005_jurnaldetail->Nilai->viewAttributes() ?>>
<?php echo $t0005_jurnaldetail->Nilai->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$t0005_jurnaldetail_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t0005_jurnaldetail->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t0005_jurnaldetail_view->terminate();
?>