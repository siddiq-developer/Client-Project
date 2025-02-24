<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

	<p>	Dear {{$data['user']->name}},<br><br>

	We would like to invite you to join us for an exciting event {{$data['event']->title}} on {{$data['event']->start_date}} at {{$data['event']->start_time}} at {{$data['event']->address}}. We believe you would be a valuable addition to the attendees.<br><br>

	Please RSVP by tomorrow to confirm your attendance. We look forward to seeing you at the event.<br><br>

	To confirm your attendance please click on the following link<br>

	<a href="{{route('event_confirm_availablility',['token'=>$data['token']])}}">Click Here</a><br><br>

	Best regards,<br><br>

	Event Management Company
	
	</p>
</body>
</html>