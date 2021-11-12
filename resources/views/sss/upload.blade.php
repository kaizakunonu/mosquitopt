<x-app-layout>

    <!-- Page Header -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" >
             Uploading Sample Sorting (SS) data for <strong> <u> {{request('pt')}} </u> </strong> project
        </h2>
    </x-slot>

    <!-- Page Content -->

    <x-auth-card>

        <x-slot name="logo">
            Please ensure that the data are correctly filled in before uploading
        </x-slot>

        {!! Form::open( [ 'route' => [ 'ss_import',
                                            [ 'pt' => request('pt'),
                                                   'pc' => request( 'pc' ),
                                                 ],
                                          ],
                          'method' => 'POST',
                          'files' => true
                          ] ) !!}

       <p>
           {{ Form::label( 'sss', 'Select an Excel file with Sample Sorting (SS) data to upload' ) }}
       </p>

        <br>

      <p> {{ Form::file( 'sss' ) }}</p>

        <br><br><br>

        <x-button class="ml-4">
            {{ __( 'Upload Sample Sorting (SS) Data' ) }}
        </x-button>


        {!! Form::close() !!}

    </x-auth-card>

    <!-- Footer -->
    <x-footer></x-footer>
</x-app-layout>
