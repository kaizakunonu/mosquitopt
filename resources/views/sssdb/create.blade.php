<x-app-layout>

    <!-- Page Header -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Sample Sorting : Adult Field Collection
        </h2>
    </x-slot>

    <!-- Page Content -->
    <div class="flex flex-wrap">
        <div class="flex-1 ...">
            <x-auth-card>
                <x-slot name="logo">
                    Check all attributes you want to include in your Sample Sorting
                    <br>
                    Pre-checked attributes with red background are mandatory
                </x-slot>


                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors"></x-auth-validation-errors>

            {!! Form::model( $aid, [ 'route' => array( 'export_sss', 'aid' => $aid ), 'method' => 'POST' ] ) !!}

            <!-- PROJECT CODE (PC) -->
                <div>
                    {{ Form::label( 'pc', 'PROJECT CODE (PC):', [ 'class'=>' bg-red-300 ', ] ) }}
                    {{ Form::checkbox( 'pc', old( 'pc' ), true, [ 'required'=> true, ]  ) }}
                </div>
                <br>

                <!-- EXPERIMENT NUMBER (EN) -->
                <div>
                    {{ Form::label( 'en', 'EXPERIMENT NO (EN):', [ 'class'=>' bg-red-300 ', ] ) }}
                    {{ Form::checkbox( 'en', old( 'en' ), true, [ 'required'=> true, ] ) }}
                </div>
                <br>

                <!-- SERIAL NO (SEN) -->
                <div>
                    {{ Form::label( 'sen', 'SERIAL NO. (SEN):', [ 'class'=>' bg-red-300 ', ]) }}
                    {{ Form::checkbox( 'sen', old( 'sen' ), true, [ 'required'=> true, ] ) }}
                </div>
                <br>

                <!-- Date (DT) -->
                <div>
                    {{ Form::label( 'dt', 'Date (DT):', [ 'class'=>' bg-red-300 ', ] ) }}
                    {{ Form::checkbox( 'dt', old( 'dt' ), true, [ 'required'=> true, ]  ) }}
                </div>
                <br>

                <!-- Form Type (FT) -->
                <div>
                    {{ Form::label( 'ft', 'Form Type (FT):', [ 'class'=>' bg-red-300 ', ]  ) }}
                    {{ Form::checkbox( 'ft', old( 'ft' ), true, [ 'required'=> true, ] ) }}
                </div>
                <br>

                <!-- ED Form Serial No. (SSEN) -->
                <div>
                    {{ Form::label( 'ssen', 'ED Form Serial No. (SSEN):', [ 'class'=>' bg-red-300 ', ] ) }}
                    {{ Form::checkbox( 'ssen', old( 'ssen' ), true, [ 'required'=> true, ] ) }}
                </div>
                <br>

                <!-- ED Form Row (SFR) -->
                <div>
                    {{ Form::label( 'sfr', 'ED Form Row (SFR):', [ 'class'=>' bg-red-300 ', ] ) }}
                    {{ Form::checkbox( 'sfr', old( 'sfr' ), true, [ 'required'=> true, ] ) }}
                </div>
                <br>

                <!-- Form Row (FR) -->
                <div>
                    {{ Form::label( 'fr', 'Form Row (FR)', [ 'class'=>' bg-red-300 ', ] ) }}
                    {{ Form::checkbox( 'fr', old( 'fr' ), true, [ 'required'=> true, ] ) }}
                </div>
                <br>

                <!-- Taxon (TX) -->
                <div>
                    {{ Form::label( 'tx', 'Taxon (TX)' ) }}
                    {{ Form::checkbox( 'tx', old( 'tx' ) ) }}
                </div>
                <br>

                <!-- Sex and Abdominal Status (SAS) -->
                <div>
                    {{ Form::label( 'sas', 'Sex and Abdominal Status (SAS)', [ 'class'=>' bg-red-300 ', ] ) }}
                    {{ Form::checkbox( 'sas', old( 'sas' ), true, [ 'required'=> true, ] ) }}
                </div>
                <br>

                <!-- Method (ME) -->
                <div>
                    {{ Form::label( 'me', 'Method (ME)', [ 'class'=>' bg-red-300 ', ] ) }}
                    {{ Form::checkbox( 'me', old( 'me' ), true, [ 'required'=> true, ] ) }}
                </div>
                <br>

                <!-- Sample ID (SID) -->
                <div>
                    {{ Form::label( 'sid', 'Sample ID (sid)') }}
                    {{ Form::checkbox( 'sid', old( 'sid' ) ) }}
                </div>
                <br>

                <!-- Number Caught (N) -->
                <div>
                    {{ Form::label( 'n', 'Number Caught (N)' ) }}
                    {{ Form::checkbox( 'n', old( 'n' ) ) }}
                </div>
                <br>

                <!-- Notes and Observation -->
                <div>
                    {{ Form::label( 'notes', 'Notes and Observation (notes)' ) }}
                    {{ Form::checkbox( 'notes', old( 'notes' ) ) }}
                </div>
                <br>

                <!-- Sample Label Code (SLC) -->
                <div>
                    {{ Form::label( 'slc', 'Sample Label Code (SLC)',  [ 'class'=>' bg-red-300 ', ] ) }}
                    {{ Form::checkbox( 'slc', old( 'slc' ), true,  [ 'required'=> true, ]  ) }}
                </div>
                <br>

                <!-- Body Form (BF) -->
                <div>
                    {{ Form::label( 'bf','Body Form (BF)',  [ 'class'=>' bg-red-300 ', ] ) }}
                    {{ Form::checkbox( 'bf', old( 'bf' ), true,  [ 'required'=> true, ] ) }}
                </div>
                <br>


            </x-auth-card>
        </div>
        <div class="flex-1 ...">
            <x-auth-card>
                <x-slot name="logo">
                    Check all attributes you want to observe in your Sample Sorting
                    <br>
                    Pre-checked attributes with red background are mandatory
                </x-slot>


                <!-- Sample Type (st) -->
                <div>
                    {{ Form::label( 'st', 'Sample Type (ST)' ) }}
                    {{ Form::checkbox( 'st', old( 'st' ) ) }}
                </div>
                <br>

                <!-- SITE (SI) -->
                <div>
                    {{ Form::label( 'si', 'SITE (SI):' ) }}
                    {{Form::checkbox( 'si', old( 'si' ) ) }}
                </div>
                <br>

                <!-- Storage Costs (SC) -->
                <div>
                    {{ Form::label( 'sc', 'Storage Costs (SC):' ) }}
                    {{ Form::checkbox( 'sc', old( 'sc' ) ) }}
                </div>
                <br>



                <!-- Number of Individuals (NI) -->
                <div>
                    {{ Form::label( 'ni','Number of Individuals (NI)' ) }}
                    {{ Form::checkbox('ni', old('ni') ) }}
                </div>
                <br>

                <!-- Number of Batches (NB) -->
                <div>
                    {{ Form::label( 'nb', 'Number of Batches (nb)' ) }}
                    {{ Form::checkbox( 'nb', old( 'nb' ) ) }}
                </div>
                <br>

                <!-- Number in Batch 1 (SID=01) -->
                <div>
                    {{ Form::label( 'sid=01', 'Number in Batch 1 (SID=01)' ) }}
                    {{ Form::checkbox( 'sid=01', old( 'sid=01' ) ) }}
                </div>
                <br>

                <!-- Number in Batch 2 (SID=02) -->
                <div>
                    {{ Form::label( 'sid=02', 'Number in Batch 2 (SID=02)' ) }}
                    {{ Form::checkbox( 'sid=02', old( 'sid=02' ) ) }}
                </div>
                <br>

                <!-- Number in Batch 3 (SID=03) -->
                <div>
                    {{ Form::label( 'sid=03', 'Number in Batch 3 (SID=03)' ) }}
                    {{ Form::checkbox( 'sid=03', old( 'sid=03' ) ) }}
                </div>
                <br>

                <!-- Number in Batch 4 (SID=04) -->
                <div>
                    {{ Form::label( 'sid=04', 'Number in Batch 4 (SID=04)' ) }}
                    {{ Form::checkbox( 'sid=04', old( 'sid=04' ) ) }}
                </div>
                <br>

                <!-- Number in Batch 5 (SID=05) -->
                <div>
                    {{ Form::label( 'sid=05', 'Number in Batch 5 (SID=05)' ) }}
                    {{ Form::checkbox( 'sid=05', old( 'sid=05' ) ) }}
                </div>
                <br>

                <!-- Number in Batch 6 (SID=06) -->
                <div>
                    {{ Form::label( 'sid=06', 'Number in Batch 6 (SID=06)' ) }}
                    {{ Form::checkbox( 'sid=06', old( 'sid=06' ) ) }}
                </div>
                <br>

                <!-- Number in Batch 7 (SID=07) -->
                <div>
                    {{ Form::label( 'sid=07', 'Number in Batch 7 (SID=07)' ) }}
                    {{ Form::checkbox( 'sid=07', old( 'sid=07' ) ) }}
                </div>
                <br>

                <!-- Sample Discarded (nd) -->
                <div>
                    {{ Form::label( 'nd','Sample Discarded (ND)' ) }}
                    {{ Form::checkbox( 'nd', old( 'nd' ) ) }}
                </div>
                <br>

                <br>
                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('sss.index') }}">
                        {{ __( 'Work on an existing sample instead?' ) }}
                    </a>

                    <x-button class="ml-4">
                        {{ __( 'Download the Sample Sorting Template' ) }}
                    </x-button>
                </div>

                {!!Form::close()!!}
            </x-auth-card>
        </div>
    </div>

    <!-- Footer Component -->
    <x-footer></x-footer>
</x-app-layout>



