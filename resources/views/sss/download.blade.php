<x-app-layout>

    <!-- Page Header -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <p> Project : {{ $pt }} </p>
           <p> Experiment Design : Field Collections </p>
        </h2>
    </x-slot>

    <!-- Page Content -->

            <x-auth-card>
                <x-slot name="logo">
                    Check all attributes you want to download from database
                    <br>
                    Scroll down to the end to download your desired data
                </x-slot>


                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors">

                </x-auth-validation-errors>

            {!! Form::model( $project, [ 'route' => [ 'export', ], 'method' => 'POST'] ) !!}

            <!-- PROJECT CODE (PC) -->
                <div>
                    {{ Form::label( 'pc', 'PROJECT CODE (PC):'  ) }}
                    {{ Form::checkbox( 'pc', old( 'pc' ),  ) }}
                </div>
                <br>

                <!-- EXPERIMENT NUMBER (EN) -->
                <div>
                    {{ Form::label( 'en', 'EXPERIMENT NO (EN):'  ) }}
                    {{ Form::checkbox( 'en', old( 'en' ) ) }}
                </div>
                <br>

                <!-- SERIAL NO (SEN) -->
                <div>
                    {{ Form::label( 'sen', 'SERIAL NO (SEN):' ) }}
                    {{ Form::checkbox( 'sen', old( 'sen' ) ) }}
                </div>
                <br>

            <!-- FORM TYPE (FT) code in conflict with Finish Time (FT) code
                <div>
                    {{-- Form::label( 'ft', 'FORM TYPE (FT):', [ 'class'=>' bg-red-300 ', ] ) }}
                    {{ Form::checkbox( 'ft', old( 'ft' ), true, [ 'required'=> true, ] ) --}}
                </div>
                <br> -->

                <!-- SITE (SI) -->
                <div>
                    {{ Form::label( 'si', 'SITE (SI):' ) }}
                    {{Form::checkbox( 'si', old( 'si' ) ) }}
                </div>
                <br>

                <!-- Form Row (FR) -->
                <div>
                    {{ Form::label( 'fr', 'Form Row (FR)' ) }}
                    {{ Form::checkbox( 'fr', old( 'fr' )  ) }}
                </div>
                <br>

                <!-- Date of Collection (DT) -->
                <div>
                    {{ Form::label( 'dt', 'Date of Collection (DT)' ) }}
                    {{ Form::checkbox( 'dt', old( 'dt' ) ) }}
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

                <!-- Structure/Habitat ID (SID) -->
                <div>
                    {{ Form::label( 'sid', 'Structure/Habitat ID (SID)' ) }}
                    {{ Form::checkbox( 'sid', old( 'sid' ) ) }}
                </div>
                <br>

                <!-- Method (ME) -->
                <div>
                    {{ Form::label( 'me', 'Method (ME)' ) }}
                    {{ Form::checkbox( 'me', old( 'me' ) ) }}
                </div>
                <br>

                <!-- Indoor/Outdoor (IN) -->
                <div>
                    {{ Form::label( 'in', 'Indoor/Outdoor (IN)' ) }}
                    {{ Form::checkbox( 'in', old( 'in' ) ) }}
                </div>
                <br>

                <!-- Habitat Type (HT) -->
                <div>
                    {{ Form::label( 'ht', 'Habitat Type (HT)' ) }}
                    {{ Form::checkbox( 'ht', old( 'ht' ) ) }}
                </div>
                <br>

                <!-- Start Time (ST) -->
                <div>
                    {{ Form::label( 'st', 'Start Time (ST)' ) }}
                    {{ Form::checkbox( 'st', old( 'st' ) ) }}
                </div>
                <br>

                <!-- Finish Time (FT) -->
                <div>
                    {{ Form::label( 'ft', 'Finish Time (FT)' ) }}
                    {{ Form::checkbox( 'ft', old( 'ft' ) ) }}
                </div>
                <br>

                <!-- Holding Period (HP) -->
                <div>
                    {{ Form::label( 'hp','Holding Period (HP)' ) }}
                    {{ Form::checkbox( 'hp', old( 'hp' ) ) }}
                </div>
                <br>

                <!-- Round (RND) -->
                <div>
                    {{ Form::label( 'rnd', 'Round (RND)' ) }}
                    {{ Form::checkbox( 'rnd', old( 'rnd' ) ) }}
                </div>
                <br>

                <!-- Block (BLK) -->
                <div>
                    {{ Form::label( 'blk', 'Block (BLK)' ) }}
                    {{ Form::checkbox( 'blk', old( 'blk' ) ) }}
                </div>
                <br>

                <!-- House/Hat (SHH) -->
                <div>
                    {{ Form::label( 'shh', 'House/Hat (SHH)' ) }}
                    {{ Form::checkbox( 'shh', old( 'shh' ) ) }}
                </div>
                <br>

                <!-- Station (STN) -->
                <div>
                    {{ Form::label( 'stn', 'Station (STN)' ) }}
                    {{ Form::checkbox( 'stn', old( 'stn' ) ) }}
                </div>
                <br>

                <!-- Volunteer Name (VN) -->
                <div>
                    {{ Form::label( 'vn', 'Volunteer Name (VN)' ) }}
                    {{ Form::checkbox( 'vn', old( 'vn' ) ) }}
                </div>
                <br>

                <!-- Volunteer Initials (VI) -->
                <div>
                    {{ Form::label( 'vi', 'Volunteer Initials (VI)' ) }}
                    {{ Form::checkbox( 'vi', old( 'vi' ) ) }}
                </div>
                <br>

                <!-- TREATMENT (TR) -->
                <div>
                    {{ Form::label( 'tr', 'Treatment (TR)' ) }}
                    {{ Form::checkbox( 'tr', old( 'tr' ) ) }}
                </div>
                <br>

                <!-- EXPERIMENT DAY (DY) -->
                <div>
                    {{ Form::label( 'dy', 'Experimental Day (DY)' ) }}
                    {{ Form::checkbox( 'dy', old( 'dy' ) ) }}
                </div>
                <br>

                <!-- NUMBER OF HOUSEHOLD SAMPLED (HS) -->
                <div>
                    {{ Form::label( 'hs', 'Number of Household Sampled (HS)' ) }}
                    {{ Form::checkbox( 'hs', old( 'hs' ) ) }}
                </div>
                <br>

                <!-- Valid Catch (VC) -->
                <div>
                    {{ Form::label( 'vc', 'Valid Catch (VC)' ) }}
                    {{ Form::checkbox( 'vc', old( 'vc' )) }}
                </div>
                <br>

                <!-- SS Form Serial No. (DSEN) -->
                <div>
                    {{ Form::label( 'dsen', 'SS Form Serial No. (DSEN)' ) }}
                    {{ Form::checkbox( 'dsen', old( 'dsen' ) ) }}
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
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route( 'eds.index', ['pt'=>$pt]) }}">
                        {{ __( 'Work on an existing experiment instead?' ) }}
                    </a>

                    <x-button class="ml-4">
                        {{ __( 'Download the Data' ) }}
                    </x-button>
                </div>

                {!!Form::close()!!}


            </x-auth-card>
</x-app-layout>


