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
$t0001_kelompokakun_view = new t0001_kelompokakun_view();

// Run the page
$t0001_kelompokakun_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0001_kelompokakun_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t0001_kelompokakun->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var ft0001_kelompokakunview = currentForm = new ew.Form("ft0001_kelompokakunview", "view");

// Form_CustomValidate event
ft0001_kelompokakunview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0001_kelompokakunview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$t0001_kelompokakun->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t0001_kelompokakun_view->ExportOptions->render("body") ?>
<?php $t0001_kelompokakun_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t0001_kelompokakun_view->showPageHeader(); ?>
<?php
$t0001_kelompokakun_view->showMessage();
?>
<form name="ft0001_kelompokakunview" id="ft0001_kelompokakunview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0001_kelompokakun_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0001_kelompokakun_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0001_kelompokakun">
<input type="hidden" name="modal" value="<?php echo (int)$t0001_kelompokakun_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t0001_kelompokakun->ID->Visible) { // ID ?>
	<tr id="r_ID">
		<td class="<?php echo $t0001_kelompokakun_view->TableLeftColumnClass ?>"><span id="elh_t0001_kelompokakun_ID"><?php echo $t0001_kelompokakun->ID->caption() ?></span></td>
		<td data-name="ID"<?php echo $t0001_kelompokakun->ID->cellAttributes() ?>>
<span id="el_t0001_kelompokakun_ID">
<span<?php echo $t0001_kelompokakun->ID->viewAttributes() ?>>
<?php echo $t0001_kelompokakun->ID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t0001_kelompokakun->NamaAkun->Visible) { // NamaAkun ?>
	<tr id="r_NamaAkun">
		<td class="<?php echo $t0001_kelompokakun_view->TableLeftColumnClass ?>"><span id="elh_t0001_kelompokakun_NamaAkun"><?php echo $t0001_kelompokakun->NamaAkun->caption() ?></span></td>
		<td data-name="NamaAkun"<?php echo $t0001_kelompokakun->NamaAkun->cellAttributes() ?>>
<span id="el_t0001_kelompokakun_NamaAkun">
<span<?php echo $t0001_kelompokakun->NamaAkun->viewAttributes() ?>>
<?php echo $t0001_kelompokakun->NamaAkun->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$t0001_kelompokakun_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t0001_kelompokakun->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t0001_kelompokakun_view->terminate();
?>