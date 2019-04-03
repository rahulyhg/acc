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
$t0005_jurnaldetail_delete = new t0005_jurnaldetail_delete();

// Run the page
$t0005_jurnaldetail_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0005_jurnaldetail_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var ft0005_jurnaldetaildelete = currentForm = new ew.Form("ft0005_jurnaldetaildelete", "delete");

// Form_CustomValidate event
ft0005_jurnaldetaildelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0005_jurnaldetaildelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t0005_jurnaldetail_delete->showPageHeader(); ?>
<?php
$t0005_jurnaldetail_delete->showMessage();
?>
<form name="ft0005_jurnaldetaildelete" id="ft0005_jurnaldetaildelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0005_jurnaldetail_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0005_jurnaldetail_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0005_jurnaldetail">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t0005_jurnaldetail_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t0005_jurnaldetail->ID->Visible) { // ID ?>
		<th class="<?php echo $t0005_jurnaldetail->ID->headerCellClass() ?>"><span id="elh_t0005_jurnaldetail_ID" class="t0005_jurnaldetail_ID"><?php echo $t0005_jurnaldetail->ID->caption() ?></span></th>
<?php } ?>
<?php if ($t0005_jurnaldetail->JurnalID->Visible) { // JurnalID ?>
		<th class="<?php echo $t0005_jurnaldetail->JurnalID->headerCellClass() ?>"><span id="elh_t0005_jurnaldetail_JurnalID" class="t0005_jurnaldetail_JurnalID"><?php echo $t0005_jurnaldetail->JurnalID->caption() ?></span></th>
<?php } ?>
<?php if ($t0005_jurnaldetail->Item->Visible) { // Item ?>
		<th class="<?php echo $t0005_jurnaldetail->Item->headerCellClass() ?>"><span id="elh_t0005_jurnaldetail_Item" class="t0005_jurnaldetail_Item"><?php echo $t0005_jurnaldetail->Item->caption() ?></span></th>
<?php } ?>
<?php if ($t0005_jurnaldetail->AkunID->Visible) { // AkunID ?>
		<th class="<?php echo $t0005_jurnaldetail->AkunID->headerCellClass() ?>"><span id="elh_t0005_jurnaldetail_AkunID" class="t0005_jurnaldetail_AkunID"><?php echo $t0005_jurnaldetail->AkunID->caption() ?></span></th>
<?php } ?>
<?php if ($t0005_jurnaldetail->DebitKredit->Visible) { // DebitKredit ?>
		<th class="<?php echo $t0005_jurnaldetail->DebitKredit->headerCellClass() ?>"><span id="elh_t0005_jurnaldetail_DebitKredit" class="t0005_jurnaldetail_DebitKredit"><?php echo $t0005_jurnaldetail->DebitKredit->caption() ?></span></th>
<?php } ?>
<?php if ($t0005_jurnaldetail->Nilai->Visible) { // Nilai ?>
		<th class="<?php echo $t0005_jurnaldetail->Nilai->headerCellClass() ?>"><span id="elh_t0005_jurnaldetail_Nilai" class="t0005_jurnaldetail_Nilai"><?php echo $t0005_jurnaldetail->Nilai->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t0005_jurnaldetail_delete->RecCnt = 0;
$i = 0;
while (!$t0005_jurnaldetail_delete->Recordset->EOF) {
	$t0005_jurnaldetail_delete->RecCnt++;
	$t0005_jurnaldetail_delete->RowCnt++;

	// Set row properties
	$t0005_jurnaldetail->resetAttributes();
	$t0005_jurnaldetail->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t0005_jurnaldetail_delete->loadRowValues($t0005_jurnaldetail_delete->Recordset);

	// Render row
	$t0005_jurnaldetail_delete->renderRow();
?>
	<tr<?php echo $t0005_jurnaldetail->rowAttributes() ?>>
<?php if ($t0005_jurnaldetail->ID->Visible) { // ID ?>
		<td<?php echo $t0005_jurnaldetail->ID->cellAttributes() ?>>
<span id="el<?php echo $t0005_jurnaldetail_delete->RowCnt ?>_t0005_jurnaldetail_ID" class="t0005_jurnaldetail_ID">
<span<?php echo $t0005_jurnaldetail->ID->viewAttributes() ?>>
<?php echo $t0005_jurnaldetail->ID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t0005_jurnaldetail->JurnalID->Visible) { // JurnalID ?>
		<td<?php echo $t0005_jurnaldetail->JurnalID->cellAttributes() ?>>
<span id="el<?php echo $t0005_jurnaldetail_delete->RowCnt ?>_t0005_jurnaldetail_JurnalID" class="t0005_jurnaldetail_JurnalID">
<span<?php echo $t0005_jurnaldetail->JurnalID->viewAttributes() ?>>
<?php echo $t0005_jurnaldetail->JurnalID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t0005_jurnaldetail->Item->Visible) { // Item ?>
		<td<?php echo $t0005_jurnaldetail->Item->cellAttributes() ?>>
<span id="el<?php echo $t0005_jurnaldetail_delete->RowCnt ?>_t0005_jurnaldetail_Item" class="t0005_jurnaldetail_Item">
<span<?php echo $t0005_jurnaldetail->Item->viewAttributes() ?>>
<?php echo $t0005_jurnaldetail->Item->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t0005_jurnaldetail->AkunID->Visible) { // AkunID ?>
		<td<?php echo $t0005_jurnaldetail->AkunID->cellAttributes() ?>>
<span id="el<?php echo $t0005_jurnaldetail_delete->RowCnt ?>_t0005_jurnaldetail_AkunID" class="t0005_jurnaldetail_AkunID">
<span<?php echo $t0005_jurnaldetail->AkunID->viewAttributes() ?>>
<?php echo $t0005_jurnaldetail->AkunID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t0005_jurnaldetail->DebitKredit->Visible) { // DebitKredit ?>
		<td<?php echo $t0005_jurnaldetail->DebitKredit->cellAttributes() ?>>
<span id="el<?php echo $t0005_jurnaldetail_delete->RowCnt ?>_t0005_jurnaldetail_DebitKredit" class="t0005_jurnaldetail_DebitKredit">
<span<?php echo $t0005_jurnaldetail->DebitKredit->viewAttributes() ?>>
<?php echo $t0005_jurnaldetail->DebitKredit->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t0005_jurnaldetail->Nilai->Visible) { // Nilai ?>
		<td<?php echo $t0005_jurnaldetail->Nilai->cellAttributes() ?>>
<span id="el<?php echo $t0005_jurnaldetail_delete->RowCnt ?>_t0005_jurnaldetail_Nilai" class="t0005_jurnaldetail_Nilai">
<span<?php echo $t0005_jurnaldetail->Nilai->viewAttributes() ?>>
<?php echo $t0005_jurnaldetail->Nilai->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t0005_jurnaldetail_delete->Recordset->moveNext();
}
$t0005_jurnaldetail_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t0005_jurnaldetail_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t0005_jurnaldetail_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t0005_jurnaldetail_delete->terminate();
?>