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
$t0003_akun_view = new t0003_akun_view();

// Run the page
$t0003_akun_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0003_akun_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t0003_akun->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var ft0003_akunview = currentForm = new ew.Form("ft0003_akunview", "view");

// Form_CustomValidate event
ft0003_akunview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0003_akunview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$t0003_akun->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t0003_akun_view->ExportOptions->render("body") ?>
<?php $t0003_akun_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t0003_akun_view->showPageHeader(); ?>
<?php
$t0003_akun_view->showMessage();
?>
<form name="ft0003_akunview" id="ft0003_akunview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0003_akun_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0003_akun_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0003_akun">
<input type="hidden" name="modal" value="<?php echo (int)$t0003_akun_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t0003_akun->Kode->Visible) { // Kode ?>
	<tr id="r_Kode">
		<td class="<?php echo $t0003_akun_view->TableLeftColumnClass ?>"><span id="elh_t0003_akun_Kode"><?php echo $t0003_akun->Kode->caption() ?></span></td>
		<td data-name="Kode"<?php echo $t0003_akun->Kode->cellAttributes() ?>>
<span id="el_t0003_akun_Kode">
<span<?php echo $t0003_akun->Kode->viewAttributes() ?>>
<?php echo $t0003_akun->Kode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t0003_akun->NamaAkun->Visible) { // NamaAkun ?>
	<tr id="r_NamaAkun">
		<td class="<?php echo $t0003_akun_view->TableLeftColumnClass ?>"><span id="elh_t0003_akun_NamaAkun"><?php echo $t0003_akun->NamaAkun->caption() ?></span></td>
		<td data-name="NamaAkun"<?php echo $t0003_akun->NamaAkun->cellAttributes() ?>>
<span id="el_t0003_akun_NamaAkun">
<span<?php echo $t0003_akun->NamaAkun->viewAttributes() ?>>
<?php echo $t0003_akun->NamaAkun->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t0003_akun->SubKlasifikasi->Visible) { // SubKlasifikasi ?>
	<tr id="r_SubKlasifikasi">
		<td class="<?php echo $t0003_akun_view->TableLeftColumnClass ?>"><span id="elh_t0003_akun_SubKlasifikasi"><?php echo $t0003_akun->SubKlasifikasi->caption() ?></span></td>
		<td data-name="SubKlasifikasi"<?php echo $t0003_akun->SubKlasifikasi->cellAttributes() ?>>
<span id="el_t0003_akun_SubKlasifikasi">
<span<?php echo $t0003_akun->SubKlasifikasi->viewAttributes() ?>>
<?php echo $t0003_akun->SubKlasifikasi->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t0003_akun->Saldo->Visible) { // Saldo ?>
	<tr id="r_Saldo">
		<td class="<?php echo $t0003_akun_view->TableLeftColumnClass ?>"><span id="elh_t0003_akun_Saldo"><?php echo $t0003_akun->Saldo->caption() ?></span></td>
		<td data-name="Saldo"<?php echo $t0003_akun->Saldo->cellAttributes() ?>>
<span id="el_t0003_akun_Saldo">
<span<?php echo $t0003_akun->Saldo->viewAttributes() ?>>
<?php echo $t0003_akun->Saldo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$t0003_akun_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t0003_akun->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t0003_akun_view->terminate();
?>