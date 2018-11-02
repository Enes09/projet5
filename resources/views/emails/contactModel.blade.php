<h1 style="text-align: center;" > <strong>Dishelp</strong> </h1>


@if( isset( $contact['sender'] ) )
	<p>De : {{ $contact['sender'] }} </p>
	<p>Nom : {{ $contact['name'] }} </p>
@endif


<p>Sujet : {{ $contact['subject'] }} </p>
<p>Message : {{ $contact['message'] }} </p>

