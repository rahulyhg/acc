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
$t0004_jurnal_list = new t0004_jurnal_list();

// Run the page
$t0004_jurnal_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0004_jurnal_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t0004_jurnal->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var ft0004_jurnallist = currentForm = new ew.Form("ft0004_jurnallist", "list");
ft0004_jurnallist.formKeyCountName = '<?php echo $t0004_jurnal_list->FormKeyCountName ?>';

// Form_CustomValidate event
ft0004_jurnallist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0004_jurnallist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var ft0004_jurnallistsrch = currentSearchForm = new ew.Form("ft0004_jurnallistsrch");

// Filters
ft0004_jurnallistsrch.filterList = <?php echo $t0004_jurnal_list->getFilterList() ?>;
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
<?php if (!$t0004_jurnal->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t0004_jurnal_list->TotalRecs > 0 && $t0004_jurnal_list->ExportOptions->visible()) { ?>
<?php $t0004_jurnal_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t0004_jurnal_list->ImportOptions->visible()) { ?>
<?php $t0004_jurnal_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t0004_jurnal_list->SearchOptions->visible()) { ?>
<?php $t0004_jurnal_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t0004_jurnal_list->FilterOptions->visible()) { ?>
<?php $t0004_jurnal_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t0004_jurnal_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$t0004_jurnal->isExport() && !$t0004_jurnal->CurrentAction) { ?>
<form name="ft0004_jurnallistsrch" id="ft0004_jurnallistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($t0004_jurnal_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="ft0004_jurnallistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="t0004_jurnal">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($t0004_jurnal_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($t0004_jurnal_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $t0004_jurnal_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($t0004_jurnal_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($t0004_jurnal_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($t0004_jurnal_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($t0004_jurnal_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $t0004_jurnal_list->showPageHeader(); ?>
<?php
$t0004_jurnal_list->showMessage();
?>
<?php if ($t0004_jurnal_list->TotalRecs > 0 || $t0004_jurnal->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t0004_jurnal_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t0004_jurnal">
<form name="ft0004_jurnallist" id="ft0004_jurnallist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0004_jurnal_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0004_jurnal_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0004_jurnal">
<div id="gmp_t0004_jurnal" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($t0004_jurnal_list->TotalRecs > 0 || $t0004_jurnal->isGridEdit()) { ?>
<table id="tbl_t0004_jurnallist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t0004_jurnal_list->RowType = ROWTYPE_HEADER;

// Render list options
$t0004_jurnal_list->renderListOptions();

// Render list options (header, left)
$t0004_jurnal_list->ListOptions->render("header", "left");
?>
<?php if ($t0004_jurnal->ID->Visible) { // ID ?>
	<?php if ($t0004_jurnal->sortUrl($t0004_jurnal->ID) == "") { ?>
		<th data-name="ID" class="<?php echo $t0004_jurnal->ID->headerCellClass() ?>"><div id="elh_t0004_jurnal_ID" class="t0004_jurnal_ID"><div class="ew-table-header-caption"><?php echo $t0004_jurnal->ID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ID" class="<?php echo $t0004_jurnal->ID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t0004_jurnal->SortUrl($t0004_jurnal->ID) ?>',2);"><div id="elh_t0004_jurnal_ID" class="t0004_jurnal_ID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t0004_jurnal->ID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t0004_jurnal->ID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t0004_jurnal->ID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t0004_jurnal->Tipe->Visible) { // Tipe ?>
	<?php if ($t0004_jurnal->sortUrl($t0004_jurnal->Tipe) == "") { ?>
		<th data-name="Tipe" class="<?php echo $t0004_jurnal->Tipe->headerCellClass() ?>"><div id="elh_t0004_jurnal_Tipe" class="t0004_jurnal_Tipe"><div class="ew-table-header-caption"><?php echo $t0004_jurnal->Tipe->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tipe" class="<?php echo $t0004_jurnal->Tipe->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t0004_jurnal->SortUrl($t0004_jurnal->Tipe) ?>',2);"><div id="elh_t0004_jurnal_Tipe" class="t0004_jurnal_Tipe">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t0004_jurnal->Tipe->caption() ?></span><span class="ew-table-header-sort"><?php if ($t0004_jurnal->Tipe->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t0004_jurnal->Tipe->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t0004_jurnal->Tanggal->Visible) { // Tanggal ?>
	<?php if ($t0004_jurnal->sortUrl($t0004_jurnal->Tanggal) == "") { ?>
		<th data-name="Tanggal" class="<?php echo $t0004_jurnal->Tanggal->headerCellClass() ?>"><div id="elh_t0004_jurnal_Tanggal" class="t0004_jurnal_Tanggal"><div class="ew-table-header-caption"><?php echo $t0004_jurnal->Tanggal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tanggal" class="<?php echo $t0004_jurnal->Tanggal->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t0004_jurnal->SortUrl($t0004_jurnal->Tanggal) ?>',2);"><div id="elh_t0004_jurnal_Tanggal" class="t0004_jurnal_Tanggal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t0004_jurnal->Tanggal->caption() ?></span><span class="ew-table-header-sort"><?php if ($t0004_jurnal->Tanggal->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t0004_jurnal->Tanggal->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t0004_jurnal_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t0004_jurnal->ExportAll && $t0004_jurnal->isExport()) {
	$t0004_jurnal_list->StopRec = $t0004_jurnal_list->TotalRecs;
} else {

	// Set the last record to display
	if ($t0004_jurnal_list->TotalRecs > $t0004_jurnal_list->StartRec + $t0004_jurnal_list->DisplayRecs - 1)
		$t0004_jurnal_list->StopRec = $t0004_jurnal_list->StartRec + $t0004_jurnal_list->DisplayRecs - 1;
	else
		$t0004_jurnal_list->StopRec = $t0004_jurnal_list->TotalRecs;
}
$t0004_jurnal_list->RecCnt = $t0004_jurnal_list->StartRec - 1;
if ($t0004_jurnal_list->Recordset && !$t0004_jurnal_list->Recordset->EOF) {
	$t0004_jurnal_list->Recordset->moveFirst();
	$selectLimit = $t0004_jurnal_list->UseSelectLimit;
	if (!$selectLimit && $t0004_jurnal_list->StartRec > 1)
		$t0004_jurnal_list->Recordset->move($t0004_jurnal_list->StartRec - 1);
} elseif (!$t0004_jurnal->AllowAddDeleteRow && $t0004_jurnal_list->StopRec == 0) {
	$t0004_jurnal_list->StopRec = $t0004_jurnal->GridAddRowCount;
}

// Initialize aggregate
$t0004_jurnal->RowType = ROWTYPE_AGGREGATEINIT;
$t0004_jurnal->resetAttributes();
$t0004_jurnal_list->renderRow();
while ($t0004_jurnal_list->RecCnt < $t0004_jurnal_list->StopRec) {
	$t0004_jurnal_list->RecCnt++;
	if ($t0004_jurnal_list->RecCnt >= $t0004_jurnal_list->StartRec) {
		$t0004_jurnal_list->RowCnt++;

		// Set up key count
		$t0004_jurnal_list->KeyCount = $t0004_jurnal_list->RowIndex;

		// Init row class and style
		$t0004_jurnal->resetAttributes();
		$t0004_jurnal->CssClass = "";
		if ($t0004_jurnal->isGridAdd()) {
		} else {
			$t0004_jurnal_list->loadRowValues($t0004_jurnal_list->Recordset); // Load row values
		}
		$t0004_jurnal->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$t0004_jurnal->RowAttrs = array_merge($t0004_jurnal->RowAttrs, array('data-rowindex'=>$t0004_jurnal_list->RowCnt, 'id'=>'r' . $t0004_jurnal_list->RowCnt . '_t0004_jurnal', 'data-rowtype'=>$t0004_jurnal->RowType));

		// Render row
		$t0004_jurnal_list->renderRow();

		// Render list options
		$t0004_jurnal_list->renderListOptions();
?>
	<tr<?php echo $t0004_jurnal->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t0004_jurnal_list->ListOptions->render("body", "left", $t0004_jurnal_list->RowCnt);
?>
	<?php if ($t0004_jurnal->ID->Visible) { // ID ?>
		<td data-name="ID"<?php echo $t0004_jurnal->ID->cellAttributes() ?>>
<span id="el<?php echo $t0004_jurnal_list->RowCnt ?>_t0004_jurnal_ID" class="t0004_jurnal_ID">
<span<?php echo $t0004_jurnal->ID->viewAttributes() ?>>
<?php echo $t0004_jurnal->ID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t0004_jurnal->Tipe->Visible) { // Tipe ?>
		<td data-name="Tipe"<?php echo $t0004_jurnal->Tipe->cellAttributes() ?>>
<span id="el<?php echo $t0004_jurnal_list->RowCnt ?>_t0004_jurnal_Tipe" class="t0004_jurnal_Tipe">
<span<?php echo $t0004_jurnal->Tipe->viewAttributes() ?>>
<?php echo $t0004_jurnal->Tipe->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t0004_jurnal->Tanggal->Visible) { // Tanggal ?>
		<td data-name="Tanggal"<?php echo $t0004_jurnal->Tanggal->cellAttributes() ?>>
<span id="el<?php echo $t0004_jurnal_list->RowCnt ?>_t0004_jurnal_Tanggal" class="t0004_jurnal_Tanggal">
<span<?php echo $t0004_jurnal->Tanggal->viewAttributes() ?>>
<?php echo $t0004_jurnal->Tanggal->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t0004_jurnal_list->ListOptions->render("body", "right", $t0004_jurnal_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$t0004_jurnal->isGridAdd())
		$t0004_jurnal_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$t0004_jurnal->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t0004_jurnal_list->Recordset)
	$t0004_jurnal_list->Recordset->Close();
?>
<?php if (!$t0004_jurnal->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t0004_jurnal->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($t0004_jurnal_list->Pager)) $t0004_jurnal_list->Pager = new PrevNextPager($t0004_jurnal_list->StartRec, $t0004_jurnal_list->DisplayRecs, $t0004_jurnal_list->TotalRecs, $t0004_jurnal_list->AutoHidePager) ?>
<?php if ($t0004_jurnal_list->Pager->RecordCount > 0 && $t0004_jurnal_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($t0004_jurnal_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerFirst") ?>" href="<?php echo $t0004_jurnal_list->pageUrl() ?>start=<?php echo $t0004_jurnal_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($t0004_jurnal_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerPrevious") ?>" href="<?php echo $t0004_jurnal_list->pageUrl() ?>start=<?php echo $t0004_jurnal_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $t0004_jurnal_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($t0004_jurnal_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerNext") ?>" href="<?php echo $t0004_jurnal_list->pageUrl() ?>start=<?php echo $t0004_jurnal_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($t0004_jurnal_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerLast") ?>" href="<?php echo $t0004_jurnal_list->pageUrl() ?>start=<?php echo $t0004_jurnal_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $t0004_jurnal_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($t0004_jurnal_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t0004_jurnal_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t0004_jurnal_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t0004_jurnal_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($t0004_jurnal_list->TotalRecs > 0 && (!$t0004_jurnal_list->AutoHidePageSizeSelector || $t0004_jurnal_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="t0004_jurnal">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="10"<?php if ($t0004_jurnal_list->DisplayRecs == 10) { ?> selected<?php } ?>>10</option>
<option value="20"<?php if ($t0004_jurnal_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="50"<?php if ($t0004_jurnal_list->DisplayRecs == 50) { ?> selected<?php } ?>>50</option>
<option value="ALL"<?php if ($t0004_jurnal->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t0004_jurnal_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t0004_jurnal_list->TotalRecs == 0 && !$t0004_jurnal->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t0004_jurnal_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t0004_jurnal_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t0004_jurnal->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t0004_jurnal_list->terminate();
?>