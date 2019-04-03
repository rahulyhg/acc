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
$t0005_jurnaldetail_list = new t0005_jurnaldetail_list();

// Run the page
$t0005_jurnaldetail_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0005_jurnaldetail_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t0005_jurnaldetail->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var ft0005_jurnaldetaillist = currentForm = new ew.Form("ft0005_jurnaldetaillist", "list");
ft0005_jurnaldetaillist.formKeyCountName = '<?php echo $t0005_jurnaldetail_list->FormKeyCountName ?>';

// Form_CustomValidate event
ft0005_jurnaldetaillist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0005_jurnaldetaillist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var ft0005_jurnaldetaillistsrch = currentSearchForm = new ew.Form("ft0005_jurnaldetaillistsrch");

// Filters
ft0005_jurnaldetaillistsrch.filterList = <?php echo $t0005_jurnaldetail_list->getFilterList() ?>;
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
<?php if (!$t0005_jurnaldetail->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t0005_jurnaldetail_list->TotalRecs > 0 && $t0005_jurnaldetail_list->ExportOptions->visible()) { ?>
<?php $t0005_jurnaldetail_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t0005_jurnaldetail_list->ImportOptions->visible()) { ?>
<?php $t0005_jurnaldetail_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t0005_jurnaldetail_list->SearchOptions->visible()) { ?>
<?php $t0005_jurnaldetail_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t0005_jurnaldetail_list->FilterOptions->visible()) { ?>
<?php $t0005_jurnaldetail_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t0005_jurnaldetail_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$t0005_jurnaldetail->isExport() && !$t0005_jurnaldetail->CurrentAction) { ?>
<form name="ft0005_jurnaldetaillistsrch" id="ft0005_jurnaldetaillistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($t0005_jurnaldetail_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="ft0005_jurnaldetaillistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="t0005_jurnaldetail">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($t0005_jurnaldetail_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($t0005_jurnaldetail_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $t0005_jurnaldetail_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($t0005_jurnaldetail_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($t0005_jurnaldetail_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($t0005_jurnaldetail_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($t0005_jurnaldetail_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $t0005_jurnaldetail_list->showPageHeader(); ?>
<?php
$t0005_jurnaldetail_list->showMessage();
?>
<?php if ($t0005_jurnaldetail_list->TotalRecs > 0 || $t0005_jurnaldetail->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t0005_jurnaldetail_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t0005_jurnaldetail">
<form name="ft0005_jurnaldetaillist" id="ft0005_jurnaldetaillist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0005_jurnaldetail_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0005_jurnaldetail_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0005_jurnaldetail">
<div id="gmp_t0005_jurnaldetail" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($t0005_jurnaldetail_list->TotalRecs > 0 || $t0005_jurnaldetail->isGridEdit()) { ?>
<table id="tbl_t0005_jurnaldetaillist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t0005_jurnaldetail_list->RowType = ROWTYPE_HEADER;

// Render list options
$t0005_jurnaldetail_list->renderListOptions();

// Render list options (header, left)
$t0005_jurnaldetail_list->ListOptions->render("header", "left");
?>
<?php if ($t0005_jurnaldetail->ID->Visible) { // ID ?>
	<?php if ($t0005_jurnaldetail->sortUrl($t0005_jurnaldetail->ID) == "") { ?>
		<th data-name="ID" class="<?php echo $t0005_jurnaldetail->ID->headerCellClass() ?>"><div id="elh_t0005_jurnaldetail_ID" class="t0005_jurnaldetail_ID"><div class="ew-table-header-caption"><?php echo $t0005_jurnaldetail->ID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ID" class="<?php echo $t0005_jurnaldetail->ID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t0005_jurnaldetail->SortUrl($t0005_jurnaldetail->ID) ?>',2);"><div id="elh_t0005_jurnaldetail_ID" class="t0005_jurnaldetail_ID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t0005_jurnaldetail->ID->caption() ?></span><span class="ew-table-header-sort"><?php if ($t0005_jurnaldetail->ID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t0005_jurnaldetail->ID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t0005_jurnaldetail->JurnalID->Visible) { // JurnalID ?>
	<?php if ($t0005_jurnaldetail->sortUrl($t0005_jurnaldetail->JurnalID) == "") { ?>
		<th data-name="JurnalID" class="<?php echo $t0005_jurnaldetail->JurnalID->headerCellClass() ?>"><div id="elh_t0005_jurnaldetail_JurnalID" class="t0005_jurnaldetail_JurnalID"><div class="ew-table-header-caption"><?php echo $t0005_jurnaldetail->JurnalID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="JurnalID" class="<?php echo $t0005_jurnaldetail->JurnalID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t0005_jurnaldetail->SortUrl($t0005_jurnaldetail->JurnalID) ?>',2);"><div id="elh_t0005_jurnaldetail_JurnalID" class="t0005_jurnaldetail_JurnalID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t0005_jurnaldetail->JurnalID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t0005_jurnaldetail->JurnalID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t0005_jurnaldetail->JurnalID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t0005_jurnaldetail->Item->Visible) { // Item ?>
	<?php if ($t0005_jurnaldetail->sortUrl($t0005_jurnaldetail->Item) == "") { ?>
		<th data-name="Item" class="<?php echo $t0005_jurnaldetail->Item->headerCellClass() ?>"><div id="elh_t0005_jurnaldetail_Item" class="t0005_jurnaldetail_Item"><div class="ew-table-header-caption"><?php echo $t0005_jurnaldetail->Item->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Item" class="<?php echo $t0005_jurnaldetail->Item->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t0005_jurnaldetail->SortUrl($t0005_jurnaldetail->Item) ?>',2);"><div id="elh_t0005_jurnaldetail_Item" class="t0005_jurnaldetail_Item">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t0005_jurnaldetail->Item->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t0005_jurnaldetail->Item->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t0005_jurnaldetail->Item->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t0005_jurnaldetail->AkunID->Visible) { // AkunID ?>
	<?php if ($t0005_jurnaldetail->sortUrl($t0005_jurnaldetail->AkunID) == "") { ?>
		<th data-name="AkunID" class="<?php echo $t0005_jurnaldetail->AkunID->headerCellClass() ?>"><div id="elh_t0005_jurnaldetail_AkunID" class="t0005_jurnaldetail_AkunID"><div class="ew-table-header-caption"><?php echo $t0005_jurnaldetail->AkunID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AkunID" class="<?php echo $t0005_jurnaldetail->AkunID->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t0005_jurnaldetail->SortUrl($t0005_jurnaldetail->AkunID) ?>',2);"><div id="elh_t0005_jurnaldetail_AkunID" class="t0005_jurnaldetail_AkunID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t0005_jurnaldetail->AkunID->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t0005_jurnaldetail->AkunID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t0005_jurnaldetail->AkunID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t0005_jurnaldetail->DebitKredit->Visible) { // DebitKredit ?>
	<?php if ($t0005_jurnaldetail->sortUrl($t0005_jurnaldetail->DebitKredit) == "") { ?>
		<th data-name="DebitKredit" class="<?php echo $t0005_jurnaldetail->DebitKredit->headerCellClass() ?>"><div id="elh_t0005_jurnaldetail_DebitKredit" class="t0005_jurnaldetail_DebitKredit"><div class="ew-table-header-caption"><?php echo $t0005_jurnaldetail->DebitKredit->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DebitKredit" class="<?php echo $t0005_jurnaldetail->DebitKredit->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t0005_jurnaldetail->SortUrl($t0005_jurnaldetail->DebitKredit) ?>',2);"><div id="elh_t0005_jurnaldetail_DebitKredit" class="t0005_jurnaldetail_DebitKredit">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t0005_jurnaldetail->DebitKredit->caption() ?></span><span class="ew-table-header-sort"><?php if ($t0005_jurnaldetail->DebitKredit->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t0005_jurnaldetail->DebitKredit->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t0005_jurnaldetail->Nilai->Visible) { // Nilai ?>
	<?php if ($t0005_jurnaldetail->sortUrl($t0005_jurnaldetail->Nilai) == "") { ?>
		<th data-name="Nilai" class="<?php echo $t0005_jurnaldetail->Nilai->headerCellClass() ?>"><div id="elh_t0005_jurnaldetail_Nilai" class="t0005_jurnaldetail_Nilai"><div class="ew-table-header-caption"><?php echo $t0005_jurnaldetail->Nilai->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Nilai" class="<?php echo $t0005_jurnaldetail->Nilai->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t0005_jurnaldetail->SortUrl($t0005_jurnaldetail->Nilai) ?>',2);"><div id="elh_t0005_jurnaldetail_Nilai" class="t0005_jurnaldetail_Nilai">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t0005_jurnaldetail->Nilai->caption() ?></span><span class="ew-table-header-sort"><?php if ($t0005_jurnaldetail->Nilai->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t0005_jurnaldetail->Nilai->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t0005_jurnaldetail_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t0005_jurnaldetail->ExportAll && $t0005_jurnaldetail->isExport()) {
	$t0005_jurnaldetail_list->StopRec = $t0005_jurnaldetail_list->TotalRecs;
} else {

	// Set the last record to display
	if ($t0005_jurnaldetail_list->TotalRecs > $t0005_jurnaldetail_list->StartRec + $t0005_jurnaldetail_list->DisplayRecs - 1)
		$t0005_jurnaldetail_list->StopRec = $t0005_jurnaldetail_list->StartRec + $t0005_jurnaldetail_list->DisplayRecs - 1;
	else
		$t0005_jurnaldetail_list->StopRec = $t0005_jurnaldetail_list->TotalRecs;
}
$t0005_jurnaldetail_list->RecCnt = $t0005_jurnaldetail_list->StartRec - 1;
if ($t0005_jurnaldetail_list->Recordset && !$t0005_jurnaldetail_list->Recordset->EOF) {
	$t0005_jurnaldetail_list->Recordset->moveFirst();
	$selectLimit = $t0005_jurnaldetail_list->UseSelectLimit;
	if (!$selectLimit && $t0005_jurnaldetail_list->StartRec > 1)
		$t0005_jurnaldetail_list->Recordset->move($t0005_jurnaldetail_list->StartRec - 1);
} elseif (!$t0005_jurnaldetail->AllowAddDeleteRow && $t0005_jurnaldetail_list->StopRec == 0) {
	$t0005_jurnaldetail_list->StopRec = $t0005_jurnaldetail->GridAddRowCount;
}

// Initialize aggregate
$t0005_jurnaldetail->RowType = ROWTYPE_AGGREGATEINIT;
$t0005_jurnaldetail->resetAttributes();
$t0005_jurnaldetail_list->renderRow();
while ($t0005_jurnaldetail_list->RecCnt < $t0005_jurnaldetail_list->StopRec) {
	$t0005_jurnaldetail_list->RecCnt++;
	if ($t0005_jurnaldetail_list->RecCnt >= $t0005_jurnaldetail_list->StartRec) {
		$t0005_jurnaldetail_list->RowCnt++;

		// Set up key count
		$t0005_jurnaldetail_list->KeyCount = $t0005_jurnaldetail_list->RowIndex;

		// Init row class and style
		$t0005_jurnaldetail->resetAttributes();
		$t0005_jurnaldetail->CssClass = "";
		if ($t0005_jurnaldetail->isGridAdd()) {
		} else {
			$t0005_jurnaldetail_list->loadRowValues($t0005_jurnaldetail_list->Recordset); // Load row values
		}
		$t0005_jurnaldetail->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$t0005_jurnaldetail->RowAttrs = array_merge($t0005_jurnaldetail->RowAttrs, array('data-rowindex'=>$t0005_jurnaldetail_list->RowCnt, 'id'=>'r' . $t0005_jurnaldetail_list->RowCnt . '_t0005_jurnaldetail', 'data-rowtype'=>$t0005_jurnaldetail->RowType));

		// Render row
		$t0005_jurnaldetail_list->renderRow();

		// Render list options
		$t0005_jurnaldetail_list->renderListOptions();
?>
	<tr<?php echo $t0005_jurnaldetail->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t0005_jurnaldetail_list->ListOptions->render("body", "left", $t0005_jurnaldetail_list->RowCnt);
?>
	<?php if ($t0005_jurnaldetail->ID->Visible) { // ID ?>
		<td data-name="ID"<?php echo $t0005_jurnaldetail->ID->cellAttributes() ?>>
<span id="el<?php echo $t0005_jurnaldetail_list->RowCnt ?>_t0005_jurnaldetail_ID" class="t0005_jurnaldetail_ID">
<span<?php echo $t0005_jurnaldetail->ID->viewAttributes() ?>>
<?php echo $t0005_jurnaldetail->ID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t0005_jurnaldetail->JurnalID->Visible) { // JurnalID ?>
		<td data-name="JurnalID"<?php echo $t0005_jurnaldetail->JurnalID->cellAttributes() ?>>
<span id="el<?php echo $t0005_jurnaldetail_list->RowCnt ?>_t0005_jurnaldetail_JurnalID" class="t0005_jurnaldetail_JurnalID">
<span<?php echo $t0005_jurnaldetail->JurnalID->viewAttributes() ?>>
<?php echo $t0005_jurnaldetail->JurnalID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t0005_jurnaldetail->Item->Visible) { // Item ?>
		<td data-name="Item"<?php echo $t0005_jurnaldetail->Item->cellAttributes() ?>>
<span id="el<?php echo $t0005_jurnaldetail_list->RowCnt ?>_t0005_jurnaldetail_Item" class="t0005_jurnaldetail_Item">
<span<?php echo $t0005_jurnaldetail->Item->viewAttributes() ?>>
<?php echo $t0005_jurnaldetail->Item->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t0005_jurnaldetail->AkunID->Visible) { // AkunID ?>
		<td data-name="AkunID"<?php echo $t0005_jurnaldetail->AkunID->cellAttributes() ?>>
<span id="el<?php echo $t0005_jurnaldetail_list->RowCnt ?>_t0005_jurnaldetail_AkunID" class="t0005_jurnaldetail_AkunID">
<span<?php echo $t0005_jurnaldetail->AkunID->viewAttributes() ?>>
<?php echo $t0005_jurnaldetail->AkunID->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t0005_jurnaldetail->DebitKredit->Visible) { // DebitKredit ?>
		<td data-name="DebitKredit"<?php echo $t0005_jurnaldetail->DebitKredit->cellAttributes() ?>>
<span id="el<?php echo $t0005_jurnaldetail_list->RowCnt ?>_t0005_jurnaldetail_DebitKredit" class="t0005_jurnaldetail_DebitKredit">
<span<?php echo $t0005_jurnaldetail->DebitKredit->viewAttributes() ?>>
<?php echo $t0005_jurnaldetail->DebitKredit->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t0005_jurnaldetail->Nilai->Visible) { // Nilai ?>
		<td data-name="Nilai"<?php echo $t0005_jurnaldetail->Nilai->cellAttributes() ?>>
<span id="el<?php echo $t0005_jurnaldetail_list->RowCnt ?>_t0005_jurnaldetail_Nilai" class="t0005_jurnaldetail_Nilai">
<span<?php echo $t0005_jurnaldetail->Nilai->viewAttributes() ?>>
<?php echo $t0005_jurnaldetail->Nilai->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t0005_jurnaldetail_list->ListOptions->render("body", "right", $t0005_jurnaldetail_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$t0005_jurnaldetail->isGridAdd())
		$t0005_jurnaldetail_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$t0005_jurnaldetail->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t0005_jurnaldetail_list->Recordset)
	$t0005_jurnaldetail_list->Recordset->Close();
?>
<?php if (!$t0005_jurnaldetail->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t0005_jurnaldetail->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($t0005_jurnaldetail_list->Pager)) $t0005_jurnaldetail_list->Pager = new PrevNextPager($t0005_jurnaldetail_list->StartRec, $t0005_jurnaldetail_list->DisplayRecs, $t0005_jurnaldetail_list->TotalRecs, $t0005_jurnaldetail_list->AutoHidePager) ?>
<?php if ($t0005_jurnaldetail_list->Pager->RecordCount > 0 && $t0005_jurnaldetail_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($t0005_jurnaldetail_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerFirst") ?>" href="<?php echo $t0005_jurnaldetail_list->pageUrl() ?>start=<?php echo $t0005_jurnaldetail_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($t0005_jurnaldetail_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerPrevious") ?>" href="<?php echo $t0005_jurnaldetail_list->pageUrl() ?>start=<?php echo $t0005_jurnaldetail_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $t0005_jurnaldetail_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($t0005_jurnaldetail_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerNext") ?>" href="<?php echo $t0005_jurnaldetail_list->pageUrl() ?>start=<?php echo $t0005_jurnaldetail_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($t0005_jurnaldetail_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerLast") ?>" href="<?php echo $t0005_jurnaldetail_list->pageUrl() ?>start=<?php echo $t0005_jurnaldetail_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $t0005_jurnaldetail_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($t0005_jurnaldetail_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t0005_jurnaldetail_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t0005_jurnaldetail_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t0005_jurnaldetail_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php if ($t0005_jurnaldetail_list->TotalRecs > 0 && (!$t0005_jurnaldetail_list->AutoHidePageSizeSelector || $t0005_jurnaldetail_list->Pager->Visible)) { ?>
<div class="ew-pager">
<input type="hidden" name="t" value="t0005_jurnaldetail">
<select name="<?php echo TABLE_REC_PER_PAGE ?>" class="form-control form-control-sm ew-tooltip" title="<?php echo $Language->phrase("RecordsPerPage") ?>" onchange="this.form.submit();">
<option value="10"<?php if ($t0005_jurnaldetail_list->DisplayRecs == 10) { ?> selected<?php } ?>>10</option>
<option value="20"<?php if ($t0005_jurnaldetail_list->DisplayRecs == 20) { ?> selected<?php } ?>>20</option>
<option value="50"<?php if ($t0005_jurnaldetail_list->DisplayRecs == 50) { ?> selected<?php } ?>>50</option>
<option value="ALL"<?php if ($t0005_jurnaldetail->getRecordsPerPage() == -1) { ?> selected<?php } ?>><?php echo $Language->Phrase("AllRecords") ?></option>
</select>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t0005_jurnaldetail_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t0005_jurnaldetail_list->TotalRecs == 0 && !$t0005_jurnaldetail->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t0005_jurnaldetail_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t0005_jurnaldetail_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t0005_jurnaldetail->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t0005_jurnaldetail_list->terminate();
?>