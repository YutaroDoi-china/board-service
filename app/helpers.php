<?php
function set_delete_time($day, $hour, $min){
	$day_time = $day;
	$hour_time = $hour;
	$min_time = $min;

	if($day_time !== ''){
		$ts_day = $day_time * 86400;	
	}else{
		$ts_day = 0;
	}
	if($hour_time !== ''){
		$ts_hour = $hour_time * 3600;
	}else{
		$ts_hour = 0;
	}
	if($min_time !== ''){
		$ts_min = $min_time * 60;
	}else{
		$ts_min = 0;
	}

	if($ts_day == 0 && $ts_hour == 0 && $ts_min == 0){
		$delete_time = time();
	}

	$delete_time = time() + $ts_day + $ts_hour + $ts_min;
	return $delete_time;
}

function show_select_kind($kind_num){
	if($kind_num == 1){
		$kind = "告知";
	}elseif($kind_num == 2){
		$kind = "募集";
	}
	return $kind;
}

function count_gone_time($delete_ts){
	$now = time();
	$difference = $delete_ts - $now;

	$diff_day = floor( $difference / 86400 );
	if($diff_day < 0){
		$diff_day = 0;
	}
	$remain = $difference - $diff_day * 86400;

	$diff_hour = floor( $remain / 3600 );
	if($diff_hour < 0){
		$diff_hour = 0;
	}
	$remain = $remain - $diff_hour * 3600;

	$diff_min = floor( $remain / 60 );
	if($diff_min < 0){
		$diff_min = 0;
	}
	echo "残り <strong>{$diff_day}</strong>日 <strong>{$diff_hour}</strong>時間 <strong>{$diff_min}</strong>分";
}

function type_color($type){
	if($type == 1){
		$colorCode = "announce";
	}else{
		$colorCode = "recruit";
	}
	$type_name = show_select_kind($type);
	echo "<p class='{$colorCode}'>{$type_name}</p>";
}
?>