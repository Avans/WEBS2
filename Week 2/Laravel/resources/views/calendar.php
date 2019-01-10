<html>
<!-- Author: Jasper van Rosmalen -->
<!-- Avans University of Applied Technology -->

	<head>
		<title>Kalender Opdracht</title>
		<link rel="stylesheet" type="text/css" href="css/calendar_style.css">
	</head>	

	<?php
		const dayStrings = array("Mon","Tue", "Wed", "Thu", "Fri", "Sat", "Sun");

		$nr_of_days_in_month = date("t");
		$current_day_of_month = date("j");
		$current_day_of_week = date("w"); // 0 = Sunday, 6 = Saturday
		
		$offset_at_start = $current_day_of_week - ($current_day_of_month%7);
		$nr_of_entries = 0;
		
		// calculate the offset for the first date line
		if($offset_at_start < 0){
			$offset_at_start = 7 + $offset_at_start;
		}else{
			$offset_at_start = 7 - $offset_at_start;
		}
		
		// calculate the number of calendar entries needed for this month
		// including the empty ones needed before and after the actual days
		$nr_of_entries = 7 * round(($offset_at_start + $nr_of_days_in_month)/7);
		
		// Create the calendar
		create_calendar_start();
		// Start with month indication
		create_month_title();
		// Start filling the table with a header
		create_header();
		// Now do the days, both empty and with date
		create_row_start();
		$count = 0;
		$day_count = 1;
		while($count < $nr_of_entries){
			if($offset_at_start > 0){
				create_entry(0);
				$offset_at_start--;
			}else{
				if($day_count <= $nr_of_days_in_month){
					create_entry($day_count, $count%7);
					$day_count++;
				}else{
					create_entry(0);
				}
			}
			
			$count++;
			
			if($count%7 === 0){
				create_row_start();
				create_row_end();
			}
		}		
		
		create_calendar_end();
		// And we're done.

		// *******************************************
		// ************** Functions ******************
		// *******************************************
		function create_header() {
			create_row_start();
			
			foreach(dayStrings as $dayName){
				echo("<th>");
				echo($dayName);
				echo("</th>");
			}
			
			create_row_end();
		}
		
		function create_row_start(){
			echo ("<tr>");
		}
		
		function create_row_end(){
			echo ("</tr>");
		}
		
		function create_month_title(){
			echo("<tr><td colspan='7' id='calendar_month'>".date("F Y")."</td></tr>");
		}
		
		function create_entry($day_number, $day_in_week = 0){
			switch($day_in_week){
				case 5:
					echo ("<td class = 'calendar_entry saturday_entry'>");
					break;
					
				case 6:
					echo ("<td class = 'calendar_entry sunday_entry'>");
					break;
						
				default:
					echo ("<td class = 'calendar_entry'>");
					break;
			}
			
			if($day_number > 0){
				echo("<div class = 'entry_date'>$day_number</div>");
				echo("<div class = 'entry_line'></div>");
				echo("<div class = 'entry_line'></div>");
				echo("<div class = 'entry_line'></div>");
			}
			echo("</td>");
		}
		
		function create_calendar_start(){
			echo "<table class = 'calendar'>";			
		}
		
		function create_calendar_end(){
			echo "</table>";
		}
	?>
</html>
