
<table>
@foreach($users as $user)
   <tr> <td>{{$user->fname}} </td><td> {{$user->lname}}</td></tr> <br>

@endforeach
</table>
