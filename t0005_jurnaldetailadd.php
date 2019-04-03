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
$t0005_jurnaldetail_add = new t0005_jurnaldetail_add();

// Run the page
$t0005_jurnaldetail_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0005_jurnaldetail_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var ft0005_jurnaldetailadd = currentForm = new ew.Form("ft0005_jurnaldetailadd", "add");

// Validate form
ft0005_jurnaldetailadd.validate = function() {
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
		<?php if ($t0005_jurnaldetail_add->JurnalID->Required) { ?>
			elm = this.getElements("x" + infix + "_JurnalID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0005_jurnaldetail->JurnalID->caption(), $t0005_jurnaldetail->JurnalID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t0005_jurnaldetail_add->Item->Required) { ?>
			elm = this.getElements("x" + infix + "_Item");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0005_jurnaldetail->Item->caption(), $t0005_jurnaldetail->Item->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t0005_jurnaldetail_add->AkunID->Required) { ?>
			elm = this.getElements("x" + infix + "_AkunID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0005_jurnaldetail->AkunID->caption(), $t0005_jurnaldetail->AkunID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t0005_jurnaldetail_add->DebitKredit->Required) { ?>
			elm = this.getElements("x" + infix + "_DebitKredit");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0005_jurnaldetail->DebitKredit->caption(), $t0005_jurnaldetail->DebitKredit->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DebitKredit");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t0005_jurnaldetail->DebitKredit->errorMessage()) ?>");
		<?php if ($t0005_jurnaldetail_add->Nilai->Required) { ?>
			elm = this.getElements("x" + infix + "_Nilai");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0005_jurnaldetail->Nilai->caption(), $t0005_jurnaldetail->Nilai->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Nilai");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t0005_jurnaldetail->Nilai->errorMessage()) ?>");

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
ft0005_jurnaldetailadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0005_jurnaldetailadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t0005_jurnaldetail_add->showPageHeader(); ?>
<?php
$t0005_jurnaldetail_add->showMessage();
?>
<form name="ft0005_jurnaldetailadd" id="ft0005_jurnaldetailadd" class="<?php echo $t0005_jurnaldetail_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0005_jurnaldetail_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0005_jurnaldetail_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0005_jurnaldetail">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$t0005_jurnaldetail_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($t0005_jurnaldetail->JurnalID->Visible) { // JurnalID ?>
	<div id="r_JurnalID" class="form-group row">
		<label id="elh_t0005_jurnaldetail_JurnalID" for="x_JurnalID" class="<?php echo $t0005_jurnaldetail_add->LeftColumnClass ?>"><?php echo $t0005_jurnaldetail->JurnalID->caption() ?><?php echo ($t0005_jurnaldetail->JurnalID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0005_jurnaldetail_add->RightColumnClass ?>"><div<?php echo $t0005_jurnaldetail->JurnalID->cellAttributes() ?>>
<span id="el_t0005_jurnaldetail_JurnalID">
<input type="text" data-table="t0005_jurnaldetail" data-field="x_JurnalID" name="x_JurnalID" id="x_JurnalID" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($t0005_jurnaldetail->JurnalID->getPlaceHolder()) ?>" value="<?php echo $t0005_jurnaldetail->JurnalID->EditValue ?>"<?php echo $t0005_jurnaldetail->JurnalID->editAttributes() ?>>
</span>
<?php echo $t0005_jurnaldetail->JurnalID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t0005_jurnaldetail->Item->Visible) { // Item ?>
	<div id="r_Item" class="form-group row">
		<label id="elh_t0005_jurnaldetail_Item" for="x_Item" class="<?php echo $t0005_jurnaldetail_add->LeftColumnClass ?>"><?php echo $t0005_jurnaldetail->Item->caption() ?><?php echo ($t0005_jurnaldetail->Item->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0005_jurnaldetail_add->RightColumnClass ?>"><div<?php echo $t0005_jurnaldetail->Item->cellAttributes() ?>>
<span id="el_t0005_jurnaldetail_Item">
<input type="text" data-table="t0005_jurnaldetail" data-field="x_Item" name="x_Item" id="x_Item" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($t0005_jurnaldetail->Item->getPlaceHolder()) ?>" value="<?php echo $t0005_jurnaldetail->Item->EditValue ?>"<?php echo $t0005_jurnaldetail->Item->editAttributes() ?>>
</span>
<?php echo $t0005_jurnaldetail->Item->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t0005_jurnaldetail->AkunID->Visible) { // AkunID ?>
	<div id="r_AkunID" class="form-group row">
		<label id="elh_t0005_jurnaldetail_AkunID" for="x_AkunID" class="<?php echo $t0005_jurnaldetail_add->LeftColumnClass ?>"><?php echo $t0005_jurnaldetail->AkunID->caption() ?><?php echo ($t0005_jurnaldetail->AkunID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0005_jurnaldetail_add->RightColumnClass ?>"><div<?php echo $t0005_jurnaldetail->AkunID->cellAttributes() ?>>
<span id="el_t0005_jurnaldetail_AkunID">
<input type="text" data-table="t0005_jurnaldetail" data-field="x_AkunID" name="x_AkunID" id="x_AkunID" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($t0005_jurnaldetail->AkunID->getPlaceHolder()) ?>" value="<?php echo $t0005_jurnaldetail->AkunID->EditValue ?>"<?php echo $t0005_jurnaldetail->AkunID->editAttributes() ?>>
</span>
<?php echo $t0005_jurnaldetail->AkunID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t0005_jurnaldetail->DebitKredit->Visible) { // DebitKredit ?>
	<div id="r_DebitKredit" class="form-group row">
		<label id="elh_t0005_jurnaldetail_DebitKredit" for="x_DebitKredit" class="<?php echo $t0005_jurnaldetail_add->LeftColumnClass ?>"><?php echo $t0005_jurnaldetail->DebitKredit->caption() ?><?php echo ($t0005_jurnaldetail->DebitKredit->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0005_jurnaldetail_add->RightColumnClass ?>"><div<?php echo $t0005_jurnaldetail->DebitKredit->cellAttributes() ?>>
<span id="el_t0005_jurnaldetail_DebitKredit">
<input type="text" data-table="t0005_jurnaldetail" data-field="x_DebitKredit" name="x_DebitKredit" id="x_DebitKredit" size="30" placeholder="<?php echo HtmlEncode($t0005_jurnaldetail->DebitKredit->getPlaceHolder()) ?>" value="<?php echo $t0005_jurnaldetail->DebitKredit->EditValue ?>"<?php echo $t0005_jurnaldetail->DebitKredit->editAttributes() ?>>
</span>
<?php echo $t0005_jurnaldetail->DebitKredit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t0005_jurnaldetail->Nilai->Visible) { // Nilai ?>
	<div id="r_Nilai" class="form-group row">
		<label id="elh_t0005_jurnaldetail_Nilai" for="x_Nilai" class="<?php echo $t0005_jurnaldetail_add->LeftColumnClass ?>"><?php echo $t0005_jurnaldetail->Nilai->caption() ?><?php echo ($t0005_jurnaldetail->Nilai->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0005_jurnaldetail_add->RightColumnClass ?>"><div<?php echo $t0005_jurnaldetail->Nilai->cellAttributes() ?>>
<span id="el_t0005_jurnaldetail_Nilai">
<input type="text" data-table="t0005_jurnaldetail" data-field="x_Nilai" name="x_Nilai" id="x_Nilai" size="30" placeholder="<?php echo HtmlEncode($t0005_jurnaldetail->Nilai->getPlaceHolder()) ?>" value="<?php echo $t0005_jurnaldetail->Nilai->EditValue ?>"<?php echo $t0005_jurnaldetail->Nilai->editAttributes() ?>>
</span>
<?php echo $t0005_jurnaldetail->Nilai->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$t0005_jurnaldetail_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t0005_jurnaldetail_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t0005_jurnaldetail_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t0005_jurnaldetail_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t0005_jurnaldetail_add->terminate();
?>