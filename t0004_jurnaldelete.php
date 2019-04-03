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
$t0004_jurnal_delete = new t0004_jurnal_delete();

// Run the page
$t0004_jurnal_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0004_jurnal_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var ft0004_jurnaldelete = currentForm = new ew.Form("ft0004_jurnaldelete", "delete");

// Form_CustomValidate event
ft0004_jurnaldelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0004_jurnaldelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t0004_jurnal_delete->showPageHeader(); ?>
<?php
$t0004_jurnal_delete->showMessage();
?>
<form name="ft0004_jurnaldelete" id="ft0004_jurnaldelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0004_jurnal_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0004_jurnal_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0004_jurnal">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t0004_jurnal_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t0004_jurnal->ID->Visible) { // ID ?>
		<th class="<?php echo $t0004_jurnal->ID->headerCellClass() ?>"><span id="elh_t0004_jurnal_ID" class="t0004_jurnal_ID"><?php echo $t0004_jurnal->ID->caption() ?></span></th>
<?php } ?>
<?php if ($t0004_jurnal->Tipe->Visible) { // Tipe ?>
		<th class="<?php echo $t0004_jurnal->Tipe->headerCellClass() ?>"><span id="elh_t0004_jurnal_Tipe" class="t0004_jurnal_Tipe"><?php echo $t0004_jurnal->Tipe->caption() ?></span></th>
<?php } ?>
<?php if ($t0004_jurnal->Tanggal->Visible) { // Tanggal ?>
		<th class="<?php echo $t0004_jurnal->Tanggal->headerCellClass() ?>"><span id="elh_t0004_jurnal_Tanggal" class="t0004_jurnal_Tanggal"><?php echo $t0004_jurnal->Tanggal->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t0004_jurnal_delete->RecCnt = 0;
$i = 0;
while (!$t0004_jurnal_delete->Recordset->EOF) {
	$t0004_jurnal_delete->RecCnt++;
	$t0004_jurnal_delete->RowCnt++;

	// Set row properties
	$t0004_jurnal->resetAttributes();
	$t0004_jurnal->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t0004_jurnal_delete->loadRowValues($t0004_jurnal_delete->Recordset);

	// Render row
	$t0004_jurnal_delete->renderRow();
?>
	<tr<?php echo $t0004_jurnal->rowAttributes() ?>>
<?php if ($t0004_jurnal->ID->Visible) { // ID ?>
		<td<?php echo $t0004_jurnal->ID->cellAttributes() ?>>
<span id="el<?php echo $t0004_jurnal_delete->RowCnt ?>_t0004_jurnal_ID" class="t0004_jurnal_ID">
<span<?php echo $t0004_jurnal->ID->viewAttributes() ?>>
<?php echo $t0004_jurnal->ID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t0004_jurnal->Tipe->Visible) { // Tipe ?>
		<td<?php echo $t0004_jurnal->Tipe->cellAttributes() ?>>
<span id="el<?php echo $t0004_jurnal_delete->RowCnt ?>_t0004_jurnal_Tipe" class="t0004_jurnal_Tipe">
<span<?php echo $t0004_jurnal->Tipe->viewAttributes() ?>>
<?php echo $t0004_jurnal->Tipe->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t0004_jurnal->Tanggal->Visible) { // Tanggal ?>
		<td<?php echo $t0004_jurnal->Tanggal->cellAttributes() ?>>
<span id="el<?php echo $t0004_jurnal_delete->RowCnt ?>_t0004_jurnal_Tanggal" class="t0004_jurnal_Tanggal">
<span<?php echo $t0004_jurnal->Tanggal->viewAttributes() ?>>
<?php echo $t0004_jurnal->Tanggal->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t0004_jurnal_delete->Recordset->moveNext();
}
$t0004_jurnal_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t0004_jurnal_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t0004_jurnal_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t0004_jurnal_delete->terminate();
?>