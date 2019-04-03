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
$t0004_jurnal_add = new t0004_jurnal_add();

// Run the page
$t0004_jurnal_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0004_jurnal_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var ft0004_jurnaladd = currentForm = new ew.Form("ft0004_jurnaladd", "add");

// Validate form
ft0004_jurnaladd.validate = function() {
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
		<?php if ($t0004_jurnal_add->ID->Required) { ?>
			elm = this.getElements("x" + infix + "_ID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0004_jurnal->ID->caption(), $t0004_jurnal->ID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t0004_jurnal_add->Tipe->Required) { ?>
			elm = this.getElements("x" + infix + "_Tipe");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0004_jurnal->Tipe->caption(), $t0004_jurnal->Tipe->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Tipe");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t0004_jurnal->Tipe->errorMessage()) ?>");
		<?php if ($t0004_jurnal_add->Tanggal->Required) { ?>
			elm = this.getElements("x" + infix + "_Tanggal");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0004_jurnal->Tanggal->caption(), $t0004_jurnal->Tanggal->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Tanggal");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t0004_jurnal->Tanggal->errorMessage()) ?>");
		<?php if ($t0004_jurnal_add->Deskripsi->Required) { ?>
			elm = this.getElements("x" + infix + "_Deskripsi");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0004_jurnal->Deskripsi->caption(), $t0004_jurnal->Deskripsi->RequiredErrorMessage)) ?>");
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
ft0004_jurnaladd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0004_jurnaladd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t0004_jurnal_add->showPageHeader(); ?>
<?php
$t0004_jurnal_add->showMessage();
?>
<form name="ft0004_jurnaladd" id="ft0004_jurnaladd" class="<?php echo $t0004_jurnal_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0004_jurnal_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0004_jurnal_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0004_jurnal">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$t0004_jurnal_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($t0004_jurnal->ID->Visible) { // ID ?>
	<div id="r_ID" class="form-group row">
		<label id="elh_t0004_jurnal_ID" for="x_ID" class="<?php echo $t0004_jurnal_add->LeftColumnClass ?>"><?php echo $t0004_jurnal->ID->caption() ?><?php echo ($t0004_jurnal->ID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0004_jurnal_add->RightColumnClass ?>"><div<?php echo $t0004_jurnal->ID->cellAttributes() ?>>
<span id="el_t0004_jurnal_ID">
<input type="text" data-table="t0004_jurnal" data-field="x_ID" name="x_ID" id="x_ID" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($t0004_jurnal->ID->getPlaceHolder()) ?>" value="<?php echo $t0004_jurnal->ID->EditValue ?>"<?php echo $t0004_jurnal->ID->editAttributes() ?>>
</span>
<?php echo $t0004_jurnal->ID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t0004_jurnal->Tipe->Visible) { // Tipe ?>
	<div id="r_Tipe" class="form-group row">
		<label id="elh_t0004_jurnal_Tipe" for="x_Tipe" class="<?php echo $t0004_jurnal_add->LeftColumnClass ?>"><?php echo $t0004_jurnal->Tipe->caption() ?><?php echo ($t0004_jurnal->Tipe->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0004_jurnal_add->RightColumnClass ?>"><div<?php echo $t0004_jurnal->Tipe->cellAttributes() ?>>
<span id="el_t0004_jurnal_Tipe">
<input type="text" data-table="t0004_jurnal" data-field="x_Tipe" name="x_Tipe" id="x_Tipe" size="30" placeholder="<?php echo HtmlEncode($t0004_jurnal->Tipe->getPlaceHolder()) ?>" value="<?php echo $t0004_jurnal->Tipe->EditValue ?>"<?php echo $t0004_jurnal->Tipe->editAttributes() ?>>
</span>
<?php echo $t0004_jurnal->Tipe->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t0004_jurnal->Tanggal->Visible) { // Tanggal ?>
	<div id="r_Tanggal" class="form-group row">
		<label id="elh_t0004_jurnal_Tanggal" for="x_Tanggal" class="<?php echo $t0004_jurnal_add->LeftColumnClass ?>"><?php echo $t0004_jurnal->Tanggal->caption() ?><?php echo ($t0004_jurnal->Tanggal->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0004_jurnal_add->RightColumnClass ?>"><div<?php echo $t0004_jurnal->Tanggal->cellAttributes() ?>>
<span id="el_t0004_jurnal_Tanggal">
<input type="text" data-table="t0004_jurnal" data-field="x_Tanggal" name="x_Tanggal" id="x_Tanggal" placeholder="<?php echo HtmlEncode($t0004_jurnal->Tanggal->getPlaceHolder()) ?>" value="<?php echo $t0004_jurnal->Tanggal->EditValue ?>"<?php echo $t0004_jurnal->Tanggal->editAttributes() ?>>
<?php if (!$t0004_jurnal->Tanggal->ReadOnly && !$t0004_jurnal->Tanggal->Disabled && !isset($t0004_jurnal->Tanggal->EditAttrs["readonly"]) && !isset($t0004_jurnal->Tanggal->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("ft0004_jurnaladd", "x_Tanggal", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $t0004_jurnal->Tanggal->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t0004_jurnal->Deskripsi->Visible) { // Deskripsi ?>
	<div id="r_Deskripsi" class="form-group row">
		<label id="elh_t0004_jurnal_Deskripsi" for="x_Deskripsi" class="<?php echo $t0004_jurnal_add->LeftColumnClass ?>"><?php echo $t0004_jurnal->Deskripsi->caption() ?><?php echo ($t0004_jurnal->Deskripsi->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0004_jurnal_add->RightColumnClass ?>"><div<?php echo $t0004_jurnal->Deskripsi->cellAttributes() ?>>
<span id="el_t0004_jurnal_Deskripsi">
<textarea data-table="t0004_jurnal" data-field="x_Deskripsi" name="x_Deskripsi" id="x_Deskripsi" cols="35" rows="4" placeholder="<?php echo HtmlEncode($t0004_jurnal->Deskripsi->getPlaceHolder()) ?>"<?php echo $t0004_jurnal->Deskripsi->editAttributes() ?>><?php echo $t0004_jurnal->Deskripsi->EditValue ?></textarea>
</span>
<?php echo $t0004_jurnal->Deskripsi->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$t0004_jurnal_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t0004_jurnal_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t0004_jurnal_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t0004_jurnal_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t0004_jurnal_add->terminate();
?>