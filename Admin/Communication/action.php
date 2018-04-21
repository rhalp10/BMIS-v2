<?php 

include("../../connection.php");
if (isset($_POST['submit-announcement'])) {
$ann_receiver = $_POST['ann_receiver'];
$ann_title = $_POST['ann_title'];
$ann_description = $_POST['ann_description'];

	mysqli_query($conn,"INSERT INTO `anouncement_raw` (`ann_ID`, `receiver_ID`, `ann_Title`, `ann_Detail`, `ann_detail_sms_format`, `ann_Date`) VALUES (NULL, '$ann_receiver', '$ann_title', '$ann_description' , NULL, CURRENT_TIMESTAMP);");
	echo "<script>alert('Successfully Post The Announcement!	');
									window.location='index.php';
								</script>";

 
}
if (isset($_POST['send-sms'])) {
	$id  = $_POST['id'];
	$SMS  = $_POST['SMS'];
	mysqli_query($conn,"UPDATE `anouncement_raw` SET `ann_detail_sms_format` = '$SMS' WHERE `anouncement_raw`.`ann_ID` = $id");
echo "<script>alert('Successfully Send SMS	');
									window.location='index.php';
								</script>";
// 	SELECT rd.res_fName,rd.res_mName,rd.res_mName,rs.suffix,rn.network_Name,rpp.position_Name,rc.contact_telnum  FROM `brgy_official_detail`  bod
// INNER JOIN resident_detail rd ON bod.res_ID = rd.res_ID 
// LEFT JOIN ref_suffixname rs ON rd.suffix_ID = rs.suffix_ID
// INNER JOIN ref_position rp ON rd.position_ID = rp.position_ID
// LEFT JOIN resident_contact rc ON rd.res_ID = rc.res_ID
// LEFT JOIN ref_network rn  ON rc.network_ID = rn.network_ID
// LEFT JOIN ref_position rpp ON bod.commitee_assignID = rpp.position_ID
// WHERE bod.visibility = 1 ORDER BY rp.position_ID
}

?>