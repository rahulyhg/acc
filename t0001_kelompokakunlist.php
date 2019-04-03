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
$t0001_kelompokakun_list = new t0001_kelompokakun_list();

// Run the page
$t0001_kelompokakun_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0001_kelompokakun_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t0001_kelompokakun->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var ft0001_kelompokakunlist = currentForm = new ew.Form("ft0001_kelompokakunlist", "list");
ft0001_kelompokakunlist.formKeyCountName = '<?php echo $t0001_kelompokakun_list->FormKeyCountName ?>';

// Form_CustomValidate event
ft0001_kelompokakunlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0001_kelompokakunlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var ft0001_kelompokakunlistsrch = currentSearchForm = new ew.Form("ft0001_kelompokakunlistsrch");

// Filters
ft0001_kelompokakunlistsrch.filterList = <?php echo $t0001_kelompokakun_list->getFilterList() ?>;
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
<?php if (!$t0001_kelompokakun->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t0001_kelompokakun_list->TotalRecs > 0 && $t0001_kelompokakun_list->ExportOptions->visible()) { ?>
<?php $t0001_kelompokakun_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t0001_kelompokakun_list->ImportOptions->visible()) { ?>
<?php $t0001_kelompokakun_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t0001_kelompokakun_list->SearchOptions->visible()) { ?>
<?php $t0001_kelompokakun_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t0001_kelompokakun_list->FilterOptions->visible()) { ?>
<?php $t0001_kelompokakun_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t0001_kelompokakun_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$t0001_kelompokakun->isExport() && !$t0001_kelompokakun->CurrentAction) { ?>
<form name="ft0001_kelompokakunlistsrch" id="ft0001_kelompokakunlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($t0001_kelompokakun_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="ft0001_kelompokakunlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="t0001_kelompokakun">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($t0001_kelompokakun_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($t0001_kelompokakun_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $t0001_kelompokakun_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($t0001_kelompokakun_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($t0001_kelompokakun_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($t0001_kelompokakun_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($t0001_kelompokakun_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $t0001_kelompokakun_list->showPageHeader(); ?>
<?php
$t0001_kelompokakun_list->showMessage();
?>
<?php if ($t0001_kelompokakun_list->TotalRecs > 0 || $t0001_kelompokakun->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t0001_kelompokakun_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t0001_kelompokakun">
<form name="ft0001_kelompokakunlist" id="ft0001_kelompokakunlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0001_kelompokakun_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0001_kelompokakun_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0001_kelompokakun">
<div id="gmp_t0001_kelompokakun" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($t0001_kelompokakun_list->TotalRecs > 0 || $t0001_kelompokakun->isGridEdit()) { ?>
<table id="tbl_t0001_kelompokakunlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t0001_kelompokakun_list->RowType = ROWTYPE_HEADER;

// Render list options
$t0001_kelompokakun_list->renderListOptions();

// Render list options (header, left)
$t0001_kelompokakun_list->ListOptions->render("header", "left");
?>
<?php if ($t0001_kelompokakun->ID->Visible) { // ID ?>
	<?php if ($t0001_kelompokakun->sortUrl($t0001_kelompokakun->ID) == "") { ?>
		<th data-name="ID" class="<?php echo $t0001_kelompokakun->ID->headerCellClass() ?>"><div id="elh_t0001_kelompokakun_ID" class="t0001_kelompokakun_ID"><div class="ew-table-header-caption"><?php echo $t0001_kelompokakun->ID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ID" class="<?php echo $t0001_kelompokakun->ID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t0001_kelompokakun->SortUrl($t0001_kelompokakun->ID) ?>',2);"><div id="elh_t0001_kelompokakun_ID" class="t0001_kelompokakun_ID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t0001_kelompokakun->ID->caption() ?></span><span class="ew-table-header-sort"><?php if ($t0001_kelompokakun->ID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t0001_kelompokakun->ID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t0001_kelompokakun->NamaAkun->Visible) { // NamaAkun ?>
	<?php if ($t0001_kelompokakun->sortUrl($t0001_kelompokakun->NamaAkun) == "") { ?>
		<th data-name="NamaAkun" class="<?php echo $t0001_kelompokakun->NamaAkun->headerCellClass() ?>"><div id="elh_t0001_kelompokakun_NamaAkun" class="t0001_kelompokakun_NamaAkun"><div class="ew-table-header-caption"><?php echo $t0001_kelompokakun->NamaAkun->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NamaAkun" class="<?php echo $t0001_kelompokakun->NamaAkun->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t0001_kelompokakun->SortUrl($t0001_kelompokakun->NamaAkun) ?>',2);"><div id="elh_t0001_kelompokakun_NamaAkun" class="t0001_kelompokakun_NamaAkun">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t0001_kelompokakun->NamaAkun->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t0001_kelompokakun->NamaAkun->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t0001_kelompokakun->NamaAkun->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t0001_kelompokakun_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t0001_kelompokakun->ExportAll && $t0001_kelompokakun->isExport()) {
	$t0001_kelompokakun_list->StopRec = $t0001_kelompokakun_list->TotalRecs;
} else {

	// Set the last record to display
	if ($t0001_kelompokakun_list->TotalRecs > $t0001_kelompokakun_list->StartRec + $t0001_kelompokakun_list->DisplayRecs - 1)
		$t0001_kelompokakun_list->StopRec = $t0001_kelompokakun_list->StartRec + $t0001_kelompokakun_list->DisplayRecs - 1;
	else
		$t0001_kelompokakun_list->StopRec = $t0001_kelompokakun_list->TotalRecs;
}
$t0001_kelompokakun_list->RecCnt = $t0001_kelompokakun_list->StartRec - 1;
if ($t0001_kelompokakun_list->Recordset && !$t0001_kelompokakun_list->Recordset->EOF) {
	$t0001_kelompokakun_list->Recordset->moveFirst();
	$selectLimit = $t0001_kelompokakun_list->UseSelectLimit;
	if (!$selectLimit && $t0001_kelompokakun_list->StartRec > 1)
		$t0001_kelompokakun_list->Recordset->move($t0001_kelompokakun_list->StartRec - 1);
} elseif (!$t0001_kelompokakun->AllowAddDeleteRow && $t0001_kelompokakun_list->StopRec == 0) {
	$t0001_kelompokakun_list->StopRec = $t0001_kelompokakun->GridAddRowCount;
}

// Initialize aggregate
$t0001_kelompokakun->RowType = ROWTYPE_AGGREGATEINIT;
$t0001_kelompokakun->resetAttributes();
$t0001_kelompokakun_list->renderRow();
while ($t0001_kelompokakun_list->RecCnt < $t0001_kelompokakun_list->StopRec) {
	$t0001_kelompokakun_list->RecCnt++;
	if ($t0001_kelompokakun_list->RecCnt >= $t0001_kelompokakun_list->StartRec) {
		$t0001_kelompokakun_list->RowCnt++;

		// Set up key count
		$t0001_kelompokakun_list->KeyCount = $t0001_kelompokakun_list->RowIndex;

		// Init row class and style
		$t0001_kelompokakun->resetAttributes();
		$t0001_kelompokakun->CssClass = "";
		if ($t0001_kelompokakun->isGridAdd()) {
		} else {
			$t0001_kelompokakun_list->loadRowValues($t0001_kelompokakun_list->Recordset); // Load row values
		}
		$t0001_kelompokakun->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$t0001_kelompokakun->RowAttrs = array_merge($t0001_kelompokakun->RowAttrs, array('data-rowindex'=>$t0001_kelompokakun_list->RowCnt, 'id'=>'r' . $t0001_kelompokakun_list->RowCnt . '_t0001_kelompokakun', 'data-rowtype'=>$t0001_kelompokakun->RowType));

		// Render row
		$t0001_kelompokakun_list->renderRow();

		// Render list options
		$t0001_kelompokakun_list->renderListOptions();
?>
	<tr<?php echo $t0001_kelompokakun->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t0001_kelompokakun_list->ListOptions->render("body", "left", $t0001_kelompokakun_list->RowCnt);
?>
	<?php if ($t0001_kelompokakun->ID->Visible) { // ID ?>
		<td data-name="ID"<?php echo $t0001_kelompokakun->ID->cellAttributes() ?>>
<span id="el<?php echo $t0001_kelompokakun_list->RowCnt ?>_t0001_kelompokakun_ID" class="t0001_kelompokakun_ID">
<span<?php echo $t0001_kelompokakun->ID->viewAttributes() ?>>
<?php echo $t0001_kelompokakun->ID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t0001_kelompokakun->NamaAkun->Visible) { // NamaAkun ?>
		<td data-name="NamaAkun"<?php echo $t0001_kelompokakun->NamaAkun->cellAttributes() ?>>
<span id="el<?php echo $t0001_kelompokakun_list->RowCnt ?>_t0001_kelompokakun_NamaAkun" class="t0001_kelompokakun_NamaAkun">
<span<?php echo $t0001_kelompokakun->NamaAkun->viewAttributes() ?>>
<?php echo $t0001_kelompokakun->NamaAkun->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t0001_kelompokakun_list->ListOptions->render("body", "right", $t0001_kelompokakun_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$t0001_kelompokakun->isGridAdd())
		$t0001_kelompokakun_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$t0001_kelompokakun->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t0001_kelompokakun_list->Recordset)
	$t0001_kelompokakun_list->Recordset->Close();
?>
<?php if (!$t0001_kelompokakun->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t0001_kelompokakun->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($t0001_kelompokakun_list->Pager)) $t0001_kelompokakun_list->Pager = new PrevNextPager($t0001_kelompokakun_list->StartRec, $t0001_kelompokakun_list->DisplayRecs, $t0001_kelompokakun_list->TotalRecs, $t0001_kelompokakun_list->AutoHidePager) ?>
<?php if ($t0001_kelompokakun_list->Pager->RecordCount > 0 && $t0001_kelompokakun_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($t0001_kelompokakun_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerFirst") ?>" href="<?php echo $t0001_kelompokakun_list->pageUrl() ?>start=<?php echo $t0001_kelompokakun_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($t0001_kelompokakun_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerPrevious") ?>" href="<?php echo $t0001_kelompokakun_list->pageUrl() ?>start=<?php echo $t0001_kelompokakun_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $t0001_kelompokakun_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($t0001_kelompokakun_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerNext") ?>" href="<?php echo $t0001_kelompokakun_list->pageUrl() ?>start=<?php echo $t0001_kelompokakun_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($t0001_kelompokakun_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerLast") ?>" href="<?php echo $t0001_kelompokakun_list->pageUrl() ?>start=<?php echo $t0001_kelompokakun_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $t0001_kelompokakun_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($t0001_kelompokakun_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t0001_kelompokakun_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t0001_kelompokakun_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t0001_kelompokakun_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($t0001_kelompokakun_list->TotalRecs > 0 && (!$t0001_kelompokakun_list->AutoHidePageSizeSelector || $t0001_kelompokakun_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="t0001_kelompokakun">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="10"<?php if ($t0001_kelompokakun_list->DisplayRecs == 10) { ?> selected<?php } ?>>10</option>
<option value="20"<?php if ($t0001_kelompokakun_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="50"<?php if ($t0001_kelompokakun_list->DisplayRecs == 50) { ?> selected<?php } ?>>50</option>
<option value="ALL"<?php if ($t0001_kelompokakun->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t0001_kelompokakun_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t0001_kelompokakun_list->TotalRecs == 0 && !$t0001_kelompokakun->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t0001_kelompokakun_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t0001_kelompokakun_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t0001_kelompokakun->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t0001_kelompokakun_list->terminate();
?>