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
$t0002_subklasakun_view = new t0002_subklasakun_view();

// Run the page
$t0002_subklasakun_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0002_subklasakun_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t0002_subklasakun->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var ft0002_subklasakunview = currentForm = new ew.Form("ft0002_subklasakunview", "view");

// Form_CustomValidate event
ft0002_subklasakunview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0002_subklasakunview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$t0002_subklasakun->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t0002_subklasakun_view->ExportOptions->render("body") ?>
<?php $t0002_subklasakun_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t0002_subklasakun_view->showPageHeader(); ?>
<?php
$t0002_subklasakun_view->showMessage();
?>
<form name="ft0002_subklasakunview" id="ft0002_subklasakunview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0002_subklasakun_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0002_subklasakun_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0002_subklasakun">
<input type="hidden" name="modal" value="<?php echo (int)$t0002_subklasakun_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t0002_subklasakun->Kode->Visible) { // Kode ?>
	<tr id="r_Kode">
		<td class="<?php echo $t0002_subklasakun_view->TableLeftColumnClass ?>"><span id="elh_t0002_subklasakun_Kode"><?php echo $t0002_subklasakun->Kode->caption() ?></span></td>
		<td data-name="Kode"<?php echo $t0002_subklasakun->Kode->cellAttributes() ?>>
<span id="el_t0002_subklasakun_Kode">
<span<?php echo $t0002_subklasakun->Kode->viewAttributes() ?>>
<?php echo $t0002_subklasakun->Kode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t0002_subklasakun->Kelompok->Visible) { // Kelompok ?>
	<tr id="r_Kelompok">
		<td class="<?php echo $t0002_subklasakun_view->TableLeftColumnClass ?>"><span id="elh_t0002_subklasakun_Kelompok"><?php echo $t0002_subklasakun->Kelompok->caption() ?></span></td>
		<td data-name="Kelompok"<?php echo $t0002_subklasakun->Kelompok->cellAttributes() ?>>
<span id="el_t0002_subklasakun_Kelompok">
<span<?php echo $t0002_subklasakun->Kelompok->viewAttributes() ?>>
<?php echo $t0002_subklasakun->Kelompok->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t0002_subklasakun->Nama->Visible) { // Nama ?>
	<tr id="r_Nama">
		<td class="<?php echo $t0002_subklasakun_view->TableLeftColumnClass ?>"><span id="elh_t0002_subklasakun_Nama"><?php echo $t0002_subklasakun->Nama->caption() ?></span></td>
		<td data-name="Nama"<?php echo $t0002_subklasakun->Nama->cellAttributes() ?>>
<span id="el_t0002_subklasakun_Nama">
<span<?php echo $t0002_subklasakun->Nama->viewAttributes() ?>>
<?php echo $t0002_subklasakun->Nama->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$t0002_subklasakun_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t0002_subklasakun->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t0002_subklasakun_view->terminate();
?>