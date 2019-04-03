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
$t0002_subklasakun_edit = new t0002_subklasakun_edit();

// Run the page
$t0002_subklasakun_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0002_subklasakun_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var ft0002_subklasakunedit = currentForm = new ew.Form("ft0002_subklasakunedit", "edit");

// Validate form
ft0002_subklasakunedit.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
	if ($fobj.find("#confirm").val() == "F")
		return true;
	var elm, felm, uelm, addcnt = 0;
	var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
	var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
	var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
	var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
	for (var i = startcnt; i <= rowcnt; i++) {
		var infix = ($k[0]) ? String(i) : "";
		$fobj.data("rowindex", infix);
		<?php if ($t0002_subklasakun_edit->Kode->Required) { ?>
			elm = this.getElements("x" + infix + "_Kode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0002_subklasakun->Kode->caption(), $t0002_subklasakun->Kode->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Kode");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t0002_subklasakun->Kode->errorMessage()) ?>");
		<?php if ($t0002_subklasakun_edit->Kelompok->Required) { ?>
			elm = this.getElements("x" + infix + "_Kelompok");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0002_subklasakun->Kelompok->caption(), $t0002_subklasakun->Kelompok->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Kelompok");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t0002_subklasakun->Kelompok->errorMessage()) ?>");
		<?php if ($t0002_subklasakun_edit->Nama->Required) { ?>
			elm = this.getElements("x" + infix + "_Nama");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0002_subklasakun->Nama->caption(), $t0002_subklasakun->Nama->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}

	// Process detail forms
	var dfs = $fobj.find("input[name='detailpage']").get();
	for (var i = 0; i < dfs.length; i++) {
		var df = dfs[i], val = df.value;
		if (val && ew.forms[val])
			if (!ew.forms[val].validate())
				return false;
	}
	return true;
}

// Form_CustomValidate event
ft0002_subklasakunedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0002_subklasakunedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t0002_subklasakun_edit->showPageHeader(); ?>
<?php
$t0002_subklasakun_edit->showMessage();
?>
<form name="ft0002_subklasakunedit" id="ft0002_subklasakunedit" class="<?php echo $t0002_subklasakun_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0002_subklasakun_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0002_subklasakun_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0002_subklasakun">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$t0002_subklasakun_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($t0002_subklasakun->Kode->Visible) { // Kode ?>
	<div id="r_Kode" class="form-group row">
		<label id="elh_t0002_subklasakun_Kode" for="x_Kode" class="<?php echo $t0002_subklasakun_edit->LeftColumnClass ?>"><?php echo $t0002_subklasakun->Kode->caption() ?><?php echo ($t0002_subklasakun->Kode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0002_subklasakun_edit->RightColumnClass ?>"><div<?php echo $t0002_subklasakun->Kode->cellAttributes() ?>>
<span id="el_t0002_subklasakun_Kode">
<span<?php echo $t0002_subklasakun->Kode->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($t0002_subklasakun->Kode->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="t0002_subklasakun" data-field="x_Kode" name="x_Kode" id="x_Kode" value="<?php echo HtmlEncode($t0002_subklasakun->Kode->CurrentValue) ?>">
<?php echo $t0002_subklasakun->Kode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t0002_subklasakun->Kelompok->Visible) { // Kelompok ?>
	<div id="r_Kelompok" class="form-group row">
		<label id="elh_t0002_subklasakun_Kelompok" for="x_Kelompok" class="<?php echo $t0002_subklasakun_edit->LeftColumnClass ?>"><?php echo $t0002_subklasakun->Kelompok->caption() ?><?php echo ($t0002_subklasakun->Kelompok->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0002_subklasakun_edit->RightColumnClass ?>"><div<?php echo $t0002_subklasakun->Kelompok->cellAttributes() ?>>
<span id="el_t0002_subklasakun_Kelompok">
<input type="text" data-table="t0002_subklasakun" data-field="x_Kelompok" name="x_Kelompok" id="x_Kelompok" size="30" placeholder="<?php echo HtmlEncode($t0002_subklasakun->Kelompok->getPlaceHolder()) ?>" value="<?php echo $t0002_subklasakun->Kelompok->EditValue ?>"<?php echo $t0002_subklasakun->Kelompok->editAttributes() ?>>
</span>
<?php echo $t0002_subklasakun->Kelompok->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t0002_subklasakun->Nama->Visible) { // Nama ?>
	<div id="r_Nama" class="form-group row">
		<label id="elh_t0002_subklasakun_Nama" for="x_Nama" class="<?php echo $t0002_subklasakun_edit->LeftColumnClass ?>"><?php echo $t0002_subklasakun->Nama->caption() ?><?php echo ($t0002_subklasakun->Nama->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0002_subklasakun_edit->RightColumnClass ?>"><div<?php echo $t0002_subklasakun->Nama->cellAttributes() ?>>
<span id="el_t0002_subklasakun_Nama">
<input type="text" data-table="t0002_subklasakun" data-field="x_Nama" name="x_Nama" id="x_Nama" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($t0002_subklasakun->Nama->getPlaceHolder()) ?>" value="<?php echo $t0002_subklasakun->Nama->EditValue ?>"<?php echo $t0002_subklasakun->Nama->editAttributes() ?>>
</span>
<?php echo $t0002_subklasakun->Nama->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$t0002_subklasakun_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t0002_subklasakun_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t0002_subklasakun_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t0002_subklasakun_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t0002_subklasakun_edit->terminate();
?>