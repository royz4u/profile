<?php
global $themebucket_resumi;
$sections = $themebucket_resumi['resumi_sections_order'];
if(!is_array($sections)){
    $sections = resumi_get_enabled_sections();
}
if(empty($sections)){
    $sections = resumi_get_all_sections();
}
foreach($sections as $section_id=>$name){
    $section_id= str_replace("_","-",$section_id);
    get_template_part("sections/{$section_id}");
}








