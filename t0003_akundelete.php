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
$t0003_akun_delete = new t0003_akun_delete();

// Run the page
$t0003_akun_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0003_akun_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var ft0003_akundelete = currentForm = new ew.Form("ft0003_akundelete", "delete");

// Form_CustomValidate event
ft0003_akundelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0003_akundelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t0003_akun_delete->showPageHeader(); ?>
<?php
$t0003_akun_delete->showMessage();
?>
<form name="ft0003_akundelete" id="ft0003_akundelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0003_akun_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0003_akun_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0003_akun">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t0003_akun_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t0003_akun->Kode->Visible) { // Kode ?>
		<th class="<?php echo $t0003_akun->Kode->headerCellClass() ?>"><span id="elh_t0003_akun_Kode" class="t0003_akun_Kode"><?php echo $t0003_akun->Kode->caption() ?></span></th>
<?php } ?>
<?php if ($t0003_akun->NamaAkun->Visible) { // NamaAkun ?>
		<th class="<?php echo $t0003_akun->NamaAkun->headerCellClass() ?>"><span id="elh_t0003_akun_NamaAkun" class="t0003_akun_NamaAkun"><?php echo $t0003_akun->NamaAkun->caption() ?></span></th>
<?php } ?>
<?php if ($t0003_akun->SubKlasifikasi->Visible) { // SubKlasifikasi ?>
		<th class="<?php echo $t0003_akun->SubKlasifikasi->headerCellClass() ?>"><span id="elh_t0003_akun_SubKlasifikasi" class="t0003_akun_SubKlasifikasi"><?php echo $t0003_akun->SubKlasifikasi->caption() ?></span></th>
<?php } ?>
<?php if ($t0003_akun->Saldo->Visible) { // Saldo ?>
		<th class="<?php echo $t0003_akun->Saldo->headerCellClass() ?>"><span id="elh_t0003_akun_Saldo" class="t0003_akun_Saldo"><?php echo $t0003_akun->Saldo->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t0003_akun_delete->RecCnt = 0;
$i = 0;
while (!$t0003_akun_delete->Recordset->EOF) {
	$t0003_akun_delete->RecCnt++;
	$t0003_akun_delete->RowCnt++;

	// Set row properties
	$t0003_akun->resetAttributes();
	$t0003_akun->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t0003_akun_delete->loadRowValues($t0003_akun_delete->Recordset);

	// Render row
	$t0003_akun_delete->renderRow();
?>
	<tr<?php echo $t0003_akun->rowAttributes() ?>>
<?php if ($t0003_akun->Kode->Visible) { // Kode ?>
		<td<?php echo $t0003_akun->Kode->cellAttributes() ?>>
<span id="el<?php echo $t0003_akun_delete->RowCnt ?>_t0003_akun_Kode" class="t0003_akun_Kode">
<span<?php echo $t0003_akun->Kode->viewAttributes() ?>>
<?php echo $t0003_akun->Kode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t0003_akun->NamaAkun->Visible) { // NamaAkun ?>
		<td<?php echo $t0003_akun->NamaAkun->cellAttributes() ?>>
<span id="el<?php echo $t0003_akun_delete->RowCnt ?>_t0003_akun_NamaAkun" class="t0003_akun_NamaAkun">
<span<?php echo $t0003_akun->NamaAkun->viewAttributes() ?>>
<?php echo $t0003_akun->NamaAkun->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t0003_akun->SubKlasifikasi->Visible) { // SubKlasifikasi ?>
		<td<?php echo $t0003_akun->SubKlasifikasi->cellAttributes() ?>>
<span id="el<?php echo $t0003_akun_delete->RowCnt ?>_t0003_akun_SubKlasifikasi" class="t0003_akun_SubKlasifikasi">
<span<?php echo $t0003_akun->SubKlasifikasi->viewAttributes() ?>>
<?php echo $t0003_akun->SubKlasifikasi->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t0003_akun->Saldo->Visible) { // Saldo ?>
		<td<?php echo $t0003_akun->Saldo->cellAttributes() ?>>
<span id="el<?php echo $t0003_akun_delete->RowCnt ?>_t0003_akun_Saldo" class="t0003_akun_Saldo">
<span<?php echo $t0003_akun->Saldo->viewAttributes() ?>>
<?php echo $t0003_akun->Saldo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t0003_akun_delete->Recordset->moveNext();
}
$t0003_akun_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t0003_akun_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t0003_akun_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t0003_akun_delete->terminate();
?>