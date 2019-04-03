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
$t9900_periode_edit = new t9900_periode_edit();

// Run the page
$t9900_periode_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t9900_periode_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var ft9900_periodeedit = currentForm = new ew.Form("ft9900_periodeedit", "edit");

// Validate form
ft9900_periodeedit.validate = function() {
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
		<?php if ($t9900_periode_edit->Awal->Required) { ?>
			elm = this.getElements("x" + infix + "_Awal");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t9900_periode->Awal->caption(), $t9900_periode->Awal->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Awal");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t9900_periode->Awal->errorMessage()) ?>");
		<?php if ($t9900_periode_edit->Akhir->Required) { ?>
			elm = this.getElements("x" + infix + "_Akhir");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t9900_periode->Akhir->caption(), $t9900_periode->Akhir->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Akhir");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t9900_periode->Akhir->errorMessage()) ?>");
		<?php if ($t9900_periode_edit->Aktif->Required) { ?>
			elm = this.getElements("x" + infix + "_Aktif");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t9900_periode->Aktif->caption(), $t9900_periode->Aktif->RequiredErrorMessage)) ?>");
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
ft9900_periodeedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft9900_periodeedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft9900_periodeedit.lists["x_Aktif"] = <?php echo $t9900_periode_edit->Aktif->Lookup->toClientList() ?>;
ft9900_periodeedit.lists["x_Aktif"].options = <?php echo JsonEncode($t9900_periode_edit->Aktif->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t9900_periode_edit->showPageHeader(); ?>
<?php
$t9900_periode_edit->showMessage();
?>
<form name="ft9900_periodeedit" id="ft9900_periodeedit" class="<?php echo $t9900_periode_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t9900_periode_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t9900_periode_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t9900_periode">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$t9900_periode_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($t9900_periode->Awal->Visible) { // Awal ?>
	<div id="r_Awal" class="form-group row">
		<label id="elh_t9900_periode_Awal" for="x_Awal" class="<?php echo $t9900_periode_edit->LeftColumnClass ?>"><?php echo $t9900_periode->Awal->caption() ?><?php echo ($t9900_periode->Awal->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t9900_periode_edit->RightColumnClass ?>"><div<?php echo $t9900_periode->Awal->cellAttributes() ?>>
<span id="el_t9900_periode_Awal">
<input type="text" data-table="t9900_periode" data-field="x_Awal" data-format="7" name="x_Awal" id="x_Awal" placeholder="<?php echo HtmlEncode($t9900_periode->Awal->getPlaceHolder()) ?>" value="<?php echo $t9900_periode->Awal->EditValue ?>"<?php echo $t9900_periode->Awal->editAttributes() ?>>
<?php if (!$t9900_periode->Awal->ReadOnly && !$t9900_periode->Awal->Disabled && !isset($t9900_periode->Awal->EditAttrs["readonly"]) && !isset($t9900_periode->Awal->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("ft9900_periodeedit", "x_Awal", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php echo $t9900_periode->Awal->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t9900_periode->Akhir->Visible) { // Akhir ?>
	<div id="r_Akhir" class="form-group row">
		<label id="elh_t9900_periode_Akhir" for="x_Akhir" class="<?php echo $t9900_periode_edit->LeftColumnClass ?>"><?php echo $t9900_periode->Akhir->caption() ?><?php echo ($t9900_periode->Akhir->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t9900_periode_edit->RightColumnClass ?>"><div<?php echo $t9900_periode->Akhir->cellAttributes() ?>>
<span id="el_t9900_periode_Akhir">
<input type="text" data-table="t9900_periode" data-field="x_Akhir" data-format="7" name="x_Akhir" id="x_Akhir" placeholder="<?php echo HtmlEncode($t9900_periode->Akhir->getPlaceHolder()) ?>" value="<?php echo $t9900_periode->Akhir->EditValue ?>"<?php echo $t9900_periode->Akhir->editAttributes() ?>>
<?php if (!$t9900_periode->Akhir->ReadOnly && !$t9900_periode->Akhir->Disabled && !isset($t9900_periode->Akhir->EditAttrs["readonly"]) && !isset($t9900_periode->Akhir->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("ft9900_periodeedit", "x_Akhir", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php echo $t9900_periode->Akhir->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t9900_periode->Aktif->Visible) { // Aktif ?>
	<div id="r_Aktif" class="form-group row">
		<label id="elh_t9900_periode_Aktif" class="<?php echo $t9900_periode_edit->LeftColumnClass ?>"><?php echo $t9900_periode->Aktif->caption() ?><?php echo ($t9900_periode->Aktif->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t9900_periode_edit->RightColumnClass ?>"><div<?php echo $t9900_periode->Aktif->cellAttributes() ?>>
<span id="el_t9900_periode_Aktif">
<div id="tp_x_Aktif" class="ew-template"><input type="radio" class="form-check-input" data-table="t9900_periode" data-field="x_Aktif" data-value-separator="<?php echo $t9900_periode->Aktif->displayValueSeparatorAttribute() ?>" name="x_Aktif" id="x_Aktif" value="{value}"<?php echo $t9900_periode->Aktif->editAttributes() ?>></div>
<div id="dsl_x_Aktif" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $t9900_periode->Aktif->radioButtonListHtml(FALSE, "x_Aktif") ?>
</div></div>
</span>
<?php echo $t9900_periode->Aktif->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<input type="hidden" data-table="t9900_periode" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($t9900_periode->id->CurrentValue) ?>">
<?php if (!$t9900_periode_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t9900_periode_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t9900_periode_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t9900_periode_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t9900_periode_edit->terminate();
?>