<x-app-layout>
    <!-- Page Header -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Project : <u> {{request('pt')}} </u> <br>
            Activity : Showing details for experiment number <u> <strong> {{ request('en') }} </strong> </u>
        </h2>
    </x-slot>
    <!-- Page Content -->
    @once
        <x-test>
            <x-slot name="logo">
                <h3><strong> SS Experiment No. {{ request('en') }} </strong></h3>
            </x-slot>
            @endonce
            <x-table>
                <caption> Scroll down to download and edit this experiment </caption>
                <thead>
                <tr>
                <tr>
                    <x-th> PC </x-th>
                    <x-th> EN </x-th>
                    <x-th> SEN </x-th>
                    <x-th> DT </x-th>
                    <x-th> FT </x-th>
                    <x-th> SSEN </x-th>
                    <x-th> SFR </x-th>
                    <x-th> FR </x-th>
                    <x-th> TX </x-th>
                    <x-th> SAS </x-th>
                    <x-th> ME </x-th>
                    <x-th> N </x-th>
                    <x-th> BF </x-th>
                    <x-th> SLC </x-th>
                    <x-th> ST </x-th>
                    <x-th> SI </x-th>
                    <x-th> SC </x-th>
                    <x-th> NOTES </x-th>
                    <x-th> SID </x-th>
                    <x-th> NI </x-th>
                    <x-th> NB </x-th>
                    <x-th> SID=01 </x-th>
                    <x-th> SID=02 </x-th>
                    <x-th> SID=03 </x-th>
                    <x-th> SID=04 </x-th>
                    <x-th> SID=05 </x-th>
                    <x-th> SID=06 </x-th>
                    <x-th> SID=07 </x-th>
                    <x-th> ND </x-th>
                    <x-th> CREATED_AT </x-th>
                    <x-th> UPDATED_AT </x-th>


                </tr>
                </thead>
                <tbody>
                @foreach($ss as $fr)
                    <tr>
                        <x-td> {{ $fr->pc }} </x-td>
                        <x-td> {{ $fr->en }} </x-td>
                        <x-td> {{ $fr->sen }} </x-td>
                        <x-td> {{ $fr->dt }} </x-td>
                        <x-td> {{ $fr->ft }} </x-td>
                        <x-td> {{ $fr->ssen }} </x-td>
                        <x-td> {{ $fr->sfr }} </x-td>
                        <x-td> {{ $fr->fr }} </x-td>
                        <x-td> {{ $fr->tx }} </x-td>
                        <x-td> {{ $fr->sas }} </x-td>
                        <x-td> {{ $fr->me }} </x-td>
                        <x-td> {{ $fr->n }} </x-td>
                        <x-td> {{ $fr->bf }} </x-td>
                        <x-td> {{ $fr->slc }} </x-td>
                        <x-td> {{ $fr->st }} </x-td>
                        <x-td> {{ $fr->si }} </x-td>
                        <x-td> {{ $fr->sc }} </x-td>
                        <x-td> {{ $fr->notes }} </x-td>
                        <x-td> {{ $fr->sid }} </x-td>
                        <x-td> {{ $fr->ni }} </x-td>
                        <x-td> {{ $fr->nb }} </x-td>
                        <x-td> {{ $fr->sid=01 }} </x-td>
                        <x-td> {{ $fr->sid=02 }} </x-td>
                        <x-td> {{ $fr->sid=03 }} </x-td>
                        <x-td> {{ $fr->sid=04 }} </x-td>
                        <x-td> {{ $fr->sid=05 }} </x-td>
                        <x-td> {{ $fr->sid=06 }} </x-td>
                        <x-td> {{ $fr->sid=07 }} </x-td>
                        <x-td> {{ $fr->nd }} </x-td>
                        <x-td> {{ $fr->created_at }} </x-td>
                        <x-td> {{ $fr->updated_at }} </x-td>
                    </tr>
                @endforeach
                <!-- Row Actions -->
                <tr>
                    <td class="border border-green-600 rounded-md ..." colspan="2">
                        <div class="flex items-center justify-end mt-4">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900"
                               href="{{ route('sss.index', request(['en','pc', 'pt'])) }}">
                                {{ __('Show me all experiments') }}
                            </a>
                            <a href="{{ route('ssexport',[
                                                       'en'=>request('en'),
                                                       'pc'=>request('pc'),
                                                       'pt'=>request('pt'),
                                                     ]) }}">

                                <x-button class="ml-4">
                                    {{ __('I want to download and edit this SS experiment') }}
                                </x-button>
                            </a>
                        </div>
                    </td>
                </tr>
                </tbody>
            </x-table>
            {{ $ss->withQueryString()->onEachSide(5)->links() }}
        </x-test>
</x-app-layout>
