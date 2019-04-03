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
$t9900_periode_list = new t9900_periode_list();

// Run the page
$t9900_periode_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t9900_periode_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t9900_periode->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var ft9900_periodelist = currentForm = new ew.Form("ft9900_periodelist", "list");
ft9900_periodelist.formKeyCountName = '<?php echo $t9900_periode_list->FormKeyCountName ?>';

// Form_CustomValidate event
ft9900_periodelist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft9900_periodelist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft9900_periodelist.lists["x_Aktif"] = <?php echo $t9900_periode_list->Aktif->Lookup->toClientList() ?>;
ft9900_periodelist.lists["x_Aktif"].options = <?php echo JsonEncode($t9900_periode_list->Aktif->options(FALSE, TRUE)) ?>;

// Form object for search
var ft9900_periodelistsrch = currentSearchForm = new ew.Form("ft9900_periodelistsrch");

// Validate function for search
ft9900_periodelistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
ft9900_periodelistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft9900_periodelistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft9900_periodelistsrch.lists["x_Aktif"] = <?php echo $t9900_periode_list->Aktif->Lookup->toClientList() ?>;
ft9900_periodelistsrch.lists["x_Aktif"].options = <?php echo JsonEncode($t9900_periode_list->Aktif->options(FALSE, TRUE)) ?>;

// Filters
ft9900_periodelistsrch.filterList = <?php echo $t9900_periode_list->getFilterList() ?>;
</script>
<style type="text/css">
.ew-table-preview-row { /* main table preview row color */
	background-color: #FFFFFF; /* preview row color */
}
.ew-table-preview-row .ew-grid {
	display: table;
}
</style>
<div id="ew-preview" class="d-none"><!-- preview -->
	<div class="ew-nav-tabs"><!-- .ew-nav-tabs -->
		<ul class="nav nav-tabs"></ul>
		<div class="tab-content"><!-- .tab-content -->
			<div class="tab-pane fade active show"></div>
		</div><!-- /.tab-content -->
	</div><!-- /.ew-nav-tabs -->
</div><!-- /preview -->
<script src="phpjs/ewpreview.js"></script>
<script>
ew.PREVIEW_PLACEMENT = ew.CSS_FLIP ? "right" : "left";
ew.PREVIEW_SINGLE_ROW = false;
ew.PREVIEW_OVERLAY = false;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$t9900_periode->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t9900_periode_list->TotalRecs > 0 && $t9900_periode_list->ExportOptions->visible()) { ?>
<?php $t9900_periode_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t9900_periode_list->ImportOptions->visible()) { ?>
<?php $t9900_periode_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t9900_periode_list->SearchOptions->visible()) { ?>
<?php $t9900_periode_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t9900_periode_list->FilterOptions->visible()) { ?>
<?php $t9900_periode_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t9900_periode_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$t9900_periode->isExport() && !$t9900_periode->CurrentAction) { ?>
<form name="ft9900_periodelistsrch" id="ft9900_periodelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($t9900_periode_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="ft9900_periodelistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="t9900_periode">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$t9900_periode_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$t9900_periode->RowType = ROWTYPE_SEARCH;

// Render row
$t9900_periode->resetAttributes();
$t9900_periode_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($t9900_periode->Aktif->Visible) { // Aktif ?>
	<div id="xsc_Aktif" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $t9900_periode->Aktif->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_Aktif" id="z_Aktif" value="="></span>
		<span class="ew-search-field">
<div id="tp_x_Aktif" class="ew-template"><input type="radio" class="form-check-input" data-table="t9900_periode" data-field="x_Aktif" data-value-separator="<?php echo $t9900_periode->Aktif->displayValueSeparatorAttribute() ?>" name="x_Aktif" id="x_Aktif" value="{value}"<?php echo $t9900_periode->Aktif->editAttributes() ?>></div>
<div id="dsl_x_Aktif" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $t9900_periode->Aktif->radioButtonListHtml(FALSE, "x_Aktif") ?>
</div></div>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
	<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $t9900_periode_list->showPageHeader(); ?>
<?php
$t9900_periode_list->showMessage();
?>
<?php if ($t9900_periode_list->TotalRecs > 0 || $t9900_periode->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t9900_periode_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t9900_periode">
<form name="ft9900_periodelist" id="ft9900_periodelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t9900_periode_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t9900_periode_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t9900_periode">
<div id="gmp_t9900_periode" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($t9900_periode_list->TotalRecs > 0 || $t9900_periode->isGridEdit()) { ?>
<table id="tbl_t9900_periodelist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t9900_periode_list->RowType = ROWTYPE_HEADER;

// Render list options
$t9900_periode_list->renderListOptions();

// Render list options (header, left)
$t9900_periode_list->ListOptions->render("header", "left");
?>
<?php if ($t9900_periode->Awal->Visible) { // Awal ?>
	<?php if ($t9900_periode->sortUrl($t9900_periode->Awal) == "") { ?>
		<th data-name="Awal" class="<?php echo $t9900_periode->Awal->headerCellClass() ?>"><div id="elh_t9900_periode_Awal" class="t9900_periode_Awal"><div class="ew-table-header-caption"><?php echo $t9900_periode->Awal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Awal" class="<?php echo $t9900_periode->Awal->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t9900_periode->SortUrl($t9900_periode->Awal) ?>',2);"><div id="elh_t9900_periode_Awal" class="t9900_periode_Awal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t9900_periode->Awal->caption() ?></span><span class="ew-table-header-sort"><?php if ($t9900_periode->Awal->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t9900_periode->Awal->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t9900_periode->Akhir->Visible) { // Akhir ?>
	<?php if ($t9900_periode->sortUrl($t9900_periode->Akhir) == "") { ?>
		<th data-name="Akhir" class="<?php echo $t9900_periode->Akhir->headerCellClass() ?>"><div id="elh_t9900_periode_Akhir" class="t9900_periode_Akhir"><div class="ew-table-header-caption"><?php echo $t9900_periode->Akhir->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Akhir" class="<?php echo $t9900_periode->Akhir->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t9900_periode->SortUrl($t9900_periode->Akhir) ?>',2);"><div id="elh_t9900_periode_Akhir" class="t9900_periode_Akhir">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t9900_periode->Akhir->caption() ?></span><span class="ew-table-header-sort"><?php if ($t9900_periode->Akhir->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t9900_periode->Akhir->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t9900_periode->Aktif->Visible) { // Aktif ?>
	<?php if ($t9900_periode->sortUrl($t9900_periode->Aktif) == "") { ?>
		<th data-name="Aktif" class="<?php echo $t9900_periode->Aktif->headerCellClass() ?>"><div id="elh_t9900_periode_Aktif" class="t9900_periode_Aktif"><div class="ew-table-header-caption"><?php echo $t9900_periode->Aktif->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Aktif" class="<?php echo $t9900_periode->Aktif->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t9900_periode->SortUrl($t9900_periode->Aktif) ?>',2);"><div id="elh_t9900_periode_Aktif" class="t9900_periode_Aktif">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t9900_periode->Aktif->caption() ?></span><span class="ew-table-header-sort"><?php if ($t9900_periode->Aktif->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t9900_periode->Aktif->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t9900_periode_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t9900_periode->ExportAll && $t9900_periode->isExport()) {
	$t9900_periode_list->StopRec = $t9900_periode_list->TotalRecs;
} else {

	// Set the last record to display
	if ($t9900_periode_list->TotalRecs > $t9900_periode_list->StartRec + $t9900_periode_list->DisplayRecs - 1)
		$t9900_periode_list->StopRec = $t9900_periode_list->StartRec + $t9900_periode_list->DisplayRecs - 1;
	else
		$t9900_periode_list->StopRec = $t9900_periode_list->TotalRecs;
}
$t9900_periode_list->RecCnt = $t9900_periode_list->StartRec - 1;
if ($t9900_periode_list->Recordset && !$t9900_periode_list->Recordset->EOF) {
	$t9900_periode_list->Recordset->moveFirst();
	$selectLimit = $t9900_periode_list->UseSelectLimit;
	if (!$selectLimit && $t9900_periode_list->StartRec > 1)
		$t9900_periode_list->Recordset->move($t9900_periode_list->StartRec - 1);
} elseif (!$t9900_periode->AllowAddDeleteRow && $t9900_periode_list->StopRec == 0) {
	$t9900_periode_list->StopRec = $t9900_periode->GridAddRowCount;
}

// Initialize aggregate
$t9900_periode->RowType = ROWTYPE_AGGREGATEINIT;
$t9900_periode->resetAttributes();
$t9900_periode_list->renderRow();
while ($t9900_periode_list->RecCnt < $t9900_periode_list->StopRec) {
	$t9900_periode_list->RecCnt++;
	if ($t9900_periode_list->RecCnt >= $t9900_periode_list->StartRec) {
		$t9900_periode_list->RowCnt++;

		// Set up key count
		$t9900_periode_list->KeyCount = $t9900_periode_list->RowIndex;

		// Init row class and style
		$t9900_periode->resetAttributes();
		$t9900_periode->CssClass = "";
		if ($t9900_periode->isGridAdd()) {
		} else {
			$t9900_periode_list->loadRowValues($t9900_periode_list->Recordset); // Load row values
		}
		$t9900_periode->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$t9900_periode->RowAttrs = array_merge($t9900_periode->RowAttrs, array('data-rowindex'=>$t9900_periode_list->RowCnt, 'id'=>'r' . $t9900_periode_list->RowCnt . '_t9900_periode', 'data-rowtype'=>$t9900_periode->RowType));

		// Render row
		$t9900_periode_list->renderRow();

		// Render list options
		$t9900_periode_list->renderListOptions();
?>
	<tr<?php echo $t9900_periode->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t9900_periode_list->ListOptions->render("body", "left", $t9900_periode_list->RowCnt);
?>
	<?php if ($t9900_periode->Awal->Visible) { // Awal ?>
		<td data-name="Awal"<?php echo $t9900_periode->Awal->cellAttributes() ?>>
<span id="el<?php echo $t9900_periode_list->RowCnt ?>_t9900_periode_Awal" class="t9900_periode_Awal">
<span<?php echo $t9900_periode->Awal->viewAttributes() ?>>
<?php echo $t9900_periode->Awal->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t9900_periode->Akhir->Visible) { // Akhir ?>
		<td data-name="Akhir"<?php echo $t9900_periode->Akhir->cellAttributes() ?>>
<span id="el<?php echo $t9900_periode_list->RowCnt ?>_t9900_periode_Akhir" class="t9900_periode_Akhir">
<span<?php echo $t9900_periode->Akhir->viewAttributes() ?>>
<?php echo $t9900_periode->Akhir->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t9900_periode->Aktif->Visible) { // Aktif ?>
		<td data-name="Aktif"<?php echo $t9900_periode->Aktif->cellAttributes() ?>>
<span id="el<?php echo $t9900_periode_list->RowCnt ?>_t9900_periode_Aktif" class="t9900_periode_Aktif">
<span<?php echo $t9900_periode->Aktif->viewAttributes() ?>>
<?php echo $t9900_periode->Aktif->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t9900_periode_list->ListOptions->render("body", "right", $t9900_periode_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$t9900_periode->isGridAdd())
		$t9900_periode_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$t9900_periode->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t9900_periode_list->Recordset)
	$t9900_periode_list->Recordset->Close();
?>
<?php if (!$t9900_periode->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t9900_periode->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($t9900_periode_list->Pager)) $t9900_periode_list->Pager = new PrevNextPager($t9900_periode_list->StartRec, $t9900_periode_list->DisplayRecs, $t9900_periode_list->TotalRecs, $t9900_periode_list->AutoHidePager) ?>
<?php if ($t9900_periode_list->Pager->RecordCount > 0 && $t9900_periode_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($t9900_periode_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerFirst") ?>" href="<?php echo $t9900_periode_list->pageUrl() ?>start=<?php echo $t9900_periode_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($t9900_periode_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerPrevious") ?>" href="<?php echo $t9900_periode_list->pageUrl() ?>start=<?php echo $t9900_periode_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $t9900_periode_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($t9900_periode_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerNext") ?>" href="<?php echo $t9900_periode_list->pageUrl() ?>start=<?php echo $t9900_periode_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($t9900_periode_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerLast") ?>" href="<?php echo $t9900_periode_list->pageUrl() ?>start=<?php echo $t9900_periode_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $t9900_periode_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($t9900_periode_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t9900_periode_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t9900_periode_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t9900_periode_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($t9900_periode_list->TotalRecs > 0 && (!$t9900_periode_list->AutoHidePageSizeSelector || $t9900_periode_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="t9900_periode">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="10"<?php if ($t9900_periode_list->DisplayRecs == 10) { ?> selected<?php } ?>>10</option>
<option value="20"<?php if ($t9900_periode_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="50"<?php if ($t9900_periode_list->DisplayRecs == 50) { ?> selected<?php } ?>>50</option>
<option value="ALL"<?php if ($t9900_periode->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t9900_periode_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t9900_periode_list->TotalRecs == 0 && !$t9900_periode->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t9900_periode_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t9900_periode_list->showPageFooter();
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
$t9900_periode_list->terminate();
?>