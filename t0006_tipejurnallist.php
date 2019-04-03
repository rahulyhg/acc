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
$t0006_tipejurnal_list = new t0006_tipejurnal_list();

// Run the page
$t0006_tipejurnal_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0006_tipejurnal_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t0006_tipejurnal->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var ft0006_tipejurnallist = currentForm = new ew.Form("ft0006_tipejurnallist", "list");
ft0006_tipejurnallist.formKeyCountName = '<?php echo $t0006_tipejurnal_list->FormKeyCountName ?>';

// Form_CustomValidate event
ft0006_tipejurnallist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0006_tipejurnallist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var ft0006_tipejurnallistsrch = currentSearchForm = new ew.Form("ft0006_tipejurnallistsrch");

// Filters
ft0006_tipejurnallistsrch.filterList = <?php echo $t0006_tipejurnal_list->getFilterList() ?>;
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
<?php if (!$t0006_tipejurnal->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t0006_tipejurnal_list->TotalRecs > 0 && $t0006_tipejurnal_list->ExportOptions->visible()) { ?>
<?php $t0006_tipejurnal_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t0006_tipejurnal_list->ImportOptions->visible()) { ?>
<?php $t0006_tipejurnal_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t0006_tipejurnal_list->SearchOptions->visible()) { ?>
<?php $t0006_tipejurnal_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t0006_tipejurnal_list->FilterOptions->visible()) { ?>
<?php $t0006_tipejurnal_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t0006_tipejurnal_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$t0006_tipejurnal->isExport() && !$t0006_tipejurnal->CurrentAction) { ?>
<form name="ft0006_tipejurnallistsrch" id="ft0006_tipejurnallistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($t0006_tipejurnal_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="ft0006_tipejurnallistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="t0006_tipejurnal">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($t0006_tipejurnal_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($t0006_tipejurnal_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $t0006_tipejurnal_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($t0006_tipejurnal_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($t0006_tipejurnal_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($t0006_tipejurnal_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($t0006_tipejurnal_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $t0006_tipejurnal_list->showPageHeader(); ?>
<?php
$t0006_tipejurnal_list->showMessage();
?>
<?php if ($t0006_tipejurnal_list->TotalRecs > 0 || $t0006_tipejurnal->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t0006_tipejurnal_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t0006_tipejurnal">
<form name="ft0006_tipejurnallist" id="ft0006_tipejurnallist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0006_tipejurnal_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0006_tipejurnal_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0006_tipejurnal">
<div id="gmp_t0006_tipejurnal" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($t0006_tipejurnal_list->TotalRecs > 0 || $t0006_tipejurnal->isGridEdit()) { ?>
<table id="tbl_t0006_tipejurnallist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t0006_tipejurnal_list->RowType = ROWTYPE_HEADER;

// Render list options
$t0006_tipejurnal_list->renderListOptions();

// Render list options (header, left)
$t0006_tipejurnal_list->ListOptions->render("header", "left");
?>
<?php if ($t0006_tipejurnal->ID->Visible) { // ID ?>
	<?php if ($t0006_tipejurnal->sortUrl($t0006_tipejurnal->ID) == "") { ?>
		<th data-name="ID" class="<?php echo $t0006_tipejurnal->ID->headerCellClass() ?>"><div id="elh_t0006_tipejurnal_ID" class="t0006_tipejurnal_ID"><div class="ew-table-header-caption"><?php echo $t0006_tipejurnal->ID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ID" class="<?php echo $t0006_tipejurnal->ID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t0006_tipejurnal->SortUrl($t0006_tipejurnal->ID) ?>',2);"><div id="elh_t0006_tipejurnal_ID" class="t0006_tipejurnal_ID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t0006_tipejurnal->ID->caption() ?></span><span class="ew-table-header-sort"><?php if ($t0006_tipejurnal->ID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t0006_tipejurnal->ID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t0006_tipejurnal->Nama->Visible) { // Nama ?>
	<?php if ($t0006_tipejurnal->sortUrl($t0006_tipejurnal->Nama) == "") { ?>
		<th data-name="Nama" class="<?php echo $t0006_tipejurnal->Nama->headerCellClass() ?>"><div id="elh_t0006_tipejurnal_Nama" class="t0006_tipejurnal_Nama"><div class="ew-table-header-caption"><?php echo $t0006_tipejurnal->Nama->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Nama" class="<?php echo $t0006_tipejurnal->Nama->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t0006_tipejurnal->SortUrl($t0006_tipejurnal->Nama) ?>',2);"><div id="elh_t0006_tipejurnal_Nama" class="t0006_tipejurnal_Nama">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t0006_tipejurnal->Nama->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t0006_tipejurnal->Nama->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t0006_tipejurnal->Nama->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t0006_tipejurnal_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t0006_tipejurnal->ExportAll && $t0006_tipejurnal->isExport()) {
	$t0006_tipejurnal_list->StopRec = $t0006_tipejurnal_list->TotalRecs;
} else {

	// Set the last record to display
	if ($t0006_tipejurnal_list->TotalRecs > $t0006_tipejurnal_list->StartRec + $t0006_tipejurnal_list->DisplayRecs - 1)
		$t0006_tipejurnal_list->StopRec = $t0006_tipejurnal_list->StartRec + $t0006_tipejurnal_list->DisplayRecs - 1;
	else
		$t0006_tipejurnal_list->StopRec = $t0006_tipejurnal_list->TotalRecs;
}
$t0006_tipejurnal_list->RecCnt = $t0006_tipejurnal_list->StartRec - 1;
if ($t0006_tipejurnal_list->Recordset && !$t0006_tipejurnal_list->Recordset->EOF) {
	$t0006_tipejurnal_list->Recordset->moveFirst();
	$selectLimit = $t0006_tipejurnal_list->UseSelectLimit;
	if (!$selectLimit && $t0006_tipejurnal_list->StartRec > 1)
		$t0006_tipejurnal_list->Recordset->move($t0006_tipejurnal_list->StartRec - 1);
} elseif (!$t0006_tipejurnal->AllowAddDeleteRow && $t0006_tipejurnal_list->StopRec == 0) {
	$t0006_tipejurnal_list->StopRec = $t0006_tipejurnal->GridAddRowCount;
}

// Initialize aggregate
$t0006_tipejurnal->RowType = ROWTYPE_AGGREGATEINIT;
$t0006_tipejurnal->resetAttributes();
$t0006_tipejurnal_list->renderRow();
while ($t0006_tipejurnal_list->RecCnt < $t0006_tipejurnal_list->StopRec) {
	$t0006_tipejurnal_list->RecCnt++;
	if ($t0006_tipejurnal_list->RecCnt >= $t0006_tipejurnal_list->StartRec) {
		$t0006_tipejurnal_list->RowCnt++;

		// Set up key count
		$t0006_tipejurnal_list->KeyCount = $t0006_tipejurnal_list->RowIndex;

		// Init row class and style
		$t0006_tipejurnal->resetAttributes();
		$t0006_tipejurnal->CssClass = "";
		if ($t0006_tipejurnal->isGridAdd()) {
		} else {
			$t0006_tipejurnal_list->loadRowValues($t0006_tipejurnal_list->Recordset); // Load row values
		}
		$t0006_tipejurnal->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$t0006_tipejurnal->RowAttrs = array_merge($t0006_tipejurnal->RowAttrs, array('data-rowindex'=>$t0006_tipejurnal_list->RowCnt, 'id'=>'r' . $t0006_tipejurnal_list->RowCnt . '_t0006_tipejurnal', 'data-rowtype'=>$t0006_tipejurnal->RowType));

		// Render row
		$t0006_tipejurnal_list->renderRow();

		// Render list options
		$t0006_tipejurnal_list->renderListOptions();
?>
	<tr<?php echo $t0006_tipejurnal->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t0006_tipejurnal_list->ListOptions->render("body", "left", $t0006_tipejurnal_list->RowCnt);
?>
	<?php if ($t0006_tipejurnal->ID->Visible) { // ID ?>
		<td data-name="ID"<?php echo $t0006_tipejurnal->ID->cellAttributes() ?>>
<span id="el<?php echo $t0006_tipejurnal_list->RowCnt ?>_t0006_tipejurnal_ID" class="t0006_tipejurnal_ID">
<span<?php echo $t0006_tipejurnal->ID->viewAttributes() ?>>
<?php echo $t0006_tipejurnal->ID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t0006_tipejurnal->Nama->Visible) { // Nama ?>
		<td data-name="Nama"<?php echo $t0006_tipejurnal->Nama->cellAttributes() ?>>
<span id="el<?php echo $t0006_tipejurnal_list->RowCnt ?>_t0006_tipejurnal_Nama" class="t0006_tipejurnal_Nama">
<span<?php echo $t0006_tipejurnal->Nama->viewAttributes() ?>>
<?php echo $t0006_tipejurnal->Nama->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t0006_tipejurnal_list->ListOptions->render("body", "right", $t0006_tipejurnal_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$t0006_tipejurnal->isGridAdd())
		$t0006_tipejurnal_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$t0006_tipejurnal->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t0006_tipejurnal_list->Recordset)
	$t0006_tipejurnal_list->Recordset->Close();
?>
<?php if (!$t0006_tipejurnal->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t0006_tipejurnal->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($t0006_tipejurnal_list->Pager)) $t0006_tipejurnal_list->Pager = new PrevNextPager($t0006_tipejurnal_list->StartRec, $t0006_tipejurnal_list->DisplayRecs, $t0006_tipejurnal_list->TotalRecs, $t0006_tipejurnal_list->AutoHidePager) ?>
<?php if ($t0006_tipejurnal_list->Pager->RecordCount > 0 && $t0006_tipejurnal_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($t0006_tipejurnal_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerFirst") ?>" href="<?php echo $t0006_tipejurnal_list->pageUrl() ?>start=<?php echo $t0006_tipejurnal_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($t0006_tipejurnal_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerPrevious") ?>" href="<?php echo $t0006_tipejurnal_list->pageUrl() ?>start=<?php echo $t0006_tipejurnal_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $t0006_tipejurnal_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($t0006_tipejurnal_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerNext") ?>" href="<?php echo $t0006_tipejurnal_list->pageUrl() ?>start=<?php echo $t0006_tipejurnal_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($t0006_tipejurnal_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerLast") ?>" href="<?php echo $t0006_tipejurnal_list->pageUrl() ?>start=<?php echo $t0006_tipejurnal_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $t0006_tipejurnal_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($t0006_tipejurnal_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t0006_tipejurnal_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t0006_tipejurnal_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t0006_tipejurnal_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($t0006_tipejurnal_list->TotalRecs > 0 && (!$t0006_tipejurnal_list->AutoHidePageSizeSelector || $t0006_tipejurnal_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="t0006_tipejurnal">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="10"<?php if ($t0006_tipejurnal_list->DisplayRecs == 10) { ?> selected<?php } ?>>10</option>
<option value="20"<?php if ($t0006_tipejurnal_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="50"<?php if ($t0006_tipejurnal_list->DisplayRecs == 50) { ?> selected<?php } ?>>50</option>
<option value="ALL"<?php if ($t0006_tipejurnal->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t0006_tipejurnal_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t0006_tipejurnal_list->TotalRecs == 0 && !$t0006_tipejurnal->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t0006_tipejurnal_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t0006_tipejurnal_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t0006_tipejurnal->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t0006_tipejurnal_list->terminate();
?>