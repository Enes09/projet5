@extends('template')

@section('content')

<h3 class="userListViewH3"> Liste des abonnés :  </h3>

<div class="offset-lg-1 offset-sm-1">
{{$users->render("pagination::bootstrap-4")}}
</div>

	<table class="userLabel offset-md-2 col-md-8 offset-lg-2 col-lg-8  " >
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
			<td class="userLinks "> <a id="show" class="btn button show" href=" {{ route('user.show', $user->id) }} ">Voir</a> </td>
			<td class="userLinks contactTd" > <a class="btn button contact" href=" {{ route('user.contact', $user->id) }} ">Contacter</a> </td>


			<td class="userLinks deleteTd" > 

				{{ Form::open([ 'action'=>['UserController@destroy', $user->id], 'id'=>'deleteUser' ]) }}
					{{ method_field('DELETE') }}
					{{  Form::submit('Supprimer', ['class'=>'btn button deleteUser', 'onclick'=>'return confirm("êtes vous sûr de vouloir banir '.  $user->pseudo .' ? ")'])}}
				{{ Form::close() }}

			 </td>


		</tr>

@endforeach
	</table>

<div class="offset-lg-1 offset-sm-1">
{{$users->render("pagination::bootstrap-4")}}
</div>


@endsection