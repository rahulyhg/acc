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
$t9900_periode_delete = new t9900_periode_delete();

// Run the page
$t9900_periode_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t9900_periode_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var ft9900_periodedelete = currentForm = new ew.Form("ft9900_periodedelete", "delete");

// Form_CustomValidate event
ft9900_periodedelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft9900_periodedelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft9900_periodedelete.lists["x_Aktif"] = <?php echo $t9900_periode_delete->Aktif->Lookup->toClientList() ?>;
ft9900_periodedelete.lists["x_Aktif"].options = <?php echo JsonEncode($t9900_periode_delete->Aktif->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t9900_periode_delete->showPageHeader(); ?>
<?php
$t9900_periode_delete->showMessage();
?>
<form name="ft9900_periodedelete" id="ft9900_periodedelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t9900_periode_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t9900_periode_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t9900_periode">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t9900_periode_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t9900_periode->Awal->Visible) { // Awal ?>
		<th class="<?php echo $t9900_periode->Awal->headerCellClass() ?>"><span id="elh_t9900_periode_Awal" class="t9900_periode_Awal"><?php echo $t9900_periode->Awal->caption() ?></span></th>
<?php } ?>
<?php if ($t9900_periode->Akhir->Visible) { // Akhir ?>
		<th class="<?php echo $t9900_periode->Akhir->headerCellClass() ?>"><span id="elh_t9900_periode_Akhir" class="t9900_periode_Akhir"><?php echo $t9900_periode->Akhir->caption() ?></span></th>
<?php } ?>
<?php if ($t9900_periode->Aktif->Visible) { // Aktif ?>
		<th class="<?php echo $t9900_periode->Aktif->headerCellClass() ?>"><span id="elh_t9900_periode_Aktif" class="t9900_periode_Aktif"><?php echo $t9900_periode->Aktif->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t9900_periode_delete->RecCnt = 0;
$i = 0;
while (!$t9900_periode_delete->Recordset->EOF) {
	$t9900_periode_delete->RecCnt++;
	$t9900_periode_delete->RowCnt++;

	// Set row properties
	$t9900_periode->resetAttributes();
	$t9900_periode->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t9900_periode_delete->loadRowValues($t9900_periode_delete->Recordset);

	// Render row
	$t9900_periode_delete->renderRow();
?>
	<tr<?php echo $t9900_periode->rowAttributes() ?>>
<?php if ($t9900_periode->Awal->Visible) { // Awal ?>
		<td<?php echo $t9900_periode->Awal->cellAttributes() ?>>
<span id="el<?php echo $t9900_periode_delete->RowCnt ?>_t9900_periode_Awal" class="t9900_periode_Awal">
<span<?php echo $t9900_periode->Awal->viewAttributes() ?>>
<?php echo $t9900_periode->Awal->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t9900_periode->Akhir->Visible) { // Akhir ?>
		<td<?php echo $t9900_periode->Akhir->cellAttributes() ?>>
<span id="el<?php echo $t9900_periode_delete->RowCnt ?>_t9900_periode_Akhir" class="t9900_periode_Akhir">
<span<?php echo $t9900_periode->Akhir->viewAttributes() ?>>
<?php echo $t9900_periode->Akhir->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t9900_periode->Aktif->Visible) { // Aktif ?>
		<td<?php echo $t9900_periode->Aktif->cellAttributes() ?>>
<span id="el<?php echo $t9900_periode_delete->RowCnt ?>_t9900_periode_Aktif" class="t9900_periode_Aktif">
<span<?php echo $t9900_periode->Aktif->viewAttributes() ?>>
<?php echo $t9900_periode->Aktif->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t9900_periode_delete->Recordset->moveNext();
}
$t9900_periode_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t9900_periode_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t9900_periode_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t9900_periode_delete->terminate();
?>