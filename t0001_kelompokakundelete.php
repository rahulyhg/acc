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
$t0001_kelompokakun_delete = new t0001_kelompokakun_delete();

// Run the page
$t0001_kelompokakun_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0001_kelompokakun_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var ft0001_kelompokakundelete = currentForm = new ew.Form("ft0001_kelompokakundelete", "delete");

// Form_CustomValidate event
ft0001_kelompokakundelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0001_kelompokakundelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t0001_kelompokakun_delete->showPageHeader(); ?>
<?php
$t0001_kelompokakun_delete->showMessage();
?>
<form name="ft0001_kelompokakundelete" id="ft0001_kelompokakundelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0001_kelompokakun_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0001_kelompokakun_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0001_kelompokakun">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t0001_kelompokakun_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t0001_kelompokakun->ID->Visible) { // ID ?>
		<th class="<?php echo $t0001_kelompokakun->ID->headerCellClass() ?>"><span id="elh_t0001_kelompokakun_ID" class="t0001_kelompokakun_ID"><?php echo $t0001_kelompokakun->ID->caption() ?></span></th>
<?php } ?>
<?php if ($t0001_kelompokakun->NamaAkun->Visible) { // NamaAkun ?>
		<th class="<?php echo $t0001_kelompokakun->NamaAkun->headerCellClass() ?>"><span id="elh_t0001_kelompokakun_NamaAkun" class="t0001_kelompokakun_NamaAkun"><?php echo $t0001_kelompokakun->NamaAkun->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t0001_kelompokakun_delete->RecCnt = 0;
$i = 0;
while (!$t0001_kelompokakun_delete->Recordset->EOF) {
	$t0001_kelompokakun_delete->RecCnt++;
	$t0001_kelompokakun_delete->RowCnt++;

	// Set row properties
	$t0001_kelompokakun->resetAttributes();
	$t0001_kelompokakun->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t0001_kelompokakun_delete->loadRowValues($t0001_kelompokakun_delete->Recordset);

	// Render row
	$t0001_kelompokakun_delete->renderRow();
?>
	<tr<?php echo $t0001_kelompokakun->rowAttributes() ?>>
<?php if ($t0001_kelompokakun->ID->Visible) { // ID ?>
		<td<?php echo $t0001_kelompokakun->ID->cellAttributes() ?>>
<span id="el<?php echo $t0001_kelompokakun_delete->RowCnt ?>_t0001_kelompokakun_ID" class="t0001_kelompokakun_ID">
<span<?php echo $t0001_kelompokakun->ID->viewAttributes() ?>>
<?php echo $t0001_kelompokakun->ID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t0001_kelompokakun->NamaAkun->Visible) { // NamaAkun ?>
		<td<?php echo $t0001_kelompokakun->NamaAkun->cellAttributes() ?>>
<span id="el<?php echo $t0001_kelompokakun_delete->RowCnt ?>_t0001_kelompokakun_NamaAkun" class="t0001_kelompokakun_NamaAkun">
<span<?php echo $t0001_kelompokakun->NamaAkun->viewAttributes() ?>>
<?php echo $t0001_kelompokakun->NamaAkun->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t0001_kelompokakun_delete->Recordset->moveNext();
}
$t0001_kelompokakun_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t0001_kelompokakun_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t0001_kelompokakun_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t0001_kelompokakun_delete->terminate();
?>