<x-app-layout>

    <!-- Page Header -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" >
            Uploading Sample Sorting data for <strong> {{$atitle}} </strong> activity
        </h2>
    </x-slot>

    <!-- Page Content -->

    <x-auth-card>

        <x-slot name="logo">
            Please ensure that the data are correctly filled in before uploading
        </x-slot>

        {!! Form::open( [ 'route' => [ 'ss_import',
                                            [ 'at' => $atitle,
                                                   'aid' => request( 'aid' ),
                                                 ],
                                          ],
                          'method' => 'POST',
                          'files' => true
                          ] ) !!}

        {{ Form::label( 'sss', 'Select an Excel file with Sample Sorting data to upload' ) }}

        {{ Form::file( 'sss' ) }}

        <br><br><br>

        <x-button class="ml-4">
            {{ __( 'Upload Sample Sorting Data' ) }}
        </x-button>


        {!! Form::close() !!}

    </x-auth-card>

    <!-- Footer -->
    <x-footer></x-footer>
</x-app-layout>
