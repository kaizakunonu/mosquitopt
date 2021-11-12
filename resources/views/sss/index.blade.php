<x-app-layout>
    <!-- Page Header -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Project : <strong> <u> {{request('pt')}} </u> </strong> <br>
            Activity : Showing all SS experiments
        </h2>
    </x-slot>
    <!-- Page Content -->
    @if($sepp->isNotEmpty()))
    <x-auth-card>
        <x-slot name="logo">
            <h3> <strong> Sample Sorting (SS) Experiments Pane </strong> </h3>
        </x-slot>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <x-table>
            <tr>
                <x-th> Experiment No </x-th>
                <x-th> View SS data  </x-th>
                <x-th> Download SS data </x-th>
                <x-th> Upload SS data </x-th>
            </tr>
            @foreach( $sepp as $ss )
                <tr>
                    <x-td> {{ $ss->en }} </x-td>
                    <x-td>
                        <x-a
                           href="{{ route('sss.show',[$ss->en, 'pc'=>session('pc'), 'pt'=>$pt, 'en'=> $ss->en, ]) }}">
                            {{ __('View data for this experiment') }}
                        </x-a>
                    </x-td>
                    <x-td>
                        <x-a
                           href="{{ route('ssexport',['en'=> $ss->en, 'pc'=>session('pc'), 'pt'=>$pt]) }}">
                            {{ __('Download  data for this experiment') }}
                        </x-a>
                    </x-td>

                    <x-td>
                        <x-a
                           href="{{ route('gss_upload',['en'=> $ss->en, 'pt'=>$pt, 'pc'=>$pc]) }}">
                            {{ __('Upload new data for this experiment') }}
                        </x-a>
                    </x-td>
                </tr>
            @endforeach
        </x-table>
    </x-auth-card>
    @else
        <x-auth-card>
            <x-slot name="logo">
                <h3>
                    <strong>
                        Sample Sorting (SS) Experiments Pane
                    </strong>
                </h3>
            </x-slot>
            <h3>
                <strong> No SS Data Available </strong>
            </h3>
            <a href="{{ route( 'gss_upload', [ 'pt'=>request('pt') ] ) }}" >
                <x-button>
                    Upload New Sample Sorting (SS) data for this project
                </x-button>
            </a>
        </x-auth-card>
    @endif
    <x-footer></x-footer>
</x-app-layout>

