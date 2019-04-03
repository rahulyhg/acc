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
$t0002_subklasakun_list = new t0002_subklasakun_list();

// Run the page
$t0002_subklasakun_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0002_subklasakun_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t0002_subklasakun->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var ft0002_subklasakunlist = currentForm = new ew.Form("ft0002_subklasakunlist", "list");
ft0002_subklasakunlist.formKeyCountName = '<?php echo $t0002_subklasakun_list->FormKeyCountName ?>';

// Form_CustomValidate event
ft0002_subklasakunlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0002_subklasakunlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var ft0002_subklasakunlistsrch = currentSearchForm = new ew.Form("ft0002_subklasakunlistsrch");

// Filters
ft0002_subklasakunlistsrch.filterList = <?php echo $t0002_subklasakun_list->getFilterList() ?>;
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
<?php if (!$t0002_subklasakun->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t0002_subklasakun_list->TotalRecs > 0 && $t0002_subklasakun_list->ExportOptions->visible()) { ?>
<?php $t0002_subklasakun_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t0002_subklasakun_list->ImportOptions->visible()) { ?>
<?php $t0002_subklasakun_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t0002_subklasakun_list->SearchOptions->visible()) { ?>
<?php $t0002_subklasakun_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t0002_subklasakun_list->FilterOptions->visible()) { ?>
<?php $t0002_subklasakun_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t0002_subklasakun_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$t0002_subklasakun->isExport() && !$t0002_subklasakun->CurrentAction) { ?>
<form name="ft0002_subklasakunlistsrch" id="ft0002_subklasakunlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($t0002_subklasakun_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="ft0002_subklasakunlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="t0002_subklasakun">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($t0002_subklasakun_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($t0002_subklasakun_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $t0002_subklasakun_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($t0002_subklasakun_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($t0002_subklasakun_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($t0002_subklasakun_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($t0002_subklasakun_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $t0002_subklasakun_list->showPageHeader(); ?>
<?php
$t0002_subklasakun_list->showMessage();
?>
<?php if ($t0002_subklasakun_list->TotalRecs > 0 || $t0002_subklasakun->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t0002_subklasakun_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t0002_subklasakun">
<form name="ft0002_subklasakunlist" id="ft0002_subklasakunlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0002_subklasakun_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0002_subklasakun_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0002_subklasakun">
<div id="gmp_t0002_subklasakun" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($t0002_subklasakun_list->TotalRecs > 0 || $t0002_subklasakun->isGridEdit()) { ?>
<table id="tbl_t0002_subklasakunlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t0002_subklasakun_list->RowType = ROWTYPE_HEADER;

// Render list options
$t0002_subklasakun_list->renderListOptions();

// Render list options (header, left)
$t0002_subklasakun_list->ListOptions->render("header", "left");
?>
<?php if ($t0002_subklasakun->Kode->Visible) { // Kode ?>
	<?php if ($t0002_subklasakun->sortUrl($t0002_subklasakun->Kode) == "") { ?>
		<th data-name="Kode" class="<?php echo $t0002_subklasakun->Kode->headerCellClass() ?>"><div id="elh_t0002_subklasakun_Kode" class="t0002_subklasakun_Kode"><div class="ew-table-header-caption"><?php echo $t0002_subklasakun->Kode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Kode" class="<?php echo $t0002_subklasakun->Kode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t0002_subklasakun->SortUrl($t0002_subklasakun->Kode) ?>',2);"><div id="elh_t0002_subklasakun_Kode" class="t0002_subklasakun_Kode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t0002_subklasakun->Kode->caption() ?></span><span class="ew-table-header-sort"><?php if ($t0002_subklasakun->Kode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t0002_subklasakun->Kode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t0002_subklasakun->Kelompok->Visible) { // Kelompok ?>
	<?php if ($t0002_subklasakun->sortUrl($t0002_subklasakun->Kelompok) == "") { ?>
		<th data-name="Kelompok" class="<?php echo $t0002_subklasakun->Kelompok->headerCellClass() ?>"><div id="elh_t0002_subklasakun_Kelompok" class="t0002_subklasakun_Kelompok"><div class="ew-table-header-caption"><?php echo $t0002_subklasakun->Kelompok->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Kelompok" class="<?php echo $t0002_subklasakun->Kelompok->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t0002_subklasakun->SortUrl($t0002_subklasakun->Kelompok) ?>',2);"><div id="elh_t0002_subklasakun_Kelompok" class="t0002_subklasakun_Kelompok">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t0002_subklasakun->Kelompok->caption() ?></span><span class="ew-table-header-sort"><?php if ($t0002_subklasakun->Kelompok->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t0002_subklasakun->Kelompok->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t0002_subklasakun->Nama->Visible) { // Nama ?>
	<?php if ($t0002_subklasakun->sortUrl($t0002_subklasakun->Nama) == "") { ?>
		<th data-name="Nama" class="<?php echo $t0002_subklasakun->Nama->headerCellClass() ?>"><div id="elh_t0002_subklasakun_Nama" class="t0002_subklasakun_Nama"><div class="ew-table-header-caption"><?php echo $t0002_subklasakun->Nama->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Nama" class="<?php echo $t0002_subklasakun->Nama->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t0002_subklasakun->SortUrl($t0002_subklasakun->Nama) ?>',2);"><div id="elh_t0002_subklasakun_Nama" class="t0002_subklasakun_Nama">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t0002_subklasakun->Nama->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t0002_subklasakun->Nama->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t0002_subklasakun->Nama->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t0002_subklasakun_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t0002_subklasakun->ExportAll && $t0002_subklasakun->isExport()) {
	$t0002_subklasakun_list->StopRec = $t0002_subklasakun_list->TotalRecs;
} else {

	// Set the last record to display
	if ($t0002_subklasakun_list->TotalRecs > $t0002_subklasakun_list->StartRec + $t0002_subklasakun_list->DisplayRecs - 1)
		$t0002_subklasakun_list->StopRec = $t0002_subklasakun_list->StartRec + $t0002_subklasakun_list->DisplayRecs - 1;
	else
		$t0002_subklasakun_list->StopRec = $t0002_subklasakun_list->TotalRecs;
}
$t0002_subklasakun_list->RecCnt = $t0002_subklasakun_list->StartRec - 1;
if ($t0002_subklasakun_list->Recordset && !$t0002_subklasakun_list->Recordset->EOF) {
	$t0002_subklasakun_list->Recordset->moveFirst();
	$selectLimit = $t0002_subklasakun_list->UseSelectLimit;
	if (!$selectLimit && $t0002_subklasakun_list->StartRec > 1)
		$t0002_subklasakun_list->Recordset->move($t0002_subklasakun_list->StartRec - 1);
} elseif (!$t0002_subklasakun->AllowAddDeleteRow && $t0002_subklasakun_list->StopRec == 0) {
	$t0002_subklasakun_list->StopRec = $t0002_subklasakun->GridAddRowCount;
}

// Initialize aggregate
$t0002_subklasakun->RowType = ROWTYPE_AGGREGATEINIT;
$t0002_subklasakun->resetAttributes();
$t0002_subklasakun_list->renderRow();
while ($t0002_subklasakun_list->RecCnt < $t0002_subklasakun_list->StopRec) {
	$t0002_subklasakun_list->RecCnt++;
	if ($t0002_subklasakun_list->RecCnt >= $t0002_subklasakun_list->StartRec) {
		$t0002_subklasakun_list->RowCnt++;

		// Set up key count
		$t0002_subklasakun_list->KeyCount = $t0002_subklasakun_list->RowIndex;

		// Init row class and style
		$t0002_subklasakun->resetAttributes();
		$t0002_subklasakun->CssClass = "";
		if ($t0002_subklasakun->isGridAdd()) {
		} else {
			$t0002_subklasakun_list->loadRowValues($t0002_subklasakun_list->Recordset); // Load row values
		}
		$t0002_subklasakun->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$t0002_subklasakun->RowAttrs = array_merge($t0002_subklasakun->RowAttrs, array('data-rowindex'=>$t0002_subklasakun_list->RowCnt, 'id'=>'r' . $t0002_subklasakun_list->RowCnt . '_t0002_subklasakun', 'data-rowtype'=>$t0002_subklasakun->RowType));

		// Render row
		$t0002_subklasakun_list->renderRow();

		// Render list options
		$t0002_subklasakun_list->renderListOptions();
?>
	<tr<?php echo $t0002_subklasakun->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t0002_subklasakun_list->ListOptions->render("body", "left", $t0002_subklasakun_list->RowCnt);
?>
	<?php if ($t0002_subklasakun->Kode->Visible) { // Kode ?>
		<td data-name="Kode"<?php echo $t0002_subklasakun->Kode->cellAttributes() ?>>
<span id="el<?php echo $t0002_subklasakun_list->RowCnt ?>_t0002_subklasakun_Kode" class="t0002_subklasakun_Kode">
<span<?php echo $t0002_subklasakun->Kode->viewAttributes() ?>>
<?php echo $t0002_subklasakun->Kode->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t0002_subklasakun->Kelompok->Visible) { // Kelompok ?>
		<td data-name="Kelompok"<?php echo $t0002_subklasakun->Kelompok->cellAttributes() ?>>
<span id="el<?php echo $t0002_subklasakun_list->RowCnt ?>_t0002_subklasakun_Kelompok" class="t0002_subklasakun_Kelompok">
<span<?php echo $t0002_subklasakun->Kelompok->viewAttributes() ?>>
<?php echo $t0002_subklasakun->Kelompok->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t0002_subklasakun->Nama->Visible) { // Nama ?>
		<td data-name="Nama"<?php echo $t0002_subklasakun->Nama->cellAttributes() ?>>
<span id="el<?php echo $t0002_subklasakun_list->RowCnt ?>_t0002_subklasakun_Nama" class="t0002_subklasakun_Nama">
<span<?php echo $t0002_subklasakun->Nama->viewAttributes() ?>>
<?php echo $t0002_subklasakun->Nama->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t0002_subklasakun_list->ListOptions->render("body", "right", $t0002_subklasakun_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$t0002_subklasakun->isGridAdd())
		$t0002_subklasakun_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$t0002_subklasakun->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t0002_subklasakun_list->Recordset)
	$t0002_subklasakun_list->Recordset->Close();
?>
<?php if (!$t0002_subklasakun->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t0002_subklasakun->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($t0002_subklasakun_list->Pager)) $t0002_subklasakun_list->Pager = new PrevNextPager($t0002_subklasakun_list->StartRec, $t0002_subklasakun_list->DisplayRecs, $t0002_subklasakun_list->TotalRecs, $t0002_subklasakun_list->AutoHidePager) ?>
<?php if ($t0002_subklasakun_list->Pager->RecordCount > 0 && $t0002_subklasakun_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($t0002_subklasakun_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerFirst") ?>" href="<?php echo $t0002_subklasakun_list->pageUrl() ?>start=<?php echo $t0002_subklasakun_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($t0002_subklasakun_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerPrevious") ?>" href="<?php echo $t0002_subklasakun_list->pageUrl() ?>start=<?php echo $t0002_subklasakun_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $t0002_subklasakun_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($t0002_subklasakun_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerNext") ?>" href="<?php echo $t0002_subklasakun_list->pageUrl() ?>start=<?php echo $t0002_subklasakun_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($t0002_subklasakun_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerLast") ?>" href="<?php echo $t0002_subklasakun_list->pageUrl() ?>start=<?php echo $t0002_subklasakun_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $t0002_subklasakun_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($t0002_subklasakun_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t0002_subklasakun_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t0002_subklasakun_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t0002_subklasakun_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($t0002_subklasakun_list->TotalRecs > 0 && (!$t0002_subklasakun_list->AutoHidePageSizeSelector || $t0002_subklasakun_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="t0002_subklasakun">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="10"<?php if ($t0002_subklasakun_list->DisplayRecs == 10) { ?> selected<?php } ?>>10</option>
<option value="20"<?php if ($t0002_subklasakun_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="50"<?php if ($t0002_subklasakun_list->DisplayRecs == 50) { ?> selected<?php } ?>>50</option>
<option value="ALL"<?php if ($t0002_subklasakun->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t0002_subklasakun_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t0002_subklasakun_list->TotalRecs == 0 && !$t0002_subklasakun->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t0002_subklasakun_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t0002_subklasakun_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t0002_subklasakun->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t0002_subklasakun_list->terminate();
?>