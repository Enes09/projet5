@extends('template')

@section('content')

<h3> Liste des abonnés :  </h3>

<div class="offset-lg-1">
{{$users->render("pagination::bootstrap-4")}}
</div>

	<table class="userLabel offset-lg-2 col-lg-8" >
		<tr>
			<td class="tableTitle" > Nom </td>
			<td class="tableTitle" > Prénom </td>
			<td></td>
			<td></td>
			<td></td>

		</tr>
	
@foreach($users as $user)

	
		<tr>
			<td > {{ $user->last_name }} </td>
			<td > {{ $user->name }} </td>
			<td class="userLinks "> <a class="btn button show" href=" {{ route('user.show', $user->id) }} ">Voir</a> </td>
			<td class="userLinks " > <a class="btn button contact"  href=" {{ route('user.contact', $user->id) }} ">Contacter</a> </td>


			<td class="userLinks" > 

				{{ Form::open([ 'id'=>'deleteUser' ]) }}
					{{  Form::submit('Supprimer', ['class'=>'btn button'])}}
				{{ Form::close() }}

			 </td>


		</tr>

@endforeach
	</table>

<div class="offset-lg-1">
{{$users->render("pagination::bootstrap-4")}}
</div>

@endsection