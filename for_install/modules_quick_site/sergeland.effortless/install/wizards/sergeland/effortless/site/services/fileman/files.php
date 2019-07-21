<?if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();if(!defined("WIZARD_SITE_ID"))return;if(!defined("WIZARD_SITE_DIR"))return;if(COption::GetOptionString("main","upload_dir")=="")
COption::SetOptionString("main","upload_dir","upload");$wizard=&$this->GetWizard();$path=str_replace("//","/",WIZARD_ABSOLUTE_PATH."/site/public/".LANGUAGE_ID."/");$handle=@opendir($path);if($handle)
{while($file=readdir($handle))
{if(in_array($file,array(".","..")))
continue;CopyDirFiles($path.$file,WIZARD_SITE_PATH.$file,$rewrite=true,$recursive=true,$delete_after_copy=false,$exclude="bitrix");}}@copy($path."404.php",$_SERVER["DOCUMENT_ROOT"]."/404.php");WizardServices::PatchHtaccess(WIZARD_SITE_PATH);$arUrlRewrite=array();if(file_exists(WIZARD_SITE_ROOT_PATH."/urlrewrite.php"))
include(WIZARD_SITE_ROOT_PATH."/urlrewrite.php");$arNewUrlRewrite[]=array("CONDITION"=>"#^".WIZARD_SITE_DIR."about/partners/#","RULE"=>"","ID"=>"bitrix:catalog","PATH"=>WIZARD_SITE_DIR."about/partners/index.php",);$arNewUrlRewrite[]=array("CONDITION"=>"#^".WIZARD_SITE_DIR."info/articles/#","RULE"=>"","ID"=>"bitrix:catalog","PATH"=>WIZARD_SITE_DIR."info/articles/index.php",);$arNewUrlRewrite[]=array("CONDITION"=>"#^".WIZARD_SITE_DIR."info/actions/#","RULE"=>"","ID"=>"bitrix:catalog","PATH"=>WIZARD_SITE_DIR."info/actions/index.php",);$arNewUrlRewrite[]=array("CONDITION"=>"#^".WIZARD_SITE_DIR."about/staff/#","RULE"=>"","ID"=>"bitrix:catalog","PATH"=>WIZARD_SITE_DIR."about/staff/index.php",);$arNewUrlRewrite[]=array("CONDITION"=>"#^".WIZARD_SITE_DIR."info/photo/#","RULE"=>"","ID"=>"bitrix:catalog","PATH"=>WIZARD_SITE_DIR."info/photo/index.php",);$arNewUrlRewrite[]=array("CONDITION"=>"#^".WIZARD_SITE_DIR."info/works/#","RULE"=>"","ID"=>"bitrix:catalog","PATH"=>WIZARD_SITE_DIR."info/works/index.php",);$arNewUrlRewrite[]=array("CONDITION"=>"#^".WIZARD_SITE_DIR."info/news/#","RULE"=>"","ID"=>"bitrix:news","PATH"=>WIZARD_SITE_DIR."info/news/index.php",);$arNewUrlRewrite[]=array("CONDITION"=>"#^".WIZARD_SITE_DIR."services/#","RULE"=>"","ID"=>"bitrix:catalog","PATH"=>WIZARD_SITE_DIR."services/index.php",);$arNewUrlRewrite[]=array("CONDITION"=>"#^".WIZARD_SITE_DIR."catalog/#","RULE"=>"","ID"=>"bitrix:catalog","PATH"=>WIZARD_SITE_DIR."catalog/index.php",);foreach($arNewUrlRewrite as $arUrl)
if(!in_array($arUrl,$arUrlRewrite))
{$arUrl["SITE_ID"]=WIZARD_SITE_ID;CUrlRewriter::Add($arUrl);}
CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH.".top.menu.php",Array("SITE_DIR"=>WIZARD_SITE_DIR,));CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH.".bottom.menu.php",Array("SITE_DIR"=>WIZARD_SITE_DIR,));CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH.".left.menu.php",Array("SITE_DIR"=>WIZARD_SITE_DIR,));CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH.".right.menu.php",Array("SITE_DIR"=>WIZARD_SITE_DIR,));CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."sect_description.php",Array("SITE_DIR"=>WIZARD_SITE_DIR,));CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."_index.php",Array("SITE_DIR"=>WIZARD_SITE_DIR,));WizardServices::ReplaceMacrosRecursive(WIZARD_SITE_PATH."about/",Array("SITE_DIR"=>WIZARD_SITE_DIR,));WizardServices::ReplaceMacrosRecursive(WIZARD_SITE_PATH."callback/",Array("SITE_DIR"=>WIZARD_SITE_DIR,));WizardServices::ReplaceMacrosRecursive(WIZARD_SITE_PATH."info/",Array("SITE_DIR"=>WIZARD_SITE_DIR,));WizardServices::ReplaceMacrosRecursive(WIZARD_SITE_PATH."info/examples/",Array("SITE_DIR"=>WIZARD_SITE_DIR,));WizardServices::ReplaceMacrosRecursive(WIZARD_SITE_PATH."info/examples/content/",Array("SITE_DIR"=>WIZARD_SITE_DIR,));WizardServices::ReplaceMacrosRecursive(WIZARD_SITE_PATH."search/",Array("SITE_DIR"=>WIZARD_SITE_DIR,));WizardServices::ReplaceMacrosRecursive(WIZARD_SITE_PATH."include/",Array("SITE_DIR"=>WIZARD_SITE_DIR,"EMAIL"=>$wizard->GetVar("EMAIL"),"PHONE"=>$wizard->GetVar("PHONE"),"ADDRESS"=>$wizard->GetVar("ADDRESS"),"SKYPE"=>$wizard->GetVar("SKYPE"),));WizardServices::ReplaceMacrosRecursive(WIZARD_SITE_PATH."contacts/",Array("SITE_DIR"=>WIZARD_SITE_DIR,"ADDRESS"=>$wizard->GetVar("ADDRESS"),"LATITUDE"=>$wizard->GetVar("LATITUDE"),"LONGITUDE"=>$wizard->GetVar("LONGITUDE"),"LATITUDE_CENTER"=>$wizard->GetVar("LATITUDE_CENTER"),"LONGITUDE_CENTER"=>$wizard->GetVar("LONGITUDE_CENTER"),));WizardServices::ReplaceMacrosRecursive(WIZARD_SITE_PATH."about/information/",Array("ADDRESS"=>$wizard->GetVar("ADDRESS"),"EMAIL"=>$wizard->GetVar("EMAIL"),"PHONE"=>$wizard->GetVar("PHONE"),));$keywords=WIZARD_INSTALL_DEMO_DATA?htmlspecialcharsbx($wizard->GetVar("KEYWORDS")):"";$description=WIZARD_INSTALL_DEMO_DATA?htmlspecialcharsbx($wizard->GetVar("DESCRIPTION")):"";CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH.".section.php",Array("KEYWORDS"=>$keywords,"DESCRIPTION"=>$description));?>