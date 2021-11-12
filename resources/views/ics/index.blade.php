<x-app-layout>
    <!-- Page Header -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Project : <u>{{request('pt')}} </u> <br>
            Activity : Showing all Informed Consents
        </h2>
    </x-slot>
    <!-- Page Content -->
    @if($ippc->isNotEmpty())
        <x-auth-card>
            <x-slot name="logo">
                <h3> <strong> IC Experiments Pane </strong> </h3>
            </x-slot>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <x-table>
                <tr>
                    <x-th> Experiment No (EN) </x-th>
                    <x-th> View IC data </x-th>
                    <x-th> Download IC data </x-th>
                    <x-th> Upload IC data </x-th>
                    <!--<x-th> Advanced Options </x-th>-->
                </tr>
                @foreach( $ippc as $ic )
                    <tr>
                        <x-td>{{ $ic->en }} </x-td>
                        <x-td>
                            <x-a  href="{{ route('ics.show',[ $ic->en, 'pc'=>request('pc'), 'pt'=>request('pt'), 'en'=> $ic->en, ]) }}">
                                {{ __('View data for this Informed Consent (IC)') }}
                            </x-a>
                        </x-td>
                        <x-td>
                            <x-a href="{{ route('icexport',['en'=> $ic->en, 'pc'=>request('pc'), 'pt'=>request('pt') ]) }}">
                                {{ __('Download data for this Informed Consent (IC)') }}
                            </x-a>
                        </x-td>
                        <x-td>
                            <x-a href="{{ route('gic_upload',['en'=> $ic->en, 'pt'=>request('pt'), 'pc'=>request('pc')]) }}">
                                {{ __('Upload new data for this Informed Consent (IC)') }}
                            </x-a>
                        </x-td>
                        <!--<x-td>
                            <script>
                                function pop(){confirm('Delete?'); }
                            </script>
                        </x-td>-->
                    </tr>
                @endforeach
            </x-table>
            {{$ippc->links()}}
        </x-auth-card>

    @else
        <x-auth-card>
            <x-slot name="logo">
                <h3> <strong> Informed Consents (IC) Pane </strong> </h3>
            </x-slot>
            <h3>
                <strong> No IC Data Available </strong>
            </h3>
                <a href="{{ route( 'gic_upload', [ 'pt'=>request('pt') ] ) }}" >
                   <x-button>
                       Upload New Informed Consent (IC) data for this project
                   </x-button>
                </a>
        </x-auth-card>
    @endif
    <x-footer></x-footer>
</x-app-layout>

