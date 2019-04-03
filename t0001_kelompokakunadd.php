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
$t0001_kelompokakun_add = new t0001_kelompokakun_add();

// Run the page
$t0001_kelompokakun_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0001_kelompokakun_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var ft0001_kelompokakunadd = currentForm = new ew.Form("ft0001_kelompokakunadd", "add");

// Validate form
ft0001_kelompokakunadd.validate = function() {
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
		<?php if ($t0001_kelompokakun_add->ID->Required) { ?>
			elm = this.getElements("x" + infix + "_ID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0001_kelompokakun->ID->caption(), $t0001_kelompokakun->ID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t0001_kelompokakun->ID->errorMessage()) ?>");
		<?php if ($t0001_kelompokakun_add->NamaAkun->Required) { ?>
			elm = this.getElements("x" + infix + "_NamaAkun");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0001_kelompokakun->NamaAkun->caption(), $t0001_kelompokakun->NamaAkun->RequiredErrorMessage)) ?>");
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
ft0001_kelompokakunadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0001_kelompokakunadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t0001_kelompokakun_add->showPageHeader(); ?>
<?php
$t0001_kelompokakun_add->showMessage();
?>
<form name="ft0001_kelompokakunadd" id="ft0001_kelompokakunadd" class="<?php echo $t0001_kelompokakun_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0001_kelompokakun_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0001_kelompokakun_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0001_kelompokakun">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$t0001_kelompokakun_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($t0001_kelompokakun->ID->Visible) { // ID ?>
	<div id="r_ID" class="form-group row">
		<label id="elh_t0001_kelompokakun_ID" for="x_ID" class="<?php echo $t0001_kelompokakun_add->LeftColumnClass ?>"><?php echo $t0001_kelompokakun->ID->caption() ?><?php echo ($t0001_kelompokakun->ID->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0001_kelompokakun_add->RightColumnClass ?>"><div<?php echo $t0001_kelompokakun->ID->cellAttributes() ?>>
<span id="el_t0001_kelompokakun_ID">
<input type="text" data-table="t0001_kelompokakun" data-field="x_ID" name="x_ID" id="x_ID" size="30" placeholder="<?php echo HtmlEncode($t0001_kelompokakun->ID->getPlaceHolder()) ?>" value="<?php echo $t0001_kelompokakun->ID->EditValue ?>"<?php echo $t0001_kelompokakun->ID->editAttributes() ?>>
</span>
<?php echo $t0001_kelompokakun->ID->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t0001_kelompokakun->NamaAkun->Visible) { // NamaAkun ?>
	<div id="r_NamaAkun" class="form-group row">
		<label id="elh_t0001_kelompokakun_NamaAkun" for="x_NamaAkun" class="<?php echo $t0001_kelompokakun_add->LeftColumnClass ?>"><?php echo $t0001_kelompokakun->NamaAkun->caption() ?><?php echo ($t0001_kelompokakun->NamaAkun->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0001_kelompokakun_add->RightColumnClass ?>"><div<?php echo $t0001_kelompokakun->NamaAkun->cellAttributes() ?>>
<span id="el_t0001_kelompokakun_NamaAkun">
<input type="text" data-table="t0001_kelompokakun" data-field="x_NamaAkun" name="x_NamaAkun" id="x_NamaAkun" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($t0001_kelompokakun->NamaAkun->getPlaceHolder()) ?>" value="<?php echo $t0001_kelompokakun->NamaAkun->EditValue ?>"<?php echo $t0001_kelompokakun->NamaAkun->editAttributes() ?>>
</span>
<?php echo $t0001_kelompokakun->NamaAkun->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$t0001_kelompokakun_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t0001_kelompokakun_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t0001_kelompokakun_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t0001_kelompokakun_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t0001_kelompokakun_add->terminate();
?>