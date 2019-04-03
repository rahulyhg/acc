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
$t0003_akun_add = new t0003_akun_add();

// Run the page
$t0003_akun_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0003_akun_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var ft0003_akunadd = currentForm = new ew.Form("ft0003_akunadd", "add");

// Validate form
ft0003_akunadd.validate = function() {
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
		<?php if ($t0003_akun_add->Kode->Required) { ?>
			elm = this.getElements("x" + infix + "_Kode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0003_akun->Kode->caption(), $t0003_akun->Kode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t0003_akun_add->NamaAkun->Required) { ?>
			elm = this.getElements("x" + infix + "_NamaAkun");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0003_akun->NamaAkun->caption(), $t0003_akun->NamaAkun->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t0003_akun_add->SubKlasifikasi->Required) { ?>
			elm = this.getElements("x" + infix + "_SubKlasifikasi");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0003_akun->SubKlasifikasi->caption(), $t0003_akun->SubKlasifikasi->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_SubKlasifikasi");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t0003_akun->SubKlasifikasi->errorMessage()) ?>");
		<?php if ($t0003_akun_add->Saldo->Required) { ?>
			elm = this.getElements("x" + infix + "_Saldo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0003_akun->Saldo->caption(), $t0003_akun->Saldo->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Saldo");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t0003_akun->Saldo->errorMessage()) ?>");

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
ft0003_akunadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0003_akunadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t0003_akun_add->showPageHeader(); ?>
<?php
$t0003_akun_add->showMessage();
?>
<form name="ft0003_akunadd" id="ft0003_akunadd" class="<?php echo $t0003_akun_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0003_akun_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0003_akun_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0003_akun">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$t0003_akun_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($t0003_akun->Kode->Visible) { // Kode ?>
	<div id="r_Kode" class="form-group row">
		<label id="elh_t0003_akun_Kode" for="x_Kode" class="<?php echo $t0003_akun_add->LeftColumnClass ?>"><?php echo $t0003_akun->Kode->caption() ?><?php echo ($t0003_akun->Kode->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0003_akun_add->RightColumnClass ?>"><div<?php echo $t0003_akun->Kode->cellAttributes() ?>>
<span id="el_t0003_akun_Kode">
<input type="text" data-table="t0003_akun" data-field="x_Kode" name="x_Kode" id="x_Kode" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($t0003_akun->Kode->getPlaceHolder()) ?>" value="<?php echo $t0003_akun->Kode->EditValue ?>"<?php echo $t0003_akun->Kode->editAttributes() ?>>
</span>
<?php echo $t0003_akun->Kode->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t0003_akun->NamaAkun->Visible) { // NamaAkun ?>
	<div id="r_NamaAkun" class="form-group row">
		<label id="elh_t0003_akun_NamaAkun" for="x_NamaAkun" class="<?php echo $t0003_akun_add->LeftColumnClass ?>"><?php echo $t0003_akun->NamaAkun->caption() ?><?php echo ($t0003_akun->NamaAkun->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0003_akun_add->RightColumnClass ?>"><div<?php echo $t0003_akun->NamaAkun->cellAttributes() ?>>
<span id="el_t0003_akun_NamaAkun">
<input type="text" data-table="t0003_akun" data-field="x_NamaAkun" name="x_NamaAkun" id="x_NamaAkun" size="30" maxlength="40" placeholder="<?php echo HtmlEncode($t0003_akun->NamaAkun->getPlaceHolder()) ?>" value="<?php echo $t0003_akun->NamaAkun->EditValue ?>"<?php echo $t0003_akun->NamaAkun->editAttributes() ?>>
</span>
<?php echo $t0003_akun->NamaAkun->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t0003_akun->SubKlasifikasi->Visible) { // SubKlasifikasi ?>
	<div id="r_SubKlasifikasi" class="form-group row">
		<label id="elh_t0003_akun_SubKlasifikasi" for="x_SubKlasifikasi" class="<?php echo $t0003_akun_add->LeftColumnClass ?>"><?php echo $t0003_akun->SubKlasifikasi->caption() ?><?php echo ($t0003_akun->SubKlasifikasi->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0003_akun_add->RightColumnClass ?>"><div<?php echo $t0003_akun->SubKlasifikasi->cellAttributes() ?>>
<span id="el_t0003_akun_SubKlasifikasi">
<input type="text" data-table="t0003_akun" data-field="x_SubKlasifikasi" name="x_SubKlasifikasi" id="x_SubKlasifikasi" size="30" placeholder="<?php echo HtmlEncode($t0003_akun->SubKlasifikasi->getPlaceHolder()) ?>" value="<?php echo $t0003_akun->SubKlasifikasi->EditValue ?>"<?php echo $t0003_akun->SubKlasifikasi->editAttributes() ?>>
</span>
<?php echo $t0003_akun->SubKlasifikasi->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t0003_akun->Saldo->Visible) { // Saldo ?>
	<div id="r_Saldo" class="form-group row">
		<label id="elh_t0003_akun_Saldo" for="x_Saldo" class="<?php echo $t0003_akun_add->LeftColumnClass ?>"><?php echo $t0003_akun->Saldo->caption() ?><?php echo ($t0003_akun->Saldo->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0003_akun_add->RightColumnClass ?>"><div<?php echo $t0003_akun->Saldo->cellAttributes() ?>>
<span id="el_t0003_akun_Saldo">
<input type="text" data-table="t0003_akun" data-field="x_Saldo" name="x_Saldo" id="x_Saldo" size="30" placeholder="<?php echo HtmlEncode($t0003_akun->Saldo->getPlaceHolder()) ?>" value="<?php echo $t0003_akun->Saldo->EditValue ?>"<?php echo $t0003_akun->Saldo->editAttributes() ?>>
</span>
<?php echo $t0003_akun->Saldo->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$t0003_akun_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t0003_akun_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t0003_akun_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t0003_akun_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t0003_akun_add->terminate();
?>