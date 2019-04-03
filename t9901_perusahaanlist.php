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
$t9901_perusahaan_list = new t9901_perusahaan_list();

// Run the page
$t9901_perusahaan_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t9901_perusahaan_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t9901_perusahaan->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var ft9901_perusahaanlist = currentForm = new ew.Form("ft9901_perusahaanlist", "list");
ft9901_perusahaanlist.formKeyCountName = '<?php echo $t9901_perusahaan_list->FormKeyCountName ?>';

// Form_CustomValidate event
ft9901_perusahaanlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft9901_perusahaanlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var ft9901_perusahaanlistsrch = currentSearchForm = new ew.Form("ft9901_perusahaanlistsrch");

// Filters
ft9901_perusahaanlistsrch.filterList = <?php echo $t9901_perusahaan_list->getFilterList() ?>;
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
<?php if (!$t9901_perusahaan->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t9901_perusahaan_list->TotalRecs > 0 && $t9901_perusahaan_list->ExportOptions->visible()) { ?>
<?php $t9901_perusahaan_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t9901_perusahaan_list->ImportOptions->visible()) { ?>
<?php $t9901_perusahaan_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t9901_perusahaan_list->SearchOptions->visible()) { ?>
<?php $t9901_perusahaan_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t9901_perusahaan_list->FilterOptions->visible()) { ?>
<?php $t9901_perusahaan_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t9901_perusahaan_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$t9901_perusahaan->isExport() && !$t9901_perusahaan->CurrentAction) { ?>
<form name="ft9901_perusahaanlistsrch" id="ft9901_perusahaanlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($t9901_perusahaan_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="ft9901_perusahaanlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="t9901_perusahaan">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($t9901_perusahaan_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($t9901_perusahaan_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $t9901_perusahaan_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($t9901_perusahaan_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($t9901_perusahaan_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($t9901_perusahaan_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($t9901_perusahaan_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $t9901_perusahaan_list->showPageHeader(); ?>
<?php
$t9901_perusahaan_list->showMessage();
?>
<?php if ($t9901_perusahaan_list->TotalRecs > 0 || $t9901_perusahaan->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t9901_perusahaan_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t9901_perusahaan">
<form name="ft9901_perusahaanlist" id="ft9901_perusahaanlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t9901_perusahaan_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t9901_perusahaan_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t9901_perusahaan">
<div id="gmp_t9901_perusahaan" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($t9901_perusahaan_list->TotalRecs > 0 || $t9901_perusahaan->isGridEdit()) { ?>
<table id="tbl_t9901_perusahaanlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t9901_perusahaan_list->RowType = ROWTYPE_HEADER;

// Render list options
$t9901_perusahaan_list->renderListOptions();

// Render list options (header, left)
$t9901_perusahaan_list->ListOptions->render("header", "left");
?>
<?php if ($t9901_perusahaan->Nama->Visible) { // Nama ?>
	<?php if ($t9901_perusahaan->sortUrl($t9901_perusahaan->Nama) == "") { ?>
		<th data-name="Nama" class="<?php echo $t9901_perusahaan->Nama->headerCellClass() ?>"><div id="elh_t9901_perusahaan_Nama" class="t9901_perusahaan_Nama"><div class="ew-table-header-caption"><?php echo $t9901_perusahaan->Nama->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Nama" class="<?php echo $t9901_perusahaan->Nama->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t9901_perusahaan->SortUrl($t9901_perusahaan->Nama) ?>',2);"><div id="elh_t9901_perusahaan_Nama" class="t9901_perusahaan_Nama">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t9901_perusahaan->Nama->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t9901_perusahaan->Nama->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t9901_perusahaan->Nama->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t9901_perusahaan->Alamat->Visible) { // Alamat ?>
	<?php if ($t9901_perusahaan->sortUrl($t9901_perusahaan->Alamat) == "") { ?>
		<th data-name="Alamat" class="<?php echo $t9901_perusahaan->Alamat->headerCellClass() ?>"><div id="elh_t9901_perusahaan_Alamat" class="t9901_perusahaan_Alamat"><div class="ew-table-header-caption"><?php echo $t9901_perusahaan->Alamat->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Alamat" class="<?php echo $t9901_perusahaan->Alamat->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t9901_perusahaan->SortUrl($t9901_perusahaan->Alamat) ?>',2);"><div id="elh_t9901_perusahaan_Alamat" class="t9901_perusahaan_Alamat">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t9901_perusahaan->Alamat->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t9901_perusahaan->Alamat->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t9901_perusahaan->Alamat->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t9901_perusahaan->_Email->Visible) { // Email ?>
	<?php if ($t9901_perusahaan->sortUrl($t9901_perusahaan->_Email) == "") { ?>
		<th data-name="_Email" class="<?php echo $t9901_perusahaan->_Email->headerCellClass() ?>"><div id="elh_t9901_perusahaan__Email" class="t9901_perusahaan__Email"><div class="ew-table-header-caption"><?php echo $t9901_perusahaan->_Email->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_Email" class="<?php echo $t9901_perusahaan->_Email->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t9901_perusahaan->SortUrl($t9901_perusahaan->_Email) ?>',2);"><div id="elh_t9901_perusahaan__Email" class="t9901_perusahaan__Email">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t9901_perusahaan->_Email->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t9901_perusahaan->_Email->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t9901_perusahaan->_Email->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t9901_perusahaan->NoTelepon->Visible) { // NoTelepon ?>
	<?php if ($t9901_perusahaan->sortUrl($t9901_perusahaan->NoTelepon) == "") { ?>
		<th data-name="NoTelepon" class="<?php echo $t9901_perusahaan->NoTelepon->headerCellClass() ?>"><div id="elh_t9901_perusahaan_NoTelepon" class="t9901_perusahaan_NoTelepon"><div class="ew-table-header-caption"><?php echo $t9901_perusahaan->NoTelepon->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoTelepon" class="<?php echo $t9901_perusahaan->NoTelepon->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t9901_perusahaan->SortUrl($t9901_perusahaan->NoTelepon) ?>',2);"><div id="elh_t9901_perusahaan_NoTelepon" class="t9901_perusahaan_NoTelepon">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t9901_perusahaan->NoTelepon->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t9901_perusahaan->NoTelepon->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t9901_perusahaan->NoTelepon->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t9901_perusahaan->NoHandphone->Visible) { // NoHandphone ?>
	<?php if ($t9901_perusahaan->sortUrl($t9901_perusahaan->NoHandphone) == "") { ?>
		<th data-name="NoHandphone" class="<?php echo $t9901_perusahaan->NoHandphone->headerCellClass() ?>"><div id="elh_t9901_perusahaan_NoHandphone" class="t9901_perusahaan_NoHandphone"><div class="ew-table-header-caption"><?php echo $t9901_perusahaan->NoHandphone->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoHandphone" class="<?php echo $t9901_perusahaan->NoHandphone->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t9901_perusahaan->SortUrl($t9901_perusahaan->NoHandphone) ?>',2);"><div id="elh_t9901_perusahaan_NoHandphone" class="t9901_perusahaan_NoHandphone">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t9901_perusahaan->NoHandphone->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t9901_perusahaan->NoHandphone->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t9901_perusahaan->NoHandphone->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t9901_perusahaan_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t9901_perusahaan->ExportAll && $t9901_perusahaan->isExport()) {
	$t9901_perusahaan_list->StopRec = $t9901_perusahaan_list->TotalRecs;
} else {

	// Set the last record to display
	if ($t9901_perusahaan_list->TotalRecs > $t9901_perusahaan_list->StartRec + $t9901_perusahaan_list->DisplayRecs - 1)
		$t9901_perusahaan_list->StopRec = $t9901_perusahaan_list->StartRec + $t9901_perusahaan_list->DisplayRecs - 1;
	else
		$t9901_perusahaan_list->StopRec = $t9901_perusahaan_list->TotalRecs;
}
$t9901_perusahaan_list->RecCnt = $t9901_perusahaan_list->StartRec - 1;
if ($t9901_perusahaan_list->Recordset && !$t9901_perusahaan_list->Recordset->EOF) {
	$t9901_perusahaan_list->Recordset->moveFirst();
	$selectLimit = $t9901_perusahaan_list->UseSelectLimit;
	if (!$selectLimit && $t9901_perusahaan_list->StartRec > 1)
		$t9901_perusahaan_list->Recordset->move($t9901_perusahaan_list->StartRec - 1);
} elseif (!$t9901_perusahaan->AllowAddDeleteRow && $t9901_perusahaan_list->StopRec == 0) {
	$t9901_perusahaan_list->StopRec = $t9901_perusahaan->GridAddRowCount;
}

// Initialize aggregate
$t9901_perusahaan->RowType = ROWTYPE_AGGREGATEINIT;
$t9901_perusahaan->resetAttributes();
$t9901_perusahaan_list->renderRow();
while ($t9901_perusahaan_list->RecCnt < $t9901_perusahaan_list->StopRec) {
	$t9901_perusahaan_list->RecCnt++;
	if ($t9901_perusahaan_list->RecCnt >= $t9901_perusahaan_list->StartRec) {
		$t9901_perusahaan_list->RowCnt++;

		// Set up key count
		$t9901_perusahaan_list->KeyCount = $t9901_perusahaan_list->RowIndex;

		// Init row class and style
		$t9901_perusahaan->resetAttributes();
		$t9901_perusahaan->CssClass = "";
		if ($t9901_perusahaan->isGridAdd()) {
		} else {
			$t9901_perusahaan_list->loadRowValues($t9901_perusahaan_list->Recordset); // Load row values
		}
		$t9901_perusahaan->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$t9901_perusahaan->RowAttrs = array_merge($t9901_perusahaan->RowAttrs, array('data-rowindex'=>$t9901_perusahaan_list->RowCnt, 'id'=>'r' . $t9901_perusahaan_list->RowCnt . '_t9901_perusahaan', 'data-rowtype'=>$t9901_perusahaan->RowType));

		// Render row
		$t9901_perusahaan_list->renderRow();

		// Render list options
		$t9901_perusahaan_list->renderListOptions();
?>
	<tr<?php echo $t9901_perusahaan->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t9901_perusahaan_list->ListOptions->render("body", "left", $t9901_perusahaan_list->RowCnt);
?>
	<?php if ($t9901_perusahaan->Nama->Visible) { // Nama ?>
		<td data-name="Nama"<?php echo $t9901_perusahaan->Nama->cellAttributes() ?>>
<span id="el<?php echo $t9901_perusahaan_list->RowCnt ?>_t9901_perusahaan_Nama" class="t9901_perusahaan_Nama">
<span<?php echo $t9901_perusahaan->Nama->viewAttributes() ?>>
<?php echo $t9901_perusahaan->Nama->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t9901_perusahaan->Alamat->Visible) { // Alamat ?>
		<td data-name="Alamat"<?php echo $t9901_perusahaan->Alamat->cellAttributes() ?>>
<span id="el<?php echo $t9901_perusahaan_list->RowCnt ?>_t9901_perusahaan_Alamat" class="t9901_perusahaan_Alamat">
<span<?php echo $t9901_perusahaan->Alamat->viewAttributes() ?>>
<?php echo $t9901_perusahaan->Alamat->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t9901_perusahaan->_Email->Visible) { // Email ?>
		<td data-name="_Email"<?php echo $t9901_perusahaan->_Email->cellAttributes() ?>>
<span id="el<?php echo $t9901_perusahaan_list->RowCnt ?>_t9901_perusahaan__Email" class="t9901_perusahaan__Email">
<span<?php echo $t9901_perusahaan->_Email->viewAttributes() ?>>
<?php echo $t9901_perusahaan->_Email->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t9901_perusahaan->NoTelepon->Visible) { // NoTelepon ?>
		<td data-name="NoTelepon"<?php echo $t9901_perusahaan->NoTelepon->cellAttributes() ?>>
<span id="el<?php echo $t9901_perusahaan_list->RowCnt ?>_t9901_perusahaan_NoTelepon" class="t9901_perusahaan_NoTelepon">
<span<?php echo $t9901_perusahaan->NoTelepon->viewAttributes() ?>>
<?php echo $t9901_perusahaan->NoTelepon->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t9901_perusahaan->NoHandphone->Visible) { // NoHandphone ?>
		<td data-name="NoHandphone"<?php echo $t9901_perusahaan->NoHandphone->cellAttributes() ?>>
<span id="el<?php echo $t9901_perusahaan_list->RowCnt ?>_t9901_perusahaan_NoHandphone" class="t9901_perusahaan_NoHandphone">
<span<?php echo $t9901_perusahaan->NoHandphone->viewAttributes() ?>>
<?php echo $t9901_perusahaan->NoHandphone->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t9901_perusahaan_list->ListOptions->render("body", "right", $t9901_perusahaan_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$t9901_perusahaan->isGridAdd())
		$t9901_perusahaan_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$t9901_perusahaan->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t9901_perusahaan_list->Recordset)
	$t9901_perusahaan_list->Recordset->Close();
?>
<?php if (!$t9901_perusahaan->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t9901_perusahaan->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($t9901_perusahaan_list->Pager)) $t9901_perusahaan_list->Pager = new PrevNextPager($t9901_perusahaan_list->StartRec, $t9901_perusahaan_list->DisplayRecs, $t9901_perusahaan_list->TotalRecs, $t9901_perusahaan_list->AutoHidePager) ?>
<?php if ($t9901_perusahaan_list->Pager->RecordCount > 0 && $t9901_perusahaan_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($t9901_perusahaan_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerFirst") ?>" href="<?php echo $t9901_perusahaan_list->pageUrl() ?>start=<?php echo $t9901_perusahaan_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($t9901_perusahaan_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerPrevious") ?>" href="<?php echo $t9901_perusahaan_list->pageUrl() ?>start=<?php echo $t9901_perusahaan_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $t9901_perusahaan_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($t9901_perusahaan_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerNext") ?>" href="<?php echo $t9901_perusahaan_list->pageUrl() ?>start=<?php echo $t9901_perusahaan_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($t9901_perusahaan_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerLast") ?>" href="<?php echo $t9901_perusahaan_list->pageUrl() ?>start=<?php echo $t9901_perusahaan_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $t9901_perusahaan_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($t9901_perusahaan_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t9901_perusahaan_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t9901_perusahaan_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t9901_perusahaan_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($t9901_perusahaan_list->TotalRecs > 0 && (!$t9901_perusahaan_list->AutoHidePageSizeSelector || $t9901_perusahaan_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="t9901_perusahaan">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="10"<?php if ($t9901_perusahaan_list->DisplayRecs == 10) { ?> selected<?php } ?>>10</option>
<option value="20"<?php if ($t9901_perusahaan_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="50"<?php if ($t9901_perusahaan_list->DisplayRecs == 50) { ?> selected<?php } ?>>50</option>
<option value="ALL"<?php if ($t9901_perusahaan->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t9901_perusahaan_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t9901_perusahaan_list->TotalRecs == 0 && !$t9901_perusahaan->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t9901_perusahaan_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t9901_perusahaan_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t9901_perusahaan->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t9901_perusahaan_list->terminate();
?>