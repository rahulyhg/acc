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
$t9901_perusahaan_add = new t9901_perusahaan_add();

// Run the page
$t9901_perusahaan_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t9901_perusahaan_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var ft9901_perusahaanadd = currentForm = new ew.Form("ft9901_perusahaanadd", "add");

// Validate form
ft9901_perusahaanadd.validate = function() {
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
		<?php if ($t9901_perusahaan_add->Nama->Required) { ?>
			elm = this.getElements("x" + infix + "_Nama");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t9901_perusahaan->Nama->caption(), $t9901_perusahaan->Nama->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t9901_perusahaan_add->Alamat->Required) { ?>
			elm = this.getElements("x" + infix + "_Alamat");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t9901_perusahaan->Alamat->caption(), $t9901_perusahaan->Alamat->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t9901_perusahaan_add->_Email->Required) { ?>
			elm = this.getElements("x" + infix + "__Email");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t9901_perusahaan->_Email->caption(), $t9901_perusahaan->_Email->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t9901_perusahaan_add->NoTelepon->Required) { ?>
			elm = this.getElements("x" + infix + "_NoTelepon");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t9901_perusahaan->NoTelepon->caption(), $t9901_perusahaan->NoTelepon->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t9901_perusahaan_add->NoHandphone->Required) { ?>
			elm = this.getElements("x" + infix + "_NoHandphone");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t9901_perusahaan->NoHandphone->caption(), $t9901_perusahaan->NoHandphone->RequiredErrorMessage)) ?>");
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
ft9901_perusahaanadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft9901_perusahaanadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t9901_perusahaan_add->showPageHeader(); ?>
<?php
$t9901_perusahaan_add->showMessage();
?>
<form name="ft9901_perusahaanadd" id="ft9901_perusahaanadd" class="<?php echo $t9901_perusahaan_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t9901_perusahaan_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t9901_perusahaan_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t9901_perusahaan">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$t9901_perusahaan_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($t9901_perusahaan->Nama->Visible) { // Nama ?>
	<div id="r_Nama" class="form-group row">
		<label id="elh_t9901_perusahaan_Nama" for="x_Nama" class="<?php echo $t9901_perusahaan_add->LeftColumnClass ?>"><?php echo $t9901_perusahaan->Nama->caption() ?><?php echo ($t9901_perusahaan->Nama->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t9901_perusahaan_add->RightColumnClass ?>"><div<?php echo $t9901_perusahaan->Nama->cellAttributes() ?>>
<span id="el_t9901_perusahaan_Nama">
<input type="text" data-table="t9901_perusahaan" data-field="x_Nama" name="x_Nama" id="x_Nama" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t9901_perusahaan->Nama->getPlaceHolder()) ?>" value="<?php echo $t9901_perusahaan->Nama->EditValue ?>"<?php echo $t9901_perusahaan->Nama->editAttributes() ?>>
</span>
<?php echo $t9901_perusahaan->Nama->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t9901_perusahaan->Alamat->Visible) { // Alamat ?>
	<div id="r_Alamat" class="form-group row">
		<label id="elh_t9901_perusahaan_Alamat" for="x_Alamat" class="<?php echo $t9901_perusahaan_add->LeftColumnClass ?>"><?php echo $t9901_perusahaan->Alamat->caption() ?><?php echo ($t9901_perusahaan->Alamat->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t9901_perusahaan_add->RightColumnClass ?>"><div<?php echo $t9901_perusahaan->Alamat->cellAttributes() ?>>
<span id="el_t9901_perusahaan_Alamat">
<textarea data-table="t9901_perusahaan" data-field="x_Alamat" name="x_Alamat" id="x_Alamat" cols="35" rows="4" placeholder="<?php echo HtmlEncode($t9901_perusahaan->Alamat->getPlaceHolder()) ?>"<?php echo $t9901_perusahaan->Alamat->editAttributes() ?>><?php echo $t9901_perusahaan->Alamat->EditValue ?></textarea>
</span>
<?php echo $t9901_perusahaan->Alamat->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t9901_perusahaan->_Email->Visible) { // Email ?>
	<div id="r__Email" class="form-group row">
		<label id="elh_t9901_perusahaan__Email" for="x__Email" class="<?php echo $t9901_perusahaan_add->LeftColumnClass ?>"><?php echo $t9901_perusahaan->_Email->caption() ?><?php echo ($t9901_perusahaan->_Email->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t9901_perusahaan_add->RightColumnClass ?>"><div<?php echo $t9901_perusahaan->_Email->cellAttributes() ?>>
<span id="el_t9901_perusahaan__Email">
<input type="text" data-table="t9901_perusahaan" data-field="x__Email" name="x__Email" id="x__Email" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t9901_perusahaan->_Email->getPlaceHolder()) ?>" value="<?php echo $t9901_perusahaan->_Email->EditValue ?>"<?php echo $t9901_perusahaan->_Email->editAttributes() ?>>
</span>
<?php echo $t9901_perusahaan->_Email->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t9901_perusahaan->NoTelepon->Visible) { // NoTelepon ?>
	<div id="r_NoTelepon" class="form-group row">
		<label id="elh_t9901_perusahaan_NoTelepon" for="x_NoTelepon" class="<?php echo $t9901_perusahaan_add->LeftColumnClass ?>"><?php echo $t9901_perusahaan->NoTelepon->caption() ?><?php echo ($t9901_perusahaan->NoTelepon->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t9901_perusahaan_add->RightColumnClass ?>"><div<?php echo $t9901_perusahaan->NoTelepon->cellAttributes() ?>>
<span id="el_t9901_perusahaan_NoTelepon">
<input type="text" data-table="t9901_perusahaan" data-field="x_NoTelepon" name="x_NoTelepon" id="x_NoTelepon" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($t9901_perusahaan->NoTelepon->getPlaceHolder()) ?>" value="<?php echo $t9901_perusahaan->NoTelepon->EditValue ?>"<?php echo $t9901_perusahaan->NoTelepon->editAttributes() ?>>
</span>
<?php echo $t9901_perusahaan->NoTelepon->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t9901_perusahaan->NoHandphone->Visible) { // NoHandphone ?>
	<div id="r_NoHandphone" class="form-group row">
		<label id="elh_t9901_perusahaan_NoHandphone" for="x_NoHandphone" class="<?php echo $t9901_perusahaan_add->LeftColumnClass ?>"><?php echo $t9901_perusahaan->NoHandphone->caption() ?><?php echo ($t9901_perusahaan->NoHandphone->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t9901_perusahaan_add->RightColumnClass ?>"><div<?php echo $t9901_perusahaan->NoHandphone->cellAttributes() ?>>
<span id="el_t9901_perusahaan_NoHandphone">
<input type="text" data-table="t9901_perusahaan" data-field="x_NoHandphone" name="x_NoHandphone" id="x_NoHandphone" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($t9901_perusahaan->NoHandphone->getPlaceHolder()) ?>" value="<?php echo $t9901_perusahaan->NoHandphone->EditValue ?>"<?php echo $t9901_perusahaan->NoHandphone->editAttributes() ?>>
</span>
<?php echo $t9901_perusahaan->NoHandphone->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$t9901_perusahaan_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t9901_perusahaan_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t9901_perusahaan_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t9901_perusahaan_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t9901_perusahaan_add->terminate();
?>