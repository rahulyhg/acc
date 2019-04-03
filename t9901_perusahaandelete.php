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
$t9901_perusahaan_delete = new t9901_perusahaan_delete();

// Run the page
$t9901_perusahaan_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t9901_perusahaan_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var ft9901_perusahaandelete = currentForm = new ew.Form("ft9901_perusahaandelete", "delete");

// Form_CustomValidate event
ft9901_perusahaandelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft9901_perusahaandelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t9901_perusahaan_delete->showPageHeader(); ?>
<?php
$t9901_perusahaan_delete->showMessage();
?>
<form name="ft9901_perusahaandelete" id="ft9901_perusahaandelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t9901_perusahaan_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t9901_perusahaan_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t9901_perusahaan">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t9901_perusahaan_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t9901_perusahaan->Nama->Visible) { // Nama ?>
		<th class="<?php echo $t9901_perusahaan->Nama->headerCellClass() ?>"><span id="elh_t9901_perusahaan_Nama" class="t9901_perusahaan_Nama"><?php echo $t9901_perusahaan->Nama->caption() ?></span></th>
<?php } ?>
<?php if ($t9901_perusahaan->Alamat->Visible) { // Alamat ?>
		<th class="<?php echo $t9901_perusahaan->Alamat->headerCellClass() ?>"><span id="elh_t9901_perusahaan_Alamat" class="t9901_perusahaan_Alamat"><?php echo $t9901_perusahaan->Alamat->caption() ?></span></th>
<?php } ?>
<?php if ($t9901_perusahaan->_Email->Visible) { // Email ?>
		<th class="<?php echo $t9901_perusahaan->_Email->headerCellClass() ?>"><span id="elh_t9901_perusahaan__Email" class="t9901_perusahaan__Email"><?php echo $t9901_perusahaan->_Email->caption() ?></span></th>
<?php } ?>
<?php if ($t9901_perusahaan->NoTelepon->Visible) { // NoTelepon ?>
		<th class="<?php echo $t9901_perusahaan->NoTelepon->headerCellClass() ?>"><span id="elh_t9901_perusahaan_NoTelepon" class="t9901_perusahaan_NoTelepon"><?php echo $t9901_perusahaan->NoTelepon->caption() ?></span></th>
<?php } ?>
<?php if ($t9901_perusahaan->NoHandphone->Visible) { // NoHandphone ?>
		<th class="<?php echo $t9901_perusahaan->NoHandphone->headerCellClass() ?>"><span id="elh_t9901_perusahaan_NoHandphone" class="t9901_perusahaan_NoHandphone"><?php echo $t9901_perusahaan->NoHandphone->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t9901_perusahaan_delete->RecCnt = 0;
$i = 0;
while (!$t9901_perusahaan_delete->Recordset->EOF) {
	$t9901_perusahaan_delete->RecCnt++;
	$t9901_perusahaan_delete->RowCnt++;

	// Set row properties
	$t9901_perusahaan->resetAttributes();
	$t9901_perusahaan->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t9901_perusahaan_delete->loadRowValues($t9901_perusahaan_delete->Recordset);

	// Render row
	$t9901_perusahaan_delete->renderRow();
?>
	<tr<?php echo $t9901_perusahaan->rowAttributes() ?>>
<?php if ($t9901_perusahaan->Nama->Visible) { // Nama ?>
		<td<?php echo $t9901_perusahaan->Nama->cellAttributes() ?>>
<span id="el<?php echo $t9901_perusahaan_delete->RowCnt ?>_t9901_perusahaan_Nama" class="t9901_perusahaan_Nama">
<span<?php echo $t9901_perusahaan->Nama->viewAttributes() ?>>
<?php echo $t9901_perusahaan->Nama->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t9901_perusahaan->Alamat->Visible) { // Alamat ?>
		<td<?php echo $t9901_perusahaan->Alamat->cellAttributes() ?>>
<span id="el<?php echo $t9901_perusahaan_delete->RowCnt ?>_t9901_perusahaan_Alamat" class="t9901_perusahaan_Alamat">
<span<?php echo $t9901_perusahaan->Alamat->viewAttributes() ?>>
<?php echo $t9901_perusahaan->Alamat->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t9901_perusahaan->_Email->Visible) { // Email ?>
		<td<?php echo $t9901_perusahaan->_Email->cellAttributes() ?>>
<span id="el<?php echo $t9901_perusahaan_delete->RowCnt ?>_t9901_perusahaan__Email" class="t9901_perusahaan__Email">
<span<?php echo $t9901_perusahaan->_Email->viewAttributes() ?>>
<?php echo $t9901_perusahaan->_Email->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t9901_perusahaan->NoTelepon->Visible) { // NoTelepon ?>
		<td<?php echo $t9901_perusahaan->NoTelepon->cellAttributes() ?>>
<span id="el<?php echo $t9901_perusahaan_delete->RowCnt ?>_t9901_perusahaan_NoTelepon" class="t9901_perusahaan_NoTelepon">
<span<?php echo $t9901_perusahaan->NoTelepon->viewAttributes() ?>>
<?php echo $t9901_perusahaan->NoTelepon->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t9901_perusahaan->NoHandphone->Visible) { // NoHandphone ?>
		<td<?php echo $t9901_perusahaan->NoHandphone->cellAttributes() ?>>
<span id="el<?php echo $t9901_perusahaan_delete->RowCnt ?>_t9901_perusahaan_NoHandphone" class="t9901_perusahaan_NoHandphone">
<span<?php echo $t9901_perusahaan->NoHandphone->viewAttributes() ?>>
<?php echo $t9901_perusahaan->NoHandphone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t9901_perusahaan_delete->Recordset->moveNext();
}
$t9901_perusahaan_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t9901_perusahaan_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t9901_perusahaan_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t9901_perusahaan_delete->terminate();
?>