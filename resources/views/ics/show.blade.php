<x-app-layout>
    <!-- Page Header -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Project : <u> {{request('pt')}} </u> <br>
            Activity : Showing details of an IC for experiment number <u> <strong> {{ request('en') }} </strong> </u>
        </h2>
    </x-slot>
    <!-- Page Content -->
    @once
        <x-test>
            <x-slot name="logo">
                <h3>  <strong> IC for Experiment No. {{ request('en') }} </strong>  </h3>
            </x-slot>
            @endonce
                <x-table>
                    <caption> Scroll down to download and edit this Informed Consent (IC) </caption>
                    <thead>
                    <tr>
                        <x-th> PC </x-th>
                        <x-th> EN </x-th>
                        <x-th> SEN </x-th>
                        <x-th> SI </x-th>
                        <x-th> IRB </x-th>
                        <x-th> FR </x-th>
                        <x-th> ICT </x-th>
                        <x-th> DT </x-th>
                        <x-th> DSEN </x-th>
                        <x-th> EA </x-th>
                        <x-th> CR </x-th>
                        <x-th> CP </x-th>
                        <x-th> HH </x-th>
                        <x-th> STID </x-th>
                        <x-th> SHH </x-th>
                        <x-th> ST </x-th> <!--station-->
                        <x-th> VI </x-th>
                        <x-th> VN </x-th>
                        <x-th> NOTES </x-th>
                        <x-th> ESI </x-th>
                        <x-th> RSI </x-th>
                        <!-- <x-th> EDIT </x-th>
                         <x-th> DELETE </x-th>
                         <x-th> CREATED_AT</x-th>
                         <x-th> UPDATED_AT</x-th>-->
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($ic as $fr)
                        <tr>
                            <x-td> {{ $fr->pc }} </x-td>
                            <x-td> {{ $fr->en }} </x-td>
                            <x-td> {{ $fr->sen }} </x-td>
                            <x-td> {{ $fr->si }} </x-td>
                            <x-td> {{ $fr->irb }} </x-td>
                            <x-td> {{ $fr->fr }} </x-td>
                            <x-td> {{ $fr->ict }} </x-td>
                            <x-td> {{ $fr->dt }} </x-td>
                            <x-td> {{ $fr->dsen }} </x-td>
                            <x-td> {{ $fr->ea }} </x-td>
                            <x-td> {{ $fr->cr }} </x-td>
                            <x-td> {{ $fr->cp }} </x-td>
                            <x-td> {{ $fr->hh }} </x-td>
                            <x-td> {{ $fr->stid }} </x-td>
                            <x-td> {{ $fr->shh }} </x-td>
                            <x-td> {{ $fr->st }} </x-td> <!-- station -->
                            <x-td> {{ $fr->vi }} </x-td>
                            <x-td> {{ $fr->vn }} </x-td>
                            <x-td> {{ $fr->notes }} </x-td>
                            <x-td> {{ $fr->esi }} </x-td>
                            <x-td> {{ $fr->rsi }} </x-td>
                          <!--  <x-td> EDIT ME </x-td>
                            <x-td>  DELETE ME </x-td>
                           <x-td> {{-- $fr->created_at --}} </x-td>
                        <x-td> {{-- $fr->updated_at --}} </x-td>-->
                        </tr>
                    @endforeach
                    <!-- Row Actions -->
                    <tr>
                        <td class="border border-green-600 rounded-md ..." colspan="33">
                            <div class="flex items-center justify-end mt-4">
                                <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                   href="{{ route('ics.index', request(['en','pc', 'pt'])) }}">
                                    {{ __('Show me Informed Consents(ICs) for other experiments') }}
                                </a>
                                <a href="{{ route('icexport',[
                                                       'en'=>request('en'),
                                                       'pc'=>request('pc'),
                                                       'pt'=>request('pt'),
                                                     ]) }}">

                                    <x-button class="ml-4">
                                        {{ __('I want to download and edit this Informed Consent (IC)') }}
                                    </x-button>
                                </a>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </x-table>

            {{ $ic->withQueryString()->onEachSide(5)->links() }}
        </x-test>
        <x-footer></x-footer>
</x-app-layout>

