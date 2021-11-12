<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             Project : <u> <strong> {{request('pt')}} </strong> </u> <br>
            Activity : Editing details for form row number <u><strong> {{request('fr')}} </strong></u>
        </h2>
    </x-slot>
    <x-auth-card>
        <x-slot name="logo">
            <h3>
                <strong>SS Experiment No. {{ request('en') }}, Form Row (FR) No. {{request('fr')}}</strong>
            </h3>
        </x-slot>
        @if (session('status'))
            <div class="alert alert-success">
                <script>
                    @verbatim
                    alert('Update successful');
                    {{ session('status') }}
                    @endverbatim
                </script>

            </div>
        @endif
        <form action="{{route('sss.update', [request('fr'),'pc'=>request('pc'), 'en'=>request('en'), 'fr'=>request('fr')]) }}" method="POST">
            @csrf
            @method('PUT')
            <x-table>
                <caption> Scroll down to update this Form Row (FR) </caption>
                <thead>
                </thead>
                <tbody>
                @foreach($ss as $fr)
                    <tr>  <x-th> PC </x-th> <x-td><label for="pc">
                                <input type="text" name="pc" value="{{request('pc')}}" readonly required>
                            </label></x-td> </tr>
                    <tr> <x-th> EN </x-th> <x-td><label>
                                <input type="number" name="en" value="{{request('en')}}" readonly required>
                            </label></x-td> </tr>
                    <tr>  <x-th> SEN </x-th> <x-td><label>
                                <input type="number" name="sen" value="{{$fr->sen}}" required autofocus>
                            </label></x-td> </tr>
                    <tr>  <x-th> DT </x-th> <x-td><label>
                                <input type="date" name="dt" value="{{$fr->dt}}" required>
                            </label></x-td> </tr>
                    <tr>  <x-th> FT </x-th> <x-td><label>
                                <select name="ft" required>
                                    <option value="SS1" selected > SS1 </option>
                                    <option value="SS2" > SS2 </option>
                                    <option value="SS3" > SS3 </option>
                                </select>
                            </label></x-td> </tr>
                    <tr>   <x-th> SSEN </x-th>  <x-td><label>
                                <input type="number" name="ssen" value="{{$fr->ssen}}">
                            </label></x-td> </tr>
                    <tr> <x-th> SFR </x-th> <x-td><label>
                                <input type="number" name="sfr" value="{{$fr->sfr}}" >
                            </label></x-td> </tr>
                    <tr> <x-th> FR </x-th> <x-td><label>
                                <input type="number" name="fr" value="{{$fr->fr}}" readonly required>
                            </label></x-td> </tr>
                    <tr>  <x-th> TX </x-th> <x-td><label>
                                <input type="number" name="tx" value="{{$fr->tx}}" >
                            </label></x-td> </tr>
                    <tr>   <x-th> SAS </x-th> <x-td><label>
                                <input type="number" name="sas" value="{{$fr->sas}}" required>
                            </label></x-td> </tr>
                    <tr> <x-th> ME </x-th> <x-td><label>
                                <input type="number" name="me" value="{{$fr->me}}" required>
                            </label></x-td> </tr>
                    <tr> <x-th> N </x-th> <x-td><label>
                                <input type="number" name="n" value="{{$fr->n}}" required>
                            </label></x-td> </tr>
                    <tr>   <x-th> BF </x-th> <x-td><label>
                                <select name="bf" required>
                                    <option value="01" selected>1</option>
                                    <option value="02">2</option>
                                </select>
                            </label></x-td> </tr>
                    <tr>  <x-th> SLC </x-th> <x-td><label>
                                <input type="number" name="slc" value="{{$fr->slc}}" required>
                            </label></x-td> </tr>
                    <tr>   <x-th> ST </x-th> <x-td><label>
                                <select name="st" required>
                                    <option value="1" selected>1</option>
                                    <option value="2">2</option>
                                    <option value="3">2</option>
                                </select>
                            </label></x-td> </tr>
                    <tr> <x-th> SI </x-th> <x-td><label>
                                <input type="number" name="si" value="{{$fr->si}}" >
                            </label></x-td> </tr>
                    <tr>  <x-th> SC </x-th> <x-td><label>
                                <input name="sc" value="{{$fr->sc}}" >
                            </label></x-td> </tr>
                    <tr> <x-th> NOTES </x-th> <x-td><label>
                                <input type="text" name="notes" value="{{$fr->notes}}">
                            </label></x-td> </tr>
                    <tr>  <x-th> SID </x-th> <x-td><label>
                                <input type="number" name="sid" value="{{$fr->sid}}">
                            </label></x-td> </tr>
                    <tr>  <x-th> NI </x-th> <x-td><label>
                                <input type="number" name="ni" value="{{$fr->ni}}">
                            </label></x-td> </tr>
                    <tr>  <x-th> NB </x-th> <x-td><label>
                                <input type="number" name="nb" value="{{$fr->nb}}">
                            </label></x-td> </tr>
                    <tr>    <x-th> SID=01 </x-th> <x-td><label>
                                <input type="number" name="sid=01" value="{{$fr->sid=01}}">
                            </label></x-td> </tr>
                    <tr>  <x-th> SID=02 </x-th> <x-td><label>
                                <input type="number" name="sid=02" value="{{$fr->sid=02}}">
                            </label></x-td> </tr>
                    <tr>  <x-th> SID=03 </x-th> <x-td><label>
                                <input type="number" name="sid=03" value="{{$fr->sid=03}}">
                            </label></x-td> </tr>
                    <tr>  <x-th> SID=04 </x-th>  <x-td><label>
                                <input type="number" name="sid=04" value="{{$fr->sid=04}}">
                            </label></x-td> </tr>
                    <tr>   <x-th> SID=05 </x-th> <x-td><label>
                                <input type="number" name="sid=05" value="{{$fr->sid=05}}">
                            </label></x-td> </tr>
                    <tr>   <x-th> SID=06 </x-th> <x-td><label>
                                <input type="number" name="sid=06" value="{{$fr->sid=06}}">
                            </label></x-td> </tr>
                    <tr>    <x-th> SID=07 </x-th> <x-td><label>
                                <input type="number" name="sid=07" value="{{$fr->sid=07}}">
                            </label></x-td> </tr>
                    <tr>   <x-th> ND </x-th> <x-td><label>
                                <input type="number" name="nd" value="{{$fr->nd}}">
                            </label></x-td> </tr>
                @endforeach
                <!-- Row Actions -->
                <tr>
                    <td class="border border-green-600 rounded-md ..." colspan="2">
                        <div class="flex items-center justify-end mt-4">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900"
                               href="{{ route('sss.index', request(['en','pc', 'pt', 'fr'])) }}">
                                {{ __('Show me all experiments') }}
                            </a>
                            <x-button class="ml-4" type="submit">
                                {{ __('Update this form row') }}
                            </x-button>
                        </div>
                    </td>
                </tbody>
            </x-table>
        </form>
        <!-- Delete this row -->
        <form action="{{route('sss.destroy', [request('fr'),'pc'=>request('pc'), 'en'=>request('en'), 'fr'=>request('fr')])}}" method="POST">
            @csrf
            @method('DELETE')
            <x-button type="submit"> Delete this form row </x-button>
        </form>
    </x-auth-card>
    <x-footer></x-footer>
</x-app-layout>
