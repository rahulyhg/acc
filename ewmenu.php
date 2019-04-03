<?php
namespace PHPMaker2019\acc_prj;

// Menu Language
if ($Language && $Language->LanguageFolder == $LANGUAGE_FOLDER)
	$MenuLanguage = &$Language;
else
	$MenuLanguage = new Language();

// Navbar menu
$topMenu = new Menu("navbar", TRUE, TRUE);
$topMenu->addMenuItem(1, "mi_cf01_home", $MenuLanguage->MenuPhrase("1", "MenuText"), "cf01_home.php", -1, "", AllowListMenu('{0152ED89-224F-42DD-8ED6-B3D980785F93}cf01_home.php'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(11, "mci_Setup", $MenuLanguage->MenuPhrase("11", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$topMenu->addMenuItem(12, "mi_t9900_periode", $MenuLanguage->MenuPhrase("12", "MenuText"), "t9900_periodelist.php", 11, "", AllowListMenu('{0152ED89-224F-42DD-8ED6-B3D980785F93}t9900_periode'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(13, "mi_t9901_perusahaan", $MenuLanguage->MenuPhrase("13", "MenuText"), "t9901_perusahaanlist.php", 11, "", AllowListMenu('{0152ED89-224F-42DD-8ED6-B3D980785F93}t9901_perusahaan'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(6, "mci_Users", $MenuLanguage->MenuPhrase("6", "MenuText"), "", 11, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$topMenu->addMenuItem(2, "mi_t9996_employees", $MenuLanguage->MenuPhrase("2", "MenuText"), "t9996_employeeslist.php", 6, "", AllowListMenu('{0152ED89-224F-42DD-8ED6-B3D980785F93}t9996_employees'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(3, "mi_t9997_userlevels", $MenuLanguage->MenuPhrase("3", "MenuText"), "t9997_userlevelslist.php", 6, "", AllowListMenu('{0152ED89-224F-42DD-8ED6-B3D980785F93}t9997_userlevels'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(22, "mi_t0003_akun", $MenuLanguage->MenuPhrase("22", "MenuText"), "t0003_akunlist.php", 11, "", AllowListMenu('{0152ED89-224F-42DD-8ED6-B3D980785F93}t0003_akun'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(20, "mi_t0001_kelompokakun", $MenuLanguage->MenuPhrase("20", "MenuText"), "t0001_kelompokakunlist.php", 22, "", AllowListMenu('{0152ED89-224F-42DD-8ED6-B3D980785F93}t0001_kelompokakun'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(21, "mi_t0002_subklasakun", $MenuLanguage->MenuPhrase("21", "MenuText"), "t0002_subklasakunlist.php", 22, "", AllowListMenu('{0152ED89-224F-42DD-8ED6-B3D980785F93}t0002_subklasakun'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(25, "mi_t0006_tipejurnal", $MenuLanguage->MenuPhrase("25", "MenuText"), "t0006_tipejurnallist.php", 11, "", AllowListMenu('{0152ED89-224F-42DD-8ED6-B3D980785F93}t0006_tipejurnal'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(29, "mci_Transaksi", $MenuLanguage->MenuPhrase("29", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$topMenu->addMenuItem(23, "mi_t0004_jurnal", $MenuLanguage->MenuPhrase("23", "MenuText"), "t0004_jurnallist.php", 29, "", AllowListMenu('{0152ED89-224F-42DD-8ED6-B3D980785F93}t0004_jurnal'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(19, "mci_Laporan", $MenuLanguage->MenuPhrase("19", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$topMenu->addMenuItem(5, "mi_t9999_audittrail", $MenuLanguage->MenuPhrase("5", "MenuText"), "t9999_audittraillist.php", 19, "", AllowListMenu('{0152ED89-224F-42DD-8ED6-B3D980785F93}t9999_audittrail'), FALSE, FALSE, "", "", TRUE);
echo $topMenu->toScript();

// Sidebar menu
$sideMenu = new Menu("menu", TRUE, FALSE);
$sideMenu->addMenuItem(1, "mi_cf01_home", $MenuLanguage->MenuPhrase("1", "MenuText"), "cf01_home.php", -1, "", AllowListMenu('{0152ED89-224F-42DD-8ED6-B3D980785F93}cf01_home.php'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(11, "mci_Setup", $MenuLanguage->MenuPhrase("11", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$sideMenu->addMenuItem(12, "mi_t9900_periode", $MenuLanguage->MenuPhrase("12", "MenuText"), "t9900_periodelist.php", 11, "", AllowListMenu('{0152ED89-224F-42DD-8ED6-B3D980785F93}t9900_periode'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(13, "mi_t9901_perusahaan", $MenuLanguage->MenuPhrase("13", "MenuText"), "t9901_perusahaanlist.php", 11, "", AllowListMenu('{0152ED89-224F-42DD-8ED6-B3D980785F93}t9901_perusahaan'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(6, "mci_Users", $MenuLanguage->MenuPhrase("6", "MenuText"), "", 11, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$sideMenu->addMenuItem(2, "mi_t9996_employees", $MenuLanguage->MenuPhrase("2", "MenuText"), "t9996_employeeslist.php", 6, "", AllowListMenu('{0152ED89-224F-42DD-8ED6-B3D980785F93}t9996_employees'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(3, "mi_t9997_userlevels", $MenuLanguage->MenuPhrase("3", "MenuText"), "t9997_userlevelslist.php", 6, "", AllowListMenu('{0152ED89-224F-42DD-8ED6-B3D980785F93}t9997_userlevels'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(22, "mi_t0003_akun", $MenuLanguage->MenuPhrase("22", "MenuText"), "t0003_akunlist.php", 11, "", AllowListMenu('{0152ED89-224F-42DD-8ED6-B3D980785F93}t0003_akun'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(20, "mi_t0001_kelompokakun", $MenuLanguage->MenuPhrase("20", "MenuText"), "t0001_kelompokakunlist.php", 22, "", AllowListMenu('{0152ED89-224F-42DD-8ED6-B3D980785F93}t0001_kelompokakun'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(21, "mi_t0002_subklasakun", $MenuLanguage->MenuPhrase("21", "MenuText"), "t0002_subklasakunlist.php", 22, "", AllowListMenu('{0152ED89-224F-42DD-8ED6-B3D980785F93}t0002_subklasakun'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(25, "mi_t0006_tipejurnal", $MenuLanguage->MenuPhrase("25", "MenuText"), "t0006_tipejurnallist.php", 11, "", AllowListMenu('{0152ED89-224F-42DD-8ED6-B3D980785F93}t0006_tipejurnal'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(29, "mci_Transaksi", $MenuLanguage->MenuPhrase("29", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$sideMenu->addMenuItem(23, "mi_t0004_jurnal", $MenuLanguage->MenuPhrase("23", "MenuText"), "t0004_jurnallist.php", 29, "", AllowListMenu('{0152ED89-224F-42DD-8ED6-B3D980785F93}t0004_jurnal'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(19, "mci_Laporan", $MenuLanguage->MenuPhrase("19", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$sideMenu->addMenuItem(5, "mi_t9999_audittrail", $MenuLanguage->MenuPhrase("5", "MenuText"), "t9999_audittraillist.php", 19, "", AllowListMenu('{0152ED89-224F-42DD-8ED6-B3D980785F93}t9999_audittrail'), FALSE, FALSE, "", "", TRUE);
echo $sideMenu->toScript();
?>