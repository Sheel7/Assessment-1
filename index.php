<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	

	<title>Calendar</title>

	<!-- Main Styles -->
	<link rel="stylesheet" href="assets/styles/style.min.css">

	
	
	<!-- Jquery UI -->
	<link rel="stylesheet" href="assets/plugin/jquery-ui/jquery-ui.min.css">
	<link rel="stylesheet" href="assets/plugin/jquery-ui/jquery-ui.structure.min.css">
	<link rel="stylesheet" href="assets/plugin/jquery-ui/jquery-ui.theme.min.css">

	<!-- FullCalendar -->
	<link rel="stylesheet" href="assets/plugin/fullcalendar/fullcalendar.min.css">
	<link rel="stylesheet" href="assets/plugin/fullcalendar/fullcalendar.print.css" media='print'>

    <link rel="stylesheet" href="assets/styles/style-dark.min.css">
	
</head>


<?php
      $username = "root";
      $password = "";
      $host = "localhost";

      $connector = @mysqli_connect($host,$username,$password)
          or die("Unable to connect");
       
      $selected = mysqli_select_db($connector, "fullcalendar")
        or die("Unable to connect");

    date_default_timezone_set("Asia/Kolkata");
	
	$events = mysqli_query($connector, " SELECT id, title, date, starttime, endtime, concat(date, ' ' ,starttime) as startdatetime,  concat(date, ' ' ,endtime) as enddatetime from tbl_events ");
    $totevents=mysqli_num_rows($events);
	
	
    $res = array();
    while ($tb =  mysqli_fetch_assoc($events))
    {
        $res[] = $tb;
    }
	
	
	
      ?>
<body>


<div id="wrapper">
<h3 style="text-align:center;">ASSESSMENT 1 - Full Calendar</h3>
	<div class="main-content" style="margin:0px 50px;">
	
	
	
	<div class="row small-spacing">
			<div class="col-xs-5">
				<div class="col-lg-12 col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title">Create New Event</h4>
					
					<div class="card-content">
						<form class="form-horizontal" method="POST" action="insert-event.php">
						<div class="col-lg-12 col-xs-12">
							
							<div class="form-group">
								<label for="inp-type-1" class="col-sm-3 control-label">Event :</label>
								<div class="col-sm-9">
									<input required type="text" placeholder="Event Title" class="form-control" id="inp-type-1"  name="title">
								</div>
							</div>
							<div class="form-group">
								<label for="inp-type-1" class="col-sm-3 control-label">Event Date :</label>
								<div class="col-sm-9">
									<input required type="date" placeholder="Event Date"  min="<?php  echo date('Y-m-d'); ?>" class="form-control" id="inp-type-1"  name="day">
								</div>
							</div>
							<div class="form-group">
								<label for="inp-type-1" class="col-sm-3 control-label">Start Time :</label>
								<div class="col-sm-9">
									<input required type="time" placeholder="Event Start Time" class="form-control" id="inp-type-1"  name="starttime">
								</div>
							</div>
							<div class="form-group">
								<label for="inp-type-1" class="col-sm-3 control-label">End Time :</label>
								<div class="col-sm-9">
									<input required type="time" placeholder="Event End Time" class="form-control" id="inp-type-1"  name="endtime">
								</div>
							</div>
							<div class="form-group">
						       <button type="submit" class="btn btn-success" style="float:right;">Save Event</button>
						    </div>
							
						</div>
						</form>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	
	
		<div class="row">
		<div class="col-md-12">
				<div class="box-content">
					<div id="calendar"></div>
					
					<style>
					.ui-widget-header{background-color:red;border:2px solid red;color:#fff;}
					</style>
					
					<div id="eventContent" title="Event Details" style="border:2px solid red;display:none;">
                      <div id="eventInfo"></div>
                      <p><strong><a id="eventLink" target="_blank"></a></strong></p>
                    </div>
					
				</div>
			
		</div>
		</div>
			
	
	</div>
</div>


    <script src="assets/scripts/jquery.min.js"></script>
	<script src="assets/scripts/modernizr.min.js"></script>
	<script src="assets/plugin/bootstrap/js/bootstrap.min.js"></script>
	<!-- Full Screen Plugin -->
	<script src="assets/plugin/fullscreen/jquery.fullscreen-min.js"></script>

	<!-- Jquery UI -->
	<script src="assets/plugin/jquery-ui/jquery-ui.min.js"></script>
	<script src="assets/plugin/jquery-ui/jquery.ui.touch-punch.min.js"></script>

	<!-- FullCalendar -->
	<script src="assets/plugin/moment/moment.js"></script>
	<script src="assets/plugin/fullcalendar/fullcalendar.min.js"></script>


	<script src="assets/scripts/main.min.js"></script>
	
	
	
	<script>
	
$(document).ready(function() {


	/* initialize the calendar
	-----------------------------------------------------------------*/

	if ($('#calendar').length){
		var todayDate = moment().startOf('day');
		var YM = todayDate.format('YYYY-MM');
		var YESTERDAY = todayDate.clone().subtract(1, 'day').format('YYYY-MM-DD');
		var TODAY = todayDate.format('YYYY-MM-DD');
		var TOMORROW = todayDate.clone().add(1, 'day').format('YYYY-MM-DD');
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'prevYear title nextYear',
				right: 'month,agendaWeek,agendaDay,list'
			},
			buttonIcons: {
				prev: 'none fa fa-angle-left',
				next: 'none fa fa-angle-right',
				prevYear: 'none fa fa-angle-left',
				nextYear: 'none fa fa-angle-right'
			},
			editable: false,
			
			eventLimit: true, // allow "more" link when too many events
			navLinks: false,
			droppable: false, // if true, this allows things to be dropped onto the calendar
			drop: function(date, allDay) {
				var originalEventObject = $(this).data('eventObject');
				var valueArray = ($(this).attr('class')).split(" ");
				var thisClass;
				for(var i=0; i<valueArray.length; i++){
					if (valueArray[i].search("bg") > -1){
						thisClass = valueArray[i];
					}
				}
				var copiedEventObject = $.extend({}, originalEventObject);
				copiedEventObject.start = date;
				copiedEventObject.className = thisClass;
				$('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
				// is the "remove after drop" checkbox checked?
				if ($('#drop-remove').is(':checked')) {
					// if so, remove the element from the "Draggable Events" list
					$(this).remove();
				}
				
			},
			
			events: [
			
			<?php foreach($res as $event) :
			
			?>
				{
				    id: '<?php echo $event['id']; ?>',
					title: '<?php echo $event['title']; ?>',
					start: '<?php echo $event['startdatetime']; ?>',
					end:  '<?php echo $event['enddatetime']; ?>',
					description: '<br>Event Date : <?php echo $event['date']; ?><br><br> Start Time - <?php echo $event['starttime']; ?> <br><br> End Time - <?php echo $event['endtime']; ?>',
					className: 'bg-success',					
				},
			<?php endforeach;

			?>
			
			
			
			],
			eventClick:  function(event, jsEvent, view) {
        //set the values and open the modal
        $("#eventInfo").html(event.description);
        $("#eventLink").attr('href', event.url);
        $("#eventContent").dialog({ modal: true, title: event.title });
    }
		});
		$('#external-events .fc-event').each(function () {
			// create an Event Object 
			// it doesn't need to have a start or end
			var eventObject = {
				title: $.trim($(this).text()) // use the element's text as the event title
			};
			// store the Event Object in the DOM element so we can get to it later
			$(this).data('eventObject', eventObject);
			// make the event draggable using jQuery UI
			$(this).draggable({
				zIndex: 999,
				revert: true,      // will cause the event to go back to its
				revertDuration: 0  //  original position after the drag
			});
		});
	}

	


});
	
	</script>
	
</body>
</html>