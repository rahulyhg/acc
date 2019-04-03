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
$t9999_audittrail_add = new t9999_audittrail_add();

// Run the page
$t9999_audittrail_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t9999_audittrail_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var ft9999_audittrailadd = currentForm = new ew.Form("ft9999_audittrailadd", "add");

// Validate form
ft9999_audittrailadd.validate = function() {
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
		<?php if ($t9999_audittrail_add->datetime->Required) { ?>
			elm = this.getElements("x" + infix + "_datetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t9999_audittrail->datetime->caption(), $t9999_audittrail->datetime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_datetime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t9999_audittrail->datetime->errorMessage()) ?>");
		<?php if ($t9999_audittrail_add->script->Required) { ?>
			elm = this.getElements("x" + infix + "_script");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t9999_audittrail->script->caption(), $t9999_audittrail->script->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t9999_audittrail_add->user->Required) { ?>
			elm = this.getElements("x" + infix + "_user");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t9999_audittrail->user->caption(), $t9999_audittrail->user->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t9999_audittrail_add->_action->Required) { ?>
			elm = this.getElements("x" + infix + "__action");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t9999_audittrail->_action->caption(), $t9999_audittrail->_action->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t9999_audittrail_add->_table->Required) { ?>
			elm = this.getElements("x" + infix + "__table");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t9999_audittrail->_table->caption(), $t9999_audittrail->_table->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t9999_audittrail_add->field->Required) { ?>
			elm = this.getElements("x" + infix + "_field");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t9999_audittrail->field->caption(), $t9999_audittrail->field->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t9999_audittrail_add->keyvalue->Required) { ?>
			elm = this.getElements("x" + infix + "_keyvalue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t9999_audittrail->keyvalue->caption(), $t9999_audittrail->keyvalue->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t9999_audittrail_add->oldvalue->Required) { ?>
			elm = this.getElements("x" + infix + "_oldvalue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t9999_audittrail->oldvalue->caption(), $t9999_audittrail->oldvalue->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t9999_audittrail_add->newvalue->Required) { ?>
			elm = this.getElements("x" + infix + "_newvalue");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t9999_audittrail->newvalue->caption(), $t9999_audittrail->newvalue->RequiredErrorMessage)) ?>");
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
ft9999_audittrailadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft9999_audittrailadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t9999_audittrail_add->showPageHeader(); ?>
<?php
$t9999_audittrail_add->showMessage();
?>
<form name="ft9999_audittrailadd" id="ft9999_audittrailadd" class="<?php echo $t9999_audittrail_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t9999_audittrail_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t9999_audittrail_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t9999_audittrail">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$t9999_audittrail_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($t9999_audittrail->datetime->Visible) { // datetime ?>
	<div id="r_datetime" class="form-group row">
		<label id="elh_t9999_audittrail_datetime" for="x_datetime" class="<?php echo $t9999_audittrail_add->LeftColumnClass ?>"><?php echo $t9999_audittrail->datetime->caption() ?><?php echo ($t9999_audittrail->datetime->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t9999_audittrail_add->RightColumnClass ?>"><div<?php echo $t9999_audittrail->datetime->cellAttributes() ?>>
<span id="el_t9999_audittrail_datetime">
<input type="text" data-table="t9999_audittrail" data-field="x_datetime" name="x_datetime" id="x_datetime" placeholder="<?php echo HtmlEncode($t9999_audittrail->datetime->getPlaceHolder()) ?>" value="<?php echo $t9999_audittrail->datetime->EditValue ?>"<?php echo $t9999_audittrail->datetime->editAttributes() ?>>
<?php if (!$t9999_audittrail->datetime->ReadOnly && !$t9999_audittrail->datetime->Disabled && !isset($t9999_audittrail->datetime->EditAttrs["readonly"]) && !isset($t9999_audittrail->datetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("ft9999_audittrailadd", "x_datetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php echo $t9999_audittrail->datetime->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t9999_audittrail->script->Visible) { // script ?>
	<div id="r_script" class="form-group row">
		<label id="elh_t9999_audittrail_script" for="x_script" class="<?php echo $t9999_audittrail_add->LeftColumnClass ?>"><?php echo $t9999_audittrail->script->caption() ?><?php echo ($t9999_audittrail->script->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t9999_audittrail_add->RightColumnClass ?>"><div<?php echo $t9999_audittrail->script->cellAttributes() ?>>
<span id="el_t9999_audittrail_script">
<input type="text" data-table="t9999_audittrail" data-field="x_script" name="x_script" id="x_script" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($t9999_audittrail->script->getPlaceHolder()) ?>" value="<?php echo $t9999_audittrail->script->EditValue ?>"<?php echo $t9999_audittrail->script->editAttributes() ?>>
</span>
<?php echo $t9999_audittrail->script->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t9999_audittrail->user->Visible) { // user ?>
	<div id="r_user" class="form-group row">
		<label id="elh_t9999_audittrail_user" for="x_user" class="<?php echo $t9999_audittrail_add->LeftColumnClass ?>"><?php echo $t9999_audittrail->user->caption() ?><?php echo ($t9999_audittrail->user->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t9999_audittrail_add->RightColumnClass ?>"><div<?php echo $t9999_audittrail->user->cellAttributes() ?>>
<span id="el_t9999_audittrail_user">
<input type="text" data-table="t9999_audittrail" data-field="x_user" name="x_user" id="x_user" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($t9999_audittrail->user->getPlaceHolder()) ?>" value="<?php echo $t9999_audittrail->user->EditValue ?>"<?php echo $t9999_audittrail->user->editAttributes() ?>>
</span>
<?php echo $t9999_audittrail->user->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t9999_audittrail->_action->Visible) { // action ?>
	<div id="r__action" class="form-group row">
		<label id="elh_t9999_audittrail__action" for="x__action" class="<?php echo $t9999_audittrail_add->LeftColumnClass ?>"><?php echo $t9999_audittrail->_action->caption() ?><?php echo ($t9999_audittrail->_action->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t9999_audittrail_add->RightColumnClass ?>"><div<?php echo $t9999_audittrail->_action->cellAttributes() ?>>
<span id="el_t9999_audittrail__action">
<input type="text" data-table="t9999_audittrail" data-field="x__action" name="x__action" id="x__action" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($t9999_audittrail->_action->getPlaceHolder()) ?>" value="<?php echo $t9999_audittrail->_action->EditValue ?>"<?php echo $t9999_audittrail->_action->editAttributes() ?>>
</span>
<?php echo $t9999_audittrail->_action->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t9999_audittrail->_table->Visible) { // table ?>
	<div id="r__table" class="form-group row">
		<label id="elh_t9999_audittrail__table" for="x__table" class="<?php echo $t9999_audittrail_add->LeftColumnClass ?>"><?php echo $t9999_audittrail->_table->caption() ?><?php echo ($t9999_audittrail->_table->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t9999_audittrail_add->RightColumnClass ?>"><div<?php echo $t9999_audittrail->_table->cellAttributes() ?>>
<span id="el_t9999_audittrail__table">
<input type="text" data-table="t9999_audittrail" data-field="x__table" name="x__table" id="x__table" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($t9999_audittrail->_table->getPlaceHolder()) ?>" value="<?php echo $t9999_audittrail->_table->EditValue ?>"<?php echo $t9999_audittrail->_table->editAttributes() ?>>
</span>
<?php echo $t9999_audittrail->_table->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t9999_audittrail->field->Visible) { // field ?>
	<div id="r_field" class="form-group row">
		<label id="elh_t9999_audittrail_field" for="x_field" class="<?php echo $t9999_audittrail_add->LeftColumnClass ?>"><?php echo $t9999_audittrail->field->caption() ?><?php echo ($t9999_audittrail->field->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t9999_audittrail_add->RightColumnClass ?>"><div<?php echo $t9999_audittrail->field->cellAttributes() ?>>
<span id="el_t9999_audittrail_field">
<input type="text" data-table="t9999_audittrail" data-field="x_field" name="x_field" id="x_field" size="30" maxlength="80" placeholder="<?php echo HtmlEncode($t9999_audittrail->field->getPlaceHolder()) ?>" value="<?php echo $t9999_audittrail->field->EditValue ?>"<?php echo $t9999_audittrail->field->editAttributes() ?>>
</span>
<?php echo $t9999_audittrail->field->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t9999_audittrail->keyvalue->Visible) { // keyvalue ?>
	<div id="r_keyvalue" class="form-group row">
		<label id="elh_t9999_audittrail_keyvalue" for="x_keyvalue" class="<?php echo $t9999_audittrail_add->LeftColumnClass ?>"><?php echo $t9999_audittrail->keyvalue->caption() ?><?php echo ($t9999_audittrail->keyvalue->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t9999_audittrail_add->RightColumnClass ?>"><div<?php echo $t9999_audittrail->keyvalue->cellAttributes() ?>>
<span id="el_t9999_audittrail_keyvalue">
<textarea data-table="t9999_audittrail" data-field="x_keyvalue" name="x_keyvalue" id="x_keyvalue" cols="35" rows="4" placeholder="<?php echo HtmlEncode($t9999_audittrail->keyvalue->getPlaceHolder()) ?>"<?php echo $t9999_audittrail->keyvalue->editAttributes() ?>><?php echo $t9999_audittrail->keyvalue->EditValue ?></textarea>
</span>
<?php echo $t9999_audittrail->keyvalue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t9999_audittrail->oldvalue->Visible) { // oldvalue ?>
	<div id="r_oldvalue" class="form-group row">
		<label id="elh_t9999_audittrail_oldvalue" for="x_oldvalue" class="<?php echo $t9999_audittrail_add->LeftColumnClass ?>"><?php echo $t9999_audittrail->oldvalue->caption() ?><?php echo ($t9999_audittrail->oldvalue->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t9999_audittrail_add->RightColumnClass ?>"><div<?php echo $t9999_audittrail->oldvalue->cellAttributes() ?>>
<span id="el_t9999_audittrail_oldvalue">
<textarea data-table="t9999_audittrail" data-field="x_oldvalue" name="x_oldvalue" id="x_oldvalue" cols="35" rows="4" placeholder="<?php echo HtmlEncode($t9999_audittrail->oldvalue->getPlaceHolder()) ?>"<?php echo $t9999_audittrail->oldvalue->editAttributes() ?>><?php echo $t9999_audittrail->oldvalue->EditValue ?></textarea>
</span>
<?php echo $t9999_audittrail->oldvalue->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t9999_audittrail->newvalue->Visible) { // newvalue ?>
	<div id="r_newvalue" class="form-group row">
		<label id="elh_t9999_audittrail_newvalue" for="x_newvalue" class="<?php echo $t9999_audittrail_add->LeftColumnClass ?>"><?php echo $t9999_audittrail->newvalue->caption() ?><?php echo ($t9999_audittrail->newvalue->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t9999_audittrail_add->RightColumnClass ?>"><div<?php echo $t9999_audittrail->newvalue->cellAttributes() ?>>
<span id="el_t9999_audittrail_newvalue">
<textarea data-table="t9999_audittrail" data-field="x_newvalue" name="x_newvalue" id="x_newvalue" cols="35" rows="4" placeholder="<?php echo HtmlEncode($t9999_audittrail->newvalue->getPlaceHolder()) ?>"<?php echo $t9999_audittrail->newvalue->editAttributes() ?>><?php echo $t9999_audittrail->newvalue->EditValue ?></textarea>
</span>
<?php echo $t9999_audittrail->newvalue->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$t9999_audittrail_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t9999_audittrail_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t9999_audittrail_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t9999_audittrail_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t9999_audittrail_add->terminate();
?>