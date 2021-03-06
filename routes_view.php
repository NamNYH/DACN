<?php

	$currDir=dirname(__FILE__);
	include("$currDir/defaultLang.php");
	include("$currDir/language.php");
	include("$currDir/lib.php");
	@include("$currDir/hooks/routes.php");
	include("$currDir/routes_dml.php");

	// mm: thành viên hiện tại có thể truy cập trang này không?
	$perm=getTablePermissions('routes');
	if(!$perm[0]){
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout("window.location=\'index.php?signOut=1\'", 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = "routes";

	// Các trường có thể được hiển thị trong chế độ xem bảng
	$x->QueryFieldsTV = array(   
		"`routes`.`id`" => "id",
		"`routes`.`Ma_so_tuyen`" => "Ma_so_tuyen",
		"`routes`.`Ten_tuyen`" => "Ten_tuyen",
		"`routes`.`Thoi_gian`" => "Thoi_gian",
		"`routes`.`Gia_ve`" => "Gia_ve",
		"`routes`.`Don_vi_dam_nhan`" => "Don_vi_dam_nhan"
	);
	// ánh xạ sắp xếp theo yêu cầu đến các trường truy vấn thực tế
	$x->SortFields = array(   
		1 => '`routes`.`id`',
		2 => 2,
		3 => 3,
		4 => 4,
		5 => 5,
		6 => 6
	);

	// Các trường có thể được hiển thị trong tệp csv
	$x->QueryFieldsCSV = array(   
		"`routes`.`id`" => "id",
		"`routes`.`Ma_so_tuyen`" => "Ma_so_tuyen",
		"`routes`.`Ten_tuyen`" => "Ten_tuyen",
		"`routes`.`Thoi_gian`" => "Thoi_gian",
		"`routes`.`Gia_ve`" => "Gia_ve",
		"`routes`.`Don_vi_dam_nhan`" => "Don_vi_dam_nhan"
	);
	// Các trường có thể được lọc ()) () ()
	$x->QueryFieldsFilters = array(   
		"`routes`.`id`" => "ID",
		"`routes`.`Ma_so_tuyen`" => "Mã số tuyến",
		"`routes`.`Ten_tuyen`" => "Tên tuyên",
		"`routes`.`Thoi_gian`" => "Thời Gian",
		"`routes`.`Gia_ve`" => "Giá vé",
		"`routes`.`Don_vi_dam_nhan`" => "Đơn vị đảm nhận"
	);

	// Các trường có thể được tìm kiếm nhanh
	$x->QueryFieldsQS = array(   
		"`routes`.`id`" => "id",
		"`routes`.`Ma_so_tuyen`" => "Ma_so_tuyen",
		"`routes`.`Ten_tuyen`" => "Ten_tuyen",
		"`routes`.`Thoi_gian`" => "Thoi_gian",
		"`routes`.`Gia_ve`" => "Gia_ve",
		"`routes`.`Don_vi_dam_nhan`" => "Don_vi_dam_nhan"
	);

	// Các trường tra cứu có thể được sử dụng làm bộ lọc
	$x->filterers = array();

	$x->QueryFrom = "`routes` ";
	$x->QueryWhere = '';
	$x->QueryOrder = '';

	$x->AllowSelection = 1;
	$x->HideTableView = ($perm[2]==0 ? 1 : 0);
	$x->AllowDelete = $perm[4];
	$x->AllowMassDelete = true;
	$x->AllowInsert = $perm[1];
	$x->AllowUpdate = $perm[3];
	$x->SeparateDV = 1;
	$x->AllowDeleteOfParents = 0;
	$x->AllowFilters = 1;
	$x->AllowSavingFilters = 1;
	$x->AllowSorting = 1;
	$x->AllowNavigation = 1;
	$x->AllowPrinting = 1;
	$x->AllowCSV = 1;
	$x->RecordsPerPage = 10;
	$x->QuickSearch = 1;
	$x->QuickSearchText = $Translation["quick search"];
	$x->ScriptFileName = "routes_view.php";
	$x->RedirectAfterInsert = "routes_view.php?SelectedID=#ID#";
	$x->TableTitle = "Routes";
	$x->TableIcon = "resources/table_icons/routing_go_right.png";
	$x->PrimaryKey = "`routes`.`id`";
	$x->DefaultSortField = '1';
	$x->DefaultSortDirection = 'desc';

	$x->ColWidth   = array(150, 150, 150, 150, 150);
	$x->ColCaption = array("Mã số tuyến", "Tên tuyến", "Thời gian" , "Giá vé", "Đơn vị đảm nhận");
	$x->ColFieldName = array('Ma_so_tuyen', 'Ten_tuyen', 'Thoi_gian', 'Gia_ve', 'Don_vi_dam_nhan');
	$x->ColNumber  = array(2, 3, 4, 5, 6);

	// đường dẫn mẫu bên dưới dựa trên thư mục chính của ứng dụng
	$x->Template = 'templates/routes_templateTV.html';
	$x->SelectedTemplate = 'templates/routes_templateTVS.html';
	$x->TemplateDV = 'templates/routes_templateDV.html';
	$x->TemplateDVP = 'templates/routes_templateDVP.html';

	$x->ShowTableHeader = 1;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HighlightColor = '#FFF0C2';

	// mm: xây dựng truy vấn dựa trên quyền của thành viên hiện tại
	$DisplayRecords = $_REQUEST['DisplayRecords'];
	if(!in_array($DisplayRecords, array('user', 'group'))){ $DisplayRecords = 'all'; }
	if($perm[2]==1 || ($perm[2]>1 && $DisplayRecords=='user' && !$_REQUEST['NoFilter_x'])){ // view owner only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `routes`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='routes' and lcase(membership_userrecords.memberID)='".getLoggedMemberID()."'";
	}elseif($perm[2]==2 || ($perm[2]>2 && $DisplayRecords=='group' && !$_REQUEST['NoFilter_x'])){ // view group only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `routes`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='routes' and membership_userrecords.groupID='".getLoggedGroupID()."'";
	}elseif($perm[2]==3){ // view all
		// no further action
	}elseif($perm[2]==0){ // view none
		$x->QueryFields = array("Not enough permissions" => "NEP");
		$x->QueryFrom = '`routes`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: routes_init
	$render=TRUE;
	if(function_exists('routes_init')){
		$args=array();
		$render=routes_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: routes_header
	$headerCode='';
	if(function_exists('routes_header')){
		$args=array();
		$headerCode=routes_header($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$headerCode){
		include_once("$currDir/header.php"); 
	}else{
		ob_start(); include_once("$currDir/header.php"); $dHeader=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%HEADER%%>', $dHeader, $headerCode);
	}

	echo $x->HTML;
	// hook: routes_footer
	$footerCode='';
	if(function_exists('routes_footer')){
		$args=array();
		$footerCode=routes_footer($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$footerCode){
		include_once("$currDir/footer.php"); 
	}else{
		ob_start(); include_once("$currDir/footer.php"); $dFooter=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%FOOTER%%>', $dFooter, $footerCode);
	}
?>