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
$t0002_subklasakun_delete = new t0002_subklasakun_delete();

// Run the page
$t0002_subklasakun_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0002_subklasakun_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var ft0002_subklasakundelete = currentForm = new ew.Form("ft0002_subklasakundelete", "delete");

// Form_CustomValidate event
ft0002_subklasakundelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0002_subklasakundelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t0002_subklasakun_delete->showPageHeader(); ?>
<?php
$t0002_subklasakun_delete->showMessage();
?>
<form name="ft0002_subklasakundelete" id="ft0002_subklasakundelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0002_subklasakun_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0002_subklasakun_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0002_subklasakun">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t0002_subklasakun_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t0002_subklasakun->Kode->Visible) { // Kode ?>
		<th class="<?php echo $t0002_subklasakun->Kode->headerCellClass() ?>"><span id="elh_t0002_subklasakun_Kode" class="t0002_subklasakun_Kode"><?php echo $t0002_subklasakun->Kode->caption() ?></span></th>
<?php } ?>
<?php if ($t0002_subklasakun->Kelompok->Visible) { // Kelompok ?>
		<th class="<?php echo $t0002_subklasakun->Kelompok->headerCellClass() ?>"><span id="elh_t0002_subklasakun_Kelompok" class="t0002_subklasakun_Kelompok"><?php echo $t0002_subklasakun->Kelompok->caption() ?></span></th>
<?php } ?>
<?php if ($t0002_subklasakun->Nama->Visible) { // Nama ?>
		<th class="<?php echo $t0002_subklasakun->Nama->headerCellClass() ?>"><span id="elh_t0002_subklasakun_Nama" class="t0002_subklasakun_Nama"><?php echo $t0002_subklasakun->Nama->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t0002_subklasakun_delete->RecCnt = 0;
$i = 0;
while (!$t0002_subklasakun_delete->Recordset->EOF) {
	$t0002_subklasakun_delete->RecCnt++;
	$t0002_subklasakun_delete->RowCnt++;

	// Set row properties
	$t0002_subklasakun->resetAttributes();
	$t0002_subklasakun->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t0002_subklasakun_delete->loadRowValues($t0002_subklasakun_delete->Recordset);

	// Render row
	$t0002_subklasakun_delete->renderRow();
?>
	<tr<?php echo $t0002_subklasakun->rowAttributes() ?>>
<?php if ($t0002_subklasakun->Kode->Visible) { // Kode ?>
		<td<?php echo $t0002_subklasakun->Kode->cellAttributes() ?>>
<span id="el<?php echo $t0002_subklasakun_delete->RowCnt ?>_t0002_subklasakun_Kode" class="t0002_subklasakun_Kode">
<span<?php echo $t0002_subklasakun->Kode->viewAttributes() ?>>
<?php echo $t0002_subklasakun->Kode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t0002_subklasakun->Kelompok->Visible) { // Kelompok ?>
		<td<?php echo $t0002_subklasakun->Kelompok->cellAttributes() ?>>
<span id="el<?php echo $t0002_subklasakun_delete->RowCnt ?>_t0002_subklasakun_Kelompok" class="t0002_subklasakun_Kelompok">
<span<?php echo $t0002_subklasakun->Kelompok->viewAttributes() ?>>
<?php echo $t0002_subklasakun->Kelompok->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t0002_subklasakun->Nama->Visible) { // Nama ?>
		<td<?php echo $t0002_subklasakun->Nama->cellAttributes() ?>>
<span id="el<?php echo $t0002_subklasakun_delete->RowCnt ?>_t0002_subklasakun_Nama" class="t0002_subklasakun_Nama">
<span<?php echo $t0002_subklasakun->Nama->viewAttributes() ?>>
<?php echo $t0002_subklasakun->Nama->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t0002_subklasakun_delete->Recordset->moveNext();
}
$t0002_subklasakun_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t0002_subklasakun_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t0002_subklasakun_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t0002_subklasakun_delete->terminate();
?>