<x-app-layout>
    <!-- Page Header -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             Project : <u>{{request('pt')}} </u> <br>
             Activity : Showing all ED experiments
        </h2>
    </x-slot>
    <!-- Page Content -->
    @if($eppc->isNotEmpty())
    <x-auth-card>
        <x-slot name="logo">
            <h3> <strong> ED Experiments Pane </strong> </h3>
        </x-slot>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    <x-table>
        <tr>
            <x-th> Experiment No (EN) </x-th>
            <x-th> View ED data </x-th>
            <x-th> Download ED data </x-th>
            <x-th> Upload ED data </x-th>
            <x-th> Advanced Options </x-th>
        </tr>
        @foreach( $eppc as $ed )
            <tr>
                <x-td>{{ $ed->en }} </x-td>
                <x-td>
                    <x-a  href="{{ route('eds.show',[ $ed->en, 'pc'=>session('pc'), 'pt'=>request('pt'), 'en'=> $ed->en, ]) }}">
                        {{ __('View data for this experiment') }}
                    </x-a>
                </x-td>
                <x-td>
                    <x-a href="{{ route('edexport',['en'=> $ed->en, 'pc'=>session('pc'), 'pt'=>request('pt') ]) }}">
                        {{ __('Download data for this experiment') }}
                    </x-a>
                </x-td>
                <x-td>
                    <x-a href="{{ route('ged_upload',['en'=> $ed->en, 'pt'=>request('pt'), 'pc'=>request('pc')]) }}">
                        {{ __('Upload new data for this experiment') }}
                    </x-a>
                </x-td>
                <x-td>
                    <script>
                        function pop(){confirm('Delete?'); }
                    </script>
                </x-td>
            </tr>
        @endforeach
    </x-table>
        {{$eppc->links()}}
    </x-auth-card>

    @else
        <x-auth-card>
            <x-slot name="logo">
                <h3>
                    <strong>
                        Experiment Design (ED) Experiments Pane
                    </strong>
                </h3>
            </x-slot>
            <h3>
                <strong> No ED Data Available </strong>
            </h3>
            <a href="{{ route( 'ged_upload', [ 'pt'=>request('pt') ] ) }}" >
                <x-button>
                    Upload New Experiment Design (ED) data for this project
                </x-button>
            </a>
            </x-auth-card>
    @endif
    <x-footer></x-footer>
</x-app-layout>
