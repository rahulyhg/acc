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
$t9900_periode_view = new t9900_periode_view();

// Run the page
$t9900_periode_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t9900_periode_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t9900_periode->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var ft9900_periodeview = currentForm = new ew.Form("ft9900_periodeview", "view");

// Form_CustomValidate event
ft9900_periodeview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft9900_periodeview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft9900_periodeview.lists["x_Aktif"] = <?php echo $t9900_periode_view->Aktif->Lookup->toClientList() ?>;
ft9900_periodeview.lists["x_Aktif"].options = <?php echo JsonEncode($t9900_periode_view->Aktif->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$t9900_periode->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t9900_periode_view->ExportOptions->render("body") ?>
<?php $t9900_periode_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t9900_periode_view->showPageHeader(); ?>
<?php
$t9900_periode_view->showMessage();
?>
<form name="ft9900_periodeview" id="ft9900_periodeview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t9900_periode_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t9900_periode_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t9900_periode">
<input type="hidden" name="modal" value="<?php echo (int)$t9900_periode_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t9900_periode->Awal->Visible) { // Awal ?>
	<tr id="r_Awal">
		<td class="<?php echo $t9900_periode_view->TableLeftColumnClass ?>"><span id="elh_t9900_periode_Awal"><?php echo $t9900_periode->Awal->caption() ?></span></td>
		<td data-name="Awal"<?php echo $t9900_periode->Awal->cellAttributes() ?>>
<span id="el_t9900_periode_Awal">
<span<?php echo $t9900_periode->Awal->viewAttributes() ?>>
<?php echo $t9900_periode->Awal->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t9900_periode->Akhir->Visible) { // Akhir ?>
	<tr id="r_Akhir">
		<td class="<?php echo $t9900_periode_view->TableLeftColumnClass ?>"><span id="elh_t9900_periode_Akhir"><?php echo $t9900_periode->Akhir->caption() ?></span></td>
		<td data-name="Akhir"<?php echo $t9900_periode->Akhir->cellAttributes() ?>>
<span id="el_t9900_periode_Akhir">
<span<?php echo $t9900_periode->Akhir->viewAttributes() ?>>
<?php echo $t9900_periode->Akhir->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t9900_periode->Aktif->Visible) { // Aktif ?>
	<tr id="r_Aktif">
		<td class="<?php echo $t9900_periode_view->TableLeftColumnClass ?>"><span id="elh_t9900_periode_Aktif"><?php echo $t9900_periode->Aktif->caption() ?></span></td>
		<td data-name="Aktif"<?php echo $t9900_periode->Aktif->cellAttributes() ?>>
<span id="el_t9900_periode_Aktif">
<span<?php echo $t9900_periode->Aktif->viewAttributes() ?>>
<?php echo $t9900_periode->Aktif->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$t9900_periode_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t9900_periode->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t9900_periode_view->terminate();
?>