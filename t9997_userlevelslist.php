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
$t9997_userlevels_list = new t9997_userlevels_list();

// Run the page
$t9997_userlevels_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t9997_userlevels_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t9997_userlevels->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var ft9997_userlevelslist = currentForm = new ew.Form("ft9997_userlevelslist", "list");
ft9997_userlevelslist.formKeyCountName = '<?php echo $t9997_userlevels_list->FormKeyCountName ?>';

// Form_CustomValidate event
ft9997_userlevelslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft9997_userlevelslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var ft9997_userlevelslistsrch = currentSearchForm = new ew.Form("ft9997_userlevelslistsrch");

// Filters
ft9997_userlevelslistsrch.filterList = <?php echo $t9997_userlevels_list->getFilterList() ?>;
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
<?php if (!$t9997_userlevels->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t9997_userlevels_list->TotalRecs > 0 && $t9997_userlevels_list->ExportOptions->visible()) { ?>
<?php $t9997_userlevels_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t9997_userlevels_list->ImportOptions->visible()) { ?>
<?php $t9997_userlevels_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t9997_userlevels_list->SearchOptions->visible()) { ?>
<?php $t9997_userlevels_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t9997_userlevels_list->FilterOptions->visible()) { ?>
<?php $t9997_userlevels_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t9997_userlevels_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$t9997_userlevels->isExport() && !$t9997_userlevels->CurrentAction) { ?>
<form name="ft9997_userlevelslistsrch" id="ft9997_userlevelslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($t9997_userlevels_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="ft9997_userlevelslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="t9997_userlevels">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($t9997_userlevels_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($t9997_userlevels_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $t9997_userlevels_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($t9997_userlevels_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($t9997_userlevels_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($t9997_userlevels_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($t9997_userlevels_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $t9997_userlevels_list->showPageHeader(); ?>
<?php
$t9997_userlevels_list->showMessage();
?>
<?php if ($t9997_userlevels_list->TotalRecs > 0 || $t9997_userlevels->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t9997_userlevels_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t9997_userlevels">
<form name="ft9997_userlevelslist" id="ft9997_userlevelslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t9997_userlevels_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t9997_userlevels_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t9997_userlevels">
<div id="gmp_t9997_userlevels" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($t9997_userlevels_list->TotalRecs > 0 || $t9997_userlevels->isGridEdit()) { ?>
<table id="tbl_t9997_userlevelslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t9997_userlevels_list->RowType = ROWTYPE_HEADER;

// Render list options
$t9997_userlevels_list->renderListOptions();

// Render list options (header, left)
$t9997_userlevels_list->ListOptions->render("header", "left");
?>
<?php if ($t9997_userlevels->userlevelid->Visible) { // userlevelid ?>
	<?php if ($t9997_userlevels->sortUrl($t9997_userlevels->userlevelid) == "") { ?>
		<th data-name="userlevelid" class="<?php echo $t9997_userlevels->userlevelid->headerCellClass() ?>"><div id="elh_t9997_userlevels_userlevelid" class="t9997_userlevels_userlevelid"><div class="ew-table-header-caption"><?php echo $t9997_userlevels->userlevelid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="userlevelid" class="<?php echo $t9997_userlevels->userlevelid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t9997_userlevels->SortUrl($t9997_userlevels->userlevelid) ?>',2);"><div id="elh_t9997_userlevels_userlevelid" class="t9997_userlevels_userlevelid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t9997_userlevels->userlevelid->caption() ?></span><span class="ew-table-header-sort"><?php if ($t9997_userlevels->userlevelid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t9997_userlevels->userlevelid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t9997_userlevels->userlevelname->Visible) { // userlevelname ?>
	<?php if ($t9997_userlevels->sortUrl($t9997_userlevels->userlevelname) == "") { ?>
		<th data-name="userlevelname" class="<?php echo $t9997_userlevels->userlevelname->headerCellClass() ?>"><div id="elh_t9997_userlevels_userlevelname" class="t9997_userlevels_userlevelname"><div class="ew-table-header-caption"><?php echo $t9997_userlevels->userlevelname->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="userlevelname" class="<?php echo $t9997_userlevels->userlevelname->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t9997_userlevels->SortUrl($t9997_userlevels->userlevelname) ?>',2);"><div id="elh_t9997_userlevels_userlevelname" class="t9997_userlevels_userlevelname">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t9997_userlevels->userlevelname->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t9997_userlevels->userlevelname->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t9997_userlevels->userlevelname->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t9997_userlevels_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t9997_userlevels->ExportAll && $t9997_userlevels->isExport()) {
	$t9997_userlevels_list->StopRec = $t9997_userlevels_list->TotalRecs;
} else {

	// Set the last record to display
	if ($t9997_userlevels_list->TotalRecs > $t9997_userlevels_list->StartRec + $t9997_userlevels_list->DisplayRecs - 1)
		$t9997_userlevels_list->StopRec = $t9997_userlevels_list->StartRec + $t9997_userlevels_list->DisplayRecs - 1;
	else
		$t9997_userlevels_list->StopRec = $t9997_userlevels_list->TotalRecs;
}
$t9997_userlevels_list->RecCnt = $t9997_userlevels_list->StartRec - 1;
if ($t9997_userlevels_list->Recordset && !$t9997_userlevels_list->Recordset->EOF) {
	$t9997_userlevels_list->Recordset->moveFirst();
	$selectLimit = $t9997_userlevels_list->UseSelectLimit;
	if (!$selectLimit && $t9997_userlevels_list->StartRec > 1)
		$t9997_userlevels_list->Recordset->move($t9997_userlevels_list->StartRec - 1);
} elseif (!$t9997_userlevels->AllowAddDeleteRow && $t9997_userlevels_list->StopRec == 0) {
	$t9997_userlevels_list->StopRec = $t9997_userlevels->GridAddRowCount;
}

// Initialize aggregate
$t9997_userlevels->RowType = ROWTYPE_AGGREGATEINIT;
$t9997_userlevels->resetAttributes();
$t9997_userlevels_list->renderRow();
while ($t9997_userlevels_list->RecCnt < $t9997_userlevels_list->StopRec) {
	$t9997_userlevels_list->RecCnt++;
	if ($t9997_userlevels_list->RecCnt >= $t9997_userlevels_list->StartRec) {
		$t9997_userlevels_list->RowCnt++;

		// Set up key count
		$t9997_userlevels_list->KeyCount = $t9997_userlevels_list->RowIndex;

		// Init row class and style
		$t9997_userlevels->resetAttributes();
		$t9997_userlevels->CssClass = "";
		if ($t9997_userlevels->isGridAdd()) {
		} else {
			$t9997_userlevels_list->loadRowValues($t9997_userlevels_list->Recordset); // Load row values
		}
		$t9997_userlevels->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$t9997_userlevels->RowAttrs = array_merge($t9997_userlevels->RowAttrs, array('data-rowindex'=>$t9997_userlevels_list->RowCnt, 'id'=>'r' . $t9997_userlevels_list->RowCnt . '_t9997_userlevels', 'data-rowtype'=>$t9997_userlevels->RowType));

		// Render row
		$t9997_userlevels_list->renderRow();

		// Render list options
		$t9997_userlevels_list->renderListOptions();
?>
	<tr<?php echo $t9997_userlevels->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t9997_userlevels_list->ListOptions->render("body", "left", $t9997_userlevels_list->RowCnt);
?>
	<?php if ($t9997_userlevels->userlevelid->Visible) { // userlevelid ?>
		<td data-name="userlevelid"<?php echo $t9997_userlevels->userlevelid->cellAttributes() ?>>
<span id="el<?php echo $t9997_userlevels_list->RowCnt ?>_t9997_userlevels_userlevelid" class="t9997_userlevels_userlevelid">
<span<?php echo $t9997_userlevels->userlevelid->viewAttributes() ?>>
<?php echo $t9997_userlevels->userlevelid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t9997_userlevels->userlevelname->Visible) { // userlevelname ?>
		<td data-name="userlevelname"<?php echo $t9997_userlevels->userlevelname->cellAttributes() ?>>
<span id="el<?php echo $t9997_userlevels_list->RowCnt ?>_t9997_userlevels_userlevelname" class="t9997_userlevels_userlevelname">
<span<?php echo $t9997_userlevels->userlevelname->viewAttributes() ?>>
<?php echo $t9997_userlevels->userlevelname->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t9997_userlevels_list->ListOptions->render("body", "right", $t9997_userlevels_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$t9997_userlevels->isGridAdd())
		$t9997_userlevels_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$t9997_userlevels->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t9997_userlevels_list->Recordset)
	$t9997_userlevels_list->Recordset->Close();
?>
<?php if (!$t9997_userlevels->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t9997_userlevels->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($t9997_userlevels_list->Pager)) $t9997_userlevels_list->Pager = new PrevNextPager($t9997_userlevels_list->StartRec, $t9997_userlevels_list->DisplayRecs, $t9997_userlevels_list->TotalRecs, $t9997_userlevels_list->AutoHidePager) ?>
<?php if ($t9997_userlevels_list->Pager->RecordCount > 0 && $t9997_userlevels_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($t9997_userlevels_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerFirst") ?>" href="<?php echo $t9997_userlevels_list->pageUrl() ?>start=<?php echo $t9997_userlevels_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($t9997_userlevels_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerPrevious") ?>" href="<?php echo $t9997_userlevels_list->pageUrl() ?>start=<?php echo $t9997_userlevels_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $t9997_userlevels_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($t9997_userlevels_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerNext") ?>" href="<?php echo $t9997_userlevels_list->pageUrl() ?>start=<?php echo $t9997_userlevels_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($t9997_userlevels_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerLast") ?>" href="<?php echo $t9997_userlevels_list->pageUrl() ?>start=<?php echo $t9997_userlevels_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $t9997_userlevels_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($t9997_userlevels_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t9997_userlevels_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t9997_userlevels_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t9997_userlevels_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($t9997_userlevels_list->TotalRecs > 0 && (!$t9997_userlevels_list->AutoHidePageSizeSelector || $t9997_userlevels_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="t9997_userlevels">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="10"<?php if ($t9997_userlevels_list->DisplayRecs == 10) { ?> selected<?php } ?>>10</option>
<option value="20"<?php if ($t9997_userlevels_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="50"<?php if ($t9997_userlevels_list->DisplayRecs == 50) { ?> selected<?php } ?>>50</option>
<option value="ALL"<?php if ($t9997_userlevels->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t9997_userlevels_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t9997_userlevels_list->TotalRecs == 0 && !$t9997_userlevels->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t9997_userlevels_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t9997_userlevels_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t9997_userlevels->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t9997_userlevels_list->terminate();
?>