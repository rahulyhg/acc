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
$t9997_userlevels_view = new t9997_userlevels_view();

// Run the page
$t9997_userlevels_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t9997_userlevels_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t9997_userlevels->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var ft9997_userlevelsview = currentForm = new ew.Form("ft9997_userlevelsview", "view");

// Form_CustomValidate event
ft9997_userlevelsview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft9997_userlevelsview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$t9997_userlevels->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t9997_userlevels_view->ExportOptions->render("body") ?>
<?php $t9997_userlevels_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t9997_userlevels_view->showPageHeader(); ?>
<?php
$t9997_userlevels_view->showMessage();
?>
<form name="ft9997_userlevelsview" id="ft9997_userlevelsview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t9997_userlevels_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t9997_userlevels_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t9997_userlevels">
<input type="hidden" name="modal" value="<?php echo (int)$t9997_userlevels_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t9997_userlevels->userlevelid->Visible) { // userlevelid ?>
	<tr id="r_userlevelid">
		<td class="<?php echo $t9997_userlevels_view->TableLeftColumnClass ?>"><span id="elh_t9997_userlevels_userlevelid"><?php echo $t9997_userlevels->userlevelid->caption() ?></span></td>
		<td data-name="userlevelid"<?php echo $t9997_userlevels->userlevelid->cellAttributes() ?>>
<span id="el_t9997_userlevels_userlevelid">
<span<?php echo $t9997_userlevels->userlevelid->viewAttributes() ?>>
<?php echo $t9997_userlevels->userlevelid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t9997_userlevels->userlevelname->Visible) { // userlevelname ?>
	<tr id="r_userlevelname">
		<td class="<?php echo $t9997_userlevels_view->TableLeftColumnClass ?>"><span id="elh_t9997_userlevels_userlevelname"><?php echo $t9997_userlevels->userlevelname->caption() ?></span></td>
		<td data-name="userlevelname"<?php echo $t9997_userlevels->userlevelname->cellAttributes() ?>>
<span id="el_t9997_userlevels_userlevelname">
<span<?php echo $t9997_userlevels->userlevelname->viewAttributes() ?>>
<?php echo $t9997_userlevels->userlevelname->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$t9997_userlevels_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t9997_userlevels->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t9997_userlevels_view->terminate();
?>