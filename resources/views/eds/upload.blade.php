<x-app-layout>

    <!-- Page Header -->

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             Uploading Experiment Design (ED) data for <strong> <u> {{request('pt')}} </u> </strong> project
        </h2>
    </x-slot>

    <!-- Page Content -->

    <x-auth-card>
        <x-slot name="logo">
            Please ensure that the data are correctly filled in before uploading
        </x-slot>
        {!! Form::open( [ 'route' => [ 'ed_import',
                                           [ 'pt' => request( 'pt' ),
                                            'pc'=>request('pc'),'en'=>request('en')] ],
                                                  'method' => 'POST',
                                                  'files' => true
                                                  ] ) !!}

        <p>
            {{ Form::label( 'eds', 'Select an Excel file with Experiment Design (ED) data to upload' ) }}
        </p>

        <br>

       <p> {{ Form::file( 'eds' ) }}</p>

        <br><br><br>

        <x-button class="ml-4">
            {{ __( 'Upload Field Collection Data' ) }}
        </x-button>


        {!! Form::close() !!}

    </x-auth-card>
    <x-footer></x-footer>
</x-app-layout>
