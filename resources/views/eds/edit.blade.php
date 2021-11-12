<x-app-layout>
    <!-- Page Header -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Project : <u> {{request('pt')}} </u> <br>
            Activity : Editing details for form row number <u> {{request('fr')}} </u>
        </h2>
    </x-slot>
    <!-- Page Content -->
    <x-auth-card>
        <x-slot name="logo">
            <h3>
                <strong>ED Experiment No. {{ request('en') }}, Form Row (FR) No. {{request('fr')}}</strong>
            </h3>
        </x-slot>
        @if (session('status'))
            <div class="alert alert-success">
                <script>

                    var app = @json(session('status'));
                    pop(app);
                </script>

            </div>
        @endif
        <form action="{{route('eds.update',
                                           [request('fr'),
                                           'pc'=>request('pc'),
                                            'en'=>request('en'),
                                             'fr'=>request('fr'),
                                             'pt'=>request('pt')])}}" method="POST" id="ed">
            @csrf
            @method('PUT')
            <x-table>
                <caption> Scroll down to update this Form Row (FR)</caption>
                <thead>
                </thead>
                <tbody>
                @foreach($ed as $fr)
                    <tr>
                        <x-th> PC</x-th>
                        <x-td><label for="pc">
                                <input type="text" name="pc" value="{{request('pc')}}" readonly required>
                            </label></x-td>
                    </tr>
                    <tr>
                        <x-th> EN</x-th>
                        <x-td><label>
                                <input type="number" name="en" value="{{request('en')}}" readonly required>
                            </label></x-td>
                    </tr>
                    <tr>
                        <x-th> SEN</x-th>
                        <x-td><label>
                                <input type="number" name="sen" value="{{$fr->sen}}" required autofocus>
                            </label></x-td>
                    </tr>
                    <tr>
                        <x-th> SI</x-th>
                        <x-td><label>
                                <input type="number" value="{{$fr->si}}" name="si">
                            </label></x-td>
                    </tr>
                    <tr>
                        <x-th> FR</x-th>
                        <x-td><label>
                                <input type="number" name="fr" value="{{$fr->fr}}" readonly required>
                            </label></x-td>
                    </tr>
                    <tr>
                        <x-th> DT</x-th>
                        <x-td><label>
                                <input type="date" name="dt" value="{{$fr->dt}}" required>
                            </label></x-td>
                    </tr>
                    <tr>
                        <x-th> EA</x-th>
                        <x-td><label>
                                <input type="number" name="ea" value="{{$fr->ea}}">
                            </label></x-td>
                    </tr>
                    <tr>
                        <x-th> CR</x-th>
                        <x-td><label>
                                <input type="number" name="cr" value="{{$fr->cr}}">
                            </label></x-td>
                    </tr>
                    <tr>
                        <x-th> CP</x-th>
                        <x-td><label>
                                <input type="number" name="cp" value="{{$fr->cp}}">
                            </label></x-td>
                    </tr>
                    <tr>
                        <x-th> HH</x-th>
                        <x-td><label>
                                <input type="number" name="hh" value="{{$fr->hh}}">
                            </label></x-td>
                    </tr>
                    <tr>
                        <x-th> SID</x-th>
                        <x-td><label>
                                <input type="number" name="sid" value="{{$fr->sid}}">
                            </label></x-td>
                    </tr>
                    <tr>
                        <x-th> ME</x-th>
                        <x-td><label>
                                <input type="number" name="me" value="{{$fr->me}}" required>
                            </label></x-td>
                    </tr>
                    <tr>
                        <x-th> IN</x-th>
                        <x-td><label>
                                <select name="in">
                                    <option value="1"> 1</option>
                                    <option value="2" selected> 2</option>
                                </select>
                            </label></x-td>
                    </tr>
                    <tr>
                        <x-th> HT</x-th>
                        <x-td><label>
                                <input type="number" name="ht" value="{{$fr->ht}}">
                            </label></x-td>
                    </tr>
                    <tr>
                        <x-th> ST</x-th>
                        <x-td><label>
                                <input type="time" name="st" value="{{$fr->st}}">
                            </label></x-td>
                    </tr>
                    <tr>
                        <x-th> FT</x-th>
                        <x-td><label>
                                <input type="time" name="ft" value="{{$fr->ft}}">
                            </label></x-td>
                    </tr>
                    <tr>
                        <x-th> HP</x-th>
                        <x-td><label>
                                <input type="time" name="hp" value="{{$fr->hp}}">
                            </label></x-td>
                    </tr>
                    <tr>
                        <x-th> RND</x-th>
                        <x-td><label>
                                <input type="number" name="rnd" value="{{$fr->rnd}}">
                            </label></x-td>
                    </tr>
                    <tr>
                        <x-th> BLK</x-th>
                        <x-td><label>
                                <input type="number" name="blk" value="{{$fr->blk}}">
                            </label></x-td>
                    </tr>
                    <tr>
                        <x-th> SHH</x-th>
                        <x-td><label>
                                <input type="number" name="shh" value="{{$fr->shh}}">
                            </label></x-td>
                    </tr>
                    <tr>
                        <x-th> STN</x-th>
                        <x-td><label>
                                <input type="number" name="stn" value="{{$fr->stn}}">
                            </label></x-td>
                    </tr>
                    <tr>
                        <x-th> VN</x-th>
                        <x-td><label>
                                <input type="text" name="vn" value="{{$fr->vn}}">
                            </label></x-td>
                    </tr>
                    <tr>
                        <x-th> VI</x-th>
                        <x-td><label>
                                <input type="text" name="vi" value="{{$fr->vi}}">
                            </label></x-td>
                    </tr>
                    <tr>
                        <x-th> TR</x-th>
                        <x-td><label>
                                <input type="number" name="tr" value="{{$fr->tr}}">
                            </label></x-td>
                    </tr>
                    <tr>
                        <x-th> DY</x-th>
                        <x-td><label>
                                <input type="number" name="dy" value="{{$fr->dy}}">
                            </label></x-td>
                    </tr>
                    <tr>
                        <x-th> HS</x-th>
                        <x-td><label>
                                <input type="number" name="hs" value="{{$fr->hs}}">
                            </label></x-td>
                    </tr>
                    <tr>
                        <x-th> VC</x-th>
                        <x-td><label>
                                <select name="vc">
                                    <option> 1</option>
                                    <option>2</option>
                                </select>
                            </label></x-td>
                    </tr>
                    <tr>
                        <x-th> DSEN</x-th>
                        <x-td><label>
                                <input type="number" name="dsen" value="{{$fr->dsen}}">
                            </label></x-td>
                    </tr>
                    <tr>
                        <x-th> NOTES</x-th>
                        <x-td><label>
                                <input type="text" name="notes" value="{{$fr->notes}}">
                            </label></x-td>
                    </tr>
                    <tr>
                        <x-th> ESI</x-th>
                        <x-td><label>
                                <input type="text" name="esi" value="{{$fr->esi}}">
                            </label></x-td>
                    </tr>
                    <tr>
                        <x-th> RSI</x-th>
                        <x-td><label>
                                <input type="text" name="rsi" value="{{$fr->rsi}}">
                            </label></x-td>
                    </tr>
                @endforeach
                <!-- Row Actions -->
                <tr>
                    <td class="border border-green-600 rounded-md ..." colspan="2">
                        <div class="flex items-center justify-end mt-4">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900"
                               href="{{ route('eds.show',[request('en'), 'pc'=>request('pc'), 'pt'=>request('pt'), 'en'=>request('en')]) }}">
                                {{ __('Discard Changes') }}
                            </a>

                            <x-button class="ml-4" type="submit" form="ed">
                                {{ __('Update this form row') }}
                            </x-button>
                        </div>
                    </td>
                </tr>
                </tbody>
            </x-table>
        </form>
        <br><br>
        <form action="{{route('eds.destroy',
                                                            [ request('fr'),'pc'=>request('pc'),
                                                              'en'=>request('en'), 'fr'=>request('fr'),
                                                              'pt'=>request('pt')])}}" method="POST" id="ed_delete">
            @csrf
            @method('DELETE')
            <x-button type="submit" form="ed_delete"> Delete this form row </x-button>
        </form>
    </x-auth-card>
    <x-footer></x-footer>
</x-app-layout>
