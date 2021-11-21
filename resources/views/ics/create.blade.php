<x-app-layout>
    <!-- Page Header -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Project : {{ $pt }} <br>
            Informed Consent : Record Form
        </h2>
    </x-slot>
    <!-- Page Content -->
    <x-auth-card>
        <x-slot name="logo">
            Check all attributes you want to include in your consent record
            <br>
            Pre-checked attributes with red background are mandatory
        </x-slot>


        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors">

        </x-auth-validation-errors>

    {!! Form::model( $project, [ 'route' => [ 'export_ics', ], 'method' => 'POST'] ) !!}

    <!-- PROJECT CODE (PC) -->
        <div>
            {{ Form::label( 'pc', 'PROJECT CODE (PC):', [ 'class'=>' bg-red-300 ', ] ) }}
            {{ Form::checkbox( 'pc', old( 'pc' ), true, [ 'required'=> true, ] ) }}
        </div>
        <br>
        <!-- EXPERIMENT NUMBER (EN) -->
        <div>
            {{ Form::label( 'en', 'EXPERIMENT NO (EN):', [ 'class'=>' bg-red-300 ', ] ) }}
            {{ Form::checkbox( 'en', old( 'en' ), true , [ 'required'=> true, ]) }}
        </div>
        <br>
        <!-- SERIAL NO (SEN) -->
        <div>
            {{ Form::label( 'sen', 'SERIAL NO (SEN):', [ 'class'=>' bg-red-300 ', ] ) }}
            {{ Form::checkbox( 'sen', old( 'sen' ), true, [ 'required'=> true, ] ) }}
        </div>
        <br>
        <!-- SITE (SI) -->
        <div>
            {{ Form::label( 'si', 'SITE (SI):' ) }}
            {{Form::checkbox( 'si', old( 'si' ) ) }}
        </div>
        <br>
        <!-- IRB Approval No. (IRB) -->
        <div>
            {{ Form::label( 'irb', 'IRB Approval No. (IRB):', [ 'class'=>' bg-red-300 ', ] ) }}
            {{Form::checkbox( 'irb', old( 'irb' ), true, [ 'required'=> true, ] ) }}
        </div>
        <br>
        <!-- Form Row (FR) -->
        <div>
            {{ Form::label( 'fr', 'Form Row (FR)', [ 'class'=>' bg-red-300 ', ] ) }}
            {{ Form::checkbox( 'fr', old( 'fr' ), true, [ 'required'=> true, ]  ) }}
        </div>
        <br>
        <!-- Informed Consent Type (ICT) -->
        <div>
            {{ Form::label( 'ict', 'Informed Consent Type (ICT)', [ 'class'=>' bg-red-300 ', ] ) }}
            {{ Form::checkbox( 'ict', old( 'ict' ), true, [ 'required'=> true, ]  ) }}
        </div>
        <br>
        <!-- Date of Collection (DT) -->
        <div>
            {{ Form::label( 'dt', 'Date of Collection (DT)', [ 'class'=>' bg-red-300 ', ] ) }}
            {{ Form::checkbox( 'dt', old( 'dt' ), [ 'required'=> true, ]  ) }}
        </div>
        <br>
        <!-- ED Form Serial No. (DSEN) -->
        <div>
            {{ Form::label( 'dsen', 'ED Form Serial No. (DSEN)', [ 'class'=>' bg-red-300 ', ] ) }}
            {{ Form::checkbox( 'dsen', old( 'dsen' ), true, [ 'required'=> true, ] ) }}
        </div>
        <br>
        <!-- Enumeration Area (EA) -->
        <div>
            {{ Form::label( 'ea', 'Enumeration Area (EA)') }}
            {{ Form::checkbox( 'ea', old( 'ea' ) ) }}
        </div>
        <br>
        <!-- Cluster (CR) -->
        <div>
            {{ Form::label( 'cr','Cluster (CR)' ) }}
            {{ Form::checkbox( 'cr', old( 'cr' ) ) }}
        </div>
        <br>
        <!-- Compound or Plot (CP) -->
        <div>
            {{ Form::label( 'cp', 'Compound or Plot (CP)' ) }}
            {{ Form::checkbox( 'cp', old( 'cp' ) ) }}
        </div>
        <br>
        <!-- Household (HH) -->
        <div>
            {{ Form::label( 'hh','Household (HH)' ) }}
            {{ Form::checkbox( 'hh', old( 'hh' ) ) }}
        </div>
        <br>
        <!-- Structure/Habitat ID (STID) -->
        <div>
            {{ Form::label( 'stid', 'Structure/Habitat ID (STID)' ) }}
            {{ Form::checkbox( 'stid', old( 'stid' ) ) }}
        </div>
        <br>
        <!-- House/Hat (SHH) -->
        <div>
            {{ Form::label( 'shh', 'House/Hat (SHH)' ) }}
            {{ Form::checkbox( 'shh', old( 'shh' ) ) }}
        </div>
        <br>
        <!-- Station (ST) -->
        <div>
            {{ Form::label( 'st', 'Station (ST)', [ 'class'=>' bg-red-300 ', ] ) }}
            {{ Form::checkbox( 'st', old( 'st' ), true, [ 'required'=> true, ] ) }}
        </div>
        <br>
        <!-- Volunteer Initials (VI) -->
        <div>
            {{ Form::label( 'vi', 'Volunteer Initials (VI)' ) }}
            {{ Form::checkbox( 'vi', old( 'vi' ) ) }}
        </div>
        <br>
        <!-- Volunteer Name (VN) -->
        <div>
            {{ Form::label( 'vn', 'Volunteer Name (VN)' ) }}
            {{ Form::checkbox( 'vn', old( 'vn' ) ) }}
        </div>
        <br>
        <!-- Notes -->
        <div>
            {{ Form::label( 'notes', 'Notes (notes)' ) }}
            {{ Form::checkbox( 'notes', old( 'notes' ) ) }}
        </div>
        <br>

        <!-- EXPERIMENT SUPERVISOR\'S INITIALS (ESI) -->
        <div>
            {{ Form::label( 'esi', 'EXPERIMENT SUPERVISOR\'S INITIALS (ESI)' ) }}
            {{ Form::checkbox( 'esi', old( 'esi' ) ) }}
        </div>
        <br>

        <!-- RESPONSIBLE SCIENTIST'S INITIALS (RSI): -->
        <div>
            {{ Form::label( 'rsi', 'RESPONSIBLE SCIENTIST\'S INITIALS (RSI):' ) }}
            {{ Form::checkbox( 'rsi', old( 'rsi' ) ) }}
        </div>
        <br>

        <br>
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route( 'ics.index', ['pt'=>$pt] ) }}">
                {{ __( 'Work on an existing experiment instead?' ) }}
            </a>

            <x-button class="ml-4">
                {{ __( 'Download the Template' ) }}
            </x-button>
        </div>

        {!!Form::close()!!}

    </x-auth-card>
</x-app-layout>


