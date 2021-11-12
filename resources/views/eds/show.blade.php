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
            <h3><strong> ED Experiment No. {{ request('en') }} </strong></h3>
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
                <x-th> SI </x-th>
                <x-th> FR </x-th>
                <x-th> DT </x-th>
                <x-th> EA </x-th>
                <x-th> CR </x-th>
                <x-th> CP </x-th>
                <x-th> HH </x-th>
                <x-th> SID </x-th>
                <x-th> ME </x-th>
                <x-th> IN </x-th>
                <x-th> HT </x-th>
                <x-th> ST </x-th>
                <x-th> FT </x-th>
                <x-th> HP </x-th>
                <x-th> RND </x-th>
                <x-th> BLK </x-th>
                <x-th> SHH </x-th>
                <x-th> STN </x-th>
                <x-th> VN </x-th>
                <x-th> VI </x-th>
                <x-th> TR </x-th>
                <x-th> DY </x-th>
                <x-th> HS </x-th>
                <x-th> VC </x-th>
                <x-th> DSEN </x-th>
                <x-th> NOTES </x-th>
                <x-th> ESI </x-th>
                <x-th> RSI </x-th>
                <x-th> CREATED_AT </x-th>
                <x-th> UPDATED_AT </x-th>


            </tr>
            </thead>
            <tbody>
            @foreach($ed as $fr)
                <tr>
                    <x-td> {{ $fr->pc }} </x-td>
                    <x-td> {{ $fr->en }} </x-td>
                    <x-td> {{ $fr->sen }} </x-td>
                    <x-td> {{ $fr->si }} </x-td>
                    <x-td> {{ $fr->fr }} </x-td>
                    <x-td> {{ $fr->dt }} </x-td>
                    <x-td> {{ $fr->ea }} </x-td>
                    <x-td> {{ $fr->cr }} </x-td>
                    <x-td> {{ $fr->cp }} </x-td>
                    <x-td> {{ $fr->hh }} </x-td>
                    <x-td> {{ $fr->sid }} </x-td>
                    <x-td> {{ $fr->me }} </x-td>
                    <x-td> {{ $fr->in }} </x-td>
                    <x-td> {{ $fr->ht }} </x-td>
                    <x-td> {{ $fr->st }} </x-td>
                    <x-td> {{ $fr->ft }} </x-td>
                    <x-td> {{ $fr->hp }} </x-td>
                    <x-td> {{ $fr->rnd }} </x-td>
                    <x-td> {{ $fr->blk }} </x-td>
                    <x-td> {{ $fr->shh }} </x-td>
                    <x-td> {{ $fr->stn }} </x-td>
                    <x-td> {{ $fr->vn }} </x-td>
                    <x-td> {{ $fr->vi }} </x-td>
                    <x-td> {{ $fr->tr }} </x-td>
                    <x-td> {{ $fr->dy }} </x-td>
                    <x-td> {{ $fr->hs }} </x-td>
                    <x-td> {{ $fr->vc }} </x-td>
                    <x-td> {{ $fr->dsen }} </x-td>
                    <x-td> {{ $fr->notes }} </x-td>
                    <x-td> {{ $fr->esi }} </x-td>
                    <x-td> {{ $fr->rsi }} </x-td>
                    <x-td> {{ $fr->created_at }} </x-td>
                    <x-td> {{ $fr->updated_at }} </x-td>
                </tr>
            @endforeach
            <!-- Row Actions -->
            <tr>
                <td class="border border-green-600 rounded-md ..." colspan="2">
                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900"
                           href="{{ route('eds.index', request(['en','pc', 'pt'])) }}">
                            {{ __('Show me all experiments') }}
                        </a>
                        <a href="{{ route('edexport',[
                                                       'en'=>request('en'),
                                                       'pc'=>request('pc'),
                                                       'pt'=>request('pt'),
                                                     ]) }}">

                            <x-button class="ml-4">
                                {{ __('I want to download and edit this ED experiment') }}
                            </x-button>
                        </a>
                    </div>
                </td>
            </tr>
            </tbody>
        </x-table>
        {{ $ed->withQueryString()->onEachSide(5)->links() }}
    </x-test>
    <x-footer></x-footer>
</x-app-layout>
